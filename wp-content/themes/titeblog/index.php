<?php get_header(); ?>

	<main role="main" class="row">
		<!-- section -->
		<section class="medium-8 medium-offset-2 columns">

			<h1><?php _e( 'Latest Posts', 'titeblog' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
