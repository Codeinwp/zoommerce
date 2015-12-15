<?php
/**
 * The template for default content display
 *
 * @package WordPress
 * @subpackage zoommerce
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<?php if ( ! is_search() ) : ?>
		<?php if ( has_post_thumbnail()) : ?>
		<div class="post-img-wrap" itemprop="image">
			 	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				<?php the_post_thumbnail("post-thumbnail"); ?>
				</a>
		</div>
		<div class="listpost-content-wrap">
		<?php else: ?>
		<div class="listpost-content-wrap-full">
		<?php endif; ?>
	<?php else:  ?>
			<div class="listpost-content-wrap-full">
	<?php endif; ?>
	<div class="list-post-top">
		<header class="entry-header">
			<h1 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php zerif_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary" itemprop="text">
			
			<?php the_excerpt(); ?>

		<?php else : ?>

			<div class="entry-content" itemprop="text">

				<?php 
					the_excerpt();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'zerif-lite' ),
						'after'  => '</div>',
					) );

				endif; ?>

				<a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
			</div><!-- .entry-content --><!-- .entry-summary -->
		</div><!-- .list-post-top -->
	</div><!-- .listpost-content-wrap -->
</article><!-- #post-## -->