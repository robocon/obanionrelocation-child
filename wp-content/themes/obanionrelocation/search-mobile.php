<?php
/*
Template Name: Mobile - Search
*/

if(isset($_GET['submit'])){
	if($_GET['type'] == "for_rent") header("location: /mobile-for-rent?".$_SERVER['QUERY_STRING']);
	else header("location: /mobile-for-sale?".$_SERVER['QUERY_STRING']);
	exit;
	}

global $cityArray;

?>
<?php $pageType = 'for_rent'; ?>
<?php get_header("mobile"); 
?>
<div id="content-wrapper">
<form action="" method="get" id="filter">
	<select name="type">
		<option value="for_rent">For Rent</option>
		<option value="for_sale">For Sale</option>
		</select>
	<input type="text" name="search" value="<?php echo $searchValue; ?>" onFocus="this.value='';" onBlur="if(this.value == '') this.value = 'Address Search';">
	<select name="bedrooms">
		<option value="">All Bedrooms</option>
		<option value="1"<?php echo $remBedrooms["1"]; ?>>1 Bedroom</option>
		<option value="2"<?php echo $remBedrooms["2"]; ?>>2 Bedrooms</option>
		<option value="2p"<?php echo $remBedrooms["2p"]; ?>>2+ Bedrooms</option>
		<option value="3"<?php echo $remBedrooms["3"]; ?>>3 Bedrooms</option>
		<option value="3p"<?php echo $remBedrooms["3p"]; ?>>3+ Bedrooms</option>
		<option value="4"<?php echo $remBedrooms["4"]; ?>>4 Bedrooms</option>
		<option value="4p"<?php echo $remBedrooms["4p"]; ?>>4+ Bedrooms</option>
		<option value="5"<?php echo $remBedrooms["5"]; ?>>5 Bedrooms</option>
		<option value="5p"<?php echo $remBedrooms["5p"]; ?>>5+ Bedrooms</option>
		<option value="6"<?php echo $remBedrooms["6"]; ?>>6 Bedrooms</option>
		<option value="6p"<?php echo $remBedrooms["6p"]; ?>>6+ Bedrooms</option>
		</select>
	
	<select name="bathrooms">
		<option value="">All Bathrooms</option>
		<option value="1"<?php echo $remBathrooms["1"]; ?>>1 Bathroom</option>
		<option value="2"<?php echo $remBathrooms["2"]; ?>>2 Bathrooms</option>
		<option value="2p"<?php echo $remBathrooms["2p"]; ?>>2+ Bathrooms</option>
		<option value="3"<?php echo $remBathrooms["3"]; ?>>3 Bathrooms</option>
		<option value="3p"<?php echo $remBathrooms["3p"]; ?>>3+ Bathrooms</option>
		<option value="4"<?php echo $remBathrooms["4"]; ?>>4 Bathrooms</option>
		<option value="4p"<?php echo $remBathrooms["4p"]; ?>>4+ Bathrooms</option>
		</select>
	
	<select name="cities">
		<option value="all">All Areas</option>
		<?php foreach($cityArray as $key => $value) echo "<option value=\"".$key."\"".$remCities[$key].">".$value."</option>"; ?>
		</select>
	<input type="text" name="minPrice" value="<?php echo $minValue; ?>" onFocus="this.value='';" onBlur="if(this.value == '') this.value = 'Min Price';">
	<input type="text" name="maxPrice" value="<?php echo $maxValue; ?>" onFocus="this.value='';" onBlur="if(this.value == '') this.value = 'Max Price';">
	<?php createAvailableDrop(); ?>
	<input type="submit" value="Search" name="submit" id="submit" /><br/>
	<a href="<?php substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?")); ?>">Clear Search</a>
	</form>
	</div>
<?php get_footer("mobile"); ?> 