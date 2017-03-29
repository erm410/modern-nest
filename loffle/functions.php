<?php

require_once('Mail.php');


function loffle_scripts() {
	wp_enqueue_script( 'loffle-custom', get_theme_root_uri() . '/loffle/loffle.js', array('jquery', 'jquery'), '1.0', true );
	$query_args = array(
		'family' => 'Dancing%20Script:400,700%7COpen%20Sans:400,700'
	);
	wp_register_style( 'loffle-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'loffle-googlefonts' );
	wp_enqueue_script( 'loffle-recaptcha', "https://www.google.com/recaptcha/api.js", array(), null, true);
}
add_action( 'wp_enqueue_scripts', 'loffle_scripts' );

function contact_post() {

	$email = $_POST['email'];
	$name = $_POST['name'];
	$site = $_POST['site'];
	$message = $_POST['message'];

	$hsAddress = '<homemakersynonymous@gmail.com>';
	$smtp = Mail::factory(
	'smtp',
		array(
			'host' => 'email-smtp.us-west-2.amazonaws.com',
			'port' => '587',
			'auth' => true,
			'username'=> getenv("SES_USER"),
			'password'=> getenv("SES_SECRET")
		)
	);
	$mail = $smtp->send(
		$hsAddress,
		array(
			'From' => "Homesyn Contact Form $hsAddress",
			'To'=> $hsAddress,
			'Subject' => "Contact from $name ($email)",
			'Reply-To'=> $email
		),
		"Name: $name\r\nEmail: $email\r\nSite: $site\r\n\r\n$message"
	);

	if (PEAR::isError($mail)) {
		status_header(500);
		echo($mail->getMessage());
	}
	wp_die();

}
add_action('wp_ajax_contact_post', 'contact_post');
add_action('wp_ajax_nopriv_contact_post', 'contact_post');
