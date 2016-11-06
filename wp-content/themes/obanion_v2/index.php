<?php get_header(); ?>

    
<div class="indexTileWrap">
    <div class="fontTile fontTileLeft " onclick="window.location ='alaska-homes-for-sale';">
        <div class="banner marketingScript">For Sale</div>
        <p>See Todd's available properties for sale here. We also offer opportunities to rent before you buy.</p>
        <div id="forSaleBackground"></div>
        <div id="buttonSeeSales"></div>
        </div>    
        
    <div class="fontTile " onclick="window.location ='alaska-homes-for-rent';">
        <div class="banner marketingScript">For Rent</div>
        <p>Looking for a place to rent? Todd can help you find the ultimate temporary stay here.</p>
        <div id="forRentBackground"></div>
        <div id="buttonSeeRentals"></div>
        </div>    
                
    <div class="fontTile propertyManagementTile" onclick="window.location ='tsk';">
        <h3 class="propertyManagement">Property Management</h3>
        <p class="small textRight">Todd and his team are one of Alaska's Top Property Managers.<br/>Find out more about their services here.</p>
        </div>   

    <div class="fontTile fontTileLeft" onclick="window.location ='getting-to-alaska-making-the-move';">
        <div id="seaAirLand"></div>
        <h3>Getting Here - What are my first steps?</h3>
        <p class="small">There are many ways to get to Alaska. And a lot of different resources out that there that can make it troublesome to gather solid information.  So we have done the hunting for you.  Check it out!</p>
        </div>    
        
    <div class="fontTile " onclick="window.location ='our-agents';">
        <div id="handShake"></div>
        <h3>Our Realtors</h3>
        <p class="small">Our team is Alaska's top property management team. Find out how we can help.</p>
        </div>   

    <div class="fontTile fontTileMilitary" onclick="window.location ='tsk';">
        <div id="militarySeals"></div>
        <h2 class="military">Military Relocation</h2>
        <p class="small">Todd has been providing the services needed for military personnel to relocate for years!</p>
        </div>
    <div class="clear"></div>
    </div>

<div class="headerTextWrap">
    <div class="banner marketingScript">Buying Alaska</div>
    </div>

<div id="featureImage"></div>
<div class="featureWrap">
    <div id="movingAlaska">
        <h2>Moving and Relocating to Alaska?</h2>
        <p>Are you moving to Alaska? Relocating to Alaska is no easy accomplishment, unless you have a secret weapon. 
        Todd O'Banion specializes in assisting home buyers find property in Alaska, whether you are moving to the 
        49th state for military relocation, a job opportunity, or just to move your family to a safer environment. 
        If you're moving to Alaska, Todd O'Banion is your Alaskan source to help make your relocation experience a 
        quick and easy one!</p>
        </div>
    <div id="idxSearchWrap"></div>
    <div id="henriRoosBubble"></div>
    </div><div class="clear"></div>

<div id="trustedBusiness">
    <h2>Trusted Businesses and Friends of O'Banion</h2>
    <a href="http://www.homerocean.com"><img src="<?php bloginfo("template_url"); ?>/images/homercharters_tile.jpg" class="tilead"/></a>
    <a href="tsk-residential-repair-and-maintenance"><img src="<?php bloginfo("template_url"); ?>/images/tsk.png" class="tilead"/></a>
    <a href="http://www.907snowcat.com"><img src="<?php bloginfo("template_url"); ?>/images/snow_cat.png" class="tilead"/></a>
    <a href="http://www.alliedalaskaelectricllc.com"><img src="<?php bloginfo("template_url"); ?>/images/allied_alaska.png" class="tilead"/></a>
    <a href="http://www.extendedstayhotels.com/find-reserve/find-by-map.html?state=AK"><img src="<?php bloginfo("template_url"); ?>/images/extended_stay.png" class="tilead"/></a>
    <a href="http://www.thealaskaclub.com/free-pass"><img src="<?php bloginfo("template_url"); ?>/images/alaskaClub.jpg" class="tilead"/></a>

    
    
    
    </div>








    
<script>
    $(window).scroll(function() {
    var x = $(this).scrollTop();
    $('.featureWrapDISABLED').css('background-position', '0% ' + parseInt(-x / 10) + 'px');
});
</script>    
    

<?php get_footer(); ?>