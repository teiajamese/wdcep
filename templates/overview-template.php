<?php /* Template Name: Overview Page Template */ get_header('custom'); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<section>	
		<?php get_template_part('parts/hero'); ?>
	
		<div class="content-container">
		<div class="side-nav-container">
			<div class="side-nav">
				<?php 
					$args= array('type'=> 'post');
					echo '<ul><li><a href="http://dceconomicstrategy.com/economic-dashboard/">Overview</a></li>';
					$categories = get_categories( $args );
					foreach($categories as $cat ){
						?>
						<?php if($catID == $cat->term_id): ?>
						<li class="active-cat"> 
							<a href="<?php echo get_category_link($cat->term_id)?>"><?php echo $cat->name; ?></a>
							
							<?php 

								echo '<ul class="side-sub-nav">';
								?>
								
								<?php
								$query = new WP_Query( array( 'cat' => $cat->term_id) );
								if ($query -> have_posts()): while($query -> have_posts() ): $query -> the_post();
									?>
									<li>
										
										<a href="<?php the_permalink()?>">	<?php the_title();?></a>

										
									</li>
									<?php endwhile;
									 wp_reset_query(); 
								endif;
								echo '</ul>';
							?>

						</li>
						<?php else: ?>
							<li><a href="<?php echo get_category_link($cat->term_id)?>"><?php echo $cat->name; ?></a></li>
						<?php endif;?>
					<?php	}
					echo '</ul>';
				?>
				<span class="more-side">More</span>
			</div>
			</div>
			<div class="content">
				<div class="wrapper">
					<?php the_content();?>
				</div>
			</div>
		</div>
		
</section>
<?php endwhile; endif;?>

<?php get_footer(); ?>