<?php 

add_action('init', 'puremedia_shortcodes');

function puremedia_shortcodes() {

	$shortcodes = array(
		'pm_section_heading',
		'pm_portfolio',
		'pm_services_box',
		'pm_about_box',
		'pm_team',
		'pm_blog',
		'pm_contact_form',
	);



	foreach ( $shortcodes as $shortcode ) :
		add_shortcode( $shortcode, $shortcode . '_shortcode' );
	endforeach;

}


/*
    ======================================
        PUREMEDIA SECTION HEADING SHORTCODE
    ======================================
*/
    
function pm_section_heading_shortcode(  $atts, $content = null) {
	extract(shortcode_atts(array(
				'title' 		=> '',
				'description'  	=> '',
				'class'		  	=> '',
	), $atts));

	$result = '';

	ob_start(); 

	// Assigning a master css class and hooking into KC
	$master_class = apply_filters( 'kc-el-class', $atts );
	$master_class[] = 'wrapper-section-heading';

	// Retrieving user define classes
	$classes = array( 'row section-head' );
	(!empty($class)) ? $classes[] = $class : '';

	?>
		<div class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
			<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
				<div class="twelve columns">
					<h1><?php echo esc_html( $title ); ?><span>.</span></h1>
					<hr />
					<p><?php echo esc_html( $description ); ?></p>
				</div>
			</div> <!-- end of section-head -->
		</div> <!-- end of wrapper-section-heading -->
	<?php 

	$result .= ob_get_clean();
	return $result;

} //End pm_section_heading 


/*
    ======================================
        PUREMEDIA PORTFOLIO SHORTCODE
    ======================================
*/

function pm_portfolio_shortcode(  $atts, $content = null) {
	extract(shortcode_atts(array(
			'number_of_portfolio'	=> '',
			'class'	=> '',
	), $atts));

	$result = '';

	ob_start(); 

	// Assigning a master css class and hooking into KC
	$master_class = apply_filters( 'kc-el-class', $atts );
	$master_class[] = 'pm_portfolio';

	// Retrieving user define classes
	$classes = array( 'row items' );
	(!empty($class)) ? $classes[] = $class : ''; ?>

		<div id="portfolio" class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
			<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
				<div class="twelve columns">
					<div id="portfolio-wrapper" class="bgrid-fourth s-bgrid-third mob-bgrid-half group">
					<?php 
						//start wp query..
						$args = array(
							'post_type'			=> 'portfolio',
							'orderby'			=> 'date',
							'order'				=> 'DESC',
							'posts_per_page'	=> $number_of_portfolio
							);
						$data = new WP_Query( $args );
						//Check post
						if( $data->have_posts() ) :
							//startloop here..
							while( $data->have_posts() ) : $data->the_post();

							$term_list = wp_get_post_terms( get_the_ID(), 'field' );  
							global $post;
				            $image      = wp_prepare_attachment_for_js( get_post_thumbnail_id( $post->ID ) );
				            $image_alt  = ( !empty( $image['alt'] ) ) ? 'alt="' . esc_attr( $image['alt'] ) . '"' : 'alt="' .get_the_title() . '"';

						?>
						<div class="bgrid item">
							<div class="item-wrap">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php esc_url( the_post_thumbnail_url('portfolio-small-thum') ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
									<div class="overlay"></div>                       
									<div class="portfolio-item-meta">
										<h5><?php echo the_title(); ?></h5>
										<p><?php foreach ($term_list as $sterm) { echo $sterm->name.' '; } ?></p>
									</div>                         
								</a>
							</div>
						</div> <!-- /item -->
						<?php 
							endwhile;
						endif;
						wp_reset_postdata();
						?>
					</div> <!-- /portfolio-wrapper -->
				</div> <!-- /twelve -->
			</div>  <!-- /row -->    
		</div> <!-- /Portfolio -->

	<?php 
	$result .= ob_get_clean();
	return $result;

} //End pm_portfolio 


/*
    ======================================
        PUREMEDIA SERVICES SHORTCODE
    ======================================
*/

function pm_services_box_shortcode(  $atts, $content = null) {
	extract(shortcode_atts(array(
		'service_title'	=> '',
		'service_desc'	=> '',
		'services_icon'	=> '',
		'class'			=> '',
	), $atts));

	$result = '';

	ob_start(); 

	// Assigning a master css class and hooking into KC
	$master_class = apply_filters( 'kc-el-class', $atts );
	$master_class[] = 'pm-service';

	// Retrieving user define classes
	$classes = array( 'row' );
	(!empty($class)) ? $classes[] = $class : ''; ?>

	<div class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
      <div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	      	<div class="service-list bgrid-third s-bgrid-half mob-bgrid-whole">
	      		<div class="pm-bgrid">
	               <div class="icon-part">
	               	<span class="<?php echo esc_attr( $services_icon ); ?>"></span>
	               </div>
	               <h3><?php echo esc_html( $service_title ); ?></h3>
	               <div class="service-content">	                  
		               <p> <?php echo esc_html( $service_desc ); ?> </p> 
	               </div>      
	            </div> <!-- /bgrid -->   
	      	</div> <!-- /service-list -->
      </div> <!-- /row -->      
   </div> <!-- /services -->  		

	<?php 
	$result .= ob_get_clean();
	return $result;

} //End pm_services_box 


/*
    ======================================
        PUREMEDIA ABOUT BOX SHORTCODE
    ======================================
*/

function pm_about_box_shortcode(  $atts, $content = null) {
	extract(shortcode_atts(array(
		'about_title'	=> '',
		'about_desc'	=> '',
		'position'		=> '',
		'class'			=> '',
	), $atts));

	$result = '';

	ob_start(); 

	// Assigning a master css class and hooking into KC
	$master_class = apply_filters( 'kc-el-class', $atts );
	$master_class[] = 'pm-aboutbox';

	// Retrieving user define classes
	$classes = array( 'row about-content' );
	(!empty($class)) ? $classes[] = $class : ''; ?>
	<div class="<?php echo esc_attr( implode(' ', $master_class) ); ?>">
		<div class="<?php echo esc_attr( implode(' ', $classes) ); ?>">
			<div class="mob-whole columns <?php echo esc_attr( $position ); ?>">

				<h3><?php echo esc_html( $about_title ); ?></h3>	

				<p><?php echo esc_html( $about_desc ); ?>	</p>

			</div> <!-- /left -->
		</div>
	</div>
	<?php 
	$result .= ob_get_clean();
	return $result;

} //End pm_about_box 


/*
    ======================================
        PUREMEDIA TEAM SHORTCODE
    ======================================
*/

function pm_team_shortcode(  $atts, $content = null) {
	extract(shortcode_atts(array(
		'member_name'	 => '',
		'designation'	 => '',
		'member_image'	 => '',
		'member_desc'	 => '',
		'image_alt'	 => '',
		'team_fb' => '',
		'team_tr' => '',
		'team_gp' => '',
		'team_ld' => '',
		'team_sk' => '',
		'class'	 => '',
	), $atts));

	$result = '';

	ob_start(); 

	// Assigning a master css class and hooking into KC
	$master_class = apply_filters( 'kc-el-class', $atts );
	$master_class[] = 'pm-team';

	// Retrieving user define classes
	$classes = array( 'mob-bgrid-whole group' );
	(!empty($class)) ? $classes[] = $class : ''; ?>

	<div class="<?php echo esc_attr( implode( ' ', $master_class ) ); ?>">
		<div id="team-wrapper" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<div class="bgrid member">
				<div class="member-header">
					<div class="member-pic">
						<img src="<?php echo esc_url( $member_image ); ?>" alt="<?php if( !empty( $image_alt ) ): echo esc_html( $image_alt ); else: echo esc_html( $member_name ); endif; ?>"/>                        	                       	
					</div>
					<div class="member-name">
						<h3> <?php echo esc_html( $member_name ); ?> </h3>
						<span> <?php echo esc_html( $designation ); ?> </span>
					</div>
				</div>							
				<div><?php echo esc_html( $member_desc ); ?></div> 
				<ul class="member-social">
					<?php 
					if( ! empty( $team_fb ) ) : ?>
					<li><a href="<?php echo esc_url( $team_fb ); ?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif; //End fb
					if( ! empty( $team_tr ) ) : ?>	
					<li><a href="<?php echo esc_url( $team_tr ); ?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif; //End tr

					if( ! empty( $team_gp ) ) : ?>	
					<li><a href="<?php echo esc_url( $team_gp ); ?>"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; //End tr

					if( ! empty( $team_ld ) ) : ?>	
					<li><a href="<?php echo esc_url( $team_ld ); ?>"><i class="fa fa-linkedin"></i></a></li>
					<?php endif; //End tr

					if( ! empty( $team_sk ) ) : ?>	
					<li><a href="<?php echo esc_url( $team_sk ); ?>"><i class="fa fa-skype"></i></a></li>
				<?php endif; ?>	
			</ul>
		</div> <!-- /member -->
	</div> <!-- /team-wrapper -->
</div> <!-- /pm-team -->
	<?php 
	$result .= ob_get_clean();
	return $result;

} //End pm_team


/*
    ======================================
        PUREMEDIA BLOG SHORTCODE
    ======================================
*/

function pm_blog_shortcode(  $atts, $content = null) {
	extract(shortcode_atts(array(
		'number_of_post' => '',
		'exclude' 		 => '',
		'class'			 => '',
	), $atts));

	$result = '';

	ob_start(); 

	// Assigning a master css class and hooking into KC
	$master_class = apply_filters( 'kc-el-class', $atts );
	$master_class[] = 'pm-team';

	// Retrieving user define classes
	$classes = array( 'row about-content' );
	(!empty($class)) ? $classes[] = $class : ''; ?>
	<div id="journal">
		<div class="row">
			<div class="twelve columns">
				<div id="blog-wrapper" class="bgrid-third s-bgrid-half mob-bgrid-whole group">
					<?php 
					$cat_exclude = str_replace(',', ' ', $exclude);
					$cat_excludes = explode( " ", $cat_exclude );
					//start query..
					$args = array(
						'post_type'				=> 'post',
						'posts_per_page'		=> $number_of_post,
						'post_status'			=> 'publish',
						'order'					=> 'DESC',
						'category__not_in' 		=> $cat_excludes
					);

					$count_posts = wp_count_posts();
					$published_posts = $count_posts->publish;

					$data = new WP_Query( $args );

					if( $data->have_posts() ) :
						while( $data->have_posts() ) : $data->the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'bgrid' ); ?>>
							<h5> <?php the_time('F d, Y'); ?></h5>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<p><?php echo wp_trim_words( get_the_excerpt(), 37 ); ?></p>
						</article>  

				<?php 
						endwhile;
					endif;
					wp_reset_postdata();	
				 ?>
				</div> <!-- /blog-wrapper -->
				<?php if( $published_posts > $number_of_post ) : ?>
					<p class="position-y"><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="button orange">View More</a></p>
				<?php endif; ?>
			</div> <!-- /twelve -->
		</div> <!-- /row -->
	</div> <!-- /blog -->
	<?php 
	$result .= ob_get_clean();
	return $result;

} //End pm_blog


/*
    ======================================
        PUREMEDIA CONTACT FORM SHORTCODE
    ======================================
*/

function pm_contact_form_shortcode(  $atts, $content = null) {
	extract(shortcode_atts(array(
		'show_form_id'	=> '',
		'class'			=> '',
	), $atts));

	$result = '';

	ob_start(); 

	// Assigning a master css class and hooking into KC
	$master_class = apply_filters( 'kc-el-class', $atts );
	$master_class[] = 'pm-team';

	// Retrieving user define classes
	$classes = array( 'row about-content' );
	(!empty($class)) ? $classes[] = $class : ''; ?>

	<div id="contact">
		<div class="row form-section">
			<div id="contact-form" class="twelve columns">
				<!-- <form name="contactForm" id="contactForm" method="post" action="">	 -->
					<?php echo do_shortcode( '[contact-form-7 id="'. $show_form_id .'" title=""]' ); ?>
				<!-- </form> /contactForm -->

				<!-- message box -->
				<div id="message-warning"></div>
				<div id="message-success">
					<i class="fa fa-check"></i>Your message was sent, thank you!<br />
				</div>

			</div> <!-- /contact-form -->      	
		</div> <!-- /form-section -->     
	</div>  <!-- /contact-->

	<?php 
	$result .= ob_get_clean();
	return $result;

} //End pm_blog