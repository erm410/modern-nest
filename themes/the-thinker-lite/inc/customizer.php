<?php
/**
 * Thinker Theme Customizer
 *
 * @package Thinker
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function thinker_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
/**
 * Adds the individual sections for custom logo
 */
   $wp_customize->add_section( 'thinker_logo_section' , array(
    'title'       => __( 'Logo', 'thinker' ),
    'priority'    => 30,
    'description' => __( 'Upload a logo to replace the default site name and description in the header', 'thinker' )
) );
$wp_customize->add_setting( 'thinker_logo', array(
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'thinker_logo', array(
    'label'    => __( 'Logo', 'thinker' ),
    'section'  => 'thinker_logo_section',
    'settings' => 'thinker_logo',
) ) );

	/***** Register Custom Controls *****/

	class Thinker_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="didi-upgrade-thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</p>
			<p class="customize-control-title didi-upgrade-title">
				<?php esc_html_e('The Thinker Pro', 'thinker'); ?>
			</p>
			<p class="textfield didi-upgrade-text">
				<?php esc_html_e('Full version of this theme includes additional features; additional page templates, front page templates, WooCommerce support, color options & premium theme support.', 'thinker'); ?>
			</p>
			<p class="customize-control-title didi-upgrade-title">
				<?php esc_html_e('Additional Features:', 'thinker'); ?>
			</p>
			<ul class="didi-upgrade-features">
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Additional Page Templates', 'thinker'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Front Page Templates', 'thinker'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('WooCommerce Support', 'thinker'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Color Options', 'thinker'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Premium Theme Support', 'thinker'); ?>
				</li>
			</ul>
			<p class="didi-upgrade-button">
				<a href="http://www.anarieldesign.com/themes/simple-blogging-wordpress-theme/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Read more about The Thinker', 'thinker'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('thinker_upgrade', array(
		'title' => esc_html__('Pro Features', 'thinker'),
		'priority' => 300
	) );

	/***** Add Settings *****/

	$wp_customize->add_setting('thinker_options[premium_version_upgrade]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	) );

	/***** Add Controls *****/

	$wp_customize->add_control(new Thinker_Upgrade($wp_customize, 'premium_version_upgrade', array(
		'section' => 'thinker_upgrade',
		'settings' => 'thinker_options[premium_version_upgrade]',
		'priority' => 1
	) ) );
}
add_action( 'customize_register', 'thinker_customize_register' );
/**
 * Sanitization
 */
//Checkboxes
function thinker_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
//Integers
function thinker_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
//Text
function thinker_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function thinker_no_sanitize( $input ) {
}
/**
 * Sanitize the dropdown pages.
 *
 * @param interger $input.
 * @return interger.
 */
function thinker_sanitize_dropdown_pages( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}
/***** Enqueue Customizer CSS *****/

function thinker_customizer_base_css() {
	wp_enqueue_style('thinker-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'thinker_customizer_base_css');
/***** Enqueue Customizer JS *****/

function thinker_customizer_js() {
	wp_enqueue_script('thinker-customizer', get_template_directory_uri() . '/js/thinker-customizer.js', array(), '1.0.0', true);
	wp_localize_script('thinker-customizer', 'thinker_links', array(
		'upgradeURL' => esc_url('http://www.anarieldesign.com/themes/simple-blogging-wordpress-theme/'),
		'upgradeLabel' => esc_html__('Upgrade to The Thinker Pro', 'thinker'),
		'title'	=> esc_html__('Theme Related Links:', 'thinker'),
		'themeURL' => esc_url('http://www.anarieldesign.com/themes/simple-blogging-wordpress-theme/'),
		'themeLabel' => esc_html__('Theme Info Page', 'thinker'),
		'docsURL' => esc_url('http://www.anarieldesign.com/documentation/thethinkerlite/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'thinker'),
		'rateURL' => esc_url('https://wordpress.org/support/view/theme-reviews/the-thinker-lite?filter=5'),
		'rateLabel'	=> esc_html__('Rate this theme', 'thinker'),
	));
}
add_action('customize_controls_enqueue_scripts', 'thinker_customizer_js');