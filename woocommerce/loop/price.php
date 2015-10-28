<?php
/**
 * Loop Price
 *
 * @author  Themeisle
 * @package Zoocommerce
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<div class="price"><?php echo $price_html; ?></div>
<?php endif; ?>
