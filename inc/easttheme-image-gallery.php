<?php

/* */
function easttheme_image_gallery( $images = array(), $cards_per_row = 4, $is_stackable = true ) {
	if( !( $is_stackable ) ) {
		$stack = '';
	} else {
		$stack = ' stackable';
	}
	$cards_class = 'ui ' . $cards_per_row . $stack . ' cards';
	if( $images ) :
		echo '<div class="' . $cards_class . '">';
		foreach( $images as $image ) :
			echo '<a class="card" href="' .
				$image['url'] . '" alt="' . $image['alt'] . '">';
			echo '<div class="image">';
			echo '<img src="' . $image['sizes']['thumbnail'] . '" alt="' . $image['alt'] . '">';
			echo '<p>' . $image['caption'] . '</p>';
			echo '</div>';
			echo '</a>';
		endforeach;
		echo '</div>';
	endif;
}

?>