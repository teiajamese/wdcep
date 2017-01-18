<?php /* Template Name: Infographic 2 Page Template */ get_header('custom'); ?>
  

			<section>
				<?php get_template_part('parts/hero'); ?>
				<div class="content-container">
					<div class="side-nav-container">
						<div class="side-nav">
							<?php echo do_shortcode('[wpb_childpages]')?>
						</div>
					</div>
					<div class="wrapper">
					<?php
				    // TO SHOW THE PAGE CONTENTS
				    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				        <div class="entry-content-page">
				            <?php the_content(); ?> <!-- Page Content -->
				            
								<?php

								// check if the repeater field has rows of data
								if( have_rows('info2') ):

								 	// loop through the rows of data
								    while ( have_rows('info2') ) : the_row();

								       ?>

									<div class="content section" data-attr="<?php the_sub_field('section_name');?>">
									    <div class="section-title">
									    	<h3><?php the_sub_field('section_name');?></h3>
									    </div>
									   <div class="section-desc">
									   		<?php the_sub_field('section_description')?>
									   </div>
								    
									<?php 
									// check if the repeater field has rows of data
									if( have_rows('sectors_repeater') ):

									 	// loop through the rows of data
									    while ( have_rows('sectors_repeater') ) : the_row();
										?>
										<div>
											<div>
												<?php the_sub_field('sector_title')?>
												<?php the_sub_field('sector_description')?>
											</div>
										</div>
										
										
										<?php 
										endwhile;
										endif;
										echo '</div>';
								    endwhile;

								else :

								    // no rows found

								endif;

								?>
				        </div><!-- .entry-content-page -->

				    <?php
				    endwhile; //resetting the page loop
				    wp_reset_query(); //resetting the page query
				    ?>
				    </div>
				</div>
			</section>

<?php get_footer(); ?>
