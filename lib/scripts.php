<?php
	
function codexin_scripts () {

	//import icon fonts for fontawesome
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css');
	
	//Load the stylesheets
	wp_enqueue_style( 'base-style', get_template_directory_uri() . '/css/base.css',false,'1.0','all');
	wp_enqueue_style( 'font-style', get_template_directory_uri() . '/css/fonts.css',false,'1.0','all');
	wp_enqueue_style( 'sline-icon', get_template_directory_uri() . '/css/simple-line-icons/simple-line-icons.css',false,'1.0','all');
	//load Main Style
	wp_enqueue_style( 'main-stylesheet', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive-stylesheet', get_template_directory_uri() . '/css/media-queries.css' );
	

	// Load scripts
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array (), 1.1, false);
	
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery-flexslider.js', array (), 1.1, false);
	wp_enqueue_script( 'fittext', get_template_directory_uri() . '/js/jquery-fittext.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/js/backstretch.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.js', array ( 'jquery' ), 1.1, true);
	//load Main JS
	wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	


} // codexin_scripts ()

add_action( 'wp_enqueue_scripts', 'codexin_scripts');

?>