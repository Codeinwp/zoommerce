<?php

/**
 * Enqueue styles
 */
add_action( 'wp_enqueue_scripts', 'zoomm_enqueue_styles' );

function zoomm_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Get text domain
 */
if(!function_exists('get_textdomain')) {
	function get_textdomain() {
		$default_headers = array( 'td'  => 'Text Domain');
		$text_domain = get_file_data(get_stylesheet_uri(), $default_headers );

		if(array_key_exists('td', $text_domain)) {
			return $text_domain['td'];
		}
	}
}

/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'zoomm_tgm' );
function zoomm_tgm() {

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
            'page_title'                      => __( 'Install Required Plugins', get_textdomain() ),
            'menu_title'                      => __( 'Install Plugins', get_textdomain() ),
            'installing'                      => __( 'Installing Plugin: %s', get_textdomain() ), 
            'oops'                            => __( 'Something went wrong with the plugin API.', get_textdomain() ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), 
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), 
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), 
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', get_textdomain() ),
            'plugin_activated'                => __( 'Plugin activated successfully.', get_textdomain() ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', get_textdomain() ), 
            'nag_type'                        => 'updated'
        )
    );

	tgmpa( $plugins, $config );
}

/**
 * HTML5shiv
 */
if(function_exists('zoomm_html5shiv')) {
	add_action( 'wp_head', 'zoomm_html5shiv' );

	function zoomm_html5shiv () {
	    echo '<!--[if lt IE 9]>
	    		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    	<![endif]-->';
	}
}



/**
 * Customizer CSS output
 */
if(function_exists('zoomm_customizer_style_css')) {
	add_action('wp_footer','zoomm_customizer_style_css');

	function zoomm_customizer_style_css() {
		echo ' <style type="text/css">';
		echo '	.intro-text { color: '. get_theme_mod('zerif_bigtitle_header_color') .'}';
		echo '	.sub-text { color: '. get_theme_mod('zerif_bigtitle_subheader_color') . '}';
		echo '	.buttons .custom-button { background: '. get_theme_mod('zerif_bigtitle_button_background_color') .'; 
				 border: 2px solid '. get_theme_mod('zerif_bigtitle_button_border_color') .' !important }';
		echo '	.buttons .custom-button:hover { background: '. get_theme_mod('zerif_bigtitle_button_background_color_hover') .' }';		
		
		$zerif_bigtitle_background = get_theme_mod('zerif_bigtitle_background');
		if ( !empty($zerif_bigtitle_background) ){
			echo '	.intro-text { background: '. get_theme_mod('zerif_bigtitle_background') .'}';
		}

		echo '	#footer { background: '. get_theme_mod('zerif_footer_background') .' }';
		echo '	.copyright { background: '. get_theme_mod('zerif_footer_socials_background') .' }';
		echo '	#footer, .company-details { color: '. get_theme_mod('zerif_footer_text_color') .' }';
		echo '	#footer .social li a { color: '. get_theme_mod('zerif_footer_socials') .' }';
		echo '	#footer .social li a:hover { color: '. get_theme_mod('zerif_footer_socials_hover') .' }';
		echo '</style>';
	}
}


?>