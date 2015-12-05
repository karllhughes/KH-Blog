<?php get_header(); ?>

	<main class="row">
		<!-- section -->
		<section role="main" class="medium-8 medium-offset-2 columns">

			<h1><?php echo sprintf( __( '%s Search Results for ', 'titeblog' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->

		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
