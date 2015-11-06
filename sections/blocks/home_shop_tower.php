<?php

/**
 * The template for tower style box on home latest categories section
 *
 * @package WordPress
 * @subpackage zoocommerce
 */
echo '<div class="tower'.esc_attr($cat_class).'">
	<a title="'.esc_attr(isset($category->category_description) ? $category->category_description : $category->description).'" class="link" href="'.esc_url($term_link).'" style="background-image: url('.esc_url($thumbnail_url).');"></a>
	<a title="'.esc_attr(isset($category->category_description) ? $category->category_description : $category->description).'" href="'.esc_url($term_link).'"><h3 class="title">'.esc_html($category->name).'</h3></a>
</div>';
