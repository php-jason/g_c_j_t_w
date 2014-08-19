<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'tm_myid_text'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments">
	<?php comments_number(__('No Responses', 'tm_myid_text'), __('One Response', 'tm_myid_text'), __( '% Responses', 'tm_myid_text') );?>
	<?php _e('to', 'tm_myid_text'); ?> &#8220;<?php the_title(); ?>&#8221;
	</h3>

	<ol class="commentlist">
	<?php wp_list_comments('avatar_size=58'); ?>
	</ol>

	<div class="navigation_comments">
		<div class="navigation_comments_alignleft"><?php previous_comments_link() ?></div>
		<div class="navigation_comments_alignright"><?php next_comments_link() ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'tm_myid_text'); ?></p>

	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

<!--form-->
<?php comment_form(); ?>
<!--/form-->

<?php endif; // if you delete this the sky will fall on your head ?>