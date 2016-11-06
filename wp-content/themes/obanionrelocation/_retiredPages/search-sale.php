<?php

$remBedrooms[$_GET['bedrooms']] = " selected";
$remBathrooms[$_GET['bathrooms']] = " selected";
if(!empty($_GET['cities']))$remCities[$_GET['cities']] = " selected";
else $remCities['an'] = " selected";

global $cityArray;

?>
<form action="" method="get" id="filter">
	<select name="bedrooms">
		<option value="">All Bedrooms</option>
		<option value="1"<?php echo $remBedrooms["1"]; ?>>1 Bedroom</option>
		<option value="2"<?php echo $remBedrooms["2"]; ?>>2 Bedrooms</option>
		<option value="2p"<?php echo $remBedrooms["2p"]; ?>>2 or more Bedrooms</option>
		<option value="3"<?php echo $remBedrooms["3"]; ?>>3 Bedrooms</option>
		<option value="3p"<?php echo $remBedrooms["3p"]; ?>>3 or more Bedrooms</option>
		<option value="4"<?php echo $remBedrooms["4"]; ?>>4 Bedrooms</option>
		<option value="4p"<?php echo $remBedrooms["4p"]; ?>>4 or more Bedrooms</option>
		<option value="5"<?php echo $remBedrooms["5"]; ?>>5 Bedrooms</option>
		<option value="5p"<?php echo $remBedrooms["5p"]; ?>>5 or more Bedrooms</option>
		<option value="6"<?php echo $remBedrooms["6"]; ?>>6 Bedrooms</option>
		<option value="6p"<?php echo $remBedrooms["6p"]; ?>>6 or more Bedrooms</option>
		</select>
	
	<select name="bathrooms">
		<option value="">All Bathrooms</option>
		<option value="1"<?php echo $remBathrooms["1"]; ?>>1 Bathroom</option>
		<option value="2"<?php echo $remBathrooms["2"]; ?>>2 Bathrooms</option>
		<option value="2p"<?php echo $remBathrooms["2p"]; ?>>2 or more Bathrooms</option>
		<option value="3"<?php echo $remBathrooms["3"]; ?>>3 Bathrooms</option>
		<option value="3p"<?php echo $remBathrooms["3p"]; ?>>3 or more Bathrooms</option>
		<option value="4"<?php echo $remBathrooms["4"]; ?>>4 Bathrooms</option>
		<option value="4p"<?php echo $remBathrooms["4p"]; ?>>4 or more Bathrooms</option>
		</select>
	
	<select name="cities">
		<option value="all">All Areas</option>
		<?php foreach($cityArray as $key => $value) echo "<option value=\"".$key."\"".$remCities[$key].">".$value."</option>"; ?>
		</select>
	<?php
	$minValue = "Min Price";
	if(!empty($_GET['minPrice'])) $minValue = $_GET['minPrice'];
	$maxValue = "Max Price";
	if(!empty($_GET['maxPrice'])) $maxValue = $_GET['maxPrice'];
	?>
	<input type="text" name="minPrice" value="<?php echo $minValue; ?>" onFocus="this.value='';" onBlur="if(this.value == '') this.value = 'Min Price';"> to 
	<input type="text" name="maxPrice" value="<?php echo $maxValue; ?>" onFocus="this.value='';" onBlur="if(this.value == '') this.value = 'Max Price';">
	
	
	<input type="submit" value="Search" name="submit" />
	
	
	</form>