<?php get_header(); ?>
<nav class="nav" id="nav2nd">
	<div class="whiteLogo">
		<a href="#landingPage"><img src="<?php echo get_template_directory_uri()?>/img/icons/whiteLogo.png"></a>
	</div>
		<?php 
		$args = array(
			'menu' => "main"
			);
		wp_nav_menu($args);?>
	</nav>
<div class="mobile-menu">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>	
<div class="mobile-menu-close">
	  <div class="bar1"></div>
	  <div class="bar2"></div>
	</div>
<div class="mobile-menu-container">
	<nav class="nav" id="nav2nd">
		<?php 
		$args = array(
			'menu' => "main"
			);
		wp_nav_menu($args);?>
	</nav>
</div>
<div id="fullpage">

	<?php get_template_part('content/content','landing'); ?>

	<div class="section " id="section2">
	<?php get_template_part('content/content','events'); ?>
	</div>
	<div class="section " id="section3">
	<?php get_template_part('content/content','social'); ?>
	</div>
	<div class="section " id="section4">
	<?php get_template_part('content/content','think'); ?>
	</div>
	<div class="section " id="section5">
	<?php get_template_part('content/content','reports'); ?>
	</div>
</div>
<?php //get_footer(); ?>
