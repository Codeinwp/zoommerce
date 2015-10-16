<?php
/**
 * The Header for our theme
 *
 * Displays header section
 *
 * @package WordPress
 * @subpackage zoocommerce
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<?php zerif_top_head_trigger(); ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php

			//Get analytics code from customizer
			$zerif_google_anaytics = get_theme_mod('zerif_google_anaytics');
			if( !empty($zerif_google_anaytics) ):
				echo $zerif_google_anaytics;
			endif;

		?>

		<?php 

			//WP Header
			wp_head(); 

			//Extra hook
			zerif_bottom_head_trigger(); 

		?>

	</head>

	<?php if(isset($_POST['scrollPosition'])): ?>
		<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage" onLoad="window.scrollTo(0,<?php echo esc_attr(intval($_POST['scrollPosition'])); ?>)">
	<?php else: ?>
		<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<?php endif; ?>

		<!-- =========================

		   PRE LOADER       

		============================== -->
		<?php
			
		 global $wp_customize;

		 if(is_front_page() && !isset( $wp_customize )): 
			$zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');
			if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):
				echo '<div class="preloader">';
					echo '<div class="status">&nbsp;</div>';
				echo '</div>';
			endif;	
		endif; ?>


		<header id="home" class="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
			<div id="main-nav" class="navbar navbar-inverse bs-docs-nav">
				<div class="container">
					<div class="navbar-header responsive-logo">
						<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<?php
							$zoocommerce_logo = get_theme_mod('zerif_logo', get_stylesheet_directory_uri().'/assets/images/logo.png');
							if( !empty($zoocommerce_logo) ):
								echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
									echo '<img src="'.$zoocommerce_logo.'" alt="'.get_bloginfo('title').'">';
								echo '</a>';
							else:
								if( isset( $wp_customize ) ):
									echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
										echo '<img src="" alt="'.get_bloginfo('title').'" class="zerif_hidden_if_not_customizer">';
									echo '</a>';
								endif;
								echo '<div class="header_title zerif_header_title">';	
									echo '<h1 class="site-title" itemprop="headline"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';
									echo '<h2 class="site-description" itemprop="description"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
								echo '</div>';
							endif;
						?>
					</div>
                    
                    <?php 
						
						$zoocommerce_myaccount = get_theme_mod('myaccount_icon', get_stylesheet_directory_uri().'/assets/images/menu-profile.png'); 
						$zoocommerce_myaccount_link = get_theme_mod('myaccount_link');
						
						$zoocommerce_cart = get_theme_mod('cart_icon', get_stylesheet_directory_uri().'/assets/images/menu-cart.png'); 
						$zoocommerce_cart_link = get_theme_mod('cart_link');	
						
					//Check if links are active and display the box
					if(!empty($zoocommerce_cart_link) or !empty($zoocommerce_myaccount_link)): ?>
                    <div class="menu-icons">
                        <ul id="icons-menu">
                            <li class="menu-item"> 
                            	<?php if(!empty($zoocommerce_myaccount) && !empty($zoocommerce_myaccount_link)): ?>
                                <a href="<?php echo esc_url($zoocommerce_myaccount_link); ?>">
                                    <img src="<?php echo esc_url($zoocommerce_myaccount); ?>">
                                </a> 
                                <?php endif; ?>
                            </li>
                            <li class="menu-item"> 
                            	<?php if(!empty($zoocommerce_cart) && !empty($zoocommerce_cart_link)): ?>
                                <a href="<?php echo esc_url($zoocommerce_cart_link); ?>">
                                    <img src="<?php echo esc_url($zoocommerce_cart); ?>">
                                </a> 
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
					<?php endif; 

					//Check if menu exists
					if(has_nav_menu('primary')):
					?>

					<nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" id="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">

						<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list' ,'fallback_cb'     => 'zerif_wp_page_menu')); ?>  

					</nav>
					<?php endif; ?>
				</div>

			</div>

			<!-- / END TOP BAR -->