<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/img/favicons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri()?>/img/favicons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/img/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri()?>/img/favicons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri()?>/img/favicons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri()?>/img/favicons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri()?>/img/favicons/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/jquery.fullpage.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/slick/slick.css"/>

		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/slick/slick-theme.css"/>
		<link href="<?php echo get_template_directory_uri();?>/lightbox2-master/dist/css/lightbox.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV2Udu3PiIjH-mkg98Iid-DwOh4KollJY"></script>

		<meta property="og:title" content="<?php echo get_the_ID(); ?>"/>
   

		<?php wp_head(); ?>
	<?php date_default_timezone_set('America/New_York'); ?>

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

			<nav class="nav-top">
				<div class="whiteLogo">
					<a href="<?php echo get_site_url()?>"><img src="<?php echo get_template_directory_uri()?>/img/icons/whiteLogo.png"></a>
				</div>
				<?php 
				$args = array(
					'menu' => "custom-posts"
					);
				wp_nav_menu($args);?>
				
			</nav>

		</header>
		<!-- /header -->
