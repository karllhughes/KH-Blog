<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php titeblog_page_title(); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" type="image/png" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" />
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear row-fluid" role="banner">
				<div class="medium-8 medium-offset-2 columns">
					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<?php bloginfo('name'); ?>
						</a>
					</div>
					<div class="subtitle">
						<?php bloginfo('description'); ?>
					</div>
					<!-- /logo -->
				</div>
				<div class="medium-2 columns">
					<!-- social -->
					<div class="social">
						<a href="https://www.linkedin.com/in/karllhughes" target="_blank"><i class="foundicon-linkedin"></i></a>
						<a href="https://github.com/karllhughes" target="_blank"><i class="foundicon-github"></i></a>
						<a href="https://twitter.com/karllhughes" target="_blank"><i class="foundicon-twitter"></i></a>
						<a href="<?php echo site_url('rss'); ?>" target="_blank"><i class="foundicon-rss"></i></a>
					</div>
					<!-- /social -->
				</div>
			</header>
			<!-- /header -->
