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
 * Home: Sections Order
 */
$wp_customize->add_setting( 'section13', array( 'default' => 'bottom_ribbon', 'transport' =>'postMessage' ));
$wp_customize->add_control( 'section13', array(
	'type' => 'select',
	'label' => '13th section',
	'section' => 'zerif_order_section',
	'choices' => array(
		'shop_cats' => __('Shop Categories','zerif'),
		'shop_products' => __('Shop latest Products','zerif'),
		'our_focus' => __('Our focus','zerif'),
		'portofolio' => __('Portfolio','zerif'),
		'about_us' => __('About us','zerif'),
		'our_team' => __('Our team','zerif'),
		'testimonials' => __('Testimonials','zerif'),
		'bottom_ribbon' => __('Bottom ribbon','zerif'),
		'right_ribbon' => __('Right ribbon','zerif'),
		'contact_us' => __('Contact us','zerif'),
		'packages' => __('Packages','zerif'),
		'map' => __('Google map','zerif'),
		'subscribe' => __('Subscribe','zerif'),
		'latest_news' => __('Latest news','zerif')
	),
	'priority' => 13
));
$wp_customize->add_setting( 'section14', array( 'default' => 'latest_news', 'transport' =>'postMessage' ));
$wp_customize->add_control( 'section14', array(
	'type' => 'select',
	'label' => '14th section',
	'section' => 'zerif_order_section',
	'choices' => array(
		'shop_cats' => __('Shop Categories','zerif'),
		'shop_products' => __('Shop latest Products','zerif'),
		'our_focus' => __('Our focus','zerif'),
		'portofolio' => __('Portfolio','zerif'),
		'about_us' => __('About us','zerif'),
		'our_team' => __('Our team','zerif'),
		'testimonials' => __('Testimonials','zerif'),
		'bottom_ribbon' => __('Bottom ribbon','zerif'),
		'right_ribbon' => __('Right ribbon','zerif'),
		'contact_us' => __('Contact us','zerif'),
		'packages' => __('Packages','zerif'),
		'map' => __('Google map','zerif'),
		'subscribe' => __('Subscribe','zerif'),
		'latest_news' => __('Latest news','zerif')
	),
	'priority' => 13
));
/**
 * General: Header
 */
$wp_customize->add_section( 'zoommerce_general_shop_header' , array(
	'title'       => __( 'Header shop', 'zoommerce' ),
	'priority'    => 4,
	'panel' => 'panel_2'
));

	//Cart
$wp_customize->add_setting( 'cart_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-cart.png', 'transport' =>'postMessage'));			
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cart_icon', array(
		'label'    => __( 'Cart - Icon', 'zoommerce' ),	
		'section'  => 'zoommerce_general_shop_header',	
		'settings' => 'cart_icon',	
		'priority'    => 3,

)));
$wp_customize->add_setting( 'cart_link', array('sanitize_callback' => 'esc_url_raw','default' => '#', 'transport' =>'postMessage'));			
$wp_customize->add_control( 'zerif_cart_link', array(
		'label'    => __( 'Cart link', 'zoommerce' ),	
		'section'  => 'zoommerce_general_shop_header',	
		'settings' => 'cart_link',	
		'priority'    => 4,

));

	//My account
$wp_customize->add_setting( 'myaccount_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-profile.png', 'transport' =>'postMessage'));			
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'myaccount_icon', array(
	'label'    => __( 'My Account - Icon', 'zoommerce' ),	
	'section'  => 'zoommerce_general_shop_header',	
	'settings' => 'myaccount_icon',	
	'priority'    => 1,
)));

$wp_customize->add_setting( 'myaccount_link', array('sanitize_callback' => 'esc_url_raw','default' => '#', 'transport' =>'postMessage'));			
$wp_customize->add_control( 'zerif_myaccount_link', array(
	'label'    => __( 'My Account link', 'zoommerce' ),	
	'section'  => 'zoommerce_general_shop_header',	
	'settings' => 'myaccount_link',	
	'priority'    => 2,
));

/**
 * Home: Big banner
 */
	//Subtitle text field
$wp_customize->add_setting( 'zerif_bigtitle_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Introducing','zoommerce'), 'transport' =>'postMessage'));
$wp_customize->add_control( 'zerif_bigtitle_subtitle', array(
	'label'    => __( 'Big Banner Sub Heading', 'zoommerce' ),
	'section'  => 'zerif_bigtitle_texts_section',
	'settings' => 'zerif_bigtitle_subtitle',
	'priority'    => 2,
));
	
	//Background color
$wp_customize->add_setting( 'zerif_bigbanner_background_color', array( 'default' => 'rgba(0, 0, 0, 0.45)', 'transport' =>'postMessage' )); 
$wp_customize->add_control(new Zerif_Customize_Alpha_Color_Control($wp_customize, 'zerif_bigbanner_background_color',array(
	'label'    => __( 'Background color', 'zoommerce' ),
	'palette' => true,
	'section'  => 'zerif_bigtitle_colors_section',
	'priority'   => 1
)));

	//Text Colors
$wp_customize->add_setting( 'zerif_bigbanner_subtitle_color', array( 'default' => '#fff', 'transport' =>'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'zerif_bigbanner_subtitle_color', array(
	'label'      => __( 'Sub heading title color', 'zoommerce' ),
	'section'    => 'zerif_bigtitle_colors_section',
	'priority'   => 2
)));

	//Button colors
$wp_customize->add_setting( 'zerif_bigbanner_button_bg_color', array( 'default' => 'rgba(0, 0, 0, 0)', 'transport' =>'postMessage' )); 
$wp_customize->add_control(new Zerif_Customize_Alpha_Color_Control($wp_customize, 'zerif_bigbanner_button_bg_color',array(
	'label'    => __( 'Button background color', 'zoommerce' ),
	'palette' => true,
	'section'  => 'zerif_bigtitle_colors_section',
	'priority'   => 3
)));

$wp_customize->add_setting( 'zerif_bigbanner_button_bg_color_hover', array( 'default' => 'rgba(0, 0, 0, 0)', 'transport' =>'postMessage' )); 
$wp_customize->add_control(new Zerif_Customize_Alpha_Color_Control($wp_customize, 'zerif_bigbanner_button_bg_color_hover',array(
	'label'    => __( 'Button background hover color', 'zoommerce' ),
	'palette' => true,
	'section'  => 'zerif_bigtitle_colors_section',
	'priority'   => 4
)));

$wp_customize->add_setting( 'zerif_bigbanner_button_text_hover', array( 'default' => '#fff', 'transport' =>'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'zerif_bigbanner_button_text_hover', array(
	'label'      => __( 'Button text hover color', 'zoommerce' ),
	'section'    => 'zerif_bigtitle_colors_section',
	'priority'   => 6
)));

$wp_customize->add_setting( 'zerif_bigbanner_button_border_color', array( 'default' => '#fff', 'transport' =>'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'zerif_bigbanner_button_border_color', array(
	'label'      => __( 'Button border color', 'zoommerce' ),
	'section'    => 'zerif_bigtitle_colors_section',
	'priority'   => 7
)));

$wp_customize->add_setting( 'zerif_bigbanner_button_border_color_hover', array( 'default' => '#fff', 'transport' =>'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'zerif_bigbanner_button_border_color_hover', array(
	'label'      => __( 'Button border hover color', 'zoommerce' ),
	'section'    => 'zerif_bigtitle_colors_section',
	'priority'   => 8
)));

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
	'priority'	=> 2,
	'panel'		=> 'panel_shop_cats'
) );

$wp_customize->add_section( 'home_categories_settings' , array(
	'title'		=> __( 'Settings', 'zoommerce' ),
	'priority'	=> 1,
	'panel'		=> 'panel_shop_cats'
) );
	
	//Fields in section 'home_categories_content'
$wp_customize->add_setting( 'customizer_shop_cats', array('sanitize_callback' => 'zoommerce_sanitize_repeater', 'transport' =>'postMessage'));
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

$wp_customize->add_setting( 'zoommerce_display_latest_cats', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 1, 'transport' =>'postMessage'));
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
$wp_customize->add_setting( 'zoommerce_shopcats_hide', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 0, 'transport' =>'postMessage'));
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
	'title' => __( 'Latest products', 'zoommerce' )
) );
	
	//Sections
$wp_customize->add_section( 'home_latest_products_content' , array(
	'title'		=> __( 'Content', 'zoommerce' ),
	'priority'	=> 2,
	'panel'		=> 'panel_shop_products'
) );

$wp_customize->add_section( 'home_latest_products_settings' , array(
	'title'		=> __( 'Settings', 'zoommerce' ),
	'priority'	=> 1,
	'panel'		=> 'panel_shop_products'
) );
	
	//Fields in section 'home_latest_products_content'
$wp_customize->add_setting( 'latest_products_wide_image', array('default' =>  get_stylesheet_directory_uri() . '/assets/images/demo/products_background.jpg', 'transport' =>'postMessage'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'latest_products_wide_image', array(
		'label'    => __( 'Latest Products Large Image', 'zoommerce' ),
		'section'  => 'home_latest_products_content',
		'settings' => 'latest_products_wide_image',
		'priority'    => 1,
)));

$wp_customize->add_setting( 'latest_products_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('New Arrivals', 'zoommerce'), 'transport' =>'postMessage'));
$wp_customize->add_control( 'latest_products_headline', array(
		'label'    => __( 'Headline', 'zoommerce' ),
		'section'  => 'home_latest_products_content',
		'settings' => 'latest_products_headline',
		'priority'    => 2,
));

$wp_customize->add_setting( 'latest_products_subheading', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Check out our latest products', 'zoommerce'), 'transport' =>'postMessage'));
$wp_customize->add_control( 'latest_products_subheading', array(
		'label'    => __( 'Subtitle', 'zoommerce' ),
		'section'  => 'home_latest_products_content',
		'settings' => 'latest_products_subheading',
		'priority'    => 3,
));

$wp_customize->add_setting( 'latest_products_shop_page_link', array('sanitize_callback' => 'zerif_sanitize_number', 'transport' =>'postMessage'));
$wp_customize->add_control( 'latest_products_shop_page_link', array(
		'label'    => __( 'View all products page link', 'zoommerce' ),
		'section'  => 'home_latest_products_content',
		'settings' => 'latest_products_shop_page_link',
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

$wp_customize->add_setting( 'zoommerce_shopproducts_hide', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 0, 'transport' =>'postMessage'));
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

/**
 * Home: Ribbon right
 */
$wp_customize->add_setting( 'zerif_ribbonright_button_text', array( 'default' => '#fff', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'zerif_ribbonright_button_text',array(
	'label'      => __( 'Button text color', 'zerif' ),
	'section'    => 'zerif_rightbribbon_section',
	'priority'   => 8
)));

$wp_customize->add_setting( 'zerif_ribbonright_button_text_hover', array( 'default' => '#fff', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'zerif_ribbonright_button_text_hover',array(
	'label'      => __( 'Button text color hover', 'zerif' ),
	'section'    => 'zerif_rightbribbon_section',
	'priority'   => 9
)));

$wp_customize->add_setting( 'zerif_ribbonright_button_border', array( 'default' => '#fff', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'zerif_ribbonright_button_border',array(
	'label'      => __( 'Button border color', 'zerif' ),
	'section'    => 'zerif_rightbribbon_section',
	'priority'   => 10
)));

$wp_customize->add_setting( 'zerif_ribbonright_button_border_hover', array( 'default' => '#fff', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'zerif_ribbonright_button_border_hover',array(
	'label'      => __( 'Button border color hover', 'zerif' ),
	'section'    => 'zerif_rightbribbon_section',
	'priority'   => 10
)));

$wp_customize->add_setting( 'zerif_ribbonright_show',array('default' => 1) );
$wp_customize->add_control('zerif_ribbonright_show', array(
	'type' => 'checkbox',
	'label' => __('Hide right button ribbon section?','zerif'),
	'description' => __('If you check this box, the right button ribbon section will disappear from homepage.','zerif'),
	'section' => 'zerif_rightbribbon_section',
	'priority'    => 1,
));

/**
 * Home: Ribbon bottom
 */
$wp_customize->add_setting( 'zerif_ribbonbottom_button_text', array( 'default' => '#fff', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'zerif_ribbonbottom_button_text',array(
	'label'      => __( 'Button text color', 'zerif' ),
	'section'    => 'zerif_bottombribbon_section',
	'priority'   => 8
)));

$wp_customize->add_setting( 'zerif_ribbonbottom_button_text_hover', array( 'default' => '#fff', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'zerif_ribbonbottom_button_text_hover',array(
	'label'      => __( 'Button text color hover', 'zerif' ),
	'section'    => 'zerif_bottombribbon_section',
	'priority'   => 9
)));

$wp_customize->add_setting( 'zerif_ribbonbottom_button_border', array( 'default' => '#fff', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'zerif_ribbonbottom_button_border',array(
	'label'      => __( 'Button border color', 'zerif' ),
	'section'    => 'zerif_bottombribbon_section',
	'priority'   => 10
)));

$wp_customize->add_setting( 'zerif_ribbonbottom_button_border_hover', array( 'default' => '#fff', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'zerif_ribbonbottom_button_border_hover',array(
	'label'      => __( 'Button border color hover', 'zerif' ),
	'section'    => 'zerif_bottombribbon_section',
	'priority'   => 10
)));

$wp_customize->add_setting( 'zerif_ribbonbottom_show',array('default' => 1) );
$wp_customize->add_control('zerif_ribbonbottom_show', array(
	'type' => 'checkbox',
	'label' => __('Hide bottom ribbon section?','zerif'),
	'description' => __('If you check this box, the bottom ribbon section will disappear from homepage.','zerif'),
	'section' => 'zerif_bottombribbon_section',
	'priority'    => 1,
));

/**
 * Home: Priceing table
 */
$wp_customize->add_setting( 'zerif_package_button_background_color', array( 'default' => '#F33B3B', 'transport' =>'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'zerif_package_button_background_color', array(
	'label'      => __( 'Package button background color', 'zerif' ),
	'section'    => 'zerif_packages_colors_section',
	'priority'   => 5
)));

/**
 * Blog
 */
$wp_customize->add_panel( 'panel_blog_page', array(
	'priority' => 40,
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Blog page', 'zoommerce' )
) );

$wp_customize->add_section( 'zoommerce_blog_content' , array(
	'title'       => __( 'Headings', 'zoommerce' ),
	'priority'    => 1,
	'panel' => 'panel_blog_page'
));

$wp_customize->add_setting( 'blog_heading', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('MY BLOG', 'zoommerce'), 'transport' =>'postMessage'));
$wp_customize->add_control( 'blog_heading', array(
		'label'    => __( 'Heading', 'zoommerce' ),
		'section'  => 'zoommerce_blog_content',
		'settings' => 'blog_heading',
		'priority'    => 1,
));

$wp_customize->add_setting( 'blog_heading_sub', array('sanitize_callback' => 'zerif_sanitize_number', 'transport' =>'postMessage'));
$wp_customize->add_control( 'blog_heading_sub', array(
		'label'    => __( 'Subheader', 'zoommerce' ),
		'section'  => 'zoommerce_blog_content',
		'settings' => 'blog_heading_sub',
		'priority'    => 2,
));

/**
 * Shop Section
 */
	//Panels
$wp_customize->add_panel( 'panel_shop_page', array(
	'priority' => 46,
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Shop Page', 'zoommerce' )
) );

$wp_customize->add_panel( 'panel_shop_page_single', array(
	'priority' => 47,
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Single  Product Page', 'zoommerce' )
) );
	
	//Sections in panel 'panel_shop_page'
$wp_customize->add_section( 'shop_page_settings_section' , array(
	'title'		=> __( 'Settings', 'zoommerce' ),
	'priority'	=> 1,
	'panel'		=> 'panel_shop_page'
) );

$wp_customize->add_section( 'shop_page_popularprod_section' , array(
	'title'		=> __( 'Popular Products Section', 'zoommerce' ),
	'priority'	=> 2,
	'panel'		=> 'panel_shop_page'
) );

$wp_customize->add_section( 'shop_page_subscribe_section' , array(
	'title'		=> __( 'Subscribe Section', 'zoommerce' ),
	'priority'	=> 3,
	'panel'		=> 'panel_shop_page'
) );

	//Sections in panel 'panel_shop_page_single'
$wp_customize->add_section( 'single_shop_settings_section' , array(
	'title'		=> __( 'Settings', 'zoommerce' ),
	'priority'	=> 1,
	'panel'		=> 'panel_shop_page_single'
) );

$wp_customize->add_section( 'single_shop_content_section' , array(
	'title'		=> __( 'Content', 'zoommerce' ),
	'priority'	=> 2,
	'panel'		=> 'panel_shop_page_single'
) );

	//Fields in section 'shop_page_settings_section'
$wp_customize->add_setting( 'shop_last_products_hide', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 0, 'transport' =>'postMessage'));
$wp_customize->add_control('shop_last_products_hide',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Check this box to hide "Popular Products" section on shop page.','zoommerce'),
			'section' 	=> 'shop_page_settings_section',
			'priority'	=> 1,
		)
);
$wp_customize->add_setting( 'shop_newsletter_hide', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 0));
$wp_customize->add_control('shop_newsletter_hide',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Check this box to display "Subscribe" section on shop page.','zoommerce'),
			'section' 	=> 'shop_page_settings_section',
			'priority'	=> 2,
		)
);

	//Fields in section 'shop_page_popularprod_section'
$wp_customize->add_setting( 'shop_page_last_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Popular products', 'zoommerce'), 'transport' =>'postMessage'));
$wp_customize->add_control( 'shop_page_last_headline', array(
		'label'    => __( 'Heading', 'zoommerce' ),
		'section'  => 'shop_page_popularprod_section',
		'settings' => 'shop_page_last_headline',
		'priority'    => 1,
));

$wp_customize->add_setting( 'shop_last_products_type', array( 'default' => 'popular'));
$wp_customize->add_control( 'shop_last_products_type', array(
	'type' => 'select',
	'label' => 'What do you want to display in this section?',
	'section' => 'shop_page_popularprod_section',
	'choices' => array(
		'popular' => __('Popular Products','zoommerce'),
		'latest' => __('Latest Products','zoommerce'),
		'featured' => __('Featured Products','zoommerce'),
		'rated' => __('Top Rated Products','zoommerce'),
		'sale' => __('On Sale Products','zoommerce'),
		'cat' => __('Product Category','zoommerce')
	),
	'priority' => 1
));

$wooc_terms = get_terms(array('product_cat'), array('fields' => 'id=>name'));
$wp_customize->add_setting( 'shop_last_products_category');
$wp_customize->add_control( 'shop_last_products_category', array(
	'type' => 'select',
	'label' => 'Select category to display',
	'description' => __('This selection will only work if you select "Product Category" above.', 'zoommerce'),
	'section' => 'shop_page_popularprod_section',
	'choices' => $wooc_terms,
	'priority' => 2
));
	//Fields in section 'shop_page_subscribe_section'
$wp_customize->add_setting( 'shop_page_subscribe_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Newsletter Subscribtion', 'zoommerce'), 'transport' =>'postMessage'));
$wp_customize->add_control( 'shop_page_subscribe_headline', array(
		'label'    => __( 'Heading', 'zoommerce' ),
		'section'  => 'shop_page_subscribe_section',
		'settings' => 'shop_page_subscribe_headline',
		'priority'    => 1,
));

$wp_customize->add_setting( 'shop_page_subscribe_subtitle', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'zoommerce'), 'transport' =>'postMessage'));
$wp_customize->add_control( 'shop_page_subscribe_subtitle', array(
		'label'    => __( 'Subtitle', 'zoommerce' ),
		'section'  => 'shop_page_subscribe_section',
		'settings' => 'shop_page_subscribe_subtitle',
		'priority'    => 2,
));

//Fields in section 'single_shop_settings_section'
$wp_customize->add_setting( 'single_shop_last_products_hide', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 0));
$wp_customize->add_control('single_shop_last_products_hide',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Check this box to hide "Popular Products" section on shop page.','zoommerce'),
			'section' 	=> 'single_shop_settings_section',
			'priority'	=> 1,
		)
);

	//Fields in section 'single_shop_content_section'
$wp_customize->add_setting( 'single_shop_last_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Popular products', 'zoommerce'), 'transport' =>'postMessage'));
$wp_customize->add_control( 'single_shop_last_headline', array(
		'label'    => __( 'Heading', 'zoommerce' ),
		'section'  => 'single_shop_content_section',
		'settings' => 'single_shop_last_headline',
		'priority'    => 1,
));

$wp_customize->add_setting( 'single_shop_last_products_type', array( 'default' => 'popular'));
$wp_customize->add_control( 'single_shop_last_products_type', array(
	'type' => 'select',
	'label' => 'What do you want to display in this section?',
	'section' => 'single_shop_content_section',
	'choices' => array(
		'popular' => __('Popular Products','zoommerce'),
		'latest' => __('Latest Products','zoommerce'),
		'featured' => __('Featured Products','zoommerce'),
		'rated' => __('Top Rated Products','zoommerce'),
		'sale' => __('On Sale Products','zoommerce'),
		'cat' => __('Product Category','zoommerce')
	),
	'priority' => 2
));

$wp_customize->add_setting( 'single_shop_last_products_category');
$wp_customize->add_control( 'single_shop_last_products_category', array(
	'type' => 'select',
	'label' => 'Select category to display',
	'description' => __('This selection will only work if you select "Product Category" above.', 'zoommerce'),
	'section' => 'single_shop_content_section',
	'choices' => $wooc_terms,
	'priority' => 3
));

/**
 * Home: Testimonials
 */

$wp_customize->add_setting( 'zerif_testimonials_header_subtitle_color', array( 'default' => '#f33b3b', 'transport' => 'postMessage' ) );
		
$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'zerif_testimonials_header_subtitle_color',array(
	'label'      => __( 'Title color', 'zerif' ),
	'section'    => 'zerif_testimonials_colors_section',
	'priority'   => 2
)));

/**
 * Home: Our Team
 */
$wp_customize->add_setting( 'our_team_heading_clor', array( 'default' => '#404040', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'our_team_heading_clor',array(
	'label'      => __( 'Heading color', 'zerif' ),
	'section'    => 'zerif_ourteam_colors_section',
	'priority'   => 2
)));

$wp_customize->add_setting( 'our_team_subtitle_clor', array( 'default' => '#404040', 'transport' => 'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'our_team_subtitle_clor',array(
	'label'      => __( 'Subtitle color', 'zerif' ),
	'section'    => 'zerif_ourteam_colors_section',
	'priority'   => 2
)));

/**
 * Home: Latest news
 */
$wp_customize->add_setting( 'latestnews_bg_image', array('default' => get_stylesheet_directory_uri().'/assets/images/shop_cats_pattern.jpg', 'transport' =>'postMessage'));			
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'latestnews_bg_image', array(
	'label'    => __( 'Background Image', 'zoommerce' ),	
	'section'  => 'zerif_latest_news_colors_section',	
	'settings' => 'latestnews_bg_image',	
	'priority'    => 2,
)));

/**
 * Footer Settings
 */
$wp_customize->add_setting( 'zerif_footer_socials_border', array( 'default' => '#4d4d4d', 'transport' =>'postMessage' ) );
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'zerif_footer_socials_border', array(
	'label'      => __( 'Footer widgets border color', 'zoommerce' ),
	'section'    => 'zerif_footer_color_section',
	'priority'   => 2
)));

/**
 * General: Shop buttons colors
 */
$wp_customize->add_section( 'zerif_shop_buttons_color_section' , array(
	'title'       => __( 'Shop buttons colors', 'zoommerce' ),
	'priority'    => 5,
	'panel' => 'panel_1'
));
		
$wp_customize->add_setting( 'zerif_shop_buttons_background_color', array( 'default' => '#333', 'transport' =>'postMessage' ) );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zerif_shop_buttons_background_color',array(
	'label'      => __( 'Buttons background color', 'zoommerce' ),
	'section'    => 'zerif_shop_buttons_color_section',
	'priority'   => 1
)));

$wp_customize->add_setting( 'zerif_shop_buttons_background_color_hover', array( 'default' => '#e52424', 'transport' =>'postMessage' ) );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zerif_shop_buttons_background_color_hover',array(
	'label'      => __( 'Buttons background hover color', 'zoommerce' ),
	'section'    => 'zerif_shop_buttons_color_section',
	'priority'   => 2
)));

$wp_customize->add_setting( 'zerif_shop_buttons_text_color', array( 'default' => '#fff', 'transport' =>'postMessage' ) );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zerif_shop_buttons_text_color',array(
	'label'      => __( 'Buttons text color', 'zoommerce' ),
	'section'    => 'zerif_shop_buttons_color_section',
	'priority'   => 3
)));

$wp_customize->add_setting( 'zerif_shop_buttons_text_color_hover', array( 'default' => '#fff', 'transport' =>'postMessage' ) );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'zerif_shop_buttons_text_color_hover',array(
	'label'      => __( 'Buttons text hover color', 'zoommerce' ),
	'section'    => 'zerif_shop_buttons_color_section',
	'priority'   => 3
)));