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

<!-- Drip -->
<script type="text/javascript">
  var _dcq = _dcq || [];
  var _dcs = _dcs || {};
  _dcs.account = '2388298';

  (function() {
    var dc = document.createElement('script');
    dc.type = 'text/javascript'; dc.async = true;
    dc.src = '//tag.getdrip.com/2388298.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(dc, s);
  })();
</script>

</body>
</html>
