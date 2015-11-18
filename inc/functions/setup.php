<?php


/**
 * Remove hooks from parent theme
 */
add_action('init', 'zoocommerce_remove_hooks');
function zoocommerce_remove_hooks() {
	remove_action('wp_footer', 'zerif_php_style', 1);
}

/**
 * Enqueue styles
 */
add_action( 'wp_enqueue_scripts', 'zoocommerce_enqueue_styles' );

function zoocommerce_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Enqueue scripts
 */
add_action( 'wp_enqueue_scripts', 'zoocommerce_enqueue_scripts' );
function zoocommerce_enqueue_scripts() {
  	wp_enqueue_script( 'zoocommerce_scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true );
  	wp_enqueue_script( 'owlCarousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true );
}

function zoocommerce_one_customizer_script() {
	wp_enqueue_script( 'zoocommerce_one_customizer_script', zoocommerce_get_file('/assets/js/zoocommerce_customizer.js'), array("jquery","jquery-ui-draggable"),'1.0.0', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'zoocommerce_one_customizer_script' );

function zoocommerce_get_file($file){
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
add_action( 'after_setup_theme', 'zoocommerce_setup' );
function zoocommerce_setup() {

	// Add Theme Support
	add_theme_support( 'title-tag' );

	// Load Theme Textdomain
	load_theme_textdomain( 'zoocommerce', get_template_directory() . '/languages' );

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
if(!function_exists('zoocommerce_tgm_activation')) {

	add_action( 'tgmpa_register', 'zoocommerce_tgm_activation' );
	function zoocommerce_tgm_activation() {

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
	            'page_title'                      => __( 'Install Required Plugins', 'zoocommerce' ),
	            'menu_title'                      => __( 'Install Plugins', 'zoocommerce' ),
	            'installing'                      => __( 'Installing Plugin: %s', 'zoocommerce' ), 
	            'oops'                            => __( 'Something went wrong with the plugin API.', 'zoocommerce' ),
	            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'zoocommerce' ),
	            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'zoocommerce' ),
	            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'zoocommerce' ),
	            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'zoocommerce' ),
	            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'zoocommerce' ),
	            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' , 'zoocommerce'), 
	            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' , 'zoocommerce'), 
	            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' , 'zoocommerce'), 
	            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'zoocommerce' ),
	            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'zoocommerce' ),
	            'return'                          => __( 'Return to Required Plugins Installer', 'zoocommerce' ),
	            'plugin_activated'                => __( 'Plugin activated successfully.', 'zoocommerce' ),
	            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'zoocommerce' ), 
	            'nag_type'                        => 'updated'
	        )
	    );

		tgmpa( $plugins, $config );
	}
}


/**
 * HTML5shiv
 */
if(!function_exists('zoocommerce_html5shiv')) {
	add_action( 'wp_head', 'zoocommerce_html5shiv' );

	function zoocommerce_html5shiv () {
	    echo '<!--[if lt IE 9]>
	    		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    	<![endif]-->';
	}
}