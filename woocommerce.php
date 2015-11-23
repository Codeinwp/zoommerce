<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zoommerce
 */
get_header(); ?>
<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->
<div id="breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'zoommerce'); ?></a>

	<?php if(is_post_type_archive('product')): ?>
		<a><?php _e('Shop', 'zoommerce'); ?></a>
	<?php elseif(is_tax('product_cat')): 
		$term = $wp_query->get_queried_object(); ?>	
		<a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>"><?php _e('Shop', 'zoommerce'); ?></a>
		<a><?php echo esc_html($term->name); ?></a>
	<?php elseif(is_singular('product')): ?>
		<a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>"><?php _e('Shop', 'zoommerce'); ?></a>
		<a><?php echo esc_html(the_title()); ?></a>
	<?php endif; ?>
	
</div><!-- /#breadcrumb  -->
<div id="content" class="site-content">
	<div class="container">
		<div class="content-left-wrap col-md-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php woocommerce_content(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .content-left-wrap -->
	</div><!-- .container -->
<?php get_footer(); ?>