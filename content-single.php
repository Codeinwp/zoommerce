<?php
/**
 * The template for single posts content
 *
 * @package WordPress
 * @subpackage zoommerce
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php zerif_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php	
		if ( has_post_thumbnail() ) {
			echo '<div class="featured">';
			the_post_thumbnail( 'post_featured_image' );
			echo '</div>';
		}
	?>
	<div class="entry-content" itemprop="text">
		<?php 
			the_content(); 

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'zerif' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'zerif' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'zerif' ) );
			if ( ! zerif_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'zerif' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'zerif' );
				}
			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'zerif' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'zerif' );
				}
			} // end check for categories on this blog

			printf($meta_text, $category_list, $tag_list, get_permalink());

		//Edit link
		edit_post_link( __( 'Edit', 'zerif' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->