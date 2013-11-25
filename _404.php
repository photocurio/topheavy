<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h3 class="entry-title">Error 404</h3>
					<h5>That page can't be found.</h5>
				</header>

				<div class="entry-content">
					<p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>

					<?php get_search_form(); ?>
					<div class="widget">
						<h2 class="widgettitle"><?php 'Most Used Categories'; ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					/* translators: %1$s: smilie */
					$archive_content = '<p>' . sprintf( 'Try looking in the monthly archives. %1$s', convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary .site-content -->
		<?php get_sidebar(); ?>

<?php get_footer(); ?>