<?php
/*
Template Name: MLS
*/
?>
<?php get_header(); ?>

<div id="insideContent">		<?php dynamic_sidebar( 'idx_search' ); ?>

<?php
    
    do_shortcode('[market_stats title="Home Price Trends" width="400" height="300" type="price" display="SoldMedianListPrice,SoldMedianSoldPrice" property_type="A"]');
    
    ?>

    </div>

<?php get_footer(); ?> 