<?php

/**
 * Sanitize repeater field
 */
function zoommerce_sanitize_repeater($input){
	$input_decoded = json_decode($input,true);
	$allowed_html = array(
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'a' => array(
			'href' => array(),
			'class' => array(),
			'id' => array(),
			'target' => array()
		),
		'button' => array(
			'class' => array(),
			'id' => array()
		)
	);
	foreach ($input_decoded as $boxk => $box ){
		foreach ($box as $key => $value){
			if ($key == 'text'){
				$input_decoded[$boxk][$key] = wp_kses($value, $allowed_html);
				
			} else {
				$input_decoded[$boxk][$key] = wp_kses_post( force_balance_tags( $value ) );
			}
			
		}
	}
	
	return json_encode($input_decoded);
}

/**
 * Customizer CSS output
 */
if(!function_exists('zoommerce_customizer_style_css')) {
	
	add_action('wp_footer','zoommerce_customizer_style_css');
	function zoommerce_customizer_style_css() {
		/*
			array(
				'selector' => '.buttons .custom-button',
				'style' => 'background-image',
				'property' => 'zerif_bigtitle_button_border_color'
				'before_property' => 'url(',
				'after_property' => ')'
				'important' => true
			),
		*/
		$return = '';
		$styles = array(

				/**
				 * Big banner colors
				 */
				array(
					'selector' => '.home-header-wrap.overlay',
					'style' => 'background',
					'property' => 'zerif_bigbanner_background_color' 
				),
				array(
					'selector' => '.home-header-wrap .sub-text',
					'style' => 'color',
					'property' => 'zerif_bigbanner_subtitle_color',
					'important' => true
				),
				array(
					'selector' => '.home-header-wrap .intro-text',
					'style' => 'color',
					'property' => 'zerif_bigtitle_header_color'
				),
				
				array(
					'selector' => '.home-header-wrap .buttons .custom-button',
					'style' => 'background',
					'property' => 'zerif_bigbanner_button_bg_color'
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button:hover',
					'style' => 'background',
					'property' => 'zerif_bigbanner_button_bg_color_hover'
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button',
					'style' => 'border',
					'property' =>  'zerif_bigbanner_button_border_color',
					'before_property' => '2px solid ',
					'important' => true
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button:hover',
					'style' => 'border',
					'property' =>  'zerif_bigbanner_button_border_color_hover',
					'before_property' => '2px solid ',
					'important' => true
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button',
					'style' => 'color',
					'property' => 'zerif_bigtitle_1button_color'
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button:hover',
					'style' => 'color',
					'property' => 'zerif_bigbanner_button_text_hover'
				),








				array(
					'selector' => '#footer',
					'style' => 'background',
					'property' => 'zerif_footer_background'
				),
				array(
					'selector' => '.copyright',
					'style' => 'background',
					'property' => 'zerif_footer_socials_background'
				),
				array(
					'selector' => '#footer, .company-details',
					'style' => 'color',
					'property' => 'zerif_footer_text_color'
				),
				array(
					'selector' => '#footer .social li a',
					'style' => 'color',
					'property' => 'zerif_footer_socials'
				),
				array(
					'selector' => '#footer .social li a:hover',
					'style' => 'color',
					'property' => 'zerif_footer_socials_hover'
				),
			);

		if($styles) {
			$return .= ' <style type="text/css">';

			foreach($styles as $key => $val) {

				//If style is added in customizer, create a new row in output
				if(get_theme_mod($val['property'])) {

					//Display selector
					if(array_key_exists('selector', $val) && !empty($val['selector'])) {
						$return .= $val['selector'];
					} else {
						error_log("Function: zoommerce_customizer_style_css() - Array Key 'selector' not defined for " . $val['property']);
					}

					$return .= '{';

					if(array_key_exists('style', $val) && !empty($val['style'])) {
						$return .= $val['style'] . ':';
					} else {
						error_log("Function: zoommerce_customizer_style_css() - Array Key 'style' not defined for " . $val['property']);
					}

					if(array_key_exists('before_property', $val) && !empty($val['before_property'])) {
						$return .= $val['before_property'];
					}

					if(array_key_exists('property', $val) && !empty($val['property'])) {
						$return .= esc_html(get_theme_mod($val['property']));
					}

					if(array_key_exists('after_property', $val) && !empty($val['after_property'])) {
						$return .= $val['after_property'];
					}

					if(array_key_exists('important', $val) && !empty($val['important'])) {
						$return .= ' !important';
					}

					$return .= ';}';
				}
			}

			$return .=  '</style>';
		}

		echo $return;
		
	}
}

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'zoommerce_is_woocommerce_activated' ) ) {
	function zoommerce_is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}