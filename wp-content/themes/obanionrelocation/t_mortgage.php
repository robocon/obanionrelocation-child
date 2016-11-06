<?php /* Template Name: Mortgage (t_mortgage.php) */ ?>
<?php get_header(); ?>

<script type="text/javascript" language="JavaScript">
function calculatePayment(interest,principal,payments){
  var i = interest;
  if (i > 1.0) i = i / 100.0;
  i /= 12;
  var pow = 1;
  for (var j = 0; j < payments; j++) pow = pow * (1 + i);
  money = "" + (.01 * Math.round( 100 * (principal * pow * i) / (pow - 1) ) );
  dec = money.indexOf(".");
  dollars = money.substring(0,dec); 
  cents = money.substring(dec+1,dec+3);
  cents = (cents.length < 2) ? cents + "0" : cents;
  money = dollars + "." + cents;
  return money;
}
function validateNumber(str,msg,control){
  if (str.length == 0){
    alert( msg );
    control.focus();
    return false;
  }
  for (var i = 0; i < str.length; i++){
    var ch = str.substring(i, i + 1);
    if ((ch < "0" || "9" < ch) && ch != '.') {
      alert(msg);
      control.focus();
      return false;
    }
  }
  if (str == 0){
      alert(msg);
      control.focus();
  	  return false;
  }
  return true;
}
function computeLoan(form){
  var i = form.interest.value;
  var p = form.principal.value;
  var t = form.custom.value;
  if (validateNumber(i,'Interest rate must be a number',form.interest) 
      && validateNumber(p,'Principal must be a number',form.principal)
      && validateNumber(t,'Term of loan must be a number',form.custom)
      ){
    var r = calculatePayment( i, p, t );
    document.getElementById('loanResults').innerHTML = "Estimated monthly payment:<br/><div class='result'>$"+r+"</div>";
  }
}
function computeMortgage(form){
  var i = form.interest.value;
  var p = form.principal.value;
  var t = form.custom.value;
  
  if (validateNumber(i,'Interest rate must be a number',form.interest) 
      && validateNumber(p,'Principal must be a number',form.principal)
      && validateNumber(t,'Term of loan must be a number',form.custom)
      ){
    var r = calculatePayment( i, p, t );
    document.getElementById('mortgageResults').innerHTML = "Estimated monthly payment:<br/><div class='result'>$"+r+"</div>";
  }
}
function refreshCustom(form){
	if (form.payments.value == 0){
		form.custom.style.display = 'block';
	}else{
		form.custom.value = form.payments.value;
		form.custom.style.display = 'none';
	}
}
</script>

<div id="content-wrapper">
	<h2>Mortgages</h2>

	<p>Here are some answers to common questions about mortgages and lending.</p>
	
	<div id="mortgage-left">
			<h3>What is the difference between pre-approval and pre-qualification?</h3>
			<p>The pre-approval process is much more complete than pre-qualification. For pre-qualification, the loan officer asks you a few 
			   questions and provides you with a pre-qual letter. Pre-approval includes all the steps of a full approval, except for the 
			   appraisal and title search. Pre-approval can put you in a better negotiating position, much like a cash buyer.</p>
			<h3>What is a rate lock?</h3>
			<p>A rate lock is a contractual agreement between the lender and buyer. There are four components to a rate lock: loan program, interest rate, points, and the length of the lock.</p>
			<h3>What is the difference between a mortgage broker and a lender? </h3>
			<p>A mortgage broker counsels you on the loans available from different wholesalers, takes your application, and usually processes the loan which involves putting together the complete file of information about your transaction including the credit report, appraisal, verification of your employment and assets, and so on. When the file is complete, but sometimes sooner, the lender "underwrites" the loan, which means deciding whether or not you are an acceptable risk.</p>
			<h3>What is a full documentation loan?</h3>
			<p>Both income and assets are disclosed and verified, and income is used in determining the applicant's ability to repay the mortgage. Formal verification requires the borrower's employer to verify employment and the borrower's bank to verify deposits. Alternative documentation, designed to save time, accepts copies of the borrower's original bank statements, W-2s and paycheck stubs. </p>
			<h3>What is a good faith estimate?</h3>
			<p>It is the list of settlement charges that the lender is obliged to provide the borrower within three business days of receiving the loan application. </p>
			<h3>What is a conforming loan?</h3>
			<p>A loan eligible for purchase by the two major Federal agencies that buy mortgages, Fannie Mae and Freddie Mac.</p>
			<h3>What is a jumbo mortgage?</h3>
			<p>A mortgage larger than the maximum eligible for conforming purchase by the two Federal agencies, Fannie Mae and Freddie Mac.</p>
			<h3>What are points?</h3>
			<p>It is an upfront cash payment required by the lender as part of the charge for the loan, expressed as a percent of the loan amount; e.g., "2 points" means a charge equal to 2% of the loan balance. </p>
			<h3>What is a pre-qualification?</h3>
			<p>This is the process of determining whether a customer has enough cash and sufficient income to meet the qualification requirements set by the lender on a requested loan. A pre-qualification is subject to verification of the information provided by the applicant. A pre-qualification is short of approval because it does not take account of the credit history of the borrower. </p>
		</div>
		
		
	<div id="mortgage-right">
		<p class="center"><b>Contact Henri Roos for Mortgage Questions Today!</b></p>
		<img src="<?php bloginfo("template_url"); ?>/images/hs_roos.png" class="center bottomborder" />
		<p class="center"><a href="mailto:roosh@residentialmtg.com">roosh@residentialmtg.com</a><br/>
		   <b>Phone: (907) 261-7599<br/>
		   Fax: (907) 646-8720<br/>
		   Cell Phone: (907) 229-6445</b><br/>
		   <br/>
			<?php if(date("Y") > 2012): ?>
			3350 Midtown Place
			Anchorage, AK  99503
			<?php else: ?>
			3111 C Street # 325 <br/>
			Anchorage Alaska 99503<br/>
			<?php endif; ?>
			
			<br/>
			Henrietta Roos Staser<br/>
			#AK197794<br/>
		   <i>Residential Mortgage<br/>
		   Preferred Mortgage, LLC <br/>
		   #167729</i><br/>
		   <br/>
		   <img src="<?php bloginfo("template_url"); ?>/images/equalhousing_bk.png" class="center noborder">
		   <a href="https://homeloans.securesites.com/standard.html?custid=6383&office_id=1743&loan_officer=10391" target="_blank">Apply Online</a></p>
			<div class="calculator">
				<form name="loan">
					<h3>Loan Calculator</h3>
					<p>Amount borrowed:<br/>
						<input type="text" value="" name="principal"/></p>
		            <p>Interest rate:<br/>
		            	<input type="text" value="" name="interest"/></p>
					<p>Term of loan:<br/>
						<select onclick="refreshCustom( this.form )" name="payments">
						  <option value="12">12 months</option>
						  <option value="18">18 months</option>
						  <option value="24">24 months</option>
						  <option value="36" selected="">36 months</option>
						  <option value="48">48 months</option>
						  <option value="60">60 months</option>
						  <option value="0">Custom (months)</option>
						</select><br/>
						<input type="text" value="36" style="display: none;" size="6" name="custom"/></p>
					<p><input type="button" value="Calculate" onclick="computeLoan(this.form)"/>
						<input type="button" value="Clear" onclick="this.form.reset()"/></p>
					<p><span id="loanResults">Fill out form to see estimated monthly payment.</span></p>
					</form>
				</div>
			<div class="calculator">
				<form name="mortgage">
					<h3>Mortgage Calculator</b></h3>
					<p>Amount borrowed:<br/>
						<input type="text" value="" name="principal"/></p>
		            <p>Interest rate:<br/>
			            <input type="text" value="" name="interest"/></p>	
					<p>Term of loan:<br/>
						<select onclick="refreshCustom( this.form )" name="payments">
						  <option value="120">10 years</option>
						  <option value="180">15 years</option>
						  <option value="240">20 years</option>
						  <option value="360" selected="">30 years</option>
						  <option value="480" selected="">40 years</option>
						  <option value="0">Custom (months)</option>
						</select><br/>
						<input type="text" value="360" style="display: none;" size="6" name="custom"/></p>
					<p><input type="button" value="Calculate" onclick="computeMortgage( this.form )"/>
						<input type="button" value="Clear" onclick="this.form.reset()"/></p>
					<p><span id="mortgageResults">Fill out form to see estimated monthly payment.</span></p>
					</form>
	
				</div>
			<div class="clear"></div>

			</div>
		
		
		
	<div class="clear"></div>
	<p class="marginBig">Can't find what you are looking for? Let us help. Call us at (907) 884-3073 or <a href="mailto:obanionrelocation@gmail.com">email us directly</a>.</p>

	</div>
	

<?php get_footer(); ?>