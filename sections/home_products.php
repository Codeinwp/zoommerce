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
$headline = get_theme_mod('latest_products_headline', __('New Arrivals', 'zoommerce'));
$subheading = get_theme_mod('latest_products_subheading', __('Check out our latest products', 'zoommerce'));

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
	<?php 

		//Products class
		if(!$products_loop->have_posts() && !$headline && !$subheading) {
			$prod_class = ' zerif_hidden_if_not_customizer';
		} else {
			if($prod_count == '2') {
				$prod_class = ' two';
			} elseif($prod_count == '1') {
				$prod_class = ' one';
			} else {
				$prod_class = '';
			}
		}
	?>
		<div class="left<?php echo esc_attr($prod_class); ?> <?php echo (!empty($right_image) ? '' : 'full'); ?>" data-scrollreveal="enter left after 0s over 1s">
			<div class="home_headline">
				<?php
					
					if($headline) {
						echo '<h3>'.esc_html(get_theme_mod('latest_products_headline', __('New Arrivals', 'zoommerce'))).'</h3>';
					}

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
				if($shop_page_id>0) {
					echo '<a href="'.esc_url(get_permalink( $shop_page_id )).'" class="viewallproducts">'.__('view all products', 'zoommerce').'</a>';
				} 
			}
			
			?>
			
		</div><!-- / .left -->
	
	<?php

	if($right_image) {
		if($products_loop->have_posts() or $headline or $subheading  ) {
			echo '<div class="right" style="background-image: url('.esc_url($right_image).');"></div><!-- / .right -->';
		} else {
			echo '<div class="right" style="background-image: url('.esc_url($right_image).'); height: 400px; width: 100%;"></div><!-- / .right -->';
		}
	}
	?>
	
</section><!-- /#home_products  -->