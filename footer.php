<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package codexin
 */

?>

<?php global $codexin; ?>
<!-- Footer
   ================================================== -->
   <footer>
   		<div class="row">       
	   		<div class="six columns tab-whole footer-about">
	   			<?php if ( is_active_sidebar('codexin-footer-left') ) dynamic_sidebar('codexin-footer-left') ?>      
	   		</div> <!-- /footer-about -->
			<div class="six columns tab-whole right-cols">
				<div class="row">
					<div class="columns">
						<?php if ( is_active_sidebar('codexin-footer-center') ) dynamic_sidebar('codexin-footer-center') ?> 
					</div> <!-- /columns -->             
					<div class="columns last">
						<?php if ( is_active_sidebar('codexin-footer-right') ) dynamic_sidebar('codexin-footer-right') ?>
					</div> <!-- /columns --> 
				</div> <!-- /Row(nested) -->
			</div>
			<p class="copyright"> 
				<?php if( ! empty( $codexin['pm-copyright'] ) ) : echo $codexin['pm-copyright']; endif; ?> 
			</p>        
			<div id="go-top">
				<a class="smoothscroll" title="Back to Top" href="#main-header"><span>Top</span><i class="fa fa-long-arrow-up"></i></a>
			</div>
		</div> <!-- /row -->
   	</footer> <!-- /footer -->
   	<?php wp_footer(); ?>

   	</body>
   </html>
