<?php 
	$args = array(
		'post_type' => 'page',
		'pagename' => 'events'); 
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

	?>
		<section id="events">
			<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
				<div class="wrapper">
					<h2>Events</h2>
				</div>
			</div>
		<?php }
	}
?>
	<?php wp_reset_query(); ?>
			<div class="wrapper">
				<div class="events">
				<?php $args = array(
					'post_type'=>'event',
					'order'=>'ASC');
				$the_query = new WP_Query($args);
				if($the_query->have_posts()):
					while ( $the_query->have_posts() ) :
						$the_query->the_post();

						

				?>
				
					<div class="event-container">
						<div class="event-image">
							<?php the_post_thumbnail();?>
						</div>
						<div class="event-content">
							<h3><?php the_title();?></h3>
							<p><?php the_field("date");?></p>
							<p><?php the_field("time");?></p>
							<p><?php the_content();?></p>
						</div>
					</div>
				
					<?php endwhile;?>
				<?php endif;?>
				</div>
			</div>
		</section>
		