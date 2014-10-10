<?php if ( !is_user_logged_in()) { 
		include (TEMPLATEPATH . '/member.php'); 
	} else { ?>
<?php
/*
Template Name: Job Submit
*/
?>
<?php
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {
	// Do some minor form validation to make sure there is content
	if (isset ($_POST['title'])) {
		$title =  $_POST['title'];
	} else {
		echo 'Please enter Job title';
	}
	if (isset ($_POST['description'])) {
		$description = $_POST['description'];
	} else {
		echo 'Please enter Job description';
	}

	$tags = $_POST['post_tags'];
	$company_name = $_POST['company_name'];
	$company_tagline = $_POST['company_tagline'];
	$company_location = $_POST['company_location'];
	$company_email = $_POST['company_email'];

	// ADD THE FORM INPUT TO $new_post ARRAY
	$new_post = array(
	'post_title'	=>	$title,
	'post_content'	=>	$description,
	'post_category'	=>	array($_POST['cat']),  // Usable for custom taxonomies too
	'tags_input'	=>	array($tags),
	'post_status'	=>	'draft',           // Choose: publish, preview, future, draft, etc.
	'post_type'	=>	'job',  //'post',page' or use a custom post type if you want to
	'company_name'	=>	$company_name,
	'company_tagline'	=>	$company_tagline,	
	'company_location'	=>	$company_location,
	'company_email'	=>	$company_email
	);

	//SAVE THE POST
	$pid = wp_insert_post($new_post);

        //KEEPS OUR COMMA SEPARATED TAGS AS INDIVIDUAL
	wp_set_post_tags($pid, $_POST['post_tags']);
	wp_set_post_terms($pid,array($_POST['cat']),'job_type',true);
	wp_set_post_terms($pid,array($_POST['city']),'city',true);
	
	//REDIRECT TO THE NEW POST ON SAVE
	$link = include (TEMPLATEPATH . '/thankyou.php'); 
	wp_redirect( $link );

	//ADD OUR CUSTOM FIELDS
	add_post_meta($pid, 'wtf_comname', $company_name, true); 
	add_post_meta($pid, 'wtf_comdescript', $company_tagline, true); 
	add_post_meta($pid, 'wtf_comlocate', $company_location, true); 
	add_post_meta($pid, 'wtf_comail', $company_email, true); 
	
	//INSERT OUR MEDIA ATTACHMENTS
	if ($_FILES) {
		foreach ($_FILES as $file => $array) {
		$newupload = insert_attachment($file,$pid);
		// $newupload returns the attachment id of the file that
		// was just uploaded. Do whatever you want with that now.
		}

	} // END THE IF STATEMENT FOR FILES

} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
do_action('wp_insert_post', 'wp_insert_post');

?>

<?php get_header(); ?>
<div id="content" class="span8 offset2">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <div class="title">
            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	</div>
        <div class="form-content">
	<!-- JOB SUBMIT FORM -->

            <div class="jobsubmit">
                <form id="new_post" name="new_post" method="post" action="" class="jobsubmit-form" enctype="multipart/form-data">

                <!-- Job name -->
                <fieldset name="name">
                        <label for="title">Job Title:</label>
                        <input type="text" id="title" value="" tabindex="5" name="title" class="span8"/>
                </fieldset>

                <!-- Job Category -->
                <fieldset class="tax">
                        <label for="cat">Job Type:</label>
                        <?php wp_dropdown_categories( 'tab_index=10&taxonomy=job_type&hide_empty=0&class=span8' ); ?>
                </fieldset>

                <!-- Job Content -->
                <fieldset class="content">
                        <label for="description">Details of the Job:</label>
                        <textarea id="description" tabindex="15" name="description" cols="60" rows="10" class="span8"></textarea>
                </fieldset>

                <!-- Company name -->
                <fieldset class="company_name">
                        <label for="company_name">Company name</label>
                        <input type="text" value="" id="company_name" tabindex="20" name="company_name" class="span8" />
                </fieldset>

                <!-- Company tagline -->
                <fieldset class="company_tagline">
                        <label for="company_tagline">Company Tagline</label>
                        <input type="text" value="" id="company_tagline" tabindex="20" name="company_tagline" class="span8" />
                </fieldset>

                <!-- Company location -->
                <fieldset class="company_location">
                        <label for="company_location">Company Location</label>
                        <?php wp_dropdown_categories( 'tab_index=20&taxonomy=city&hide_empty=0&orderby=name&name=city&class=span8' ); ?>
                </fieldset>	

                <!-- wine Rating -->
                <fieldset class="company_email">
                        <label for="company_email">Contact Email</label>
                        <input type="text" value="" id="company_email" tabindex="20" name="company_email" class="span8" />
                </fieldset>

                <!-- images -->
                <fieldset class="images">
                        <label for="company_logo">Company Logo</label>
                        <input type="file" name="company_logo" id="company_logo" tabindex="25" />
                </fieldset>

                <fieldset class="submit">
                        <input type="submit" value="Post Job" tabindex="40" id="psubmit" name="submit" />
                </fieldset>

                <input type="hidden" name="action" value="new_post" />
                <?php wp_nonce_field( 'new-post' ); ?>

                </form>
            </div> <!-- END WPCF7 -->
        <!-- END OF FORM -->
	</div>
        
    </div>
    
    <?php endwhile; else: ?>
        <h1 class="title">Not Found</h1>
        <p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>
    <?php endif; ?>
</div>
<!--
<div id="right" class="span4">
    <h4>Why post on JobBrander?</h4>
    <p>JobBrander specializes</p>
    <div class="clear"></div>
</div>-->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php } ?> <!-- user is logged in -->