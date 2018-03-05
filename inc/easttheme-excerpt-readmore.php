<?php
/* * * * *
 * easttheme_excerpt_readmore( $more )
 * replaces excerpt's '...' to
 * '... <a href="{permalink}" class="readmore">Read More</a>'
 * * * * */
function easttheme_excerpt_readmore() {
	$elip      = ' ... ';
	$link      = get_permalink($post->ID);
	$class     = 'ui readmore link';
	$open_tag  = '<a href="' . $link . '" class="' . $class . '">';
	$text      = __('Read More');
	$close_tag = '</a>';
	
	return $elip . $open_tag . $text . $close_tag;
}
// comment out the following line to deactivate this filter
add_filter('excerpt_more', 'easttheme_excerpt_readmore'); 
?>