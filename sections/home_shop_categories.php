<section id="shop_cats">
	<div class="container">
		<?php

		$args = array(
            'taxonomy' => 'product_cat',
            'parent'  => 0,
            'number' => '5'
        );
        $categories = get_categories($args);

        $i = 1;
        foreach($categories as $category) {

        	//Get data
        	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
			$thumbnail_url = wp_get_attachment_url( $thumbnail_id );
			$term_link = get_term_link( $category );
			$cat_class = '';
			//$category->name
        	//$category->category_description

			//Algorithm & conditions
			if($i <= 1) {

				$cat_class = ' full';

				//Display simple square block
				include(locate_template( 'sections/blocks/home_shop_block.php' ));
			} elseif($i <= 2) {

				$cat_class = ' half';

				//Display simple square block
				include(locate_template( 'sections/blocks/home_shop_block.php' ));
			} elseif($i <= 3) {

				$cat_class = ' thirds';

				if($i = 1) {

					//Display tower block
					include(locate_template( 'sections/blocks/home_shop_tower.php' ));
				} else {

					//Display simple square block
					include(locate_template( 'sections/blocks/home_shop_block.php' ));
				}

			} elseif($i <= 4) {
				$cat_class = ' twohalfs';

				//Display simple square block
				include(locate_template( 'sections/blocks/home_shop_block.php' ));
			} else {

				if($i % 10 == 0) {

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
		<!-- <div class="tower">
			<a class="link" href="" style="background-image: url(http://zoommerce.dev/wp-content/uploads/2015/10/fashion-person-woman-feet.jpg);"></a>
			<a href=""><h3 class="title">Tower 1</h3></a>
		</div>
		<div class="box">
			<a class="link" href="" style="background-image: url(http://zoommerce.dev/wp-content/uploads/2015/10/fashion-person-woman-feet.jpg);"></a>
			<a href=""><h3 class="title">Box 1</h3></a>
		</div>
		<div class="box">
			<a class="link" href="" style="background-image: url(http://zoommerce.dev/wp-content/uploads/2015/10/fashion-person-woman-feet.jpg);"></a>
			<a href=""><h3 class="title">Box 2</h3></a>
		</div>
		<div class="box">
			<a class="link" href="" style="background-image: url(http://zoommerce.dev/wp-content/uploads/2015/10/fashion-person-woman-feet.jpg);"></a>
			<a href=""><h3 class="title">Box 3</h3></a>
		</div>
		<div class="box">
			<a class="link" href="" style="background-image: url(http://zoommerce.dev/wp-content/uploads/2015/10/fashion-person-woman-feet.jpg);"></a>
			<a href=""><h3 class="title">Box 4</h3></a>
		</div> -->
	</div><!-- / .container -->
</section><!-- /#shop_cats  -->
