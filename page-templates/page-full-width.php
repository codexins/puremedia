<?php
/**
 * Template Name: Page - Full Width 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package codexin
 */

get_header(); ?>

	<div class="main-content-wrapper">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'page' );

		endwhile;
		endif; ?>
	</div> <!-- end of #content -->

<?php get_footer(); ?>
