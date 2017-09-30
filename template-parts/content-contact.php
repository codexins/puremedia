<?php
/**
 * Template part for displaying contact-page content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package codexin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_content();  ?>
</article><!-- #post-## -->