<?php /* Template Name: Initiatives Template */ ?>
<?php get_header('custom'); ?>

	<?php
			    // TO SHOW THE PAGE CONTENTS
			    while ( have_posts() ) : the_post(); ?>	
	

			<section class="initiatives">
				<?php get_template_part('parts/hero'); ?>
				<div class="content-container">
				<div class="carousel-overlay"></div>
					<div class="side-nav-container">
						<div class="side-nav">
							<?php echo do_shortcode('[wpb_childpages]')?>
							<span class="more-side">More</span>
						</div>
					</div>
					<div class="wrapper">
						<div class="filterMenu">

							<?php 
								$taxonomy = 'topics';
								$terms = get_terms($taxonomy, array('parent' => 0));

								if($terms && !is_wp_error($terms)):
									foreach($terms as $term){
										$termID = $term->term_id; 
										?>
										<div class="ui dropdown selection">
										<select class="filters">
										
										<option value=""><?php echo $term->name; ?></option>
										<option value="*">All</option>
										<?php
										$termchildren = get_terms( $taxonomy, array('child_of' => $termID));
										foreach ($termchildren as $child) {
											//$childTerm = get_term_by('id', $child, '$taxonomy');
											//$childName = $childTerm->name;
											
											echo '<option value=".'.$child->slug.'">'.$child->name.'</option>';
										}?>
										</select>
										
			  								<input type="hidden" name="<?php echo $term->name; ?>">
			  								<i class="dropdown icon"></i>
											<div class="default text"><?php echo $term->name; ?></div>  
												<div class="menu">
													<div class="item" data-value="*">All</div>
													<?php
													$termchildren = get_terms( $taxonomy, array('child_of' => $termID));
													foreach ($termchildren as $child) {
														//$childTerm = get_term_by('id', $child, '$taxonomy');
														//$childName = $childTerm->name;
														
														echo '<div class="item" data-value=".'.$child->slug.'">'.$child->name.'</div>';
													}
													?>
												</div>
										</div>
												
								<?php	}
								endif;
								?>
								<div class="ui search">
			  						<div class="ui icon input">
										<input class="prompt" type="text" id="quicksearch" placeholder="Search" />
										 <i class="search icon"></i>
		  							</div>
	  							</div>
								<!--<button class="ui button isotope-reset">Reset</button>-->
						</div>
					    
					  
						
					
						<div class="grid">
							<?php 
								$args = array(
									'post_type' => 'initiatives',
									'posts_per_page' => -1); 
								$the_query = new WP_Query($args);
								if($the_query->have_posts()){
									
									while ( $the_query->have_posts() ) {
										$the_query->the_post();

								?>
								<div class="three-col init <?php $categories = get_the_terms( $post->ID, 'topics' );
									foreach( $categories as $category ) {
									    echo $category->slug.' ';
									} ?>">
								<p class="title" data-name="<?php the_title();?>"><?php the_title();?></p>
								<p class="excerpt"><?php the_content();?></p>
								<p><?php echo get_field('link');?></p>
								<p class="time"> Timeline: <?php echo get_field('timeline');?></p>
								
								</div>
								<div class="sector-overlay" data-name="<?php the_title();?>">
									<div class="sector-title">
										<?php the_title();?>
										<p class="close" data-name="<?php the_title();?>"><i class="remove icon"></i></p>
									</div>
									<?php the_field('blurb');?>
								</div>
								
							<?php }}?>
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
		<script type="text/javascript">$('.ui.dropdown')
  .dropdown()
;</script>
		<?php get_footer(); ?>