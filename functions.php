<?php


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
