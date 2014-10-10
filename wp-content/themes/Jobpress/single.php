<?php get_header(); ?>

<div id="content" class="span8">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="title">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</div>
	<div class="postmeta">
            <a href="<?php echo get_the_author_meta('jb_gp_url'); ?>?rel=author">
            <?php echo get_avatar(get_the_author_meta('user_email')); ?>
            </a>
            <span class="author">By <?php the_author_posts_link(); ?> </span> | <span class="date">  <?php the_time('F j, Y'); ?></span>
            | <?php the_category(' | '); ?>
            <?php if(current_user_can('edit_posts')) { echo edit_post_link('Edit Post', ' | ', ' | '); } ?>
        </div>
	<div class="entry">
		<?php the_content('Read the rest of this entry &raquo;'); ?>
		<div class="clear"></div>
			<div class="google_ad">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- JobBrander Content -->
                        <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-2322554200861137"
                                 data-ad-slot="7626825003"
                                 data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
			</div>
                <div class="clear"></div>
		<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
            <div class="postmeta tags">
                <?php the_tags('#', ' #'); ?>
            </div>
            <?php get_related_posts_thumbnails(); ?>
        </div>
        <div class="side-prompt">
            <?php jb_get_related_posts(get_the_ID()); ?>
            <?php jb_show_side_jobs(); ?>
            
        </div>
        <div class="clearfix"></div>
</div>
<?php comments_template(); ?>
<?php endwhile; else: ?>
    <div class="post">
		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
    </div>
        
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>