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

		$cf7_val[] = __( 'Select Contact Form..', 'puremedia' );

		foreach ( $cf7_list as $value ) {
			$cf7_val[$value->ID] = $value->post_title;
		}

	} else {

		$cf7_val[0] = __( 'No contact forms found', 'puremedia' );

	}

	return $cf7_val;


} //End cx_get_contact_form()..

/**
 *
 * Helper function to fetch all post categories
 *
 */  
function cx_get_post_categories() {

	$categories = get_categories( array(
	    'orderby' => 'name',
	    'order'   => 'ASC'
	) );

	$post_cat = array();
	if ( $categories ) {		

		foreach ( $categories as $value ) {
			$post_cat[$value->term_id] = ucfirst( $value->name ) . ' (Posts Count: '. $value->category_count .')';
		}

	} else {

		$post_cat[0] = __( 'No Categories found', 'codexin' );

	}

	return $post_cat;


} //End cx_get_post_categories()..

add_action('init', 'puremedia_shortcode', 99 );
 
function puremedia_shortcode() {
	$contact_form = cx_get_contact_form();
	$cx_categories = cx_get_post_categories();
	if (function_exists('kc_add_map'))
	{ 
		kc_add_map(

			array(

				'pm_section_heading' => array(
					'name' => __( 'Section Heading', 'puremedia' ),
					'description' => __('Section Heading', 'puremedia'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						'General' => array(
							array(
								'name' => 'title',
								'label' => __( 'Enter Title', 'puremedia' ),
								'type' => 'text',
								'admin_label' => false,
							),
							array(
								'name' => 'description',
								'label' => __( 'Description', 'puremedia' ),
								'type' => 'textarea',
								'description' => esc_html__( 'Enter Your Header Description Here', 'puremedia' ),
								'admin_label' => false,
							),
							array(
								'name'			=> 'class',
								'label' 		=> __(' Extra Class', 'puremedia'),
								'type'			=> 'text'
							),
						), //End General
						// Style based Params
						'styling' => array(
 							array(
 								'name'    		=> 'puremedia_css',
 								'type'    		=> 'css',
 								'options' 		=> array(
 									array(
 										"screens" => "any,1199,991,767,479",

 										'Title' => array(
 											array('property' => 'color', 'label' => esc_html__('Color', 'puremedia'), 'selector' => '.section-head h1'),
										),

										'Description' => array(
 											array('property' => 'color', 'label' => esc_html__('Color', 'puremedia'), 'selector' => '.section-head p'),
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
					'name' => __( 'Portfolio', 'puremedia' ),
					'description' => __('Puremedia Portfolio', 'puremedia'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'number_of_portfolio',
							'label' 		=> __('How portfolio Show?', 'puremedia'),
							'type'			=> 'select',
							'options'	=> array(
								'4'	=> '4',
								'8'	=> '8',
								'12'	=> '12',
							),
							'value'	=> '8',
							'description'	=> esc_html__( 'Select here, How many portfolio show?', 'puremedia' ),
						),

						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'puremedia'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_portfolio...

	            // Integrating Service Box Shortcode with King Composer
	            'pm_services_box' => array(
					'name' => __( 'Service Box', 'puremedia' ),
					'description' => __('Puremedia Service Box', 'puremedia'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'service_title',
							'label' 		=> __('Service Title', 'puremedia'),
							'type'			=> 'text',
							'description'	=> esc_html__( 'Enter Service Title Here', 'puremedia' ),
						),
						array(
							'name'			=> 'service_desc',
							'label' 		=> __('Service Description', 'puremedia'),
							'type'			=> 'textarea',
							'description'	=> esc_html__( 'Enter Service Description Here', 'puremedia' ),
						),
						array(
							'name'			=> 'services_icon',
							'label' 		=> __('Service Icon', 'puremedia'),
							'type'			=> 'icon_picker',
							'description'	=> esc_html__( 'Select Service Icon Here', 'puremedia' ),
						),
						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'puremedia'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_services_box... 

	            // Integrating About Box Shortcode with King Composer
	            'pm_about_box' => array(
					'name' => __( 'About Box', 'puremedia' ),
					'description' => __('Puremedia About Box', 'puremedia'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'about_title',
							'label' 		=> __('About Title', 'puremedia'),
							'type'			=> 'text',
							'description'	=> esc_html__( 'Enter About Us Title Here', 'puremedia' ),
						),
						array(
							'name'			=> 'about_desc',
							'label' 		=> __('About Description', 'puremedia'),
							'type'			=> 'textarea',
							'description'	=> esc_html__( 'Enter About Us Description Here', 'puremedia' ),
						),
						array(
							'name'			=> 'position',
							'label' 		=> __('Select Position', 'puremedia'),
							'type'			=> 'select',
							'options'	=> array(
								'left'	=> 'Left',
								'right'	=> 'Right',
							),
							'value'		=> '1',
							'description'	=> esc_html__( 'Select About Bix Position Here', 'puremedia' ),
						),
						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'puremedia'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_about_box...

	            // Integrating Team Shortcode with King Composer
	            'pm_team' => array(
					'name' => __( 'Team Section', 'puremedia' ),
					'description' => __('Puremedia Team Section', 'puremedia'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						'General' => array(

							array(
								'name'			=> 'member_name',
								'label' 		=> __('Team Member Name', 'puremedia'),
								'type'			=> 'text',
								'description'	=> esc_html__( 'Enter Team Member Name Here', 'puremedia' ),
							),
							array(
								'name'			=> 'designation',
								'label' 		=> __('Team Member Designation', 'puremedia'),
								'type'			=> 'text',
								'description'	=> esc_html__( 'Enter Team Member Designation Here', 'puremedia' ),
							),
							array(
                                'name'          => 'member_image',
                                'label'         => esc_html__( 'Upload Team Member Image Here', 'puremedia' ),
                                'type'          => 'attach_image_url',
                                'description'   => esc_html__( 'Recommended Image size 100x100 px.', 'puremedia' ),
                            ),
                            array(
                                'name'          => 'image_alt',
                                'label'         => esc_html__( 'Image Alt Text', 'puremedia' ),
                                'type'          => 'text',
                                'description'   => esc_html__( 'Enter Image Alt Text Here', 'puremedia' ),
                            ),

                            array(
                                'name'          => 'member_desc',
                                'label'         => esc_html__( 'Description', 'puremedia' ),
                                'type'          => 'textarea',
                                'description'   => esc_html__( 'Enter Team Member Description Here', 'puremedia' ),
                            ),

							array(
								'name'			=> 'class',
								'label' 		=> __(' Extra Class', 'puremedia'),
								'type'			=> 'text'
							),

						), //End General
						
						'Social Profile' => array(
							array(
								'name'			=> 'team_fb',
								'label' 		=> __('Facebook Url', 'puremedia'),
								'type'			=> 'text',
								'description'	=> esc_html__( 'Enter Team Member Facebook URL Here', 'puremedia' ),
							),

							array(
								'name'			=> 'team_tr',
								'label' 		=> __('Twitter Url', 'puremedia'),
								'type'			=> 'text',
								'description'	=> esc_html__( 'Enter Team Member Twitter URL Here', 'puremedia' ),
							),

							array(
								'name'			=> 'team_gp',
								'label' 		=> __('Google-Plus Url', 'puremedia'),
								'type'			=> 'text',
								'description'	=> esc_html__( 'Enter Team Member Google Plus URL Here', 'puremedia' ),
							),

							array(
								'name'			=> 'team_ld',
								'label' 		=> __('Linkedin Url', 'puremedia'),
								'type'			=> 'text',
								'description'	=> esc_html__( 'Enter Team Member Linkedin URL Here', 'puremedia' ),
							),

							array(
								'name'			=> 'team_sk',
								'label' 		=> __('Skype Url', 'puremedia'),
								'type'			=> 'text',
								'description'	=> esc_html__( 'Enter Team Member Skype URL Here', 'puremedia' ),
							),

						), //End Social Profile	

	                ), // End Params array()..

	            ),  // End of elemnt pm_team...

	            // Integrating Blog Shortcode with King Composer
	            'pm_blog' => array(
					'name' => __( 'Blog Section', 'puremedia' ),
					'description' => __('Puremedia Blog Section', 'puremedia'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'number_of_post',
							'label' 		=> __('Show number of posts', 'puremedia'),
							'type'			=> 'select',
							'options'	=> array(
								'3'	=> '3',
								'6'	=> '6',
							),
							'value'	=> '6',
							'description'	=> esc_html__( 'Select here, How many posts are show?', 'puremedia' ),
						),
						array(
	 							'name' 			=> 'exclude',
	 							'label' 		=> esc_html__( 'Exclude Categories', 'codexin' ),
	 							'type' 			=> 'multiple',
	 							'options'		=> $cx_categories,
	 							'description'	=> esc_html__( 'Choose if You Want to Exclude Any Post Category, Control + Click to Select Multiple Categories to Exclude (No Categories are Excluded by Default)', 'codexin' ),
	 					),

						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'puremedia'),
							'type'			=> 'text'
						),

	                ) // End Params array()..

	            ),  // End of elemnt pm_blog...

	            // Integrating Blog Shortcode with King Composer
	            'pm_contact_form' => array(
					'name' => __( 'Contact Form', 'puremedia' ),
					'description' => __('Puremedia Contact Form', 'puremedia'),
					'icon' => 'et-gift',
					'category' => 'Puremedia',
					'params' => array(
						array(
							'name'			=> 'show_form_id',
							'label' 		=> __('Select Form', 'puremedia'),
							'type'			=> 'select',
							'options'	=> $contact_form,
							'description' => __( 'Please Select Your Contact Form', 'puremedia' ),
						),

						array(
							'name'			=> 'class',
							'label' 		=> __(' Extra Class', 'puremedia'),
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