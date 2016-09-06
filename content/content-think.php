<?php 
	$args = array(
		'post_type' => 'page',
		'pagename' => 'what-do-you-think'); 
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

	?>
		<section id="think">
			<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
				<div class="wrapper">
					<h2>what do you think</h2>
				</div>
			</div>
		</section>
		<?php }
	}
?>
