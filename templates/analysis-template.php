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
						<?php echo do_shortcode('[wpb_childpages]')?>
					</div>
				</div>
			
				<div class="wrapper">
					<div class="carousel">
					<div class="carousel-overlay"></div>
					<?php the_content(); ?>
					<?php

				// check if the repeater field has rows of data
				if( have_rows('sector_repeater') ):

				 	// loop through the rows of data
				    while ( have_rows('sector_repeater') ) : the_row();
				?>
						<?php

						// check if the repeater field has rows of data
						if( have_rows('sectors') ):

						 	// loop through the rows of data
						    while ( have_rows('sectors') ) : the_row();
						?>
					
							
							<div class="form-container" data-sector="<?php the_sub_field("title"); ?>">
								
									<img src="<?php the_sub_field("image"); ?>">
									<div class="form-overlay">
										<h3><?php the_sub_field("title"); ?></h3>
										
									</div>
								
							</div>
							<div class="sector-overlay" data-sector="<?php the_sub_field("title"); ?>">
								<div class="sector-title">
									<?php the_sub_field("title"); ?>
									<p class="close" data-sector="<?php the_sub_field("title"); ?>">X</p>
								</div>
								<?php the_sub_field("description"); ?>
							</div>

							<?php endwhile; endif;?>
					<?php endwhile; endif;?>
					
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
</div>
