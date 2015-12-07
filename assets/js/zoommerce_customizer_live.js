( function( $ ) {
	/**
	 * Home: Bigbanner
	 */

	//Background overlay color
	wp.customize( 'zerif_bigbanner_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.home-header-wrap.overlay' ).css( {
				'background': to
			} );
		} );
	} );

	//Subtitle color
	wp.customize( 'zerif_bigbanner_subtitle_color', function( value ) {
		value.bind( function( to ) {
			console.log(to + '!important');
			$('.home-header-wrap .sub-text').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	//Button background
	wp.customize( 'zerif_bigbanner_button_bg_color', function( value ) {
		value.bind( function( to ) {
			$('.home-header-wrap .buttons .custom-button').attr('style', 'background:' + to + ' !important');
		} );
	} );

	//Button border
	wp.customize( 'zerif_bigbanner_button_border_color', function( value ) {
		value.bind( function( to ) {
			$('.home-header-wrap .buttons .custom-button').attr('style', 'border: 2px solid ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_bigtitle_1button_color', function( value ) {
		value.bind( function( to ) {
			$('.home-header-wrap .buttons .custom-button').attr('style', 'color: ' + to + ' !important');
		} );
	} );


	/**
	 * Home: Latest news
	 */
	wp.customize( 'zerif_latest_news_show', function( value ) {
		value.bind( function( to ) {
			if(!to == '1') {
				$('#home_blog').attr('style', 'display: none !important');
			} else {
				$('#home_blog').attr('style', 'display: block');
			}
		} );
	} );

	wp.customize( 'zerif_latestnews_title', function( value ) {
		value.bind( function( to ) {
			if ($('#home_blog .home_headline h3').length){
		        $('#home_blog .home_headline h3').text(to);
		    } else {
		    	$('#home_blog .home_headline').append('<h3>'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_latestnews_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#home_blog .home_headline h4').length){
		        $('#home_blog .home_headline h4').text(to);
		    } else {
		    	$('#home_blog .home_headline').append('<h4>'+to+'</h4>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_latestnews_background', function( value ) {
		value.bind( function( to ) {
			if(to == '#') {
				$('#home_blog').removeAttr('style');
			} else {
				$('#home_blog').attr('style', 'background-image: none; background-color: ' + to + ' !important');
			}
		} );
	} );

	wp.customize( 'zerif_latestnews_header_title_color', function( value ) {
		value.bind( function( to ) {
			$('#home_blog .home_headline h3').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_latestnews_header_subtitle_color', function( value ) {
		value.bind( function( to ) {
			$('#home_blog .home_headline h4').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	/**
	 * Home: Portfolio
	 */

	wp.customize( 'zerif_portofolio_title', function( value ) {
		value.bind( function( to ) {
			if ($('#works .home_headline h3').length){
		        $('#works .home_headline h3').text(to);
		    } else {
		    	$('#works .home_headline').append('<h3>'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_portofolio_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#works .home_headline h4').length){
		        $('#works .home_headline h4').text(to);
		    } else {
		    	$('#works .home_headline').append('<h4>'+to+'</h4>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_portofolio_header', function( value ) {
		value.bind( function( to ) {
			$('#works .home_headline h3').attr('style', 'color: ' + to + ' !important');
			$('#works .home_headline h4').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_portofolio_text', function( value ) {
		value.bind( function( to ) {
			$('#works .project-details').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	/**
	 * Home: Testimonials
	 */
	wp.customize( 'zerif_testimonials_show', function( value ) {
		value.bind( function( to ) {
			console.log(to);
			if(to) {
				$('#testimonials').attr('style', 'display: none !important');
			} else {
				$('#testimonials').attr('style', 'display: block');
			}
		} );
	} );

	wp.customize( 'zerif_testimonials_title', function( value ) {
		value.bind( function( to ) {
			if ($('#testimonials .home_headline h3').length){
		        $('#testimonials .home_headline h3').text(to);
		    } else {
		    	$('#testimonials .home_headline').append('<h3>'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_testimonials_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#testimonials .home_headline h4').length){
		        $('#testimonials .home_headline h4').text(to);
		    } else {
		    	$('#testimonials .home_headline').append('<h4>'+to+'</h4>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_testimonials_background', function( value ) {
		value.bind( function( to ) {
			$('#testimonials').attr('style', 'background-color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_testimonials_header_subtitle_color', function( value ) {
		value.bind( function( to ) {
			$('#testimonials .home_headline h3').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_testimonials_header', function( value ) {
		value.bind( function( to ) {
			$('#testimonials .home_headline h4').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_testimonials_text', function( value ) {
		value.bind( function( to ) {
			$('#testimonials .message').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_testimonials_author', function( value ) {
		value.bind( function( to ) {
			$('#testimonials .client-info .client-name').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	/**
	 * Home: Our focus
	 */
	wp.customize( 'zerif_ourfocus_header', function( value ) {
		value.bind( function( to ) {
			$('#focus .home_headline h3').attr('style', 'color: ' + to + ' !important');
			$('#focus .home_headline h4').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	/**
	 * Home: Latest products
	 */
	wp.customize( 'zoommerce_shopproducts_hide', function( value ) {
		value.bind( function( to ) {
			if(to == '1') {
				$('#home_products').attr('style', 'display: none !important');
			} else {
				$('#home_products').attr('style', 'display: block');
			}
		} );
	} );

	wp.customize( 'latest_products_headline', function( value ) {
		value.bind( function( to ) {
			if ($('#home_products .home_headline h3').length){
		        $('#home_products .home_headline h3').text(to);
		    } else {
		    	$('#home_products .home_headline').append('<h3>'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'latest_products_subheading', function( value ) {
		value.bind( function( to ) {
			if ($('#home_products .home_headline h4').length){
		        $('#home_products .home_headline h4').text(to);
		    } else {
		    	$('#home_products .home_headline').append('<h4>'+to+'</h4>');
		    }
			
		} );
	} );

	wp.customize( 'latest_products_shop_page_link', function( value ) {
		value.bind( function( to ) {
			$('#home_products .viewallproducts').attr('href', to);
		} );
	} );


	/**
	 * Home: About us
	 */
	wp.customize( 'zerif_aboutus_title', function( value ) {
		value.bind( function( to ) {
			if ($('#aboutus .home_headline h3').length){
		        $('#aboutus .home_headline h3').text(to);
		    } else {
		    	$('#aboutus .home_headline').append('<h3>'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_aboutus_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#aboutus .home_headline h4').length){
		        $('#aboutus .home_headline h4').text(to);
		    } else {
		    	$('#aboutus .home_headline').append('<h4>'+to+'</h4>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_aboutus_biglefttitle', function( value ) {
		value.bind( function( to ) {
			$('#aboutus .big-intro').text(to);
		} );
	} );

	wp.customize( 'zerif_aboutus_text', function( value ) {
		value.bind( function( to ) {
			$('#aboutus .zerif_about_us_center p').text(to);
		} );
	} );
	
	wp.customize( 'zerif_aboutus_title_color', function( value ) {
		value.bind( function( to ) {
			$('#aboutus .home_headline h3').attr('style', 'color: ' + to + ' !important');
			$('#aboutus .home_headline h4').attr('style', 'color: ' + to + ' !important');
			$('#aboutus').removeAttr('style');
			$('.about-us p').removeAttr('style');
			$('.skills .skill h6').removeAttr('style');
		} );
	} );

	/**
	 * Home: Our team
	 */
	wp.customize( 'our_team_heading_clor', function( value ) {
		value.bind( function( to ) {
			$('#team .home_headline h3').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'our_team_subtitle_clor', function( value ) {
		value.bind( function( to ) {
			$('#team .home_headline h4').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	/**
	 * Home: Ribbon Bottom
	 */
	wp.customize( 'zerif_ribbon_text_color', function( value ) {
		value.bind( function( to ) {
			$('.separator-one .container').attr('style', 'color: ' + to + ' !important');
			$('#ribbon_bottom .btn-primary').removeAttr('style');
		} );
	} );

	wp.customize( 'zerif_bottomribbon_text_color', function( value ) {
		value.bind( function( to ) {
			$('#ribbon_bottom .btn-primary').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_bottomribbon_button_border', function( value ) {
		value.bind( function( to ) {
			$('#ribbon_bottom .btn-primary').attr('style', 'border: 1px solid ' + to + ' !important');
		} );
	} );

	/**
	 * Home: Contact
	 */
	wp.customize( 'zerif_contactus_title', function( value ) {
		value.bind( function( to ) {
			if ($('#contact .home_headline h3').length){
		        $('#contact .home_headline h3').text(to);
		    } else {
		    	$('#contact .home_headline').append('<h3>'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_contactus_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#contact .home_headline h4').length){
		        $('#contact .home_headline h4').text(to);
		    } else {
		    	$('#contact .home_headline').append('<h4>'+to+'</h4>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_contacus_header', function( value ) {
		value.bind( function( to ) {
			$('#contact .home_headline h3').attr('style', 'color: ' + to + ' !important');
			$('#contact .home_headline h4').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_contacus_button_background', function( value ) {
		value.bind( function( to ) {
			$('#contact .btn-primary').attr('style', 'background: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_contacus_button_color', function( value ) {
		value.bind( function( to ) {
			$('#contact .btn-primary').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	wp.customize( 'zerif_contacus_background', function( value ) {
		value.bind( function( to ) {
			$('#contact').attr('style', 'background: ' + to + ' !important');
		} );
	} );

	/**
	 * Home: Packages
	 */
	wp.customize( 'zerif_packages_title', function( value ) {
		value.bind( function( to ) {
			if ($('#pricingtable .home_headline h3.white-text').length){
		        $('#pricingtable .home_headline h3.white-text').text(to);
		    } else {
		    	$('#pricingtable .home_headline').append('<h3 class="white-text">'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_packages_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#pricingtable .home_headline h6.white-text').length){
		        $('#pricingtable .home_headline h6.white-text').text(to);
		    } else {
		    	$('#pricingtable .home_headline').append('<h6 class="white-text">'+to+'</h6>');
		    }
			
		} );
	} );

	var background_button_fix = '';
	wp.customize( 'zerif_package_button_background_color', function( value ) {
		value.bind( function( to ) {
			background_button_fix = to;
			$('#pricingtable.packages .package a.custom-button').attr('style', 'background: ' + to + ' !important');
		} );
	} );

	var color_text_button_fix = '';
	wp.customize( 'zerif_package_button_text_color', function( value ) {
		value.bind( function( to ) {
			color_text_button_fix = to;
			$('#pricingtable.packages .package a.custom-button').attr('style', 'color:' + to + ';background: ' + background_button_fix + ' !important');
		} );
	} );

	wp.customize( 'zerif_package_price_background_color', function( value ) {
		value.bind( function( to ) {
			$('.packages .package .price .price-container').attr('style', 'background: ' + to + ' !important');
			$('#pricingtable.packages .package a.custom-button').attr('style', 'color:' + color_text_button_fix + ';background: ' + background_button_fix + ' !important');
		} );
	} );

	/**
	 * Home: Subscribe
	 */
	wp.customize( 'zerif_subscribe_title', function( value ) {
		value.bind( function( to ) {
			if ($('#newsletter_section .home_headline h3').length){
		        $('#newsletter_section .home_headline h3').text(to);
		    } else {
		    	$('#newsletter_section .home_headline').append('<h3>'+to+'</h3>');
		    }
		} );
	} );

	wp.customize( 'zerif_subscribe_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#newsletter_section .home_headline h4').length){
		        $('#newsletter_section .home_headline h4').text(to);
		    } else {
		    	$('#newsletter_section .home_headline').append('<h4>'+to+'</h4>');
		    }
		} );
	} );

	wp.customize( 'zerif_subscribe_header_color', function( value ) {
		value.bind( function( to ) {
			$('#newsletter_section .home_headline h3').attr('style', 'color: ' + to + ' !important');
			$('#newsletter_section .home_headline h4').attr('style', 'color: ' + to + ' !important');
		} );
	} );

	var subscribe_button_background = '';
	var subscribe_button_text = '';
	wp.customize( 'zerif_subscribe_button_background_color', function( value ) {
		value.bind( function( to ) {
			subscribe_button_background = to;
			if(subscribe_button_text) {
				$('#newsletter_section input[type="submit"], #newsletter_section button').attr('style', 'background: ' + to + ' !important; color: ' + subscribe_button_text + ' !important');
			} else {
				$('#newsletter_section input[type="submit"], #newsletter_section button').attr('style', 'background: ' + to + ' !important');
			}
		} );
	} );

	wp.customize( 'zerif_subscribe_button_color', function( value ) {
		value.bind( function( to ) {
			subscribe_button_text = to;
			$('#newsletter_section input[type="submit"], #newsletter_section button').attr('style', 'background: ' + subscribe_button_background + ' !important; color: ' + to + ' !important');
		} );
	} );

	/**
	 * Shop page: Popular products row
	 */
	wp.customize( 'single_shop_last_headline', function( value ) {
		value.bind( function( to ) {
			if ($('#popular_products .home_headline h3').length){
		        $('#popular_products .home_headline h3').text(to);
		    } else {
		    	$('#popular_products .home_headline').append('<h3>'+to+'</h3>');
		    }
		} );
	} );
} )( jQuery );