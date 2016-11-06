<?php
/*
Template Name: Mobile - For Rent
*/
?>
<?php define('MENU_OPTION', 'b'); ?>
<?php $pageType = 'for_rent'; ?>
<?php get_header("mobile"); ?>
<div id="content-wrapper">
	<?php 
	get_template_part("property", "overview-mobile");
	?>
	</div>
<?php get_footer("mobile"); ?> 