<?php get_header(); ?>
	<?php  
		$page_slug = $post->post_name; 
	    // Display a page parent's slug
		$post_data = get_post($post->post_parent);
		$parent_slug = $post_data->post_name; 
	?>
<?php if( have_posts() ) : ?>
<main id="mainContent" >
	<!-- breadcrumbs start -->
	    <div id="breadcrumbsWrapper">
	      <div id="breadcrumbs" class="contentWidth">
			<?php if (function_exists('padel_custom_breadcrumbs')) padel_custom_breadcrumbs(); ?>
	      </div>
	    </div><!-- /breadcrumbs end --> 
	    <section id="news">
			<?php if( ! is_page( array( 'contact', 'confirm', 'complate' ) ) ) : ?>
		    <!-- main image start -->
			<div class="mainH2 mainH2Bg">
			  	<h2><img src="<?php echo get_template_directory_uri(); ?>/img/news/news_main_h2.jpg" alt="<?php echo $page_slug; ?>" class="pc">
			  	<img src="<?php echo get_template_directory_uri(); ?>/img/news/sp_news_main_h2.jpg" alt="<?php echo $page_slug; ?>" class="sp"></h2>
			</div><!-- /main image end -->
		    <div class="contentWidth">

				<?php endif; ?>

				<?php while( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</section>
</main>
<?php endif; ?>
<?php get_footer(); ?>