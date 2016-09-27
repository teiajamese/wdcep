<?php 
	$args = array(
		'post_type' => 'page',
		'pagename' => 'join-the-conversation'); 
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

	?>
		<section id="social">
			<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
				<div class="wrapper">
					<h2>Join the conversation</h2>
					
				</div>

			</div>
			<div class="wrapper">
				<?php the_content() ?>
			</div>
			<!-- needed to create white space padding/margin breaks plugin -->
					<div class="whitespace"></div>
		</section>
		<?php }
	}
?>
	
	