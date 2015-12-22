<?php
/**
 * The template for home section: Testimonials
 *
 * @package WordPress
 * @subpackage zoommerce
 */

	$testimonials_hide = get_theme_mod('zerif_testimonials_show');
	if($testimonials_hide) 
		return NULL;
?>
<section id="testimonials">
	<div class="container">
		<?php

		echo '<div class="home_headline">';
		$headline = get_theme_mod('zerif_testimonials_title', __('Testimonials', 'zoommerce'));
		if($headline) {
			echo '<h3>'.esc_html(get_theme_mod('zerif_testimonials_title', __('Testimonials', 'zoommerce'))).'</h3>';
		}

		$subheading = get_theme_mod('zerif_testimonials_subtitle', __('Get testimonials from your clients and then display them here.', 'zoommerce'));
		if($subheading) {
			echo '<h4>'.esc_html(get_theme_mod('zerif_testimonials_subtitle', __('Get testimonials from your clients and then display them here.', 'zoommerce'))).'</h4>';
		}
		echo '</div><!-- / .home_headline -->';
		
		?>
		
		<div class="testimonials_wrap owl-carousel">
			<?php
			if(is_active_sidebar( 'sidebar-testimonials' )):

				dynamic_sidebar( 'sidebar-testimonials' );

			else:

				the_widget( 'zerif_testimonial_widget','title=John Dow&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer' );
				the_widget( 'zerif_testimonial_widget','title=John Dow&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer' );
				the_widget( 'zerif_testimonial_widget','title=John Dow&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer' );				

			endif;
			?>
		</div><!-- / .testimonials_wrap owl-carousel -->
	</div><!-- / .container -->
</section><!-- /#etstimonials  -->