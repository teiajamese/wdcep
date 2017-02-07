<?php /* Template Name: Action framework Template */ get_header('custom'); ?>
  

			<section class="framework">
				<?php get_template_part('parts/hero'); ?>
				<div class="content-container">
					<div class="side-nav-container">
						<div class="side-nav">
							<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); ?>
							<span class="more-side">More</span>
						</div>
					</div>
					
					<?php
				    // TO SHOW THE PAGE CONTENTS
				    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				        <div class="entry-content-page">
				        	<div class="content section">
				            <div class="wrapper">
				            	<?php the_content(); ?>
								
								<?php

								// check if the repeater field has rows of data
								if( have_rows('info2') ):

								 	// loop through the rows of data
								    while ( have_rows('info2') ) : the_row();

								       ?>
								    <div class="intro-copy two-column"> 
										<div class="section-desc">
										   	<?php the_sub_field('section_description')?>
										</div>
									</div>
										<?php 
										// check if the repeater field has rows of data
										if( have_rows('sectors_repeater') ):
										?>
									
									<div class="two-column">
									<ul class="sector-list">
										<?php 
										 	// loop through the rows of data
										    while ( have_rows('sectors_repeater') ) : the_row();
										?>
										
											<?php $colorsTogether = get_sub_field('sector_color'); 
													$colors = explode(",",$colorsTogether);
													$backgroundColor = $colors[0];
													$hoverColor = $colors[1];
													?>
												<li class="sector-list" data-name= "<?php the_sub_field('sector_title');?>" style="background:<?php echo $backgroundColor;?>" data-hover-color="<?php echo $hoverColor;?>" data-background-color="<?php echo $backgroundColor;?>" >
													<img src="<?php the_sub_field('sector_icon');?>">
													<p><?php the_sub_field('sector_title');?></p>
												</li>

												
											
										
										<?php endwhile; endif; ?> 
										</ul>
									</div>
								</div>
				            </div>
								

									<div class="content section" data-attr="<?php the_sub_field('section_name');?>">
									<div class="wrapper">
									    <div class="sector-full">

										<?php 
										// check if the repeater field has rows of data
										if( have_rows('sectors_repeater') ):

										 	// loop through the rows of data
										    while ( have_rows('sectors_repeater') ) : the_row();
											?>
											<div class="sector-text hide-item" data-name= "<?php the_sub_field('sector_title');?>">
												<div >
													<h4><img src="<?php the_sub_field('sector_icon');?>"><?php the_sub_field('sector_title')?></h4>
													<?php the_sub_field('sector_description')?>
												</div>
											</div>
											
											
											<?php 
											endwhile;
											endif;?>
										</div>
									</div>
									</div>
									<?php 
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
				<div class="overlay"></div>
			</section>

<?php get_footer(); ?>
