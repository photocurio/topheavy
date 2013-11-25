<?php get_header(); ?>

		<div id="primary" class="site-content">
        <?php if (!is_home()) appletree_content_nav( 'nav-above' ); ?>
        <div id="content">
			
			<?php
			global $query_string;
			if (is_mobile()) {
			query_posts( $query_string . '&posts_per_page=5&post_type=Post' );
			} else {
			query_posts( $query_string );
            }
            while (have_posts()) : the_post();
			?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('brick'); ?>>
            
            <?php if (is_tablet()) {
	            if ( function_exists( 'get_the_image' ) ) { 
	            get_the_image( array( 
	            	'size' => 'medium'
	            	) ); }
            } else { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
			<?php the_post_thumbnail('thumbnail'); ?></a> 
			<?php }?>
   
	<header class="entry-header">
		<h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php printf(  'Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>
        </a></h2>
		<div class="entry-meta">
			<p>posted <?php the_date(); ?></p>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-meta">
			<p>categorized: <?php the_category(', '); ?></p>
			<?php the_tags('<p>tagged: ',', ','</p>'); ?>
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<p class="comments-link"><?php comments_popup_link( 'got a comment?', '1 comment', '% comments' ); ?></p>
		<?php endif; ?>

		<?php edit_post_link( 'edit post', '<p>', '</p>' ); ?>
	</footer><!-- #entry-meta -->
	<hr>
</article>			
			<?php endwhile; ?>
			<!-- end of the loop -->
		</div><!-- #postsbox -->
       	<p class="nav-previous"><?php next_posts_link('older posts', 0); ?></p>        
       	<p class="nav-next"><?php previous_posts_link('newer posts', 0); ?></p>      	
        	<?php if (is_mobile()) : ?> 
			<div class="mobile-sidebar">
			<?php if ( ! dynamic_sidebar( 'mobile-bottom-sidebar' ) ) ; ?>
			</div>
			<?php endif; ?>
			
		</div><!-- #primary .site-content -->
		<?php if (!is_mobile()) { get_sidebar(); } ?>

<?php get_footer(); ?>