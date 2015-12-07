<?php
/**
 * Use this file to add or update fields, panels and sections to existing data
 *
 * @package WordPress
 * @subpackage zoommerce
 */

/**
 * General: Header
 */
$wp_customize->get_setting( 'myaccount_link' )->default = '';
$wp_customize->get_setting( 'cart_link' )->default = '';
$wp_customize->get_setting( 'zerif_logo' )->default = get_stylesheet_directory_uri().'/assets/images/logo.png';

/**
 * Home: Sections Order
 */
$sections_choices = array(
				'shop_cats' => __('Shop Categories','zerif'),
				'our_focus' => __('Our focus','zerif'),
				'shop_products' => __('Shop latest Products','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'map' => __('Google map','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'packages' => __('Packages','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'latest_news' => __('Latest news','zerif')
			);
$wp_customize->get_control( 'section1' )->choices = $sections_choices;
$wp_customize->get_control( 'section2' )->choices = $sections_choices;
$wp_customize->get_control( 'section3' )->choices = $sections_choices;
$wp_customize->get_control( 'section4' )->choices = $sections_choices;
$wp_customize->get_control( 'section5' )->choices = $sections_choices;
$wp_customize->get_control( 'section6' )->choices = $sections_choices;
$wp_customize->get_control( 'section7' )->choices = $sections_choices;
$wp_customize->get_control( 'section8' )->choices = $sections_choices;
$wp_customize->get_control( 'section9' )->choices = $sections_choices;
$wp_customize->get_control( 'section10' )->choices = $sections_choices;
$wp_customize->get_control( 'section11' )->choices = $sections_choices;
$wp_customize->get_control( 'section12' )->choices = $sections_choices;

$wp_customize->get_setting( 'section1' )->default = 'shop_cats';
$wp_customize->get_setting( 'section2' )->default = 'our_focus';
$wp_customize->get_setting( 'section3' )->default = 'shop_products';
$wp_customize->get_setting( 'section4' )->default = 'subscribe';
$wp_customize->get_setting( 'section5' )->default = 'portofolio';
$wp_customize->get_setting( 'section6' )->default = 'testimonials';
$wp_customize->get_setting( 'section7' )->default = 'map';
$wp_customize->get_setting( 'section8' )->default = 'contact_us';
$wp_customize->get_setting( 'section9' )->default = 'about_us';
$wp_customize->get_setting( 'section10' )->default = 'our_team';
$wp_customize->get_setting( 'section11' )->default = 'right_ribbon';
$wp_customize->get_setting( 'section12' )->default = 'packages';



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
$wp_customize->get_setting( 'zerif_bigtitle_title' )->default = __('zoommerce', 'zoommerce');


/**
 * Home: Our focus
 */
	//Colors
$wp_customize->get_setting( 'zerif_ourfocus_1box' )->default = '#F33B3B';
$wp_customize->get_setting( 'zerif_ourfocus_2box' )->default = '#2CC457';
$wp_customize->get_setting( 'zerif_ourfocus_3box' )->default = '#454CC4';
$wp_customize->get_setting( 'zerif_ourfocus_4box' )->default = '#C4A01B';
$wp_customize->get_setting( 'zerif_ourfocus_show' )->default = 1;

$wp_customize->get_setting( 'zerif_ourfocus_1box' )->transport = 'postMessage';
$wp_customize->get_setting( 'zerif_ourfocus_2box' )->transport = 'postMessage';
$wp_customize->get_setting( 'zerif_ourfocus_3box' )->transport = 'postMessage';
$wp_customize->get_setting( 'zerif_ourfocus_4box' )->transport = 'postMessage';


/**
 * Home: Subscribe
 */
$wp_customize->get_setting( 'zerif_subscribe_title' )->default = __('Newsletter Subscribtion','zoommerce');
$wp_customize->get_setting( 'zerif_subscribe_subtitle' )->default = __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.','zoommerce');
$wp_customize->get_setting( 'zerif_subscribe_button_background_color_hover' )->transport = 'postMessage';

/**
 * Home: Portfolio
 */
$wp_customize->get_setting( 'zerif_portofolio_show' )->default = 1;

/**
 * Home: Testimonials
 */
$wp_customize->get_control( 'zerif_testimonials_header' )->label = __('Subtitle color', 'zoommerce');
$wp_customize->get_control( 'zerif_testimonials_header' )->priority = 3;
$wp_customize->get_setting( 'zerif_testimonials_author' )->default = '#f33b3b';

/**
 * Home: About us
 */
$wp_customize->get_setting( 'zerif_aboutus_show' )->default = 1;
$wp_customize->get_setting( 'zerif_aboutus_title' )->transport = 'postMessage';
$wp_customize->get_setting( 'zerif_aboutus_subtitle' )->transport = 'postMessage';
$wp_customize->get_setting( 'zerif_aboutus_biglefttitle' )->transport = 'postMessage';
$wp_customize->get_setting( 'zerif_aboutus_text' )->transport = 'postMessage';

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
$wp_customize->get_setting( 'zerif_ribbon_background' )->default = '#2CC457';
$wp_customize->get_setting( 'zerif_ribbon_button_background' )->default = '#2CC457';

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
 * Home: Latest posts
 */
$wp_customize->get_setting( 'zerif_latestnews_subtitle' )->default = '';
$wp_customize->get_setting( 'zerif_latest_news_show' )->default = 1;

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
$wp_customize->get_setting( 'zerif_copyright' )->default = __('© Themeisle. All Rights Reserved', 'zoommerce');

/**
 * General: Background
 */
$wp_customize->get_control( 'zerif_contacus_button_color' )->label = __( 'Button text color', 'zoommerce' );
$wp_customize->get_setting( 'zerif_contacus_button_background_hover' )->transport = 'postMessage';
