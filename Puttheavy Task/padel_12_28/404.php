<?php get_header(); ?>
    <main id="mainContent">

		<!-- breadcrumbs start -->
	    <div id="breadcrumbsWrapper">
	      <div id="breadcrumbs" class="contentWidth">
			<?php if (function_exists('padel_custom_breadcrumbs')) padel_custom_breadcrumbs(); ?>
	      </div>
	    </div><!-- /breadcrumbs end -->
		<div class="notfoundContent">
			<h1>Error 404: Page not found.......</h1>
		</div>
	</main><!-- /main contents -->
	

<?php get_footer(); ?>