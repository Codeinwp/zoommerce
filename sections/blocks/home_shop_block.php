<?php

/**
 * The template for block style box on home latest categories section
 *
 * @package WordPress
 * @subpackage zoocommerce
 */

echo '<div class="box">
	<a title="'.esc_attr($category->category_description).'" class="link" href="'.esc_url($term_link).'" style="background-image: url('.esc_url($thumbnail_url).');"></a>
	<a title="'.esc_attr($category->category_description).'" href="'.esc_url($term_link).'"><h3 class="title">'.esc_html($category->name).'</h3></a>
</div>';
