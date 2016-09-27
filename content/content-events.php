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
					<h2>Discussions</h2>
				</div>
			</div>
		<?php }
	}
?>
	<?php wp_reset_query(); ?>
			<div class="wrapper">
				<div class="events">
					<div class="upcoming">
						<h3>Upcoming Discussions</h3><?php $datetime = date("Y-m-d g:i a");?>
						<div id="event-carousel">
							<?php 
							/*$paged = get_query_var('paged');
							$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
							if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
							elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
							else { $paged = 1; }*/
							$args = array(
								'post_type'=>'event',
								'order'=>'DESC',
								'orderby'=> 'meta_value',
								'posts_per_page' => -1,
								'paged' => $paged,
								'meta_query' => array(
									'relation' => 'OR',
									array(
										'key' => 'datetime',
										'value' => $datetime,
										'compare' => '>=',
										'type' => 'DATETIME',
										),
									array(
										'key' => 'tbd',
										'value' => 'tbd',
									),	
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
									<?php if(!empty_content($post->post_content)):?>
										<a href="#discussions/event-<?php echo get_the_ID(); ?>">
											<?php the_post_thumbnail();?>
										</a>
									<?php else:?>
										<a href="#">
										<?php the_post_thumbnail();?>
										</a>
									<?php endif;?>
									</div>
									<div class="event-content">
										<h4><?php the_title();?></h4>
										<p><?php the_field("datetime");?></p>
										<p><?php the_field('tbd');?></p>
										<p><?php the_field('registeration');?></p>
										<p><?php //the_content();?></p>
										<?php if(!empty_content($post->post_content)):?>
											<a href="#discussions/event-<?php echo get_the_ID(); ?>" alt="read more">Read More</a>
										<?php else:?>
											<p>Coming Soon</p> 
										<?php endif;?>
									</div>
								</div>
							
								<?php endwhile;?>
								<!--<div id="arrowL">
							    </div>
							    <div id="arrowR">
							    </div>-->
							<?php endif;?>
						</div>
					</div><!-- End upcoming -->
					<?php wp_reset_query(); ?>
					<?php $datetime = date("Y-m-d g:i a");?>
						<?php $args = array(
							'post_type'=>'event',
							'order'	=> 'DESC',
							'orderby' => 'meta_value',
							'meta_key' => 'datetime',
						);
						$the_query = new WP_Query($args);
						if($the_query->have_posts()):
							?>
							<div class="past">
								<h3>Past Discussions</h3>
								<div id="pastevent-carousel">	
								<?php while ( $the_query->have_posts() ) :
										$the_query->the_post();	
										$postdate = get_field("datetime", false, false);
										//$postdate = strtotime($postdate);
										//$datetime = strtotime($datetime);
										//echo $postdate;
								?>
									<?php if($datetime > $postdate): ?>
										<?php if(empty(get_field("tbd"))){ ?>
										
											<div class="event-container">
												<div class="event-image">
												<a href="#discussions/event-<?php echo get_the_ID(); ?>">
													<?php the_post_thumbnail();?>
												</a>
												</div>
												<div class="event-content">
													<h4><?php the_title();?></h4>
													<p><?php the_field("datetime");?></p>
													<p><?php the_content();?></p>
													<a class="link" href="#discussions/event-<?php echo get_the_ID(); ?>" alt="read more">Read More</a>
												</div>
											</div>
										
										<?php }?>

									
									<?php endif; ?>
								<?php endwhile;?>
								</div>
							</div><!--- End Past Events-->
						<?php endif;?>
					
				</div><!--- End of Events -->
			</div><!--- End of Wrapper -->
		</section>
		<!-- needed to create white space padding/margin breaks plugin -->
					<div class="whitespace"></div>
</div>
<?php get_template_part('custompost/content','eventspast'); ?>
<?php get_template_part('custompost/content','events'); ?>