<?php
/**
 * Appletree functions and definitions
 *
 * @package Appletree
 * @since Appletree 1.0
 */


if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'appletree_setup' ) ):

function appletree_setup() {

	require( get_template_directory() . '/inc/template-tags.php' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'primary' => 'Primary Menu'
	) );
	
	add_theme_support( 'post-formats', array( 'aside', ) );
	remove_filter('the_content', 'wptexturize');
	remove_filter('the_excerpt', 'wptexturize');
	remove_filter('comment_text', 'wptexturize');
}
endif; // appletree_setup

add_action( 'after_setup_theme', 'appletree_setup' );

function appletree_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "<hr></aside>",
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	register_sidebar( array(
		'name' => 'Mobile Top Sidebar',
		'id' => 'mobile-top-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	register_sidebar( array(
		'name' => 'Mobile Bottom Sidebar',
		'id' => 'mobile-bottom-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	register_sidebar( array(
		'name' => 'Single Sidebar',
		'id' => 'single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'appletree_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function appletree_scripts() {
	global $post;
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( (!is_page() ) || (!is_single() ) || (!is_404() ) ) {
	wp_register_script( 'topheavy-scripts', get_template_directory_uri() . '/js/topheavy.js', array( 'jquery' ) );
	wp_enqueue_script( 'topheavy-scripts' ) ;
	}
}
add_action( 'wp_enqueue_scripts', 'appletree_scripts' );

function the_post_thumbnail_caption() {
  global $post;

  $thumb_id = get_post_thumbnail_id($post->id);

  $args = array(
	'post_type' => 'attachment',
	'post_status' => null,
	'post_parent' => $post->ID,
	'include'  => $thumb_id
	); 
   $thumbnail_image = get_posts($args);
   if ($thumbnail_image && isset($thumbnail_image[0])) {
   echo '<p class="caption">' . $thumbnail_image[0]->post_excerpt . '</p>';
  }
}

function the_post_thumbnail_credit() {
  global $post;
  $thumb_id = get_post_thumbnail_id($post->id);
  $args = array(
	'post_type' => 'attachment',
	'post_status' => null,
	'post_parent' => $post->ID,
	'include'  => $thumb_id
	); 
   $thumbnail_image = get_posts($args);
   if ($thumbnail_image && isset($thumbnail_image[0])) { 
     $credit 	= get_post_meta($thumb_id, 'tqmcf_photo-credit', true);
	 $crediturl = get_post_meta($thumb_id, 'tqmcf_photo-credit-url', true);
     if(count($crediturl)) echo '<p class="photocredit"><a href="'. $crediturl . '">';
	 if(count($credit)) echo $credit;
	 if(count($crediturl)) echo '</a></p>'; 
  }
}

