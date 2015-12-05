<?php

require_once( dirname( __FILE__ ) . '/class-amp-embed-handler.php' );

class AMP_Gallery_Embed_Handler extends AMP_Embed_Handler {
	const DEFAULT_WIDTH = 600;
	const DEFAULT_HEIGHT = 480;

	private static $script_slug = 'amp-carousel';
	private static $script_src = 'https://cdn.ampproject.org/v0/amp-carousel-0.1.js';

	private $args;

	function __construct( $args = array() ) {
		$this->args = wp_parse_args( $args, array(
			'width' => self::DEFAULT_WIDTH,
			'height' => self::DEFAULT_HEIGHT,
			'type' => 'slides',
		) );

		add_shortcode( 'gallery', array( $this, 'shortcode' ) );
	}

	public function get_scripts() {
		if ( ! $this->did_convert_elements ) {
			return array();
		}

		return array( self::$script_slug => self::$script_src );
	}

	public function shortcode( $attr ) {
		$post = get_post();

		if ( ! empty( $attr['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attr['orderby'] ) ) {
				$attr['orderby'] = 'post__in';
			}
			$attr['include'] = $attr['ids'];
		}

		$atts = shortcode_atts( array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post ? $post->ID : 0,
			'include'    => '',
			'exclude'    => '',
			'size'       => array( $this->args['width'], $this->args['height'] )
		), $attr, 'gallery' );

		$id = intval( $atts['id'] );

		if ( ! empty( $atts['include'] ) ) {
			$attachments = get_posts( array(
				'include' => $atts['include'],
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $atts['order'],
				'orderby' => $atts['orderby'],
				'fields' => 'ids',
			) );
		} elseif ( ! empty( $atts['exclude'] ) ) {
			$attachments = get_children( array(
				'post_parent' => $id,
				'exclude' => $atts['exclude'],
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $atts['order'],
				'orderby' => $atts['orderby'],
				'fields' => 'ids',
			) );
		} else {
			$attachments = get_children( array(
				'post_parent' => $id,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $atts['order'],
				'orderby' => $atts['orderby'],
				'fields' => 'ids',
			) );
		}

		if ( empty( $attachments ) ) {
			return '';
		}

		$urls = array();
		foreach ( $attachments as $attachment_id ) {
			list( $url, $width, $height ) = wp_get_attachment_image_src( $attachment_id, $atts['size'], true );

			if ( ! $url ) {
				continue;
			}

			$urls[] = array(
				'url' => $url,
				'width' => $width,
				'height' => $height,
			);
		}

		return $this->render( array(
			'images' => $urls,
		) );
	}

	public function render( $args ) {
		$this->did_convert_elements = true;

		$args = wp_parse_args( $args, array(
			'images' => false,
		) );

		if ( empty( $args['images'] ) ) {
			return '';
		}

		$images = array();
		foreach ( $args['images'] as $image ) {
			$images[] = AMP_HTML_Utils::build_tag(
				'amp-img',
				array(
					'src' => $image['url'],
					'width' => $image['width'],
					'height' => $image['height'],
				)
			);
		}

		return AMP_HTML_Utils::build_tag(
			'amp-carousel',
			wp_parse_args( array(), $this->args ),
			implode( PHP_EOL, $images )
		);
	}
}
