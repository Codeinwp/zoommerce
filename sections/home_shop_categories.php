<?php
	$categories_hide  = get_theme_mod('zoommerce_shopcats_hide');
	if($categories_hide)
		return NULL;
?>
<section id="shop_cats">
	<div class="container">
		<?php

		//Default categories
		$cats_args = array(
            'taxonomy' => 'product_cat',
            'parent'  => 0,
            'number' => '5'
        );

        $cat_count = $cats_args['number'];
        $categories = get_categories($cats_args);

        $i = 1;

		
		//If latest cats are selected in customizer display latest 5 categories
		$zoommerce_display_latest_cats = get_theme_mod('zoommerce_display_latest_cats');
		if($zoommerce_display_latest_cats) {
			foreach($categories as $category) {
	        	//Get data
	        	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
				$thumbnail_url = wp_get_attachment_url( $thumbnail_id );
				$term_link = get_term_link( $category );
				$cat_class = '';

				//Algorithm & conditions
				if($cat_count == 1) {

					$cat_class = ' full';

					//Display simple square block
					include(locate_template( 'sections/blocks/home_shop_block.php' ));
				} elseif($cat_count == 2 or $cat_count == 4) {

					$cat_class = ' half';

					//Display simple square block
					include(locate_template( 'sections/blocks/home_shop_block.php' ));
				} elseif($cat_count == 3) {

					$cat_class = ' thirds';

					if($i == 1) {

						//Display tower block
						include(locate_template( 'sections/blocks/home_shop_tower.php' ));
					} else {

						//Display simple square block
						include(locate_template( 'sections/blocks/home_shop_block.php' ));
					}

				} else {

					if($i % 8 == 0) {

					$cat_class = ' alignright';

						//Display tower block
						include(locate_template( 'sections/blocks/home_shop_tower.php' ));
					} elseif($i % 10 == 1) {

						//Display tower block
						include(locate_template( 'sections/blocks/home_shop_tower.php' ));
						
					} else {
						//Display simple square block
						include(locate_template( 'sections/blocks/home_shop_block.php' ));

					}
				}
				$i++;
	        }
		} else {
			//If latest categories on customizer is not checked, display custom selected categories
			$customizer_cats = get_theme_mod('customizer_shop_cats');

			if( !empty( $customizer_cats ) ){

				$customizer_cats_decoded = json_decode($customizer_cats);
								
				if( !empty($customizer_cats_decoded) ){
					$cat_count = count($customizer_cats_decoded);

					foreach($customizer_cats_decoded as $parallax_one_social_icon) {
						$category = get_term($parallax_one_social_icon->icon_value, 'product_cat');

						//Get data
			        	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
						$thumbnail_url = wp_get_attachment_url( $thumbnail_id );
						$term_link = get_term_link( $category );
						$cat_class = '';

						//Algorithm & conditions
						if($cat_count == 1) {

							$cat_class = ' full';

							//Display simple square block
							include(locate_template( 'sections/blocks/home_shop_block.php' ));
						} elseif($cat_count == 2 or $cat_count == 4) {

							$cat_class = ' half';

							//Display simple square block
							include(locate_template( 'sections/blocks/home_shop_block.php' ));
						} elseif($cat_count == 3) {

							$cat_class = ' thirds';

							if($i == 1) {

								//Display tower block
								include(locate_template( 'sections/blocks/home_shop_tower.php' ));
							} else {

								//Display simple square block
								include(locate_template( 'sections/blocks/home_shop_block.php' ));
							}

						} else {

							if($i % 8 == 0) {

							$cat_class = ' alignright';

								//Display tower block
								include(locate_template( 'sections/blocks/home_shop_tower.php' ));
							} elseif($i % 10 == 1) {

								//Display tower block
								include(locate_template( 'sections/blocks/home_shop_tower.php' ));
								
							} else {
								//Display simple square block
								include(locate_template( 'sections/blocks/home_shop_block.php' ));

							}
						}
						$i++;

					}
				}
			}
		}
        

		?>

	</div><!-- / .container -->
</section><!-- /#shop_cats  -->
