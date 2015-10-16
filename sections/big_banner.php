
<div class="home-header-wrap">

<?php

	zerif_top_body_trigger();

/*************************************************/
/**************  Background settings *************/
/*************************************************/

$zerif_background_settings = get_theme_mod('zerif_background_settings');

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

				$zerif_slide_style ='background-repeat:no-repeat;background-position:'.$zerif_hpos.' '.$zerif_vpos.';background-size:'.$zerif_bgsize;

				echo '<div class="slide-item" style="background-image:url('.$zerif_slide.');'.$zerif_slide_style.'"></div>';

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

				echo '<video class="zerif_video_background" loop autoplay preload="auto" controls="true" poster="'.$zerif_background_video_thumbnail.'" muted>';

			else:

				echo '<video class="zerif_video_background" loop autoplay preload="auto" controls="true" muted>';

			endif;

			echo '<source src="'.$zerif_background_video.'" type="video/mp4" />';
			echo '</video>';

		} else {

			//echo '<div class="zerif_full_site_wrap">';

			echo '<div class="fadein-slider">';

			if( !empty($zerif_background_video_thumbnail) ) {

				echo '<div class="slide-item" style="background-image:url('.$zerif_background_video_thumbnail.')"></div>';

			} else {

				$page_bg_image_url = get_background_image();

				if ( !empty( $page_bg_image_url ) ) {

					$page_bg_image_url = get_background_image();

					echo '<div class="slide-item" style="background-image:url('.$page_bg_image_url.')"></div>';

				}
			}

			echo '</div>';

			//echo '<div class="zerif_full_site">';

		}
		
	endif;
	
elseif( $zerif_background_settings == 'zerif-background-image' ):

	/* Background Image */
	$zerif_background_image = get_theme_mod('zerif_background_image');

		echo '<div class="fadein-slider">';
				
		$zerif_vpos = get_theme_mod('zerif_vposition_bgimage','top');
		$zerif_hpos = get_theme_mod('zerif_hposition_bgimage','left');
		$zerif_bgsize = get_theme_mod('zerif_bgsize_bgimage','cover');
		if ($zerif_bgsize=='width'):
			$zerif_bgsize = '100% auto';
		elseif ($zerif_bgsize=='height'):
			$zerif_bgsize = 'auto 100%';
		endif;

		$zerif_slide_style ='background-repeat:no-repeat;background-position:'.$zerif_hpos.' '.$zerif_vpos.';background-size:'.$zerif_bgsize;

		echo '<div class="slide-item" style="background-image:url('.$zerif_background_image.');'.$zerif_slide_style.'"></div>';

		echo '</div>';
		
endif;
	

$zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');
	
if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):
	
		echo '<div class="header-content-wrap">';
	
elseif ( isset( $wp_customize ) ):
	
		echo '<div class="header-content-wrap zerif_hidden_if_not_customizer">';
	
endif;

if( (isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1) || isset( $wp_customize ) ):

		echo '<div class="container big-title-container">';
		
		/* Sub title */
		
		$zerif_subtitle = get_theme_mod( 'zerif_bigtitle_subtitle', __('Add Sub Title','zerif') );
		
		if( !empty($zerif_subtitle) ):

			echo '<h4 class="sub-text">'.$zerif_subtitle.'</h1>';
			
		elseif ( isset( $wp_customize ) ):
		
			echo '<h4 class="sub-text zerif_hidden_if_not_customizer"></h1>';

		endif;

		/* Big title */
		
		$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title', __('To add a title here please go to Customizer, "Big title section"','zerif') );
		
		if( !empty($zerif_bigtitle_title) ):

			echo '<h1 class="intro-text">'.$zerif_bigtitle_title.'</h1>';
			
		elseif ( isset( $wp_customize ) ):
		
			echo '<h1 class="intro-text zerif_hidden_if_not_customizer"></h1>';

		endif;	

		/* Buttons */
		
		$zerif_bigtitle_button_label = get_theme_mod( 'zerif_bigtitle_button_label',__('Shop Now','zerif') );
		$zerif_bigtitle_button_url = get_theme_mod( 'zerif_bigtitle_button_url','#' );

		
		if( (!empty($zerif_bigtitle_button_label) && !empty($zerif_bigtitle_button_url))):


			echo '<div class="buttons">';

				zerif_big_title_buttons_top_trigger();

				/* Shop button */
			
				if (!empty($zerif_bigtitle_button_label) && !empty($zerif_bigtitle_button_url)):

					echo '<a href="'.$zerif_bigtitle_button_url.'" class="btn btn-primary custom-button">'.$zerif_bigtitle_button_label.'</a>';
					
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
