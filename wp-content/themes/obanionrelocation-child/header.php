<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
		/* We add some JavaScript to pages with the comment form
		* to support sites with threaded comments (when in use).
		*/
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		* tag of your theme, or you will break many plugins, which
		* generally use this hook to add elements to <head> such
		* as styles, scripts, and meta tags.
		*/
		wp_head();
	?>
	<!-- Bootstrap -->
	<script type="text/javascript" src="<?=get_template_directory_uri(); ?>-child/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=get_template_directory_uri(); ?>-child/js/bootstrap.min.js"></script>
    <link href="<?=get_template_directory_uri(); ?>-child/css/bootstrap.min.css" rel="stylesheet">
  </head>

<body <?php body_class(); ?>>
	<div id="wrap" class="container">

		<?php if(defined('HOME_PHOTO')): ?>
		<!--<img src="<?php bloginfo("template_url"); ?>/images/<?php echo HOME_PHOTO; ?>" class="center header-logo" >-->
		<?php else: ?>
		<img src="<?php bloginfo("template_url"); ?>/images/template_header.png" class="center" >
		<?php endif; ?>

		<?php ?>
		<div id="menu" class="center">
			<ol>
				<?php $activePage[MENU_OPTION] = " menu-extend"; ?>
				<li id="menu-a" class="menuItem<?php echo $activePage['a'];?>">
					<a href="/">Home</a>
				</li>
				<li id="menu-b" class="menuItem<?php echo $activePage['b'];?>">
					<a href="/homes-for-sale">For sale</a>
				</li>
				<li id="menu-c" class="menuItem<?php echo $activePage['c'];?>">
					<a href="/homes-for-rent">For Rent</a>
					<div id="dropsubmenu" class="hidden submenu">
						<ul>
							<li><a href="/homes-for-rent/?search=Address+Search&bedrooms=&bathrooms=&cities=all&minPrice=Min+Price&maxPrice=Max+Price&avail=now&submit=Search">Available Now</a></li>
							<li><a href="/homes-for-rent">All Rentals</a></li>
							</ul>
						</div>
					</li>
				<li id="menu-d" class="menuItem<?php echo $activePage['d'];?>">
					<a href="/military-relocation">Military Relocation</a>
				</li>
				<li id="menu-e" class="menuItem<?php echo $activePage['e'];?>">
					<a href="/getting-here">Getting Here</a>
				</li>
				<li id="menu-f" class="menuItem<?php echo $activePage['f'];?>">
					<a href="/about-todd">About Todd</a>
				</li>
				<li id="menu-g" class="menuItem<?php echo $activePage['g'];?>">
					<a href="/faqs">FAQ's</a>
				</li>
				<li id="menu-h" class="menuItem<?php echo $activePage['h'];?>">
					<a href="/contact">Contact</a>
				</li>
			</ol>
		</div>
		<?php ?>

		<?php /* ?>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="true">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button> 
					<a href="#" class="navbar-brand">Brand</a>
				</div>
				<div class="navbar-collapse collapse in" id="bs-example-navbar-collapse-6" aria-expanded="true">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
					</ul> 
				</div>
			</div>
		</nav>
		<?php */ ?>