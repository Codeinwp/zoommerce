<?php

/**
 * Product
 */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

/**
 * Archive
 */
remove_action( 'woocommerce_before_main_content', 	'woocommerce_breadcrumb', 					20, 0 );
remove_action( 'woocommerce_before_main_content', 	'woocommerce_output_content_wrapper', 		10 );
remove_action( 'woocommerce_after_main_content', 	'woocommerce_output_content_wrapper_end', 	10 );

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
add_action('woocommerce_before_shop_loop', 'zoommerce_product_search', 30);
add_filter('woocommerce_show_page_title', function() {
	return false;
});
add_action('woocommerce_before_main_content', function() {
	echo 'taaaaaaaast';
}, 100);