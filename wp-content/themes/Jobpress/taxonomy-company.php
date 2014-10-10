<?php get_header(); ?>

<div id="content" class="span8">
    
<?php if(is_tax( 'company' )) { 
    $term = get_term_by( 'slug', get_query_var('company'), 'company' );
    $company_meta = get_term_meta($term->term_id);
    ?>
    <div class="company-header">
        <h1 class="company-name">
        <?php if($company_meta['jb_image'][0]) { ?>
            <a href="<?php echo get_term_link( $term ); ?>" 
               title="See More <?php echo $term->name; ?> Entry Level Marketing Jobs on JobBrander" 
               ><img src="<?php echo $company_meta['jb_image'][0]; ?>" alt="" class="company-logo" /></a>
        <?php } ?><?php echo $term->name; ?>
        </h1>
        <?php if($company_meta['jb_tagline'][0]) { ?>
            <h2 class="company-tagline"><?php echo $company_meta['jb_tagline'][0]; ?></h2>
        <?php } ?>
        <?php jb_show_company_carousel($term); ?>
    </div>
    <?php 
    
} ?>

<div class="row job-entry">
<div class="span3">
    <?php jb_show_company_page_info($term, $company_meta); ?>
</div>
<div class="span5">
    <h3 class="listings-header">Job Listings</h3>
    <?php 
    global $post;
    $args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'post_type'        => 'job',
	'post_status'      => 'publish',
        'tax_query' => array(
		array(
                    'taxonomy' => 'company',
                    'field' => 'id',
                    'terms' => $term->term_id
		)
            )
        );
    $posts = get_posts($args);
    if ($posts) : ?>
    <?php foreach ($posts as $post) : setup_postdata( $post ); ?>

    <div class="post" id="post-<?php the_ID(); ?>">
        <div class="title">
            <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h4>
        </div>
        <div class="postmeta">
            <span class="author"> <?php echo get_the_term_list( get_the_ID(), 'company', '', ' | ' ); ?></span> 
            | <?php echo get_the_term_list( get_the_ID(), 'city', '', ' | ' ); ?>
            | <span class="date">  <?php the_time('F j, Y'); ?></span>
        </div>
        <div class="clearfix"></div>
        <div class="job-entry">
            <?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
        <div class="clearfix"></div>
        </div>
        
    <div class="clearfix"></div>

    </div>
    <?php endforeach; ?>
    <hr/>
    <p class="muted">Company profiles on JobBrander do not indicate an endorsement
    of our site by the company. Please read our <a href="http://www.jobbrander.com/terms">Terms of Service</a> for more info.</p>
<?php //getpagenavi(); ?>
<?php else : ?>
	<h1 class="title">No Listings...Yet</h1>
	<p>Sorry, but we don't yet have any listings for this company. Why not join our mailing list so we can let you know when we do?</p>
<?php endif; ?>
</div>
</div> 
</div>   
<?php get_sidebar(); ?>
<?php get_footer(); ?>