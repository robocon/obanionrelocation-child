<?php get_header(); ?>

<div id="insideContent">
    
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="contentColumn">
        	<h2><a href='".get_the_permalink()."'><?php the_title(); ?></a></h2>
            <p><?php the_content(); ?></p>
            </div>


        <div class="photoColumn">
            <?php if(has_post_thumbnail()): ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" class='agentMugLg' /></a>
                <?php endif; ?>
            <?php
            $posttags = get_the_tags();
            if ($posttags) {
                foreach($posttags as $tag)  echo "<span class='tag'>&middot; ".$tag->name."</span><br/>"; 
                }
            ?>
            </div>
		
		<?php endwhile; ?>
    

    <div class="clear"></div>
    </div>


<?php get_footer(); ?> 