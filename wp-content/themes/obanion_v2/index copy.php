<?php get_header(); ?>





<div class="contentWrap">
    <div class="indexWrap">
        <h2>Moving and Relocating to Alaska?</h2>
        <p>Are you moving to Alaska? Relocating to Alaska is no easy accomplishment, unless you have a secret weapon. 
        Todd O'Banion specializes in assisting home buyers find property in Alaska, whether you are moving to the 
        49th state for military relocation, a job opportunity, or just to move your family to a safer environment. 
        If you're moving to Alaska, Todd O'Banion is your Alaskan source to help make your relocation experience a 
        quick and easy one!</p>
        <div class="indexTileWrap">
            <div class="indexTile" onclick="window.location ='alaska-homes-for-sale';">
                <h3>For Sale</h3>
                <div id="iconForSale" class="indexTileIcon"></div>
                <p class="small">See Todd's available properties for sale here. We also offer opportunities to rent before you buy.</p>
                </div>
            <div class="indexTile" onclick="window.location ='alaska-homes-for-rent';">
                <h3>For Rent</h3>
                <div id="iconForRent" class="indexTileIcon"></div>
                <p class="small">Looking for a place to rent? Todd can help you find the ultimate temporary stay here.</p>
                </div>
            <div class="indexTile" onclick="window.location ='military-relocation';">
                <h3>Military Relocation</h3>
                <div id="iconMilitaryRelocation" class="indexTileIcon"></div>
                <p class="small">Military or general public. If you're relocating to Alaska, Contact Todd O'Banion!</p>
                </div>
            <div class="indexTile" onclick="window.location ='getting-to-alaska-making-the-move';">
                <h3>Getting Here</h3>
                <div id="iconGettingHere" class="indexTileIcon"></div>
                <p class="small">There are many ways to get to Alaska. Here is some information that should help make your move more tolerable.</p>
                </div>
            <div class="indexTile" onclick="window.location ='our-agents';">
                <h3>Our Realtors</h3>
                <div id="iconOurRealtors" class="indexTileIcon"></div>
                <p class="small">Our team is Alaska's top property management team. Find out how we can help.</p>
                </div>
            </div>
        <div class="clear"></div>
        <br/>
        <h2>Relocation Alaska : Relocating to Alaska with Todd</h2>
        <p>Todd is retired Army, and he has been providing military relocation to Alaska for years. Military or not, 
            if you are looking to buy a home, rent a home, or rent a home until you plan on buying a home in Alaska, 
            Todd is your best connection in Alaska. Todd has helped people from all around the world relocate to Alaska!</p>
        </div>
    </div>


<div class="featureWrap">
    <div class="indexTileWrap">
        <div class="indexWrap">
             <div class="indexFeature">
            	<?php $featureForRent = "[property_overview template=feature-widget property_type=for_sale sorter=on showcase=true]"; ?>
            	<?php echo do_shortcode($featureForRent); ?>
                </div>
             <div class="indexFeature">
            	<?php $featureForRent = "[property_overview template=feature-widget property_type=for_rent sorter=on showcase=true]"; ?>
            	<?php echo do_shortcode($featureForRent); ?>
                </div>
             <div class="indexFeature" style="background: white url(<?php bloginfo("template_url"); ?>/images/gold_house_reflect_sm.jpg) no-repeat;">
                <form action="" method="get" id="idxSearch">
                    <p>Now you can search the entire MLS for the perfect home.</p>
                    <input type="text" name="idx_search" value="" placeholder="Search IDX Database" /><br/>
                    <input type="submit" name="submit" value="Search" />
                    </form>
                     
                </div>
            <div class="clear"></div>
            </div>
        </div>
    </div>


<div class="contentWrap">
    <div class="indexWrap">
        <div class="friendOfOBanion">
        	<h2 style="margin-top: 20px;">Trusted Businesses and Friends of O'Banion</h2>
        		<a href="http://www.homerocean.com"><img src="<?php bloginfo("template_url"); ?>/images/homercharters_tile.jpg" class="tilead"/></a>
        		<a href="/mortgage"><img src="<?php bloginfo("template_url"); ?>/images/henri_roos.png" class="tilead"/></a>
        		<a href="tsk-residential-repair-and-maintenance"><img src="<?php bloginfo("template_url"); ?>/images/tsk.png" class="tilead"/></a>
        		<a href="http://www.907snowcat.com"><img src="<?php bloginfo("template_url"); ?>/images/snow_cat.png" class="tilead"/></a>
        		<a href="http://www.alliedalaskaelectricllc.com"><img src="<?php bloginfo("template_url"); ?>/images/allied_alaska.png" class="tilead"/></a>
        		<a href="http://www.extendedstayhotels.com/find-reserve/find-by-map.html?state=AK"><img src="<?php bloginfo("template_url"); ?>/images/extended_stay.png" class="tilead"/></a>
        		<a href="http://www.thealaskaclub.com/free-pass"><img src="<?php bloginfo("template_url"); ?>/images/alaskaClub.jpg" class="tilead"/></a>
            </div>
        </div>
    </div>
    
    
<script>
    $(window).scroll(function() {
    var x = $(this).scrollTop();
    $('.featureWrap').css('background-position', '0% ' + parseInt(-x / 10) + 'px');
});
</script>    
    

<?php get_footer(); ?>