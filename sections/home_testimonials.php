<section id="testimonials">
	<div class="container">
		<?php

		echo '<div class="home_headline">';
		if(get_theme_mod('latest_testimonials_headline', __('Testimonials', 'zoocommerce'))) {
			echo '<h3>'.esc_html(get_theme_mod('latest_testimonials_headline', __('Testimonials', 'zoocommerce'))).'</h3>';
		}

		if(get_theme_mod('latest_testimonials_subheading', __('Get testimonials from your clients and then display them here.', 'zoocommerce'))) {
			echo '<h4>'.esc_html(get_theme_mod('latest_testimonials_subheading', __('Get testimonials from your clients and then display them here.', 'zoocommerce'))).'</h4>';
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