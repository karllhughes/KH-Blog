<?php get_header(); ?>

<div id="content" class="span8">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="title">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</div>
	<div class="postmeta">
        </div>
	<div class="page-entry">
		<?php the_content('Read the rest of this entry &raquo;'); ?>
		<div class="clear"></div>
		<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
        <div class="clearfix"></div>
        <!--
        <div style="text-align: center;margin: 50px 30px;">
            <h1>Job<span style="color:#0088cc;">Brander</span></h1>
            
            <h3 style="color:#444;">Tools and Tips for Entry Level Marketing Professionals</h3>
        </div>
        -->
</div>
<?php endwhile; else: ?>
		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>