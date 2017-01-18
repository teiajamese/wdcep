<?php get_header('custom');?>



			<!--<h1><?php _e( 'Categories for ', 'html5blank' ); //single_cat_title(); ?></h1>-->

			
			<?php $categories = get_the_category();
				if ( ! empty( $categories ) ) {
				    //echo esc_html( $categories[0]->term_id);

				    $catID= esc_html( $categories[0]->term_id);
				  //  echo esc_url( get_category_link( $categories[0]->term_id ) ) ;
				}
				$cat_query = new WP_Query(array('posts_per_page' => 1, 'cat' => 6));
				
				?>
			<?php if ($cat_query->have_posts()): while ($cat_query->have_posts()) : $cat_query->the_post(); ?>
<section>	
		<?php get_template_part('parts/hero'); ?>
	
		<div class="content-container">
		<div class="side-nav-container">
			<div class="side-nav">
				<?php 
					$args= array('type'=> 'post');
					echo '<ul>';
					?>

					<li><a href="http://dceconomicstrategy.com/economic-dashboard/">Overview</a></li>

					<?php 
					$categories = get_categories( $args );
					foreach($categories as $cat ){
						?>
						<?php if($catID == $cat->term_id): ?>
						<li class="active-cat"> 
							<a href="<?php echo get_category_link($cat->term_id)?>"><?php echo $cat->name; ?></a>
							
							<?php 

								echo '<ul class="side-sub-nav">';
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
			<!-- article <?php edit_post_link(); ?>-->
			<div class="charts-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php $postID = get_the_ID(); ?>
				<!--<div class="overlay"></div>-->
				<div class="wrapper">
					<div class="top-nav">
						<?php
							
							echo '<ul>';
							$query = new WP_Query( array( 'cat' => $catID) );
							if ($query -> have_posts()): while($query -> have_posts() ): $query -> the_post();
								?>
								<li <?php if($postID == get_the_ID()): echo 'class = "active"'; endif; ?> >
									<a href="<?php the_permalink()?>">
										<?php if(get_field('icon')):?>
											<img src="<?php the_field('icon')?>"/>
										<?php endif;?>

									</a>
									<a href="<?php the_permalink()?>">	<?php the_title();?></a>
									
								</li>
								<?php endwhile;
								 wp_reset_query(); 
							endif;
							echo '</ul>';
						?>
					</div>
				
					<?php the_content();?>
					</div>
				 <div class="charts-container">
				 	<div class="space">
			        	<?php

						// check if the repeater field has rows of data
						if( have_rows('charts_repeater') ):

						 	// loop through the rows of data
						    while ( have_rows('charts_repeater')) : the_row();
							$rows = get_field('charts_repeater');
							$row_count = count($rows);
							if($row_count > 1):
								?>

								<div class="charts-half">
									<p class="title"> <?php echo get_sub_field('chart_title');?></p>
									<div class="chart"><?php echo do_shortcode(get_sub_field('chart_shortcode'));?></div>
								</div>
							<?php else:  ?>

						        <div class="charts-full">
									<p class="title"> <?php echo get_sub_field('chart_title');?></p>
									<div class="chart"><?php echo do_shortcode(get_sub_field('chart_shortcode'));?></div>
								</div>
						   <?php 
						   endif;
						   
						   endwhile;

						else :

						    // no rows found

						endif;

					?>
					</div>
				</div>
			</div>
			<!-- /article -->
		</div>
	
</section>
<?php endwhile; ?>


<?php endif; ?>



<?php get_footer(); ?>
