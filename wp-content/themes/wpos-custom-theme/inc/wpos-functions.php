<?php
/**
 * Theme customizer File
 *
 * @package Amyra Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


function twenty_twenty_one_default_settings() {

	$default_settings = array(		
                                    'header_social'                     => 0,
                                    'footer_social'                     => 0,
                                    'phone'                          	=> '',
                                    'email'                          	=> '',
                                    'facebook'                          => '',
                                    'twitter'                           => '',
                                    'linkedin'                          => '',
                                    'instagram'                         => '',
                                    'youtube'                           => '',
                                    'header_text_line'                  => '',
                                    'copyright'                         => __('© {year} YOUR BRAND NAME', 'twentytwentyone'),                                   
                            );

	return apply_filters('twenty_twenty_one_options_default_values', $default_settings );
}


function twenty_twenty_one_sanitize_checkbox( $checked ) {
	return ( ( !empty( $checked ) ) ? true : false );
}

function twenty_twenty_one_sanitize_url( $url ) {
	return esc_url_raw( trim($url) );
}


function twenty_twenty_one_sanitize_clean( $var ) {
	if ( is_array( $var ) ) {
		return array_map( 'twenty_twenty_one_sanitize_clean', $var );
	} else {
		$data = is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		return wp_unslash($data);
	}
}


function twenty_twenty_one_get_theme_mod( $mod = '' ) {
	
	$default_settings 	= twenty_twenty_one_default_settings();
	$default_val 		= isset($default_settings[ $mod ]) ? $default_settings[ $mod ] : '';
    
        return get_theme_mod( $mod, $default_val );
}

function twenty_twenty_one_footer_copyright() {
	
	$current_year = date( 'Y', current_time('timestamp') );
	$copyright_text = twenty_twenty_one_get_theme_mod( 'copyright' );
	$copyright_text = str_replace('{year}', $current_year, $copyright_text);
	return apply_filters( 'twenty_twenty_one_footer_copyright', $copyright_text);

}