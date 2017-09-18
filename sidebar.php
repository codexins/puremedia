<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package codexin
 */
?>

<?php


if( is_page() && is_page(26) && is_active_sidebar('codexin-sidebar-contact-page') ) :

	dynamic_sidebar('codexin-sidebar-contact-page');

elseif ( is_page() && is_page_template('page-templates/page-contact.php') && is_active_sidebar('codexin-sidebar-contact-template') ) :

	dynamic_sidebar('codexin-sidebar-contact-template');

elseif ( is_page() && is_active_sidebar('codexin-sidebar-page') ) :

	dynamic_sidebar('codexin-sidebar-page');

elseif ( is_single() && is_active_sidebar('codexin-sidebar-blog') ) : 

	dynamic_sidebar('codexin-sidebar-blog');

elseif ( is_home() && is_active_sidebar('codexin-sidebar-blog') ) : 

	dynamic_sidebar('codexin-sidebar-blog');

else: 

	dynamic_sidebar('codexin-sidebar-general');

endif;


?>
