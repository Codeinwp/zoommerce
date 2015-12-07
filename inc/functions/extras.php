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
				 * Home: Big banner colors
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

				/**
				 * Home: Our focus
				 */
				array(
					'selector' => '.focus-box:nth-child(4n+1) .service-icon:hover',
					'style' => 'border',
					'before_property' => '10px solid ',
					'property' => 'zerif_ourfocus_1box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+1) .red-border-bottom:before',
					'style' => 'background',
					'property' => 'zerif_ourfocus_1box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+2) .service-icon:hover',
					'style' => 'border',
					'before_property' => '10px solid ',
					'property' => 'zerif_ourfocus_2box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+2) .red-border-bottom:before',
					'style' => 'background',
					'property' => 'zerif_ourfocus_2box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+3) .service-icon:hover',
					'style' => 'border',
					'before_property' => '10px solid ',
					'property' => 'zerif_ourfocus_3box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+3) .red-border-bottom:before',
					'style' => 'background',
					'property' => 'zerif_ourfocus_3box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+4) .service-icon:hover',
					'style' => 'border',
					'before_property' => '10px solid ',
					'property' => 'zerif_ourfocus_4box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+4) .red-border-bottom:before',
					'style' => 'background',
					'property' => 'zerif_ourfocus_4box'
				),


				/**
				 * Home: Portfolio
				 */
				array(
					'selector' => '#works .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_portofolio_header'
				),
				array(
					'selector' => '#works .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_portofolio_header'
				),
				array(
					'selector' => '#works .project-details > *',
					'style' => 'color',
					'property' => 'zerif_portofolio_text',
					'important'	=> true
				),

				/**
				 * Home: Aboutus
				 */
				array(
					'selector' => '#aboutus.about-us',
					'style' => 'background',
					'property' => 'zerif_aboutus_background'
				),
				array(
					'selector' => '#aboutus .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_aboutus_title_color'
				),
				array(
					'selector' => '#aboutus .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_aboutus_title_color'
				),


				/**
				 * Home: Our team
				 */
				array(
					'selector' => '#team.our-team',
					'style' => 'background',
					'property' => 'zerif_ourteam_background'
				),
				array(
					'selector' => '#team .home_headline h3',
					'style' => 'color',
					'property' => 'our_team_heading_clor',
					'important'	=> true
				),
				array(
					'selector' => '#team .home_headline h4',
					'style' => 'color',
					'property' => 'our_team_subtitle_clor',
					'important'	=> true
				),
				array(
					'selector' => '#team .team-member .details',
					'style' => 'color',
					'property' => 'zerif_ourteam_text'
				),
				array(
					'selector' => '#team .team-member .social-icons ul li a',
					'style' => 'color',
					'property' => 'zerif_ourteam_socials'
				),
				array(
					'selector' => '.team-member .social-icons ul li a:hover',
					'style' => 'color',
					'property' => 'zerif_ourteam_socials_hover'
				),

				/**
				 * Home: Ribbon Right
				 */
				array(
					'selector' => '#ribbon_right',
					'style' => 'background',
					'property' => 'zerif_ribbonright_background',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right h3.white-text',
					'style' => 'color',
					'property' => 'zerif_ribbonright_text_color',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary',
					'style' => 'background',
					'property' => 'zerif_ribbonright_button_background',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary:hover',
					'style' => 'background',
					'property' => 'zerif_ribbonright_button_background_hover',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary',
					'style' => 'color',
					'property' => 'zerif_ribbonright_button_text',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary:hover',
					'style' => 'color',
					'property' => 'zerif_ribbonright_button_text_hover',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary',
					'style' => 'border',
					'before_property' => '1px solid ',
					'property' => 'zerif_ribbonright_button_border',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary:hover',
					'style' => 'border',
					'before_property' => '1px solid ',
					'property' => 'zerif_ribbonright_button_border_hover',
					'important' => true
				),

				/**
				 * Home: Ribbon Bottom
				 */
				array(
					'selector' => '#ribbon_bottom',
					'style' => 'background',
					'property' => 'zerif_ribbon_background',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom h3.white-text',
					'style' => 'color',
					'property' => 'zerif_ribbon_text_color',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary',
					'style' => 'background',
					'property' => 'zerif_ribbon_button_background',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary:hover',
					'style' => 'background',
					'property' => 'zerif_ribbon_button_background_hover',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary',
					'style' => 'color',
					'property' => 'zerif_ribbonbottom_button_text',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary:hover',
					'style' => 'color',
					'property' => 'zerif_ribbonbottom_button_text_hover',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary',
					'style' => 'border',
					'before_property' => '1px solid ',
					'property' => 'zerif_ribbonbottom_button_border',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary:hover',
					'style' => 'border',
					'before_property' => '1px solid ',
					'property' => 'zerif_ribbonbottom_button_border_hover',
					'important' => true
				),

				/**
				 * Home: Priceing table
				 */
				array(
					'selector' => '#pricingtable.packages',
					'style' => 'background',
					'property' => 'zerif_packages_background'
				),
				array(
					'selector' => '#pricingtable.packages .package-header h4',
					'style' => 'color',
					'property' => 'zerif_package_title_color'
				),
				array(
					'selector' => '#pricingtable.packages .package-header .meta-text',
					'style' => 'color',
					'property' => 'zerif_package_title_color'
				),
				array(
					'selector' => '#pricingtable.packages .price-meta',
					'style' => 'color',
					'property' => 'zerif_package_text_color'
				),
				array(
					'selector' => '#pricingtable.packages .package ul li',
					'style' => 'color',
					'property' => 'zerif_package_text_color'
				),
				array(
					'selector' => '#pricingtable.packages .package a.custom-button',
					'style' => 'color',
					'property' => 'zerif_package_button_text_color'
				),
				array(
					'selector' => '#pricingtable.packages .package a.custom-button',
					'style' => 'background',
					'property' => 'zerif_package_button_background_color',
					'important' => true
				),
				array(
					'selector' => '#pricingtable.packages .package .price-container',
					'style' => 'background',
					'property' => 'zerif_package_price_background_color'
				),
				array(
					'selector' => '#pricingtable.packages .package .price h4',
					'style' => 'color',
					'property' => 'zerif_package_price_color'
				),

				/**
				 * Home: Latest posts
				 */
				array(
					'selector' => '#home_blog .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_latestnews_header_title_color'
				),

				array(
					'selector' => '#home_blog .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_latestnews_header_subtitle_color'
				),


				/**
				 * Home: Testimonials
				 */
				array(
					'selector' => '#testimonials',
					'style' => 'background',
					'property' => 'zerif_testimonials_background'
				),

				array(
					'selector' => '#testimonials .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_testimonials_header_subtitle_color'
				),

				array(
					'selector' => '#testimonials .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_testimonials_header'
				),

				array(
					'selector' => '#testimonials .message',
					'style' => 'color',
					'property' => 'zerif_testimonials_text'
				),

				array(
					'selector' => '#testimonials .client-info .client-name',
					'style' => 'color',
					'property' => 'zerif_testimonials_author'
				),

				/**
				 * General: Footer
				 */
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

				/**
				 * Home: Contact us
				 */
				array(
					'selector' => '#contact',
					'style' => 'background',
					'property' => 'zerif_contacus_background',
				),

				array(
					'selector' => '#contact .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_contacus_header',
					'important' => true
				),

				array(
					'selector' => '#contact .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_contacus_header',
					'important' => true
				),

				array(
					'selector' => '#contact .btn-primary',
					'style' => 'background',
					'property' => 'zerif_contacus_button_background',
					'important' => true
				),

				array(
					'selector' => '#contact .btn-primary:hover',
					'style' => 'background',
					'property' => 'zerif_contacus_button_background_hover',
					'important' => true
				),

				array(
					'selector' => '#contact .btn-primary',
					'style' => 'color',
					'property' => 'zerif_contacus_button_color',
					'important' => true
				),

				/**
				 * Home: Subscribe
				 */
				array(
					'selector' => '#newsletter_section .home_headline h3, #newsletter_section .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_subscribe_header_color'
				),

				array(
					'selector' => '#newsletter_section input[type="submit"], #newsletter_section button',
					'style' => 'background',
					'property' => 'zerif_subscribe_button_background_color'
				),

				array(
					'selector' => '#newsletter_section input[type="submit"], #newsletter_section button',
					'style' => 'color',
					'property' => 'zerif_subscribe_button_color'
				),

				array(
					'selector' => '#newsletter_section input[type="submit"]:hover, #newsletter_section button:hover',
					'style' => 'background',
					'property' => 'zerif_subscribe_button_background_color_hover'
				),
			);

		if($styles) {
			$return .= ' <style type="text/css">';

			foreach($styles as $key => $val) {
					
				//If style is added in customizer, create a new row in output
				$property = get_theme_mod($val['property']);
				
				if($property) {


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

/**
 * Get page object by page template
 */
if(!function_exists('zoommerce_get_pages_by_template')) {
	function zoommerce_get_pages_by_template($template, $count = 1) {

		$pages = get_pages(array(
			'meta_key' => '_wp_page_template',
			'meta_value' => $template,
			'number'	=> $count
		));

		$return = array();
		foreach($pages as $page){
			array_push($return, $page);
		}

		if($count = 1) {
			return $return[0];
		} else {
			return $return;
		}
	}	
}
