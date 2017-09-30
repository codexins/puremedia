<?php
add_filter( 'rwmb_meta_boxes', 'codexin_register_meta_boxes' );

function codexin_register_meta_boxes( $meta_boxes ) {
    $prefix = 'codexin_';
    
    //1st meta box
    $meta_boxes[] = array(
        'id'         => 'codexin-team-member',
        'title'      => __( 'Team Member Information', 'puremedia' ),
        'post_types' => array( 'team' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => __( 'Designation', 'puremedia' ),
                'desc'  => 'Enter Designation',
                'id'    => $prefix . 'team_designation',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Facebook URL', 'puremedia' ),
                'desc'  => 'Enter facebook url',
                'id'    => $prefix . 'team_fb',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Twitter URL', 'puremedia' ),
                'desc'  => 'Enter Twitter URL',
                'id'    => $prefix . 'team_tr',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'LinkedIn URL', 'puremedia' ),
                'desc'  => 'Enter LinkedIn URL',
                'id'    => $prefix . 'team_ld',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Google Plus URL', 'puremedia' ),
                'desc'  => 'Enter Instagram URL',
                'id'    => $prefix . 'team_gp',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Skype URL', 'puremedia' ),
                'desc'  => 'Enter Instagram URL',
                'id'    => $prefix . 'team_sk',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),


        )
    );

    
    //Integrating portfolio meta info 
    $meta_boxes[] = array(
        'id'         => 'codexin-portfolio-meta',
        'title'      => __( 'Portfolio Information', 'puremedia' ),
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'  => __( 'Client Name', 'puremedia' ),
                'desc'  => 'Enter client name',
                'id'    => $prefix . 'portfolio_client',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => __( 'Project Date', 'puremedia' ),
                'desc'  => 'Enter project date. Example: 14-Apr-17',
                'id'    => $prefix . 'portfolio_date',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'          => __( 'Project Thumbnail', 'puremedia' ),
                'desc'          => 'Upload Project Images Here ( You may upload multipole images)',
                'id'            => $prefix . 'portfolio_thumbnail',
                'type'          => 'image',
                'clone'         => false,
            ),

        )
    );

    //Integrating page BG-Image meta
    $meta_boxes[] = array(
        'id'         => 'codexin-page-background-meta',
        'title'      => __( 'Page Header Background Image', 'puremedia' ),
        'post_types' => array( 'page' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'          => __( 'Background Image', 'puremedia' ),
                'desc'          => 'Upload Page Header Background Image',
                'id'            => $prefix . 'page_background',
                'type'          => 'image_advanced',
                'clone'         => false,
            ),
        )
    );



    $meta_boxes[] = array(
        'id'         => 'codexin-client-logo-meta',
        'title'      => __( 'Client Information', 'puremedia' ),
        'post_types' => array( 'clients' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(


            array(
                'name'  => __( 'Client Site URL', 'puremedia' ),
                'desc'  => 'Enter client site URL',
                'id'    => $prefix . 'clients_surl',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),



        )
    );

    //Integrating Home Slider Meta info
    $meta_boxes[] = array(
        'id'         => 'codexin-home-slider-meta',
        'title'      => __( 'Home Slider Info', 'puremedia' ),
        'post_types' => array( 'home-slider' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'       => __( 'Read More Button', 'puremedia' ),
                'desc'       => 'Enter Read More Button Text Here',
                'id'         => $prefix . 'button_text',
                'type'       => 'text',
                'clone'      => false,
                'size'       => 95
            ),

            array(
                'name'       => __( 'Read More Link', 'puremedia' ),
                'desc'       => 'Enter Read More Button Link Here',
                'id'         => $prefix . 'read_more_link',
                'type'       => 'text',
                'clone'      => false,
                'size'       => 95
            ),
        )
    );

    return $meta_boxes;
}

