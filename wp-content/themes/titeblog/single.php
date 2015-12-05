<?php get_header(); ?>

	<main class="row">
	<!-- section -->
	<section role="main" class="medium-7 medium-offset-2 columns">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			<!-- /post title -->

			<!-- post details -->
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<!-- /post details -->

			<?php the_content(); // Dynamic Content ?>

			<?php the_tags( __( 'Tags: ', 'titeblog' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p><?php _e( 'Categorized in: ', 'titeblog' ); the_category(', '); // Separated by commas ?></p>

			<?php comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'titeblog' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->

	<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>
