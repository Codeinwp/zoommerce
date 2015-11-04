<?php

//Data
$right_image = get_theme_mod('latest_products_wide_image', 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/e666bd30685839.562e97f59fde8.jpg');

//Products count
$prod_count = get_theme_mod('latest_products_count', 3);
$prod_count_wide = get_theme_mod('latest_products_count_wide', 6);
$prod_count_final = '';

if(!$right_image) {
	$prod_count_final = $prod_count_wide;
} else{
	$prod_count_final = $prod_count;
}

//Products loop
$products_args = array(
	'post_type' => 'product',
	'posts_per_page' => $prod_count_final
);
$products_loop = new WP_Query( $products_args );

?>
<section id="home_products">
	<div class="left" <?php echo (!$right_image ? 'style="width: 100%;"' : ''); ?>>
		<div class="headline">
			<h3><?php _e('New Arrivals', 'zoocommerce'); ?></h3>
			<h4><?php _e('Check out our latest products', 'zoocommerce'); ?></h4>
		</div><!-- / .headline -->
		<ul>
		<?php
		
		if ( $products_loop->have_posts() ) {
			while ( $products_loop->have_posts() ) : $products_loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found', 'zoocommerce' );
		}
		wp_reset_postdata();

		?>
		</ul>
		<div class="clearfix"></div><!-- / .clearfix -->
		<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="viewallproducts"><?php _e('view all products', 'zoocommerce'); ?></a>
	</div><!-- / .left -->
	<?php
	if($right_image) {
		echo '<div class="right" style="background-image: url('.esc_url($right_image).');"></div><!-- / .right -->';
	}
	?>
	
</section><!-- /#home_products  -->