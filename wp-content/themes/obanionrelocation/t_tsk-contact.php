<?php /* Template Name: TSK Contact (t_tsk-contact.php) */ ?>
<?php
if(isset($_POST['submit'])){
	if($_POST['spam'] == ""){
		$vars = parseEmail("email-tsk-bid-request.php", $_POST);
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= "From: ".$vars['from']."\r\n";
		mail($vars['to'],$vars['subject'],$vars['body'],$headers, "-f".$vars['to']);
		$message = "1 Thank you for your inquery.  We look forward to serving you and your family's needs.  Someone will be in contact with you soon.";
		}
	}
?>
<?php define('MENU_OPTION', 'h'); ?>
<?php get_header(); ?>

<div id="content-wrapper">
	<h2>TSK Bid Request</h2>
	
	<?php buildMessage($message); ?>
	
	<form action="/tsk-contact-form" method="post">
		<p><label>You are </label><span class="small">
			<input type="radio" name="who" value="owner"> The Owner &nbsp;&nbsp;
			<input type="radio" name="who" value="representative"> A Representative </span></p>
		<p><label>First Name *</label><input type="text" name="fname"></p>
		<p><label>Last Name *</label><input type="text" name="lname"></p>
		<p><label>Email *</label><input type="text" name="email"></p>
		<p><label>Phone *</label><input type="text" name="phone"></p>
		<p><label>Service Address *</label><input type="text" name="address"></p>
		<p><label>Service City *</label><input type="text" name="city"></p>
		<p><label>Best Time to Call </label><input type="text" name="call"></p>
		<p><label>Work Timeframe </label><input type="text" name="timeframe"></p>
		<p><label>Best Way to Contact you</label><?php echo createContactDrop(); ?></p>
		<p><label>Vacant</label><span class="small">
			<input type="radio" name="vacant" value="vacant"> Yes &nbsp;&nbsp;
			<input type="radio" name="vacant" value="not vacant"> No </span></p>
		<p><label>Access Type</label><span class="small">
			<input type="radio" name="access" value="lock box"> Lock box access &nbsp;&nbsp;
			<input type="radio" name="access" value="key"> Key Access </span></p>

		<h3>Check Items that need cleaning</h3>
		<p>
			<div class="checkbox"><input type="checkbox" name="cleaning[]" value="yard"> Yard</div>
			<div class="checkbox"><input type="checkbox" name="cleaning[]" value="all carpets"> All Carpets</div>
			<div class="checkbox"><input type="checkbox" name="cleaning[]" value="specific carpets"> Specific Carpets</div>
			<div class="checkbox"><input type="checkbox" name="cleaning[]" value="all appliances"> All Appliances</div>
			<div class="checkbox"><input type="checkbox" name="cleaning[]" value="specific appliances"> Specific Appliances</div>
			<div class="checkbox"><input type="checkbox" name="cleaning[]" value="furnace"> Furnace</div>
			<div class="checkbox"><input type="checkbox" name="cleaning[]" value="interior walls"> Interior Walls</div>
			<div class="checkbox"><input type="checkbox" name="cleaning[]" value="property pickup"> Property Pick-Up</div>
			<div class="addInfo">List Specific Rooms and Appliances in comments</div>
			</p>

		<h3>Check items that need painting</h3>
		<p>
			<div class="checkbox"><input type="checkbox" name="painting[]" value="interior walls"> Interior Walls</div>
			<div class="checkbox"><input type="checkbox" name="painting[]" value="interior doors"> Interior Doors</div>
			<div class="checkbox"><input type="checkbox" name="painting[]" value="exterior walls"> Exterior Walls</div>
			</p>
		<p><label>Approximate Square Footage</label><input type="text" name="squarefootage"></p>

		<h3>Check items that need repair</h3>
		<p>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="electrical"> Electrical</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="plumbing"> Plumbing</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="appliances"> Appliances</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="tile"> Tile</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="sheetrock"> Sheetrock</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="crawl space"> Crawl Space</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="exterior walls"> Exterior Walls</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="HVAC"> HVAC</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="plaster"> Plaster</div>
			<div class="checkbox"><input type="checkbox" name="repair[]" value="general carpentry"> General Carpentry</div>
			</p>


		<h3>Check Maintenance services needed</h3>
		<p>
			<div class="checkbox"><input type="checkbox" name="maintenance[]" value="snow removal - roofs"> Snow Removal - Roofs</div>
			<div class="checkbox"><input type="checkbox" name="maintenance[]" value="snow shoveling"> Snow Shoveling</div>
			<div class="checkbox"><input type="checkbox" name="maintenance[]" value="snow plowing"> Snow Plowing</div>
			<div class="checkbox"><input type="checkbox" name="maintenance[]" value="sidewalk sanding"> Sidewalk Sanding</div>
			<div class="checkbox"><input type="checkbox" name="maintenance[]" value="lawn maintenance"> Lawn Maintenance</div>
			<div class="checkbox"><input type="checkbox" name="maintenance[]" value="HVAC"> HVAC</div>
			<div class="checkbox"><input type="checkbox" name="maintenance[]" value="asphalt"> Asphalt</div>
			<div class="checkbox"><input type="checkbox" name="maintenance[]" value="roof"> Roof</div>
			</p>


		<h3>Comments</h3>
		<p><label>Comments or Questions</label><textarea name="comments"></textarea></p>
		<p><label></label><input type="submit" name="submit" value="Send">
		<p class="hidden"><input type="text" name="spam"></p>
		</form>
	
		

	<div class="clear"></div>
	</div>

<?php get_footer(); ?>