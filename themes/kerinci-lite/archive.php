<?php get_header(); ?>
<div class="row">
	<div id="content-wrapper" class="wrapper col-md-8 clearfix">



	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); 
		
			get_template_part( 'inc/format/content', get_post_format() );

		endwhile; // end of the loop. ?>


<?php kerinci_lite_content_nav( 'nav-below' ); ?>



	<?php else : ?>
			<?php get_template_part( 'inc/format/content', 'no-result' ); ?>
			</div><!-- wrapper -->
	<?php endif; ?>

	</div><!-- wrapper -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>