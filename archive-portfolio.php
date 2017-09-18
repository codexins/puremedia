	<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package codexin
	 */

 get_header(); ?>

	<!-- Content
 	================================================== -->
	 <section id="content">
	 	<div class="row">
	 		<div id="main" class="tab-whole eight columns entries">
	 			<?php 
				//start wp query..
	 			$args = array(
	 				'post_type'			=> 'portfolio',
	 				'orderby'			=> 'date',
	 				'order'				=> 'DESC',
	 				'posts_per_page'	=> -1
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

	 				get_template_part( 'template-parts/content', 'portfolio' );

					endwhile;
				endif;
				wp_reset_postdata();
				?>

	 			<?php 
	 			$prev_link = get_previous_posts_link(__('Previous'));
	 			$next_link = get_next_posts_link(__('Next'));

	 			?>
	 			<div class="pagenav group">
	 				<?php if( $prev_link ): ?>
	 					<span class="prev"><a href="#" rel="prev"><?php echo $prev_link; ?></a></span>
	 				<?php endif; ?>
	 				<?php if( $next_link ): ?>	
	 					<span class="next"><a href="#" rel="next"><?php echo $next_link; ?></a></span>
	 				<?php endif; ?>
	 			</div> 

	 		<?php else :

	 		get_template_part( 'template-parts/content', 'none' );

	 		endif; ?>

	 	</div> <!-- /main -->  

	 	<div class="tab-whole four columns end" id="secondary">
	 		<aside id="sidebar">
	 			<?php get_sidebar(); ?>
	 		</aside> <!-- /sidebar -->
	 	</div> <!-- /secondary -->

	 </div> <!-- /row -->      
	</section> <!-- /content -->

<?php get_footer(); ?>
