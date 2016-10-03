<?php get_header(); ?>

<div id="fullpage">

	<?php get_template_part('content/content','landing'); ?>
	<div class="section " id="whatdoyouthink">
		<?php get_template_part('content/content','think'); ?>
	</div>
	<div class="section " id="join-the-conversation">
	<?php get_template_part('content/content','social'); ?>
	</div>
	
	<div class="section " id="discussions">
	<?php get_template_part('content/content','events'); ?>
	</div>
	
	<div class="section " id="resources">
	<?php get_template_part('content/content','reports'); ?>
	</div>
	<div class="section fp-auto-height" id="section6">
		<?php get_footer(); ?>
	</div>
</div>

