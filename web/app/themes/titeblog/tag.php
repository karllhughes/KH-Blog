<?php get_header(); ?>

	<main class="row">
		<!-- section -->
		<section role="main" class="medium-7 medium-offset-2 columns">

			<h1 class="understated"><?php _e( 'Tag Archive: ', 'titeblog' ); echo single_tag_title('', false); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->

		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
