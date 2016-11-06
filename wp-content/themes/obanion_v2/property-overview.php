<?php
global $wpdb, $pageType;

if(isset($_GET["submit"])){
	if(!empty($_GET['search'])){
		if(!empty($_GET['search']) && $_GET["search"] != "Address Search"){
			$joinSearch = "INNER JOIN $wpdb->postmeta search ON ( $wpdb->posts.ID = search.post_id )";
			$addSearch = "AND (search.meta_key = 'location' AND search.meta_value LIKE '%".$_GET["search"]."%')";
			}
		}
	if(!empty($_GET['avail'])){
		$joinAvail = "INNER JOIN $wpdb->postmeta avail ON ( $wpdb->posts.ID = avail.post_id )";
		$addAvail = "AND (avail.meta_key = 'date_available' AND avail.meta_value LIKE '".$_GET['avail']."%')";
		if($_GET['avail'] == "now"){
			$addAvail = "AND (avail.meta_key = 'available_now' AND avail.meta_value = 'true')";
			}
		}
	if(!empty($_GET['bedrooms'])){
		$joinBedrooms = "INNER JOIN $wpdb->postmeta bedrooms ON ( $wpdb->posts.ID = bedrooms.post_id )";
		$addBedrooms = "AND (bedrooms.meta_key = 'bedrooms' AND bedrooms.meta_value = '".$_GET['bedrooms']."')";
		if(substr($_GET['bedrooms'], -1) == "p"){
			$addBedrooms = "AND (bedrooms.meta_key = 'bedrooms' AND bedrooms.meta_value >= '".trim($_GET['bedrooms'],"p")."')";
			}
		}
	if(!empty($_GET['bathrooms'])){
		$joinBaths = "INNER JOIN $wpdb->postmeta bathrooms ON ( $wpdb->posts.ID = bathrooms.post_id )";
		$addBathrooms = "AND (bathrooms.meta_key = 'bathrooms' AND bathrooms.meta_value = '".$_GET['bathrooms']."')";
		if(substr($_GET['bathrooms'], -1) == "p"){
			$addBathrooms = "AND (bathrooms.meta_key = 'bathrooms' AND bathrooms.meta_value >= '".trim($_GET['bathrooms'],"p")."')";
			}
		}
	if(!empty($_GET['cities'])){
		switch($_GET['cities']){
			case "an":
				$joinCities = "INNER JOIN $wpdb->postmeta city ON ( $wpdb->posts.ID = city.post_id ) INNER JOIN $wpdb->postmeta district ON ( $wpdb->posts.ID = district.post_id )";
				$addCities = "AND (city.meta_key = 'city' AND city.meta_value = 'Anchorage') AND (district.post_id NOT IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_value = 'Eagle River'))";
				break;
			case "er":
				$joinCities = "INNER JOIN $wpdb->postmeta city ON ( $wpdb->posts.ID = city.post_id ) INNER JOIN $wpdb->postmeta district ON ( $wpdb->posts.ID = district.post_id )";
				$addCities = "AND ((city.meta_key = 'city' AND city.meta_value = 'Chugiak') OR (district.meta_key = 'district' AND district.meta_value = 'Eagle River'))";
				break;
			case "wa":
				$joinCities = "INNER JOIN $wpdb->postmeta city ON ( $wpdb->posts.ID = city.post_id )";
				$addCities = "AND (city.meta_key = 'city' AND (city.meta_value = 'Wasilla' OR city.meta_value = 'Palmer' OR city.meta_value = 'Big Lake'))";
				break;
			case "all":
				$joinCities = "";
				$addCities = "";
				break;
			}
		}
	if($_GET['minPrice'] != "Min Price" && $_GET['maxPrice'] == "Max Price"){
		$joinPrice = "INNER JOIN $wpdb->postmeta price ON ( $wpdb->posts.ID = price.post_id )";
		$addPrice = "AND (price.meta_key = 'price' AND price.meta_value >= ".$_GET['minPrice'].")";
		}
	elseif($_GET['minPrice'] == "Min Price" && $_GET['maxPrice'] != "Max Price"){
		$joinPrice = "INNER JOIN $wpdb->postmeta price ON ( $wpdb->posts.ID = price.post_id )";
		$addPrice = "AND (price.meta_key = 'price' AND price.meta_value <= ".$_GET['maxPrice'].")";
		}
	elseif($_GET['minPrice'] != "Min Price" && $_GET['maxPrice'] != "Max Price" && $_GET['minPrice'] != "" && $_GET['maxPrice'] != ""){
		$joinPrice = "INNER JOIN $wpdb->postmeta price ON ( $wpdb->posts.ID = price.post_id ) INNER JOIN $wpdb->postmeta priceMax ON ( $wpdb->posts.ID = priceMax.post_id )";
		$addPrice = "AND ((price.meta_key = 'price' AND price.meta_value >= ".$_GET['minPrice'].") AND (priceMax.meta_key = 'price' AND priceMax.meta_value <= ".$_GET['maxPrice']."))";
		}
	else $addPrice = "";
	}else{
		$joinCities = "";
		$addCities = "";
		}


$pString = "SELECT $wpdb->posts . * FROM $wpdb->posts
$joinSearch
$joinBedrooms
$joinBaths
$joinAvail
$joinCities
$joinPrice
INNER JOIN $wpdb->postmeta property_type ON ( $wpdb->posts.ID = property_type.post_id )
JOIN $wpdb->postmeta ON ( $wpdb->posts.ID = $wpdb->postmeta.post_id )
WHERE ($wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'property') 
$addSearch
$addBedrooms
$addBathrooms
$addAvail
$addCities
$addPrice
AND (property_type.meta_key = 'property_type' AND property_type.meta_value = '".$pageType."')
GROUP BY $wpdb->posts.ID
ORDER BY $wpdb->posts.post_date DESC";

$properties = $wpdb->get_col($pString);

if($properties): ?>

    <ul class="propertyTiles">
        
        <li class="propertyTileSearch"><?php get_template_part("search", "smart"); ?></li>
    
        <?php foreach($properties as $post => $id): ?> 	
    		<?php $property = prepare_property_for_display(get_property($id, ($show_children ? "get_property['children']={$show_property['children']}" : ""))); ?>
    		
    		<li class='propertyTile' onClick="window.location='<?php echo $property['permalink']; ?>';">
    			<?php
                $propertyId = $property['featured_image'];
                if(!empty($propertyId)):
                    foreach($property['gallery'] as $key => $value){
                        if($value['attachment_id'] == $propertyId) $imgFile = $value['medium'];
                        }
                else:
                    $imgFile = get_bloginfo("template_url")."/images/missing_photo.jpg";
                    endif;
                ?>
    	    	<div class="propertyTilePhoto" style="background-image: url('<?php echo $imgFile; ?>');" onclick="window.location = '<?php echo $property['permalink']; ?>';">
        	    	<div class="quickAccessCode">Quick Access Code: <?php echo $property['ID']; ?></div>
    	    	</div>
    
    	    	<h2><?php echo $property['post_title']; ?></h2>
    	    	
    	    	<?php if(!empty($property['district'])) $addDistrict = $property['district']; else $addDistrict = $property['city']; ?>
    	    	<?php if($property['city'] == "Eagle River") $addDistrict = "Eagle River"; ?>
    	    	<div class="propertyTileAddress"><?php echo $property['street_number']." ".$property['route']."<br/>".$addDistrict." ".$property['state']." ".$property['postal_code']; ?></div>
    
    	    	<div class="propertyTileMeta">
    	    		<?php if($property['bedrooms'] != "") echo "Bedrooms: ".$property['bedrooms']; ?>
    	    		<?php if($property['bathrooms'] != "") echo "&middot; Bathrooms: ".$property['bathrooms']; ?>
    	    		<?php if($property['area'] != "") echo "&middot; ".$property['area']; ?>
    	    		</div>
    	    	<div class="propertyTileMeta">
    	    		<?php
    	    	 	if($property['property_type'] == "for_rent"){
    	    	 		if($property['price'] != "") echo "Lease: ".money($property['price']);
    	    	 		else echo "Contact Us for Lease Price";
    	    	 		}
    	    	 	else{
    	    	 		if($property['price'] != "") echo "Price: ".money($property['price']);
    	    	 		else echo "Contact Us for Sale Price";
    	    	 		}
    	    	 		?>
    	    	 		
    	    		</div>
                    <?php
    	    	 	if($property['overview_burst'] != "") echo "<div class='burst'>".$property['overview_burst'].'</div>';
    
                    if(!empty($property['availability_banner']) && empty($property['custom_availability_banner'])){
    	    			if($property['availability_banner'] == "Available at Lease End Date"){
    		    			$dateX[0] = substr($property['date_available'],4,2);
    		    			$dateX[1] = substr($property['date_available'],6,2);
    		    			$dateX[2] = substr($property['date_available'],0,4);
    						echo "<div class=\"availNow\">AVAILABLE ON ".strtoupper(date("M d, Y", mktime(0,0,0,$dateX['0'],$dateX['1'],$dateX['2'])))."</div>";
    						}
    	    			if($property['availability_banner'] == "Available Now") echo "<div class=\"banner\">AVAILABLE NOW</div>";
    	    			if($property['availability_banner'] == "Available Soon") echo "<div class=\"banner\">AVAILABLE SOON</div>";
    	    			}elseif(!empty($property['custom_availability_banner'])){
    	    				echo "<div class=\"banner\">".stripslashes($property['custom_availability_banner'])."</div>";
    	    			}
    
    	    		if(!empty($property['sale_pending'])) echo "<div class=\"banner\">SALE PENDING</div>";
    	    		if(!empty($property['contact_pending'])) echo "<div class=\"banner\">CONTACT PENDING</div>";
    	    		if(!empty($property['sold'])) echo "<div class=\"banner\">SOLD</div>";
    	    		?>
    	    	<?php $xdate = strtotime("today") - strtotime($property['post_date']); if($xdate/86400 <= "30"): ?>
    <!-- 	    		<img src="<?php echo bloginfo("template_url"); ?>/images/new_listing_button.png" class="newlisting" /> -->
    	    		<?php endif; ?>
    	    	<div class="clear"></div>
    	    </li>
    		<?php endforeach; ?>
        </ul>
    
        
<?php endif; ?>

<div class="clear"></div>


