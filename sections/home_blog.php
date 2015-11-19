<?php
if(get_theme_mod('zoommerce_blog_hide'))
	return NULL;
?>
<section id="home_blog">
	<div class="container">
		<?php

		echo '<div class="home_headline">';
		if(get_theme_mod('home_latest_posts_headline', __('Latest blog posts', 'zoommerce'))) {
			echo '<h3>'.esc_html(get_theme_mod('home_latest_posts_headline', __('Latest blog posts', 'zoommerce'))).'</h3>';
		}

		if(get_theme_mod('home_latest_posts_subheading')) {
			echo '<h4>'.esc_html(get_theme_mod('home_latest_posts_subheading')).'</h4>';
		}
		echo '</div><!-- / .home_headline -->';
		
		?>

		<div class="items_with_navigation">
			
			<?php

			// WP_Query arguments
			$args = array (
				'posts_per_page'         => get_theme_mod('home_latest_posts_count', 4),
				'ignore_sticky_posts'    => true,
			);

			// The Query
			$latest_posts = new WP_Query( $args );
			$classes = '';

			// The Loop
			if ( $latest_posts->have_posts() ) {

				//If there are more then 2 posts display arrows
				if($latest_posts->post_count > 2 && get_theme_mod('home_latest_posts_count', 4) > 2) {
					echo '<div class="prev_posts"></div><!-- / .prev_posts -->
					<div class="next_posts"></div><!-- / .next_posts -->';
				}

				if($latest_posts->post_count == 1) {
					$classes = ' wide';
				}

				echo '<div class="items_wrapper'.esc_attr($classes).'">';
				while ( $latest_posts->have_posts() ) {
					$latest_posts->the_post();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home_blog' );

					echo '<div class="post">';
					if($image) {
						echo '<figure style="background-image: url('.esc_url($image[0]).');"><a href="'.get_the_permalink().'"></a></figure>';
					}

					echo'
						<a href="'.get_the_permalink().'" class="title" title="'.get_the_title().'">'.get_the_title().'</a>
						<time>November 4 2015</time>
						<div class="excerpt"><p>'.get_the_excerpt().'</p></div>
						<a href="'.get_the_permalink().'" title="'.get_the_title().'" class="readmore">'.__('read more', 'zoommerce').'</a>
					</div><!-- / .post -->';
				}
				echo '</div><!-- / .items_wrapper -->';
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();

			?>
				
		</div><!-- / .items_with_navigation -->
	</div><!-- / .container -->
</section><!-- /#home_blog  -->