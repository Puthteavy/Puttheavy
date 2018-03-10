<?php 

/*
@package furisode

	===================================
		FRONT-END ENQUEUE FUNCTIONS
	===================================
*/

function furisode_load_scripts() {

	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.5', 'all' );
	wp_enqueue_style( 'mainStyle', get_template_directory_uri() . '/css/main.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'smartphone', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.5', 'all' );
	wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css', array(), '1.0.3', 'all' );
	wp_enqueue_style( 'highslide', get_template_directory_uri() . '/highslide/highslide.css', array(), '1.0.3', 'all' );
	wp_enqueue_style( 'w3css', get_template_directory_uri() . '/css/w3.css', array(), '1.0.0', 'all' );

	// citizen javascripts
	wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), '1.0.2', true);
	// wp_enqueue_script('slide', get_template_directory_uri() . '/js/sp_slide.js', array(), '1.0.2', true);
	wp_enqueue_script('mainjs', get_template_directory_uri() . '/js/main.js', array(), '1.0.3', true);
 
}

add_action( 'wp_enqueue_scripts', 'furisode_load_scripts' );