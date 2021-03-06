<?php
/**
 * Use this file to remove fields, panel and sections that already exists in theme
 *
 * @package WordPress
 * @subpackage zoommerce
 */


/**
 * Home: Big banner
 */
$wp_customize->remove_control('zerif_bigtitle_2button_background_color');
$wp_customize->remove_control('zerif_bigtitle_2button_background_color_hover');
$wp_customize->remove_control('zerif_bigtitle_2button_color');
$wp_customize->remove_control('zerif_bigtitle_1button_background_color');
$wp_customize->remove_control('zerif_bigtitle_1button_background_color_hover');
$wp_customize->remove_control('zerif_bigtitle_background');

/**
 * Home: Testimonials
 */
$wp_customize->remove_control('zerif_testimonials_quote');
$wp_customize->remove_control('zerif_testimonials_pinterest_style');


/**
 * Home: Priceing tables
 */
$wp_customize->remove_control('zerif_packages_header');


/**
 * General: Footer
 */
$wp_customize->remove_control('zerif_bigtitle_greenbutton_label');
$wp_customize->remove_control('zerif_bigtitle_greenbutton_url');

/**
 * General
 */
$wp_customize->remove_control('zerif_titles_bottomborder_color');
