<?php /* Template Name: Homes for Sale (t_home-for-sale.php) */ ?>
<?php define('MENU_OPTION', 'b'); ?>
<?php $pageType = 'for_sale'; ?>
<?php get_header(); ?>
<div id="content-wrapper">
	<h2>Homes for Sale</h2>
	<?php 
	get_template_part("search", "bar");
	get_template_part("property", "overview");
	?>
	</div>	
<?php get_footer(); ?>