<?php

header("Content-Type: text/html; charset=UTF-8");
header('Access-Control-Allow-Origin: *');


$akwtCompany['name'] = "Alaska Web Technologies";
$akwtCompany['phone'] = "(907) 854-8330";
$templateDir = "/home/obanion/public_html/wp-content/plugins/akwebtech-webkit/templates";

$customWPOptions = array("akwt_agent","akwt_agent_company","akwt_agent_address","akwt_agent_phone","akwt_agent_email","akwt_agent_web","akwt_agent_fax","akwt_agent_license");
$customWPPropertyTypes = array("for_sale" => "For Sale", "for_rent" => "For Rent");


$account['obanionrelocation_com'] = array(
	'status'  => 'active',
	'db_host' => 'localhost',
	'db_data' => 'obanion1_wp_1cj5',
	'db_user' => 'obanion1_wp_1cj5',
	'db_pass' => 'B4ECFAD8evit1f7l23p5h9r6',
	'wp_db_posts' => 'ob_posts',
	'wp_db_meta' => 'ob_postmeta',
	'template_url' => 'http://obanionrelocation.com/wp-content/themes/obanionrelocation',
	'logo' => '/images/akwt_webkit_logo.png',
	'company' => 'O\Banion Real Estate & Relocation Services LLC',
	'company_address' => '6200 Lake Otis Parkway Suite 201<br/>Anchorage, Alaska 99507',
	'header' => '/images/akwt_webkit_logo.png',
	'users' => array(
		'1' => array(
			'name' => 'Todd O\'Banion',
			'phone' => '(907) 884-3073',
			'cell' => '',
			'fax' => '',
			'license' => '',
			'email' => 'obanionrelocation@gmail.com',
			'web' => 'http://obanionrelocation.com',
			'mug' => '/images/akwt_webkit_mug.png'
			)
		)
	);

function getListings(){
	global $account;
	$query = mysql_query("select ID, post_title from ".$account[$_GET['c']]['wp_db_posts']." where post_type = 'property' and post_status = 'publish' order by ID DESC;");
	while($rec = mysql_fetch_assoc($query)) $build[] = $rec;
	return($build);
	}
	
function getTemplateNames(){
	global $templateDir;
	$dir = dir($templateDir);
	while (false !== ($entry = $dir->read())){
		if(null != (trim($entry,"."))) $files[] = $templateDir."/".$entry;
		}
	$dir->close();
	if(is_array($files)){
		foreach($files as $key => $value){
			$line = file($value);
			$title = preg_replace("(Template Name: )", "", $line[0]);
			$title = str_replace("\n", "", $title);
			$build[] = array("title"=>$title, "location"=>$value);
			}
		}
	sort($build);
	return($build);		
	}

function getOptions($key){
	global $account;
	$query = mysql_query("SELECT * FROM ".$account[$_GET['c']]['wp_db_meta']." WHERE meta_key = '".$key."';");
	$rec = mysql_fetch_assoc($query);
	return($rec[$key]);	
	}

function formatAddress($vars){
	if(!empty($vars['street_number'])) $build .= $vars['street_number']." ";
	if(!empty($vars['route'])) $build .= $vars['route']." <br/>";
	if(!empty($vars['district'])) $build .= $vars['district'].", ";
	elseif(!empty($vars['city'])) $build .= $vars['city']." ";
	if(!empty($vars['state_code'])) $build .= $vars['state_code']." ";
	if(!empty($vars['postal_code'])) $build .= $vars['postal_code']."";
	return($build);	
	}

function parseTemplate($template,$vars,$user){
	global $account,$customWPOptions,$customWPPropertyTypes;
	$lines = file($template);
	$permalink = str_replace("&#038;", "&", $vars['guid']);
	foreach($lines as $lineNum => $lineValue) if($lineNum != 0) $body .= $lineValue;
	$body = str_replace("[:blogurl:]",$account[$_GET['c']]['template_url'],$body);
	if(!empty($vars['bedrooms'])) $body = str_replace("[:bedrooms:]","Bedrooms: ".$vars['bedrooms'],$body); else $body = str_replace("[:bedrooms:]","",$body);
	if(!empty($vars['bathrooms'])) $body = str_replace("[:bathrooms:]","Bathrooms: ".$vars['bathrooms'],$body); else $body = str_replace("[:bathrooms:]","",$body);
	if(!empty($vars['area'])) $body = str_replace("[:area:]","Size: ".number_format($vars['area'])." sqft",$body); else $body = str_replace("[:area:]","",$body);
	if(!empty($vars['post_content'])){
		$postContent = preg_replace("/[^\x20-\x7f\t\n\r]+/", " ", $vars['post_content']);
		$body = str_replace("[:post_content:]",$postContent,$body); 
		}else $body = str_replace("[:post_content:]","",$body);
	if(!empty($vars['price'])) $body = str_replace("[:price:]","\$".@number_format(str_replace(",","",$vars['price']),0),$body); else $body = str_replace("[:price:]","",$body);
	if(!empty($vars['property_type'])) $body = str_replace("[:property_type_label:]",$customWPPropertyTypes[$vars['property_type']],$body); else $body = str_replace("[:property_type_label:]","",$body);
	$body = str_replace("[:address:]",formatAddress($vars),$body);
	$body = str_replace("[:webaddress:]",$account[$_GET['c']]['users'][$user]['web'],$body);
	$body = str_replace("[:permalink:]",$permalink,$body);
	$body = str_replace("[:companyheader:]",$account[$_GET['c']]['template_url'].$account[$_GET['c']]['header'],$body);
	if(is_array($customWPOptions)){
		foreach($customWPOptions as $key => $value) $body = str_replace("[:".$value.":]",stripslashes(getOptions($value)),$body);
		}
	$photos = getGallery($vars['ID']);
	if(count($photos) > 1){
		//******** Print Gallery ***********//
		if(strpos($body,"[:galleryprint:]")){
			$i=0;
			$buildGallery .= "<table width=\"360\" cellspacing=\"10\">";
			foreach($photos as $photoNum => $photoValues){
				if($photoNum != $vars['_thumbnail_id']){
					if($i%3 == 0) $buildGallery .= "<tr>\r\n";
					$buildGallery .= "<td style=\"width:33%\"><img src=\"".$photoValues['image']."\" width=\"108\" border=\"1\" /></td>\r\n";  
					if($i%3 == 2) $buildGallery .= "</tr>\r\n";
					$i++;
					if($i >=9) break;
					}
				}
			if($i%3 != 0) $buildGallery .= "</td>";
			$buildGallery .= "</table>";
			$buildGallery .= "<p><b>See enlarged photos and more at online at<br/> ".$account[$_GET['c']]['users'][$user]['web']."</b></p>";
			$body = str_replace("[:galleryprint:]",$buildGallery,$body);
			$body = str_replace("[:photo:]","<img src=\"".$photos[$vars['_thumbnail_id']]['image']."\" width='360' />",$body);
		}
		//******** Web Gallery ***********//
		if(strpos($body,"[:galleryweb:]")){
			$i=0;
			$buildGallery .= "<table cellspacing=\"0\" cellpadding=\"5\">";
			foreach($photos as $photoNum => $photoValues){
				if($photoNum != $vars['_thumbnail_id']){
					if($i%2 == 0) $buildGallery .= "<tr>\r\n";
					$buildGallery .= "<td width=\"186\" align=\"center\"><a href=\"".$permalink."\"><img src=\"".$photoValues['image']."\" width=\"100%\" border=\"0\" /></a></td>\r\n";
					if($i%2 == 2) $buildGallery .= "</tr>\r\n";
					$i++;
					if($i >=4) break;
					}
				}
			if($i%4 != 0) $buildGallery .= "</td>";
			$buildGallery .= "</table>";
			$body = str_replace("[:galleryweb:]",$buildGallery,$body);
			$body = str_replace("[:photo:]","<img src=\"".$photos[$vars['_thumbnail_id']]['image']."\" width='370' />",$body);
		}
		//******** Web Gallery ***********//
		if(strpos($body,"[:gallerywebsplit:]")){
			$i=0;
			foreach($photos as $photoNum => $photoValues){
				if($photoNum != $vars['_thumbnail_id']){
					$buildGallery .= "<a href=\"".$permalink."\"><img src=\"".$photoValues['image']."\" width=\"250\" border=\"0\" /></a>&nbsp;\r\n";
					if($i%2 == 2) $buildGallery .= "<br/>\r\n";
					$i++;
					if($i >=4) break;
					}
				}
			if($i%4 != 0) $buildGallery .= "</td>";
			$body = str_replace("[:gallerywebsplit:]",$buildGallery,$body);
			$body = str_replace("[:photo:]","<img src=\"".$photos[$vars['_thumbnail_id']]['image']."\" width='510' />",$body);
		}
	}elseif(count($photos) == 1) $body = str_replace("[:photo:]","<a href=\"".$permalink."\"><img src=\"".$photos[$vars['_thumbnail_id']]['image']."\" width='378' border=\"1\" /></a>",$body);
	else $body = str_replace("[:photo:]","",$body);
	$body = str_replace("[:galleryprint:]","",$body);
	$body = str_replace("[:galleryweb:]","",$body);
	$body = str_replace("[:mug:]",$account[$_GET['c']]['template_url'].$account[$_GET['c']]['users'][$user]['mug'],$body);
	if($vars['mls_number'] != 0) $body = str_replace("[:mls_number:]","MLS Number ".$vars['mls_number'],$body); else $body = str_replace("[:mls_number:]","",$body);
	if(is_array($vars)){ foreach($vars as $key => $value) $body = str_replace("[:".$key.":]",$value,$body); }
	if(is_array($account[$_GET['c']])){ foreach($account[$_GET['c']] as $key => $value) $body = str_replace("[:".$key.":]",$value,$body); }
	if(is_array($account[$_GET['c']]['users'][$user])){ foreach($account[$_GET['c']]['users'][$user] as $key => $value) $body = str_replace("[:".$key.":]",$value,$body); }
	return($body);
	}

function getUserInfo(){
	global $account;
	if(is_array($account[$_GET['c']]['users'])){
		foreach($account[$_GET['c']]['users'] as $key => $value) $build[$key] = $value;
		}
	return($build);
	}

function getGallery($postId,$number_of_posts=99){
	global $account;
	$query = mysql_query("SELECT * FROM ".$account[$_GET['c']]['wp_db_posts']." WHERE post_type = 'attachment' AND post_parent = '".$postId."' ORDER BY menu_order ASC;");
	while($rec = mysql_fetch_assoc($query)){
		$i = $rec['ID'];
		$build[$i]['link'] = $rec['post_name'];
		$build[$i]['image'] = $rec['guid'];
		$build[$i]['caption'] = $rec['post_content'];
    	$i++;
		}
	return($build);
	}

function mysqlConnect($client){
	global $account;
	mysql_connect($account[$client]['db_host'],$account[$client]['db_user'],$account[$client]['db_pass']) or die("Cannot connect to DB");
	mysql_select_db($account[$client]['db_data']) or die("Cannot select database ".$account[$client]['db_data'].". ".mysql_error());
	}
mysqlConnect($_GET['c']);


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