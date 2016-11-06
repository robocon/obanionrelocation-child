<?php /* Template Name: About Todd (t_about-todd.php) */ ?>
<?php define('MENU_OPTION', 'f'); ?>
<?php get_header(); ?>

<div id="content-wrapper">
	<div id="about-left">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		  <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>		
		</div>
	<div id="about-right">
		<h3>An Alaska Concierge</h3>
		<p>Looking for something?  Todd is the ultimate Alaskan Concierge!  He has done it all and can recommend the best people and the best companies for the most unforgettable Alaskan experience. Trust an Alaskan to show you the best parts of great state.  Click on the photo to view gallery.</p>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_1.jpg" rel="lightbox[1]"><img src="<?php bloginfo("template_url"); ?>/images/slideshow_about.jpg" class="thumbnail"></a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_2.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_3.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_4.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_5.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_6.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_7.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_8.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_9.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_10.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_11.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_12.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_13.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_14.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		<a href="<?php bloginfo("template_url"); ?>/photos/about_15.jpg" rel="lightbox[1]" class="hidden">&nbsp;</a>
		</div>

	<div class="clear"></div>

	</div> 

<?php get_footer(); ?>