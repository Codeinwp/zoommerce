<?php
/**
 * Use this file to add or update fields, panels and sections to existing data
 *
 * @package WordPress
 * @subpackage zoommerce
 */

/**
 * Genearl: Header
 */
$wp_customize->get_setting( 'myaccount_link' )->default = '';
$wp_customize->get_setting( 'cart_link' )->default = '';

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

	//Headings
$wp_customize->get_setting( 'zerif_bigtitle_title' )->default = __('Zoommerce', 'zoommerce');


/**
 * Home: Our focus
 */
	//Colors
$wp_customize->get_setting( 'zerif_ourfocus_1box' )->default = '#F33B3B';
$wp_customize->get_setting( 'zerif_ourfocus_2box' )->default = '#2CC457';
$wp_customize->get_setting( 'zerif_ourfocus_3box' )->default = '#454CC4';
$wp_customize->get_setting( 'zerif_ourfocus_4box' )->default = '#C4A01B';
$wp_customize->get_setting( 'zerif_ourfocus_show' )->default = 1;

/**
 * Home: Portfolio
 */
$wp_customize->get_setting( 'zerif_portofolio_show' )->default = 1;

/**
 * Home: About us
 */
$wp_customize->get_setting( 'zerif_aboutus_show' )->default = '1';

/**
 * Home: Our team
 */
$wp_customize->get_setting( 'zerif_ourteam_show' )->default = 1;

/**
 * Home: Ribbon right
 */
$wp_customize->get_setting( 'zerif_ribbonright_background' )->default = '#F33B3B';
$wp_customize->get_setting( 'zerif_ribbonright_button_background' )->default = '#F33B3B';

/**
 * Home: Ribbon bottom
 */
$wp_customize->get_setting( 'zerif_ribbonright_background' )->default = '#2CC457';
$wp_customize->get_setting( 'zerif_ribbonright_button_background' )->default = '#2CC457';

/**
 * Home: Priceing table
 */
$wp_customize->get_setting( 'zerif_packages_background' )->default = '#272727';
$wp_customize->get_setting( 'zerif_packages_show' )->default = 0;

/**
 * Home: Google map
 */
$wp_customize->get_setting( 'zerif_googlemap_show' )->default = 1;

/**
 * General: Background
 */
$wp_customize->get_setting( 'background_image' )->default = get_stylesheet_directory_uri().'/assets/images/demo/home_background.jpg';

/**
 * General: Footer
 */
	//Icons
$wp_customize->get_setting( 'zerif_email_icon' )->default = get_stylesheet_directory_uri().'/assets/images/icon-address.png';
$wp_customize->get_setting( 'zerif_phone_icon' )->default = get_stylesheet_directory_uri().'/assets/images/icon-contact.png';
$wp_customize->get_setting( 'zerif_address_icon' )->default = get_stylesheet_directory_uri().'/assets/images/icon-location.png';