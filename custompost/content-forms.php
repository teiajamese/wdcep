<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="slide form-single" data-anchor="whatdoyouthink" id="form-<?php echo get_the_ID(); ?>">
	
		<div class="wrapper">
			<a href="<?php echo get_site_url()?>/#whatdoyouthink">
				<div class="form-menu-close close">
				  <div class="bar1"></div>
				  <div class="bar2"></div>
				</div>
			</a>
			<h2><?php the_title();?></h2>
			<div class="issue-details">
				<h3>Question</h3>
				<?php the_content(); ?>
			</div>
			<div class="issue-form-container">
				<?php echo do_shortcode(get_field('formidable'));?>
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
		</div>
	</div>
<?php endwhile; endif; ?>
