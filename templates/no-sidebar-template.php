<?php /* Template Name: No Sidebar Default Template */ ?>
<?php get_header('custom'); ?>
	

			<section class="default">
				<?php get_template_part('parts/hero'); ?>
				<div class="content-container">

					<div class="wrapper">
					<?php
				    // TO SHOW THE PAGE CONTENTS
				    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				    <!--    
					<?php if( count(get_post_ancestors($post->ID)) == 2 ): ?>
					<div class="top-nav">
						<?php echo do_shortcode('[wpb_childpages]')?>
						<?php $icon = get_field('icon');?>
						<img src="<?php echo $icon;?>">
						
					</div>
				<?php endif; ?>
				-->
				        <div class="entry-content-page">
				            
								<?php the_content(); ?> <!-- Page Content -->
				           
				        </div><!-- .entry-content-page -->
				      

				    <?php
				    endwhile; //resetting the page loop
				    wp_reset_query(); //resetting the page query
				    ?>
					</div>
			    </div>
			</section>

<?php get_footer(); ?>