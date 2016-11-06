<?php /* Template Name: Service List (t_service-list.php) */ ?>
<?php
if(isset($_POST['submit'])){
	if($_POST['spam'] == ""){
		$vars = parseEmail("email-contact-services.php", $_POST);
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= "From: ".$vars['from']."\r\n";
		mail($vars['to'],$vars['subject'],$vars['body'],$headers, "-f".$vars['to']);
		$message = "1 Thank you for your inquery.  We look forward to serving you and your family's needs.  Someone will be in contact with you soon.";
		}
	}
?>
<?php get_header(); ?>

<div id="content-wrapper">
	<h2>Service List</h2>

	<?php buildMessage($message); ?>

	<p>We are more than your average real estate company.  We are everything real estate related.  Whether you are buying, selling, looking to rent, wanting to rent your real estate,
	   or new construction, we will help you every step of the way.</p>
	
	<div id="service-left">
			<h3>Buying a home?</h3>
			<p>We work hard to make your move as smooth as possible from start to finish.  Not task is to small. 
				For some it means meeting the family at the airport, for others it means emailing photos of multiple homes
				or FedEX'ing paper work over seas.
				<ul>
					<li>No Cost Buyer Representation</li>
					<li>Statewide Real Estate Inventory</li>
					<li>Short Term Rentals</li>
					<li>Personalized Property Searches Emailed to You Daily</li>
					<li>And we can add as many list points as you need</li>
					</ul>
				</p>
			<h3>Selling your home?</h3>
			<p>We safeguard the interests of individuals who are selling a home by working to coordinate all activities from the very first
			step to home closing.  As expert advisors offering unbiased advice and guidance to help home owners make smart decisions to save time and money, we take great
			care to share our knowledge, resources and communicate through the entire process.
				<ul>
					<li>Long Distant Support</li>
					<li>24/7 Maintenance Service</li>
					<li>Pre-Qualified Buyer Screening</li>
					</ul>
				</p>
			<h3>Renting your Home?</h3>
			<p>Need help deciding on what to do with your Real Estate?  Talk to our experienced property manager and make an educated decision before it's to late!
				<ul>
					<li>Experienced Property Manager</li>
					<li>Well Informed on Current Rental Markets</li>
					<li>Background Check on Applicants</li>
					<li>24/7 Maintenance Service</li>
					</ul>
				</p>
			<h3>Building your Home?</h3>
			<p>Building your own house is great way to have exactly what you are looking for.  Let us help lay the foundation for you dream home.
				<ul>
					<li>Experienced License Professionals</li>
					<li>Well Informed on Current Housing Codes</li>
					<li>Reliable and Quality Construction</li>
					<li>From Foundation to Roof, We Can Do It All</li>
					</ul>
				</p>
			
			
			
		</div>
		
		
	<div id="service-right">
		<h3>Contact Us Today!</h3>
		<form action="/service-list" method="post" class="sidebar">
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
			<div class="clear"></div>

			</div>
		
		
		
	<div class="clear"></div>
	<p class="marginBig">Can't find what you are looking for? Let us help. Call us at (907) 884-3073 or <a href="mailto:obanionrelocation@gmail.com">email us directly</a>.</p>

	</div>
	

<?php get_footer(); ?>