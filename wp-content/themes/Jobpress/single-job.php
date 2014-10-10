<?php get_header(); ?>

<div id="content" class="span8">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="title">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</div>
	<div class="postmeta">
            <?php if(current_user_can('edit_posts')) { echo edit_post_link('Edit Post', ' | ', ' | '); } ?>
        </div>
    <div class="row job-entry">
        <div class="span3 side-job">
            <?php jb_show_company_info(get_the_ID()); ?>
            <?php jb_show_side_jobs(); ?>
        </div>
	<div class="span5">
            <p><strong>Job Description:</strong></p>
            <?php the_content('Read the rest of this entry &raquo;'); ?>
            <p><strong>Location:</strong></p>
            <p><?php echo get_the_term_list( get_the_ID(), 'city', '', ' | ' ); ?></p>
            <?php echo jb_show_employees_list(get_the_ID()); ?>
            <?php jb_show_application_link(get_the_ID()); ?>
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
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    
<?php endwhile; else: ?>
		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>