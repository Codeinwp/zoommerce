<?php
/**
 * storefront engine room
 *
 * @package storefront
 */

 /**
 * Setup.
 * Enqueue styles, register widget regions, etc.
 */
require 'functions/setup.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require 'functions/extras.php';

/**
 * Load WooCommerce compatibility files.
 */
if(is_woocommerce_activated()) {
	require 'woocommerce/hooks.php';
	require 'woocommerce/functions.php';
	require 'woocommerce/template-tags.php';
}
