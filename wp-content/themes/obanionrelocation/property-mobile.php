<?php
/*
Template Name: Mobile - Property Details
*/

$property = prepare_property_for_display(get_property($_GET['id'], ($show_children ? "get_property['children']={$show_property['children']}" : "")));

// Uncomment to disable fancybox script being loaded on this page
wp_deregister_script('jquery-fancybox');
wp_deregister_script('jquery-fancybox-css');
$noYes = array("0" => "No", "1" => "Yes");
?>
<?php get_header("mobile"); ?>

<div id="content-wrapper">
<div id="content-margin">

	<?php buildMessage($message); ?>
	<?php if(isset($_GET['d'])) print_r($property); ?>
    <h1 class="property-title"><?php echo $property['post_title']; ?></h1>
    <h3 class="entry-subtitle"><?php the_tagline(); ?></h3>
	
	<div id="information">
		<?php 
		if($property['street_number'] != "" || $property['route'] != "" || $property['city'] != ""){
			echo "<p class=\"address\">";
			if($property['street_number'] != "") echo $property['street_number']." ";
			if($property['route'] != "") echo $property['route']."<br/>";
			if($property['city'] != "" && empty($property['district'])) echo $property['city'];
			if(!empty($property['district'])) echo $property['district'];
			if($property['city'] != "" && $property['state'] != "") echo ", ";
			if($property['state'] != "") echo $property['state']." ";
			if($property['postal_code'] != "") echo $property['postal_code']." ";
			echo "</p>";
			}
		?>
		<?php if($property['post_content'] != "") echo "<p class=\"content\">".$property['post_content']."</p>"; ?>
		<?php if($property['property_type'] == "for_sale") echo "<p class=\"viewingDisclaimer\">See this property by appointment, 7 days a week!<br/>Call us at (907) 884-3073 or fill out the form <a href=\"#form\">here</a>.</p>"; ?>
		<div class="clear"></div>
		<?php
    		if(!empty($property['date_available'])){
    			$dateX[0] = substr($property['date_available'],4,2);
    			$dateX[1] = substr($property['date_available'],6,2);
    			$dateX[2] = substr($property['date_available'],0,4);
    			echo "<div class=\"row\"><p class=\"label\">Current Lease Ending Date:</p><p class=\"value\">".date("M d, Y", mktime(0,0,0,$dateX['0'],$dateX['1'],$dateX['2']))."</p></div>\r\n";
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

		<?php
		$imgFile = $property['featured_image_url'];
		if(!empty($imgFile)):
		?>

		<?php
		$title = "Tip: Click on right side of photo to advance, left side of photo to back up.  You can also use your left and right arrow keys on your keyboard.";
		?>
    	<a href="<?php echo $property['featured_image_url']; ?>"><img src="<?php echo $property['featured_image_url']; ?>" class="galleryimage" /></a> 
    	<?php
		krsort($property['gallery']);
		foreach($property['gallery'] as $key => $value):
			$i++;
			if($i%4 == 1) echo "<div class=\"clear\"></div>";
			$caption = "";
			if($value['post_excerpt']) $caption = $value['post_excerpt'].".  ";
			?>
			<a href="<?php echo $value['ryder_photos']; ?>" ><img src="<?php echo $value['thumbnail']; ?>" class="gallerythumb" /></a>
			<?php endforeach; ?>
		<?php else: ?>
		<img src="<?php echo get_bloginfo("template_url"); ?>/images/missing_photo.jpg" class="galleryimage" />
		<?php endif; ?>
		</div>

		<div class="clear"></div>



        <?php if($post->post_parent): ?>
          <a href="<?php echo $post->parent_link; ?>"><?php _e('Return to building page.','wpp') ?></a>
        <?php endif; ?>

	</div>
	</div>

<?php get_footer("mobile"); ?>