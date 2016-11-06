<?php
/*
Template Name: Alaska Homes For Rent
*/
?>
<?php $pageType = 'for_rent'; ?>
<?php get_header(); ?>

<div id="contentWrap">
    <div id="rentalApplication" class="hanger">
<form action="" method="get" id="quickAccessCodeForm">
    	<a href="https://obanionrelocation.com/rental-application/">Online Rental Application</a> &middot; 
    	<a href="<?php bloginfo("template_url"); ?>/files/rental_app.pdf">PDF Rental Application</a> &middot;
	<input type="text" name="quickAccessCode" value="<?php echo $_GET['quickAccessCode']; ?>" placeholder="Quick Access Code">
	<input type="submit" value="Go" name="go" />
	</form>
    	</div>
    <div id="propertyWrap">
        <h2>Homes for Rent</h2>
        <?php get_template_part("property", "overview"); ?>
        </div>
    </div>

<?php get_footer(); ?> 