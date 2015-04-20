<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<div id="wrap">
			<header class="navbar navbar-default navbar-fixed-top" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
          	</button>
						<a class="navbar-brand" href="<?php echo home_url(); ?>/" itemscope itemtype="http://schema.org/Organization">
									<img src="<?php echo get_template_directory_uri() ?>/library/images/logo.png" alt="<?php bloginfo('name'); ?>">
						</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse" id="navbar">
						<?php wp_nav_menu(array(
											'container' => false,                           // remove nav container
											'container_class' => 'menu cf',                 // class of container (should you choose to use it)
											'menu' => __( 'The Main Menu', 'skeletontheme' ),  // nav name
											'menu_class' => 'nav navbar-nav',               // adding custom nav class
											'theme_location' => 'main-nav',                 // where it's located in the theme
											'before' => '',                                 // before the menu
														'after' => '',                                  // after the menu
														'link_before' => '',                            // before each link
														'link_after' => '',                             // after each link
														'depth' => 2,                                   // limit the depth of the nav
											'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>
					</div>
				</div>
			</header>
