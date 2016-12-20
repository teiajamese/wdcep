<?php /* Template Name: Infographic 1 Page Template */ get_header('custom'); ?>
  
<!-- header -->
			<header class="header clear" role="banner">
				<nav class="partnernav sticky" id="nav2nd">
					<div class="whiteLogo">
						<a href="#landingPage"><img src="<?php echo get_template_directory_uri()?>/img/icons/whiteLogo.png"></a>
					</div>
						<?php 
						$args = array(
							'menu' => "custom-posts"
							);
						wp_nav_menu($args);?>
				</nav>
				<div class="mobile-menu">
				  <div class="bar1"></div>
				  <div class="bar2"></div>
				  <div class="bar3"></div>
				</div>	
				<div class="mobile-menu-close">
					  <div class="bar1"></div>
					  <div class="bar2"></div>
				</div>
				<div class="mobile-menu-container">
					<nav class="nav" id="nav2nd">
						<?php 
						$args = array(
							'menu' => "custom-posts"
							);
						wp_nav_menu($args);?>
					</nav>
				</div>
					<!-- logo 
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
						<!--<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo.png" alt="Logo" class="logo-img">
						</a>
					</div>-->
					<!-- /logo -->

					<!-- nav 
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>-->
					<!-- /nav -->

			</header>
			<section id="partners">
				<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
					<div class="wrapper">
						<h2><?php the_title(); ?></h2>
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
							        <div class="span-7"><?php the_sub_field('info_description');?></div>
							        <div class="span-3"><img src="<?php the_sub_field('img');?>"/></div>
							        	
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
			</section>

<?php get_footer(); ?>
