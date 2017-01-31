<?php get_header('custom'); ?>
	

			<section>
				<?php get_template_part('parts/hero'); ?>
				<div class="content-container">
				<div class="side-nav-container">
					<div class="side-nav">
						<?php echo do_shortcode('[wpb_childpages]')?>
						<span class="more-side">More</span>
					</div>
				</div>

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
				            <?php if(get_field('video')):?>
				            	<div class= "two-column">
				            	<?php the_content(); ?> <!-- Page Content -->
				            	</div>
				            	<div class= "two-column">
					            	<div class="embed-container">
									<?php echo get_field('video')?>
									</div>
								</div>
							<?php else: ?>
								<?php the_content(); ?> <!-- Page Content -->
				            <? endif; ?>
				        </div><!-- .entry-content-page -->
				        <div class="charts-container">
				        	<?php

						// check if the repeater field has rows of data
						if( have_rows('charts_repeater') ):

						 	// loop through the rows of data
						    while ( have_rows('charts_repeater') ) : the_row();
							?>
							<div class="charts-half">
								<p class="title"> <?php echo get_sub_field('chart_title');?></p>
								<div class="chart"><?php echo do_shortcode(get_sub_field('chart_shortcode'));?></div>
							</div>
							<?php
						       
						       
						    endwhile;

						else :

						    // no rows found

						endif;

						?>
						</div>

				    <?php
				    endwhile; //resetting the page loop
				    wp_reset_query(); //resetting the page query
				    ?><?php
$ancestors = array();
$ancestors = get_ancestors($post->ID,'page');
$parent = (!empty($ancestors)) ? array_pop($ancestors) : $post->ID;
if (!empty($parent)) {
  $kids = new WP_Query(
    array(
      'post_parent'=>$parent,
      'post_type' => 'page',
    )
  );
  if ($kids->have_posts()) {
    while ($kids->have_posts()) {
      $kids->the_post();
      echo '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail().'</a>';
    }
  }
}?>
					</div>
			    </div>
			</section>

<?php get_footer(); ?>
