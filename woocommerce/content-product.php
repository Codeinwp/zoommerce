<?php
/**
 * Loop product box
 *
 * @author  Themeisle
 * @package Zoocommerce
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

//Add custom class
$classes[] = 'product';

?>

<div <?php post_class( $classes ); ?>>
	<?php 

	//Hook before item
	do_action( 'woocommerce_before_shop_loop_item' ); 

	//Display product image
	echo '<a href="'.get_the_permalink().'" class="image">'.woocommerce_get_product_thumbnail().'</a>';
	
	//Display product title
	do_action( 'woocommerce_shop_loop_item_title' ); 
	
	//Display product price
	woocommerce_template_loop_price();

	//Hook after item
	do_action( 'woocommerce_after_shop_loop_item' ); 

	?>
</div><!-- / .product -->