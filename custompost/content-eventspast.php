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
	<?php if($datetime > $postdate):
	?>
<?php if(empty(get_field("tbd"))){ ?>

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
							<h3>Event Recap</h3>
							<p><?php echo get_field('recap');?></p>
						</div>
					</div>

					<div class="event-details">
					<?php

						// check if the repeater field has rows of data
						if( have_rows('image_gallery') ):
					?>
						<div class="image-gallery">
						<?php 
						 	// loop through the rows of data
						    while ( have_rows('image_gallery') ) : the_row();
						    // display a sub field value
							?>

						        
						    <div>
						    	<a rel="lightbox" href="<?php the_sub_field('image');?>" data-lightbox="imageEvent-<?php echo get_the_ID(); ?>" data-title="<?php the_sub_field('caption'); ?>">
							    <img src="<?php the_sub_field('image');?>">
							    </a> 

						    </div> 

						    <?php endwhile;?>
						</div>
						<?php endif;?>
												
					</div>
					
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
				</div> <!-- end of wrapper -->
			</div><!-- end of slide -->
		<?php } endif;?>
		<?php endwhile; ?>
	<?php endif; ?>