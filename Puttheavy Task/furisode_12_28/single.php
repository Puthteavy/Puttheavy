<?php get_header(); ?>

	<?php
		$post = $wp_query->post;
		if ( in_category('news') ) {
		 require_once 'single-news.php';
		} else {
		 require_once '_inc/detail-post.php';
		}
	?>


<?php get_footer(); ?>

