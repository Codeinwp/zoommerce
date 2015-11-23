<?php

/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package zerif
 */
get_header(); ?>
<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->
<div id="breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'zoommerce'); ?></a>
	<?php
		if ( is_category() ) :
			$cat = get_category( get_query_var( 'cat' ) );
			echo '<a>'.__('Posts Category', 'zoommerce').'</a>';
			echo '<a>'.esc_html($cat->name).'</a>';
		elseif ( is_tag() ) :
			$tag = get_query_var( 'tag' );
			echo '<a>'.__('Posts Tag', 'zoommerce').'</a>';
			echo '<a>'.esc_html($tag).'</a>';
		elseif ( is_author() ) :
			echo '<a>'.__('Author', 'zoommerce').'</a>';
			echo '<a itemprop="name">'.esc_html(get_the_author()).'</a>';
		elseif ( is_day() ) :
			echo '<a>'.__('Day', 'zoommerce').'</a>';
			echo '<a>'.esc_html(get_the_date()).'</a>';
		elseif ( is_month() ) :
			echo '<a>'.__('Month', 'zoommerce').'</a>';
			echo '<a>'.get_the_date( _x( 'F Y', 'monthly archives date format', 'zoommerce' ) ).'</a>';
		elseif ( is_year() ) :
			echo '<a>'.__('Month', 'zoommerce').'</a>';
			echo '<a>'.get_the_date( _x( 'Y', 'yearly archives date format', 'zoommerce' ) ).'</a>';
		else :
			echo '<a>'.__( 'Archives', 'zoommerce' ).'</a>';
		endif;
	?>
</div><!-- /#breadcrumb  -->
<div id="content" class="site-content">
<div class="container">
	<div class="content-left-wrap col-md-9">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_category() ) :
								single_cat_title();
							elseif ( is_tag() ) :
								single_tag_title();
							elseif ( is_author() ) :
								printf( __( 'Author: %s', 'zoommerce' ), '<span class="author vcard" itemprop="name">' . get_the_author() . '</span>' );
							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'zoommerce' ), '<span>' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'zoommerce' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'zoommerce' ) ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'zoommerce' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'zoommerce' ) ) . '</span>' );
							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'zoommerce' );
							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'zoommerce');
							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'zoommerce');
							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'zoommerce' );
							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'zoommerce' );
							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'zoommerce' );
							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', 'zoommerce' );
							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', 'zoommerce' );
							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', 'zoommerce' );
							else :
								_e( 'Archives', 'zoommerce' );
							endif;
						?>
					</h1>
					<?php
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
				</header><!-- .page-header -->

				<?php 
					while ( have_posts() ) : 
						the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;
					zerif_paging_nav(); 
				else : 
					get_template_part( 'content', 'none' ); 
				endif; 
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .content-left-wrap -->
	<div class="sidebar-wrap col-md-3 content-left-wrap">
		<?php get_sidebar(); ?>
	</div><!-- .sidebar-wrap -->
</div><!-- .container -->
<?php get_footer(); ?>