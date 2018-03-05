
	<?php 
	if( is_home() ) :
		get_template_part( 'template-parts/content-excerpts' );
	elseif( is_search() ) : 
		get_template_part( 'template-parts/content-search' );
	elseif( is_single() ) : 
		get_template_part( 'template-parts/content-single' );
	elseif( is_404() ) : 
		get_template_part( 'template-parts/content-none' );
	else :
		get_template_part( 'template-parts/content' );
	endif;
	?>