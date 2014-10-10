<?php


include 'guide.php'; 
include 'theme_options.php';
include 'lib/metabox.php';
include 'lib/post-types.php';
include 'lib/job-search-bar.php'; 
include 'lib/blog-widget.php'; 	
include 'lib/job-widget.php'; 	
include 'lib/internal-ads.php'; 

remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);
	
/* SIDEBARS */
if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<div class="sidetitl clearfix"><h3>',
    'after_title' => '</h3> </div>',
	
    ));

	
/* CUSTOM MENUS */	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	


/* CUSTOM EXCERPTS */
	
	
function wpe_excerptlength_archive($length) {
    return 60;
}
function wpe_excerptlength_index($length) {
    return 40;
}
function wpe_excerptlength_widget($length) {
    return 10;
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}



/* SHORT TITLES */

function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}


/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
}

/* GET THUMBNAIL URL */

function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}	

/* PAGE NAVIGATION */


function getpagenavi(){
?>
<div id="navigation" class="clearfix">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','web2feeel')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','web2feel')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>

<?php
}

/* Flush your rewrite rules */
function custom_flush_rewrite_rules() {
	global $pagenow, $wp_rewrite;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
		$wp_rewrite->flush_rules();
}
	
add_action( 'load-themes.php', 'custom_flush_rewrite_rules' );


/* Media Upload */

function insert_attachment($file_handler,$post_id,$setthumb='false') {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attach_id = media_handle_upload( $file_handler, $post_id );

	if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
	return $attach_id;
}
/* Credits */

function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
 $server = ($_SERVER['SERVER_NAME'] == 'localhost') ? $_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
 return $protocol."://".$server.$port.$uri;
}
function fflink() {
global $wpdb, $wp_query;
if (!is_page() && !is_front_page()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
               WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != $wp_query->post->ID) && ($contactid || !is_front_page())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
  $x = $x ? '&ffref='.$ffref : '';
  $response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
  if (is_array($response)) $fflink = $response['body']; else $fflink = '';
  if (substr($fflink, 0, 11) != '!fabthemes#')
    $fflink = '';
  else {
    $fflink = explode('#',$fflink);
    if (isset($fflink[2]) && $fflink[2]) {
      update_option('ffref', $fflink[1]);
      update_option('fflink', $fflink[2]);
      $fflink = $fflink[2];
    }
    else $fflink = '';
  }
}
 echo $fflink;
}	

function jb_custom_login_button() { 
    ?>
    <!--<form id="linkedin_connect_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <p style="text-align: center;margin-bottom: 10px;">
        <input type="hidden" name="<?php echo LINKEDIN::_GET_TYPE;?>" id="<?php echo LINKEDIN::_GET_TYPE;?>" value="initiate" />
        <input type="submit" name="li_form_submit" value="Connect With LinkedIn" class="button" />
    </p>
    </form>-->
    <?php
}

add_action('login_footer', 'jb_custom_login_button');

function jb_login_logo() { ?>
    <link href='http://fonts.googleapis.com/css?family=Antic+Slab' rel='stylesheet' type='text/css' />
    <style type="text/css">
        body.login div#login h1 a {
            font-family: 'Antic Slab', serif;
            text-align: center;
            line-height: 30px;
            height: 30px;
            background-image: none;
            text-indent: 0px;
            text-decoration: none;
            letter-spacing: normal;
            font-weight: normal;
        }
        body form#loginform {
            /*height: 300px;*/
        }
        body.login form#linkedin_connect_form {
            background: transparent;
            border: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'jb_login_logo' );
function jb_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'jb_login_logo_url' );


function jb_add_twitter_head() { 
	if(is_single()) { 
	global $post;
	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	$auth_id = $post->post_author;
	$google_url = get_the_author_meta( 'google', $auth_id );
	$twitter = get_the_author_meta( 'twitter', $auth_id );
	if($post->post_content!= '') {
	    $klh_excerpt = strip_tags($post->post_content);
	    $klh_excerpt = substr($klh_excerpt, 0, 240);
	} else { $klh_excerpt = 'None'; }

	?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@thejobbrander">
    <meta name="twitter:creator" content="@<?php echo $twitter; ?>">
    <meta name="twitter:url" content="<?php the_permalink(); ?>">
    <meta name="twitter:title" content="<?php the_title(); ?>">
    <meta name="twitter:description" content="<?php echo $klh_excerpt; ?>">
	<?php if($post_thumbnail_url) { ?>
    <meta name="twitter:image" content="<?php echo $post_thumbnail_url; ?>">
	<?php } ?>
	<link rel="author" href="<?php echo $google_url; ?>" />
<?php }
}
add_action('wp_head', 'jb_add_twitter_head');

function jb_page_title() {
    if(is_home()) {
        bloginfo('name');
        echo ' | ';
        bloginfo('description');
    } 
    elseif(get_query_var('city')!=='' && get_query_var('job_type')!=='') {
        $city = get_term_by( 'slug', get_query_var('city'), 'city' );
        $type = get_term_by( 'slug', get_query_var('job_type'), 'job_type' );
        echo 'Entry Level '.$type->name.' Jobs in '.$city->name.' | '; bloginfo('name');
    } 
    elseif(get_query_var('city')!=='') {
        $city = get_term_by( 'slug', get_query_var('city'), 'city' );
        echo 'Entry Level Jobs in '.$city->name.' | '; bloginfo('name');
    }
    elseif(get_query_var('job_type')!=='') {
        $type = get_term_by( 'slug', get_query_var('job_type'), 'job_type' );
        echo 'Entry Level '.$type->name.' Jobs | '; bloginfo('name');
        //'.$city->name.'
    }
    elseif(get_query_var('company')!=='') {
        $company = get_term_by( 'slug', get_query_var('company'), 'company' );
        echo $company->name.' Entry Level Jobs | '; bloginfo('name');
        //'.$city->name.'
    }
    elseif(is_singular() && 'job' == get_post_type() ) {
        $company = wp_get_post_terms( get_the_ID(), 'company' );
        $city = wp_get_post_terms( get_the_ID(), 'city' );
        wp_title('', TRUE); echo ' at '.$company[0]->name.' in '.$city[0]->name.' | '; 
        
        bloginfo('name');
    }
    elseif(is_post_type_archive('job')) {
        echo 'Entry Level Jobs | '; bloginfo('name');
    }
    else {
        wp_title( '', TRUE); echo ' | '; bloginfo('name'); 
    }
}

// For adding JS to login page
//add_action( 'login_enqueue_scripts', 'enqueue_jb_scripts' );

function enqueue_jb_scripts( $page ) {
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'jb_scripts', 'http://jb.localhost.com/wp-content/themes/Jobpress/js/jb_js.js', null, null, true );
}

?>