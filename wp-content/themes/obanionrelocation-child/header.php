<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <?php wp_head(); ?>
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
  </head>

<body <?php body_class(); ?>>
	<div class="container" style="width: 786px; margin: 0 auto; background-color: #ffffff;">

		<!--  site-header -->
		<header class="site-header">
			<h1>
				<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
			</h1>
			<h3>
				<?php bloginfo('description'); ?>
				<?php if (is_page (14)) { ?>
				- Thank you for viewing our work.
				<?php } ?>
			</h3>
		</header>

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
					<a href="/about-todd">About</a>
				</li>
				<li id="menu-g" class="menuItem<?php echo $activePage['g'];?>">
					<a href="/faqs">FAQ's</a>
				</li>
				<li id="menu-h" class="menuItem<?php echo $activePage['h'];?>">
					<a href="/contact">Contact</a>
				</li>
			</ol>
		</div>
