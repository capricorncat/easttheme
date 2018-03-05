<?php 

class EastTheme_Comments_Walker extends Walker_Comment {

	   public function start_lvl     ( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

		switch ( $args['style'] ) {
			case 'ol':
				$output .= '<ol class="children">' . "\n";
				break;
			case 'ul':
				$output .= '<ul class="children">' . "\n";
				break;
			case 'div':	
			default:
				break;
		}
  }

	   public function end_lvl       ( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

		switch ( $args['style'] ) {
			case 'ol':
				$output .= "</ol><!-- .children -->\n";
				break;
			case 'ul':
				$output .= "</ul><!-- .children -->\n";
				break;
			case 'div':
			default:
				break;
			}
	} 

	protected function ping          ( $comment, $depth    , $args ) 					 {
		$tag = ( 'div' == $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" 
				<?php comment_class( 'event', $comment ); ?>>
			<div class="label"><?php _e( 'Pingback:' ); ?></div>
			<div class="comment-body content">
				<div class="summary">
					<?php comment_author_link( $comment ); ?>
					<?php edit_comment_link( __( 'Edit' ), 
						'<span class="edit-link">', '</span>' ); ?>
					</div>
				</div>
			</div>
			<?php
	}

	protected function comment       ( $comment, $depth    , $args ) 					 {
		$author_link  = get_comment_author_link( $comment );
		$comment_link = esc_url( get_comment_link( $comment, $args ) );
		$comment_time = hr_get_comment_time();
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		echo '<' . $tag . ' '; 
			comment_class( $this->has_children ? 'parent event' : 'event', $comment ); echo 'id="comment-'; 
			comment_ID(); 
			echo '">';
		?>
		<div class="label">	
			<?php comment_feed_avatar( $comment, $args ); ?>
		</div>	
		<div class="content">
			<div class="summary">
				<?php /* translators: %s: comment author link */
					printf( __( '%s <span class="says">says:</span>' ),
						sprintf( '<cite class="user">%s</cite>', $author_link ) );
				?>
				<div class="date">
					<a href="<?php echo $comment_link; ?>">
					<?php echo $comment_time; ?>
					</a>
					<?php edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' ); ?>
				</div>
			</div>
			<div class="extra text">
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation warning message">
					<?php _e( 'Your comment is awaiting moderation.' ) ?>
				</em>
				<br />
			<?php endif;
				comment_text( $comment, array_merge( $args, array( 
					'add_below' => $add_below, 
					'depth'     => $depth, 
					'max_depth' => $args['max_depth'] ) ) 
				); 
			?>
			</div>
			<div class="meta">	
			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>'
				) ) );
			?>
			</div>
		</div>
	<?php 
}

	protected function html5_comment ( $comment, $depth    , $args ) 					 {
		$author_link  = get_comment_author_link( $comment );
		$comment_link = esc_url( get_comment_link( $comment, $args ) );
		$comment_time = hr_get_comment_time();
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		
		echo 
		'<' . $tag . ' '; 
			comment_class( $this->has_children ? 'parent event' : 'event', $comment ); 
			echo 'id="comment-'; 
			comment_ID(); 
			echo '">';
		?>
		<div class="label">	
			<?php comment_feed_avatar( $comment, $args ); ?>
		</div>	
		<div class="content">
			<div class="summary">
				<?php /* translators: %s: comment author link */
					printf( __( '%s <span class="says">says:</span>' ),
						sprintf( '<cite class="user">%s</cite>', $author_link ) );
				?>
				<div class="date">
					<a href="<?php echo $comment_link; ?>">
					<?php echo $comment_time; ?>
					</a>
					<?php edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' ); ?>
				</div>
			</div>
		<div class="extra text">
		<?php if ( '0' == $comment->comment_approved ) : ?>
			<em class="comment-awaiting-moderation warning message">
				<?php _e( 'Your comment is awaiting moderation.' ) ?>
			</em>
			<br />
		<?php endif;
			comment_text( $comment, array_merge( $args, array( 
				'add_below' => $add_below, 
				'depth'     => $depth, 
				'max_depth' => $args['max_depth'] ) ) 
			); 
		?>
		</div>
		<div class="meta">	
		<?php
			comment_reply_link( array_merge( $args, array(
				'add_below' => $add_below,
				'depth'     => $depth,
				'max_depth' => $args['max_depth'],
				'before'    => '<div class="reply">',
				'after'     => '</div>'
			) ) );
		?>
		</div>
		</div>
	<?php
	}
	
}

?>