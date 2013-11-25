<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Appletree
 * @since Appletree 1.0
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php 
			if ( is_page() || is_single() ) {
				dynamic_sidebar( 'single-sidebar' ) ;
			} else {
				dynamic_sidebar( 'sidebar-1' ) ;
			}
			?>
		</div><!-- #secondary .widget-area -->
