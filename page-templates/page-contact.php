<?php
/**
 * Template Name: Page - Contact
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

						get_template_part( 'template-parts/content', 'contact' );

					endwhile; ?>

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
