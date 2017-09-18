<?php
	
add_action( 'widgets_init', 'codexin_sidebar_widgets_init' );

function codexin_sidebar_widgets_init () {
	
	register_sidebar( array(
		'name'				=> 'Sidebar (General)',
		'id'				=> 'codexin-sidebar-general',
		'description'		=> 'This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.',	
	    'class'         	=> '',
		'before_widget' 	=> '<div class="sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',			
	) );

	register_sidebar( array(
		'name'				=> 'Sidebar (Pages)',
		'id'				=> 'codexin-sidebar-page',
		'description'		=> 'This sidebar will show on all Pages.',
	    'class'         	=> '',
		'before_widget' 	=> '<div class="sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',		
	) );
	
	register_sidebar( array(
		'name' 				=> 'Sidebar (Blog)',
		'id'				=> 'codexin-sidebar-blog',
		'description'		=> 'This sidebar will show on all blog Posts.', 
	    'class'         	=> '',
		'before_widget' 	=> '<div class="sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',		
	) );

	register_sidebar( array(
		'name' 				=> 'Sidebar (Contact Page)',
		'id'				=> 'codexin-sidebar-contact-template',
		'description'		=> 'This sidebar will show only on Contact Page.', 
	    'class'         	=> '',
		'before_widget' 	=> '<div class="sidebar-widget clearfix">',
		'after_widget'  	=> '</div>',		
	) );

} // codexin_sidebar_widgets_init ()
	



add_action( 'widgets_init', 'codexin_footer_widgets' );

function codexin_footer_widgets () {

	register_sidebar( array(
		'name'				=> 'Footer (Left)',
		'id'				=> 'codexin-footer-left',
	    'class'         	=> '',
	    'before_title'		=> '<h3>',
	    'after_title'		=> '</h3>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );

	register_sidebar( array(
		'name'				=> 'Footer (Center)',
		'id'				=> 'codexin-footer-center',
	    'class'         	=> '',
		'before_title'		=> '<h3>',
	    'after_title'		=> '</h3>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );
	
	register_sidebar( array(
		'name'				=> 'Footer (Right)',
		'id'				=> 'codexin-footer-right',
	    'class'         	=> '',
		'before_title'		=> '<h3>',
	    'after_title'		=> '</h3>',
		'before_widget' 	=> '',
		'after_widget'  	=> '',			
	) );
		
} // codexin_footer_widgets ()	

?>