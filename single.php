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
    <div class="row">
        <div id="main" class="tab-whole eight columns entries">
             <?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						//Get Pageination link for posts
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

					<?php	// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
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
