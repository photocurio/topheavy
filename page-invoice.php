<?php
/*
	Template Name: Invoice
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="google-site-verification" content="TEoMr_F214DScnw07etXW6nxWbzg-7k4mH6cqWBXJvQ" />
	<link rel="shortcut icon" href="<?php get_template_directory_uri(); ?>/images/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
	
	<script src="//use.typekit.net/xgr5yfq.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/invoice.js"></script>
	
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
	<link href="<?php echo get_template_directory_uri(); ?>/css/invoice.css" rel="stylesheet" />
	<?php if (is_explorer()) { 
	echo '<link href="' . get_template_directory_uri() . '/css/ie-style.css" rel="stylesheet" type="text/css">' ;
	} else { } ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
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
			<h2 class="invoice site-title">INVOICE</h2>
		</hgroup>
		<div id="hcard-Peter-Mumford" class="vcardwidget">
		<p>
		<span class="fn">Peter Mumford</span><br>
		<span class="adr">
		<span class="street-address">44 Sargent Ave #2</span><br>
		<span class="locality">Somerville</span> <span class="region">MA</span> <span class="postal-code">02145</span><br>
		</span>
		<span class="tel">206 427 6244</span><br>
		<a class="email" href="mailto:sunraydust@gmail.com">sunraydust@gmail.com</a>
		</p>
		<div class="topleftspot"></div>
		<div class="toprightspot"></div>
		<div class="bottomleftspot"></div>
		<div class="bottomrightspot"></div>
		</div>
	</header><!-- #masthead .site-header -->

		<div id="primary" class="site-content">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		
			<h1>Recipient</h1>
			<address contenteditable>
				<p>Some Company<br>c/o Some Guy</p>
			</address>
			<table class="meta">
				<tr>
					<th class="secondtolast"><span>Invoice #</span></th>
					<td class="last"><span contenteditable>101138</span></td>
				</tr>
				<tr>
					<th class="secondtolast"><span>Date</span></th>
					<td class="last"><span contenteditable>January 1, 2012</span></td>
				</tr>
				<tr>
					<th class="secondtolast"><span>Amount Due</span></th>
					<td class="last"><span id="prefix" contenteditable>$</span><span>600.00</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span>Item</span></th>
						<th><span>Description</span></th>
						<th><span>Rate</span></th>
						<th class="secondtolast"><span>Quantity</span></th>
						<th class="last"><span>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
						<td><span contenteditable>Experience Review</span></td>
						<td><span data-prefix>$</span><span contenteditable>150.00</span></td>
						<td><span contenteditable>4</span></td>
						<td class="last"><span data-prefix>$</span><span>600.00</span></td>
					</tr>
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance">
				<tr>
					<th><span>Total</span></th>
					<td class="last"><span data-prefix>$</span><span>600.00</span></td>
				</tr>
				<tr>
					<th><span>Amount Paid</span></th>
					<td class="last"><span data-prefix>$</span><span contenteditable>0.00</span></td>
				</tr>
				<tr>
					<th><span>Balance Due</span></th>
					<td class="last"><span data-prefix>$</span><span>600.00</span></td>
				</tr>
			</table>

		<aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>Please pay by check to Peter Mumford, or &#8216;send money&#8217; by Paypal to sunraydust@gmail.com.</p>
			</div>
		</aside>
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