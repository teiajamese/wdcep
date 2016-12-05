<section id="what-heard">
<?php 
	$args = array(
		'post_type' => 'page',
		'pagename' => 'what-weve-heard'); 
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

	?>
	<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
		<div class="wrapper">
			<h2>What we've heard</h2>
		</div>
	</div>
	<div class="wrapper">
		<div class="container">
			<div class="content"><?php the_content(); ?></div>
			<?php

			// check if the repeater field has rows of data
			if( have_rows('section_repeat') ):

			 	// loop through the rows of data
			    while ( have_rows('section_repeat') ) : the_row();
			?>
			<h3 class="topic-head"><?php the_sub_field("title"); ?></h3>
			<?php the_sub_field("description"); ?>
				<div class="table">
					<?php // check if the repeater field has rows of data
					if( have_rows('item_repeat') ):

					 	// loop through the rows of data
					    while ( have_rows('item_repeat') ) : the_row();
					?>
						
							<div class="title"><p><?php the_sub_field("item_title"); ?></p></div>
							<div class="title-desc"><?php the_sub_field("item_description"); ?></div>
				
					<?php endwhile; endif;?>

				</div>
			<?php endwhile; endif;?>
		</div>
	</div>
	
<?php }
	}
?>
</section>