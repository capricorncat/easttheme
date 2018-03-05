<?php while ( have_posts() ) : the_post(); ?>
	<?php														
	if( have_rows( 'content_blocks' ) ) {
		get_template_part( 'template-parts/content-blocks' ); 
	} else { 
		the_content(); 
	}
					?>										
<?php endwhile; ?>