<?php /* Template Name: What we've heard Template */ ?>
<?php get_header('custom'); ?>

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
	<?php
			    // TO SHOW THE PAGE CONTENTS
			    while ( have_posts() ) : the_post(); ?>	
	<section>	
	<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
		<div class="wrapper">
			<h2>What we've heard</h2>
		</div>
	</div>
	<div class="wrapper">
		<div class="container">
			<div class="content"><?php the_content(); ?></div>
			<?php

			// check if the repeater field has rows of data
			if( have_rows('section_repeat') ):

			 	// loop through the rows of data
			    while ( have_rows('section_repeat') ) : the_row();
			?>
			<h3 class="topic-head"><?php the_sub_field("title"); ?></h3>
			<?php the_sub_field("description"); ?>
				<div class="table">
					<?php // check if the repeater field has rows of data
					if( have_rows('item_repeat') ):

					 	// loop through the rows of data
					    while ( have_rows('item_repeat') ) : the_row();
					?>
						
							<div class="title"><p><?php the_sub_field("item_title"); ?></p></div>
							<div class="title-desc"><?php the_sub_field("item_description"); ?></div>
				
					<?php endwhile; endif;?>

				</div>
			<?php endwhile; endif;?>
		</div>
	</div>
</section>	
<?php endwhile;
?>
