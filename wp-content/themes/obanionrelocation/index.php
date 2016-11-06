<?php if(strpos($_SERVER['HTTP_REFERER'], "dynamicproperties")){ header("location: http://www.dynamicproperties.net"); exit; } ?>
<?php define('MENU_OPTION', 'a'); ?>
<?php define('HOME_PHOTO', 'denali.png'); ?>
<?php get_header(); ?>

<div id="leftCol">
	<img src="<?php bloginfo("template_url"); ?>/images/gold_house_reflect_sm.png" />
	
	<div class="bigMenu">
		<img src="<?php bloginfo("template_url"); ?>/images/72x72homes_sale.jpg" />
		<a href="/homes-for-sale" class="title">Alaska Homes For Sale</a>
		See Todd's available properties for sale here. We also offer opportunities to rent before you buy. 
		<a href="/homes-for-sale" class="viewMore">See Sales Listings Here</a>
		</div>
	<div class="bigMenu">
		<img src="<?php bloginfo("template_url"); ?>/images/72x72for_rent.jpg" />
		<a href="/homes-for-rent" class="title">Alaska Rentals</a>
		Looking for a place to rent? Todd can help you find the ultimate temporary stay here:
		<a href="/homes-for-rent" class="viewMore">Current Rental Listings here</a>
		</div>
	<div class="bigMenu">
		<img src="<?php bloginfo("template_url"); ?>/images/72x72mil_relo.jpg" />
		<a href="/military-relocation" class="title">Relocation Alaska </a>
		Military or general public. If you're relocating to Alaska, Contact Todd O'Banion!  
		<a href="/military-relocation" class="viewMore">Learn More About the Bases in Alaska</a>
		</div>
	<div class="bigMenu">
		<img src="<?php bloginfo("template_url"); ?>/images/72x72prop_mng.jpg" />
		<a href="/service-list" class="title">Property Management </a>
		Todd is one of Alaska's Top Property Managers. Find out more about his services here. 
		<a href="/service-list" class="viewMore">More About Property Management Services </a>
		</div>
	<div class="bigMenu">
		<img src="<?php bloginfo("template_url"); ?>/images/72x72amhs.jpg" />
		<a href="/getting-here" class="title">Getting To Alaska </a>
		There are many ways to get to Alaska. Here is some information that should help make your move more tolerable. 
		<a href="/getting-here" class="viewMore">Travel information here</a>
		</div>
	<div class="bigMenu">
		<img src="<?php bloginfo("template_url"); ?>/images/72x72ak_faq.jpg" />
		<a href="/faqs" class="title">Alaska FAQ's</a>
		Read some commonly asked questions about Alaska here, and learn what it is like in Alaska.  
		<a href="/faqs" class="viewMore">Get Answers here</a>
		</div>
	
<!--
	<h1 class="marginTop">Preferred Builders</h1>
	<p>Waiting to build your own home?  Check out our floorplans.  Or we can build one of yours!</p>
	<a href="/midnight-sun-construction"><img src="<?php bloginfo("template_url"); ?>/images/midnightsunlogo.png" class="center" /></a>
	</p>
-->
	
	</div>
<div id="rightCol">
	<?php $short1 = "[property_overview template=feature-widget property_type=for_rent sorter=on showcase=true]"; ?>
	<?php echo do_shortcode($short1); ?>
	<?php $short2 = "[property_overview template=feature-widget property_type=for_sale sorter=on showcase=true]"; ?>
	<?php echo do_shortcode($short2); ?>
	  
	</div>
  <div class="clear"></div>
	<h1 style="margin-top: 20px;">Moving to Alaska?</h1>
	<p>Are you moving to Alaska? Relocating to Alaska is no easy accomplishment, 
	   unless you have a secret weapon. Todd O'Banion specializes in assisting home 
	   buyers find property in Alaska, whether you are moving to the 49th state for 
	   military relocation, a job opportunity, or just to move your family to a safer 
	   environment. If you're moving to Alaska, Todd O'Banion is your Alaskan source 
	   to help make your relocation experience a quick and easy one! 
	   </p>
	
	<h1>Relocation Alaska : Relocating to Alaska with Todd</h1>
	<p>Todd is retired Army, and he has been providing military relocation to Alaska 
	   for years. Military or not, if you are looking to buy a home, rent a home, or 
	   rent a home until you plan on buying a home in Alaska, Todd is your best 
	   connection in Alaska. Todd has helped people from all around the world relocate to Alaska!
	   </p>
	<h1 style="margin-top: 20px;">Trusted Businesses and Friends of O'Banion</h1>
		<a href="http://www.homerocean.com"><img src="<?php bloginfo("template_url"); ?>/ads/homercharters_tile.jpg" class="tilead"/></a>
		<a href="https://aldrichr.residentialmortgageonline.com/"><img src="<?php bloginfo("template_url"); ?>/ads/RM_Ronica-Aldrich-Website-Ad.png" class="tilead"/></a>
		<a href="/tsk"><img src="<?php bloginfo("template_url"); ?>/ads/ad_tsk.png" class="tilead"/></a>
		<a href="http://www.907snowcat.com"><img src="<?php bloginfo("template_url"); ?>/ads/ad_snow_cat.png" class="tilead"/></a>
		<a href="http://www.alliedalaskaelectricllc.com"><img src="<?php bloginfo("template_url"); ?>/ads/ad_allied_alaska.png" class="tilead"/></a>
		<a href="http://www.extendedstayhotels.com/find-reserve/find-by-map.html?state=AK"><img src="<?php bloginfo("template_url"); ?>/ads/ad_extended_stay.png" class="tilead"/></a>
		<a href="http://www.thealaskaclub.com/free-pass"><img src="<?php bloginfo("template_url"); ?>/ads/alaskaClub.jpg" class="tilead"/></a>
	
<?php get_footer(); ?>