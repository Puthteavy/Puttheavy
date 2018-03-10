<?php 

/*
@package padel

	===================================
		FRONT-END ENQUEUE FUNCTIONS
	===================================
*/

function padel_load_scripts() {

 	// global $post;
	wp_enqueue_style( 'importStyle', get_template_directory_uri() . '/css/import.css', array(), '1.0.0', 'all' );

	// Place 
	if( is_page( array( 'place', 'padel_tokyo' ) ) ) {
		wp_enqueue_style( 'placePage', get_template_directory_uri() . '/css/place/place.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'tokyoPage', get_template_directory_uri() . '/css/place/padel_tokyo.css', array(), '1.0.0', 'all' );
	}


	// Admission 
	if( is_page( array( 'admission', 'school', 'trial' ) ) ) {
		wp_enqueue_style( 'admissionPage', get_template_directory_uri() . '/css/admission/admission.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'schoolPage', get_template_directory_uri() . '/css/admission/school.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'trialPage', get_template_directory_uri() . '/css/admission/trial.css', array(), '1.0.0', 'all' );
	}

	// About
	if( is_page( 'about' ) ) {
		wp_enqueue_style( 'aboutPage', get_template_directory_uri() . '/css/about/about.css', array(), '1.0.0', 'all' );
	}

	// About
	if ( is_single() )  {
		wp_enqueue_style( 'aboutPage', get_template_directory_uri() . '/css/single.css', array(), '1.0.0', 'all' );
	}

	// Company
	if( is_page( 'company' ) ) {
		wp_enqueue_style( 'companyPage', get_template_directory_uri() . '/css/company/company.css', array(), '1.0.0', 'all' );
	}

	// FAQ
	if( is_page( 'faq' ) ) {
		wp_enqueue_style( 'faqPage', get_template_directory_uri() . '/css/faq/faq.css', array(), '1.0.0', 'all' );
	}

	// Event
	if( is_page( 'event' ) ) {
		wp_enqueue_style( 'eventPage', get_template_directory_uri() . '/css/event/event.css', array(), '1.0.0', 'all' );
	}
	//business
	if(is_page('business')){
        wp_enqueue_style( 'businessPage', get_template_directory_uri() . '/css/business/business.css', array(), '1.0.0', 'all' );
	}
	//info
	if(is_page('info')){
        wp_enqueue_style( 'infoPage', get_template_directory_uri() . '/css/info/info.css', array(), '1.0.0', 'all' );
	}
	//privacy
    if(is_page('privacy')){
        wp_enqueue_style( 'privacyPolicyPage', get_template_directory_uri() . '/css/privacy/privacy.css', array(), '1.0.0', 'all' );
	}
	//sitemap
	 if(is_page('sitemap')){
        wp_enqueue_style( 'sitemapPage', get_template_directory_uri() . '/css/sitemap/sitemap.css', array(), '1.0.3', 'all' );
	}
	//news
	 if(is_page('news')){
        wp_enqueue_style( 'newsPage', get_template_directory_uri() . '/css/news/news.css', array(), '1.0.0', 'all' );
	}
	//event
	 if(is_page('event')){
        wp_enqueue_style( 'evnetPage', get_template_directory_uri() . '/css/event/event.css', array(), '1.0.0', 'all' );
	}


	// jQuery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.js', false, '3.2.1', true );
	wp_enqueue_script( 'jquery' );

	// padel javascripts
	wp_enqueue_script('swiperjs', get_template_directory_uri() . '/js/swiper/swiper.min.js', array(), '1.0.0', true);
	wp_enqueue_script('bxsliderjs', get_template_directory_uri() . '/js/bxslider/jquery.bxslider.min.js', array(), '1.0.0', true);
	wp_enqueue_script('commonjs', get_template_directory_uri() . '/js/sp/common.js', array(), '1.0.0', true);
	wp_enqueue_script('mapjs', get_template_directory_uri() . '/js/map.js', array(), '1.0.0', true);
	wp_enqueue_script('mainjs', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
	

}

add_action( 'wp_enqueue_scripts', 'padel_load_scripts' ); 


// add google map api 
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyBTYTuNFFYPfLcd64Cesp2Orz7jWbKSMNs';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');