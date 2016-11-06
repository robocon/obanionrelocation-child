<?php

header("Content-Type: text/html; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

require_once "functions.php";

$pString1 = "SELECT * FROM `".$account[$_GET['c']]['wp_db_posts']."`WHERE ID = '".$_GET['p']."';";
$query1 = mysql_query($pString1);
$rec1 = mysql_fetch_assoc($query1);

$pString2 = "SELECT * FROM `".$account[$_GET['c']]['wp_db_meta']."`WHERE post_id = '".$_GET['p']."';";
$query2 = mysql_query($pString2);
while($rec2 = mysql_fetch_assoc($query2)){
	$build[$rec2['meta_key']] = $rec2['meta_value'];
	}

$result = array_merge($rec1, $build);

echo parseTemplate($_GET['t'],$result,$_GET['a']);

/*
print_r($_GET);
print_r($result);
*/

?>