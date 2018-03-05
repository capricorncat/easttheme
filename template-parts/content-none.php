<h2 id="pageheader" class="ui blue header">
	<?php _e( 'Oops!', 'easttheme' ); ?>
</h2>
<div id="pagecontent" class="ui padded basic segment">
	<?php _e( ( ( is_search() ) ? 
		'Sorry, but nothing matched your search terms. ' . 
		'Please try again with some different keywords.' : 
		'Sorry, it seems what you were looking for cannot be found!' ), 
	'easttheme' ); ?>
	<?php get_search_form(); ?>
</div>
