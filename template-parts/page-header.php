<div id="pageheader" class="ui container">
	
<?php if( is_page() ) : ?>
	<h1 id="pagetitle" class="ui blue header">	
		
	<?php if( is_home() ) : ?>
		<?php _e('Blog','easttheme'); ?>
		
	<?php elseif( is_search() ) : ?>
		<?php _e('Search Results','easttheme'); ?>
		
	<?php else : ?>
		<?php the_title(); ?>
		
	<?php endif; ?>
	</h1>
	
<?php endif; ?>
</div>