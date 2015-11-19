<?php
/**
 * Use this file to add new fields, panel and sections
 *
 * @package WordPress
 * @subpackage zoommerce
 */

/*------------------------------------------------------------------*/
/* Homepage fields                                                  */
/*------------------------------------------------------------------*/

/**
 * General: Header
 */
$wp_customize->add_section( 'zoommerce_general_shop_header' , array(
	'title'       => __( 'Header shop', 'zerif' ),
	'priority'    => 4,
	'panel' => 'panel_2'
));

	//Cart
$wp_customize->add_setting( 'cart_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-cart.png'));			
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cart_icon', array(
		'label'    => __( 'Cart - Icon', 'zoommerce' ),	
		'section'  => 'zoommerce_general_shop_header',	
		'settings' => 'cart_icon',	
		'priority'    => 3,

)));
$wp_customize->add_setting( 'cart_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			
$wp_customize->add_control( 'zerif_cart_link', array(
		'label'    => __( 'Cart link', 'zoommerce' ),	
		'section'  => 'zoommerce_general_shop_header',	
		'settings' => 'cart_link',	
		'priority'    => 4,

));

	//My account
$wp_customize->add_setting( 'myaccount_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-profile.png'));			
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'myaccount_icon', array(
	'label'    => __( 'My Account - Icon', 'zoommerce' ),	
	'section'  => 'woocommerce_menu_section',	
	'settings' => 'myaccount_icon',	
	'priority'    => 1,
)));

$wp_customize->add_setting( 'myaccount_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			
$wp_customize->add_control( 'zerif_myaccount_link', array(
	'label'    => __( 'My Account link', 'zoommerce' ),	
	'section'  => 'woocommerce_menu_section',	
	'settings' => 'myaccount_link',	
	'priority'    => 2,
));


/**
 * Home: Shop Categories
 */
	//Panels
$wp_customize->add_panel( 'panel_shop_cats', array(
	'priority' => 32,
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Shop Categories', 'zoommerce' )
) );
	
	//Sections in panel 'panel_shop_cats'
$wp_customize->add_section( 'home_categories_content' , array(
	'title'		=> __( 'Content', 'zoommerce' ),
	'priority'	=> 1,
	'panel'		=> 'panel_shop_cats'
) );

$wp_customize->add_section( 'home_categories_settings' , array(
	'title'		=> __( 'Settings', 'zoommerce' ),
	'priority'	=> 2,
	'panel'		=> 'panel_shop_cats'
) );
	
	//Fields in section 'home_categories_content'
$wp_customize->add_setting( 'customizer_shop_cats', array('sanitize_callback' => 'zoommerce_sanitize_repeater',));
$wp_customize->add_control( new zoommerce_General_Repeater( $wp_customize, 'customizer_shop_cats', array(
	'label'   => esc_html__('Add new shop category','zoommerce'),
	'section' => 'home_categories_content',
	'priority' => 1,
    'parallax_image_control' => false,
    'parallax_icon_control' => false,
    'parallax_text_control' => false,
    'parallax_link_control' => false,
    'parallax_dropdown_categories' => true
) ) );

$wp_customize->add_setting( 'zoommerce_display_latest_cats', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 1));
$wp_customize->add_control('zoommerce_display_latest_cats',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Display latest 5 shop categories?','zoommerce'),
			'description' => __('If you check this box, the latest five shop categories will display on home page, to use the custom selector please uncheck this box.','zoommerce'),
			'section' 	=> 'home_categories_content',
			'priority'	=> 2,
		)
);
	
	//Fields in section 'home_categories_settings'
$wp_customize->add_setting( 'zoommerce_shopcats_hide', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 0));
$wp_customize->add_control('zoommerce_shopcats_hide',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Hide this section?','zoommerce'),
			'description' => __('Check to hide this section from home page.','zoommerce'),
			'section' 	=> 'home_categories_settings',
			'priority'	=> 1,
		)
);

/**
 * Home: Latest Products section
 */
	//Panels
$wp_customize->add_panel( 'panel_shop_products', array(
	'priority' => 33,
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Latest products', 'zerif' )
) );
	
	//Sections
$wp_customize->add_section( 'home_latest_products_content' , array(
	'title'		=> __( 'Content', 'zoommerce' ),
	'priority'	=> 1,
	'panel'		=> 'panel_shop_products'
) );

$wp_customize->add_section( 'home_latest_products_settings' , array(
	'title'		=> __( 'Settings', 'zoommerce' ),
	'priority'	=> 2,
	'panel'		=> 'panel_shop_products'
) );
	
	//Fields in section 'home_latest_products_content'
$wp_customize->add_setting( 'latest_products_wide_image', array('default' =>  get_stylesheet_directory_uri() . '/assets/images/demo/products_background.jpg'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'latest_products_wide_image', array(
		'label'    => __( 'Latest Products Large Image', 'zoommerce' ),
		'section'  => 'home_latest_products_content',
		'settings' => 'latest_products_wide_image',
		'priority'    => 1,
)));

$wp_customize->add_setting( 'latest_products_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('New Arrivals', 'zoommerce')));
$wp_customize->add_control( 'latest_products_headline', array(
		'label'    => __( 'Headline', 'zoommerce' ),
		'section'  => 'home_latest_products_content',
		'settings' => 'latest_products_headline',
		'priority'    => 2,
));

$wp_customize->add_setting( 'latest_products_subheading', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Check out our latest products', 'zoommerce')));
$wp_customize->add_control( 'latest_products_subheading', array(
		'label'    => __( 'Subtitle', 'zoommerce' ),
		'section'  => 'home_latest_products_content',
		'settings' => 'latest_products_subheading',
		'priority'    => 3,
));

	//Fields in section 'home_latest_products_settings'
$wp_customize->add_setting( 'latest_products_count', array('sanitize_callback' => 'zerif_sanitize_number','default' => 3));
$wp_customize->add_control( 'latest_products_count', array(
		'label'    => __( 'Right products count', 'zoommerce' ),
		'section'  => 'home_latest_products_settings',
		'settings' => 'latest_products_count',
		'priority'    => 1,
));

$wp_customize->add_setting( 'zoommerce_shopproducts_hide', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 0));
$wp_customize->add_control(
		'zoommerce_shopproducts_hide',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Hide this section?','zoommerce'),
			'description' => __('Check to hide this section from home page.','zoommerce'),
			'section' 	=> 'home_latest_products_settings',
			'priority'	=> 2,
		)
);