<?php get_header();
    $checkout_page = get_permalink( get_page_by_path( 'checkout' ) );
?>

<div id="content" class="span12">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<div class="title text-center">
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</div>
	<div class="postmeta">
        </div>
        <div class="row">
            <div class="span8">
                <div class="page_content">
                <?php the_content('Read the rest of this entry &raquo;'); ?>
                </div>
                <div class="contact_form">
                    <h3>Ready to Get Started?</h3>
                    <p><a href="<?php echo $checkout_page; ?>" class="btn btn-large">Post a Job</a></p>

                    <div class="pricing">
                        <div class="intro">You Don't Pay if You Aren't</div>
                        <div class="price">
                            <span class="satisfied">100%</span><span class="rate"></span>
                        </div>
                        <div class="intro">Satisfied with your responses.</div>
                    </div>
                    <p class="small">*Please see <a href="http://www.jobbrander.com/terms" style="color:#fff;" target="_blank">terms of service</a> for details.</p>
                </div>

                <div class="clear"></div>
            </div>
            <div class="span4">
                <div class="contact_form">
                <h3>Ready to Get Started?</h3>
                <p><a href="<?php echo $checkout_page; ?>" class="btn btn-large">Post a Job</a></p>
                    <div class="pricing">
                        <div class="intro">You Don't Pay if You Aren't</div>
                        <div class="price">
                            <span class="satisfied">100%</span><span class="rate"></span>
                        </div>
                        <div class="intro">Satisfied with your responses.</div>
                    </div>
                <?php
                    //echo do_shortcode('[contact-form-7 id="3588" title="Contact form 1"]');
                ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
</div>
<?php endwhile; else: ?>
		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>
