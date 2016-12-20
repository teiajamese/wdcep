<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php $datetime = date("Y-m-d g:i a");?>
<?php $postdate = get_field("datetime", false, false);?>
	<?php if($datetime > $postdate):?>
<?php if(empty(get_field("tbd"))){ ?>

			<div class="slide event-single" data-anchor="discussions" id="event-<?php echo get_the_ID(); ?>">
			
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
							<h3>Discussion Recap</h3>
							<?php if(get_field('video')): ?>
								<div class="embed-container">
								<?php echo get_field('video')?>
								</div>
							<?php endif;?>
							<style>
	.embed-container { 
		position: relative; 
		padding-bottom: 56.25%;
		height: 0;
		overflow: hidden;
		max-width: 100%;
		height: auto;
	} 

	.embed-container iframe,
	.embed-container object,
	.embed-container embed { 
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
</style>
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

				</div> <!-- end of wrapper -->
			</div><!-- end of slide -->
		<?php } endif;?>
		<?php endwhile; ?>
	<?php endif; ?>