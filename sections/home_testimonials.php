<?php
	$testimonials_hide = get_theme_mod('zoommerce_testimonials_hide');
	if($testimonials_hide) 
		return NULL;
?>
<section id="testimonials">
	<div class="container">
		<?php

		echo '<div class="home_headline">';
		$headline = get_theme_mod('latest_testimonials_headline', __('Testimonials', 'zoommerce'));
		if($headline) {
			echo '<h3>'.esc_html(get_theme_mod('latest_testimonials_headline', __('Testimonials', 'zoommerce'))).'</h3>';
		}

		$subheading = get_theme_mod('latest_testimonials_subheading', __('Get testimonials from your clients and then display them here.', 'zoommerce'));
		if($subheading) {
			echo '<h4>'.esc_html(get_theme_mod('latest_testimonials_subheading', __('Get testimonials from your clients and then display them here.', 'zoommerce'))).'</h4>';
		}
		echo '</div><!-- / .home_headline -->';
		
		?>
		
		<div class="testimonials_wrap owl-carousel">
			<?php
			if(is_active_sidebar( 'sidebar-testimonials' )):

				dynamic_sidebar( 'sidebar-testimonials' );

			else:
			
				the_widget( 'zerif_testimonial_widget','title=Samantha Dow&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer&image_uri=https://s3.amazonaws.com/uifaces/faces/twitter/pixeliris/128.jpg' );
				the_widget( 'zerif_testimonial_widget','title=John Doe&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer&image_uri=https://s3.amazonaws.com/uifaces/faces/twitter/rem/128.jpg' );
				the_widget( 'zerif_testimonial_widget','title=Emil Emilton&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer&image_uri=https://s3.amazonaws.com/uifaces/faces/twitter/leemunroe/128.jpg' );
			
			endif;
			?>
		</div><!-- / .testimonials_wrap owl-carousel -->
	</div><!-- / .container -->
</section><!-- /#etstimonials  -->