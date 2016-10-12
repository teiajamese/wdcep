<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $datetime = date("Y-m-d g:i a");?>
<?php $postdate = get_field("datetime", false, false);?>
	<?php if($datetime > $postdate): 
	//if(empty(get_field("tbd"))):

		if(empty(get_field("tbd"))):
		
		else: 
			$content = get_the_content();
		$cleanContent =  strip_tags( $content, '<p>' );
	?>
			<div class="slide event-single" data-anchor="discussions" id="event-<?php echo get_the_ID(); ?>" data-description="<?php echo $cleanContent;?>">
			
				<div class="wrapper">
					<a href="<?php echo get_site_url()?>/#discussions">
					<div class="event-menu-close close">
						  <div class="bar1"></div>
						  <div class="bar2"></div>
					</div>
					</a>
					<h2><?php the_title();?></h2>
					<div class="event-details">
						<div class="event-img">
							<?php the_post_thumbnail();?>

						</div>
						<div class="event-content">
							<h3>Discussion Details</h3>
							<p><?php echo the_content();?></p>
						</div>
					</div>
					<div class="event-details">
						<div class="date">
							<h4>Date & Time</h4>
							<p class="time">
								<?php if(!empty(get_field('datetime'))):
										echo get_field('datetime');?> - <?php the_field('endtime');
									else:
										the_field('tbd');
									endif; 
								?>
								
							</p>
						</div>
						<div class="location">
							<h4>Location</h4>
							<p class="loc"><?php $location = get_field('location');
								if( !empty($location) ):
									$address = explode( "," , $location['address']);
									echo $address[0].'<br/>'; // street address
									echo $address[1].",".$address[2].$address[3]; // city, state zip
								endif;
							?>
							</p>
						</div>
						<div class="register">
							<h4>Register</h4>
							<?php $reg_link = get_field('registeration_link'); 
								if( !empty($reg_link) ):
								?>
									<a class="reg_link" href="<?php the_field('registeration_link');?>" target="_blank">
										<p><?php the_field('registeration');?></p>
									</a>
								<?php else: ?>
									<p><?php the_field('registeration');?></p>
								<?php endif;?>
						</div>
					</div>
					<?php 

					if( !empty($location) ):
					?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
					<?php endif; ?>
					<div class="inter-nav">
						<p class="prevArrow">&#60;</p>
						<p class="prev"><?php previous_post_link( '%link', 'Previous Issue' ) ?></p><p class="vertbar"> | </p>
						<p class="next"><?php next_post_link( '%link', 'Next Issue' ) ?><span></span></p>
						<p class="nextArrow">&#62;</p>
					</div>
					<!-- needed to create white space padding/margin breaks plugin -->
					<div class="whitespace"></div>
				</div>
			</div>
		<?php endif;?>
	<?php else: 
		$content = get_the_content();
		$cleanContent =  strip_tags( $content, '<p>' );
	?>
	<div class="slide event-single" data-anchor="discussions" id="event-<?php echo get_the_ID(); ?>" data-description="<?php echo $cleanContent;?>">
			
				<div class="wrapper">
					<a href="<?php echo get_site_url()?>/#discussions">
					<div class="event-menu-close close">
						  <div class="bar1"></div>
						  <div class="bar2"></div>
					</div>
					</a>
					<h2><?php the_title();?></h2>
					<div class="event-details">
						<div class="event-img">
							<?php the_post_thumbnail();?>

						</div>
						<div class="event-content">
							<h3>Discussion Details</h3>
							<p><?php echo the_content();?></p>
						</div>
					</div>
					<div class="event-details">
						<div class="date">
							<h4>Date & Time</h4>
							<p class="time">
								<?php if(!empty(get_field('datetime'))):
										echo get_field('datetime');?> - <?php the_field('endtime');
									else:
										the_field('tbd');
									endif; 
								?>
								
							</p>
						</div>
						<div class="location">
							<h4>Location</h4>
							<p class="loc"><?php $location = get_field('location');
								if( !empty($location) ):
									$address = explode( "," , $location['address']);
									echo $address[0].'<br/>'; // street address
									echo $address[1].",".$address[2].$address[3]; // city, state zip
								endif;
							?>
							</p>
						</div>
						<div class="register">
							<h4>Register</h4>
							<?php $reg_link = get_field('registeration_link'); 
								if( !empty($reg_link) ):
								?>
									<a class="reg_link" href="<?php the_field('registeration_link');?>" target="_blank">
										<p><?php the_field('registeration');?></p>
									</a>
								<?php else: ?>
									<p><?php the_field('registeration');?></p>
								<?php endif;?>
						</div>
					</div>
					<?php 

					if( !empty($location) ):
					?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
					<?php endif; ?>
					<div class="inter-nav">
						<?php if (strlen(get_previous_post()->post_title) > 0) { ?>
							<p class="prevArrow">&#60;</p>
							<p class="prev"><?php previous_post_link( '%link', 'Previous Issue' ) ?></p>
						<?php } ?>
						<?php if ( (strlen(get_previous_post()->post_title) == 0) || (strlen(get_next_post()->post_title) == 0)) { ?>
							
						<?php }else{?>
							<p class="vertbar"> | </p>
						<?php	}	?>
						<?php if (strlen(get_next_post()->post_title) > 0) { ?>
							<p class="next"><?php next_post_link( '%link', 'Next Issue' ) ?><span></span></p>
							<p class="nextArrow">&#62;</p>
						<?php } ?>
					</div>

				</div>
			</div>
		<?php endif;?>
		<?php endwhile; ?>
	<?php endif; ?>