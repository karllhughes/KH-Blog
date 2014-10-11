<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class(); ?>>

		<header class="entry-header">
		
			<h1 class="entry-title"><?php the_title(); ?></h1>
			
			<div class="entry-meta">
				
				<p>Posted by <span class="author"><?php the_author_posts_link(); ?></span> on <time datetime="<?php the_time('c'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time>. <a href="#comments"><?php comments_number('Leave a comment','One comment','% comments'); ?></a>.</p>
				
			</div>
			
		</header>
		
		<?php if ($post->post_excerpt != "" ) {
		
			echo "<div class=\"entry-summary\">";
	   
			the_excerpt();
	       
			echo "</div>";

			}
		?>
		
		<div class="entry-content">
		
			<?php the_content(); ?>
			
		</div>
		
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
		<footer class="entry-footer">
		
			<nav class="entry-taxonomy">
				
				<p>Filed under: <?php the_category(', '); ?></p>
				<p><?php the_tags(); ?></p>
				
			</nav>
			
			<nav class="pagination">
							
				<p class="next"><?php next_post_link('Next post: %link'); ?></p>
				<p class="previous"><?php previous_post_link('Previous post: %link'); ?></p>				
					
			</nav>
			
			<div id="comments">
			
				<?php paginate_comments_links(); ?>
			
				<?php comments_template(); ?>
				
			</div>
			
		</footer>
		
	</article>
	
<?php endwhile; ?>

</div> <!-- end content -->

<div id="sidebar">

	<?php get_sidebar('universal'); ?>

	<?php get_sidebar('single'); ?>
	
</div>

<?php get_footer(); ?>