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
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery.1.12.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/header.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jssor.slider.mini.js"></script>
    <link rel="stylesheet" media="screen and (max-width: 1100px)" href="<?php bloginfo('template_url'); ?>/styles/mobile.css" />
    <link rel="stylesheet" media="screen and (min-width: 1400px)" href="<?php bloginfo('template_url'); ?>/styles/huge.css" />
    <meta name="keywords" content="obanion o'banion real estate anchorage alaska relocation moving property rentals rent homes buying house management eagle river wasilla palmer chugiak" />

</head>
<body>

<div id="header">
    <div id="slugLine" onclick="window.location='/sandbox/index.php';"><span class="marketDeco">O'BANION</span> <span class="marketingScript">Real Estate & Relocation</span> <span class="marketDeco">SERVICES</span> <span class="marketDeco tiny">LLC</span></div>
    <div id="flag"></div>
    <div id="mug"></div>
    <div id="tagLine">"Let an Alaskan Help <br/>You Relocate to Alaska!"</div>
    <div id="mountain"></div>
    <div id="dogTags"></div>
    <div id="orrsLogo"></div>
    <div id="bizCard">
        <h1>Todd O'Banion <span class="tiny white">U.S.A. RET.</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="microH1">907-884-3073</span></h1>
        <p>O'Banion Real Estate & Relocation Services<br/>
            Buyer and Seller Representation & Property Management Services</p>
        </div>
    <div id="headerServices">
        We provide services for all relocations to Alaska.<br/>Private, Corporate, and Military Relocation Services.
        </div>
    
    </div>

