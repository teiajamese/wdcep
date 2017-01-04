<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<section>	
	<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
		<div class="wrapper">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php //the_title(); ?>
				<?php $categories = get_the_category();
				if ( ! empty( $categories ) ) {
				    echo esc_html( $categories[0]->name );
				  //  echo esc_url( get_category_link( $categories[0]->term_id ) ) ;
				}?>
			</a></h2>
		</div>
	</div>
	<div class="wrapper">
		<div class="container">
		<!-- article <?php edit_post_link(); ?>-->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			foreach( $categories as $category ) {
			     $cat_id = $category->term_id;
			}
			echo '<ul>';
			$query = new WP_Query( array( 'cat' => $cat_id) );
			if ($query -> have_posts()): while($query -> have_posts() ): $query -> the_post();
				?>
				<li><a href="<?php the_permalink()?>"><?php the_title();?></a></li>
				<?php endwhile;
				 wp_reset_query(); 
			endif;
			echo '</ul>';
		?>
		<?php 
			$args= array('type'=> 'post');
			echo '<ul>';
			$categories = get_categories( $args );
			foreach($categories as $cat ){
				?>
				<li><a href="<?php echo get_category_link($cat->term_id)?>"><?php echo $cat->name; ?></a></li>
			<?php	}
			echo '</ul>';
		?>

		<?php if(get_field('icon')):?>
			<img src="<?php the_field('icon')?>"/>
		<?php endif;?>
		<img src="<?php the_field('icon_gray')?>"/>
		<?php the_content();?>
		<?php

			// check if the repeater field has rows of data
			if( have_rows('charts_repeater') ):

			 	// loop through the rows of data
			    while ( have_rows('charts_repeater') ) : the_row();

			        // display a sub field value
			        
			        the_sub_field('chart_title');
					echo do_shortcode(get_sub_field('chart_shortcode'));

			    endwhile;


			endif;

		?>
		</article>
		<!-- /article -->
		</div>
	</div>
</section>
<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
