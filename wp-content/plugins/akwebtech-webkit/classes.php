<?php

$akwebtech_keys['status_cc_result'] = array(0=>"Not Processed",1=>"Approved",5=>"Duplicate, Not Charged",9=>"Denied");

class webkit {
	
	function __construct(){
		global $options;
		$options = array("akwt_agent","akwt_agent_company","akwt_agent_address","akwt_agent_phone","akwt_agent_email","akwt_agent_web","akwt_agent_fax","akwt_agent_license");
		foreach($options as $key => $value){
			if(false == get_option($value)) add_option($value);
			}
		}

	function getHeader($title=null){
		if(empty($title)) $title = "Web Kit and Tool Box";
		$build = "<div class=\"wrap\">\r\n";
		$build .= "<link rel='stylesheet' href='/wp-content/plugins/akwebtech-webkit/webkit_styles.css' type='text/css' media='all' />";
		$build .= "<a name=\"top\"></a>\r\n";
		$build .= "<div id=\"icon-themes\" class=\"icon32\"></div>\r\n";
		$build .= "<h2>Alaska Web Technologies - ".$title."</h2>\r\n";
		$build .= "<i>Various tools and reports useful for the management of Wordpress and WP Properties</i>\r\n";
		return($build);		
		}
	
	function getFooter(){
		$build = "</div>";
		return($build);		
		}
	
	function howtosPage(){
		global $post;
		$domainName = str_replace(".", "_", $_SERVER['SERVER_NAME']);
		$build = $this->getHeader("How To PDF's");
		$build .= "<p>\r\n";
		$build .= "<a href=\"/wp-content/plugins/akwebtech-webkit/cm_prop_obanionrelocation.pdf\">How To Create and Modify Property Listings for www.obanionrelocation.com</a>\r\n";
		$build .= "</p>\r\n";
		$build .= $this->getFooter();
		echo $build;
		}
	function showCaseListings(){
		global $post;
		$build = $this->getHeader("Viewing All Showcase Listings");
		$build .= "<p>\r\n";
		$the_query = new WP_Query(array('posts_per_page'=>50,'post_type'=>'property','meta_key' => 'showcase','meta_value' => 'true'));
		if($the_query->have_posts()):
			$build .= "<ol class=\"akweb_list\">";
			foreach($the_query->posts as $key => $value){
				$property = prepare_property_for_display(get_property($value->ID, ($show_children ? "get_property['children']={$show_property['children']}" : "")));
				$build .= "<li>";
				$build .= "<img src=\"".$property['images']['medium']."\" class=\"akweb_img\" /><b><i>".$value->post_title."</b></i><br/>";
				$build .= "<p class=\"akweb_metas\">";
				$build .= $property['address']."<br/>";
				$build .= "<a href=\"".$property['permalink']."\" target=\"_blank\" class=\"akweb\">View</a> &middot; ";
				$build .= "<a href=\"/wp-admin/post.php?post=".$value->ID."&action=edit\" class=\"akweb\">Edit</a>";
				$build .= "</p>";
				$build .= "</li>";
				}
			$build .= "</ol>";
			endif;
		$build .= "</p>\r\n";
		$build .= $this->getFooter();
		echo $build;
		}
	function showEFlyer(){
		global $post;
		$build = $this->getHeader("Create a AKWT eFlyer");
		$build .= "<script src=\"/wp-content/plugins/akwebtech-webkit/support/index.php?c=obanionrelocation_com\" type=\"text/javascript\"></script>";
		$build .= "<div id=\"formAction\" class=\"hidden\">";
		$build .= "<h4 class=\"akweb\">Web Code</h4>\r\n";
		$build .= "<textarea name=\"akweb_code\" id=\"akweb_code\" class=\"akweb_code\"></textarea><br/>";
		$build .= "<button onClick=\"SelectAll('akweb_code')\">Highlight Code</button> <a href=\"\" id=\"editListing\">Edit Listing</a>";
		$build .= "<h3>Preview</h3><div name=\"akweb_preview\" id=\"akweb_preview\" class=\"akweb_preview\"> </div>";
		$build .= "<iframe id=\"akweb_iframe\" style=\"clear: both; display:block; height: 0px; width: 0px;\"></iframe></div>";
		$build .= "<div class=\"clear\"></div>";
		$build .= $this->getFooter();
		echo $build;
		}
	
	function showPropQueries(){
		global $post;
		$build = $this->getHeader("Property Queries");
		$build .= "<hr><div style='width: 300px; display: block; float: left;'>\r\n";
		$files = self::getOrderFiles();
		if(is_array($files)){
			foreach($files as $date => $dateFiles){
    			$build .= "<h3>".$date."</h3>";
    			foreach($dateFiles as $key => $fileName){
    				$startBold = ($fileName == $_GET['file'])? "<b>":"";
    				$endBold = ($fileName == $_GET['file'])? "</b>":"";
    				$build .= $startBold."<a href='?page=".$_GET['page']."&file=".$fileName."'>".$fileName."</a>".$endBold."<br/>";
    				}
                $build .= "<hr>";
				}
			}
		else $build .= "There are no orders.";
		$build .= "</div>\r\n";
		$build .= "<div style='width: 400px; display: block; float: left;'>\r\n";
		if(isset($_GET['file'])){
			$query_path = get_home_path().'_prop_queries';
			$file = file($query_path."/".$_GET['file']);
			$array = json_decode($file[0]);
			foreach($array as $key => $value){
				$build .= $key." => ".$value."<br/>";
				if(is_array($value)){
					foreach($value as $subkey => $subvalue){
						$build .= "<hr>";
						foreach($subvalue as $orderNumber => $order){
							$build .= $orderNumber." => ".$order."<br/>";
							}
						}
					}
				}
			$build .= "<br/><br/>Contact Key: 1 = Email, 2 = Phone";
			}
		$build .= "</div>\r\n";
		$build .= $this->getFooter();
		echo $build;
		}

	function getOrderFiles($date=null){

		$query_path = get_home_path().'_prop_queries';
		if( !is_dir($query_path) ){
			mkdir( $query_path, 0777 );
		}

		$d = dir($query_path);
		$files = [];
		while (false !== ($entry = $d->read())) {
			if(trim($entry, ".") != ""){
				//if($date == null) $files[] = $entry;
				//elseif(substr($entry, 0,8) == $date) $files[$date][] = $entry;
				$date = substr($entry, 0,8);
				$files[$date][] = $entry;
			}
		}
			
		krsort($files);
		return($files);
	}
	
	function showCharges(){
		global $post,$rentalAppTable,$transactionTable;
		if(isset($_GET['dbinstall'])){
			$error = false;
			if(!$this->installDatabase($rentalAppTable)) $error = true;
			if(!$this->installDatabase($transactionTable)) $error = true;
			if($error == true){
				$build = $this->getHeader("Install AKWT Charges Database - ERROR");
				$build .= "<p>There was an unknown error.  Please contact technical support at http://websupport.akwebtech.com.</p>";
				}
			}
		if($this->checkDatabaseTable("rental_apps") && $this->checkDatabaseTable("transactions")){   	/* DATABASE IS INSTALLED */
			$build = $this->getHeader("Rental Applications");
			if(isset($_GET['application'])) $build .= "<p>".$this->showApplication()."</p>";
			elseif(isset($_GET['receipt'])) $build .= "<p>".$this->showReceipt()."</p>";
			else $build .= "<p>".$this->showChargeTable()."</p>";
			}else{    											/* DATABASE IS NOT INSTALLED */
			$build = $this->getHeader("Install AKWT Charges Database");
			$build .= "<h4>Welcome to the AKWT Charges system.</h4>";
			$build .= "<p>To get started, <a href='".$_SERVER['PHP_SELF']."/?page=charges&dbinstall=true'>click here to install/reload databases</a>.</p>";
			}
		$build .= $this->getFooter();
		echo $build;
		}
		
	function checkDatabaseTable($name){
		global $wpdb;
		$table_name = $wpdb->prefix.$name;
		if($wpdb->get_var("SHOW TABLES LIKE '".$name."'") == $name) return true;
		return false;
		}
	
	function installDatabase($name){
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($name);
		return true;
		}
	
	function showChargeTable(){
		global $akwebtech_keys;
		global $transactionForm;
		$temp = $transactionForm[0]['fields'];
		$build .= "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js\"></script>";
		$build .= "<form action=\"\" method=\"get\">";
		$build .= "<p>Please select the start date and end date for the report. The default report is set to today.</p>";
		$build .= "<table>";
		$build .= "<tr><td>Start Date: </td><td>".$this->buildMonthSelect('month')." ".$this->buildDaySelect('day')." ".$this->buildYearSelect("2012",date("Y"),'year')."</td></tr>";
		$build .= "<tr><td>Stop Date: </td><td>".$this->buildMonthSelect('e_month')." ".$this->buildDaySelect('e_day')." ".$this->buildYearSelect("2012",date("Y"),'e_year')."</td></tr>";
		$build .= "<tr><td></td><td><input type=\"submit\" name=\"submit\" value=\"Submit\" id=\"submit\" /><input type=\"hidden\" name=\"page\" value=\"".$_GET['page']."\" /></td></tr></table></form><hr/>";
		$query = "SELECT *,AES_DECRYPT(card_number,'".$temp['card_number']['encrypt']."') as 'card_number', AES_DECRYPT(card_exp,'".$temp['card_exp']['encrypt']."') as 'card_exp' FROM `transactions` WHERE `date` LIKE '".date("Y-m-d")."%' HAVING status='1';";
		if(isset($_GET['submit'])) $query = "SELECT *,AES_DECRYPT(card_number,'".$temp['card_number']['encrypt']."') as 'card_number', AES_DECRYPT(card_exp,'".$temp['card_exp']['encrypt']."') as 'card_exp' FROM `transactions` WHERE `date` >= '".$_GET['year']."-".$_GET['month']."-".$_GET['day']." 00:00:00' AND `date` <= '".$_GET['e_year']."-".$_GET['e_month']."-".$_GET['e_day']." 99:99:99' HAVING status='1';";
		$q = mysql_query($query);
		if(mysql_num_rows($q) > 0){
			if(isset($_GET['submit'])) $build .="<p>Rental Application for <b>".date("l, F j, Y", mktime(0,0,0,$_GET['month'],$_GET['day'],$_GET['year']))." to ".date("l, F j, Y", mktime(0,0,0,$_GET['e_month'],$_GET['e_day'],$_GET['e_year']))."</b></p>";
			else $build .="<p>Rental Applications for <b>".date("l, F j, Y")."</b></p>";
			while($rec = mysql_fetch_assoc($q)){
				$color = "white";
				//if($rec['status'] == 1) $color = "#f9ffa1";
				$build .= "<table style=\" width: 800px; background-color: ".$color.";\" onMouseOver=\"$('#report_row_".$rec['id']."').removeClass('hidden');\" onMouseOut=\"$('#report_row_".$rec['id']."').addClass('hidden');\"><tr>";
				$build .= "<td width=150>".$rec['card_name']."</td>";
				$build .= "<td colspan=3>".$rec['billing_address'].", ".$rec['billing_city'].", ".$rec['billing_state']." ".$rec['billing_zip']."</td>";
				$build .= "</tr>";
				$build .= "<tr>";
				$build .= "<td></td>";
				$build .= "<td>";
				//$build .= "Result: ".$akwebtech_keys['status_cc_result'][$rec['status']]." &middot ";
				$build .= "Last Four on CC: ".substr($rec['card_number'],-4)." &middot ";
				$build .= "Amount Charge: $".number_format($rec['amount'],2);
				$build .= "</td>";
				$build .= "</tr>";
				$build .= "<tr>";
				$build .= "<td>&nbsp;</td>";
				$build .= "<td id=\"report_row_".$rec['id']."\" class=\"hidden\"><a href=\"?page=".$_GET['page']."&application=".$rec['appid']."\">View Application</a></td>";
				$build .= "</tr></table>";
				}
			$build .= "<hr/>[ End of Report ]";
			}else $build .= "<p>There are no records for that date period.</p>";
		
		return($build);
		}

	function showApplication(){
		global $akwebtech_keys;
		global $transactionForm,$rentalAppForm;
		$temp = $transactionForm[0]['fields'];
		$query = "SELECT * FROM rental_apps WHERE id = '".$_GET['application']."';";
		$q = mysql_query($query);
		if(mysql_num_rows($q) == 1){
			$rec = mysql_fetch_assoc($q);
			$build .="<p>Rental Application for ".$rec["fname"]." ".$rec["mname"]." ".$rec["lname"]."</p>";
			$build .= "<table><tr>";
			foreach($rentalAppForm as $key => $value){
				$build .= "<tr><td colspan=2><h4>".$value['title']."</h4></td></tr>";
				foreach($value['fields'] as $subkey => $subvalue){
					$display = ($subkey == "property")? $this->getProperty($rec['property']):$rec[$subkey];
					$build .= "<td width=250>".$subvalue['title']."</td>";
					$build .= "<td>".$display."</td>";
					$build .= "</tr>";
					}
				}
			$build .= "</table>";
			$build .= "<hr/>[ End of Report ]";
			}else $build .= "<p>There are no records for that application number.</p>";
		
		return($build);
		}

	function getProperty($id){
		global $wpdb;
		$statement = "SELECT * FROM $wpdb->posts WHERE $wpdb->posts.ID = '".$id."';";
		$query = mysql_query($statement);
		$rec = mysql_fetch_assoc($query);
		return($rec['post_title']);		
		}
	
	function showSettings(){
		if(isset($_POST['submit'])){
			foreach($_POST as $key => $value) update_option($key,$value);
			$message = "<div class=\"updated settings-error\" id=\"setting-error-settings_updated\"><p><strong>Settings saved.</strong></p></div>";
			}
		$build = $this->getHeader("Settings");
		$build .= $message;
		$build .= "<form action=\"\" method=\"post\">";
		$build .= "<h4>AKWT Webkit Settings - eCharges</h4>\r\n";
		$build .= "<table class=\"form-table\"><tbody>\r\n";
		$build .= "<tr valign=\"top\"><th scope=\"row\"><label for=\"akwt_agent\">Authorize Login ID</label></th>";
		$build .= "<td><input type=\"text\" class=\"regular-text\" value=\"".stripslashes(get_option("akwt_authorize_login"))."\" id=\"akwt_authorize_login\" name=\"akwt_authorize_login\"/></td></tr>\r\n";
		$build .= "<tr valign=\"top\"><th scope=\"row\"><label for=\"akwt_agent_company\">Authorize Transaction Key</label></th>";
		$build .= "<td><input type=\"text\" class=\"regular-text\" value=\"".stripslashes(get_option("akwt_authorize_trans_key"))."\" id=\"akwt_authorize_trans_key\" name=\"akwt_authorize_trans_key\"/></td></tr>\r\n";
		$build .= "<tr valign=\"top\"><th scope=\"row\"><label for=\"akwt_agent_company\">Application Fee</label></th>";
		$build .= "<td><input type=\"text\" class=\"regular-text\" value=\"".stripslashes(get_option("akwt_application_fee"))."\" id=\"akwt_application_fee\" name=\"akwt_application_fee\"/></td></tr>\r\n";
		$build .= "<tr valign=\"top\"><th scope=\"row\"><label for=\"akwt_property_lingo\">Standard Property Lingo</label></th>";
		$build .= "<td><textarea style=\"width: 300px; height: 150px;\" id=\"akwt_property_lingo\" name=\"akwt_property_lingo\" class=\"regular-text\">".stripslashes(get_option("akwt_property_lingo"))."</textarea></td></tr>\r\n";
		$build .= "<tr valign=\"top\"><th scope=\"row\"><label for=\"akwt_agent_company\">Credit Check Disclaimer</label></th>";
		$build .= "<td><textarea style=\"width: 300px; height: 150px;\" id=\"akwt_creditcheck_disclaimer\" name=\"akwt_creditcheck_disclaimer\" class=\"regular-text\">".stripslashes(get_option("akwt_creditcheck_disclaimer"))."</textarea></td></tr>\r\n";
		$build .= "<tr valign=\"top\"><th scope=\"row\"><label for=\"akwt_agent_company\">Credit Card Authorization</label></th>";
		$build .= "<td><textarea style=\"width: 300px; height: 150px;\" id=\"akwt_creditcard_authorization\" name=\"akwt_creditcard_authorization\" class=\"regular-text\">".stripslashes(get_option("akwt_creditcard_authorization"))."</textarea></td></tr>\r\n";
		$build .= "<tr valign=\"top\"><th scope=\"row\"><label for=\"akwt_agent_company\">Transaction Approval Message</label></th>";
		$build .= "<td><textarea style=\"width: 300px; height: 150px;\" id=\"akwt_transaction_approval\" name=\"akwt_transaction_approval\" class=\"regular-text\">".stripslashes(get_option("akwt_transaction_approval"))."</textarea></td></tr>\r\n";
		$build .= "<tr valign=\"top\"><th scope=\"row\"><label for=\"akwt_agent_company\">Receipt Footer</label></th>";
		$build .= "<td><textarea style=\"width: 300px; height: 150px;\" id=\"akwt_receipt_footer\" name=\"akwt_receipt_footer\" class=\"regular-text\">".stripslashes(get_option("akwt_receipt_footer"))."</textarea></td></tr>\r\n";
		$build .= "</tbody></table>\r\n";
		$build .= "<p class=\"submit\"><input type=\"submit\" value=\"Save Changes\" class=\"button-primary\" id=\"submit\" name=\"submit\"/></p></form>";
		$build .= $this->getFooter();
		echo $build;
		}	
	
	function akwebtest(){
		echo "Page for testing";
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
		if($_REQUEST[$name] == "") $_REQUEST[$name] = date("Y");
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
				$value = date("Y")+$i-1;
				$build .= "\t<option value=\"".$value."\"".$rem_selection[$value].">".$value."</option>\r";
				}
			}
		$build .= "\t</select>\r";
		return($build);
		}


	
	} // End of Class
	
	
	
	
	
	
	
	
	
	
?>