<?php if($properties): ?>
<ul class="wpp_row_view">

    <?php foreach($properties as $property_id): ?>
    
    <?php $property = prepare_property_for_display(get_property($property_id, ($show_children ? "get_property['children']={$show_property['children']}" : ""))); ?>

    <li class='property_div'>
    	<a href="<?php echo $property['featured_image_url']; ?>" rel="lightbox[1]" title="Tip: Click on Right Side of photo to Advance, Left Side of photo to back up"><img src="<?php echo $property['featured_image_url']; ?>" /></a>
    	<?php foreach($property['gallery'] as $key => $value): ?><a href="<?php echo $value['ryder_photos']; ?>" rel="lightbox[1]" class="hidden">&nbsp;</a><?php endforeach; ?>
    	<a href="<?php echo $property['permalink']; ?>"><?php echo $property['post_title']; ?></a><br/>
    	<span class="meta">
    		<?php if($property['bedrooms'] != "") echo "Bedrooms: ".$property['bedrooms']; ?>
    		<?php if($property['bathrooms'] != "") echo "&middot; Bathrooms: ".$property['bathrooms']; ?>
    	<div class="clear"></div>
    </li>



    <?php endforeach; ?>
</ul><?php // .wpp_property_list ?>

<?php endif; ?>
