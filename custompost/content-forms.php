<?php 
	$args = array(
	'post_type'=>'form',
	'order'=>'ASC',
	);
	
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		$i = 1;
		while ( $the_query->have_posts() ) :
			$the_query->the_post();	
		

?>
			<div class="slide form-single" data-anchor="form-<?php echo get_the_ID(); ?>">
			
				<div class="wrapper">
					<a href="#whatdoyouthink/all">
						<div class="form-menu-close close">
						  <div class="bar1"></div>
						  <div class="bar2"></div>
						</div>
					</a>
					<h2 class="title"><?php the_title();?></h2>
					<div class="issue-details">
						<?php the_content(); ?>
					</div>
					<div class="issue-form-container">
						<?php echo do_shortcode(get_field('formidable'));?>
					</div>
				<p class="prev">Previous Event</p>
				<p class="next">Next Event</p>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>