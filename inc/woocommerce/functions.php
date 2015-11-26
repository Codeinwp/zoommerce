<?php

/**
 * Display Product Search
 * @uses  zoommerce_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
if ( ! function_exists( 'zoommerce_product_search' ) ) {
	function zoommerce_product_search() {
		if ( zoommerce_is_woocommerce_activated() ) { ?>
			<div class="site-search">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
		<?php
		}
	}
}

if( ! function_exists('zoommerce_variable_same_price')) {
	function zoommerce_variable_same_price($value, $object = null, $variation = null) {
	    if ($value['price_html'] == '') {
	        $value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
	    }
	    return $value;
	}
}