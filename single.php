<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="pageheader">
	<div class="ui container">
		<h1 id="posttitle" class="ui blue header">
			<?php the_title(); ?>
		</h1>
	</div>
	<div id="postmeta" class="meta ui horizontal list container">
		<div class="item"> 
			<i class="mini user icon"></i> 
			<span class="author"><?php the_author(); ?></span>
		</div>
		<div class="item">
			<i class="mini calendar outline icon"></i>
			<span class="date"><?php the_date(); ?></span>
		</div>
		<div class="item">
			<i class="mini wait icon"></i>
			<span class="time"><?php the_time(); ?></span>
		</div>
	</div>
</div>
<div id="pagecontent">
	<div id="postcontent" class="ui text container">
		<?php the_content(); ?>
	</div>
	<div id="postextras" class="ui container">
	<?php
	// If comments are open 
	if ( comments_open() || // or we have at least one comment,
	 												get_comments_number() ) {
		comments_template(); // load up the comment template. 
	}
	?>
	</div>
</div>
<?php endwhile; // endwhile ( have_posts() ) ?>
<?php get_footer(); ?>