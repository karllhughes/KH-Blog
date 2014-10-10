<?php get_header(); ?>

<div id="content" class="span8">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="post" id="post-<?php the_ID(); ?>">
    <div class="title">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
    </div>
    <div class="postmeta">
        <?php jb_show_company_meta(get_the_ID()); ?>
    </div>
    <div class="clearfix"></div>

    <div class="job-entry">
        <?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
    <div class="clearfix"></div>
    </div>
        
<div class="clearfix"></div>

</div>
<?php endwhile; ?>
<?php getpagenavi(); ?>
<?php else : ?>
	<h1 class="title">Whoops!</h1>
	<p>It looks like we don't have any jobs here yet. Keep searching or let
        us know if you'd like us to spend more time in your city.</p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>