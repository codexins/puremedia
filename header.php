<?php

/**

 * The header for our theme

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package codexin

 */



?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta http-equiv="X-UA-Compatible" content="IE=9">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php bloginfo('name'); ?></title>

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!--[if IE 9]>

      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie9.css">

    <![endif]-->

<?php wp_head(); ?>

</head>
<body <?php if( is_front_page()) : body_class('homepage'); else : body_class(); endif; ?>>

<?php global $codexin; ?>

   <div id="preloader"> 
	   <div id="status">
         <img src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" height="60" width="60" alt="">
         <div class="loader">Loading...</div>
      </div>
   </div>
   
   <!-- Header
   =================================================== -->
   <header id="main-header">
   	<div class="row header-inner">
	      <div class="logo">
	         <a class="smoothscroll" href="<?php echo esc_url( home_url( '/' ) ); ?>">
             <?php if( ! empty( $codexin['pm-logo'] ) ) : echo $codexin['pm-logo']; endif; ?>  
            </a>
	      </div>
	      <nav id="nav-wrap">         
	         
	         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">
	         	<span class='menu-text'>Show Menu</span>
	         	<span class="menu-icon"></span>
	         </a>
         	<a class="mobile-btn" href="#" title="Hide navigation">
         		<span class='menu-text'>Hide Menu</span>
         		<span class="menu-icon"></span>
         	</a>         

	         <?php echo get_main_menu(); ?>

	      </nav> <!-- /nav-wrap -->	      
	   </div> <!-- /header-inner -->
   </header> 
	
	<?php if( is_front_page() ) : ?>
   <!-- Hero
   =================================================== -->
   <section id="hero">	
   	<div class=" hero-content">
   		<div class="twelve columns flex-container">
   			<div id="hero-slider" class="flexslider">
   				<ul class="slides">
               <?php 
                  $args = array(
                     'post_type' => 'home-slider',
                     'post_per_page' => -1,
                  );

                  $slider = new WP_Query( $args);

                  //Check posts
                  if( $slider->have_posts() ) :
                     //Start loop here..
                     while( $slider->have_posts() ) : $slider->the_post();

                     $get_image = get_the_post_thumbnail_url();
                     $image  = ( ! empty( $get_image) ) ? $get_image : '';
                ?>
   					<!-- Slide -->
   					<li style=" background: #12151b url(<?php echo esc_attr( $image ); ?>) no-repeat center center fixed;">
   						<div class="flex-caption">
   							<h1><?php the_excerpt(); ?> </h1>	
   							<p>
                           <a class="button stroke smoothscroll" href="#about">
                           <?php 
                              $btn_text = rwmb_meta( 'codexin_button_text', 'type=text' ); 
                              $text = ( !empty($btn_text) ) ? $btn_text : '';
                              echo $text;
                           ?>
                           </a>
                        </p>																   
   						</div>						
   					</li>	
               
               <?php 
                     endwhile;
                  endif;
                  wp_reset_postdata();
                ?>

   				</ul> <!-- end of slide -->
   			</div> <!-- .flexslider -->				   
   		</div> <!-- .flex-container -->      
   	</div> <!-- .hero-content -->	   
   </section> <!-- #hero -->

<?php else : ?>

	<!-- Page Title
   ================================================== -->
   <?php 
   		$header_bg = rwmb_meta('codexin_page_background', 'type=image_advanced'); 
	  	foreach ($header_bg as $single_bg) {
	  		# code...
	  	$single_bg = $single_bg['full_url'];

	  	} 
	?>

   <section id="page-title" <?php if (!empty($single_bg)): ?> style="background-image: url('<?php echo $single_bg; ?>')" <?php endif; ?>>
		<div class="row">
			<div class="twelve columns">
				<h1>
				<?php 
					if(is_home()):

					echo "Blog";

				  elseif(is_404()):

				  	echo "Nothing Found!";

				  elseif(is_archive()):

				  	the_archive_title();

				  elseif(is_search()):

				  	printf( esc_html__( 'Search Results for: %s', 'codexin' ), '<span>' . get_search_query() . '</span>' );

				  else:

				  	single_post_title();

				  endif;

				 ?><span>.</span></h1>
				<p><?php bloginfo( 'description' ); ?></p>
			</div>			    
		</div> <!-- /row -->	   
   </section> <!-- /page-title -->

<?php endif; ?>	



	

	



