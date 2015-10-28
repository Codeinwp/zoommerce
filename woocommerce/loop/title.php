<?php
/**
 * Product loop title
 *
 * @author  Themeisle
 * @package Zoocommerce
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
