<?php
global $properties; 
print_r($properties);
$listings_per_page = 2;
$count = count($properties);
$pages = $count/$listings_per_page;
if($count%$listings_per_page != 0) $pages++;
$total_pages = substr($pages, 0, strpos($pages,"."));
$startPos = 0 + ($listings_per_page * $_GET['page']);
$endPos = $startPos + $listings_per_page -1;
for($i=$startPos;$i<=$endPos;$i++){ if(!empty($properties[$i])) $paginateProps[$i] = $properties[$i]; }
$currentPage = $_GET['page'];
foreach($_GET as $key => $value) $buildGet .= $key."=".$value."&";
for($p=1;$p<=$total_pages;$p++){
	$addClass = "";
	if($p-1 == $currentPage) $addClass = " pageselected";
	$pageline .= "<a href=\"?".$buildGet."page=".($p-1)."\" class=\"pagenumber".$addClass."\">".$p."</a>";
	
	}
?>
	<?php if(!empty($pageline)): ?><div id="pagination">Pages: <?php echo $pageline; ?></div><?php endif; ?>
