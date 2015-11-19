<?php
	if(get_theme_mod('zoommerce_subscribe_hide'))
		return NULL;
?>
<section id="newsletter_section">
	<div class="container">
		<?php

		if(is_active_sidebar( 'sidebar-subscribe' )):

			echo '<div class="home_headline">';
			if(get_theme_mod('latest_subscribe_headline', __('Newsletter Subscribtion', 'zoommerce'))) {
				echo '<h3>'.esc_html(get_theme_mod('latest_subscribe_headline', __('Newsletter Subscribtion', 'zoommerce'))).'</h3>';
			}

			if(get_theme_mod('latest_subscribe_subheading', __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'zoommerce'))) {
				echo '<h4>'.esc_html(get_theme_mod('latest_subscribe_subheading', __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'zoommerce'))).'</h4>';
			}
			echo '</div><!-- / .home_headline -->';

			dynamic_sidebar( 'sidebar-subscribe' );
		endif;

		?>
	</div><!-- / .container -->
</section><!-- /#newsletter_section  -->