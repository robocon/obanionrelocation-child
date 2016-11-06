<?php
/*
Template Name: Mobile - For Sale
*/
?>
<?php define('MENU_OPTION', 'b'); ?>
<?php $pageType = 'for_sale'; ?>
<?php get_header("mobile"); ?>
<div id="content-wrapper">
	<h2>Homes for Sale</h2>
	<?php 
	get_template_part("property", "overview-mobile");
	?>
	<div class="clear"></div>
	</div>	
<?php get_footer("mobile"); ?>