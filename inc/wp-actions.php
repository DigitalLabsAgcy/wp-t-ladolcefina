<?php 
function dl_divi_engine_dynamic_child_theme() {

	wp_enqueue_style( 'parent-theme', get_template_directory_uri() . '/style.css', array());
	//wp_dequeue_style( 'divi-style' );
	//wp_enqueue_style( 'slickslider', get_stylesheet_directory_uri() . '/dist/node_modules/slick-carousel/slick/slick.css', array(), filemtime( get_stylesheet_directory() . '/dist/node_modules/slick-carousel/slick/slick.min.js' ) );
	//wp_enqueue_style( 'magnific-css', get_stylesheet_directory_uri() . '/dist/node_modules/magnific-popup/dist/magnific-popup.css', array(), filemtime( get_stylesheet_directory() . '/dist/node_modules/magnific-popup/dist/magnific-popup.css' ) );
	wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/dist/assets/css/custom.css', array(), filemtime( get_stylesheet_directory() . '/dist/assets/css/custom.css' ) );
	wp_enqueue_style( 'child-theme', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );

	/* js files */
	//wp_enqueue_script( 'slider-js', get_stylesheet_directory_uri() . '/dist/node_modules/slick-carousel/slick/slick.min.js' , array( 'jquery' ));
	//wp_enqueue_script( 'magnific-js', get_stylesheet_directory_uri() . '/dist/node_modules/magnific-popup/dist/jquery.magnific-popup.min.js' , array( 'jquery' ));
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/dist/assets/js/app.min.js', array( 'jquery'),filemtime( get_stylesheet_directory() . '/dist/assets/js/app.min.js' ), false );
}
add_action( 'wp_enqueue_scripts', 'dl_divi_engine_dynamic_child_theme', 20 );


