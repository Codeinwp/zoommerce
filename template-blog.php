<?php
/*
Template Name: Blog template
*/
get_header();
?>
<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<?php

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

if($image) {
	$image_bg = 'style="background-image: url('.esc_url($image[0]).');"';
} else {
	$image_bg = 'style="background-color: rgba(0, 0, 0, 0.7);"';
}

?>

<div id="wide_header" <?php echo $image_bg;?>>
	<div class="container">
		<?php

			$heading = get_theme_mod('blog_heading', __('MY BLOG', 'zoommerce'));
			if($heading)
				echo '<div class="title">'.esc_html($heading).'</div>';

			$heading_sub = get_theme_mod('blog_heading_sub');
			if($heading_sub)
				echo '<p>'.esc_html($heading_sub).'</p>';

		?>
	</div><!-- / .container -->
	<div class="overlay"></div><!-- / .overlay -->
</div><!-- /#wide_header  -->
<div id="breadcrumb">
	<?php $blog_page_id = zoommerce_get_pages_by_template('template-blog.php')->ID; ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'zoommerce'); ?></a>
	<a href="<?php echo esc_url(get_page_link($blog_page_id)); ?>"><?php _e('Blog', 'zoommerce'); ?></a>
</div><!-- /#breadcrumb  -->
<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-9">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

					<?php 
				
					query_posts( array( 'post_type' => 'post', 'posts_per_page' => 6, 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) ) );

					if ( have_posts() ) :

						while ( have_posts() ) : the_post();
						
							get_template_part( 'content', get_post_format() );
						
						endwhile; 
						
						zerif_paging_nav();
					
					else : 
					
						get_template_part( 'content', 'none' );
						
					endif;
					
					wp_reset_postdata(); 
					
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->



		<div class="sidebar-wrap col-md-3 content-left-wrap">

			<?php get_sidebar(); ?>

		</div><!-- .sidebar-wrap -->



	</div><!-- .container -->
<?php get_footer(); ?>