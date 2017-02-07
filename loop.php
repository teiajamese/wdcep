<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<section>	
	<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
		<div class="wrapper">
			<div class="hero-content">
				<h1>
					<?php $categories = get_the_category();
					if ( ! empty( $categories ) ) {
					    echo esc_html( $categories[0]->name );
					    $catID= esc_html( $categories[0]->term_id);
					  //  echo esc_url( get_category_link( $categories[0]->term_id ) ) ;
					}?>
				</h1>
			<h2><?php the_title(); ?></h2></div>
		</div>
	</div>
	
		<div class="content-container">
			<div class="side-nav-container">
				<div class="side-nav">
					<p>close</p>
					<?php 
						$args = array(
							'menu' => "dashboard"
							);
						wp_nav_menu($args);?>

					<span class="more-side">More</span>
				</div>
			</div>
			<!-- article <?php //edit_post_link(); ?>-->
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
						if( have_rows('tableau_repeater') ):

						 	// loop through the rows of data
						    while ( have_rows('tableau_repeater') ) : the_row();
							?>
				 	<?php echo get_sub_field('tableau'); ?>
			        	<?php endwhile; endif;?>
					</div>
				</div>
			</div>
			<!-- /article -->
		</div>
	<div class="overlay"></div>
</section>
<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
