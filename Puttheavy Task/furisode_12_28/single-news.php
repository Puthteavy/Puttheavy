<?php if( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<div class="entry-content-page">
            <div class="shopWrap">
	            <div class="navLink">
	                 <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
	            </div>
	            <div class="guideTitle">
	                <img src="<?php echo get_template_directory_uri() ?>/images/pc/main/title_new.png" class="newsTitle" alt="">
	                <br>
	                <h1>新着情報</h1>
	            </div>
            </div>
            
          	<div class="newContent">
	          	 <h2><?php the_title();?></h2>
	          	 <p><?php the_content();?></p>
          	</div>
        </div>
        

<?php endwhile; endif; wp_reset_query();?>