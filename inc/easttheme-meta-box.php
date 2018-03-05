<?php

function easttheme_meta_box( $args = array() ) {
  global $current_user;
  get_currentuserinfo();
	$welcome_msg = '';
	
  if( is_user_logged_in() ){
    $user_meta  = get_user_meta($current_user->ID);
    $first_name = $user_meta['first_name'][0];
    $nickname   = $user_meta['nickname'][0];
		$name       = 
			( $first_name != '' ) ? $first_name : $nickname;
		$edit_link  = get_edit_user_link();
		$edit_aria  = 'Logged in as ' . $name . '. Edit your profile.';
		$logout_url    = 
			wp_logout_url( apply_filters( 
				'the_permalink', get_permalink( $post_id ), $post_id ) );
	?>
		<span class="ui header">
			Welcome <a href="<?php $edit_link; ?>" 
								 aria-label="<?php echo $edit_aria; ?>">
				<?php echo $name; ?></a>!
			<a href="<?php echo $logout_url; ?>">Log out?</a>
		</span>
	<?php
	} else {
	?>
		<span class="ui top attached header">Welcome!</span>
		<div class="ui bottom attached segment">
			<?php easttheme_login_form(); ?>
		</div>
	<?php
	}
}


/* 
function easttheme_meta_box( $args = array() ) {
  global $current_user;
  get_currentuserinfo();
  $output = '<div class="ui vertical items">';
  if( is_user_logged_in() ){
    $user_meta  = get_user_meta($current_user->ID);
    $first_name = $user_meta['first_name'][0];
    $nickname   = $user_meta['nickname'][0];

    $welcome_msg = sprintf(
      __( '<span class="header">Welcome %s!</span>' ),
      ( $first_name != '' ) ? $first_name : $nickname
    );
    $output .= '<div class="item"><div class="content">';
    $output .= $welcome_msg;
    $output .= '</div></div>';

  } else {
    $output .= '<div class="item"><div class="content">';
    $output .= easttheme_login_form(array('echo' => false));
    $output .= '</div></div>';
  }
  $output .= '</div>';
  return $output;
}
*/
?>