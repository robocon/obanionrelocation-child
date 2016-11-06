<?php
/**
 * Property Default Template for Single Property View
 *
 * Overwrite by creating your own in the theme directory called either:
 * property.php
 * or add the property type to the end to customize further, example:
 * property-building.php or property-floorplan.php, etc.
 *
 * By default the system will look for file with property type suffix first,
 * if none found, will default to: property.php
 *
 * Copyright 2010 Andy Potanin <andy.potanin@twincitiestech.com>
 *
 * @version 1.3
 * @author Andy Potanin <andy.potnain@twincitiestech.com>
 * @package WP-Property
*/

// Uncomment to disable fancybox script being loaded on this page
wp_deregister_script('jquery-fancybox');
wp_deregister_script('jquery-fancybox-css');
$noYes = array("0" => "No", "1" => "Yes");

if(isset($_POST['submit'])){
	if($_POST['name'] == ""){
		$filename = "/home/obanion/_prop_queries/".date("YmdHis")."_".$_POST['lname'].".txt";
		$somecontent = json_encode($_POST)."\r";
		$handle = fopen($filename, 'a');
		fwrite($handle, $somecontent);
		fclose($handle);

		$vars = parseEmail("email-contact-property.php", $_POST, $property);
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= "From: ".$vars['from']."\r\n";
				
		//mail($vars['to'],$vars['subject'],$vars['body'],$headers);
		mail("todd@obanionrelocation.com",$vars['subject'],$vars['body'],$headers,"-f daniel@danielbrowninc.com");
		mail("reception@obanionrelocation.com",$vars['subject'],$vars['body'],$headers,"-f daniel@danielbrowninc.com");
		mail("daniel@danielbrowninc.com",$vars['subject'],$vars['body'],$headers,"-f daniel@danielbrowninc.com");
		$message = "1 Thank you for your inquiry.  We look forward to serving you and your family's needs.  Someone will be in contact with you soon.";
		} 
	}
?>

<?php get_header(); ?>
<?php the_post(); ?>

    <script type="text/javascript">
    var map;
    var marker;
    var infowindow;

    jQuery(document).ready(function() {

      if(typeof jQuery.fn.fancybox == 'function') {
        jQuery("a.fancybox_image, .gallery-item a").fancybox({
          'transitionIn'  :  'elastic',
          'transitionOut'  :  'elastic',
          'speedIn'    :  600,
          'speedOut'    :  200,
          'overlayShow'  :  false
        });
      }

      if(typeof google == 'object') {
        initialize_this_map();
      } else {
        jQuery("#property_map").hide();
      }

    });


  function initialize_this_map() {
    <?php if($coords = WPP_F::get_coordinates()): ?>
    var myLatlng = new google.maps.LatLng(<?php echo $coords['latitude']; ?>,<?php echo $coords['longitude']; ?>);
    var myOptions = {
      zoom: <?php echo (!empty($wp_properties['configuration']['gm_zoom_level']) ? $wp_properties['configuration']['gm_zoom_level'] : 13); ?>,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById("property_map"), myOptions);


     marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<?php echo addslashes($post->post_title); ?>',
      icon: '<?php echo apply_filters('wpp_supermap_marker', '', $post->ID); ?>'
    });

    google.maps.event.addListener(infowindow, 'domready', function() {
    document.getElementById('infowindow').parentNode.style.overflow='hidden';
    document.getElementById('infowindow').parentNode.parentNode.style.overflow='hidden';
   });

   setTimeout("infowindow.open(map,marker);",1000);

    <?php endif; ?>
  }

  </script>

<div id="content-wrapper">

	<?php buildMessage($message); ?>
	<?php if(isset($_GET['d'])) print_r($property); ?>
    <h1 class="property-title"><?php the_title(); ?></h1>
    <h3 class="entry-subtitle"><?php the_tagline(); ?>
    	<div class="right">
     	<?php if($property['property_type'] == "for_rent"): ?><a href="https://obanionrelocation.com/rental-application/?property=<?php echo $property['ID']; ?>">Apply Online for This Property</a> &middot <?php endif; ?>
     	<a href="#form">More Information</a> &middot 
   		<a href="javascript:history.go(-1)">Back</a>
    	</div>
    	</h3>
	
	<div id="information">
		<?php 
		if($property['street_number'] != "" || $property['route'] != "" || $property['city'] != ""){
			echo "<p class=\"address\">";
			if($property['street_number'] != "") echo $property['street_number']." ";
			if($property['route'] != "") echo $property['route']."<br/>";
			$city = ($property['city'] != "")? $property['city']:$property['district'];
			if($property['district'] == "Eagle River" || $property['city'] == "Eagle River") $city = "Eagle River";
			if($city != "") echo $city;
			if($property['city'] != "" && $property['state'] != "") echo ", ";
			if($property['state'] != "") echo $property['state']." ";
			if($property['postal_code'] != "") echo $property['postal_code']." ";
			echo "</p>";
			}
		?>
		<div class="clear"></div>
		<?php if($property['post_content'] != "") echo "<p class=\"content\">".$property['post_content']."</p>"; ?>
		<?php echo "<p class=\"content\">".stripslashes(get_option("akwt_property_lingo"))."</p>"; ?>
		<?php if($property['property_type'] == "for_sale") echo "<p class=\"viewingDisclaimer\">See this property by appointment, 7 days a week!<br/>Call us at (907) 884-3073 or fill out the form <a href=\"#form\">here</a>.</p>"; ?>
		<div class="clear"></div>
		<?php if($property['property_type'] == "for_rent"): ?><a href="https://obanionrelocation.com/rental-application/?property=<?php echo $property['ID']; ?>" class="applyButton">Apply Online for This Property</a><?php endif; ?>
		<h2>Snap Shot</h2>
		<?php
    		if(!empty($property['date_available'])){
    			$dateX[0] = substr($property['date_available'],4,2);
    			$dateX[1] = substr($property['date_available'],6,2);
    			$dateX[2] = substr($property['date_available'],0,4);
    			echo "<div class=\"row\"><p class=\"label\">Current Lease Ending Date:</p><p class=\"value\">".date("M d, Y", mktime(0,0,0,$dateX['0'],$dateX['1'],$dateX['2']))."</p></div>\r\n";
	    		echo "<div class=\"disclaimer\">The current tenant may re-lease within 60 days of the Current Lease Ending Date.</div><br/>";
	    		}
    		?>
    	<?php if($property['mls_number'] != "") echo "<div class=\"row\"><p class=\"label\">MLS Number:</p><p class=\"value\">".$property['mls_number']."</p></div>\r\n"; ?>
		<?php if($property['price'] != "" && $property['property_type'] == "for_rent") echo "<div class=\"row\"><p class=\"label\">Lease:</p><p class=\"value\">".$property['price']."</p></div>\r\n"; ?>
		<?php if($property['price'] != "" && $property['property_type'] == "for_sale") echo "<div class=\"row\"><p class=\"label\">Price:</p><p class=\"value\">".$property['price']."</p></div>\r\n"; ?>
		<?php if($property['deposit'] != "") echo "<div class=\"row\"><p class=\"label\">Deposit:</p><p class=\"value\">".$property['deposit']."</p></div>\r\n"; ?>
		<?php if($property['bedrooms'] != "") echo "<div class=\"row\"><p class=\"label\">Bedrooms:</p><p class=\"value\">".$property['bedrooms']."</p></div>\r\n"; ?>
		<?php if($property['bathrooms'] != "") echo "<div class=\"row\"><p class=\"label\">Bathrooms:</p><p class=\"value\">".$property['bathrooms']."</p></div>\r\n"; ?>
		<?php if($property['area'] != "") echo "<div class=\"row\"><p class=\"label\">Square Footage:</p><p class=\"value\">".$property['area']."</p></div>\r\n"; ?>
		<?php if($property['acreage'] != "") echo "<div class=\"row\"><p class=\"label\">Acreage:</p><p class=\"value\">".$property['acreage']." Acres</p></div>\r\n"; ?>
		<?php if($property['home_style'] != "") echo "<div class=\"row\"><p class=\"label\">Home Style:</p><p class=\"value\">".$property['home_style']."</p></div>\r\n"; ?>
		<?php if($property['pet_friendly__cats'] != "") echo "<div class=\"row\"><p class=\"label\">Pet Friendly - Cats:</p><p class=\"value\">".$noYes[$property['pet_friendly__cats']]."</p></div>\r\n"; ?>
		<?php if($property['pet_friendly__dogs'] != "") echo "<div class=\"row\"><p class=\"label\">Pet Friendly - Dogs:</p><p class=\"value\">".$noYes[$property['pet_friendly__dogs']]."</p></div>\r\n"; ?>
		<?php if($property['county'] != "") echo "<div class=\"row\"><p class=\"label\">County:</p><p class=\"value\">".$property['county']."</p></div>\r\n"; ?>

      	<?php if(!empty($wp_properties['taxonomies'])) foreach($wp_properties['taxonomies'] as $tax_slug => $tax_data): ?>
        <?php if(get_features("type={$tax_slug}&format=count")):  ?>
        <h2><?php echo $tax_data['label']; ?></h2>
        <ul class="clearfix">
        <?php get_features("type={$tax_slug}&format=list&links=true"); ?>
        </ul>
        <?php endif; ?>
      	<?php endforeach; ?>
		<a name="form"></a>
		<h2>More Information</h2>
		<p class="medium">Want to see this property up close or just want more information?  Fill out the form below and someone from our office will contact you.</p>
		<form class="property" action="<?php echo $property['permalink']; ?>" method="post">
			<p><label>First Name *</label><input type="text" name="fname"></p>
			<p><label>Last Name *</label><input type="text" name="lname"></p>
			<p><label>Email *</label><input type="text" name="email"></p>
			<p><label>Phone *</label><input type="text" name="phone"></p>
			<p><label>Current State</label><?php echo createStateDrop(); ?></p>
			<p><label>Perferred Contact</label><?php echo createContactDrop(); ?></p>
			<p><label>Comments or Questions</label><textarea name="comments"></textarea></p>
			<p><label></label><input type="submit" name="submit" value="Send">
			<div style='height: 1px; overflow: hidden; width: 1px;'><input type="text" name="name" value=""></div>
			</form>


		</div> 

	<div id="gallery">
		<?php
		$imgFile = $property['featured_image_url'];
		if(!empty($imgFile)):
		?>

		<?php
		$title = "Tip: Click on right side of photo to advance, left side of photo to back up.  You can also use your left and right arrow keys on your keyboard.";
		?>
    	<a href="<?php echo $property['featured_image_url']; ?>" rel="lightbox[1]" title="<?php echo $title; ?>"><img src="<?php echo $property['featured_image_url']; ?>" class="galleryimage" /></a> 
    	<?php
		//krsort($property['gallery']);
		foreach($property['gallery'] as $key => $value):
			$i++;
			if($i%4 == 1) echo "<div class=\"clear\"></div>";
			$caption = "";
			if($value['post_excerpt']) $caption = $value['post_excerpt'].".  ";
			?>
			<a href="<?php echo $value['ryder_photos']; ?>" rel="lightbox[1]" title="<?php echo $caption.$title; ?>"><img src="<?php echo $value['thumbnail']; ?>" class="gallerythumb" /></a>
			<?php endforeach; ?>
		<?php else: ?>
		<img src="<?php echo get_bloginfo("template_url"); ?>/images/missing_photo.jpg" class="galleryimage" />
		<?php endif; ?>
		
        <?php if(WPP_F::get_coordinates()): ?>
          <div id="property_map" class="googlemap"></div>
        <?php endif; ?>
		</div>

		<div class="clear"></div>



        <?php if($post->post_parent): ?>
          <a href="<?php echo $post->parent_link; ?>"><?php _e('Return to building page.','wpp') ?></a>
        <?php endif; ?>

	</div>

<?php get_footer(); ?>