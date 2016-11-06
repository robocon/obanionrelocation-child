<?php /* Template Name: Homes for Rent (t_home-for-rent.php) */ ?>
<?php define('MENU_OPTION', 'c'); ?>
<?php $pageType = 'for_rent'; ?>
<?php get_header(); ?>
<div id="content-wrapper">
	<h2>Homes for Rent</h2>
	<div style="width: 160px; display: block; float: right;">
		<div id="rentalLink">
			<h3>Rental Application</h3>
			<img src="<?php bloginfo("template_url"); ?>/images/icon_application.png" />
			<a href="https://obanionrelocation.com/rental-application/">Online Application</a><br/>
			<a href="<?php bloginfo("template_url"); ?>/files/Application-Form-New.pdf">PDF Download</a>
			</div>
		<?php get_template_part("search", "bar"); ?>
		</div>
	<?php
	get_template_part("property", "overview");
	?>
	</div>
<?php get_footer(); ?>
