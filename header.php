<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/jquery.fullpage.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV2Udu3PiIjH-mkg98Iid-DwOh4KollJY"></script>
		<?php wp_head(); ?>
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
		

		<script type="text/javascript" src="js/vendors/scrolloverflow.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				scrollOverflow: true,
				scrollOverflowOptions: {
					click: true
				}
			});
		});
	</script>-->
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper 
		<div class="wrapper">-->

			<!-- header -->
			<header class="header clear" role="banner">
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
					<!-- logo 
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
						<!--<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo.png" alt="Logo" class="logo-img">
						</a>
					</div>-->
					<!-- /logo -->

					<!-- nav 
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>-->
					<!-- /nav -->

			</header>
			<!-- /header -->
