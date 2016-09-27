<div class="slide" id="form0" data-anchor="all">
<?php 
	$args = array(
		'post_type' => 'page',
		'pagename' => 'what-do-you-think'); 
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

	?>
		<section id="think">

			<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
				<div class="wrapper">
					<h2>what do you think?</h2>
				</div>

			</div>
		

		<?php }
	}
?>
		<?php wp_reset_query(); ?>
			<div class="wrapper">
				<div class="carousel">
				<?php the_content(); ?>
				<?php 
					/*$paged = get_query_var('paged');
					$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
					if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
					else { $paged = 1; }*/
					$args = array(
						'post_type'=>'form',
						'order'=>'DESC',
						//'posts_per_page' => 2,
						//'paged' => $paged,
						
						);
					$the_query = new WP_Query($args);
					if($the_query->have_posts()):
						while ( $the_query->have_posts() ) :
							$the_query->the_post();	
					?>
					<?php
					?>
						
						<div class="form-container">
							<a href="#whatdoyouthink/form-<?php echo get_the_ID(); ?>">
								<?php the_post_thumbnail();?>
								<div class=form-overlay>
									<h3><?php the_title();?></h3>
									<p><?php the_excerpt();?></p>
								</div>
							</a>
						</div>
						
				
				<?php endwhile; ?>
			<?php endif; ?>
				</div>
			</div>
		</section>
		<!-- needed to create white space padding/margin breaks plugin -->
					<div class="whitespace"></div>
</div>
<?php get_template_part('custompost/content','forms'); ?>