<?php
global $cityArray;

$remBedrooms[$_GET['bedrooms']]     = " selected";
$remBathrooms[$_GET['bathrooms']]   = " selected";
$remCities[$_GET['cities']]         = " selected";
?>
<form action="" method="get" id="filter">
	<h3>Refine Search</h3>
	<input type="text" name="search" value="<?php echo $_GET['search']; ?>" placeholder="Enter Address">
	<select name="bedrooms">
		<option value="">All Bedrooms</option>
		<option value="1"<?php echo $remBedrooms["1"]; ?>>1 Bedroom</option>
		<option value="2p"<?php echo $remBedrooms["2p"]; ?>>2+ Bedrooms</option>
		<option value="3p"<?php echo $remBedrooms["3p"]; ?>>3+ Bedrooms</option>
		<option value="4p"<?php echo $remBedrooms["4p"]; ?>>4+ Bedrooms</option>
		<option value="5p"<?php echo $remBedrooms["5p"]; ?>>5+ Bedrooms</option>
		<option value="6p"<?php echo $remBedrooms["6p"]; ?>>6+ Bedrooms</option>
		</select>
	<select name="bathrooms">
		<option value="">All Bathrooms</option>
		<option value="1"<?php echo $remBathrooms["1"]; ?>>1 Bathroom</option>
		<option value="2p"<?php echo $remBathrooms["2p"]; ?>>2+ Bathrooms</option>
		<option value="3p"<?php echo $remBathrooms["3p"]; ?>>3+ Bathrooms</option>
		<option value="4p"<?php echo $remBathrooms["4p"]; ?>>4+ Bathrooms</option>
		</select>
	<select name="cities">
		<option value="all">All Areas</option>
		<?php foreach($cityArray as $key => $value) echo "<option value=\"".$key."\"".$remCities[$key].">".$value."</option>"; ?>
		</select>
	<input type="text" name="minPrice" value="<?php echo $_GET['minPrice']; ?>" placeholder="Minimum Price">
	<input type="text" name="maxPrice" value="<?php echo $_GET['maxPrice']; ?>" placeholder="Maximum Price">
	<?php createAvailableDrop(); ?>
	<input type="submit" value="Search" name="submit" />
<!-- 	<a href="<?php substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?")); ?>" class="right">Clear Search</a> -->
	</form>

