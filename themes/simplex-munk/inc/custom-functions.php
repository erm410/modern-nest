<?php
/**
 * Custom theme specific functions for this theme.
 *
 * @package simplex-munk
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function simplex_munk_body_classes( $classes ) {
  
	if ( ! is_active_sidebar( 'right-sidebar' ) ) {	
		$classes[] = 'full-width';
	}    
		
	else {
		$classes[] = '';
	}

	return $classes;
}
add_filter( 'body_class', 'simplex_munk_body_classes' );

/**
 * Footer Credits 
*/
function simplex_munk_footer_credit(){
    
    $text  = '<span class="copyright">';
    $text .=  esc_html__( 'Copyright &copy; ', 'simplex-munk' ) . date_i18n( 'Y' ); 
    $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
    $text .= '</span><span class="site-info">';
    $text .= '<a href="' . esc_url( 'http://thememunk.com/theme/simplex-munk/' ) .'" rel="author" target="_blank">' . esc_html__( 'Theme Simplex Munk by ThemeMunk', 'simplex-munk' ) .'</a>. ';
    $text .= sprintf( esc_html__( 'Powered by %s', 'simplex-munk' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'simplex-munk' ) ) .'" target="_blank">WordPress</a>.' );
    $text .= '</span>';
    
    echo apply_filters( 'simplex_munk_footer_text', $text );    
}
add_action( 'simplex_munk_footer', 'simplex_munk_footer_credit' );

/**
 * Function to exclude sticky post from main query
*/
function simplex_munk_exclude_sticky_post( $query ){

    $stickies = get_option( 'sticky_posts' );     //get all sticky posts
	rsort( $stickies ); /* Sort the stickies with the newest ones at the top */		
	$featured_stickies = array_slice($stickies, 0, 2);     //slice the array to only store first two stickies

    if ( ! is_admin() && $query->is_home() && $query->is_main_query() && get_theme_mod( 'simplex_ed_feature_image' ) && $featured_stickies ) {
        $query->set( 'post__not_in',  $featured_stickies );
    }    
}
add_filter( 'pre_get_posts', 'simplex_munk_exclude_sticky_post' );