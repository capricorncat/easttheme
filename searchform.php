<?php




?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form class="ui search form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="sr-only" for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text">Search for:</span>
	</label>
	<div class="ui mini action input">
		<input type="search" id="<?php echo $unique_id; ?>" class="prompt" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
		<button class="ui mini icon button" type="submit">
			<i class="search icon"></i>
		</button>
	</div>
</form>
