<?php
	$zerif_parallax_use = get_theme_mod('zerif_parallax_show');
	$zerif_background_settings = get_theme_mod('zerif_background_settings');

	if($zerif_background_settings == 'zerif-background-image') {
		echo '<div id="big-banner" style="background-image: url('.get_theme_mod('background_image', get_stylesheet_directory_uri() . '/assets/images/demo/home_background.jpg').');">';
	} elseif($zerif_parallax_use == 1) {
		echo '<div id="big-banner">';
	} else {
		echo '<div id="big-banner" style="background-image: url('.get_stylesheet_directory_uri() . '/assets/images/demo/home_background.jpg'.');">';
	}
?>

<?php
	/*************************************************/
	/**************  Background settings *************/
	/*************************************************/

	

	/* Default case when no setting is checked or Slider is selected */
	if( empty($zerif_background_settings) || ($zerif_background_settings == 'zerif-background-slider') ):

		/* Background slider */
		$zerif_slides_array = array();

		for ($i=1; $i<=3; $i++){
			$zerif_bgslider = get_theme_mod('zerif_bgslider_'.$i);
			array_push($zerif_slides_array, $zerif_bgslider);
		}

		$count_slides = 0;

		if( !empty($zerif_slides_array) && is_home() ):


			echo '<div class="fadein-slider">';

			foreach( $zerif_slides_array as $key => $zerif_slide ):

				if ( !empty($zerif_slide) ):

					$keyx = $key+1;
					$zerif_vpos = get_theme_mod('zerif_vposition_bgslider_'.$keyx,'top');
					$zerif_hpos = get_theme_mod('zerif_hposition_bgslider_'.$keyx,'left');
					$zerif_bgsize = get_theme_mod('zerif_bgsize_bgslider_'.$keyx,'cover');
					if ($zerif_bgsize=='width'):
						$zerif_bgsize = '100% auto';
					elseif ($zerif_bgsize=='height'):
						$zerif_bgsize = 'auto 100%';
					endif;

					$zerif_slide_style ='background-repeat:no-repeat;background-position:'.esc_attr($zerif_hpos).' '.esc_attr($zerif_vpos).';background-size:'.esc_attr($zerif_bgsize);

					echo '<div class="slide-item" style="background-image:url('.esc_url($zerif_slide).');'.$zerif_slide_style.'"></div>';

				endif;

			endforeach;

			echo '</div>';

		endif;

	elseif( $zerif_background_settings == 'zerif-background-video' ):

		/* Video background */
		$zerif_background_video = get_theme_mod('zerif_background_video');
		if( !empty($zerif_background_video) && is_home() ):

			$zerif_background_video_thumbnail = get_theme_mod('zerif_background_video_thumbnail');

			if( !wp_is_mobile() ) {

				if( !empty($zerif_background_video_thumbnail) ):

					echo '<video class="zerif_video_background" loop autoplay preload="auto" controls="true" poster="'.esc_url($zerif_background_video_thumbnail).'" muted>';

				else:

					echo '<video class="zerif_video_background" loop autoplay preload="auto" controls="true" muted>';

				endif;

				echo '<source src="'.esc_url($zerif_background_video).'" type="video/mp4" />';
				echo '</video>';

			} else {


				echo '<div class="fadein-slider">';

				if( !empty($zerif_background_video_thumbnail) ) {

					echo '<div class="slide-item" style="background-image:url('.esc_url($zerif_background_video_thumbnail).')"></div>';

				} else {

					$page_bg_image_url = get_background_image();

					if ( !empty( $page_bg_image_url ) ) {

						$page_bg_image_url = get_background_image();

						echo '<div class="slide-item" style="background-image:url('.esc_url($page_bg_image_url).')"></div>';

					}
				}

				echo '</div>';

			}
		endif;

	endif;
?>
<div class="home-header-wrap overlay">

<?php

	global $wp_customize;
	$zerif_parallax_img1 = get_theme_mod('zerif_parallax_img1',get_template_directory_uri() . '/images/background1.jpg');
	$zerif_parallax_img2 = get_theme_mod('zerif_parallax_img2',get_template_directory_uri() . '/images/background2.png');

	if ( $zerif_parallax_use == 1 && (!empty($zerif_parallax_img1) || !empty($zerif_parallax_img2)) ) {

		echo '<ul id="parallax_move">';
	
			if( !empty($zerif_parallax_img1) ) { 
				echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . esc_url($zerif_parallax_img1) . ');"></li>';
			}
			if( !empty($zerif_parallax_img2) ) { 
				echo '<li class="layer layer2" data-depth="0.20" style="background-image: url(' . esc_url($zerif_parallax_img2) . ');"></li>';
			}

		echo '</ul>';
	
	}

	$zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');
	
	if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):
	
		echo '<div class="header-content-wrap">';
	
	elseif ( isset( $wp_customize ) ):
	
		echo '<div class="header-content-wrap zerif_hidden_if_not_customizer">';
	
	endif;

	if( (isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1) || isset( $wp_customize ) ):

		echo '<div class="container big-title-container">';

		/* Sub title */
		$zerif_subtitle = get_theme_mod( 'zerif_bigtitle_subtitle', __('Introducing','zoommerce') );

		if( !empty($zerif_subtitle) ):
			echo '<h4 class="sub-text">'.esc_html($zerif_subtitle).'</h1>';
		elseif ( isset( $wp_customize ) ):
			echo '<h4 class="sub-text zerif_hidden_if_not_customizer"></h1>';
		endif;

		/* Big title */
		$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title', __('Zoommerce','zerif') );
		
		if( !empty($zerif_bigtitle_title) ):
			echo '<h1 class="intro-text">'.esc_html($zerif_bigtitle_title).'</h1>';
		elseif ( isset( $wp_customize ) ):
			echo '<h1 class="intro-text zerif_hidden_if_not_customizer"></h1>';
		endif;	

		/* Buttons */
		
		$zerif_bigtitle_button_label = get_theme_mod( 'zerif_bigtitle_button_label',__('Shop Now','zoommerce') );
		$zerif_bigtitle_button_url = get_theme_mod( 'zerif_bigtitle_button_url','#' );

		
		if( (!empty($zerif_bigtitle_button_label) && !empty($zerif_bigtitle_button_url))):


			echo '<div class="buttons">';

				zerif_big_title_buttons_top_trigger();

				/* Shop button */
			
				if (!empty($zerif_bigtitle_button_label) && !empty($zerif_bigtitle_button_url)):

					echo '<a href="'.esc_url($zerif_bigtitle_button_url).'" class="btn btn-primary custom-button">'.esc_html($zerif_bigtitle_button_label).'</a>';
					
				elseif ( isset( $wp_customize ) ):

					echo '<a href="" class="btn btn-primary custom-button zerif_hidden_if_not_customizer"></a>';

				endif;

				

				zerif_big_title_buttons_bottom_trigger();


			echo '</div>';


		endif;

		echo '</div>';

	echo '</div><!-- .header-content-wrap -->';
	
	endif;

	echo '<div class="clear"></div>';


?>

<div class="down-arrow text-center">
    <a href="#"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/arrow-down.png"></a>
</div>

</div><!--.home-header-wrap -->
</div><!--/#big-banner-->