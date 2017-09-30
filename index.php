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
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

					endwhile; ?>
			
					<?php 
						$prev_link = get_previous_posts_link(__('Previous', 'puremedia'));
						$next_link = get_next_posts_link(__('Next', 'puremedia'));

					 ?>
					 <div class="pagenav group">
					 <?php if( $prev_link ): ?>
					 	<span class="prev">
					 	<?php echo $prev_link; ?></span>
					 <?php endif; ?>
					 <?php if( $next_link ): ?>	
					 	<span class="next">
					 	<?php echo $next_link; ?></span>
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
