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
			<div class="slide form-single" data-anchor="whatdoyouthink" id="form-<?php echo get_the_ID(); ?>">
			
				<div class="wrapper">
					
						<div class="form-menu-close close">
						
						  <div class="bar1"></div>
						  <div class="bar2"></div>
						</div>
					
					<h2><?php the_title();?></h2>
					<div class="issue-details">
						<h3>Question</h3>
						<?php the_content(); ?>
					</div>
					<div class="issue-form-container">
						<?php echo do_shortcode(get_field('formidable'));?>
					</div>
					<div class="inter-nav">
						<p class="prevArrow">&#60;</p>
						<p class="prev">Previous Issue</p><p class="vertbar"> | </p>
						<p class="next">Next Issue<span></span></p>
						<p class="nextArrow">&#62;</p>
					</div>
					<!-- needed to create white space padding/margin breaks plugin -->
					<div class="whitespace"></div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>