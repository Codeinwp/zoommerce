<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zoommerce
 */
get_header(); ?>
<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->
<div id="breadcrumb">
	<?php woocommerce_breadcrumb(); ?>
	
</div><!-- /#breadcrumb  -->
<div id="content" class="site-content">
	<div class="container">
		<div class="content-left-wrap col-md-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php woocommerce_content(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .content-left-wrap -->
	</div><!-- .container -->

<?php
	
	if(is_post_type_archive('product') or is_tax('product_cat')) {

		$shop_last_display = get_theme_mod('shop_last_products_hide');

		if(!$shop_last_display) {
			$shop_last_headline = get_theme_mod('shop_page_last_headline', __('Popular products', 'Zoommerce'));
			$shop_last_type = get_theme_mod('shop_last_products_type', 'popular');
			$shop_last_cat = get_theme_mod('shop_last_products_category');

			echo '<div id="popular_products">
			<div class="container"><div class="home_headline">
				<h3>'.esc_html($shop_last_headline).'</h3>
			</div><!-- / .home_headline -->';

			if($shop_last_type == 'popular') {
				echo wp_kses_post( do_shortcode( '[best_selling_products per_page="4"]' ) );
			} elseif($shop_last_type == 'latest') {
				echo wp_kses_post( do_shortcode( '[recent_products per_page="4"]' ) );
			} elseif($shop_last_type == 'featured') {
				echo wp_kses_post( do_shortcode( '[featured_products per_page="4"]' ) );
			} elseif($shop_last_type == 'rated') {
				echo wp_kses_post( do_shortcode( '[top_rated_products per_page="4"]' ) );
			} elseif($shop_last_type == 'sale') {
				echo wp_kses_post( do_shortcode( '[sale_products per_page="4"]' ) );
			} elseif($shop_last_type == 'cat') {
				$shop_term = get_term($shop_last_cat, 'product_cat');
				echo wp_kses_post( do_shortcode( '[product_category category="'.$shop_term->slug.'" per_page="4"]' ) );
			}
			
			echo '</div><!-- / .container -->
			</div><!-- /#popular_products  -->';
		}

		//Home newsletter section
		get_template_part( 'sections/shop_newsletter' );

	} elseif(is_singular('product')) {
		$shop_single_last_display = get_theme_mod('single_shop_last_products_hide');

		if(!$shop_single_last_display) {
			$shop_single_last_headline = get_theme_mod('single_shop_last_headline', __('Popular products', 'Zoommerce'));
			$shop_single_last_type = get_theme_mod('single_shop_last_products_type', 'popular');
			$shop_single_last_cat = get_theme_mod('single_shop_last_products_category');

			echo '<div id="popular_products">
			<div class="container"><div class="home_headline">
				<h3>'.esc_html($shop_single_last_headline).'</h3>
			</div><!-- / .home_headline -->';

			if($shop_single_last_type == 'popular') {
				echo wp_kses_post( do_shortcode( '[best_selling_products per_page="4"]' ) );
			} elseif($shop_single_last_type == 'latest') {
				echo wp_kses_post( do_shortcode( '[recent_products per_page="4"]' ) );
			} elseif($shop_single_last_type == 'featured') {
				echo wp_kses_post( do_shortcode( '[featured_products per_page="4"]' ) );
			} elseif($shop_single_last_type == 'rated') {
				echo wp_kses_post( do_shortcode( '[top_rated_products per_page="4"]' ) );
			} elseif($shop_single_last_type == 'sale') {
				echo wp_kses_post( do_shortcode( '[sale_products per_page="4"]' ) );
			} elseif($shop_single_last_type == 'cat') {
				$shop_term = get_term($shop_single_last_cat, 'product_cat');
				echo wp_kses_post( do_shortcode( '[product_category category="'.$shop_term->slug.'" per_page="4"]' ) );
			}
		}
		
		echo '</div><!-- / .container -->
		</div><!-- /#popular_products  -->';
	}
?>
	
<?php get_footer(); ?>