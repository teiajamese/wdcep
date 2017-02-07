<?php /* Template Name: Overview Page Template */ get_header('custom'); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<section class="overview">	
		<?php get_template_part('parts/hero'); ?>
	
		<div class="content-container">
			<div class="side-nav-container">
				<div class="side-nav">
					<?php 
						$args = array(
							'menu' => "dashboard"
							);
						wp_nav_menu($args);?>

					<span class="more-side">More</span>
				</div>
			</div>
			<div class="content">
				<div class="wrapper">
					<?php the_content();?>
				</div>
					<?php $args= array('type'=> 'post');
						$categories = get_categories( $args );
						foreach($categories as $cat ){

							?>
							<div class="content section">
								<div class="wrapper">
									<h3><?php echo $cat->name; ?></h3>
									<div class="section-desc"></div>
									<div class="dashboard-icons">
										
									<?php $query = new WP_Query( array( 'cat' => $cat->term_id) );
										if ($query -> have_posts()): while($query -> have_posts() ): $query -> the_post();
										?>
										
										
												<div class="col-6">
													<a href="<?php the_permalink();?>">
														<img src="<?php the_field('icon');?>">
														<p><?php echo the_title();?></p>
													</a>
												</div>
											
									
										
										<?php endwhile; endif;?>	
											
										</div>
								</div>
							</div>
						<?php }?>

			</div>
		</div>
		<!--<div class="overlay"></div>-->
</section>
<?php endwhile; endif;?>

<?php get_footer(); ?>