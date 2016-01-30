<?php get_header(); ?>

	<main class="row">
		<!-- section -->
		<section role="main" class="medium-7 medium-offset-2 columns">

			<h1 class="understated"><?php _e( 'Categories for ', 'titeblog' ); single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->

		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
