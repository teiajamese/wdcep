<?php /* Template Name: Initiatives Template */ ?>
<?php get_header('custom'); ?>

	<?php
			    // TO SHOW THE PAGE CONTENTS
			    while ( have_posts() ) : the_post(); ?>	
	

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
							$args = array(
								'post_type' => 'initiatives',
								'posts_per_page' => -1); 
							$the_query = new WP_Query($args);
							if($the_query->have_posts()){
								
								while ( $the_query->have_posts() ) {
									$the_query->the_post();

							?>
							<div class="three-col init">
							<p class="title"><?php the_title();?></p>
							<p class="excerpt"><?php echo get_the_excerpt();?></p>
							<p><?php echo get_field('link');?></p>
							<p class="time"> Timeline: </p>
							<?php echo get_field('timeline');?>
							<p class="tags">Tags: </p>
							<p>	
								<?php $categories = get_the_terms( $post->ID, 'taxonomy' );
								foreach( $categories as $category ) {
								    echo $category->name;
								} ?>
							</p>
							</div>
						<?php }}?>
					</div>
				</div>
			</section>
		<?php endwhile; ?>