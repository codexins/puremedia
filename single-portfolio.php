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

	<section id="content">

		<div class="row portfolio-content">
			<div class="entry tab-whole nine columns centered">
				<?php 
	 				while( have_posts() ) : the_post();
	 					get_template_part( 'template-parts/content', 'portfolio-single' );
	 				endwhile;
	 			 ?>

			</div> <!-- /entry -->	      
		</div> <!-- /portfolio-content -->


		<div class="row more-projects">

			<h1>More Projects.</h1> 

			<div class="tab-whole nine columns centered">

				<div id="portfolio-wrapper" class="bgrid-half tab-bgrid-halfgroup">
				<?php 
						//start wp query..
						$args = array(
							'post_type'			=> 'portfolio',
							'orderby'			=> 'date',
							'order'				=> 'DESC',
							'posts_per_page'	=> 4,
							'post__not_in' => array ( $post->ID ),
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

								<a href="#">
									<img src="<?php esc_url( the_post_thumbnail_url() ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">                      
									<div class="overlay">
										<div class="portfolio-item-meta">
											<h5><?php the_title(); ?></h5>
											<p><?php foreach ($term_list as $sterm) { echo $sterm->name.' '; } ?></p>
										</div>
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

			</div> <!-- /nine -->

		</div> <!-- /more-projects --> 

	</section> <!-- /content -->

<?php get_footer(); ?>
