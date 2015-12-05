<?php get_header(); ?>

	<main class="row">
		<!-- section -->
		<section role="main" class="medium-7 medium-offset-2 columns">

			<!-- article -->
			<article id="post-404">

				<h1><?php _e( 'Page not found', 'titeblog' ); ?></h1>
				<h2>
					<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'titeblog' ); ?></a>
				</h2>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
