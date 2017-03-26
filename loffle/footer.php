<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fora
 */

?>

		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="main_footer">
				<?php $socialFooter = get_theme_mod('fora_theme_options_socialfooter', ''); ?>
				<?php if($socialFooter == 1): ?>
					<div class="site-social-footer">
						<?php fora_social_buttons(); ?>
					</div><!-- .site-social -->
				<?php endif; ?>
				<div class="site-info">
					&copy; Amanda Mitchell 2017
				</div><!-- .site-info -->
			</div><!-- .main_footer -->
		</footer><!-- #colophon -->
	</div><!-- #content -->
</div><!-- #page -->
<a href="#top" id="toTop"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>

</body>
</html>
