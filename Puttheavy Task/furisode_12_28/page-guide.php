<?php get_header(); ?>
<?php
    
    while ( have_posts() ) : the_post(); ?> 

        <div class="entry-content-page">
            <div class="shopWrap">
	            <div class="navLink">
	                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
	            </div>
	            <div class="guideTitle">
	                <img src="<?php echo get_template_directory_uri() ?>/images/pc/rule/guide_title.png" alt="">
	                <br>
	                <h1>ご利用規約</h1>
	            </div>
            </div>
            <div class="guideContent">
            	
              <div class="guideblock">
                 <?php the_content(); ?>  
                  
             </div>

            </div>
        </div>
    <?php
    endwhile; 
    wp_reset_query();
    ?>


<?php get_footer(); ?>