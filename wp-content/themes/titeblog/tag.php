<?php get_header(); ?>

	<main class="row">
		<!-- section -->
		<section role="main" class="medium-8 medium-offset-2 columns">

			<h1><?php _e( 'Tag Archive: ', 'titeblog' ); echo single_tag_title('', false); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->

		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
