<div class="slide" data-anchor="all">
	<section id="events">

<?php 
	$args = array(
		'post_type' => 'page',
		'pagename' => 'events'); 
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

	?>
		
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
					<div class="upcoming">
						<h3>Upcoming Events</h3>
						<?php 
						/*$paged = get_query_var('paged');
						$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
						if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
						elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
						else { $paged = 1; }*/
						$args = array(
							'post_type'=>'event',
							'order'=>'DESC',
							//'posts_per_page' => 2,
							'paged' => $paged,
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'date',
									'value' => date("mdY"),
									'compare' => '>'
									)
								)
							);
						$the_query = new WP_Query($args);
						if($the_query->have_posts()):
							
							while ( $the_query->have_posts() ) :
								$the_query->the_post();	

						?>
						<?php
						?>
							<div class="event-container">
								<div class="event-image">
									<a href="#eventsPage/event-<?php echo get_the_ID(); ?>">
										<?php the_post_thumbnail();?>
									</a>
								</div>
								<div class="event-content">
									<h4><?php the_title();?></h4>
									<p><?php $day =the_field("date");?> - <?php the_field("time");?></p>

									<p><?php the_content();?></p>
									<a href="#eventsPage/event-<?php echo get_the_ID(); ?>" alt="read more">Read More</a>
								</div>
							</div>
						
							<?php endwhile;?>
							<div id="arrowL">
						    </div>
						    <div id="arrowR">
						    </div>
						<?php endif;?>
					</div><!-- End upcoming -->
					<div class="past">
						<h3>Past Events</h3>
						<?php $args = array(
							'post_type'=>'event',
							'order'=>'ASC',
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'date',
									'value' => date("m/d/Y"),
									'compare' => '<'
									)
								)
							);
						$the_query = new WP_Query($args);
						if($the_query->have_posts()):
							
							while ( $the_query->have_posts() ) :
								$the_query->the_post();	

						?>
						<?php
						?>
							<div class="event-container">
								<div class="event-image">
								<a href="#eventsPage/event-<?php echo get_the_ID(); ?>">
									<?php the_post_thumbnail();?>
								</a>
								</div>
								<div class="event-content">
									<h4><?php the_title();?></h4>
									<p><?php the_field("date");?> - <?php the_field("time");?></p>
									<p><?php the_content();?></p>
									<a class="link" href="#eventsPage/event-<?php echo get_the_ID(); ?>" alt="read more">Read More</a>
								</div>
							</div>
						
							<?php endwhile;?>
						<?php endif;?>
					</div><!--- End Past Events-->
				</div><!--- End of Events -->
			</div><!--- End of Wrapper -->
		</section>
</div>
<?php get_template_part('custompost/content','events'); ?>