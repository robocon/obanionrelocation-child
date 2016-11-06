<?php

$session_id = session_id();

$rentalAppForm[] = array(
	"title"=>"Part 1 - Personal Information",
	"fields"=>array(
		"fname"=>array("title"=>"First Name","required"=>"y","dbtype"=>"varchar(255)"),
		"mname"=>array("title"=>"Middle Inital","dbtype"=>"char(1)"),
		"lname"=>array("title"=>"Last Name","required"=>"y","break"=>"y","dbtype"=>"varchar(255)"),
		"ssn"=>array("title"=>"Social Security Number","required"=>"y","type"=>"password","notes"=>"Numbers Only, No Dashes","dbtype"=>"blob"),
		"ssn_verify"=>array("title"=>"Retype Social Security Number","required"=>"y","type"=>"password","break"=>"y","dbtype"=>"blob","notes"=>"<div id='ssn_error' class='hidden'>Do Not Match</div><div id='ssn_success' class='hidden'>Match</div>"),
		"drivers_license_st"=>array("title"=>"Driver's License State","required"=>"y","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"drivers_license_num"=>array("title"=>"Driver's License Number","required"=>"y","dbtype"=>"varchar(255)"),
		"drivers_license_exp"=>array("title"=>"Driver's License Expiration","required"=>"y","dbtype"=>"char(8)","type"=>"dropDateMDY", "year_start"=>date("Y"), "year_stop"=>date("Y")+15),
		"dob"=>array("title"=>"Date of Birth","required"=>"y","type"=>"dropDateMDY","dbtype"=>"char(8)", "year_start"=>date("Y")-16, "year_stop"=>date("Y")-108,"notes"=>"You must be at least 18 years old to submit an application.","break"=>"y"),
		"phone_primary"=>array("title"=>"Primary Phone","required"=>"y","class"=>"medium","dbtype"=>"char(10)","datatype"=>"phone"),
		"phone_other"=>array("title"=>"Other Phone","class"=>"medium","dbtype"=>"char(10)","datatype"=>"phone"),
		"email"=>array("title"=>"Email Address","required"=>"y","break"=>"y","dbtype"=>"varchar(255)"),
		));

$rentalAppForm[] = array(
	"title"=>"Part 2 - Residence History",
	"fields"=>array(
		"address"=>array("title"=>"Current Address","required"=>"y","dbtype"=>"varchar(255)"),
		"city"=>array("title"=>"City","required"=>"y","dbtype"=>"varchar(255)"),
		"state"=>array("title"=>"State","required"=>"y","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"zip"=>array("title"=>"Zip Code","required"=>"y","class"=>"small","break"=>"y","dbtype"=>"char(5)"),
		"resident_status"=>array("title"=>"Residence Status","required"=>"y","type"=>"radio","options"=>array(1=>"Own",2=>"Rent"),"class"=>"follow","dbtype"=>"char(1)"),
		"monthly_payment"=>array("title"=>"Monthly Payment","required"=>"y","break"=>"y","dbtype"=>"varchar(10)"),
		"ll_name"=>array("title"=>"Name of Landlord/Mortgage Co.","required"=>"y","dbtype"=>"varchar(255)"),
		"ll_address"=>array("title"=>"Address","required"=>"y","dbtype"=>"varchar(255)"),
		"ll_city"=>array("title"=>"City","required"=>"y","dbtype"=>"varchar(255)"),
		"ll_state"=>array("title"=>"State","required"=>"y","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"ll_zip"=>array("title"=>"Zip Code","required"=>"y","class"=>"small","dbtype"=>"char(5)"),
		"ll_phone"=>array("title"=>"Phone","required"=>"y","class"=>"medium","dbtype"=>"char(10)","datatype"=>"phone"),
		));

$rentalAppForm[] = array(
	"title"=>"Part 3 - Employment History",
	"fields"=>array(
		"employ_name"=>array("title"=>"Current Employer","dbtype"=>"varchar(255)"),
		"employ_address"=>array("title"=>"Address","dbtype"=>"varchar(255)"),
		"employ_city"=>array("title"=>"City","dbtype"=>"varchar(255)"),
		"employ_state"=>array("title"=>"State","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"employ_zip"=>array("title"=>"Zip Code","class"=>"small","dbtype"=>"char(5)"),
		"employ_phone"=>array("title"=>"Phone","class"=>"medium","dbtype"=>"char(10)","datatype"=>"phone"),
		"position"=>array("title"=>"Position","dbtype"=>"varchar(255)"),
		"supervisor"=>array("title"=>"Supervisor","dbtype"=>"varchar(255)"),
		"employ_time"=>array("title"=>"How Long","class"=>"medium","dbtype"=>"varchar(255)"),
		"salary"=>array("title"=>"Salary","class"=>"medium","dbtype"=>"varchar(255)"),
		));

$rentalAppForm[] = array(
	"title"=>"Part 4 - Military Information",
	"fields"=>array(
		"unit_assigned"=>array("title"=>"Unit Assigned","dbtype"=>"varchar(255)"),
		"unit_address"=>array("title"=>"Address","dbtype"=>"varchar(255)"),
		"unit_city"=>array("title"=>"City","dbtype"=>"varchar(255)"),
		"unit_state"=>array("title"=>"State","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"unit_zip"=>array("title"=>"Zip Code","class"=>"small","dbtype"=>"char(5)"),
		"unit_paygrade"=>array("title"=>"Pay Grade","dbtype"=>"varchar(40)"),
		"unit_commander"=>array("title"=>"Unit Commander","dbtype"=>"varchar(255)"),
		"unit_commander_phone"=>array("title"=>"Phone","class"=>"medium","dbtype"=>"char(10)","datatype"=>"phone"),
		));

$rentalAppForm[] = array(
	"title"=>"Part 5 - Credit References",
	"fields"=>array(
		"vehicle1_make"=>array("title"=>"Vehicle 1 Make","class"=>"medium","dbtype"=>"varchar(255)"),
		"vehicle1_model"=>array("title"=>"Vehicle 1 Model","class"=>"medium","dbtype"=>"varchar(255)"),
		"vehicle1_color"=>array("title"=>"Vehicle 1 Color","class"=>"medium","dbtype"=>"varchar(255)"),
		"vehicle1_state"=>array("title"=>"Vehicle 1 State","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"vehicle1_plate"=>array("title"=>"Vehicle 1 Plate","class"=>"medium","dbtype"=>"varchar(255)"),
		"vehicle1_tag_exp"=>array("title"=>"Vehicle 1 Tag Expiration","type"=>"dropDateMY","dbtype"=>"char(6)", "year_start"=>date("Y"), "year_stop"=>date("Y")+10,"break"=>"y"),
		"vehicle2_make"=>array("title"=>"Vehicle 2 Make","class"=>"medium","dbtype"=>"varchar(255)"),
		"vehicle2_model"=>array("title"=>"Vehicle 2 Model","class"=>"medium","dbtype"=>"varchar(255)"),
		"vehicle2_color"=>array("title"=>"Vehicle 2 Color","class"=>"medium","dbtype"=>"varchar(255)"),
		"vehicle2_state"=>array("title"=>"Vehicle 2 State","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"vehicle2_plate"=>array("title"=>"Vehicle 2 Plate","class"=>"medium","dbtype"=>"varchar(255)"),
		"vehicle2_tag_exp"=>array("title"=>"Vehicle 2 Tag Expiration","type"=>"dropDateMY","dbtype"=>"char(6)", "year_start"=>date("Y"), "year_stop"=>date("Y")+10),
		));

$rentalAppForm[] = array(
	"title"=>"Part 6 - Banking Information",
	"fields"=>array(
		"bank1_name"=>array("title"=>"Name of Financial Institution","required"=>"y","dbtype"=>"varchar(255)"),
		"bank1_account"=>array("title"=>"Account Number","dbtype"=>"varchar(255)"),
		"bank1_type"=>array("title"=>"Type of Account","required"=>"y","dbtype"=>"varchar(255)"),
		"bank1_address"=>array("title"=>"Address","required"=>"y","dbtype"=>"varchar(255)"),
		"bank1_city"=>array("title"=>"City","required"=>"y","dbtype"=>"varchar(255)"),
		"bank1_state"=>array("title"=>"State","function"=>"createStateDrop","dbtype"=>"char(2)","required"=>"y"),
		"bank1_zip"=>array("title"=>"Zip Code","class"=>"small","required"=>"y","dbtype"=>"char(5)"),
		"bank1_phone"=>array("title"=>"Phone","class"=>"medium","required"=>"y","break"=>"y","dbtype"=>"char(10)","datatype"=>"phone"),
		"bank2_name"=>array("title"=>"Additional Financial Institution","dbtype"=>"varchar(255)"),
		"bank2_account"=>array("title"=>"Account Number","dbtype"=>"varchar(255)"),
		"bank2_type"=>array("title"=>"Type of Account","dbtype"=>"varchar(255)"),
		"bank2_address"=>array("title"=>"Address","dbtype"=>"varchar(255)"),
		"bank2_city"=>array("title"=>"City","dbtype"=>"varchar(255)"),
		"bank2_state"=>array("title"=>"State","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"bank2_zip"=>array("title"=>"Zip Code","class"=>"small","dbtype"=>"char(5)"),
		"bank2_phone"=>array("title"=>"Phone","class"=>"medium","dbtype"=>"char(10)","datatype"=>"phone"),
		));

$rentalAppForm[] = array(
	"title"=>"Part 7 - Emergency Contact Information",
	"fields"=>array(
		"emergency_name"=>array("title"=>"Name","required"=>"y","dbtype"=>"varchar(255)"),
		"emergency_relationship"=>array("title"=>"Relationship","required"=>"y","dbtype"=>"varchar(255)"),
		"emergency_phone"=>array("title"=>"Phone","required"=>"y","dbtype"=>"char(10)","datatype"=>"phone"),
		"emergency_alt"=>array("title"=>"Alternate Phone","dbtype"=>"char(10)"),
		));

$rentalAppForm[] = array(
	"title"=>"Part 8 - Other Information",
	"fields"=>array(
		"property"=>array("title"=>"Property applying for","type"=>"dropProperty","dbtype"=>"int(10)"),
		"agent"=>array("title"=>"Have you spoken to anyone from our office about this application?","type"=>"dropAgent","dbtype"=>"varchar(255)"),
		"pets"=>array("title"=>"Please describe your pet(s) and your pet(s) needs if any.","dbtype"=>"blob",),
		));

$transactionForm[] = array(
	"title"=>"Part 9 - Credit Card Information",
	"fields"=>array(
		"card_name"=>array("title"=>"Name on Card","required"=>"y","dbtype"=>"varchar(255)"),
		"card_number"=>array("title"=>"Debit/Credit Card Number","required"=>"y","notes"=>"Numbers Only","dbtype"=>"varchar(255)","datatype"=>"creditcard","encrypt"=>"wvnwOE08w"),
		"card_exp"=>array("title"=>"Card Expiration","type"=>"dropDateMY", "year_start"=>date("Y"), "year_stop"=>date("Y")+20,"required"=>"y","dbtype"=>"varchar(255)","encrypt"=>"32sefwSDF9w746t"),
		"card_code"=>array("title"=>"Security Code","notes"=>"3 digit code on back of card","required"=>"y","dbtype"=>"none","class"=>"small","hidepreview"=>"true"),
		"billing_same"=>array("title"=>"Billing Information","dbtype"=>"none","type"=>"checkbox","event"=>"onClick=\"copyAddress();\"","options"=>array("Same as Current Address")),
		"billing_address"=>array("title"=>"Address","required"=>"y","dbtype"=>"varchar(255)"),
		"billing_city"=>array("title"=>"City","required"=>"y","dbtype"=>"varchar(255)"),
		"billing_state"=>array("title"=>"State","required"=>"y","function"=>"createStateDrop","dbtype"=>"char(2)"),
		"billing_zip"=>array("title"=>"Zip Code","required"=>"y","class"=>"small","dbtype"=>"char(5)"),
		));




class AKWebTech_CreditCards {

	function __construct(){
		global $rec;
		}

	function verifyRecord($create=false){
		if($_SESSION['rid'] == "" && $create == true) $this->createNewRecord();
		else $this->loadRecord($_SESSION['rid']);
		if($_SESSION['tid'] !== "") $this->loadTransaction($_SESSION['tid']);
		$_SESSION['rid'] = $this->rec['id'];
		}

	function createTransaction(){
		$q = "INSERT INTO transactions (appid) VALUES ('".$this->rec['id']."');";
		$query = mysql_query($q);
		$this->rec['tid'] = mysql_insert_id();
		$_SESSION['tid'] = $this->rec['tid'];
		$_SESSION['cc_scode'] = $_POST['cc_scode'];
		return true;
		}

	function createNewRecord(){
		$q = "INSERT INTO rental_apps (status) VALUES ('0');";
		$query = mysql_query($q);
		$this->rec['id'] = mysql_insert_id();
		$_SESSION['rid'] = $this->rec['id'];
		return true;
		}

	function loadRecord($id){
		$q = "SELECT * FROM rental_apps WHERE id = '".$id."';";
		$query = mysql_query($q);
		$this->rec = mysql_fetch_assoc($query);
		return true;
		}

	function loadTransaction($id){
		global $transactionForm;
		$temp = $transactionForm[0]['fields'];
		$q = "SELECT *, AES_DECRYPT(card_number,'".$temp['card_number']['encrypt']."') as 'card_number', AES_DECRYPT(card_exp,'".$temp['card_exp']['encrypt']."') as 'card_exp', id as 'tid', status as 'tstatus', date as 'tdate' FROM transactions WHERE id = '".$id."' AND appid='".$this->rec['id']."';";
		$query = mysql_query($q);
		$array = mysql_fetch_assoc($query);
		if(is_array($array)){ foreach($array as $key => $value){ if($key != "id" && $key != "date" && $key != "status") $this->rec[$key] = $value; }}
		return true;
		}

	function buildTableQuery($formArray){
		if(is_array($formArray)){
			foreach($formArray as $key => $fieldset){
				foreach($fieldset['fields'] as $fieldName => $fieldArgs){
					if($fieldArgs['dbtype'] != "none"){
						$null = $fieldArgs['required'] == "y" ? " NOT NULL" : " NULL";
						$build .= "`".$fieldName."` ".$fieldArgs['dbtype'].$null.", ";
						}
					}
				}
			}
		return $build;
		}

	function submitPayment(){
		if($this->rec['tstatus'] == 0){
			$testRequest = ($this->rec['card_number'] == "5424000000000015")? "TRUE":"FALSE";
			$authnet_values = array(
				"x_version" => "3.1",
				"x_login" => stripslashes(get_option("akwt_authorize_login")),
				"x_tran_key" => stripslashes(get_option("akwt_authorize_trans_key")),
				"x_test_request" => $testRequest,
				"x_delim_char" => "|",
				"x_delim_data" => "TRUE",
				"x_type" => $capturetype,
				"x_cust_id" => $this->rec['id'],
				"x_invoice_num" => $io,
				"x_first_name" => $this->rec['fname'],
				"x_last_name" => $this->rec['lname'],
				"x_address" => $this->rec['billing_address'],
				"x_city" => $this->rec['billing_city'],
				"x_state" => $this->rec['billing_state'],
				"x_zip" => $this->rec['billing_zip'],
				"x_phone" => $this->rec['phone_primary'],
				"x_email" => $this->rec['email'],
				"x_country" => "US",
				"x_description" => $this->rec['description'],
				"x_card_num" => $this->rec['card_number'],
				"x_exp_date" => substr($this->rec['card_exp'],4,2).substr($this->rec['card_exp'],0,4),
				"x_amount" => $this->rec['amount']
				);
			$fields = "";
			foreach($authnet_values as $key => $value ) $fields .= $key."=".urlencode($value)."&";
			$ch = curl_init("https://secure.authorize.net/gateway/transact.dll");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& "));
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$resp = curl_exec($ch);
			curl_close ($ch);
			}else $resp = "5|5|5|This is a duplicate transaction most likely the result hitting your refresh button.";
		return($resp);
		}

	function recordApplication(){
		foreach($_POST as $key => $value){
			$temp = "";
			if(is_array($value)){
				if($value['month']) $temp = $value['year'].$value['month'].$value['day'];
				else{
					foreach($value as $order => $orderBuild) $temp .= $orderBuild;
					}
				}else $temp = $value;
			$dataArray[$key] = $temp;
			}
		$q = "SHOW COLUMNS FROM rental_apps";
		$query = mysql_query($q);
		while($rec = mysql_fetch_assoc($query)){
			$fieldName = $rec['Field'];
			if($dataArray[$fieldName] && !is_array($dataArray[$fieldName])){
				$buildFields .= $fieldName." = '".$dataArray[$fieldName]."',";
				}
			}
		$updateQuery = "UPDATE rental_apps SET ".$buildFields." status = '0' WHERE id = '".$this->rec['id']."';";
		mysql_query($updateQuery);
		}

	function recordTransaction(){
		global $transactionForm;
		foreach($_POST as $key => $value){
			$temp = "";
			if(is_array($value)){
				if($value['month']) $temp = $value['year'].$value['month'].$value['day'];
				else{
					foreach($value as $order => $orderBuild) $temp .= $orderBuild;
					}
				}else $temp = $value;
			$dataArray[$key] = $temp;
			}
		$q = "SHOW COLUMNS FROM transactions";
		$query = mysql_query($q);
		while($rec = mysql_fetch_assoc($query)){
			$fieldName = $rec['Field'];
			if($dataArray[$fieldName] && !is_array($dataArray[$fieldName])){
				if(!isset($transactionForm[0]['fields'][$fieldName]['encrypt'])) $buildFields .= $fieldName." = '".$dataArray[$fieldName]."',";
				else $buildFields .= $fieldName." = AES_ENCRYPT('".$dataArray[$fieldName]."','".$transactionForm[0]['fields'][$fieldName]['encrypt']."'),";
				}
			}
		foreach($_SERVER as $key => $value) $serverData .= $key."=>".$value."|";
					$amount = get_option("akwt_application_fee");

		$updateQuery = "UPDATE transactions SET ".$buildFields." date='".date("Y-m-d H:i:s")."', amount='".get_option("akwt_application_fee")."', serverdata='".$serverData."', status = '0' WHERE id = '".$this->rec['tid']."';";
		mysql_query($updateQuery);
		}

	function processResult($result){
		$parts = explode("|",$result);
		/******** Transaction was approved ********/
		$this->updateStatus('transactions','resp',$result,$this->rec['tid']);
		if($parts[0] == "1" && $parts[0] == "1" && $parts[0] == "1"){
			$this->updateStatus('transactions','status','1',$this->rec['tid']);
			$this->updateStatus('transactions','conf',$parts[4],$this->rec['tid']);
			$this->updateStatus('rental_apps','status','1',$this->rec['id']);
			$message = "1 ".stripslashes(get_option('akwt_transaction_approval'));
			$this->loadTransaction($this->rec['tid']);
			session_destroy();
			}
		/******** Transaction was NOT approved ********/
		else{
			$this->updateStatus('transactions','status','5',$this->rec['tid']);
			$message = "2  <p>We're sorry.  This transaction has been denied for the following reason:</p><p><i>".$parts[3]."</i></p><p><a href=\"\">Click Here</a> to edit your information.</p>";
			}
		return $message;
		}

	function viewReceipt(){
		$build = "<form><fieldset>";
		$build .= "<div class=\"formRow\"><label>Applicant Name</label><div class=\"formValue\">".$this->rec['fname']." ".$this->rec['mname']." ".$this->rec['lname']."</div></div>";
		$build .= "<div class=\"formRow\"><label>Applicant Address</label><div class=\"formValue\">".$this->rec['address']."<br/>".$this->rec['city'].", ".$this->rec['state']." ".$this->rec['zip']."</div></div>";
		$build .= "<div class=\"formRow\"><label>Applicant Phone</label><div class=\"formValue\">".formatPhone($this->rec['phone_primary'])."</div></div>";
		$build .= "<div class=\"formRow\"><label>Applicant Email</label><div class=\"formValue\">".$this->rec['email']."</div></div>";
		$build .= "</fieldset><fieldset>";
		$build .= "<div class=\"formRow\"><label>Billing Name</label><div class=\"formValue\">".$this->rec['card_name']."</div></div>";
		$build .= "<div class=\"formRow\"><label>Billing Address</label><div class=\"formValue\">".$this->rec['billing_address']."<br/>".$this->rec['billing_city'].", ".$this->rec['billing_state']." ".$this->rec['billing_zip']."</div></div>";
		$build .= "<div class=\"formRow\"><label>Credit Card</label><div class=\"formValue\">**** **** **** ".substr($this->rec['card_number'],-4)."</div></div>";
		$build .= "<div class=\"formRow\"><label>Expiration</label><div class=\"formValue\">".substr($this->rec['card_exp'],4,2)."/".substr($this->rec['card_exp'],0,4)."</div></div>";
		$build .= "</fieldset><fieldset>";
		$build .= "<div class=\"formRow\"><label>Conformation Number</label><div class=\"formValue\">".$this->rec['conf']."</div></div>";
		$build .= "<div class=\"formRow\"><label>Invoice Number</label><div class=\"formValue\">".$this->rec['id']."</div></div>";
		$build .= "<div class=\"formRow\"><label>Invoice Date</label><div class=\"formValue\">".$this->rec['tdate']."</div></div>";
		$build .= "<div class=\"formRow\"><label>Billed Amount</label><div class=\"formValue\">\$".number_format($this->rec['amount'],2)."</div></div>";
		$build .= "</fieldset><fieldset>";
		$build .= "<div class=\"formRow indent\"><div class=\"formValue\">".stripslashes(str_replace("\r","<br/>",get_option('akwt_receipt_footer')))."</div></div>";
		$build .= "</fieldset></form>";
		return($build);
		}

	function updateStatus($table,$field,$value,$id){
		mysql_query("UPDATE ".$table." SET ".$field."='".addslashes($value)."' WHERE id='".$id."';");
		}

	} // END CLASS AKWebTech_CreditCards

$matsu = new AKWebTech_CreditCards;

$rentalAppTable = "CREATE TABLE `rental_apps` (
  `id` int(12) NOT NULL auto_increment,
  ".$matsu->buildTableQuery($rentalAppForm)."
  `date` char(8) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1
";

$transactionTable = "CREATE TABLE `transactions` (
  `id` int(12) NOT NULL auto_increment,
  `appid` int(12) NOT NULL,
  ".$matsu->buildTableQuery($transactionForm)."
  `resp` blob,
  `conf` varchar(12) NOT NULL,
  `amount` varchar(12) NOT NULL,
  `date` char(19) NOT NULL,
  `serverdata` blob,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1
";

function buildForm($formArray){
	global $matsu,$stateArray,$wpdb;
	if(is_array($formArray)){
		foreach($formArray as $key => $fieldset){
			$build .= "<fieldset>\r\n"."<legend>".$fieldset['title']."</legend>\r\n";
			$preview .= "<fieldset>\r\n"."<legend>".$fieldset['title']."</legend>\r\n";
			foreach($fieldset['fields'] as $fieldName => $fieldArgs){
				$required = $fieldArgs["required"] == "y" ? " *" : "";
				if($fieldArgs["required"] == "y") $javaRequiredArray .= "'".$fieldName."',";
				$class = !empty($fieldArgs["class"]) ? " class=\"".$fieldArgs["class"]."\"" : "";  // Adds Class
				$addEvent = isset($fieldArgs['event'])? " ".$fieldArgs['event']: "";
				$build .= "<p><label id=\"lb_".$fieldName."\" for=\"".$fieldName."\">".$fieldArgs['title'].$required."</label>\r\n";
				$preview .= "<div class=\"formRow\"><label id=\"lb_".$fieldName."\" for=\"".$fieldName."\">".$fieldArgs['title'].$required."</label>\r\n";

				/************* Type equals 'text' *************/
				if(empty($fieldArgs['type']) && empty($fieldArgs['function'])){
					$build .= "<input type=\"text\" name=\"".$fieldName."\" id=\"".$fieldName."\" value=\"".$matsu->rec[$fieldName]."\"".$class." />";
					if(!empty($fieldArgs['datatype'])){
						switch($fieldArgs['datatype']){
							case "phone":
								$previewValue = formatPhone($matsu->rec[$fieldName]);
								break;
							}
						}else{
						$previewValue = $matsu->rec[$fieldName];
						}
					if($fieldArgs['hidepreview'] != "true"){
						if($fieldArgs['datatype'] != "creditcard") $preview .= "<div id=\"prev_".$fieldName."\" class=\"formValue\">".$matsu->rec[$fieldName]."</div>";
						else $preview .= "<div id=\"prev_".$fieldName."\" class=\"formValue\">**** **** **** ".substr($matsu->rec[$fieldName],-4,4)."</div>";
						}
					else $preview .= "***";
					}

				/************* Type equals 'password' *************/
				if($fieldArgs['type'] == "password"){
					$build .= "<input type=\"password\" name=\"".$fieldName."\" id=\"".$fieldName."\"".$class.$addEvent." />";
					$preview .= "****************";
					}

				/************* Type equals 'radio' *************/
				if($fieldArgs['type'] == "radio"){
					foreach($fieldArgs['options'] as $okey => $ovalue){
						$optionClass = !empty($fieldArgs["class"]) && current($fieldArgs['options']) == reset($fieldArgs['options']) ? " class=\"".$fieldArgs["class"]."\"" : "";  // Adds Class
						$preselect = $matsu->rec[$fieldName] == $okey ? " checked" : "";  // Remembers what the user selected
						$build .= "<input type=\"radio\" name=\"".$fieldName."\" id=\"".$fieldName."_".$okey."\" value=\"".$okey."\"".$optionClass.$preselect." /> ".$ovalue;
						if($okey == $matsu->rec[$fieldName]) $preview .= $ovalue;
						}
					}

				/************* Type equals 'checkbox' *************/
				if($fieldArgs['type'] == "checkbox"){
					foreach($fieldArgs['options'] as $okey => $ovalue){
						$preselect = $matsu->rec[$fieldName] == $okey ? " checked" : "";  // Remembers what the user selected
						$build .= "<input type=\"checkbox\" name=\"".$fieldName."\" id=\"".$fieldName."_".$okey."\" value=\"".$okey."\"".$optionClass.$addEvent." /> ".$ovalue;
						if($okey == $matsu->rec[$fieldName]) $preview .= $ovalue;
						}
					}

				/************* Type equals 'dropDateMDY', creates month, day, year dropdowns *************/
				if($fieldArgs['type'] == "dropDateMDY"){
					$rem['month'] = substr($matsu->rec[$fieldName],4,2);
					$rem['day']   = substr($matsu->rec[$fieldName],6,2);
					$rem['year']  = substr($matsu->rec[$fieldName],0,4);
					$build .= buildMonthSelect($fieldName."[month]",$rem['month']).buildDaySelect($fieldName."[day]",$rem['day']).buildYearSelect($fieldArgs['year_start'], $fieldArgs['year_stop'],$fieldName."[year]",$rem['year']);
					$preview .= "<div id=\"prev_".$fieldName."\" class=\"formValue\">".$rem['month']."/".$rem['day']."/".$rem['year']."</div>";
					}

				/************* Type equals 'dropDateMY', creates month, year dropdowns *************/
				if($fieldArgs['type'] == "dropDateMY"){
					$rem['month'] = substr($matsu->rec[$fieldName],4,2);
					$rem['year']  = substr($matsu->rec[$fieldName],0,4);
					$build .= buildMonthSelect($fieldName."[month]",$rem['month']).buildYearSelect($fieldArgs['year_start'], $fieldArgs['year_stop'],$fieldName."[year]",$rem['year']);
					$preview .= "<div id=\"prev_".$fieldName."\" class=\"formValue\">".$rem['month']."/".$rem['year']."</div>";
					}


				/************* Type equals 'dropProperty' *************/
				if($fieldArgs['type'] == "dropProperty"){
					$query = mysql_query("SELECT $wpdb->posts . * FROM $wpdb->posts WHERE ($wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'property') GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_title ASC");
					while($rec = mysql_fetch_assoc($query)){
						$selected[$_GET['property']] = " selected";
						$buildPropSelect .= "<option value='".$rec['ID']."'".$selected[$rec['ID']].">".$rec['post_title']."</option>\r\n";
						if($_REQUEST['property'] == $rec['ID']) $preview .= "<div id=\"prev_".$fieldName."\" class=\"formValue\">".$rec['post_title']."</div>";
						}
					$build .= "<select name='property'><option value=''>Undecided or Property Not Listed</option>".$buildPropSelect."</select>";
					}


				/************* Type equals 'dropAgent' *************/
				if($fieldArgs['type'] == "dropAgent"){
					$agents = array("Todd","Tracy","Carrie","Michael","Bruce");
					foreach($agents as $key => $value){
						$selected[$_REQUEST['agent']] = " selected";
						$buildAgentSelect .= "<option value='".$value."'".$selected[$value].">".$value."</option>\r\n";
						if($_REQUEST['agent'] == $value) $preview .= "<div id=\"prev_".$fieldName."\" class=\"formValue\">".$value."</div>";
						}
					$build .= "<select name='agent'><option value=''>I haven't spoken to any one yet.</option>".$buildAgentSelect."</select>";
					}





				/************* Type equals 'function' *************/
				if(!empty($fieldArgs['function'])){
					switch($fieldArgs['function']){
						case "createStateDrop":
							$build .= createStateDrop($fieldName,$matsu->rec[$fieldName]);
							$preview .= "<div id=\"prev_".$fieldName."\" class=\"formValue\">".$stateArray[$matsu->rec[$fieldName]]."</div>";
							break;
						}
					}

				$build .= !empty($fieldArgs["notes"]) ? " <span class=\"notes\">".$fieldArgs["notes"]."</span>" : "";  // Adds notes after input
				$build .= $fieldArgs["break"] == "y" ? "</p>\r\n<p class=\"divider\">" : "";  // Adds spacing after form line
				$preview .= $fieldArgs["break"] == "y" ? "</p>\r\n<p class=\"divider\">" : "";  // Adds spacing after form line
				$build .= "</p>\r\n";
				$preview .= "</div>\r\n";
				}
			$build .= "</fieldset>\r\n";
			$preview .= "</fieldset>\r\n";
			}
		}
		$return['form'] = $build;
		$return['javaRequired'] = rtrim($javaRequiredArray, ",");
		$return['preview'] = $preview;
	return $return;
	}



?>