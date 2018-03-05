<?php

function easttheme_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id ) { $post_id = get_the_ID(); }
	
	// Exit the function when comments for the post are closed.
	if ( ! comments_open( $post_id ) ) {
		// Fires after the comment form if comments are closed.
		do_action( 'comment_form_comments_closed' );
		return;
	}

  $html5         = 
		( 'html5' === current_theme_supports( 'html5', 'comment-form' ) )
		? 'html5' : 'xhtml';
	$noval				 = ( $html5 ? ' novalidate'  : '');
	$email_type    = ( $html5 ? 'type="email"' : 'type="text"' );
	$url_type      = ( $html5 ? 'type="url"' : 'type="text"' );
	
	$commenter     = wp_get_current_commenter();
	$user 				 = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';
	$login_url     = wp_login_url( get_permalink( $post_id ) );
	$logout_url    = wp_logout_url( apply_filters( 
				'the_permalink', get_permalink( $post_id ), $post_id ) );
	$edit_url      = get_edit_user_link();
	$form_action   = site_url( '/wp-comments-post.php' );
	$author_value  = esc_attr( $commenter['comment_author'] );
	$email_value   = esc_attr( $commenter['comment_author_email'] );
	$url_value     = esc_attr( $commenter['comment_author_url'] );
	
	$req           = get_option( 'require_name_email' );
	$aria_req      = ( $req ? " aria-required='true'" : '' );
	$html_req      = ( $req ? " required='required'"  : '' );
	$hreqs         = $aria_req . $html_req;
	
 	$required_ast  = ' <span class="required">*</span>';
	$required_text = 'Required fields are marked' . $required_ast;
	$req_text      = ( $req ? $required_text : '' );
	
	$email_notes   = 'Your email address will not be published.';
	$comment_label = 'Comment';
	$author_label  = 'Name' . $req_text;
	$email_label   = 'Email' . $req_text;
	$url_label     = 'Website';
	?>

	<div class="ui divider"></div>

	<?php do_action( 'comment_form_before' ); ?>

	<div id="respond" class="ui comment-respond container">
		
		<span id="replytitle" class="comment-reply-title header">
			
			<?php comment_form_title(); ?>		
			
			<span id="cancelreply"><?php cancel_comment_reply_link(); ?></span>
			
		</span>
		
	<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
		
		<span class="ui message must-log-in">
				You must be 
				<a class="ui link" href="<?php echo $login_url; ?>">logged in</a>
				to post a comment.
		</span>
		
		<?php do_action( 'comment_form_must_log_in_after' ); ?>
		
	<?php else : ?>
		
		<form id="commentform" class="ui comment-form form" 
					action="<?php echo $form_action; ?>" 
					method="post"<?php echo $noval; ?>>		
			
		<?php do_action( 'comment_form_top' ); ?>
			
		<?php if ( is_user_logged_in() ) : // is a user logged in? ?>
			
			<div class="message logged-in-as">
				<a href="<?php $edit_url; ?>" 
					 aria-label="Logged in as <?php echo $user_identity; ?>. Edit your profile.">Logged in as <?php echo $user_identity; ?></a>.
				<a href="<?php echo $logout_url; ?>">Log out?</a>
			</div>
			
			<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
			
		<?php else : //if user is not logged in ?>
			
			<div class="message comment-notes">
				
				<span id="email-notes">
					<?php echo $email_notes; ?>
				</span>
				
				<?php echo $req_text; ?>
				
			</div>
			
		<?php endif; ?>
			
			<div class="field comment-form-comment">
				
				<label for="comment"><?php echo $comment_label; ?></label>
				
				<textarea id="comment" name="comment" cols="45" rows="8" 
									maxlength="65525" aria-required="true" required="required">
				</textarea>
				
			</div>
			
		<?php if ( ! is_user_logged_in() ) : ?>	
			
			<?php do_action( 'comment_form_before_fields' ); ?>
			
			<div class="field comment-form-author">
				
				<label for="author"><?php echo $author_label; ?></label>
				
				<input id="author" name="author" type="text" 
							 value="<?php echo $author_value; ?>" size="30" 
							 maxlength="245" <?php echo $hreqs; ?>/>
				
			</div>
			
			<div class="field comment-form-email">
				
				<label for="email"><?php echo $email_label; ?></label>
				
				<input id="email" name="email" <?php echo $email_type; ?> 
							 value="<?php echo $email_value; ?>" size="30" maxlength="100" 
							 aria-describedby="email-notes" <?php echo $hreqs; ?>/>
				
			</div>
			
			<div class="field comment-form-url">
				
				<label for="url"><?php echo $url_label; ?></label>
				
				<input id="url" name="url" <?php echo $url_type; ?> 
							 value="<?php echo $url_value; ?>" size="30" maxlength="200" />
			
			</div>
			
			<?php do_action( 'comment_form_after_fields' ); ?>
		
		<?php endif; ?>	
			
			<div class="field form-submit">
				
				<input name="submit" type="submit" id="submit" 
							 class="ui submit button" value="Post Comment" />
				
				<?php get_comment_id_fields( $post_id ); ?>
				
			</div>
			
			<?php do_action( 'comment_form', $post_id ); ?>
			
		</form>
		
		<?php endif; ?>
		
	</div><!-- #respond -->

	<?php do_action( 'comment_form_after' ); ?>

	<?php
}




/*
function easttheme_comment_form( $args = array() ) {
	$defaults = array(
		'fields' 									 => array(
			'author'  => 
				'<div class="field comment-form-author">' . 
					'<label for="author">' . 
						__( 'Name' ) . 
						( $req ? ' <span class="required">*</span>' : '' ) . 
					'</label> ' .
					'<input id="author" name="author" type="text" value="' . 
						esc_attr( $commenter['comment_author'] ) . 
						'" size="30" maxlength="245"' . $aria_req . $html_req . ' />' . 
				'</div>',
			'email'   => 
				'<div class="field comment-form-email">' . 
					'<label for="email">' . 
						__( 'Email' ) . 
						( $req ? ' <span class="required">*</span>' : '' ) . 
					'</label> ' .
					'<input id="email" name="email" ' . 
						( $html5 ? 'type="email"' : 'type="text"' ) . 
						' value="' . esc_attr( $commenter['comment_author_email'] ) . 
						'" size="30" maxlength="100" aria-describedby="email-notes"' . 
						$aria_req . $html_req  . ' />' . 
				'</div>',
			'url'     => 
				'<div class="field comment-form-url">' . 
					'<label for="url">' . 
						__( 'Website' ) . 
					'</label> ' .
					'<input id="url" name="url" ' . 
						( $html5 ? 'type="url"' : 'type="text"' ) . 
						' value="' . esc_attr( $commenter['comment_author_url'] ) . 
						'" size="30" maxlength="200" />' . 
				'</div>'
  	),
		
		'comment_field'  					 => 
			'<div class="field comment-form-comment">' .
				'<label for="comment">' . 
					_x( 'Comment', 'noun' ) . 
				'</label>' .
				'<textarea id="comment" name="comment" cols="45" rows="8" ' . 
					'maxlength="65525" aria-required="true" required="required">' . 
				'</textarea>' . 
			'</div>',
		
    'must_log_in'  						 => 
			'<div class="ui message must-log-in">' .
				sprintf( // translators: %s: login URL  
					__( 'You must be <a href="%s">logged in</a> to post a comment.' ), 
					wp_login_url( apply_filters( 'the_permalink', 
					  get_permalink( $post_id ), $post_id ) ) ) . 
			'</div>',
			
		'logged_in_as' 				 		 => 
			'<div class="ui message logged-in-as">' . 
				sprintf(// translators: 1: edit user link, 2: a18y text, 3: user name,
					__( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. ' .
						 		// 4: logout URL
						 	'<a href="%4$s">Log out?</a>' ),
					get_edit_user_link(),
					esc_attr( sprintf( // translators: %s: user name 
						__( 'Logged in as %s. Edit your profile.' ), $user_identity ) ),
					$user_identity,
					wp_logout_url( apply_filters( 
						'the_permalink', get_permalink( $post_id ), $post_id ) ) ) . 
			'</div>',
		
		'comment_notes_before' => 
			'<div class="ui message comment-notes">' . 
				'<span id="email-notes">' . 
					__( 'Your email address will not be published.' ) . 
				'</span>'. 
				( $req ? $required_text : '' ) . 
			'</div>',
		'comment_notes_after'  => '',
		
		'action'               => site_url( '/wp-comments-post.php' ),
		
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_form'           => 'ui form comment-form',
		'class_submit'         => 'ui submit button',
		'name_submit'          => 'submit',
		
		'title_reply'          => __( 'Leave a Reply' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		
		'title_reply_before'   => 
			'<h3 id="reply-title" class="ui blue header comment-reply-title">',
		'title_reply_after'    => '</h3>',
		
		'cancel_reply_before'  => '<small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		
		'label_submit'         => __( 'Post Comment' ),
		'submit_button'        => 
			'<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		'submit_field'         => 
			'<div class="field form-submit">%1$s %2$s</div>',
		
		'format'               => 'xhtml',
  );
	$args = wp_parse_args( $args, $defaults );
	comment_form( $args );
}
*/
/**
 * Outputs a complete commenting form using Semantic UI for use within a template.
 * @param int|WP_Post $post_id Post ID or WP_Post object to generate the form for. Default current post.
 */
/*
function old_cc_sui_comment_form() {
	if ( null === $post_id ) { $post_id = get_the_ID(); }
  // Exit the function when comments for the post are closed.
	if ( ! comments_open( $post_id ) ) {
			// Fires after the comment form if comments are closed.
			do_action( 'comment_form_comments_closed' );

			return;
    }
 
	$commenter 			= wp_get_current_commenter();
	$user 					= wp_get_current_user();
	$user_identity 	= $user->exists() ? $user->display_name : '';
	$req      			= get_option( 'require_name_email' );
	$aria_req 			= ( $req ? " aria-required='true'" : '' );
	$html_req 			= ( $req ? " required='required'" : '' ); ?>
	
	<div id="respond" class="ui container comment-respond">
		
		<h3 id="reply-title" class="ui blue header comment-reply-title"><?php 
			comment_form_title( 
				__( 'Leave a Reply' ), __( 'Leave a Reply to %s' ) ); ?>
			<small><?php
				cancel_comment_reply_link( __( 'Cancel reply' ) ); ?>
			</small>	
		</h3><?php
	
	if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?> 
		
		<div class="ui message must-log-in"> 
			You must be 
			<a href="<?php wp_login_url( apply_filters( 
				'the_permalink', get_permalink( $post_id ), $post_id ) ); ?>">
				logged in
			</a> 
			to post a comment.
		</div><?php
	
		do_action( 'comment_form_must_log_in_after' );

	else : 
	
		$form_action = echo site_url( '/wp-comments-post.php' ); ?>
		
		<form action="<?php $form_action; ?>" method="post" id="commentform" 
					class="ui form comment-form"<?php $form_val; ?>><?php
	
		do_action( 'comment_form_top' );
	
		if ( is_user_logged_in() ) : 
	
			$edit_user_link = 
					echo get_edit_user_link();
			$link_aria = 
					echo 'Logged in as ' . $user_identity . '. Edit your profile.';
			$logout_link = 
					wp_logout_url( apply_filters( 'the_permalink', 
					get_permalink( $post_id ), $post_id ) ); ?>
			
			<div class="ui message logged-in-as">
				<a href="<?php $edit_user_link; ?>" aria-label="<?php echo $link_aria; ?>">
					Logged in as <?php echo $user_identity; ?>
				</a>.	
				<a href="<?php $logout_link; ?>">Log out?</a>		
			</div><?php
	
			do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
	
		else : ?>
			
			<div class="ui message comment-notes">
				<span id="email-notes">
					Your email address will not be published.
				</span><?php
				echo ( $req ? $required_text : '' ); ?>
			</div><?php 
	
		endif;
	
		$comment_fields = 
			array( 
			
				'comment' => 
					'<div class="field comment-form-comment">' .
						'<label for="comment">' . 
							_x( 'Comment', 'noun' ) . 
						'</label>' .
						'<textarea id="comment" name="comment" cols="45" rows="8" ' . 
							'maxlength="65525" aria-required="true" required="required">' . 
						'</textarea>' . 
					'</div>', 
		
				'author'  => 
					'<div class="field comment-form-author">' . 
						'<label for="author">' . 
							__( 'Name' ) . 
							( $req ? ' <span class="required">*</span>' : '' ) . 
						'</label> ' .
						'<input id="author" name="author" type="text" value="' . 
							esc_attr( $commenter['comment_author'] ) . 
							'" size="30" maxlength="245"' . $aria_req . $html_req . ' />' . 
					'</div>',

				'email'   => 
					'<div class="field comment-form-email">' . 
						'<label for="email">' . 
							__( 'Email' ) . 
							( $req ? ' <span class="required">*</span>' : '' ) . 
						'</label> ' .
						'<input id="email" name="email" ' . 
							( $html5 ? 'type="email"' : 'type="text"' ) . 
							' value="' . esc_attr( $commenter['comment_author_email'] ) . 
							'" size="30" maxlength="100" aria-describedby="email-notes"' . 
							$aria_req . $html_req  . ' />' . 
					'</div>',

				'url'     => 
					'<div class="field comment-form-url">' . 
						'<label for="url">' . 
							__( 'Website' ) . 
						'</label> ' .
						'<input id="url" name="url" ' . 
							( $html5 ? 'type="url"' : 'type="text"' ) . 
							' value="' . esc_attr( $commenter['comment_author_url'] ) . 
							'" size="30" maxlength="200" />' . 
					'</div>'
		);
	
		$comment_fields = 
			apply_filters( 'comment_form_fields', $comment_fields );
	
		$comment_field_keys = 
			array_diff( array_keys( $comment_fields ), array( 'comment' ) );

		// Get the first and the last field name, excluding the textarea
		$first_field = reset( $comment_field_keys );
		$last_field  = end( $comment_field_keys );

		foreach ( $comment_fields as $name => $field ) {
			
			if ( 'comment' === $name ) {
				echo apply_filters( 'comment_form_field_comment', $field );
			} 
			elseif ( ! is_user_logged_in() ) {
				if ( $first_field === $name ) {
					do_action( 'comment_form_before_fields' );
				}
				echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
				if ( $last_field === $name ) {
					do_action( 'comment_form_after_fields' );
				}
			}
		}

		$submit_button = sprintf(
			'<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			esc_attr( 'submit' ),
			esc_attr( 'submit' ),
			esc_attr( $args['class_submit'] ),
			esc_attr( $args['label_submit'] )
		);

		// Filters the submit button for the comment form to display.
		$submit_button = 
			apply_filters( 'comment_form_submit_button', $submit_button, $args );

		$submit_field = sprintf(
			$args['submit_field'],
			$submit_button,
			get_comment_id_fields( $post_id )
		);

		// Filters the submit field for the comment form to display. 
		// The submit field includes the submit button, hidden fields for the 
		// comment form, and any wrapper markup.
		echo apply_filters( 'comment_form_submit_field', $submit_field, $args );

		// Fires at the bottom of the comment form, inside the closing </form> tag.
		do_action( 'comment_form', $post_id ); ?>
			
		</form><?php 
	endif; ?>
</div><!-- #respond --><?php

	// Fires after the comment form.
	do_action( 'comment_form_after' );
}
*/



?>