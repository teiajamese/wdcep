<?php /* Template Name: Infographic 1 Page Template */ get_header('custom'); ?>
  

			<section id="partners">
				<?php get_template_part('parts/hero'); ?>
				<div class="content-container">
					<div class="side-nav-container">
						<div class="side-nav">
							<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); ?>
							<span class="more-side">More</span>
						</div>
					</div>
					<div class="wrapper">
					<?php
				    // TO SHOW THE PAGE CONTENTS
				    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				        <div class="entry-content-page">
				            <?php the_content(); ?> <!-- Page Content -->
				             <div>
							    	<ul>
							    	<?php

								// check if the repeater field has rows of data
								if( have_rows('info_info') ):

								 	// loop through the rows of data
								    while ( have_rows('info_info') ) : the_row();

								       ?>
								   
								    		<li class="info-icon" data-attr="<?php the_sub_field('label');?>">
								    			<img src="<?php the_sub_field('icon');?>"/>
								    			<div class="fadein"><h3><?php the_sub_field('label');?></h3></div>
								    			
								    		</li>

								    	
								    	<!--
								        -->
								   
								    <?php 
								    endwhile;

								else :

								    // no rows found

								endif;

								?></ul> </div>
								<?php

								// check if the repeater field has rows of data
								if( have_rows('info_info') ):

								 	// loop through the rows of data
								    while ( have_rows('info_info') ) : the_row();

								       ?>

									<div class="content" data-attr="<?php the_sub_field('label');?>">
									    <div class="info-header">
									    	<h3><?php the_sub_field('label');?></h3>
									    </div>
									    <?php if(get_sub_field('img')): ?>	
									        <div class="span-7"><?php the_sub_field('info_description');?></div>
									        <div class="span-3"><img src="<?php the_sub_field('img');?>"/></div>
								    	<?php else: ?>
								        	<div><?php the_sub_field('info_description');?></div>
								        <?php endif; ?>
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
				</div>
				<div class="overlay"></div>
			</section>

<?php get_footer(); ?>
