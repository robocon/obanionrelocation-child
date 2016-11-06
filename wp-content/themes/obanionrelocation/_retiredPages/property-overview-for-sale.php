<?php if($properties): ?>
	<?php
	$listings_per_page = 8;
	$count = count($properties);
	$pages = $count/$listings_per_page;
	if($count%$listings_per_page != 0) $pages++;
	$total_pages = $pages;
	if(strpos($pages,".")) $total_pages = substr($pages, 0, strpos($pages,"."));
	$startPos = 0 + ($listings_per_page * $_GET['page']);
	$endPos = $startPos + $listings_per_page -1;
	for($i=$startPos;$i<=$endPos;$i++){ if(!empty($properties[$i])) $paginateProps[$i] = $properties[$i]; }
	$currentPage = $_GET['page'];
	for($p=1;$p<=$total_pages;$p++){
		$addClass = "";
		if($p-1 == $currentPage) $addClass = " pageselected";
		$pageline .= "<a href=\"?".$_SERVER['QUERY_STRING']."&page=".($p-1)."\" class=\"pagenumber".$addClass."\">".$p."</a>";
		
		}
	?>
	<div id="pagination">
		<?php
		if($count == 0) echo "Sorry, we could not find any properties that matched your search.";
		elseif($count == 1) echo "We found one listing that matched your search.";
		else echo "We found ".$count." listings that matched your search.";
		if(!empty($pageline)) echo " Page: ".$pageline;
		?>
		</div>
	<ul class="wpp_row_view">

    <?php foreach($paginateProps as $property_id): $i++; ?>
    
    <?php $property = prepare_property_for_display(get_property($property_id, ($show_children ? "get_property['children']={$show_property['children']}" : ""))); ?>

    <li class='property_div' onClick="window.location='<?php echo $property['permalink']; ?>';">
    	<a href="<?php echo $property['permalink']; ?>"><img src="<?php echo $property['featured_image_url']; ?>" /></a>
    	<a href="<?php echo $property['permalink']; ?>"><?php echo $property['post_title']; ?></a><br/>
    	<p class="addresslist"><?php echo $property['address']; ?></p>
    	<span class="meta">
    		<?php if($property['bedrooms'] != "") echo "Bedrooms: ".$property['bedrooms']; ?>
    		<?php if($property['bathrooms'] != "") echo "&middot; Bathrooms: ".$property['bathrooms']; ?>
    		<?php if($property['area'] != "") echo "&middot; ".$property['area']; ?>
    		</span>
    	<span class="meta"><?php if($property['price'] != "") echo "Price: ".$property['price']; ?></span>
    	<?php
    	$xdate = date("Ymd") - date("Ymd", strtotime($property['post_date']));
    	if($xdate <= "15"): ?>
    		<img src="<?php echo bloginfo("template_url"); ?>/images/new_listing_button.png" class="newlisting" />
    		<?php endif; ?>
    	<div class="clear"></div>
    </li>



    <?php endforeach; ?>
</ul><?php // .wpp_property_list ?>
<div id="pagination"><?php if(!empty($pageline)) echo " Page: ".$pageline; ?></div>

<?php endif; ?>
