<?php
/**
 * The template for home section: Latest Products
 *
 * @package WordPress
 * @subpackage zoommerce
 */

$prod_hide = get_theme_mod('zoommerce_shopproducts_hide');
if($prod_hide)
	return NULL;

//Data
$right_image = get_theme_mod('latest_products_wide_image', get_stylesheet_directory_uri() . '/assets/images/demo/products_background.jpg');

//Products count
$prod_count = get_theme_mod('latest_products_count', 3);

//Products loop
$products_args = array(
	'post_type' => 'product',
	'posts_per_page' => $prod_count
);
$products_loop = new WP_Query( $products_args );


?>
<section id="home_products">
	<?php if ( $products_loop->have_posts() ): 

		//Products class
		if($prod_count == '2') {
			$prod_class = ' two';
		} elseif($prod_count == '1') {
			$prod_class = ' one';
		} else {
			$prod_class = '';
		}
	?>
		<div class="left<?php echo esc_attr($prod_class); ?>" data-scrollreveal="enter left after 0s over 1s" <?php echo (!$right_image ? 'style="width: 100%;"' : ''); ?>>
			<div class="home_headline">
				<?php
					$headline = get_theme_mod('latest_products_headline', __('New Arrivals', 'zoommerce'));
					if($headline) {
						echo '<h3>'.esc_html(get_theme_mod('latest_products_headline', __('New Arrivals', 'zoommerce'))).'</h3>';
					}

					$subheading = get_theme_mod('latest_products_subheading', __('Check out our latest products', 'zoommerce'));
					if($subheading) {
						echo '<h4>'.esc_html(get_theme_mod('latest_products_subheading', __('Check out our latest products', 'zoommerce'))).'</h4>';
					}

				?>
			</div><!-- / .headline -->
			<ul class="products">
			<?php
			
			if ( $products_loop->have_posts() ) {
				while ( $products_loop->have_posts() ) : $products_loop->the_post();
					wc_get_template_part( 'content', 'product' );
				endwhile;
			} else {
				echo __( 'No products found', 'zoommerce' );
			}
			wp_reset_postdata();

			?>
			</ul>
			<div class="clearfix"></div><!-- / .clearfix -->

			<?php

			//All products url
			$customizer_link = get_theme_mod('home_latest_products_content');
			$shop_page_id = woocommerce_get_page_id( 'shop' );

			if($customizer_link) {
				echo '<a href="'.esc_url($customizer_link).'" class="viewallproducts">'.__('view all products', 'zoommerce').'</a>';
			} else {
				if($shop_page_id) {
					echo '<a href="'.esc_url(get_permalink( $shop_page_id )).'" class="viewallproducts">'.__('view all products', 'zoommerce').'</a>';
				}
			}
			
			?>
			
		</div><!-- / .left -->
	
	<?php

	endif;//$products_loop->have_posts()

	if($right_image) {
		echo '<div class="right" style="background-image: url('.esc_url($right_image).'); '.($products_loop->have_posts() == true ? '' : 'height: 400px; width: 100%;').'"></div><!-- / .right -->';
	}
	?>
	
</section><!-- /#home_products  -->