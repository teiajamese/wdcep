<?php /* Template Name: sector Analysis Template */ ?>
<?php get_header('custom'); ?>

	<?php
			    // TO SHOW THE PAGE CONTENTS
			    while ( have_posts() ) : the_post(); ?>	

<div class="slide all" id="form0" data-anchor="all">

		<section id="think">

			<?php get_template_part('parts/hero'); ?>
			<div class="content-container">
				<div class="side-nav-container">
					<div class="side-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); ?>
						<span class="more-side">More</span>
					</div>
				</div>
			
				<div class="wrapper entry-content-page">
					<?php the_content(); ?>
					<div class="carousel">
					
					
					<?php // check if the repeater field has rows of data
						if( have_rows('sector_repeater') ):
						$count = 0;
						 	// loop through the rows of data
						    while ( have_rows('sector_repeater') ) : the_row();
						?>
						<?php if(get_sub_field('sector_anaylsis_section')): ?>
						<div class="sector-section-container  <?php if(!$count){echo 'section-active';}?>"  data-name="<?php the_sub_field("sector_anaylsis_section"); ?>">
							<p class="sector-section-title">
								<?php the_sub_field("sector_anaylsis_section"); ?>
							</p>
						</div>
						<?php endif; ?>
					<?php $count++; endwhile; endif; ?>
					<?php

				// check if the repeater field has rows of data
				if( have_rows('sector_repeater') ):
					$count = 0;
				 	// loop through the rows of data
				    while ( have_rows('sector_repeater') ) : the_row();
				?>
				<div class="sector-container <?php if(!$count){echo 'active-section';}?>" data-name="<?php the_sub_field("sector_anaylsis_section"); ?>">
				<!--<div class="carousel-overlay"></div>-->
						<?php

						// check if the repeater field has rows of data
						if( have_rows('sectors') ):
						
						 	// loop through the rows of data
						    while ( have_rows('sectors') ) : the_row();
						?>
					
							<a href="<?php the_sub_field('link');?>">
								<div class="form-container" data-sector="<?php the_sub_field("title"); ?>">
									
									<img src="<?php the_sub_field("image"); ?>">
									<div class="form-overlay">
										<h3><?php the_sub_field("title"); ?></h3>
										
									</div>
									
								</div>
							</a>
							<!--<div class="sector-overlay" data-sector="<?php the_sub_field("title"); ?>">
								<div class="sector-title">
									<?php the_sub_field("title"); ?>
									<p class="close" data-sector="<?php the_sub_field("title"); ?>">X</p>
								</div>
								<?php the_sub_field("description"); ?>
							</div>-->

							<?php endwhile; endif;?>
							</div>
					<?php $count++; endwhile; endif;?>
					
					</div>
				</div>
			</div>
			<!--<div class="overlay"></div>-->
		</section>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>