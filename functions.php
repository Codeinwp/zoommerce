<?php

/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'zoom_tgm' );
function zoom_tgm() {

	$plugins = array(
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		)
	);

	$theme_text_domain = 'zoocommerce';

	$config = array(
        'default_path' => '',                      
        'menu'         => 'tgmpa-install-plugins', 
        'has_notices'  => true,                   
        'dismissable'  => true,                  
        'dismiss_msg'  => '',                   
        'is_automatic' => false,                 
        'message'      => '',     
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                      => __( 'Install Plugins', $theme_text_domain ),
            'installing'                      => __( 'Installing Plugin: %s', $theme_text_domain ), 
            'oops'                            => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
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
            'return'                          => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), 
            'nag_type'                        => 'updated'
        )
    );

	tgmpa( $plugins, $config );
}

// Enqueue Zerif-Pro Styles
add_action( 'wp_enqueue_scripts', 'enqueue_zerifpro_styles' );

function enqueue_zerifpro_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}




add_action('wp_footer','zerif_php_style_child');

function zerif_php_style_child() {

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

?>