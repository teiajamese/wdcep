<?php /* Template Name: What we've heard Template */ ?>
<?php get_header('custom'); ?>

	<?php
			    // TO SHOW THE PAGE CONTENTS
			    while ( have_posts() ) : the_post(); ?>	
	<section>	
	<?php get_template_part('parts/hero'); ?>
	<div class="content-container">
		<div class="side-nav-container">
			<div class="side-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); ?>
				<span class="more-side">More</span>
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
	</div>
	<div class="overlay"></div>
</section>	
<?php endwhile;
?>
<?php get_footer(); ?>