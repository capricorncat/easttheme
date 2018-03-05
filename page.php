<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="pageheader" class="ui container">
	<h1 id="posttitle" class="ui blue header">
		<?php the_title(); ?>
	</h1>
	<div id="postmeta" class="meta ui horizontal list">
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
<?php if( have_rows( 'content_blocks' ) ) : ?>
<div id="pagecontent" class="ui container">
	<?php get_template_part( 'template-parts/content-blocks' ); ?>
<?php else : ?>
<div id="pagecontent" class="ui text container">
	<?php the_content(); ?>
<?php endif; ?>
</div>
<?php endwhile; // endwhile ( have_posts() ) ?>
<?php get_footer(); ?>