<?php
/*
Template Name: Our Agents
*/
?>
<?php get_header(); ?>

<div id="insideContent">
    
    <?php

    $the_query = new WP_Query( array('category_name'=>'agents') );
    
    if($the_query->have_posts()){
    	$build = '<ul class="agents">';
    	while ( $the_query->have_posts() ) {
    		$the_query->the_post();
            if ( has_post_thumbnail() ) $thumbnail = get_the_post_thumbnail_url();
    		$build .= '<li>';
    		$build .= "<a href='".get_the_permalink()."'><img src='".$thumbnail."' class='agentMug' /></a>";
    		$build .= "<h2><a href='".get_the_permalink()."'>".get_the_title()."</a></h2>";
            $build .= "<p>".get_the_excerpt()."</p>"; 
            $posttags = get_the_tags();
            if ($posttags) {
                foreach($posttags as $tag)  $build .= "<span class='tag'>&middot; ".$tag->name."</span><br/>"; 
                }
    		$build .= '</li>';
       	     }
    	$build .= '</ul>';
        }
    wp_reset_postdata();

    echo $build;

    ?>


    <div class="clear"></div>
    </div>

<?php get_footer(); ?> 