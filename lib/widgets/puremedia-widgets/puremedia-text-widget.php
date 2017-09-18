<?php

/*
	============================================
		CODEXIN ADDRESS BOX WIDGET CLASS
	============================================
*/

class Puremedia_Text_Widget extends WP_Widget {
	
	// Setup the widget name, description, etc...
	public function __construct() {
		
		// Initializing the basic parameters
		$widget_ops = array(
			'classname' 	=> 'permedia-text-widget',
			'description' 	=> esc_html__('Display Text', 'codexin'),
		);
		parent::__construct( 'pm_text_box', esc_html__('Puremedia: Text Box', 'codexin'), $widget_ops );
		
	}
	
	// Back-end display of widget
	public function form( $instance ) {

		// Assigning or updating the values
		$title 				= ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
		$small_description 	= ( !empty( $instance[ 'small_description' ] ) ? $instance[ 'small_description' ]: '' );

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'codexin') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" placeholder="<?php echo esc_html__('Ex: Widget Text', 'codexin') ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'small_description' ) ); ?>"><?php echo esc_html__('Small Description: ', 'codexin') ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'small_description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'small_description' ) ); ?>" value="<?php echo esc_attr( $small_description ); ?>" rows="3" placeholder="Small Description Here"> <?php echo esc_attr( $small_description ); ?> </textarea>
		</p>

		

<?php
		
	}

	// Updating the widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		// Updating to the latest values
		$instance[ 'title' ] 				= ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'small_description' ]	= ( !empty( $new_instance[ 'small_description' ] ) ? strip_tags( $new_instance[ 'small_description' ] ) : '' );
		
		return $instance;
		
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {

		// Retrieving the updated values
		$title	= $instance[ 'title' ];
		$small_description 	= $instance[ 'small_description' ];

		printf( '%s', $args[ 'before_widget' ] ); 

		?>
		<div class="widget widget_text">
		<?php if( !empty($title)): ?>
			<h5 class="widget-title"><?php echo esc_html( $title); ?></h5>
		<?php endif; ?>
			<?php if( !empty( $small_description ) ): ?>
			<div class="textwidget">
				<?php echo esc_html( $small_description ); ?> 
			</div>
			<?php endif; ?>
		</div>
		
		<?php
		printf( '%s', $args[ 'after_widget' ] );

	}
	
}

// Registering the widget
add_action( 'widgets_init', function() {
	register_widget( 'Puremedia_Text_Widget' );
} );
