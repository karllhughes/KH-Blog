<?php get_header(); ?>
<div id="content" class="span8"> 
    <?php jb_show_top_search_bar(); ?>
<?php if (have_posts()) : $cc = 1; ?>
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
        <?php } else { ?>
        
        <?php } ?>
    </div>
        
<div class="clearfix"></div>
<?php if($cc == 1 || $cc == 5) { ?>
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
<?php } ?>
</div>
<?php $cc++; endwhile; ?>
<?php getpagenavi(); ?>
<?php else : ?>
	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>