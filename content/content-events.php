<div class="slide all" data-anchor="all" >
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
					<?php $datetime = date("Y-m-d g:i a");?>
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
								?>
							<div class="upcoming">
								<h3>Upcoming Discussions</h3>
								<div id="event-carousel">
							<?php 
								while ( $the_query->have_posts() ) :
									$the_query->the_post();	

							?>

								<div class="event-container">
									<div class="event-image">
									<?php if(!empty_content($post->post_content)):?>
										<a href="<?php echo get_permalink(); ?>">
											<?php the_post_thumbnail();?>
										</a>
									<?php else:?>
										<a href="javascript:void(0)">
										<?php the_post_thumbnail();?>
										</a>
									<?php endif;?>
									</div>
									<div class="event-content">
										<h4><?php the_title();?></h4>
										<p><?php the_field("datetime");?></p>
										<p><?php the_field('tbd');?></p>
										<p><?php the_field('registeration');?></p>
										<?php $organized = get_field('organized');
										if($organized):?>
											<p class="red"><?php echo 'Organized By: '; the_field('organized');?></p>
										<?php endif;?>
										<?php if(!empty_content($post->post_content)):?>
											<a href="<?php echo get_permalink(); ?>" alt="read more">Read More</a>
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
							    </div>
							</div><!-- End upcoming -->
							<?php endif;?>
						
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
										<?php if(empty(get_field("tbd")) && empty(get_field("partner_link"))){ ?>
										
											<div class="event-container">
												<div class="event-image">
												<a href="<?php echo get_permalink(); ?>">
													<?php the_post_thumbnail();?>
												</a>
												</div>
												<div class="event-content">
													<h4><?php the_title();?></h4>
													<p><?php the_field("datetime");?></p>
													<?php $organized = get_field('organized');
													if($organized):?>
														<p class="red"><?php echo 'Organized By: '; the_field('organized');?></p>
													<?php endif;?>
													<a class="link" href="<?php echo get_permalink(); ?>" alt="read more">Read More</a>
												</div>
											</div>
										
										<?php } ?>


									<?php endif; ?>

								<?php endwhile;?>
								</div>
							</div><!--- End Past Events-->
						<?php endif;?>
						<?php wp_reset_query(); ?>

						<?php $args = array(
							'post_type'=>'event',
							'meta_query' => array(
							    array(
							        'key' => 'partner_link',
							        'value'   => array(''),
							        'compare' => 'NOT IN'
							    )
							)
						);
						$the_query = new WP_Query($args);
						if($the_query->have_posts()):?>
							<div class="past partner">
								<h3>Partner Discussions</h3>
								<div class="partner-container">
								<?php while ( $the_query->have_posts() ) :
										$the_query->the_post();	
								?>
								<div class="event-container">
									<div class="event-image">
									<a href="<?php the_field('partner_link') ?>" target="_blank">
										<?php the_post_thumbnail();?>
									</a>
									</div>
									<div class="event-content">
										<h4><?php the_title();?></h4>
										<p><?php the_content();?></p>
										<div class="partner-button">
										<a class="link" href="<?php the_field('partner_link') ?>" alt="read more" target="_blank">Read More</a>
										</div>
									</div>
									
								</div>
								<?php endwhile;?>
								</div>
							</div>
						<?php endif; ?>
				</div><!--- End of Events -->
			</div><!--- End of Wrapper -->
		</section>
</div>
