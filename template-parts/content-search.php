<div id="pageheader" class="ui container">
	<h1 id="pagetitle" class="ui blue header">		
		<?php _e('Search Results','easttheme'); ?>		
	</h1>
</div>   
<div id="pagecontent" class="ui divided unstackable post-excerpts items">
  <?php while (have_posts()) : the_post(); ?>
	<div class="post-excerpt item">
  		<div class="content">
  			<a class="header" href="<?php the_permalink(); ?>">
  				<?php the_title(); ?>
  			</a><!-- /.header -->
  			<!-- <div class="meta">
  				<span class="date">
						<i class="mini calendar outline icon"></i>
						<?php //the_date(); ?>
					</span>
  				<span class="time">
						<i class="mini wait icon"></i>
						<?php //the_time(); ?>
					</span>
  				<span class="author"> 
						<i class="mini user icon"></i> 
						<?php //the_author(); ?>
					</span>
  			</div> /.meta -->
  			<div class="description">
  				<?php the_excerpt(); ?>
  			</div><!-- /.description -->
  			<!-- <div class="extra">
  				<?php //if( get_comments_number() > 0) : ?>
  				<a class="comments" href="<?php //comments_link(); ?>">
  				<?php //endif; ?>
  					<?php //comments_number( 'No comments yet', '1 comment', '% comments' ); ?>
  				<?php //if( get_comments_number() > 0) : ?>
  				</a>
  				<?php //endif; ?>
  			</div> /.extra -->
  		</div><!-- /.content -->
  	</div><!-- /.item -->
  <?php endwhile; ?>
  </div><!-- /.items -->