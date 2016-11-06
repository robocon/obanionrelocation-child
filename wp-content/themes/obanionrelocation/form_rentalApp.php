<?php /* Template Name: Rental Application (form_rentalApp.php) */ 

if($_SERVER['HTTPS'] != "on"){
	header("location: https://obanionrelocation.com/rental-application");
	exit;
}

if(isset($_POST['preview'])){
	if($_POST['spam'] == ""){
		$matsu->verifyRecord("true");
		$matsu->recordApplication();
		$matsu->createTransaction();
		$matsu->recordTransaction();
		}
	}
$matsu->verifyRecord();

if($matsu->rec['tid'] == "" && isset($_POST['submitTransaction'])){
	header("location: http://obanionrelocation.com");
	exit;
	}


$rentalAppData = buildForm($rentalAppForm);
$transactionData = buildForm($transactionForm);



?>
<?php get_header(); ?>

<style>

form legend {display:block; clear: both; margin-top: 10px; font-weight: bolder; margin: 0; padding: 0;}
form p {font-size: 12px;}
fieldset { margin: 0 0 20px 0; padding: 0; display:block; border: 0;}
input[type=text] { font-size: 12px; }
input[type=text].small { width: 50px; }
input[type=text].medium { width: 150px; }
input[type=radio].follow { margin-left: 20px; }
span.notes { font-size: 10px; }
form label { display: block; float: left; width: 250px; }
form p,form p.divider {display:block; clear: both; height: auto;}

form div.formRow {display:block; clear: both; height: auto;margin-bottom: 3px;}
form div.previewValue {display:block; float: left; }
form p.divider {margin: 5px 0; height: 1px; width: 50px; }
label.required {color: red; font-weight: bold; }
h5 {display:block; float: left; clear: both; margin-top: 13px; color: #232f93;}

div#ssn_error, div#ssn_success { border: 1px solid #000; width: 140px; text-align: center; display: block; float: left; font-size: 10px; margin-left: 5px; padding: 5px; }
div#ssn_error { background-color: yellow;}
div#ssn_success { background-color: #8fff92;}

div#siteseal { position: absolute; top: 0; right: 0; display: block; }

.indent {margin: 0 0 20px 250px}

</style>
<script type="text/javascript" src="https://obanionrelocation.com/wp-content/plugins/akwebtech-webkit/scripts/jquery.select.js" charset="utf-8"></script>
<script>

function validateForm(){
	var flag = true;
	flag = checkHistory();
	var req = new Array(<?php echo $rentalAppData['javaRequired'].",".$transactionData['javaRequired']; ?>);
	var len = req.length;
	for(var i=0; i<len; i++){
		$('#lb_'+req[i]).removeClass('required');
		if($('#'+req[i]).val() == "" || $('#'+req[i]).val() == 0){
			$('#lb_'+req[i]).addClass('required');
			$('#error').removeClass('hidden');
			flag = false;
			window.location='#top';
			}
		}
	return flag;
	}

function checkHistory(){
	var reqEmploy = new Array('employ_name','employ_address','employ_city','employ_state','employ_zip','employ_phone','position','supervisor','employ_time','salary');
	var lenEmploy = reqEmploy.length;
	var flagEmploy = true;
	for(var i=0; i<lenEmploy; i++){
		if($('#'+reqEmploy[i]).val() == "" || $('#'+reqEmploy[i]).val() == 0){
			flagEmploy = false;
			}
		}
	var reqMilitary = new Array('unit_assigned','unit_address','unit_city','unit_state','unit_zip','unit_paygrade','unit_commander','unit_commander_phone');
	var lenMilitary = reqMilitary.length;
	var flagMilitary = true;
	for(var i=0; i<lenMilitary; i++){
		if($('#'+reqMilitary[i]).val() == "" || $('#'+reqMilitary[i]).val() == 0){
			flagMilitary = false;
			}
		}
	if(flagEmploy == true || flagMilitary == true){
		return true;
	}else{
		alert("You must fill out either your employment history or military information.  Your application will be rejected if you do not provide one of these two parts.  If you are currently unemployed, please provide your last employers information.");
		return false;
		}
	}

function validateAgreements(){
	var flag = true;
	if(!$('#creditcheck').is(':checked') || !$('#chargecheck').is(':checked')){ 
		flag = false;
		alert('You must agree to the terms and conditions to submit this form.');
		}
	else{
		document.getElementById('submitButton').disabled = 'disabled';
		}
	return flag;
	}

function copyAddress(){
      $("#billing_address").val($('#address').val());
      $("#billing_city").val($('#city').val());
      $("#billing_state").selectOptions($('#state').val());
      $("#billing_zip").val($('#zip').val());
	}
	
	
</script>

<div id="content-wrapper">
	<h2>Rental Application</h2>
	<div id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=EdbrZoIvhDnTxsLNmAl0KqrdKqEBilBsGV7C2j6zVOSJKki0JA15CGpg"></script></div>
	<p>O’Banion Real Estate & Relocation Services, LLC requires this application to be submitted by all persons residing in the home 18 years of age or older.  The cost of this application is $<?php echo number_format(stripslashes(get_option("akwt_application_fee")),2); ?> per person and is non-refundable.</p>
	<p><a href="/privacy-policy" target="_blank">View our Privacy Policy</a> <span class="small">(Opens new window)</span></p>
	<?php buildMessage($message); ?>
	<?php if(!isset($_POST['preview']) && !isset($_POST['submitTransaction'])): ?>
		<div class="error hidden" id="error">Please fill out all required fields highlighted in red.</div>
		<form name="rentapp" method="post" onSubmit="return validateForm();" >
			<?php echo $rentalAppData['form']; ?>
			<?php echo $transactionData['form']; ?>
			<p><label></label><input type="submit" name="preview" value="Preview" /> <a href="/privacy-policy" target="_blank" class="small">View our Privacy Policy (New Window)</a>
			<p class="hidden"><input type="text" name="spam"></p>
			</form>
		<script>
		$('#ssn_verify').keyup(function(){
			$('#ssn_success').addClass("hidden");
			$('#ssn_error').removeClass("hidden");
			if($('#ssn_verify').val() == $('#ssn').val() && $('#ssn').val() != ""){	
				$('#ssn_error').addClass("hidden");
				$('#ssn_success').removeClass("hidden");
				}
			});
		</script>
	<?php elseif(isset($_POST['preview'])): ?>
		<form name="rentapp" method="post" onSubmit="return validateAgreements();" >
		<h2>LAST STEP! Please review your application.  When finish, click the submit button below your application.</h2>
			<?php echo $rentalAppData['preview']; ?>
			<?php echo $transactionData['preview']; ?>
			<p class="indent"><input type="checkbox" id="creditcheck" name="creditcheck" value="yes"> <?php echo stripslashes(get_option('akwt_creditcheck_disclaimer'));?></p>
			<p class="indent"><input type="checkbox" id="chargecheck" name="chargecheck" value="yes"> <?php echo stripslashes(get_option('akwt_creditcard_authorization'));?></p>
			<p class="indent"><input type="submit" name="submit" name="submit" value="Submit Application" id="submitButton" />&nbsp;&nbsp;&nbsp;&nbsp;<a href="">Edit Information</a> <a href="/privacy-policy" class="small">View our Privacy Policy (New Window)</a>
			<p class="hidden"><input type="text" name="spam"><input type="text" name="submitTransaction"></p>
			</form>
	<?php elseif(isset($_POST['submitTransaction'])):
			if($_POST['spam'] == ""){
			$matsu->verifyRecord();
			$result = $matsu->submitPayment();
			buildMessage($matsu->processResult($result));
			echo $matsu->viewReceipt();
			}
		?>		
	<?php endif; ?>
		
	<div class="clear"></div>
	</div>

<?php get_footer(); ?>