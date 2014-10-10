<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php jb_page_title(); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" />
<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-responsive.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Antic+Slab' rel='stylesheet' type='text/css' />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />

<?php
 wp_enqueue_script('jquery');
 wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() .'/js/bootstrap.js');

?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25155800-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>


<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head();

if ( is_user_logged_in() ) {
    show_admin_bar(false); ?>
    <style type="text/css" >
        body { margin-top: 0; }
        #wpadminbar{display:none; visibility: hidden; height:0;}
        @media (max-width: 979px) {
            body {
                margin-top: -30px;
            }
        }
    </style>
<?php
}
?>

</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div style="padding:0 30px;">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1 class="brand"><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><span class="front-word">Job</span>Brander</a></h1>
          <?php if(!is_page('interns') && !is_page('employers') && !is_page('checkout')) { ?>
          <div class="nav-collapse collapse">
            <?php wp_nav_menu( array(
                'container_id' => 'submenu',
                'theme_location' => 'primary',
                'menu_class'=>'navbar',
                'fallback_cb'=> 'fallbackmenu',
                'items_wrap' => '<ul class="nav">%3$s</ul>',
                ) );
            ?>
          </div>
          <div class="nav-collapse collapse">
          <?php if(is_user_logged_in()) { global $current_user; get_currentuserinfo(); ?>
          <ul class="nav pull-right" id="profile_info">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if($current_user->jb_photo_url) { ?>
                        <img src="<?php echo $current_user->jb_photo_url; ?>" class="profile_image" /><?php } ?>
                        <?php echo $current_user->display_name; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo get_author_posts_url($current_user->ID); ?>">View Profile</a></li>
                        <li><a href="<?php echo get_edit_user_link(); ?>">Edit Profile</a></li>
                        <li><a href="<?php echo wp_logout_url(jb_current_url()); ?>">Logout</a></li>
                    </ul>
                </li>
          </ul>
          <?php }  else { ?>
          <ul class="nav pull-right" id="profile_info">
              <li>
                  <div style="padding: 10px 15px 10px;"><strong>Login: </strong></div>
              </li>
                <li>
                    <a href="<?php echo wp_login_url(jb_current_url() ); ?>" >
                        Job Seekers</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink( get_page_by_path( 'employers' ) ); ?>" >
                        Employers</a>
                </li>
          </ul>
          <?php } ?>
          </div>
          <?php } ?>

        </div>
      </div>
    </div>

<div id="casing" class="container" >
    <div class="row" id="main-body">
        <?php //if(!is_page('interns')) { jb_show_top_search_bar(); } ?>
