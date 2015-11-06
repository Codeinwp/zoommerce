<section id="newsletter_section">
	<div class="container">
		<?php

		if(is_active_sidebar( 'sidebar-subscribe' )):

			echo '<div class="home_headline">';
			if(get_theme_mod('latest_subscribe_headline', 'Newsletter Subscribtion')) {
				echo '<h3>'.esc_html(get_theme_mod('latest_subscribe_headline', 'Newsletter Subscribtion')).'</h3>';
			}

			if(get_theme_mod('latest_subscribe_subheading', 'Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.')) {
				echo '<h4>'.esc_html(get_theme_mod('latest_subscribe_subheading', 'Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.')).'</h4>';
			}
			echo '</div><!-- / .home_headline -->';

			dynamic_sidebar( 'sidebar-subscribe' );
		endif;

		?>
	</div><!-- / .container -->
</section><!-- /#newsletter_section  -->