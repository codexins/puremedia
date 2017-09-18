<?php
/**
 * Puremedia shortcode init.php
 */

require_once( 'cx_shortcodes.php' );
require_once( 'kc_integrated.php' );

function codexin_shortcodes_scripts () {
	wp_enqueue_style( 'codexin-shortcode-stylesheet', plugin_dir_url( __FILE__ ) . 'assets/css/shortcodes.css',false,'1.1','all');
	wp_enqueue_script( 'codexin-js-script', plugin_dir_url( __FILE__ ) . 'assets/js/shortcode.js', array ( 'jquery' ), 1.1, true);

} 

add_action( 'wp_enqueue_scripts', 'codexin_shortcodes_scripts');
