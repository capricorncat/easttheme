<?php
/* * * * *
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage SEastTheme
 * @since SEast Theme 1.0
 * * * * */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) { return; } 
//
?>


<div id="comments" class="ui container post-comments">
<?php if ( have_comments() ) : ?> 
	<div class="ui divider"></div>
	<h2 class="ui small blue header comments-title">
		<i class="comment icon"></i>
		<?php
		printf( _nx( 'One comment on "%2$s"', 
					 			 '%1$s comments on "%2$s"',
								 get_comments_number(),
								 'comments title', 
								 'easttheme' 
							 ), 
						number_format_i18n( get_comments_number() ),
						get_the_title() 
					); 
		?>
	</h2><!-- .comments-title -->
	<div class="comments-body">
		<?php easttheme_comments_feed(); ?>
	</div><!-- .comments-body -->
	<?php endif; // Check for have_comments(). ?>
	<?php easttheme_comment_form(); ?>
</div><!-- #comments -->
<?php //*/ ?>