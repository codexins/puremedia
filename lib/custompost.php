<?php 
/**
* The Function Cotain all propertyes & attributes of Custom Posts Type..
* Create Two Arrays ($labes, $args) That Stores All Labes And Attributes of Custome Post Type..
* Developed by Codexin on 12-04-2017,
* Updated and modified by Codexin..
*
*/

 add_action( 'init', 'codexin_framework_custompost_type' );

 function codexin_framework_custompost_type() {

 //Create a custom post for Portfolio...
 	$labels = array(
 				'name'					=> 'Portfolio',
 				'singular_name'			=> 'Portfolio',
 				'add_new'				=> 'Add Portfolio',
 				'all_items'				=> 'All Portfolio',
 				'add_new_item'			=> 'Add Portfolio',
 				'edit_item'				=> 'Edit Portfolio',
 				'new_item'				=> 'New Portfolio',
 				'view_item'				=> 'View Portfolio',
 				'search_item'			=> 'Search Portfolio Post',
 				'not_found'				=> 'No Portfolio Found',
 				'not_found_in_trash' 	=> 'No Portfolio In Trash',
 				'parent_item_colon'		=> 'Parent Portfolio'

 			);

 	// Create a Aruments Array that Store all argumens of posts..
 	$args = array(
 			'labels'				=> $labels,
 			'menu_icon'				=> 'dashicons-art',
 			'public'				=> true,
 			'has_archive'			=> true,
 			'publicly_queryable'	=> true,
 			'query_var'				=> true,
 			'rewrite'				=> true,
 			'capability-type'		=> 'post',
 			'hierarchical'			=> true,
 			// $Supports Array Create Custome From Fiels In WP-Dashbord,Defults are (title,Editor)
 			'supports'				=> array(
 										'title',
 										'editor',
 										'thumbnail'
 									),
 			'taxonomies'			=> array( ''),
 			'menu_position'			=> 5,
 			'exclude_from_search'	=> false
 		);

 	register_post_type( 'portfolio', $args );
	

	//Create a custom post for Team...
 	$labels = array(
 				'name'					=> 'Team Members',
 				'singular_name'			=> 'Team',
 				'add_new'				=> 'Add Team Members',
 				'all_items'				=> 'All Team Members',
 				'add_new_item'			=> 'Add Team Members',
 				'edit_item'				=> 'Edit Team Members',
 				'new_item'				=> 'New Team Members',
 				'view_item'				=> 'View Team Members',
 				'search_item'			=> 'Search Team Members Post',
 				'not_found'				=> 'No Team Members Found',
 				'not_found_in_trash' 	=> 'No Team Members In Trash',
 				'parent_item_colon'		=> 'Parent Team Members'

 			);

 	// Create a Aruments Array that Store all argumens of posts..
 	$args = array(
 			'labels'				=> $labels,
 			'menu_icon'				=> 'dashicons-location',
 			'public'				=> true,
 			'has_archive'			=> true,
 			'publicly_queryable'	=> true,
 			'query_var'				=> true,
 			'rewrite'				=> true,
 			'capability-type'		=> 'post',
 			'hierarchical'			=> true,
 			// $Supports Array Create Custome From Fiels In WP-Dashbord,Defults are (title,Editor)
 			'supports'				=> array(
 										'title',
 										'editor',
 										'excerpt',
 										'thumbnail'
 									),
 			'taxonomies'			=> array(''),
 			'menu_position'			=> 6,
 			'exclude_from_search'	=> false
 		);

 	register_post_type( 'team', $args );

 	
 	//Create a custom post for Home Slider...
 	$labels = array(
 				'name'					=> 'Home Slider',
 				'singular_name'			=> 'Slider',
 				'add_new'				=> 'Add Slider',
 				'all_items'				=> 'All Slider',
 				'add_new_item'			=> 'Add Slider',
 				'edit_item'				=> 'Edit Slider',
 				'new_item'				=> 'New Slider',
 				'view_item'				=> 'View Slider',
 				'search_item'			=> 'Search Slider Post',
 				'not_found'				=> 'No Slider Found',
 				'not_found_in_trash' 	=> 'No Slider In Trash',
 				'parent_item_colon'		=> 'Parent Slider'

 			);

 	// Create a Aruments Array that Store all argumens of posts..
 	$args = array(
 			'labels'				=> $labels,
 			'menu_icon'				=> 'dashicons-vault',
 			'public'				=> true,
 			'has_archive'			=> true,
 			'publicly_queryable'	=> true,
 			'query_var'				=> true,
 			'rewrite'				=> true,
 			'capability-type'		=> 'post',
 			'hierarchical'			=> true,
 			// $Supports Array Create Custome From Fiels In WP-Dashbord,Defults are (title,Editor)
 			'supports'				=> array(
 										'title',
 										'excerpt',
 										'thumbnail'
 									),
 			'taxonomies'			=> array( ''),
 			'menu_position'			=> 5,
 			'exclude_from_search'	=> false
 		);

 	register_post_type( 'home-slider', $args );
 	

 } // End codexin_framework_custompost_type()...

 

/**
 * Create Custome Place Holders..
 */
	add_filter('enter_title_here', 'project_title_place_holder', 0, 2 );

	function project_title_place_holder( $title , $post ){

		if( $post->post_type == 'portfolio' ) {
			$my_title = "Enter Portfolio Title..";
			return $my_title;
		}elseif( $post->post_type == 'team' ) {
			$my_title = "Enter Team Member Or Staff Name";
			return $my_title;
		}

		return $title;

	}

function codexin_portfolio_taxonomies_type() {

	// add new taxonomy hierarchical
	$labels = array(
		'name' => 'Fields',
		'singular_name' => 'Field',
		'search_items' => 'Search Fields',
		'all_items' => 'All Fields',
		'parent_item' => 'Parent Field',
		'parent_item_colon' => 'Parent Field:',
		'edit_item' => 'Edit Field',
		'update_item' => 'Update Field',
		'add_new_item' => 'Add New Field',
		'new_item_name' => 'New Field Name',
		'menu_name' => 'Fields'
	);


	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'has_archive'	=> true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'field')
	);



	register_taxonomy('field', array('portfolio'), $args);

	// add new taxonomy NON hierarchical



	// register_taxonomy('portfolio_tags', 'portfolio', array(

	// 	'label' => 'Portfolio Tags',

	// 	'rewrite' => array('slug' => 'portfolio_tags'),

	// 	'hierarchical' => false

	// ));

}



add_action('init', 'codexin_portfolio_taxonomies_type');