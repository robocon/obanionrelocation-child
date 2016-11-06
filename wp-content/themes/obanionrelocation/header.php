<?php

date_default_timezone_set("America/Anchorage");

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '&middot;', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	//if ( $site_description && ( is_home() || is_front_page() ) )
		echo " &middot; $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' &middot; ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
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

<script type="text/javascript">
<!--

function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time display
  if(document.getElementById("clock"))document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

// -->
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script>function toggleList(i) { var div = document.getElementById(i); div.style.display = (div.style.display != 'none' ? 'none' : 'block' ); }</script>

<script src="<?php bloginfo("template_url"); ?>/js/lightbox.js"></script>
<link href="<?php bloginfo("template_url"); ?>/css/lightbox.css" rel="stylesheet" />

<meta name="keywords" content="anchorage alaska relocation moving property rentals rent homes buying house management eagle river wasilla palmer chugiak" />


</head>

<body <?php body_class(); ?> onload="updateClock(); setInterval('updateClock()', 1000 )">
<div id="serviceList">We are more than a real estate company!<br/><a href="/service-list/ ">Check out all of our services.</a></div>
<div id="wrap">
<?php if(defined('HOME_PHOTO')): ?>
<img src="<?php bloginfo("template_url"); ?>/images/<?php echo HOME_PHOTO; ?>" class="center">
<?php else: ?>
<img src="<?php bloginfo("template_url"); ?>/images/template_header.png" class="center">
<?php endif; ?>

<div id="menu" class="center">
	<ol>
		<?php $activePage[MENU_OPTION] = " menu-extend"; ?>
		<li id="menu-a" class="menuItem<?php echo $activePage['a'];?>"><a href="/"></a></li>
		<li id="menu-b" class="menuItem<?php echo $activePage['b'];?>"><a href="/homes-for-sale"></a></li>
		<li id="menu-c" class="menuItem<?php echo $activePage['c'];?>"><a href="/homes-for-rent"></a>
			<div id="dropsubmenu" class="hidden submenu">
				<ul>
					<li><a href="/homes-for-rent/?search=Address+Search&bedrooms=&bathrooms=&cities=all&minPrice=Min+Price&maxPrice=Max+Price&avail=now&submit=Search">Available Now</a></li>
					<li><a href="/homes-for-rent">All Rentals</a></li>
					</ul>
				</div>
			</li>
		<li id="menu-d" class="menuItem<?php echo $activePage['d'];?>"><a href="/military-relocation"></a></li>
		<li id="menu-e" class="menuItem<?php echo $activePage['e'];?>"><a href="/getting-here"></a></li>
		<li id="menu-f" class="menuItem<?php echo $activePage['f'];?>"><a href="/about-todd"></a></li>
		<li id="menu-g" class="menuItem<?php echo $activePage['g'];?>"><a href="/faqs"></a></li>
		<li id="menu-h" class="menuItem<?php echo $activePage['h'];?>"><a href="/contact"></a></li>
		</ol>
	</div>



