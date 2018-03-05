<?php
function easttheme_social_icon_link( $pr ) {
  $icn = '';
  switch ( $pr ) {
    case 'fb':
      $icn = 'facebook f';
      break;
    case 'ig':
      $icn = 'instagram';
      break;
    case 'li':
      $icn = 'linkedin';
      break;
    case 'pt':
      $icn = 'pinterest';
      break;
    case 'tw':
      $icn = 'twitter';
      break;
    case 'yt':
      $icn = 'youtube';
      break;
    default:
      $icn = 'share';
  }
  $pr_url_field_name = $pr . '_url';
  $pr_url = cc_get_opfield( $pr_url_field_name );
  $a_class = $pr . ' share link';
  $i_class = 'large circular ' . $icn . ' icon'; ?>
  <a class="<?php echo $a_class; ?>"
      href="<?php echo $pr_url; ?>" target="_blank">
    <i class="<?php echo $i_class; ?>"></i>
  </a> <?php
}
function easttheme_social_icons( $field_name = '' ) {
 /* * * * * *
  * field should return one or more of the following 2-character strings:
  * 'fb' for Facebook
  * 'ig' for
  * 'li' for
  * 'pt' for
  * 'tw' for
  * 'yt' for
  * * * * * */
	$profiles = cc_get_opfield( $field_name  );

	if ( $profiles ) { 
		?>
		<div class="ui social icons">
		<?php 
		foreach( $profiles as $profile ) {
			easttheme_social_icon_link( $profile );
		} 
		?>
		</div>
		<?php 
	}
}
?>