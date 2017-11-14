<?php
/**
 * simplex Theme Customizer.
 *
 * @package simplex-munk
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simplex_munk_customize_register( $wp_customize ) {	
    
    /** Feature Image Settings */
    $wp_customize->add_section(
        'simplex_feature_image_settings',
        array(
            'title' => esc_html__( 'Feature Image Settings', 'simplex-munk' ),
            'description' => esc_html__( 'Please mark your posts as "sticky" to show in featured section. Your theme supports up to 2 posts in its featured content area.', 'simplex-munk' ),			
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Feature Image */
    $wp_customize->add_setting(
        'simplex_ed_feature_image',
        array(
            'default' => '',
            'sanitize_callback' => 'simplex_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'simplex_ed_feature_image',
        array(
            'label' => esc_html__( 'Enable Home Page Feature Image', 'simplex-munk' ),
            'section' => 'simplex_feature_image_settings',
            'type' => 'checkbox',
        )
    );
    
  
    /** Enable/Disable Feature Image Caption */
    $wp_customize->add_setting(
        'simplex_feature_image_caption',
        array(
            'default' => '',
            'sanitize_callback' => 'simplex_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'simplex_feature_image_caption',
        array(
            'label' => esc_html__( 'Enable Feature Image Caption', 'simplex-munk' ),
            'section' => 'simplex_feature_image_settings',
            'type' => 'checkbox',
        )
    );    
    /** Feature Image Settings Ends */


    /**
     * Sanitization Functions
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
     */
     function simplex_sanitize_checkbox( $checked ){
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
     }	 	  
     
         
     function simplex_sanitize_select( $input, $setting ){
        // Ensure input is a slug.
    	$input = sanitize_key( $input );
    	
    	// Get list of choices from the control associated with the setting.
    	$choices = $setting->manager->get_control( $setting->id )->choices;
    	
    	// If the input is a valid key, return it; otherwise, return the default.
    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
     }
     
        
     function simplex_sanitize_image( $image, $setting ) {
    	/*
    	 * Array of valid image file types.
    	 *
    	 * The array includes image mime types that are included in wp_get_mime_types()
    	 */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
    	// Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );
    	// If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );
    }
}
add_action( 'customize_register', 'simplex_munk_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simplex_munk_customize_preview_js() {
	wp_enqueue_script( 'simplex-munk-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simplex_munk_customize_preview_js' );