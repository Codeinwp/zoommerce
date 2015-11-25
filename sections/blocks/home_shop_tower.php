<?php

/**
 * The template for tower style box on home latest categories section
 *
 * @package WordPress
 * @subpackage zoommerce
 */
echo '<div class="tower'.esc_attr($cat_class).'" data-scrollreveal="enter left after 0s over 1s">
	<a title="'.esc_attr(isset($category->category_description) ? $category->category_description : $category->description).'" class="link" href="'.esc_url($term_link).'" style="background-image: url('.esc_url($thumbnail_url).');"></a>
	<a title="'.esc_attr(isset($category->category_description) ? $category->category_description : $category->description).'" href="'.esc_url($term_link).'"><h3 class="title">'.esc_html($category->name).'</h3></a>
</div>';
