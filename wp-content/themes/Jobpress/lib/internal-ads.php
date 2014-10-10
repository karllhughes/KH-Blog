<?php
//for use in the loop, list 5 post titles related to first tag on current post
function jb_get_related_posts($post_id) {
    $tags = wp_get_post_tags($post_id);
    if($tags) {
        $tag_ids = array();
        foreach($tags as $individual_tag) { $tag_ids[] = $individual_tag->term_id; }
        $args=array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post_id),
            'posts_per_page'=>3, // Number of related posts that will be shown.
            'caller_get_posts'=>1
        );
        $my_query = new wp_query( $args );
        if( $my_query->have_posts() ) {
        echo '<h3>Similar Posts</h3><div id="related-posts"><ul>';
        while( $my_query->have_posts() ) {
            $my_query->the_post(); ?>
            <li>
            <?php if ( has_post_thumbnail() ) { ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                <img class="side-thumb" src="<?php get_image_url(); ?>" alt="" /></a>
            <?php } ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            <div class="clearfix"></div>
            </li>
        <?php }
        echo '</ul></div>';
        }
    }
    wp_reset_query(); 
}

// Show company who posted the job
function jb_show_company_info($post_id) {
    $terms = wp_get_post_terms( $post_id, 'company' );
    if($terms && $terms[0]) {
        $company = $terms[0];
        $company_meta = get_term_meta($company->term_id);
        //Show company name 
    ?>
        <div class="company_info">
            <?php if($company_meta['jb_image'][0]) { ?>
                <a href="<?php echo get_term_link( $company ); ?>" 
                   title="See More <?php echo $company->name; ?> Entry Level Marketing Jobs on JobBrander" 
                   ><img src="<?php echo $company_meta['jb_image'][0]; ?>" alt="" class="company-photo" /></a>
            <?php } ?>
            <h3><a href="<?php echo get_term_link( $company ); ?>" 
                   title="See More <?php echo $company->name; ?> Entry Level Marketing Jobs on JobBrander" 
                   ><?php echo $company->name; ?></a></h3>
            <table class="table">
                <?php if($company_meta['jb_employee_count'][0]) { ?>
                <tr>
                    <td style="font-weight: bold;">Employees:</td>
                    <td><?php echo $company_meta['jb_employee_count'][0]; ?></td>
                </tr>
                <?php } if($company_meta['jb_industry'][0]) { ?>
                <tr>
                    <td style="font-weight: bold;">Industry:</td>
                    <td><?php echo $company_meta['jb_industry'][0]; ?></td>
                </tr>               
                <?php } if($company_meta['jb_founded'][0]) { ?>
                <tr>
                    <td style="font-weight: bold;">Founded:</td>
                    <td><?php echo $company_meta['jb_founded'][0]; ?></td>
                </tr>
            <?php } if($company_meta['jb_handle'][0]) { ?>
            <tr>
                <td style="font-weight: bold;vertical-align: middle;">Twitter:</td>
                <td>
                    <a href="http://twitter.com/<?php echo $company_meta['jb_handle'][0]; ?>" id="company_twitter" title="Follow <?php echo $company->name; ?> on Twitter" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.png" style="width: 30px;height:30px;" />
                    </a>
                    <script>
                    jQuery(document).ready(function() {
                        jQuery('#company_twitter').tooltip();
                    });
                    </script>
                    <?php if($company_meta['jb_people']) { $people = unserialize($company_meta['jb_people'][0]);
                    foreach($people as $person) { ?>
                    <a href="http://twitter.com/<?php echo $person['screenname']; ?>" id="<?php echo $person['twitter_id']; ?>" title="<?php echo $person['name']; ?> | <?php echo $person['description']; ?>" target="_blank">
                    <img src="<?php echo $person['image']; ?>" style="width: 26px;height:26px;margin:2px;" alt="<?php echo $person['name']; ?> | <?php echo $person['description']; ?>" />
                    </a>
                    <script>
                    jQuery(document).ready(function() {
                        jQuery('#<?php echo $person['twitter_id']; ?>').tooltip();
                    });
                    </script>
                    <?php } } ?>
                </td>
            </tr> 
            <?php } if($company_meta['jb_li_id'][0]) { ?>
            <tr>
                <td style="font-weight: bold;vertical-align: middle;">LinkedIn:</td>
                <td>
                    <a href="http://www.linkedin.com/company/<?php echo $company_meta['jb_li_id'][0]; ?>" id="company_linkedin" title="Follow <?php echo $company->name; ?> on LinkedIn" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin.png" style="width: 32px;height:32px;" />                        
                    </a>
                    <script>
                    jQuery(document).ready(function() {
                        jQuery('#company_linkedin').tooltip();
                    });
                    </script>
                </td>
            </tr> 
            <?php } ?>
                <tr class="hidden-phone">
                    <td colspan="2"><p style="font-weight: bold;">About:</p>
                        <p><?php echo $company_meta['jb_description'][0]; ?></p>
                        <p><a href="<?php echo $company_meta['jb_website'][0]; ?>" target="_blank">Company Website</a></p>
                    </td>
                </tr>
            </table>
        </div>
    <?php
    }
}
// Show company who posted the job
function jb_show_company_page_info($company, $company_meta) {
        //Show company name 
    ?>
    <div class="company_info" id="company_1">
        <h3 class="listings-header">Company Info</h3>
        <table class="table">
            <?php if($company_meta['jb_employee_count'][0]) { ?>
            <tr>
                <td style="font-weight: bold; border-top: none;">Employees:</td>
                <td style="border-top: none;"><?php echo $company_meta['jb_employee_count'][0]; ?></td>
            </tr>
            <?php } if($company_meta['jb_industry'][0]) { ?>
            <tr>
                <td style="font-weight: bold;">Industry:</td>
                <td><?php echo $company_meta['jb_industry'][0]; ?></td>
            </tr>               
            <?php } if($company_meta['jb_founded'][0]) { ?>
            <tr>
                <td style="font-weight: bold;">Founded:</td>
                <td><?php echo $company_meta['jb_founded'][0]; ?></td>
            </tr>
            <?php } if($company_meta['jb_handle'][0]) { ?>
            <tr>
                <td style="font-weight: bold;vertical-align: middle;">Twitter:</td>
                <td>
                    <a href="http://twitter.com/<?php echo $company_meta['jb_handle'][0]; ?>" id="company_twitter" title="Follow <?php echo $company->name; ?> on Twitter" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.png" style="width: 30px;height:30px;" />
                    </a>
                    <script>
                    jQuery(document).ready(function() {
                        jQuery('#company_twitter').tooltip();
                    });
                    </script>
                    <?php if($company_meta['jb_people']) { $people = unserialize($company_meta['jb_people'][0]);
                    foreach($people as $person) { ?>
                    <a href="http://twitter.com/<?php echo $person['screenname']; ?>" id="<?php echo $person['twitter_id']; ?>" title="<?php echo $person['name']; ?> | <?php echo $person['description']; ?>" target="_blank">
                    <img src="<?php echo $person['image']; ?>" style="width: 26px;height:26px;margin:2px;" alt="<?php echo $person['name']; ?> | <?php echo $person['description']; ?>" />
                    </a>
                    <script>
                    jQuery(document).ready(function() {
                        jQuery('#<?php echo $person['twitter_id']; ?>').tooltip();
                    });
                    </script>
                    <?php } } ?>
                </td>
            </tr> 
            <?php } if($company_meta['jb_li_id'][0]) { ?>
            <tr>
                <td style="font-weight: bold;vertical-align: middle;">LinkedIn:</td>
                <td>
                    <a href="http://www.linkedin.com/company/<?php echo $company_meta['jb_li_id'][0]; ?>" id="company_linkedin" title="Follow <?php echo $company->name; ?> on LinkedIn" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin.png" style="width: 32px;height:32px;" />                        
                    </a>
                    <script>
                    jQuery(document).ready(function() {
                        jQuery('#company_linkedin').tooltip();
                    });
                    </script>
                </td>
            </tr> 
            <?php } ?>
            <tr class="hidden-phone">
                <td colspan="2"><p style="font-weight: bold;">About:</p>
                    <p><?php echo $company_meta['jb_description'][0]; ?></p>
                    <p><a href="<?php echo $company_meta['jb_website'][0]; ?>" target="_blank">Company Website</a></p>
                </td>
            </tr>
        </table>
    </div>
<?php
}

function jb_show_company_carousel($term) { 
    global $post;
    $args = array(
	'posts_per_page'   => 4,
	'offset'           => 0,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'post_type'        => 'post',
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
    //echo '<pre>';
    //print_r($posts);
    //echo '</pre>';
    if($posts) { $cc=1;
    ?>
    <div id="company_carousel" class="carousel slide">
        <ol class="carousel-indicators">
            <?php foreach($posts as $post) { ?>
            <li data-target="#company_carousel" data-slide-to="<?php echo $cc-1; ?>" class="<?php if($cc==1) echo 'active'; ?>"></li>
            <?php $cc++; } $cc=1; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach($posts as $post) { setup_postdata( $post ); ?>
            <div class="item <?php if($cc==1) echo 'active'; ?>">
                <a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" >
                  <img src="<?php get_image_url(); ?>" alt="">
                </a>
              <div class="carousel-caption">
                <h4><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                <span style="font-size:11px; font-weight: normal; line-height: 13px;"><?php the_excerpt(); ?></span>
              </div>
            </div>
            <?php $cc++; } $cc=1; ?>
        </div>
        <a class="left carousel-control" href="#company_carousel" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#company_carousel" data-slide="next">›</a>
      </div>
<?php 
    }
    wp_reset_postdata();
}

function jb_show_employees_list($post_id) {
    $company = wp_get_post_terms( $post_id, 'company' );
    if($company && $company[0]) {
        
    }
}

// Show the application link to loggedin users, otherwise show login form
function jb_show_application_link($post_id) {
    if(is_user_logged_in()) { if(get_post_meta($post_id, 'jb_url', TRUE)) { ?>
            <hr/>
            <p id="application" style="text-align:center;">
                <a href="<?php echo get_post_meta($post_id, 'jb_url', TRUE); ?>" class="btn btn-large btn-primary" target="_blank" >Apply Now</a>
            </p>
        <?php }
    } else {
        ?>
            <div class="login_box">
                <h4>Apply Now</h4>
                <p>Log in to Access Hundreds of Internships and Entry Level Jobs</p>
                <p><a href="<?php echo site_url('/wp-login.php?action=register&redirect_to=' . jb_current_url() ); ?>" class="btn btn-large" >
                    Log in to Apply
                </a></p>
                <p style="font-size: 12px; font-style: italic;">You will be emailed a password and login link.</p>
            </div>
        <?php 
    }
}

// Show side ads for jobs
function jb_show_side_jobs() {
    $args = array(
	'posts_per_page'  => 6,
	'post_type'       => 'job',
	'post_status'     => 'publish',
        'order' => 'ASC',
        'orderby' => 'rand',
	'suppress_filters' => true );
    $jobs = get_posts( $args ); ?>
            <h3>Latest Entry Level Jobs</h3>
            <div class="latest-jobs"><ul>
    <?php
    if($jobs) { foreach($jobs as $job) { 
        $terms = wp_get_post_terms( $job->ID, 'company' );
        if($terms && $terms[0]) {
            $company = $terms[0];
            $company_meta = get_term_meta($company->term_id);
        ?>
            <li><a href="<?php echo get_permalink($job->ID); ?>" title="<?php echo $job->post_title; ?>">
                <?php if($company_meta['jb_image'][0]) { ?>
                    <img src="<?php echo $company_meta['jb_image'][0]; ?>" alt="" class="company-photo" />
                <?php } ?>
                <?php echo $job->post_title; ?>
                </a><div class="clearfix"></div>
            </li>
        <?php
            }
        }
    }
    echo '</ul></div>';
}

?>