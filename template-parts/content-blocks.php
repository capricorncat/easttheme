	<div class="content-blocks">
  <?php while( have_rows( 'content_blocks' ) ) : the_row(); ?>

  	<?php
    if( get_row_layout() == 'paragraph' ) :

  		the_sub_field('content');

    elseif( get_row_layout() == 'image' ) :
  		$image = get_sub_field('image');
  		$display = get_sub_field('display');

      if( $display == 'float') {
        $img_src = $image['sizes']['thumbnail'];
        $img_float = get_sub_field('img_float');
        $img_class = $img_float . ' floated';
      } else {
        $img_src = $image['sizes']['medium'];
        $img_class = 'centered fluid';
      } ?>

      <div class="ui <?php echo $img_class; ?> rounded image">
        <img src="<?php echo $img_src; ?>"
             alt="<?php echo $image['alt']; ?>" />
      </div>

  	<?php
    elseif( get_row_layout() == 'image_gallery' ) :

  		cc_ui_image_gallery(get_sub_field('gallery'));

  	endif;
	endwhile; ?>
	</div><!-- /.content-blocks -->