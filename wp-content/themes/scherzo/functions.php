<?php
function show_klout_score($username) {
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,'http://api.klout.com/1/klout.xml?users='.$username.'&key=k97neqpdhp56evs24cr2vfc7');
	curl_setopt($curl_handle,CURLOPT_TIMEOUT,10); 
	curl_setopt($curl_handle,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,10);
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	$html = curl_exec($curl_handle);
	curl_close($curl_handle);
 
	echo $html;
}

// Load scripts

if ( !function_exists( 'scherzo_scripts' ) ) :

	function scherzo_scripts() {

	    if (!is_admin()) {
	      
			wp_register_script( 'html5shiv', 'http://html5shiv.googlecode.com/svn/trunk/html5.js');
			wp_enqueue_script( 'html5shiv' );

	    }
	}

	add_action('init', 'scherzo_scripts');

endif;


// Define the custom width

if ( ! isset( $content_width ) ) $content_width = 522;


// Set up three 'contextual' sidebar areas */

add_action( 'widgets_init', 'scherzo_register_sidebars' );

if ( !function_exists( 'scherzo_register_sidebars' ) ) :

	function scherzo_register_sidebars() {

		// Register the 'universal' sidebar.
	
		register_sidebar(
			array(
				'id' => 'universal',
				'name' => __( 'Universal' ),
				'description' => __( 'Widgets placed here will be displayed on every page of your blog' ),
				'before_widget' => '<section id="%1$s" class="widgetContainer %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h1 class="widgetTitle">',
				'after_title' => '</h1>'
			)
		);

		// Register the 'single' sidebar.
	
		register_sidebar(
			array(
				'id' => 'single',
				'name' => __( 'Single pages' ),
				'description' => __( 'Widgets placed here will only be displayed on single post pages' ),
				'before_widget' => '<section id="%1$s" class="widgetContainer %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h1 class="widgetTitle">',
				'after_title' => '</h1>'
			)
		);
	
		// Register the 'front' sidebar.
	
		register_sidebar(
			array(
				'id' => 'front',
				'name' => __( 'Front page' ),
				'description' => __( 'Widgets placed here will only be displayed on your front page' ),
				'before_widget' => '<section id="%1$s" class="widgetContainer %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h1 class="widgetTitle">',
				'after_title' => '</h1>'
			)
		);
	}
	
endif;

add_custom_background();

add_theme_support('automatic-feed-links');

// Allow custom headers

define('HEADER_TEXTCOLOR', '444444');
define('HEADER_IMAGE_WIDTH', 816);
define('HEADER_IMAGE_HEIGHT', 144);

	// gets included in the site header
	
	if ( !function_exists( 'scherzo_header_style' ) ) :
	
		function scherzo_header_style() {
		
			if ( 'blank' == get_header_textcolor() ) {
			
				echo "<style>#site-header, #tag {text-indent: -9999px;}</style>";

			}
	
			?><style>
		
				#site-header {
					
				}
			
				#site-title,
				#tag {
					color: #<?php HEADER_TEXTCOLOR(); ?>;
				}
			
			</style>
			
			<?php
		
		}
		
	endif;	
	
	// gets included in the admin header
	
	if ( !function_exists( 'scherzo_admin_header_style' ) ) :
	
		function scherzo_admin_header_style() {
	
		
		}
		
	endif;
	
	add_custom_image_header('scherzo_header_style', 'scherzo_admin_header_style');


?>