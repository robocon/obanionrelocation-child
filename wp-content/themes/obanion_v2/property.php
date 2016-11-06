<?php 

wp_deregister_script('jquery-fancybox');
wp_deregister_script('jquery-fancybox-css');
$noYes = array("0" => "No", "1" => "Yes");

if(isset($_POST['submit'])){
	if($_POST['name'] == ""){
		$filename = "/home/obanion/_prop_queries/".date("YmdHis")."_".$_POST['lname'].".txt";
		$somecontent = json_encode($_POST)."\r";
		$handle = fopen($filename, 'a');
		fwrite($handle, $somecontent);
		fclose($handle);

		$vars = parseEmail("email-contact-property.php", $_POST, $property);
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= "From: ".$vars['from']."\r\n";
				
		//mail($vars['to'],$vars['subject'],$vars['body'],$headers);
		mail("todd@obanionrelocation.com",$vars['subject'],$vars['body'],$headers,"-f daniel@danielbrowninc.com");
		mail("reception@obanionrelocation.com",$vars['subject'],$vars['body'],$headers,"-f daniel@danielbrowninc.com");
		mail("daniel@danielbrowninc.com",$vars['subject'],$vars['body'],$headers,"-f daniel@danielbrowninc.com");
		$message = "1 Thank you for your inquiry.  We look forward to serving you and your family's needs.  Someone will be in contact with you soon.";
		} 
	}
?>

<?php get_header(); ?>
<?php the_post(); ?>



<script type="text/javascript">
var map;
var marker;
var infowindow;

jQuery(document).ready(function() {


  if(typeof google == 'object') {
    initialize_this_map();
  } else {
//jQuery("#property_map").hide();
  }

});


function initialize_this_map() {
    <?php if($coords = WPP_F::get_coordinates()): ?>
    var myLatlng = new google.maps.LatLng(<?php echo $coords['latitude']; ?>,<?php echo $coords['longitude']; ?>);
    var myOptions = {
      zoom: <?php echo (!empty($wp_properties['configuration']['gm_zoom_level']) ? $wp_properties['configuration']['gm_zoom_level'] : 13); ?>,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    
    map = new google.maps.Map(document.getElementById("property_map"), myOptions);
    
    
     marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<?php echo addslashes($post->post_title); ?>',
      icon: '<?php echo apply_filters('wpp_supermap_marker', '', $post->ID); ?>'
    });
    
    google.maps.event.addListener(infowindow, 'domready', function() {
    document.getElementById('infowindow').parentNode.style.overflow='hidden';
    document.getElementById('infowindow').parentNode.parentNode.style.overflow='hidden';
    });
    
    setTimeout("infowindow.open(map,marker);",1000);
    
    <?php endif; ?>
    }

</script>




<style>
	
div.propertyPhotoColumn { display: block; width: 60%; float: left; margin: 20px 0 0 20px; }
div.propertyContentColumn { display: block; float: right; width: 36%; position: relative; margin: 20px 20px 0 0; }
div.details { display: block; float: left; width: 88%; position: relative; margin: 0 1% 15px 1%; border: 1px dotted #ccc; padding: 5%; }
div.content { display: block; float: left; width: 96%; margin: 15px 2%; }

div#property_map { display: block; float: left; width: 96%; height: 320px; margin: 2%; }

div.row { background-color: #fff; margin: 0; width: 100%; padding: 3px 0; font-size: 1.2em; margin: 0 0 10px 0; }
p.label { display: block; float: left; width: 50%; background-color: transparent; font-size: .8em; margin: 0; padding: 0; }
p.value { display: block; float: left; width: 50%; background-color: transparent; text-align: right; margin: 0; padding: 0; }
p.address { font-size: 1.4em; }

div#galleryWrap { display: block; width: 96%; position: relative; margin: 30px auto; }
div#featureGalleryImage { display: block; width: 100%; height: 700px; position: relative; margin: auto; }
div#galleryThumbs { display: block; width: 100%; height: 156px; position: relative; margin: auto; overflow:hidden; }
img.propertyThumb { display: block; width: 150px height: 150px; border-radius: 75px; float: left; border: 1px solid #aaa; padding: 1px; margin: 3px; }
	
div#overlayCurtain { display: none; width: 100%; height: 100%; position: fixed; background: #000; z-index: 200000; opacity: .8; top: 0; bottom: 0; left: 0; right: 0; }
div#overlayContent { display: none; width: 80%; height: 350px; position: absolute; top: 100px; left: 50%; right: 50%; margin-left: -44%; background: #fff; z-index: 200001; border: 2px solid #000; padding: 4%; border-radius: 10px; }
div#overlayContent form { display: block; padding: 0; margin: 20px 0; font-size: 1.2em; clear: both; }
div#overlayContent form input[type=text] { font-size: 1em; padding: 5px 5px 0px 5px; border-radius: 3px; border: 1px solid #ccc; display: block; float: left; margin: 5px 5px 5px 0; }
div#overlayContent form select { font-size: 1em; padding: 5px 5px 0px 5px; border-radius: 3px; border: 1px solid #ccc; margin: 5px 5px 5px 0; display: block; float: left; }
div#overlayContent form textarea { font-size: 1em; padding: 5px 5px 0px 5px; border-radius: 3px; border: 1px solid #ccc; margin: 5px 0; width: 40%; height: 80px; display: block; float: left; }
div#overlayContent form input[type=submit] { font-size: 1em; padding: 5px 15px 0px 15px; border-radius: 3px; border: 1px solid #ccc; display: block; float: left; margin: 5px 35px 5px 0; }
a#openOverlayCurtainButton { display: block; position: absolute; top: 315px; right: 40px; padding: 15px 25px; border: 1px solid #aaa; border-radius: 0 0 15px 15px; color: #fff; background-color: #001a72; font-size: 1.4em; z-index: 1;}
a.applyButton { display: block; position: relative; margin: auto; padding: 10px 18px; border: 1px solid #aaa; border-radius: 15px; color: #fff; background-color: #001a72; font-size: 1.4em; z-index: 1; text-align: center; text-decoration: none; }
	
form { margin-top: 20px; }
form p {margin: 3px 0; clear: both; display: block; float: left; }
form label { width: 175px; font-family: Verdana; display: block; float: left; clear: left; font-size: 12px; color: #232f93; margin-top: 5px; }
form input[type=text] { width: 250px; border: 1px solid #909090; padding: 4px; }
form input[type=checkbox] {padding: 0; margin: 0 4px 0 0; }
form textarea { width: 250px; height: 45px; border: 1px solid #909090; padding: 4px; resize: none;}
form h3 {display:block; float: left; clear: both; font-size: 15px; text-decoration: none; margin-top: 13px !important;}

</style>

<div id="overlayCurtain" class="closeOverlayCurtain"></div>
<div id="overlayContent">
	<h2>Watch out!  Don't venture on your own without us representing you!</h2>
	<p>We hope this is the home you are looking for, and we are excited to show you more.  So we will only interrupt you this one time.</p>
	<p>We have your best interest when it comes to buying a home.  There are many traps that you can fall into when purchasing a new home, and we are here to help.  Fill out the form below and allow us to represent you when it comes to your new home.</p>
	<form>
		<input type="text" name="name" placeholder="Full Name">
		<input type="text" name="email" placeholder="Email">
		<input type="text" name="phone" placeholder="Phone">
        <div class="clear"></div>
		<?php echo createStateDrop(); ?>
		<?php echo createContactDrop(); ?>
        <div class="clear"></div>
		<textarea name="comments" placeholder="Comments or Notes"></textarea>
        <div class="clear"></div>
		<input type="submit" name="submit" value="Send">
		<div style='height: 1px; overflow: hidden; width: 1px;'><input type="text" name="name" value=""></div>
		</form>
	<a class="closeOverlayCurtain">No thanks, I rather venture on my own without representation.  We wont interrupt your viewing experience again.</a>
	</div>

<a id="openOverlayCurtainButton" class="openOverlayCurtain">Let us represent you!</a>


<div class="propertyPhotoColumn">
    <?php $imgFile = $property['featured_image_url']; if(!empty($imgFile)): ?>
    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 800px; overflow: hidden; visibility: hidden; background-color: #24262e;">
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php bloginfo('template_url'); ?>/images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 700px; overflow: hidden;">
	            <div data-p="144.50" style="display: none;">
			            
	                <img data-u="image" src="<?php echo $property['featured_image_url']; ?>" />
	                <img data-u="thumb" src="<?php echo $property['images']['thumbnail']; ?>" />
	            </div>
	    	<?php foreach($property['gallery'] as $key => $value): $i++; $caption = ($value['post_excerpt'])? $value['post_excerpt'].".  ":""; ?>
	            <div data-p="144.50" style="display: none;">
	                <img data-u="image" src="<?php echo $value['large']; ?>" />
	                <img data-u="thumb" src="<?php echo $value['thumbnail']; ?>" />
	                </div>
				<?php endforeach; ?>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:358px;left:8px;width:40px;height:40px;"></span>
        <span data-u="arrowright" class="jssora05r" style="top:358px;right:8px;width:40px;height:40px;"></span>
        </div>
    <?php endif; //has image ?>
    <div id="property_map" class="googlemap"></div>
    </div>



<div class="propertyContentColumn">
	<div class="details">
		<h2>Address</h2>
		<?php 
		if($property['street_number'] != "" || $property['route'] != "" || $property['city'] != ""){
			echo "<p class=\"address\">";
			if($property['street_number'] != "") echo $property['street_number']." ";
			if($property['route'] != "") echo $property['route']."<br/>";
			$city = ($property['city'] != "")? $property['city']:$property['district'];
			if($property['district'] == "Eagle River" || $property['city'] == "Eagle River") $city = "Eagle River";
			if($city != "") echo $city;
			if($property['city'] != "" && $property['state'] != "") echo ", ";
			if($property['state'] != "") echo $property['state']." ";
			if($property['postal_code'] != "") echo $property['postal_code']." ";
			echo "</p>";
			}
		?>
		<div class="clear"></div>
		<?php if($property['post_content'] != "") echo "<p class=\"content\">".$property['post_content']."</p>"; ?>
		<?php echo "<p class=\"content\">".stripslashes(get_option("akwt_property_lingo"))."</p>"; ?>
		<?php if($property['property_type'] == "for_sale") echo "<p class=\"viewingDisclaimer\">See this property by appointment, 7 days a week!<br/>Call us at (907) 884-3073 or fill out the form <a href=\"#form\">here</a>.</p>"; ?>
		<div class="clear"></div>
		<?php if($property['property_type'] == "for_rent"): ?><a href="https://obanionrelocation.com/rental-application/?property=<?php echo $property['ID']; ?>" class="applyButton">Apply Online for This Property</a><?php endif; ?>
		</div>

		
		
	<div class="details">
		<h2>Snap Shot</h2>
		<?php
    		if(!empty($property['date_available'])){
    			$dateX[0] = substr($property['date_available'],4,2);
    			$dateX[1] = substr($property['date_available'],6,2);
    			$dateX[2] = substr($property['date_available'],0,4);
    			echo "Current Lease Ending Date: ".date("M d, Y", mktime(0,0,0,$dateX['0'],$dateX['1'],$dateX['2']))."<br/>\r\n";
	    		echo "<div class=\"small\">The current tenant may re-lease within 60 days of the Current Lease Ending Date.</div><br/>";
	    		}
    		?>
    	<?php if($property['mls_number'] != "") echo "<div class=\"row\"><p class=\"label\">MLS Number:</p><p class=\"value\">".$property['mls_number']."</p></div>\r\n"; ?>
		<?php if($property['price'] != "" && $property['property_type'] == "for_rent") echo "<div class=\"row\"><p class=\"label\">Lease:</p><p class=\"value\">".money($property['price'])."</p></div>\r\n"; ?>
		<?php if($property['price'] != "" && $property['property_type'] == "for_sale") echo "<div class=\"row\"><p class=\"label\">Price:</p><p class=\"value\">".money($property['price'])."</p></div>\r\n"; ?>
		<?php if($property['deposit'] != "") echo "<div class=\"row\"><p class=\"label\">Deposit:</p><p class=\"value\">".money($property['deposit'])."</p></div>\r\n"; ?>
		<?php if($property['bedrooms'] != "") echo "<div class=\"row\"><p class=\"label\">Bedrooms:</p><p class=\"value\">".$property['bedrooms']."</p></div>\r\n"; ?>
		<?php if($property['bathrooms'] != "") echo "<div class=\"row\"><p class=\"label\">Bathrooms:</p><p class=\"value\">".$property['bathrooms']."</p></div>\r\n"; ?>
		<?php if($property['area'] != "") echo "<div class=\"row\"><p class=\"label\">Square Footage:</p><p class=\"value\">".$property['area']."</p></div>\r\n"; ?>
		<?php if($property['acreage'] != "") echo "<div class=\"row\"><p class=\"label\">Acreage:</p><p class=\"value\">".$property['acreage']." Acres</p></div>\r\n"; ?>
		<?php if($property['home_style'] != "") echo "<div class=\"row\"><p class=\"label\">Home Style:</p><p class=\"value\">".$property['home_style']."</p></div>\r\n"; ?>
		<?php if($property['pet_friendly__cats'] != "") echo "<div class=\"row\"><p class=\"label\">Pet Friendly - Cats:</p><p class=\"value\">".$noYes[$property['pet_friendly__cats']]."</p></div>\r\n"; ?>
		<?php if($property['pet_friendly__dogs'] != "") echo "<div class=\"row\"><p class=\"label\">Pet Friendly - Dogs:</p><p class=\"value\">".$noYes[$property['pet_friendly__dogs']]."</p></div>\r\n"; ?>
		<?php if($property['county'] != "") echo "<div class=\"row\"><p class=\"label\">County:</p><p class=\"value\">".$property['county']."</p></div>\r\n"; ?>

      	<?php if(!empty($wp_properties['taxonomies'])) foreach($wp_properties['taxonomies'] as $tax_slug => $tax_data): ?>
        <?php if(get_features("type={$tax_slug}&format=count")):  ?>
		</div>

		
		
	<div class="details">
        <h2><?php echo $tax_data['label']; ?></h2>
        <ul class="clearfix">
        <?php get_features("type={$tax_slug}&format=list&links=true"); ?>
        </ul>
        <?php endif; ?>
      	<?php endforeach; ?>
		<a name="form"></a>
		</div>

		
		
	<div class="details">
		<h2>More Information</h2>
		<p class="medium">Want to see this property up close or just want more information?  Fill out the form below and someone from our office will contact you.</p>
		<form class="property" action="<?php echo $property['permalink']; ?>" method="post">
			<p><label>First Name *</label><input type="text" name="fname"></p>
			<p><label>Last Name *</label><input type="text" name="lname"></p>
			<p><label>Email *</label><input type="text" name="email"></p>
			<p><label>Phone *</label><input type="text" name="phone"></p>
			<p><label>Current State</label><?php echo createStateDrop(); ?></p>
			<p><label>Preferred Contact</label><?php echo createContactDrop(); ?></p>
			<p><label>Comments or Questions</label><textarea name="comments"></textarea></p>
			<p><label></label><input type="submit" name="submit" value="Send">
			<div style='height: 1px; overflow: hidden; width: 1px;'><input type="text" name="name" value=""></div>
			</form>
		</div> 

		<div class="clear"></div>
        <?php if($post->post_parent): ?>
          <a href="<?php echo $post->parent_link; ?>"><?php _e('Return to building page.','wpp') ?></a>
        <?php endif; ?>
    </div>

<script>
    $('.closeOverlayCurtain').click(function(){
        $('#overlayCurtain').hide();
        $('#overlayContent').hide();
        });
    $('.openOverlayCurtain').click(function(){
        $('#overlayCurtain').show();
        $('#overlayContent').show();
        });
    </script>
                


<?php get_footer(); ?>