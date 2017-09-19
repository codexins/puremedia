<?php

/*
	============================================
		LATEST PHOTO WIDGET CLASS
	============================================
*/

class Puremedia_Latest_Photo_Widget extends WP_Widget {
	
	// Setup the widget name, description, etc...
	public function __construct() {
		
		// Initializing the basic parameters
		$widget_ops = array(
			'classname' 	=> 'puremedia-latest-photo-widget',
			'description' 	=> esc_html__('Display Latest Post Images', 'codexin'),
		);
		parent::__construct( 'pm_latest_photo', esc_html__('Puremedia: Latest Post-Images', 'codexin'), $widget_ops );
		
	}
	
	// Back-end display of widget
	public function form( $instance ) {

		// Assigning or updating the values
		$title 				= ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'codexin') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" placeholder="<?php echo esc_html__('Ex: Latest Photo', 'codexin') ?>">
		</p>
		

<?php
		
	}

	// Updating the widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		// Updating to the latest values
		$instance[ 'title' ] 	= ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		
		return $instance;
		
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {

		// Retrieving the updated values
		$title	= $instance[ 'title' ];

		printf( '%s', $args[ 'before_widget' ] ); 

		?>
		<div class="widget widget_photostream">

		<h5><?php $getTile = (!empty($title)) ? $title : ''; echo $getTile; ?></h5>
			<ul class="photostream group">
				<?php 
					$args = array(
						'post_type'				=> 'post',
						'posts_per_page'		=> -1,
						'post_status'			=> 'publish',
						'order'					=> 'DESC',
					);

					$data = new WP_Query( $args );

					if( $data->have_posts() ) :
						while( $data->have_posts() ) : $data->the_post(); ?>
							<li><a href="<?php the_permalink(); ?>">
							<img alt="thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>"></a></li>
				<?php 
					endwhile;
				endif;
				wp_reset_postdata(); ?>
			</ul>

		</div> <!-- /widget_photostream -->
		
		<?php
		printf( '%s', $args[ 'after_widget' ] );

	}
	
}

// Registering the widget
add_action( 'widgets_init', function() {
	register_widget( 'Puremedia_Latest_Photo_Widget' );
} );
