<?php

remove_filter( 'the_content', 'wpautop' );
function the_id_class($id = '',$class = '') {
	if($id != '') {
		echo ' id="' . $id . '"';
	}
	if($class != '') {
		echo ' class="' . $class . '"';
	}
}
function the_class_id($class = '', $id = '') {
	if($class != '') {
		echo ' class="' . $class . '"';
	}
	if($id != '') {
		echo ' id="' . $id . '"';
	}
}
function cc_get_opfield( $field = '' ) {
  $output = ($field != '')?get_field($field,'options'):'';
  return $output;
}
function cc_opfield( $field = '' ) {
  echo cc_get_opfield( $field );
}
function hr_get_comment_time( $comment_id = 0 ) {
	return sprintf(
		_x( '%s ago', 'Human-readable time', 'easttheme' ),
		human_time_diff( get_comment_date( 'U', $comment_id ),
										current_time( 'timestamp' ) ) );
}
function comment_feed_avatar( $comment, $args ) {
	$avatar_url = get_avatar_url( $comment, $args['avatar_size'] );
	$author_url = get_comment_author_link( $comment );
	if ( 0 != $args['avatar_size'] ) : 
	?>
		<a href="<?php echo $author_url; ?>" class="ui image">
			<img src="<?php echo $avatar_url; ?>">
		</a>
	<?php
	endif;
}

include 'easttheme-nav-menu-walker.php';
include 'easttheme-comments-walker.php';
include 'easttheme-social-icons.php';
include 'easttheme-readmore.php';
include 'easttheme-comments-feed.php';
include 'easttheme-comment-form.php';
include 'easttheme-image-gallery.php';
include 'easttheme-login-form.php';
include 'easttheme-meta-box.php';



/*
//header $nav_menu_container
function easttheme_header_nav() {
	wp_nav_menu(array(
		'theme_location' => 'primary_navigation',
		'container' => '',
		'items_wrap' => '<div id="%1$s" class="ui fluid stackable six item %2$s">%3$s</div>',
		'walker' => new Cc_Sui_Nav_Menu_Walker()
	));
}
*/



?>
