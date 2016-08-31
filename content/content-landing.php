
<?php 
	$args = array(
		'post_type' => 'page',
		'pagename' => 'landing-page-2'); 
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

	?>
		<section id="landing" style="background-image:url(<?php echo get_field('hero_image')?>);">
			<div class="wrapper">
				<h2><?php echo get_field("headline_text");?></h2>
				<h3><?php echo get_field("sub_headline_text");?></h3>
			</div>
		</section>
		<?php }
	}
?>
<nav class="nav">
	<?php 
	$args = array(
		'menu' => "main"
		);
	wp_nav_menu($args);?>
</nav>
<div class="wrapper">
	<div class="desc">
		<?php the_content()?>
	</div>
</div>