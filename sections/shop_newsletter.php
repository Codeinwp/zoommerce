<?php
/**
 * The template for shop page newsletter sidebar
 *
 * @package WordPress
 * @subpackage zoommerce
 */

$newsletter_hide = get_theme_mod('shop_newsletter_hide');

	if(!$newsletter_hide)
		return NULL;
?>
<section id="newsletter_section">
	<div class="container">
		<?php

		if(is_active_sidebar( 'sidebar-subscribe' )):

			echo '<div class="home_headline">';
			$headline = get_theme_mod('shop_page_subscribe_headline', __('Newsletter Subscribtion', 'Zoommerce'));
			if($headline) {
				echo '<h3>'.esc_html(get_theme_mod('shop_page_subscribe_headline', __('Newsletter Subscribtion', 'Zoommerce'))).'</h3>';
			}

			$subtitle = get_theme_mod('shop_page_subscribe_subtitle', __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'Zoommerce'));
			if($subtitle) {
				echo '<h4>'.esc_html(get_theme_mod('shop_page_subscribe_subtitle', __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'Zoommerce'))).'</h4>';
			}
			echo '</div><!-- / .home_headline -->';

			dynamic_sidebar( 'sidebar-subscribe' );
		endif;

		?>
	</div><!-- / .container -->
</section><!-- /#newsletter_section  -->