<h4>Showcased For Sale</h4>
<div id="indexForSaleFeatured">
    <?php if($properties): ?>
        <?php shuffle($properties); $shuffleProp[] = $properties[0]; ?>
        <?php foreach($shuffleProp as $property_id): $i++; ?>
            <?php $property = prepare_property_for_display(get_property($property_id, ($show_children ? "get_property['children']={$show_property['children']}" : ""))); ?>
        	<div id="featuredSaleHome" class="center" onClick="window.location='<?php echo $property['permalink']; ?>';">
        		<style>div.featuredSalePhoto<?php echo $property['ID']; ?> { background: transparent url(<?php echo $property['images']['feature_widget']; ?>) no-repeat center center; background-size: cover;}</style>

        		<div class="featuredSalePhoto<?php echo $property['ID']; ?> featuredSalePhoto" onclick="<?php echo $property['permalink']; ?>"></div>
            	<div class="featuredSaleInfo">
        	    	<h2><a href="<?php echo $property['permalink']; ?>"><?php echo $property['post_title']; ?></a></h2>
    	    		<?php if($property['post_content'] != "") echo "<p>".substr($property['post_content'], 0, 200); ?>
<!--
        	    	<div class="propertyMeta">
        	    		<?php if($property['bedrooms'] != "") echo "Bedrooms: ".$property['bedrooms']."<br/>"; ?>
        	    		<?php if($property['bathrooms'] != "") echo "Bathrooms: ".$property['bathrooms']."<br/>"; ?>
        	    		<?php if($property['area'] != "") echo $property['area']."<br/>"; ?>
        	    		<?php if($property['price'] != "") echo "Price: ".money($property['price']); ?>
        	    		</div>
-->
    	    		...<a href="<?php echo $property['permalink']; ?>"> get more!</a></p>
            		
        			</div>
        		</div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<div id="indexForSaleList">
    <h5>Additional Sales</h5>
    <?php if($properties): ?>
        <ul>
        <?php shuffle($properties); ?>
        <?php foreach($properties as $property_id): $i++; ?>
            <?php $property = prepare_property_for_display(get_property($property_id, ($show_children ? "get_property['children']={$show_property['children']}" : ""))); ?>
        	<li class="featuredHome" class="center" onClick="window.location='<?php echo $property['permalink']; ?>';">
        		<style>div.featuredSaleListPhoto<?php echo $property['ID']; ?> { background: transparent url(<?php echo $property['images']['feature_widget']; ?>) no-repeat center center; background-size: cover;}</style>

        		<div class="featuredSaleListPhoto<?php echo $property['ID']; ?> featuredSaleListPhoto" onclick="<?php echo $property['permalink']; ?>"></div>
            	<div class="featuredSaleListInfo">
        	    	<a href="<?php echo $property['permalink']; ?>"><?php echo $property['post_title']; ?></a><br/>
                    <?php if($property['city'] != "") echo $property['city'].", ".$property['state_code']." ".$property['postal_code']."<br/>"; ?>
    	    		<?php if($property['bedrooms'] != "") echo $property['bedrooms']."/".$property['bathrooms']." &middot; "; ?>
    	    		<?php if($property['area'] != "") echo $property['area']."<br/>"; ?>
    	    		<?php if($property['price'] != "") echo money($property['price'])."<br/>"; ?>
        			</div>
        		</li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

