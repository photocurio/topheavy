<?php
/*
	Template Name: No Sidebar
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="TEoMr_F214DScnw07etXW6nxWbzg-7k4mH6cqWBXJvQ">
	<link rel="shortcut icon" href="<?php get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php get_template_directory_uri(); ?>/images/apple-touch-icon.png">
	<script type="text/javascript" src="//use.typekit.net/xgr5yfq.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<link href="<?php get_stylesheet_uri(); ?>" rel="stylesheet" />
	
	<?php if (is_explorer()) { 
	echo '<link href="' . get_template_directory_uri() . '/css/ie-style.css" rel="stylesheet" type="text/css">' ;
	} else { } ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="webpage" class="hfeed site">
	<?php // do_action( 'before' ); ?>
	<header id="masthead" class="site-header clearfix" role="banner">
		<hgroup>
			<h4 class="site-title tk-abril-display">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h4>
			<h5 class="site-description"><?php bloginfo( 'description' ); ?></h5>
		</hgroup>
		<div id="hcard-Peter-Mumford" class="vcardwidget">
		<div class="topleftspot"></div>
		<div class="toprightspot"></div>
		<div class="bottomleftspot"></div>
		<div class="bottomrightspot"></div>
		<p>
		<span class="fn">Peter Mumford</span><br>
		<span class="adr">
		<span class="street-address">44 Sargent Ave #2</span><br>
		<span class="locality">Somerville</span> <span class="region">MA</span> <span class="postal-code">02145</span><br>
		</span>
		<span class="tel">206 427 6244</span><br>
		<a class="email" href="mailto:sunraydust@gmail.com">sunraydust@gmail.com</a>
		</p></div>
	</header><!-- #masthead .site-header -->


		<div id="primary" class="site-content">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
		<div class="topleftspot"></div>
		<div class="toprightspot"></div>
		<div class="bottomleftspot"></div>
		<div class="bottomrightspot"></div>
</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_footer(); ?>