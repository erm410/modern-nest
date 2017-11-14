<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simplex-munk
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	
    		<?php if ( have_posts() ) :  ?>
	
    		<div class="page-header">
				<?php 
					the_archive_title( '<h1 class="page-title">', '</h1>' ); 			
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );			
				?>
                
                
			</div><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include content.php from template-parts folder
				 * If you want to override this in a child theme, then include a file
				 * called content.php in your template-parts folder and that will be used instead.
				 */
				get_template_part( 'template-parts/content' );

			endwhile;

			 the_posts_pagination( array(
		    'mid_size' => 3,
		    'prev_text' => __( '&laquo;', 'simplex-munk' ),
		    'next_text' => __( '&raquo;', 'simplex-munk' ),
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
