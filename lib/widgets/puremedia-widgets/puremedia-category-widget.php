<?php

/*
	============================================
		CODEXIN ADDRESS BOX WIDGET CLASS
	============================================
*/

class Puremedia_Category_Widget extends WP_Widget {
	
	// Setup the widget name, description, etc...
	public function __construct() {
		
		// Initializing the basic parameters
		$widget_ops = array(
			'classname' 	=> 'permedia-category-widget',
			'description' 	=> esc_html__('Display Category', 'codexin'),
		);
		parent::__construct( 'pm_category', esc_html__('Puremedia: Category Widget', 'codexin'), $widget_ops );
		
	}
	
	// Back-end display of widget
	public function form( $instance ) {

		// Assigning or updating the values
		$title	= ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__('Title:', 'codexin') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" placeholder="<?php echo esc_html__('Ex: Category', 'codexin') ?>">
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

		<div class="widget widget_categories">
		<?php if( !empty( $title) ): ?>	
			<h5 class="widget-title"><?php echo esc_html( $title ); ?></h5>
		<?php endif; ?>	
			<ul class="link-list group">
				<?php 
				$texonomy = get_categories(); 
				foreach ( $texonomy as $term ) : 
				$tagUrl = get_term_link($term->term_id);
				echo '<li><a href="'. $tagUrl .'">' . $term->name . '</a></li>';
				endforeach; 
				?>
			</ul>

		</div> <!-- /widget_categories -->
		
		<?php
		printf( '%s', $args[ 'after_widget' ] );

	}
	
}

// Registering the widget
add_action( 'widgets_init', function() {
	register_widget( 'Puremedia_Category_Widget' );
} );
