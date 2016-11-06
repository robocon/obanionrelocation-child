<?php /* Template Name: Appfolio */?>
<?php get_header(); ?>

<div style="display: block; height: 550px;">
<script type='text/javascript' charset='utf-8'>
  document.write(unescape("%3Cscript src='" + (('https:' == document.location.protocol) ? 'https:' : 'http:') + "//obanionrelocation.appfolio.com/javascripts/listing.js' type='text/javascript'%3E%3C/script%3E"));
</script>
 
<script type='text/javascript' charset='utf-8'>
  Appfolio.Listing({
    hostUrl: 'obanionrelocation.appfolio.com',
    //propertyGroup: 'My Group Name',
    height: '550px',
    width: '100%'
  });
</script>
</div>

<?php get_footer(); ?>