<section id="shop_cats">
	<div class="container">
		<?php

		$cats_args = array(
            'taxonomy' => 'product_cat',
            'parent'  => 0,
            'number' => '5'
        );

        $cat_count = $cats_args['number'];
        $categories = get_categories($cats_args);

        $i = 1;
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

		?>

	</div><!-- / .container -->
</section><!-- /#shop_cats  -->
