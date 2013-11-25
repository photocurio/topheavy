<?php get_header(); ?>

		<div id="primary" class="site-content">
			<div id="single_content" role="main">
			<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php appletree_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			$category_list = get_the_category_list( ', ' ); echo ('<br>');
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! appletree_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = 'tagged %2$s. <br />bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
				} else {
					$meta_text = 'bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = 'posted in %1$s <br />tagged %2$s. <br />bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
				} else {
					$meta_text = 'posted in %1$s. <br />bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
        <hr>
        <div class="post-navigation clearfix">
		<span class="previouspost"><?php previous_post_link(); ?></span><span class="nextpost"><?php next_post_link(); ?></span>
        </div>
	</footer><!-- .entry-meta -->
    	<div class="topleftspot"></div>
		<div class="toprightspot"></div>
		<div class="bottomleftspot"></div>
		<div class="bottomrightspot"></div>
</article>


				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>
			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>