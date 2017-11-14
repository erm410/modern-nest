<?php
/**
 * simplex-munk functions and definitions.
 *
 * Do not go gentle into that good night,
 * Old age should burn and rave at close of day;
 * Rage, rage against the dying of the light.
 *
 * Though wise men at their end know dark is right,
 * Because their words had forked no lightning they
 * Do not go gentle into that good night.
 *
 * Dylan Thomas, 1914 - 1953
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    simplex-munk
 * @subpackage Functions
 * @author     ThemeMunk <support@thememunk.com>
 * @copyright  Copyright (c) 2015 - 2016, ThemeMunk
 * @link       http://thememunk.com/theme/simplex-munk
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if ( ! function_exists( 'simplex_munk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simplex_munk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on simplex-munk, use a find and replace
	 * to change 'simplex-munk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'simplex-munk' );
	
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// add custmo logo support
	add_theme_support( 'custom-logo', array(
		'height'      => 70,
		'width'       => 375,
		'flex-width' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'simplex-munk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	$simplex_munk_args = array(
		'default-color' => 'f4f4f4',
		'default-image' => '',
	);
	add_theme_support( 'custom-background', $simplex_munk_args );		
	

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'simplex-munk-feature', 960, 505, true );
	    add_image_size( 'simplex-munk-with-sidebar', 845, 515, true );
	    add_image_size( 'simplex-munk-without-sidebar', 1150, 430, true );
}
endif;
add_action( 'after_setup_theme', 'simplex_munk_setup' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
if ( ! function_exists( 'simplex_munk_excerpt_more' ) && ! is_admin() ) :

function simplex_munk_excerpt_more() {
	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'simplex_munk_excerpt_more' );

endif;

/* Change Excerpt length */
if ( ! function_exists( 'simplex_munk_excerpt_length' ) && ! is_admin() ) :

function simplex_munk_excerpt_length( $length ) {
return 25;
}
add_filter( 'excerpt_length', 'simplex_munk_excerpt_length', 999 );

endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simplex_munk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simplex_munk_content_width', 670 );
}
add_action( 'after_setup_theme', 'simplex_munk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simplex_munk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'simplex-munk' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'simplex-munk' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'simplex-munk' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'simplex-munk' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simplex_munk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simplex_munk_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'jquery-meanmenu', get_template_directory_uri() . '/css/meanmenu.css' );
	wp_enqueue_style( 'simplex-munk-style', get_stylesheet_uri() );
	wp_enqueue_style( 'simplex-munk-responsive-style', get_template_directory_uri() . '/css/responsive.css' );	

	wp_enqueue_script( 'simplex-munk-js', get_template_directory_uri() . '/js/simplex-munk.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array('jquery'), true );
	wp_enqueue_script( 'simplex-munk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'simplex_munk_scripts' );

/**
 * Registers an editor stylesheet for the theme.
 */
function simplex_munk_theme_add_editor_styles() {
	add_editor_style( 'css/editor-style.css' );
}
add_action( 'admin_init', 'simplex_munk_theme_add_editor_styles' );


/**
 * Register custom fonts.
 */
function simplex_munk_fonts_url() {

	$fonts_url = '';
	
	/* Translators: If there are characters in your language that are not
	* supported by Source Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$source_sans = _x( 'on', 'Source Sans Pro: on or off', 'simplex-munk' );
	 
	/* Translators: If there are characters in your language that are not
	* supported by Source Serif, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$source_serif = _x( 'on', 'Source Serif Pro: on or off', 'simplex-munk' );
	 
	if ( 'off' !== $source_sans || 'off' !== $source_serif ) {
	$font_families = array();	
	 
	if ( 'off' !== $source_sans ) {
	$font_families[] = 'Source Sans Pro:300,400,600,700,900';
	}
	 
	if ( 'off' !== $source_serif ) {
	$font_families[] = 'Source Serif Pro:400,600,700';
	}
	 
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	 
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );
}

function simplex_munk_scripts_styles() {
	wp_enqueue_style( 'simplex-munk-fonts', simplex_munk_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'simplex_munk_scripts_styles' );


function simplex_munk_admin_scripts() {

	wp_enqueue_style( 'simplex-munk-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );    
    wp_enqueue_script( 'simplex-munk-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );    
	
}
add_action( 'customize_controls_enqueue_scripts', 'simplex_munk_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions for this theme.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Theme Info in Customizer
 */
require get_template_directory() . '/inc/info.php';