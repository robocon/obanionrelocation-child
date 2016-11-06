<?php /* Template Name: Midnight Sun (midnight-sun-construction.php) */ ?>
<?php

$homes = array(
	1 => array("name"=>"Cranberry", "pages"=>"2,3"),
	2 => array("name"=>"North Western", "pages"=>"4,5"),
	3 => array("name"=>"Atkison", "pages"=>"6"),
	4 => array("name"=>"Monte", "pages"=>"7"),
	5 => array("name"=>"Elenora Expanded", "pages"=>"8"),
	);

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
<?php get_header(); ?>
<script>
function showSubMenu(menu){$('#subcat_'+menu).removeClass('hidden');}
function hideSubMenu(menu){$('#subcat_'+menu).addClass('hidden');}
</script>
<?php buildMessage($message); ?>
<div id="midnight-wrapper">
	<img src="<?php bloginfo("template_url"); ?>/images/midnightsunlogo.png" class="logo" />

	<div id="menu-msc" class="center">
		<ol>
			<?php $activePage[MENU_OPTION] = " menu-extend"; ?>
			<li id="menu-a" class="menuItem<?php echo $activePage['a'];?>"><a href="?"></a></li>
			<li id="menu-b" class="menuItem<?php echo $activePage['b'];?>" onMouseOver="showSubMenu(1);" onMouseOut="hideSubMenu(1);" >
				<a href="?mnspage=1"></a>
				<div id="subcat_1" class="submenu hidden">
					<a href="?mnshome=1">Cranberry</a>
					<a href="?mnshome=2">North Western</a>
					<a href="?mnshome=3">Atkison</a>
					<a href="?mnshome=4">Monte</a>
					<a href="?mnshome=5">Elenora Expanded</a>
					</div>
					</li>
			<li id="menu-c" class="menuItem<?php echo $activePage['c'];?>"><a href="?mns=9"></a></li>
			<li id="menu-d" class="menuItem<?php echo $activePage['d'];?>"><a href="?mns=10"></a></li>
			<li id="menu-e" class="menuItem<?php echo $activePage['e'];?>"><a href="?mns=11"></a></li>
			<li id="menu-f" class="menuItem<?php echo $activePage['f'];?>"><a href="?mns=12"></a></li>
			<li id="menu-g" class="menuItem<?php echo $activePage['g'];?>"><a href="#contact"></a></li>
			</ol>
		</div>



		<div class="clear"></div>

	<?php if(!isset($_GET['mnshome']) && !isset($_GET['mns'])): ?>
	
		<h5>NEW CONSTRUCTION BY MIDNIGHT SUN CONSTRUCTION</h5>
		<h6>ENQUIRE ABOUT AVAILABLE LOTS!</h6>
		<p class="small" style="text-align: center;">Est. construction time of 4-5 mo. depending on complexity and upgrades of your plan. • Prices are subject to changes due to variance in building costs.</p>
		<div class="clear"></div>
		<div class="framedPic">
			<a href="?mnshome=1"><img src="<?php bloginfo("template_url"); ?>/images/house_cranberry.png"></a>
			<p><span class="houseName">"Cranberry"</span><br/>
			   <span class="houseDetails">1800 sqft Living Space. 3 Br, 2.5 Ba, 2 Stall Garage</span></p>
			</div>
		<div class="framedPic">
			<a href="?mnshome=2"><img src="<?php bloginfo("template_url"); ?>/images/house_northwestern.png"></a>
			<p><span class="houseName">"North Western"</span><br/>
			   <span class="houseDetails">1557 sqft Living Space. 3 Br, 2.5 Ba, 2 Stall Garage</span></p>
			</div>
		<div class="clear"></div>
		<div class="framedPicCenter">
			<a href="?mnshome=3"><img src="<?php bloginfo("template_url"); ?>/images/house_atkison.png"></a>
			<p><span class="houseName">"Atkison"</span><br/>
			   <span class="houseDetails">1560 sqft Living Space. 3 Br, 2 Ba, 2 Stall Garage</span></p>
			</div>
		<div class="clear"></div>
		<div class="framedPic">
			<a href="?mnshome=4"><img src="<?php bloginfo("template_url"); ?>/images/house_monte.png"></a>
			<p><span class="houseName">"Monte"</span><br/>
			   <span class="houseDetails">1,654 sqft Living Space. 3 Br, 2.5 Ba, 2 Stall Garage</span></p>
			</div>
		<div class="framedPic">
			<a href="?mnshome=5"><img src="<?php bloginfo("template_url"); ?>/images/house_elenora.png"></a>
			<p><span class="houseName">"Elenora Expanded"</span><br/>
			   <span class="houseDetails">1508 sqft Living Space. 3 Br, 2 Ba, 2 Stall Garage</span></p>
			</div>
		
		
		<div class="clear"></div>


	<?php elseif(isset($_GET['mnshome'])):
		if(!isset($_GET['mnspage'])) $_GET['mnspage'] = 0;
		$prop = $homes[$_GET['mnshome']];
		$pages = explode(",",$prop['pages']);
		$prevPage = ($_GET['mnspage'] == 0)? "?mnshome=".$_GET['mnshome']:"?mnshome=".$_GET['mnshome']."&mnspage=".($_GET['mnspage']-1);
		$nextPage = ($_GET['mnspage'] == (count($pages)-1))? "?mnshome=".$_GET['mnshome']:"?mnshome=".$_GET['mnshome']."&mnspage=".($_GET['mnspage']+1);
		?>
		<p style="text-align: center;font-size: 18px;">
			<a href="<?php echo $prevPage; ?>">Previous Page</a> &middot
			<a href="<?php echo $nextPage; ?>">Next Page</a>
			</p>
			<center>
			<a href="<?php echo $nextPage; ?>"><img class="page" src="<?php bloginfo("template_url"); ?>/images/mns-book/MSC_5-Property-Combo-Book-<?php echo $pages[$_GET['mnspage']]; ?>.jpg"></a>
			<?php 
			
			foreach($pages as $key => $value){
				$build .= "<a href='?mnshome=".$_GET['mnshome']."&mnspage=".$key."'>".($key+1)."</a> &middot ";
				}
			$build = rtrim($build," &middot ");
			echo "<p>Pages: ".$build."</p>";
			?>

			</center>
	<?php elseif(isset($_GET['mns'])): ?>
			<img class="page" src="<?php bloginfo("template_url"); ?>/images/mns-book/MSC_5-Property-Combo-Book-<?php echo $_GET['mns']; ?>.jpg">
	<?php endif; ?>
		<p>Your plan or ours, we can build your perfect home.  Contact us below and someone will get back with you.</p>
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

		<div class="clear"></div>

		</div>
	 

<?php get_footer(); ?>