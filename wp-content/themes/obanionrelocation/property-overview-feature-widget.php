<?php if($properties): ?>
    <?php
    shuffle($properties);
    $shuffleProp[] = $properties[0];
	?>

    <?php foreach($shuffleProp as $property_id): $i++; ?>
    
    <?php $property = prepare_property_for_display(get_property($property_id, ($show_children ? "get_property['children']={$show_property['children']}" : ""))); ?>
    
	<div id="featuredHome" class="center" onClick="window.location='<?php echo $property['permalink']; ?>';">
		<h1>Showcase <?php echo $property['property_type_label']; ?> Listing</h1>
		
		<style>
  		a.featurePhoto<?php echo $property['ID']; ?> { width: 404px; display: block; overflow: hidden; height:341px; cursor: pointer; background: #515151 url(<?php echo $property['images']['feature_widget']; ?>) no-repeat center center; }
  		</style>
		<a href="<?php echo $property['permalink']; ?>" class="featurePhoto<?php echo $property['ID']; ?>"></a>
    	<div id="featuredInfo">
	    	<a href="<?php echo $property['permalink']; ?>"><?php echo $property['post_title']; ?></a><br/>
	    	<p class="widgetaddress"><?php echo $property['address']; ?></p>
	    	<div class="widgetmeta">
	    		<?php if($property['bedrooms'] != "") echo "Bedrooms: ".$property['bedrooms']; ?>
	    		<?php if($property['bathrooms'] != "") echo "&middot; Bathrooms: ".$property['bathrooms']; ?>
	    		<?php if($property['area'] != "") echo "&middot; ".$property['area']; ?>
	    		<?php if($property['price'] != "") echo "&middot; Price: ".$property['price']; ?>
	    		</div>
		
			</div>
		</div>

    <?php endforeach; ?>

<?php endif; ?>
