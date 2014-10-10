<?php get_header(); ?>

<div id="content" class="span8">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
<div class="post" id="post-<?php the_ID(); ?>">
    <div class="title">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
    </div>
    <div class="postmeta">
    </div>
    <div class="clearfix"></div>

    <div class="archive-entry">
        <?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
    <div class="clearfix"></div>
    </div>

    <div class="archive-side">
        <?php if ( has_post_thumbnail() ) { ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                <img class="side-thumb" src="<?php get_image_url(); ?>" alt="" /></a>
        <?php } ?>
    </div>
        
<div class="clearfix"></div>

</div>
<?php endwhile; ?>
<?php getpagenavi(); ?>
<?php else : ?>
	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>