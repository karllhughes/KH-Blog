<?php get_header();
    $author_id = get_query_var('author');
    $author = get_userdata($author_id);
?>
<div class="span8">
    <h1 class="title"><?php echo ucfirst($author->display_name); ?> on JobBrander</h1><hr/>
    <div class="row">
    <div id="user_profile" class="span3">
        <?php if($author->jb_photo_url) { ?>
            <img src="<?php echo $author->jb_photo_url; ?>" class="author-image" />
        <?php } ?><p>
        <?php echo $author->description; ?></p>
        <div class="clearfix"></div>
        <p><strong>Social Links:</strong></p>
        <div class="social-author">
        <?php if($author->jb_li_url) { ?>
            <a href="<?php echo $author->jb_li_url; ?>" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin.png" alt="Linkedin" />
            </a>
        <?php } ?>
        <?php if($author->jb_tw_url) { ?>
            <a href="<?php echo $author->jb_tw_url; ?>" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.png" alt="Twitter" />
            </a>
        <?php } ?>
        <?php if($author->jb_fb_url) { ?>
            <a href="<?php echo $author->jb_fb_url; ?>" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook.png" alt="Facebook" />
            </a>
        <?php } ?>
        <?php if($author->jb_gp_url) { ?>
            <a href="<?php echo $author->jb_gp_url; ?>" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/google+.png" alt="Google+" />
            </a>
        <?php } ?>
        </div>
        <p><strong>Quick Stats:</strong></p>
        <table class="table">
            <tr>
                <td>Posts</td>
                <td><?php echo count_user_posts($author->ID); ?></td>
            </tr>
            <tr>
                <td>Comments</td>
                <td><?php echo jb_get_author_comment_count($author->ID); ?></td>
            </tr>
            <tr>
                <td>Member Since</td>
                <td><?php echo date('F, Y', strtotime($author->user_registered)); ?></td>
            </tr>
        </table>
    </div>
    <div id="content" class="span5">
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
	<p>It looks like this author hasn't posted anything on JobBrander yet.</p>
        <p>You can submit a guest post by <a href="mailto:karl@jobbrander.com" target="_blank">emailing Karl Hughes</a>.</p>
<?php endif; ?>
<div class="clearfix"></div>

    </div></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>