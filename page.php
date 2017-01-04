<?php get_header('custom'); ?>
	

			<section>
				<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
					<div class="wrapper">
						<h2><?php the_title(); ?></h2>
					</div>
				</div>
				<div class="content-container">
					<div class="side-nav">
						<?php echo do_shortcode('[wpb_childpages]')?>
					</div>
					<div class="wrapper">
					<?php
				    // TO SHOW THE PAGE CONTENTS
				    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				        
					<?php if( count(get_post_ancestors($post->ID)) == 2 ): ?>
					<div class="top-nav">
						<?php echo do_shortcode('[wpb_childpages]')?>
						<?php $icon = get_field('icon');?>
						<img src="<?php echo $icon;?>">
						
					</div>
				<?php endif; ?>
				        <div class="entry-content-page">
				            <?php the_content(); ?> <!-- Page Content -->
				            <?php if(get_field('video')):?>
				            	<div class="embed-container">
								<?php echo get_field('video')?>
								</div>
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
