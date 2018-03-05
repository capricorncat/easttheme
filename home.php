<?php get_header(); ?>
<div id="pageheader" class="ui container">
	<h1 id="pagetitle" class="ui blue header">		
	<?php _e('Blog','easttheme'); ?>
	</h1>
</div>  
<div id="pagecontent" class="ui divided unstackable post-excerpts items">
  <?php while (have_posts()) : the_post(); ?>
  	<div class="post-excerpt item">
  		<div class="content">
  			<a class="header" href="<?php the_permalink(); ?>">
					<span class="title">
  					<?php the_title(); ?>
					</span>
				</a><!-- /.header -->
				<span class="meta ui horizontal list">
					<span class="author item"> 
						<i class="mini user icon"></i> 
						<?php the_author(); ?>
					</span>
					<span class="date item">
						<i class="mini calendar outline icon"></i>
						<?php the_date(); ?>
					</span>
					<span class="time item">
						<i class="mini wait icon"></i>
						<?php the_time(); ?>
					</span>
				</span>
  			<div class="description">
  				<?php the_excerpt(); ?>
  			</div><!-- /.description -->
  			<div class="extra">
  				<?php if( get_comments_number() > 0) : ?>
  				<a class="comments" href="<?php comments_link(); ?>">
  				<?php endif; ?>
						<i class="comment icon"></i>
  					<?php comments_number( 'No comments yet', '1 comment', '% comments' ); ?>
  				<?php if( get_comments_number() > 0) : ?>
  				</a>
  				<?php endif; ?>
  			</div><!-- /.extra -->
  		</div><!-- /.content -->
  	</div><!-- /.item -->
  <?php endwhile; ?>
  </div><!-- /#pagecontent --><?php get_header(); ?>
