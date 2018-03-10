<?php get_header(); ?>
	
	<?php  
		$page_slug = $post->post_name; 
	    // Display a page parent's slug
		$post_data = get_post($post->post_parent);
		$parent_slug = $post_data->post_name; 
	?>
	<!-- main contents -->
    <main id="mainContent">

		<!-- breadcrumbs start -->
	    <div id="breadcrumbsWrapper">
	      <div id="breadcrumbs" class="contentWidth">
			<?php if (function_exists('padel_custom_breadcrumbs')) padel_custom_breadcrumbs(); ?>
	      </div>
	    </div><!-- /breadcrumbs end -->
		
		<?php if( ! is_page( array( 'contact', 'confirm', 'complate' ) ) ) : ?>

	    <!-- main image start -->
		<div class="mainH2 mainH2Bg">
		  	<h2><img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $parent_slug; ?>/<?php echo $page_slug; ?>_main_h2.jpg" alt="<?php echo $page_slug; ?>" class="pc">
		  	<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $parent_slug; ?>/sp_<?php echo $page_slug; ?>_main_h2.jpg" alt="<?php echo $page_slug; ?>" class="sp"></h2>
		</div><!-- /main image end -->

		<?php endif; ?>
		
		<?php get_template_part( 'template-pages/content', $page_slug ); ?>

		
	</main><!-- /main contents -->

<?php get_footer(); ?>