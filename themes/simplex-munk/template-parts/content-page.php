<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simplex-munk
 */
$body_classes = get_body_class();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->


	<?php if (has_post_thumbnail()) { ?>
       <a href="<?php the_permalink(); ?>" class="post-thumbnail">
            <?php
            if ( is_active_sidebar( 'right-sidebar' ) && ! in_array('full-width', $body_classes)  ) {
            $imgsize = "simplex-munk-with-sidebar";
            }
            else {
            $imgsize = "simplex-munk-without-sidebar";	
            }
            the_post_thumbnail( $imgsize );
            ?>
        </a>         
    <?php } ?> 

	<div class="entry-content">    
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simplex-munk' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'simplex-munk' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->