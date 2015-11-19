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

$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('ZOOMMERCE','zoommerce')));
$wp_customize->add_control( 'zerif_bigtitle_title', array(
	'label'    => __( 'Big Banner Heading', 'zoommerce' ),
	'section'  => 'zerif_bigtitle_texts_section',
	'settings' => 'zerif_bigtitle_title',
	'priority'    => 2,

));
$wp_customize->get_setting( 'zerif_bigtitle_title' )->transport = 'postMessage';

$wp_customize->add_setting( 'zerif_bigtitle_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Introducing','zoommerce')));
$wp_customize->add_control( 'zerif_bigtitle_subtitle', array(
	'label'    => __( 'Big Banner Sub Heading', 'zoommerce' ),
	'section'  => 'zerif_bigtitle_texts_section',
	'settings' => 'zerif_bigtitle_subtitle',
	'priority'    => 3,
));

/**
 * General: Footer
 */
	//Icons
$wp_customize->add_setting( 'zerif_email_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/icon-address.png'));			
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(
	'label'    => __( 'Email section - icon', 'zoommerce' ),
	'section'  => 'zerif_footer_section',
	'settings' => 'zerif_email_icon',
	'priority'    => 2,

)));

$wp_customize->add_setting( 'zerif_phone_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/icon-contact.png'));			
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(
	'label'    => __( 'Phone number section - icon', 'zoommerce' ),
	'section'  => 'zerif_footer_section',
	'settings' => 'zerif_phone_icon',
	'priority'    => 4,
)));

$wp_customize->add_setting( 'zerif_address_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/icon-location.png'));			
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(
	'label'    => __( 'Address section - icon', 'zoommerce' ),
	'section'  => 'zerif_footer_section',
	'settings' => 'zerif_address_icon',
	'priority'    => 6,

)));