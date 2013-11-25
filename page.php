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
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
		<?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
		<div class="topleftspot"></div>
		<div class="toprightspot"></div>
		<div class="bottomleftspot"></div>
		<div class="bottomrightspot"></div>
</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>