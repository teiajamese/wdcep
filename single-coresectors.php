<?php
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header('custom'); ?> 

<section class="coreSectors">
	<div class="hero" style="background-image:url(<?php echo get_field('hero_image')?>);">
		<div class="wrapper">
			<h1><?php $postType = get_post_type_object(get_post_type());
				if ($postType) {
				    echo esc_html($postType->labels->singular_name);
				} ?>
			</h1>

		</div>
	</div>
	<div class="content-container">
	<div class="carousel-overlay"></div>
		<div class="side-nav-container">
			<div class="side-nav">
				<?php
						$args = array(
							'menu' => "strategy"
							);
						wp_nav_menu($args);?>
						<span class="more-side">More</span>
			</div>
		</div>
		<div class="wrapper entry-content-page">
		<a href="/the-strategy/sector-analysis/" class="back"><i class="arrow left icon"></i> Back to Sector Analysis</a>
		<h2><?php the_title()?></h2>
		<?php the_content()?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
