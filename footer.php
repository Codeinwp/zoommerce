<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage zoommerce
 */

zerif_before_footer_trigger(); ?>

<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<?php 

	zerif_top_footer_trigger(); 
	
	$footer_sections = 0;

	$zerif_address = esc_html(get_theme_mod('zerif_address',__('San Francisco - Address - 128 California Street 3200.','zerif-lite')));
	$zerif_address_icon = esc_url(get_theme_mod('zerif_address_icon',get_stylesheet_directory_uri().'/assets/images/icon-location.png'));
	
	$zerif_email = get_theme_mod('zerif_email','<a href="mailto:friends@themeisle.com">friends@themeisle.com</a>');
	$zerif_email_icon = esc_url(get_theme_mod('zerif_email_icon',get_stylesheet_directory_uri().'/assets/images/icon-address.png'));
	
	$zerif_phone = get_theme_mod('zerif_phone','<a href="tel:0 332 548 954">0 332 548 954</a>');
	$zerif_phone_icon = esc_url(get_theme_mod('zerif_phone_icon',get_stylesheet_directory_uri().'/assets/images/icon-contact.png'));
	
	$zerif_socials_facebook = esc_url(get_theme_mod('zerif_socials_facebook','#'));

	$zerif_socials_twitter = esc_url(get_theme_mod('zerif_socials_twitter','#'));

	$zerif_socials_linkedin = esc_url(get_theme_mod('zerif_socials_linkedin','#'));

	$zerif_socials_behance = esc_url(get_theme_mod('zerif_socials_behance','#'));

	$zerif_socials_dribbble = esc_url(get_theme_mod('zerif_socials_dribbble','#'));
	
	$zerif_socials_reddit = esc_url(get_theme_mod('zerif_socials_reddit'));
	
	$zerif_socials_tumblr = esc_url(get_theme_mod('zerif_socials_tumblr'));
	
	$zerif_socials_pinterest = esc_url(get_theme_mod('zerif_socials_pinterest'));
	
	$zerif_socials_googleplus = esc_url(get_theme_mod('zerif_socials_googleplus'));
	
	$zerif_socials_youtube = esc_url(get_theme_mod('zerif_socials_youtube'));
		
	$zerif_copyright = esc_html(get_theme_mod('zerif_copyright', __('© Themeisle. All Rights Reserved', 'zoommerce')));

	
	if(!empty($zerif_address) || !empty($zerif_address_icon)):
		$footer_sections++;
	endif;
	
	if(!empty($zerif_email) || !empty($zerif_email_icon)):
		$footer_sections++;
	endif;
	
	if(!empty($zerif_phone) || !empty($zerif_phone_icon)):
		$footer_sections++;
	endif;

	if(!empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_youtube) || !empty($zerif_socials_dribbble) || !empty($zerif_socials_reddit) || !empty($zerif_socials_tumblr) || !empty($zerif_socials_pinterest) || !empty($zerif_socials_googleplus) || !empty($zerif_copyright)):
		$footer_sections++;
	endif;
	
	if( $footer_sections == 1 ):
		$footer_class = 'col-sm-3 footer-box one-cell';
	elseif( $footer_sections == 2 ):
		$footer_class = 'col-sm-3 footer-box two-cell';
	elseif( $footer_sections == 3 ):
		$footer_class = 'col-sm-3 footer-box three-cell';
	elseif( $footer_sections == 4 ):
		$footer_class = 'col-sm-3 footer-box four-cell';
	else:
		$footer_class = 'col-sm-3 footer-box four-cell';
	endif;
	
	
	/* CLIENTS */		
	$zerif_aboutus_clients_title_text = esc_html(get_theme_mod('zerif_aboutus_clients_title_text',__('SHOWCASE YOUR CLIENTS HERE','zoommerce')));
	
	echo '<div class="clients-wrap">';
		echo '<div class="container">';
			echo '<div class="our-clients">';
				if( !empty($zerif_aboutus_clients_title_text) ):
					echo '<h5><span class="section-footer-title">'.$zerif_aboutus_clients_title_text.'</span></h5>';
				else:
					echo '<h5><span class="section-footer-title">'.__('SHOWCASE YOUR CLIENTS HERE','zoommerce').'</span></h5>';
				endif;
			echo '</div>';
			echo '<div class="client-list">';
				echo '<div data-scrollreveal="enter right move 60px after 0.00s over 2.5s">';
					if(is_active_sidebar( 'sidebar-aboutus' )):
						dynamic_sidebar( 'sidebar-aboutus' );
					else:
						the_widget( 'zerif_clients_widget','new_tab=on&link=http://themeisle.com/demo/?theme=Constructzine&image_uri=' . get_stylesheet_directory_uri() . '/assets/images/demo/logo1.png' );
						the_widget( 'zerif_clients_widget','new_tab=on&link=http://themeisle.com/demo/?theme=RokoPhoto&image_uri=' . get_stylesheet_directory_uri() . '/assets/images/demo/logo2.png' );
						the_widget( 'zerif_clients_widget','new_tab=on&link=http://themeisle.com/demo/?theme=Arkitek%20Pro&image_uri=' . get_stylesheet_directory_uri() . '/assets/images/demo/logo3.png' );
						the_widget( 'zerif_clients_widget','new_tab=on&link=http://themeisle.com/demo/?theme=Zerif%20Pro&image_uri=' . get_stylesheet_directory_uri() . '/assets/images/demo/logo4.png' );
						the_widget( 'zerif_clients_widget','new_tab=on&link=http://themeisle.com/demo/?theme=Medica%20Pro&image_uri=' . get_stylesheet_directory_uri() . '/assets/images/demo/logo5.png' );
						the_widget( 'zerif_clients_widget','new_tab=on&link=http://themeisle.com&image_uri=' . get_stylesheet_directory_uri() . '/assets/images/demo/logo6.png' );
					endif;
				echo '</div>';
			echo '</div> ';
		echo '</div> '; /* container end */
	echo '</div> '; /* clients-wrap end */
	
	/* COMPANY ADDRESS */		
	echo '<div class="footer-widgets">';
	echo '<div class="container">';
	echo '<div class="footer-box-wrap">';

	if( !empty($zerif_address) ):
		echo '<div class="'.esc_attr($footer_class).' company-details address">';
			echo '<div class="icon-left">';
				if( !empty($zerif_address_icon) ) echo '<img src="'.$zerif_address_icon.'">';
			echo '</div>';
			echo '<span>' . $zerif_address . '</span>';
		echo '</div>';
	endif;

	/* COMPANY EMAIL */
	if( !empty($zerif_email) ):
		echo '<div class="'.$footer_class.' company-details email">';
			echo '<div class="icon-left">';
				if( !empty($zerif_email_icon) ) echo '<img src="'.$zerif_email_icon.'">';
			echo '</div>';
			echo '<span>' . $zerif_email . '</span>';
		echo '</div>';
	endif;

	/* COMPANY PHONE NUMBER */
	if( !empty($zerif_phone) ):
		echo '<div class="'.$footer_class.' company-details phone">';
			echo '<div class="icon-left">';
				if( !empty($zerif_phone_icon) ) echo '<img src="'.$zerif_phone_icon.'">';
			echo '</div>';
			echo '<span>' . $zerif_phone . '</span>';
		echo '</div>'; 
	endif;

	if( !empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble) || !empty($zerif_socials_reddit) || !empty($zerif_socials_tumblr) || !empty($zerif_socials_pinterest) || !empty($zerif_socials_googleplus) || !empty($zerif_copyright) || !empty($zerif_socials_youtube) ):
			echo '<div class="'.$footer_class.' ">';
			
			if( !empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble) || !empty($zerif_socials_reddit) || !empty($zerif_socials_tumblr) || !empty($zerif_socials_pinterest) || !empty($zerif_socials_googleplus) || !empty($zerif_socials_youtube) ):
				echo '<ul class="social">';

				/* facebook */
				if( !empty($zerif_socials_facebook) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_facebook.'"><i class="fa fa-facebook"></i></a></li>';
				endif;

				/* twitter */
				if( !empty($zerif_socials_twitter) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_twitter.'"><i class="fa fa-twitter"></i></a></li>';
				endif;

				/* linkedin */
				if( !empty($zerif_socials_linkedin) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_linkedin.'"><i class="fa fa-linkedin"></i></a></li>';
				endif;

				/* behance */
				if( !empty($zerif_socials_behance) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_behance.'"><i class="fa fa-behance"></i></a></li>';
				endif;

				/* dribbble */
				if( !empty($zerif_socials_dribbble) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_dribbble.'"><i class="fa fa-dribbble"></i></a></li>';
				endif;
				
				/* googleplus */
				if( !empty($zerif_socials_googleplus) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_googleplus.'"><i class="fa fa-google"></i></a></li>';
				endif;
				
				/* pinterest */
				if( !empty($zerif_socials_pinterest) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_pinterest.'"><i class="fa fa-pinterest"></i></a></li>';
				endif;
				
				/* tumblr */
				if( !empty($zerif_socials_tumblr) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_tumblr.'"><i class="fa fa-tumblr"></i></a></li>';
				endif;
				
				/* reddit */
				if( !empty($zerif_socials_reddit) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_reddit.'"><i class="fa fa-reddit"></i></a></li>';
				endif;
				
				/* youtube */
				if( !empty($zerif_socials_youtube) ):
					echo '<li><a target="_blank" href="'.$zerif_socials_youtube.'"><i class="fa fa-youtube"></i></a></li>';
				endif;

				echo '</ul>';

			endif;	
			
			echo '</div>';
			echo '</div>';
			echo '</div>'; /* container end */
			echo '</div>'; /* footer-widgets end */
			
			if( !empty($zerif_copyright) ):
				echo '<p id="zerif-copyright">'.$zerif_copyright.'</p>';
			elseif( isset( $wp_customize ) ):
				echo '<p id="zerif-copyright" class="zerif_hidden_if_not_customizer"></p>';
			endif;
	endif;

	
	zerif_bottom_footer_trigger(); ?>
</footer> <!-- / END FOOOTER  -->

	<?php 
	
		//Hook
		zerif_after_footer_trigger(); 

		$zerif_slides_array = array();

		for ($i=1; $i<=3; $i++){
			$zerif_bgslider = get_theme_mod('zerif_bgslider_'.$i);
			array_push($zerif_slides_array, $zerif_bgslider);
		}

		$count_slides = 0;
		
		if( !empty($zerif_slides_array) && is_home() ):
		
				echo '</div><!-- .zerif_full_site -->';
		
			echo '</div><!-- .zerif_full_site_wrap -->';
			
		endif;

		wp_footer(); ?>

		<?php zerif_bottom_body_trigger(); ?>
	
	</body>
</html>