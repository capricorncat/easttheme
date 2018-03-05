<?php

/* */
function easttheme_comments_feed() { 
	echo '<div class="ui feed">';
	wp_list_comments( $args = array(
		'style' => 'div',
		'walker' => new EastTheme_Comments_Walker(),
	) ); 
	echo '</div>';
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
	// Are there comments to navigate through? 
		echo 
		'<nav id="comment-nav-below" class="comment-navigation" role="navigation">' .
			'<h1 class="screen-reader-text">';
				esc_html__( 'Comment navigation', 'easttheme' );
		echo 
			'</h1>' . 
			'<div class="nav-previous">';
				previous_comments_link( 
					'<i class="left arrow icon"></i> ' . 
					esc_html__( 'Older Comments', 'easttheme' ) 
				); 
		echo 
			'</div>' . 
			'<div class="nav-next">';	
				next_comments_link( 
					esc_html__( 'Newer Comments', 'easttheme' ) . 
					' <i class="right arrow icon"></i>' 
				);
		echo 
			'</div>' . 
		'</nav>';
	} // Check for comment navigation.
	
	// If comments are closed and there are comments, 
	// let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && 
			post_type_supports( get_post_type(), 'comments' ) ) { 
		echo '<p class="no-comments">';
		esc_html_e( 'Comments are closed.', 'easttheme' ); 
		echo '</p><!-- .no-comments -->';
	}
}

?>