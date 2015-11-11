<section id="testimonials">
	<div class="container">
		<div class="home_headline">
			<h3>Testimonials</h3>
			<h4>Get testimonials from your clients and then display them here.</h4>
		</div><!-- / .home_headline -->
		
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