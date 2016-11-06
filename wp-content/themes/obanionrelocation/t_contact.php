<?php /* Template Name: Contact (t_contact.php) */ ?>
<?php
if(isset($_POST['submit'])){
	if($_POST['spam'] == ""){
		$vars = parseEmail("email-contact-general.php", $_POST);
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
	<h2>Contact Us</h2>

	<p>We are here to help.  Send us an email or give us a call.</p>
	
	<?php buildMessage($message); ?>
	
	<div id="contact-left">
		<h3>Email</h3>	
		<p>Because we help with families all over the country, the best, most convenient method of contact is email.  If you would like for us to contact you by phone, please let us know your time zone to prevent a phone call after hours.</p>
		<form action="/contact" method="post">
			<p><label>First Name *</label><input type="text" name="fname"></p>
			<p><label>Last Name *</label><input type="text" name="lname"></p>
			<p><label>Email *</label><input type="text" name="email"></p>
			<p><label>Phone *</label><input type="text" name="phone"></p>
			<p><label>Current State</label><?php echo createStateDrop(); ?></p>
			<p><label>Best Way to Contact you?</label><?php echo createContactDrop(); ?></p>
			<p><label>Which Interests you most?</label><?php echo createInterestedDrop(); ?></p>
			<p><label>Comments or Questions</label><textarea name="comments"></textarea></p>
			<p><label></label><input type="submit" name="submit" value="Send">
			<p class="hidden"><input type="text" name="spam"></p>
			</form>
		
		
		</div>
	<div id="contact-right">
		<h3>Missing in the office?</h3>
		<p>We are in the office Monday through Friday, 8:00am to 5:00pm.  Remember, if you are coming from "The Lower 48", there will be a time change.  We are one hour earlier than 
		Pacific Standard Time and four hours earlier than Eastern Standard Time.<br/><br/>The current time in Alaska is<br/><span id="clock">&nbsp;</span></p>

		<h3>Office Information</h3>
		<p><b>O'Banion Relocation Services</b><br/>
			6200 Lake Otis Parkway Suite 201<br/>
			Anchorage, AK  99507<br/>
			Phone: (907) 884-3073<br/>
			Fax:  (888) 570-5914</p>
			<a href="http://maps.google.com/maps?hl=en&safe=off&q=o%27banion%20relocation%20services%20anchorage&gs_sm=c&gs_upl=2985l3128l1l4810l2l2l1l1l1l0l0l0ll0l0&um=1&ie=UTF-8&sa=N&tab=wl&authuser=0" target="_blank">Map It &middot; Driving Directions</a>
		</p>
		</div>

	<div class="clear"></div>
	<p class="marginBig">Can't find what you are looking for? Let us help. Call us at (907) 884-3073 or <a href="mailto:info.obanionrealestate@gmail.com">email us directly</a>.</p>

	</div>

<?php get_footer(); ?>