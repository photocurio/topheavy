<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to appletree_comment() which is
 * located in the functions.php file.
 *
 * @package Appletree
 * @since Appletree 1.0
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h5 class="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'appletree' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
			
		</h5>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
			<h5 class="assistive-text"><?php 'Comment navigation'; ?></h5>
			<div class="nav-previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
			<div class="nav-next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use appletree_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define appletree_comment() and that will be used instead.
				 * See appletree_comment() in functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'appletree_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
			<h5 class="assistive-text"><?php 'Comment navigation'; ?></h5>
			<div class="nav-previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
			<div class="nav-next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php 'Comments are closed.'; ?></p>
	<?php endif; ?>

	<?php 
	if (is_mobile()) {
	$args = array(
	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . 'Comment' . '</label><textarea id="comment" name="comment" cols="28" rows="8" aria-required="true"></textarea></p>',
	'logged_in_as' => '<p class="logged-in-as">' . sprintf( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	'comment_notes_before' => '<p class="comment-notes">' . 'Your email address will not be published.' . ( $req ? $required_text : '' ) . '</p>',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . 'Name', 'domainreference' . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="27"' . $aria_req . ' /></p>',
		'email' => '<p class="comment-form-email"><label for="email">' . 'Email', 'domainreference' . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="27"' . $aria_req . ' /></p>',
		'url' => '<p class="comment-form-url"><label for="url">' . 'Website', 'domainreference' . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="27" /></p>' ) ) );
		} else {
		$args = array(
		'comment_notes_after' => ''
		);
		}
	comment_form($args); ?>
	<hr>
</div><!-- #comments .comments-area -->
