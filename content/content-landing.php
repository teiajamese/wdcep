
<div class="section" id="section0">
	<?php 
		$args = array(
			'post_type' => 'page',
			'pagename' => 'landing-page'); 
		$the_query = new WP_Query($args);
		if($the_query->have_posts()){
			
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

		?>
			<section id="landing" style="background-image:url();">
			
				<div class="landing-hero" data-video="<?php echo get_field('video');?>" style="background-image:url('<?php echo get_field('hero_image')?>')">
				<div id="player"></div>
				</div>
			
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
					<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo.png" alt="Logo" class="logo-img">
					</a>
					<div class="logos">
					<img src="<?php echo get_template_directory_uri(); ?>/img/icons/WDCEP-Mayor-Bowser-Logo-Landing.png" alt="Logo" >
					</div>
				</div>
				<div class="head-wrapper wrapper">
					<h2><?php echo get_field("headline_text");?></h2>
					<h3><?php echo get_field("sub_headline_text");?></h3>

				</div>
				<?php if(get_field('video')):?>

				<div class="play">
				<!--<img src="<?php echo get_template_directory_uri() ?>/img/playButton.png" alt="play button">-->
				</div>

				<?php endif; ?>
				<div class="logos bottom">
					<img src="<?php echo get_template_directory_uri(); ?>/img/icons/WDCEP-DC-Gov-Logos-Landing.png" alt="Logo" >
				</div>
			</section>
			<?php }
		}
	?>

	<nav class="nav">
	<div class="whiteLogo">
		<a href="#landing"><img src="<?php echo get_template_directory_uri()?>/img/icons/whiteLogo.png"></a>
	</div>
		<?php 
		$args = array(
			'menu' => "main"
			);
		wp_nav_menu($args);?>
	<div class="newsletter"><a href="<?php get_template_directory_uri()?>/join">Join Our Newsletter</a></div>
	</nav>
</div>
<nav class="mobile-nav">
<div class="newsletter"><a href="<?php get_template_directory_uri()?>/join">Join Our Newsletter</a></div>
</nav>
<div class="section fp-auto-height" id="section1">	
	<div class="wrapper">
		<div class="desc">
			<?php the_content()?>
		</div>
	</div>
</div>
