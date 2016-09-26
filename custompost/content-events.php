<?php $datetime = date("Y-m-d g:i a");?>
<?php 
	$args = array(
	'post_type'=>'event',
	'order'=>'ASC',
	'posts_per_page' => -1,
);
	
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while ( $the_query->have_posts() ) :
			$the_query->the_post();	
			$postdate = get_field("datetime", false, false);
			//$postdate = strtotime($postdate);
			//$datetime = strtotime($datetime);
			//echo 'postdate'.$postdate.'today'.$datetime;
	?>
	<?php if(empty(get_field('tbd'))):
		else:
	?>
			<div class="slide event-single" data-anchor="event-<?php echo get_the_ID(); ?>">
			
				<div class="wrapper">
					
					<div class="event-menu-close close">
						<a href="#discussions/all">
						  <div class="bar1"></div>
						  <div class="bar2"></div>
						</a>
					</div>
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
									echo $address[1].'<br/>'; // street address
									echo $address[2].','.$address[3]; // city, state zip
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
						<p>&#60;</p>
						<p class="prev">Previous Event</p><p> | </p>
						<p class="next">Next Event<span></span></p>
						<p>&#62;</p>
					</div>
					<!-- Br needed to create white space padding/margin breaks plugin -->
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
				</div>
			</div>
		<?php endif;?>
		<?php endwhile; ?>
	<?php endif; ?>