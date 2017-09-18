<?php

/*
	============================================
		CODEXIN ADDRESS BOX WIDGET CLASS
	============================================
*/

class Puremedia_Tag_Widget extends WP_Widget {
	
	// Setup the widget name, description, etc...
	public function __construct() {
		
		// Initializing the basic parameters
		$widget_ops = array(
			'classname' 	=> 'permedia-Tag-widget',
			'description' 	=> esc_html__('Display Tags', 'codexin'),
		);
		parent::__construct( 'pm_tag', esc_html__('Puremedia: Tags Widget', 'codexin'), $widget_ops );
		
	}
	
	// Back-end display of widget
	public function form( $instance ) {

		// Assigning or updating the values
		$title	= ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'codexin') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" placeholder="<?php echo esc_html__('Ex: Tags', 'codexin') ?>">
		</p>


<?php
		
	}

	// Updating the widget
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		// Updating to the latest values
		$instance[ 'title' ]	= ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		
		return $instance;
		
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {
		// Retrieving the updated values
		$title	= $instance[ 'title' ];

		printf( '%s', $args[ 'before_widget' ] ); ?>

		<div class="widget widget_tag_cloud group">
		<?php if( !empty( $title) ): ?>	
			<h5 class="widget-title"><?php echo esc_html( $title ); ?></h5>
		<?php endif; ?>	
			<div class="tagcloud group">
				<?php 
				$texonomy = get_tags();  
				foreach ( $texonomy as $term ) : 
					$tagUrl = get_tag_link($term->term_id);
					echo '<a href="'. $tagUrl .'">' . $term->name . '</a>';
				endforeach; 
				?>
			</div>

		</div> <!-- /widget_categories -->
		
		<?php
		printf( '%s', $args[ 'after_widget' ] );

	}
	
}

// Registering the widget
add_action( 'widgets_init', function() {
	register_widget( 'Puremedia_Tag_Widget' );
} );
