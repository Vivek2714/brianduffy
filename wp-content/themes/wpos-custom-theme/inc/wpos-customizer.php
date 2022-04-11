<?php
/**
 * Theme customizer File
 *
 * @package Amyra Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;



$default_settings = twenty_twenty_one_default_settings();	

/***** Social Icons Settings *****/
$wp_customize->add_section( 'wpostheme_general_socials_section', array(
	'title' => __( 'Top Header', 'twentytwentyone' ),
));

// Socials Icons on Header
$wp_customize->add_setting( 'header_social', array(
									'sanitize_callback' => 'twenty_twenty_one_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['header_social'],
								));

$wp_customize->add_control( 'header_social', array(
									'label'    		  => __( 'Enable  Top Header', 'twentytwentyone' ),
									'section' 		  => 'wpostheme_general_socials_section',
									'type'                    => 'checkbox',
								));
//phone
$wp_customize->add_setting( 'phone', array(
									//'sanitize_callback' => 'twenty_twenty_one_sanitize_clean',
									'transport'         => 'refresh',
									'default' 			=> $default_settings['phone'],
								));

$wp_customize->add_control( 'phone', array(
									'label'    => __( 'Phone', 'twentytwentyone' ),
									'section'  => 'wpostheme_general_socials_section',
								));	

//email
$wp_customize->add_setting( 'email', array(
									//'sanitize_callback' => 'twenty_twenty_one_sanitize_clean',
									'transport'         => 'refresh',
									'default' 			=> $default_settings['email'],
								));

$wp_customize->add_control( 'email', array(
									'label'    => __( 'Email', 'twentytwentyone' ),
									'section'  => 'wpostheme_general_socials_section',
								));

// Facebook
$wp_customize->add_setting( 'facebook', array(
									'sanitize_callback' => 'twenty_twenty_one_sanitize_url',
									'transport'         => 'refresh',
									'default' 			=> $default_settings['facebook'],
								));

$wp_customize->add_control( 'facebook', array(
									'label'    => __( 'Facebook', 'twentytwentyone' ),
									'section'  => 'wpostheme_general_socials_section',
								));

// Twitter
$wp_customize->add_setting( 'twitter', array(
									'sanitize_callback' => 'twenty_twenty_one_sanitize_url',
									'transport'         => 'refresh',
									'default' 			=> $default_settings['twitter'],
								));

$wp_customize->add_control( 'twitter', array(
									'label'    => __( 'Twitter', 'twentytwentyone' ),
									'section'  => 'wpostheme_general_socials_section',			
								));

// Linkedin
$wp_customize->add_setting( 'linkedin', array(
									'sanitize_callback' => 'twenty_twenty_one_sanitize_url',
									'transport'         => 'refresh',
									'default' 			=> $default_settings['linkedin'],
								));

$wp_customize->add_control( 'linkedin', array(
									'label'    => __( 'Linkedin', 'twentytwentyone' ),
									'section'  => 'wpostheme_general_socials_section',
								));

// Instagram
$wp_customize->add_setting( 'instagram', array(
									'sanitize_callback' => 'twenty_twenty_one_sanitize_url',
									'transport'         => 'refresh',
									'default' 			=> $default_settings['instagram'],
								));

$wp_customize->add_control( 'instagram', array(
									'label'    => __( 'Instagram', 'twentytwentyone' ),
									'section'  => 'wpostheme_general_socials_section',
								));

// YouTube
$wp_customize->add_setting( 'youtube', array(
									'sanitize_callback' => 'twenty_twenty_one_sanitize_url',
									'transport'         => 'refresh',
									'default' 			=> $default_settings['youtube'],
								));

$wp_customize->add_control( 'youtube', array(
									'label'    => __( 'YouTube', 'twentytwentyone' ),
									'section'  => 'wpostheme_general_socials_section',
								));


// Header Text
$wp_customize->add_setting( 'header_text_line', array(
									'sanitize_callback' => 'twenty_twenty_one_sanitize_clean',
									'default'           => $default_settings['header_text_line'],
									'transport'         => 'refresh',	
								));

$wp_customize->add_control( 'header_text_line', array(
									'label'    => __( 'Header Text', 'twentytwentyone' ),
									'section'  => 'wpostheme_general_socials_section',
								));	

/***** Footer Settings *****/
$wp_customize->add_section( 'wpostheme_general_footer_section', array(
	'title' => __( 'Footer Content', 'twentytwentyone' ),			
));

// Footer Copyright
$wp_customize->add_setting( 'copyright', array(
									'sanitize_callback' => 'twenty_twenty_one_sanitize_clean',
									'default'           => $default_settings['copyright'],
									'transport'         => 'refresh',	
								));

$wp_customize->add_control( 'copyright', array(
									'label'    => __( 'Footer Copyright', 'twentytwentyone' ),
									'description'	=> __('If you want to add the copyrights please use the following text - &copy {year} YOUR BRAND NAME', 'twentytwentyone'),
									'section'  => 'wpostheme_general_footer_section',
								));	