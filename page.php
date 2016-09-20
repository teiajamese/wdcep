<?php get_header(); ?>

<div id="fullpage">

	<?php get_template_part('content/content','landing'); ?>
	<div class="section " id="section2">
		<?php get_template_part('content/content','think'); ?>
	</div>
	<div class="section " id="section3">
	<?php get_template_part('content/content','social'); ?>
	</div>
	
	<div class="section " id="section4">
	<?php get_template_part('content/content','events'); ?>
	</div>
	
	<div class="section " id="section5">
	<?php get_template_part('content/content','reports'); ?>
	</div>
	<div class="section fp-auto-height" id="section6">
		<?php get_footer(); ?>
	</div>
</div>

