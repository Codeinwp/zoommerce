<?php


/**
 * Remove hooks from parent theme
 */
add_action('init', 'zoommerce_remove_hooks');
function zoommerce_remove_hooks() {
	remove_action('wp_footer', 'zerif_php_style', 1);
	remove_action('wp_title', 'wp_themeisle_wp_title', 10);
}

/**
 * Enqueue styles
 */
add_action( 'wp_enqueue_scripts', 'zoommerce_enqueue_styles' );

function zoommerce_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Enqueue scripts
 */
add_action( 'wp_enqueue_scripts', 'zoommerce_enqueue_scripts' );
function zoommerce_enqueue_scripts() {
  	wp_enqueue_script( 'zoommerce_scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true );
  	wp_enqueue_script( 'owlCarousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true );
}

function zoommerce_customizer_script() {
	wp_enqueue_script( 'zoommerce_customizer_script',get_stylesheet_directory_uri() . '/assets/js/zoommerce_customizer.js', array("jquery","jquery-ui-draggable"),'1.0.0', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'zoommerce_customizer_script' );

function zoommerce_get_file($file){
	$file_parts = pathinfo($file);
	$accepted_ext = array('jpg','img','png','css','js');
	if( in_array($file_parts['extension'], $accepted_ext) ){
		$file_path = get_stylesheet_directory() . $file;
		if ( file_exists( $file_path ) ){
			return esc_url(get_stylesheet_directory_uri() . $file); 
		} else {
			return esc_url(get_template_directory_uri() . $file);
		}
	}
}

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', 'zoommerce_setup' );
function zoommerce_setup() {

	// Add Theme Support
	add_theme_support( 'title-tag' );

	// Load Theme Textdomain
	load_theme_textdomain( 'zoommerce', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . '/languages/$locale.php';
	if ( is_readable( $locale_file ) ):
		require_once( $locale_file );
	endif;
	
	//Custom image sizes
	add_image_size( 'home_blog', 450, 250 );
}

/**
 * TGM Plugin Activation
 */
if(!function_exists('zoommerce_tgm_activation')) {

	add_action( 'tgmpa_register', 'zoommerce_tgm_activation' );
	function zoommerce_tgm_activation() {

		$plugins = array(
			array(
				'name'      => 'WooCommerce',
				'slug'      => 'woocommerce',
				'required'  => false,
			)
		);

		$config = array(
	        'default_path' => '',                      
	        'menu'         => 'tgmpa-install-plugins', 
	        'has_notices'  => true,                   
	        'dismissable'  => true,                  
	        'dismiss_msg'  => '',                   
	        'is_automatic' => false,                 
	        'message'      => '',     
	        'strings'      => array(
	            'page_title'                      => __( 'Install Required Plugins', 'zoommerce' ),
	            'menu_title'                      => __( 'Install Plugins', 'zoommerce' ),
	            'installing'                      => __( 'Installing Plugin: %s', 'zoommerce' ), 
	            'oops'                            => __( 'Something went wrong with the plugin API.', 'zoommerce' ),
	            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'zoommerce' ),
	            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'zoommerce' ),
	            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'zoommerce' ),
	            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'zoommerce' ),
	            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'zoommerce' ),
	            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' , 'zoommerce'), 
	            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' , 'zoommerce'), 
	            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' , 'zoommerce'), 
	            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'zoommerce' ),
	            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'zoommerce' ),
	            'return'                          => __( 'Return to Required Plugins Installer', 'zoommerce' ),
	            'plugin_activated'                => __( 'Plugin activated successfully.', 'zoommerce' ),
	            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'zoommerce' ), 
	            'nag_type'                        => 'updated'
	        )
	    );

		tgmpa( $plugins, $config );
	}
}


/**
 * HTML5shiv
 */
if(!function_exists('zoommerce_html5shiv')) {
	add_action( 'wp_head', 'zoommerce_html5shiv' );

	function zoommerce_html5shiv () {
	    echo '<!--[if lt IE 9]>
	    		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    	<![endif]-->';
	}
}