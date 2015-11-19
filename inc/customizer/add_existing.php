<?php
/**
 * Use this file to add or update fields, panels and sections to existing data
 *
 * @package WordPress
 * @subpackage zoommerce
 */

/**
 * Home: Big banner
 */
	//Button label
$wp_customize->get_setting( 'zerif_bigtitle_redbutton_label' )->default = __('Shop Now','zoommerce');
$wp_customize->get_control( 'zerif_bigtitle_redbutton_label' )->label = __( 'Button label', 'zoommerce' );
$wp_customize->get_control( 'zerif_bigtitle_redbutton_label' )->description = __('This is the text that will appear on the button','zoommerce');
$wp_customize->get_control( 'zerif_bigtitle_redbutton_label' )->priority = 3;
	
	//Button url
$wp_customize->get_control( 'zerif_bigtitle_redbutton_url' )->label = __( 'Button link', 'zoommerce' );
$wp_customize->get_control( 'zerif_bigtitle_redbutton_url' )->description = __('The button is linked to this URL','zoommerce');
$wp_customize->get_control( 'zerif_bigtitle_redbutton_url' )->priority = 4;

	//Colors
$wp_customize->get_setting( 'zerif_bigtitle_background' )->default = 'rgba(0, 0, 0, 0.45)';
$wp_customize->get_setting( 'zerif_bigtitle_1button_background_color' )->default = 'rgba(0, 0, 0, 0)';
$wp_customize->get_control( 'zerif_bigtitle_1button_color' )->label = __( 'Button text color', 'zoommerce' );


/**
 * General: Footer
 */
	//Icons
$wp_customize->get_setting( 'zerif_email_icon' )->default = get_stylesheet_directory_uri().'/assets/images/icon-address.png';
$wp_customize->get_setting( 'zerif_phone_icon' )->default = get_stylesheet_directory_uri().'/assets/images/icon-contact.png';
$wp_customize->get_setting( 'zerif_address_icon' )->default = get_stylesheet_directory_uri().'/assets/images/icon-location.png';