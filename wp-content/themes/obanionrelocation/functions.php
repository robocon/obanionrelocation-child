<?php

$stateArray = array(0=>"-- Select --","AL"=>"Alabama","AK"=>"Alaska","AZ"=>"Arizona","AR"=>"Arkansas","CA"=>"California","CO"=>"Colorado","CT"=>"Connecticut","DE"=>"Delaware","FL"=>"Florida","GA"=>"Georgia","HI"=>"Hawaii","ID"=>"Idaho","IL"=>"Illinois","IN"=>"Indiana","IA"=>"Iowa","KS"=>"Kansas","KY"=>"Kentucky","LA"=>"Louisiana","ME"=>"Maine","MD"=>"Maryland","MA"=>"Massachusetts","MI"=>"Michigan","MN"=>"Minnesota","MS"=>"Mississippi","MO"=>"Missouri","MT"=>"Montana","NE"=>"Nebraska","NV"=>"Nevada","NH"=>"New Hampshire","NJ"=>"New Jersey","NM"=>"New Mexico","NY"=>"New York","NC"=>"North Carolina","ND"=>"North Dakota","OH"=>"Ohio","OK"=>"Oklahoma","OR"=>"Oregon","PA"=>"Pennsylvania","RI"=>"Rhode Island","SC"=>"South Carolina","SD"=>"South Dakota","TN"=>"Tennessee","TX"=>"Texas","UT"=>"Utah","VT"=>"Vermont","VA"=>"Virginia","WA"=>"Washington","DC"=>"Washington D.C.","WV"=>"West Virginia","WI"=>"Wisconsin","WY"=>"Wyoming");
$contactArray = array(0=>"-- Select --",1=>"Email",2=>"Phone");
$interestedArray = array(0=>"-- Select --",1=>"Rentals",2=>"For Sales",3=>"Relocation",4=>"New Construction");

$cityArray = array("an"=>"Anchorage","er"=>"Eagle River & Chugiak","wa"=>"Wasilla, Palmer & Big Lake");

function createHiddenGets(){
	if(is_array($_GET)){
		$build = "";
		foreach($_GET as $key => $value){
			$build .= "<input type=\"hidden\" name=\"".$key."\" value=\"".$value."\">\r\n";
			}
		echo $build; 
		}
	}

function createAvailableDrop(){
	global $pageType;
	if($pageType == 'for_rent'){
		$rem[$_GET['avail']] = " selected";
		$build = "<select name=\"avail\">\r\n";
		$build .= "<option value=\"\">All Availability</option>\r\n";
		$build .= "<option value=\"now\" ".$rem["now" ].">Available Now</option>\r\n";
		for($i=1; $i <= 60; $i++){
			$date = date("Ym", strtotime("+".$i." month"));
			$build .= "<option value=\"".$date."\"".$rem[$date].">In ".date("F Y", strtotime("+".$i." month"))."</option>\r\n";
			}
		$build .= "</select>";	
		echo $build; 
		return;
		}else return false;
	}

function createStateDrop($name="state",$rm=false){
	global $stateArray;
	if(!isset($_REQUEST[$name]) && $rm != false) $rem[$rm] = " selected";
	if(isset($_REQUEST[$name])) $rem[$_REQUEST[$name]] = " selected";
	$build = "<select name=\"".$name."\" id=\"".$name."\">\r\n";
	foreach($stateArray as $small => $large){
		$build .= "<option value=\"".$small."\"".$rem[$small].">".$large."</option>\r\n";
		}
	$build .= "</select>";
	return $build;
	}

function buildDaySelect($name="day"){
	$build = "<select name=\"$name\" id=\"".$name."\">\r";
	if($_REQUEST[$name] == "") $_REQUEST[$name] = date("d");
	$rem_selection[$_REQUEST[$name]] = " selected";
	for($i=1;$i<=31;$i++){
		$value = date("d", mktime(0,0,0,1,$i,date("Y")));
		$build .= "\t<option value=\"".$value."\"".$rem_selection[$value].">".$i."</option>\r";
		}
	$build .= "\t</select>\r";
	return($build);
	}

function buildMonthSelect($name="month"){
	$build = "<select name=\"$name\" id=\"".$name."\">\r";
	if($_REQUEST[$name] == "") $_REQUEST[$name] = date("m");
	$rem_selection[$_REQUEST[$name]] = " selected";
	for($i=1;$i<=12;$i++){
		$value = date("m", mktime(0,0,0,$i,1,date("Y")));
		$build .= "\t<option value=\"".$value."\"".$rem_selection[$value].">".$i." ".date("F", mktime(0,0,0,$i,1,date("Y")))."</option>\r";
		}
	$build .= "\t</select>\r";
	return($build);
	}

function buildYearSelect($start,$stop,$name="year"){
	$build = "<select name=\"$name\" id=\"".$name."\">\r";
	if($_REQUEST[$name] == "") $_REQUEST[$name] = $start;
	$rem_selection[$_REQUEST[$name]] = " selected";
	$direction = "down";
	if($stop > $start) $direction = "up";
	if($direction == "down"){
		$count = $start-$stop;
		for($i=0;$i<=$count;$i++){
			$value = $start-$i;
			$build .= "\t<option value=\"".$value."\"".$rem_selection[$value].">".$value."</option>\r";
			}
		}else{
		$count = $stop-$start;
		for($i=0;$i<=$count;$i++){
			$value = date("Y")+$i;
			$build .= "\t<option value=\"".$value."\"".$rem_selection[$value].">".$value."</option>\r";
			}
		}
	$build .= "\t</select>\r";
	return($build);
	}

	
function createInterestedDrop(){
	global $interestedArray;
	$build = "<select name=\"interested\">\r\n";
	foreach($interestedArray as $small => $large){
		$build .= "<option value=\"".$small."\">".$large."</option>\r\n";
		}
	$build .= "</select>";
	return $build;
	}
	
function createContactDrop(){
	global $contactArray;
	$build = "<select name=\"contactform\">\r\n";
	foreach($contactArray as $small => $large){
		$build .= "<option value=\"".$small."\">".$large."</option>\r\n";
		}
	$build .= "</select>";
	return $build;
	}
	
function parseEmail($template,$vars,$prop=""){
	global $stateArray,$interestedArray,$contactArray;
	$file = get_theme_root()."/".get_template()."/templates/".$template;
	$lines = file($file);
	$build['to'] = substr($lines[0],4);
	$build['from'] = substr($lines[1],6);
	$build['subject'] = substr($lines[2],9);
	foreach($lines as $lineNum => $lineValue){
		if($lineNum >= 3) $build['body'] .= $lineValue."<br/>\n";
		}
		
	if($vars['call'] !== 0) $build['body'] = str_replace("[:call:]","Best time to call: ".$vars['call']."<br/>\n",$build['body']);
		else $build['body'] = str_replace("[:call:]","",$build['body']);
	if($vars['timeframe'] !== 0) $build['body'] = str_replace("[:timeframe:]","Work Time Frame: ".$vars['timeframe']."<br/>\n",$build['body']);
		else $build['body'] = str_replace("[:timeframe:]","",$build['body']);
	if($vars['vacant'] !== 0) $build['body'] = str_replace("[:vacant:]","<br/>The property is ".$vars['vacant'].".<br/>\n",$build['body']);
		else $build['body'] = str_replace("[:vacant:]","",$build['body']);
	if($vars['access'] !== 0) $build['body'] = str_replace("[:access:]","Access: ".$vars['access']."<br/>\n",$build['body']);
		else $build['body'] = str_replace("[:access:]","",$build['body']);

	if(is_array($vars['painting'])){
		$buildVars = "";
		foreach($vars['painting'] as $key => $value) $buildVars .= $value.", ";
		$buildVars = rtrim($buildVars,", ");
		$build['body'] = str_replace("[:painting:]","Items that need painting: ".$buildVars.".<br/>\nAppox. Square Footage: ".$vars['squarefootage']." sqft<br/>\n",$build['body']);
		} else $build['body'] = str_replace("[:painting:]","",$build['body']);

	if(is_array($vars['maintenance'])){
		$buildVars = "";
		foreach($vars['maintenance'] as $key => $value) $buildVars .= $value.", ";
		$buildVars = rtrim($buildVars,", ");
		$build['body'] = str_replace("[:maintenance:]","Items that need maintenance: ".$buildVars.".<br/>\n",$build['body']);
		} else $build['body'] = str_replace("[:maintenance:]","",$build['body']);

	if(is_array($vars['repair'])){
		$buildVars = "";
		foreach($vars['repair'] as $key => $value) $buildVars .= $value.", ";
		$buildVars = rtrim($buildVars,", ");
		$build['body'] = str_replace("[:repair:]","Items that need repair: ".$buildVars.".<br/>\n",$build['body']);
		} else $build['body'] = str_replace("[:repair:]","",$build['body']);

	if(is_array($vars['cleaning'])){
		$buildVars = "";
		foreach($vars['cleaning'] as $key => $value) $buildVars .= $value.", ";
		$buildVars = rtrim($buildVars,", ");
		$build['body'] = str_replace("[:cleaning:]","Items that need cleaning: ".$buildVars.".<br/>\n",$build['body']);
		} else $build['body'] = str_replace("[:cleaning:]","",$build['body']);

	if($prop['date_available']){
		$dateX[0] = substr($prop['date_available'],4,2);
		$dateX[1] = substr($prop['date_available'],6,2);
		$dateX[2] = substr($prop['date_available'],0,4);
		$dateAvailable = date("M d, Y", mktime(0,0,0,$dateX['0'],$dateX['1'],$dateX['2']));
		$build['body'] = str_replace("[:date_available:]","Lease Ending Date: ".$dateAvailable.".<br/>\n",$build['body']);
		} else $build['body'] = str_replace("[:date_available:]","",$build['body']);

	if($vars['state'] !== 0) $build['body'] = str_replace("[:state:]",$stateArray[$vars['state']],$build['body']);
		else $build['body'] = str_replace("[:state:]","\"Not Specified\"",$build['body']);
	if($vars['interested'] != 0) $build['body'] = str_replace("[:interested:]",$interestedArray[$vars['interested']],$build['body']);
		else $build['body'] = str_replace("[:interested:]","\"Not Specified\"",$build['body']);
	if($vars['contactform'] != 0) $build['body'] = str_replace("[:contactform:]",$contactArray[$vars['contactform']],$build['body']);
		else $build['body'] = str_replace("[:contactform:]","\"Not Specified\"",$build['body']);
	if($vars['phone'] != 0) $build['body'] = str_replace("[:phone:]",formatPhone($vars['phone']),$build['body']);
		else $build['body'] = str_replace("[:phone:]","\"Not Specified\"",$build['body']);
	if($prop['mls_number'] != 0) $build['body'] = str_replace("[:mls_number:]",$prop['mls_number'],$build['body']);
		else $build['body'] = str_replace("[:mls_number:]","Not Available",$build['body']);
	foreach($vars as $key => $value){
		$build['to'] = str_replace("[:".$key.":]",$value,$build['to']);
		$build['from'] = str_replace("[:".$key.":]",$value,$build['from']);
		$build['subject'] = str_replace("[:".$key.":]",$value,$build['subject']);
		$build['body'] = str_replace("[:".$key.":]",$value,$build['body']);
		}
	if(is_array($prop)){
		foreach($prop as $key => $value){
			$build['to'] = str_replace("[:".$key.":]",$value,$build['to']);
			$build['from'] = str_replace("[:".$key.":]",$value,$build['from']);
			$build['subject'] = str_replace("[:".$key.":]",$value,$build['subject']);
			$build['body'] = str_replace("[:".$key.":]",$value,$build['body']);
			}
		}
	if(strpos($build['body'],"[?comments?]")){
		if($vars['comments'] != "") $build['body'] = str_replace("[?comments?]","They also added	: <br\>".$vars['comments'],$build['body']);
		else $build['body'] = str_replace("[?comments?]","They had no additional comments or questions.",$build['body']);
		}
	return($build);
	}

function formatPhone($phone)
    {
    $phone = preg_replace("/[^0-9]/", "", $phone);
     
    if(strlen($phone) == 7)
    return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
    elseif(strlen($phone) == 10)
    return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
    else
    return $phone;
    }

function buildMessage($mess, $echo="1"){
	if($mess != null){
    $type = substr($mess,0,1);
  	switch($type){
  		case "1":
  			$return = "<div class=\"success\">".substr($mess,2)."</div>";
  			break;
  		case "2":
  			$return = "<div class=\"error\">".substr($mess,2)."</div>";
  			break;
  			}
  		if($echo == 1) echo $return;
	   return($return);
		}	
	}	


function my_custom_login_logo(){ echo '<style type="text/css"> #login { width: 768px !important; } h1 a { display: block !important; position: relative !important; margin: 0 auto !important; width: 768px !important; height: 39px !important; background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; } </style>'; }
add_action('login_head', 'my_custom_login_logo');



?>