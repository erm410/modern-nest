<?php

function loffle_scripts() {
	wp_enqueue_script( 'loffle-custom', get_theme_root_uri() . '/loffle/loffle.js', array('jquery', 'jquery'), '1.0', true );
	$query_args = array(
		'family' => 'Dancing%20Script:400,700%7COpen%20Sans:400,700'
	);
	wp_register_style( 'fora-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
add_action( 'wp_enqueue_scripts', 'loffle_scripts' );

// function contact_post() {
//
//
// }
// add_action('admin_post_contact_post', 'contact_post');
// add_action('admin_post_nopriv_contact_post', 'contact_post');
