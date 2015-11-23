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

