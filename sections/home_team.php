<?php	
/**
 * The template for home section: Our team
 *
 * @package WordPress
 * @subpackage zoommerce
 */

	global $wp_customize;
	
	$zerif_ourteam_show = get_theme_mod('zerif_ourteam_show', 1);

	zerif_before_our_team_trigger();
				
	if( isset($zerif_ourteam_show) && $zerif_ourteam_show != 1 ):
	
		echo '<section class="our-team" id="team">';
	
	elseif ( isset( $wp_customize ) ):
	
		echo '<section class="our-team zerif_hidden_if_not_customizer" id="team">';
	
	endif;

	zerif_top_our_team_trigger();

	if( (isset($zerif_ourteam_show) && $zerif_ourteam_show != 1) || isset( $wp_customize ) ):	

				echo '<div class="container">';

					echo '<div class="home_headline">';
					
						/* title */

						$zerif_ourteam_title = get_theme_mod('zerif_ourteam_title','Our Team');
					
						if( !empty($zerif_ourteam_title) ):
						
							echo '<h3>'.esc_html($zerif_ourteam_title).'</h3>';
							
						elseif ( isset( $wp_customize ) ):

							echo '<h3 class="zerif_hidden_if_not_customizer"></h3>';
							
						endif;

						/* subtitle */

						$zerif_ourteam_subtitle = get_theme_mod('zerif_ourteam_subtitle','Add a subtitle in Customizer, "Our team section"');

						if( !empty($zerif_ourteam_subtitle) ):

							echo '<h4>'.esc_html($zerif_ourteam_subtitle).'</h4>';

						elseif ( isset( $wp_customize ) ):
						
							echo '<h4 class="zerif_hidden_if_not_customizer"></h4>';
							
						endif;

					echo '</div>';


					if(is_active_sidebar( 'sidebar-ourteam' )):
						echo '<div class="row" data-scrollreveal="enter left after 0s over 2s">';
							dynamic_sidebar( 'sidebar-ourteam' );
						echo '</div> ';
					else:
						echo '<div class="row" data-scrollreveal="enter left after 0s over 2s">';
							the_widget( 'zerif_team_widget','name=Member 1&position=CEO&description=text about this member&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri='.get_template_directory_uri().'/images/product-bg.png' );
							the_widget( 'zerif_team_widget','name=Member 2&position=dev&description=text about this member&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri='.get_template_directory_uri().'/images/product-bg.png' );
							the_widget( 'zerif_team_widget','name=Member 3&position=hr&description=text about this member&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri='.get_template_directory_uri().'/images/product-bg.png' );
							the_widget( 'zerif_team_widget','name=Member 4&position=CEO&description=text about this member&fb_link=#&tw_link=#&bh_link=#&db_link=#&ln_link=#&image_uri='.get_template_directory_uri().'/images/product-bg.png' );
						echo '</div>';
					endif;

				echo '</div>';

				zerif_bottom_our_team_trigger();

			echo '</section>';
			
	endif;

	zerif_after_our_team_trigger();
?>			