<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package simplex-munk
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		  <article class="post not-found">
				<div class="text">
					<h1><?php esc_html_e( '404', 'simplex-munk' ); ?></h1>
					<h2><?php esc_html_e( 'The requested page cannot be found', 'simplex-munk' ); ?></h2>
					<p><?php esc_html_e( 'Can\'t find what you need? Take a moment and do a search below or start from our', 'simplex-munk' ); ?> <a class = "home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'simplex-munk' ); ?></a></p>
					<?php get_search_form(); ?>

				</div>
		  </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
