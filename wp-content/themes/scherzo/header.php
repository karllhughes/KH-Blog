<!doctype html>

<html <?php language_attributes(); ?>>

	<head>
	
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		
		<title><?php wp_title(' &mdash; ',true,'right'); ?><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>

		<?php if ( is_home() ) {?>
			
			<meta name="description" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
						
		<?php } ?>

		<link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
						
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<link rel="profile" href="http://gmpg.org/xfn/11">
		
		<meta name="viewport" content="width=device-width, maximum-scale=1.0">
		
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

		<?php wp_head(); ?>
<!-- Google+ Code -->
<link href="https://plus.google.com/101080316492181821858" rel="author" />

<script type="text/javascript">
window.___gcfg = {lang: 'en'};
(function() 
{var po = document.createElement("script");
po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(po, s);
})();</script>

<!-- Google Analytics Code -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19700764-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
		
	</head>
	
	<body <?php body_class(); ?>>
	
<header id="site-header" role="banner" style="background-color:#eee;;>
				
					<div id="branding">


<a class="header-link" href="<?php echo home_url(); ?>" rel="index" title="Go to home page">
<img src="http://karllhughes.com/blog/wp-content/uploads/2012/07/logo650.png" alt="Karl L. Hughes - Technology Entrepreneur in Online Publishing" style="max-width:90%;height:auto;margin:10px 5%;" />
</a>
						
					</div> <!-- end #branding -->
					
				</header>
		
	
		<div id="wrapper">
	
				
			<div id="content" role="main">