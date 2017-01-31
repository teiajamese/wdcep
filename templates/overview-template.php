<?php /* Template Name: Overview Page Template */ get_header('custom'); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<section>	
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
					<?php $args= array('type'=> 'post');?>
				</div>
			</div>
		</div>
		
</section>
<?php endwhile; endif;?>

<?php get_footer(); ?>