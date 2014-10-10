<?php get_header(); ?>

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
                <div class="row">
                    <div class="span4">
                        <div class="pricing">
                            <div class="intro">Most Employers Spend Over</div>
                            <div class="price">
                                <span class="dollars">$12,000</span><span class="rate">/year</span>
                            </div>
                            <div class="intro">To find, hire, and compensate interns.</div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="pricing">
                            <div class="intro">We'll Get You High Quality Interns for</div>
                            <div class="price">
                                <span class="savings">$499</span><span class="rate">/month</span>
                            </div>
                            <div class="intro">And you don't pay unless you're 100% satisfied!</div>
                        </div>
                    </div>
                </div>
                <div class="page_content">
                <?php the_content('Read the rest of this entry &raquo;'); ?>
                </div>

                <div class="pricing">
                    <div class="intro">You Don't Pay if You Aren't</div>
                    <div class="price">
                        <span class="satisfied">100%</span><span class="rate"></span>
                    </div>
                    <div class="intro">Satisfied with your intern.</div>
                </div>

                <div class="clear"></div>
            </div>
            <div class="span4">
                <div class="contact_form">
                <h3>Let Us Find Your Next Intern</h3>
                <?php echo do_shortcode('[contact-form-7 id="3588" title="Contact form 1"]'); ?>
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
