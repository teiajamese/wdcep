<section id="reports">
<?php 
	$args = array(
		'post_type' => 'page',
		'pagename' => 'past-reports'); 
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

	?>
		
			<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
				<div class="wrapper">
					<h2>Past reports</h2>
				</div>
			</div>
		<?php }
	}
?>
			<?php wp_reset_query(); ?>
			<div class="wrapper">
				<div class="reports">
				<?php $args = array(
					'post_type'=>'report',
					'order'=>'ASC');
				$the_query = new WP_Query($args);
				if($the_query->have_posts()):
					while ( $the_query->have_posts() ) :
						$the_query->the_post();

						

				?>
				
					<div class="report-container">
						<div class="report-image">
							<?php the_post_thumbnail();?>
						</div>
						<div class="report-content">
							<h3><?php the_title();?></h3>
							<p><?php the_content();?></p>
							<a href="#" alt="read more">Read More</a>
						</div>
					</div>
				
					<?php endwhile;?>
				<?php endif;?>

			
				</div>
			</div>
		</section>
		