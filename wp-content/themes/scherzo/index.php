<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class(); ?>>

		<header class="entry-header">
			
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="archive"><?php the_title(); ?></a></h1>
			
			<div class="entry-meta">
			
				<p>Posted by <span class="author"><?php the_author_posts_link(); ?></span> on <time datetime="<?php the_time('c'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time>. <a href="<?php the_permalink(); ?>/#comments"><?php comments_number('No comments','One comment','% comments'); ?></a>.</p>
			
			</div>
			
		</header>
			
	<?php
	$content = get_the_content();
	$string_1 = 'src="';
	$string_2 = '" alt';
	$pos_1 = strpos($content, $string_1 )+5;
	$pos_2 = strpos($content, $string_2 );
	$between=substr($content, $pos_1, $pos_2-$pos_1);
	if(strlen($between) <= 200) {
	?>
<a href="<?php the_permalink() ?>" rel="bookmark"><img class="thumb" src="<?php echo $between; ?>" alt="<?php the_title(); ?>" style="max-width: 120px; height: auto;" /></a>
			<?php }
				echo "<div class=\"entry-summary\">";
		   
				the_excerpt();
				
				echo "<p><a href=\"";
				
				the_permalink();
				
				echo "\">Continue reading this post...";
				
				echo "</a></p>";
		       
				echo "</div>";

			
			
				//echo "<div class=\"entry-content\">";
		   
	//the_content("Continue reading this post...");
			   
				//echo "</div>";

			?>
		
	</article>
	
<?php endwhile; ?>

<div class="pagination">
			       
	    <p class="next"><?php previous_posts_link('Newer posts', '0'); ?></p>
	    <p class="previous"><?php next_posts_link('Older posts', '0'); ?></p>
   
</div>

</div> <!-- end content -->

<div id="sidebar">

	<?php get_sidebar('universal'); ?>

	<?php get_sidebar('front'); ?>

</div>

<?php get_footer(); ?>