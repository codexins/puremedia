<?php
add_filter( 'rwmb_meta_boxes', 'codexin_register_meta_boxes' );

function codexin_register_meta_boxes( $meta_boxes ) {
    $prefix = 'codexin_';
    
    //1st meta box
    $meta_boxes[] = array(
        'id'         => 'codexin-team-member',
        'title'      => __( 'Team Member Information', 'codexin' ),
        'post_types' => array( 'team' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => __( 'Designation', 'codexin' ),
                'desc'  => 'Enter Designation',
                'id'    => $prefix . 'team_designation',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Facebook URL', 'codexin' ),
                'desc'  => 'Enter facebook url',
                'id'    => $prefix . 'team_fb',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Twitter URL', 'codexin' ),
                'desc'  => 'Enter Twitter URL',
                'id'    => $prefix . 'team_tr',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'LinkedIn URL', 'codexin' ),
                'desc'  => 'Enter LinkedIn URL',
                'id'    => $prefix . 'team_ld',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Google Plus URL', 'codexin' ),
                'desc'  => 'Enter Instagram URL',
                'id'    => $prefix . 'team_gp',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Skype URL', 'codexin' ),
                'desc'  => 'Enter Instagram URL',
                'id'    => $prefix . 'team_sk',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),


        )
    );

    $meta_boxes[] = array(
        'id'         => 'codexin-testimonail-meta',
        'title'      => __( 'Author Information', 'codexin' ),
        'post_types' => array( 'testimonial' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'  => __( 'Name', 'codexin' ),
                'desc'  => 'Enter Name',
                'id'    => $prefix . 'author_name',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Designation', 'codexin' ),
                'desc'  => 'Enter Designation',
                'id'    => $prefix . 'author_designation',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),


        )
    );


    $meta_boxes[] = array(
        'id'         => 'codexin-portfolio-meta',
        'title'      => __( 'Portfolio Information', 'codexin' ),
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'  => __( 'Client Name', 'codexin' ),
                'desc'  => 'Enter client name',
                'id'    => $prefix . 'portfolio_client',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Project Date', 'codexin' ),
                'desc'  => 'Enter project date. Example: 14-Apr-17',
                'id'    => $prefix . 'portfolio_date',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'          => __( 'Project Thumbnail', 'codexin' ),
                'desc'          => 'Upload Project Images Here ( You may upload multipole images)',
                'id'            => $prefix . 'portfolio_thumbnail',
                'type'          => 'image',
                'clone'         => false,
            ),

        )
    );

    $meta_boxes[] = array(
        'id'         => 'codexin-page-background-meta',
        'title'      => __( 'Page Header Background Image', 'codexin' ),
        'post_types' => array( 'page' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'          => __( 'Background Image', 'codexin' ),
                'desc'          => 'Upload Page Header Background Image',
                'id'            => $prefix . 'page_background',
                'type'          => 'image_advanced',
                'clone'         => false,
            ),
        )
    );



    $meta_boxes[] = array(
        'id'         => 'codexin-client-logo-meta',
        'title'      => __( 'Client Information', 'codexin' ),
        'post_types' => array( 'clients' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(


            array(
                'name'  => __( 'Client Site URL', 'codexin' ),
                'desc'  => 'Enter client site URL',
                'id'    => $prefix . 'clients_surl',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),



        )
    );

    //Home Slider
    $meta_boxes[] = array(
        'id'         => 'codexin-home-slider-meta',
        'title'      => __( 'Home Slider Info', 'codexin' ),
        'post_types' => array( 'home-slider' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'       => __( 'Read More Button', 'codexin' ),
                'desc'       => 'Enter read More Button Text Here',
                'id'         => $prefix . 'button_text',
                'type'       => 'text',
                'clone'      => false,
                'size'       => 95
            ),
        )
    );

    return $meta_boxes;
}

