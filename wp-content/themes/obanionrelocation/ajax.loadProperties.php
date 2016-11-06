<?php
header('Content-type: text/html');
header('Access-Control-Allow-Origin: *');

include("../../../wp-load.php");


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
			$addAvail = "AND (avail.meta_key = 'date_available' AND avail.meta_value < '".date("Ym")."32%')";
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
AND (property_type.meta_key = 'property_type' AND property_type.meta_value = 'for_rent')
GROUP BY $wpdb->posts.ID
ORDER BY $wpdb->posts.post_date DESC";

$properties = $wpdb->get_col($pString);

if($properties):
	
	$listings_per_page = 12;
	$count = count($properties);
	$pages = $count/$listings_per_page;
	if($count%$listings_per_page != 0) $pages++;
	$total_pages = $pages;
	if(strpos($pages,".")) $total_pages = substr($pages, 0, strpos($pages,"."));
	$startPos = 0 + ($listings_per_page * $_GET['pg']);
	$endPos = $startPos + $listings_per_page -1;
 	for($i=$startPos;$i<=$endPos;$i++){ if(!empty($properties[$i])) $paginateProps[$i] = $properties[$i]; } 
	$currentPage = $_GET['pg'];
	for($p=1;$p<=$total_pages;$p++){
		$addClass = "";
		if($p-1 == $currentPage) $addClass = " pageselected";
		$pageline .= "<a href=\"?".$_SERVER['QUERY_STRING']."&pg=".($p-1)."\" class=\"pagenumber".$addClass."\">".$p."</a>";
		
		}
	?>

<ul class="wpp_row_view">
<?php
if(is_array($paginateProps)):
	$build .= "<ol class=\"akweb_list\">";
	foreach($paginateProps as $post => $id):    	
		$property = prepare_property_for_display(get_property($id, ($show_children ? "get_property['children']={$show_property['children']}" : "")));
		?>
		<li class='property_div' onClick="window.location='/mobile-property?id=<?php echo $property['ID']; ?>';">
			<?php
			$imgFile = $property['featured_image_url'];
			if(empty($imgFile)) $imgFile = get_bloginfo("template_url")."/images/missing_photo.jpg";
			?>
	    	<a href="mobile-property?id=<?php echo $property['ID']; ?>"><img src="<?php echo $imgFile; ?>" /></a>
	    	<div class="clear"></div>
	    	<a href="mobile-property?id=<?php echo $property['ID']; ?>"><?php echo $property['post_title']; ?></a>
	    	<span class="meta">
	    		<?php if($property['bedrooms'] != "") echo "Bedrooms: ".$property['bedrooms']; ?>
	    		<?php if($property['bathrooms'] != "") echo "&middot; Bathrooms: ".$property['bathrooms']; ?>
	    		<?php
	    	 	if($property['property_type'] == "for_rent"){
	    	 		if($property['price'] != "") echo "&middot; Lease: ".$property['price'];
	    	 		else echo "Contact Us for Lease Price";
	    	 		}
	    	 	else{
	    	 		if($property['price'] != "") echo "&middot; Price: ".$property['price'];
	    	 		else echo "Contact Us for Sale Price";
	    	 		}
	    		?>
	    		</span>
	    	<?php
	    	$xdate = strtotime("today") - strtotime($property['post_date']);
	    	if($xdate/86400 <= "30"): ?>
	    		<img src="<?php echo bloginfo("template_url"); ?>/images/new_listing_button.png" class="newlisting" />
	    		<?php endif; ?>
	    	<div class="clear"></div>
	    </li>
		<?php
		endforeach;
	endif;

?>
</ul>
<div class="clear"></div>
<a onMouseDown="showContent('index-content','pg=<?php echo $_GET['pg']+1; ?>');this.style.display='none';" class="iPhoneButton">Load Page <?php echo $_GET['pg']+1; ?></a>
<?php endif; ?>