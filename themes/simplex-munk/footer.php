<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simplex-munk
 */

?>
</div><!-- #content -->
</div><!-- .container -->
	</div><!-- .row -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <?php if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ){ ?>
      		<div class="widget-area">
						<div class="container">
							<div class="row">
								<?php
                       	echo '<div class="col">';
	                        if( is_active_sidebar( 'footer-one') ) dynamic_sidebar( 'footer-one' );
                       	echo '</div>';

                       	echo '<div class="col">';
	                        if( is_active_sidebar( 'footer-two') ) dynamic_sidebar( 'footer-two' );
                       	echo '</div>';

                       	echo '<div class="col">';
    	                    if( is_active_sidebar( 'footer-three') ) dynamic_sidebar( 'footer-three' );
                       	echo '</div>';												
                    ?>
									</div>
								</div>
							</div>
        <?php } ?>
		<div class="site-info">
				<?php do_action( 'simplex_munk_footer' ); ?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
