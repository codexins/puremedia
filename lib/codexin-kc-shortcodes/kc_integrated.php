<?php
 /*-------------------
	Add Param Type 
	------------------*/
		 
/**
 *
 * Helper function to fetch all the contact form data from contact form 7
 *
 */  
function cx_get_contact_form() {
	$args = array( 
		'post_type' => 'wpcf7_contact_form', 
		'posts_per_page' => -1 
	);

	$cf7_list = get_posts( $args );

	$cf7_val = array();

	if ( $cf7_list ) {

		$cf7_val[] = __( 'Select Contact Form..', 'codexin' );

		foreach ( $cf7_list as $value ) {
			$cf7_val[$value->ID] = $value->post_title;
		}

	} else {

		$cf7_val[0] = __( 'No contact forms found', 'codexin' );

	}

	return $cf7_val;


} //End cx_get_contact_form()..

add_action('init', 'puremedia_shortcode', 99 );
 
function puremedia_shortcode() {
	$contact_form = cx_get_contact_form();
	if (function_exists('kc_add_map'))
	{ 
		kc_add_map(

			array(

				'pm_section_heading' => array(
					'name' => __( 'Section Heading', 'codexin' ),
					'description' => __('Section Heading', 'codexin'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						'General' => array(
							array(
								'name' => 'title',
								'label' => __( 'Enter Title', 'codexin' ),
								'type' => 'text',
								'admin_label' => false,
							),
							array(
								'name' => 'description',
								'label' => __( 'Description', 'codexin' ),
								'type' => 'textarea',
								'description' => esc_html__( 'Enter Your Header Description Here', 'codexin' ),
								'admin_label' => false,
							),
							array(
								'name'			=> 'class',
								'label' 		=> __(' Extra Class', 'codexin'),
								'type'			=> 'text'
							),
						), //End General
						// Style based Params
						'styling' => array(
 							array(
 								'name'    		=> 'codexin_css',
 								'type'    		=> 'css',
 								'options' 		=> array(
 									array(
 										"screens" => "any,1199,991,767,479",

 										'Title' => array(
 											array('property' => 'color', 'label' => esc_html__('Color', 'codexin'), 'selector' => '.section-head h1'),
										),

										'Description' => array(
 											array('property' => 'color', 'label' => esc_html__('Color', 'codexin'), 'selector' => '.section-head p'),
										),

									), 
								), 
							), 
                		), //End styling array..

						// Animate Params
						'animate' => array(
							array(
								'name'    		=> 'animate',
								'type'    		=> 'animate'
							)
						),//End animate

	                ) // End Params array()..

	            ),  // End of elemnt pm_section_heading... 

				// Integrating Portfolio Shortcode with King Composer
	            'pm_portfolio' => array(
					'name' => __( 'Portfolio', 'codexin' ),
					'description' => __('Puremedia Portfolio', 'codexin'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'codexin'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_portfolio...

	            // Integrating Service Box Shortcode with King Composer
	            'pm_services_box' => array(
					'name' => __( 'Service Box', 'codexin' ),
					'description' => __('Puremedia Service Box', 'codexin'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'service_title',
							'label' 		=> __('Service Title', 'codexin'),
							'type'			=> 'text',
							'description'	=> esc_html__( 'Enter Service Title Here', 'codexin' ),
						),
						array(
							'name'			=> 'service_desc',
							'label' 		=> __('Service Description', 'codexin'),
							'type'			=> 'textarea',
							'description'	=> esc_html__( 'Enter Service Description Here', 'codexin' ),
						),
						array(
							'name'			=> 'services_icon',
							'label' 		=> __('Service Icon', 'codexin'),
							'type'			=> 'icon_picker',
							'description'	=> esc_html__( 'Select Service Icon Here', 'codexin' ),
						),
						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'codexin'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_services_box... 

	            // Integrating About Box Shortcode with King Composer
	            'pm_about_box' => array(
					'name' => __( 'About Box', 'codexin' ),
					'description' => __('Puremedia About Box', 'codexin'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'about_title',
							'label' 		=> __('About Title', 'codexin'),
							'type'			=> 'text',
							'description'	=> esc_html__( 'Enter About Us Title Here', 'codexin' ),
						),
						array(
							'name'			=> 'about_desc',
							'label' 		=> __('About Description', 'codexin'),
							'type'			=> 'textarea',
							'description'	=> esc_html__( 'Enter About Us Description Here', 'codexin' ),
						),
						array(
							'name'			=> 'position',
							'label' 		=> __('Select Position', 'codexin'),
							'type'			=> 'select',
							'options'	=> array(
								'left'	=> 'Left',
								'right'	=> 'Right',
							),
							'value'		=> '1',
							'description'	=> esc_html__( 'Select About Bix Position Here', 'codexin' ),
						),
						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'codexin'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_about_box...

	            // Integrating Team Shortcode with King Composer
	            'pm_team' => array(
					'name' => __( 'Team Section', 'codexin' ),
					'description' => __('Puremedia Team Section', 'codexin'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'codexin'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_team...

	            // Integrating Blog Shortcode with King Composer
	            'pm_blog' => array(
					'name' => __( 'Blog Section', 'codexin' ),
					'description' => __('Puremedia Blog Section', 'codexin'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'codexin'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_blog...

	            // Integrating Blog Shortcode with King Composer
	            'pm_contact_form' => array(
					'name' => __( 'Contact Form', 'codexin' ),
					'description' => __('Puremedia Contact Form', 'codexin'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'show_form_id',
							'label' 		=> __('Select Form', 'codexin'),
							'type'			=> 'select',
							'options'	=> $contact_form,
							'description' => esc_html__( 'Please Select Your Contact Form' ),
						),

						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'codexin'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_blog...


/*=================================***********===========================*/
	        ) // End KC map array()

	    ); // End kc_add_map

	} // End if

} // End puremedia_shortcodes()..
 
?>