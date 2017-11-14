<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simplex-munk
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

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
