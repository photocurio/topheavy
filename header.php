<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="google-site-verification" content="TEoMr_F214DScnw07etXW6nxWbzg-7k4mH6cqWBXJvQ" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
	<link href='http://fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700' rel='stylesheet' />
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
	
	<?php if (is_explorer()) {echo '<link href="'.get_template_directory_uri().'/css/ie-style.css" rel="stylesheet" type="text/css">'; }else{} ?>
	<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script><![endif]-->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="webpage" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url('/'); ?>" title="<?php get_bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<h2 class="site-description"><?php bloginfo('description'); ?></h2>
		</hgroup>
		<a class="menu-button" href="#">menu</a>
		<nav role="navigation" class="site-navigation main-navigation clearfix">
			<h6 class="assistive-text">Menu</h6>
			<div class="assistive-text skip-link"><a href="#content" title="Skip to content">Skip to content</a></div>
			<?php wp_nav_menu(array('theme_location'=>'primary')); 
				?>
		</nav>
	</header><!-- #masthead .site-header -->
