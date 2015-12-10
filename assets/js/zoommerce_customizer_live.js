( function( $ ) {
	/*
	* Center vertically the big banner content 
	*/
	function zoommerce_verticall_align(target, parent, minus) {

		if(parent) {
			bb_parent = $(parent).height();
		} else {
			bb_parent = $(target).parent().height();
		}

		var bb_top = (bb_parent - $(target).height() - minus) / 2;

		$(target).css('top', bb_top);
	}

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
			$('.home-header-wrap .sub-text').attr('style', 'color: ' + to + ' !important');
		} );
	} );


	var bigtitle_bg = '',
		bigtitle_border = '',
		bigtitle_text = '';
	//Button background
	wp.customize( 'zerif_bigbanner_button_bg_color', function( value ) {
		value.bind( function( to ) {
			bigtitle_bg = 'background: ' + to + ' !important;';
			$('.home-header-wrap .buttons .custom-button').attr('style', 'background: ' + to + ' !important;' + bigtitle_border +  bigtitle_text);
		} );
	} );

	//Button border
	wp.customize( 'zerif_bigbanner_button_border_color', function( value ) {
		value.bind( function( to ) {
			bigtitle_border = 'border: 2px solid ' + to + ' !important;';
			$('.home-header-wrap .buttons .custom-button').attr('style', bigtitle_bg + 'border: 2px solid ' + to + ' !important;' +  bigtitle_text);
		} );
	} );

	wp.customize( 'zerif_bigtitle_1button_color', function( value ) {
		value.bind( function( to ) {
			bigtitle_text = 'color: ' + to + ' !important;';
			$('.home-header-wrap .buttons .custom-button').attr('style', bigtitle_bg + bigtitle_border +  'color: ' + to + ' !important;');
		} );
	} );

	wp.customize( 'zerif_bigtitle_show', function( value ) {
		value.bind( function( to ) {
			if(to == '1') {
				$('#big-banner').addClass('zerif_hidden_if_not_customizer');
			} else {
				$('#big-banner').removeClass('zerif_hidden_if_not_customizer');


				//Center vertically the big banner content 
				zoommerce_verticall_align('.header-content-wrap', '#big-banner', 0);
			}
		} );
	} );

	wp.customize( 'zerif_bigtitle_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#big-banner .big-title-container h4.sub-text').length){
		        $('#big-banner .big-title-container h4.sub-text').text(to);
		    } else {
		    	$('#big-banner .big-title-container').append('<h4.sub-text>'+to+'</h4>');
		    }
			
		} );
	} );

	var bigtitle_button_label = '',
		bigtitle_button_url = '';

	wp.customize( 'zerif_bigtitle_redbutton_label', function( value ) {
		value.bind( function( to ) {
			bigtitle_button_label = to;

			if($('#big-banner .home-header-wrap .buttons').length) {
				$('#big-banner .home-header-wrap .buttons .custom-button').text(to);
			} else {
				$('#big-banner .home-header-wrap .big-title-container').append('<div class="buttons"><a href="'+bigtitle_button_url+'" class="btn btn-primary custom-button">'+to+'</a></div>');
			}

			if(!to.length && !bigtitle_button_url.length) {
				$('#big-banner .home-header-wrap .buttons').remove();
			}
			
		} );
	} );

	wp.customize( 'zerif_bigtitle_redbutton_url', function( value ) {
		value.bind( function( to ) {
			bigtitle_button_url = to;

			if($('#big-banner .home-header-wrap .buttons').length) {
				$('#big-banner .home-header-wrap .buttons .custom-button').attr('href', to);
			} else {
				$('#big-banner .home-header-wrap .big-title-container').append('<div class="buttons"><a href="'+to+'" class="btn btn-primary custom-button">'+bigtitle_button_label+'</a></div>');
			}

			if(!to.length && !bigtitle_button_label.length) {
				$('#big-banner .home-header-wrap .buttons').remove();
			}

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

	var latest_news_bg_img = '',
		latest_news_bg_color = '';
		
	wp.customize( 'zerif_latestnews_background', function( value ) {
		value.bind( function( to ) {
			latest_news_bg_color = to;
			if(!$(latest_news_bg_img).length) {
				if(to == '#') {
					$('#home_blog').removeAttr('style');
				} else {
					$('#home_blog').attr('style', 'background-image: none !important; background-color: ' + to + ' !important');
				}
			}
		} );
	} );

	wp.customize( 'latestnews_bg_image', function( value ) {
		value.bind( function( to ) {
		latest_news_bg_img = to;

			if(to == '#') {
				$('#home_blog').removeAttr('style');
			} else {
				$('#home_blog').attr('style', 'background-color: none; background-image: url(' + to + ') !important');
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

	wp.customize( 'zerif_ourfocus_title', function( value ) {
		value.bind( function( to ) {
			if ($('#focus .home_headline h3').length){
		        $('#focus .home_headline h3').text(to);
		    } else {
		    	$('#focus .home_headline').append('<h3>'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_ourfocus_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#focus .home_headline h4').length){
		        $('#focus .home_headline h4').text(to);
		    } else {
		    	$('#focus .home_headline').append('<h4>'+to+'</h4>');
		    }
			
		} );
	} );

	/**
	 * Home: Latest products
	 */

	var products_headline = '',
		products_subtitle = '';
	wp.customize( 'zoommerce_shopproducts_hide', function( value ) {
		value.bind( function( to ) {
			products_subtitle = to;
			if(to == '1') {
				$('#home_products').attr('style', 'display: none !important');
			} else {
				$('#home_products').attr('style', 'display: block');
			}
		} );
	} );

	wp.customize( 'latest_products_headline', function( value ) {
		value.bind( function( to ) {
			$('#home_products .home_headline h3').text(to)

			if ($('#home_products .left').length) {

				if(to) {

					//Reset
					$('#home_products .left').removeClass('zerif_hidden_if_not_customizer');
					$('#home_products .right').css({'width': ''});

					if ($('#home_products .home_headline h3').length){
				        $('#home_products .home_headline h3').text(to);
				    } else {
				    	$('#home_products .home_headline').append('<h3>'+to+'</h3>');
				    }
			    } else {
					if(!$('#home_products .home_headline h4').text().length > 0) {
						$('#home_products .left').addClass('zerif_hidden_if_not_customizer');
						$('#home_products .right').css({'width': '100%', 'height': '400px'});
					}
				}
			} else {

				//Clear default right style
				$('#home_products .right').css({'width': '', 'height': ''});

				//Add content to divs
				if ($('#home_products .home_headline h3').length){
			        $('#home_products .home_headline h3').text(to);
			    } else {
			    	$('#home_products .home_headline').append('<h3>'+to+'</h3>');
			    }

			}
			
			//Fix height for right section
		    if(!$('#home_products .left').hasClass('zerif_hidden_if_not_customizer')) {
				$('#home_products .right').css('height', $('#home_products .left').outerHeight() + 45);
			}
			products_headline = to;
		} );
	} );

	wp.customize( 'latest_products_subheading', function( value ) {
		value.bind( function( to ) {
			$('#home_products .home_headline h4').text(to)

			if ($('#home_products .left').length) {

				if(to) {

					//Reset
					$('#home_products .left').removeClass('zerif_hidden_if_not_customizer');
					$('#home_products .right').css({'width': ''});

					if ($('#home_products .home_headline h4').length){
				        $('#home_products .home_headline h4').text(to);
				    } else {
				    	$('#home_products .home_headline').append('<h4>'+to+'</h4>');
				    }
			    } else {

					if(!$('#home_products .home_headline h3').text().length > 0) {
						$('#home_products .left').addClass('zerif_hidden_if_not_customizer');
						$('#home_products .right').css({'width': '100%', 'height': '400px'});
					}
				}
			} else {

				//Clear default right style
				$('#home_products .right').css({'width': '', 'height': ''});

				//Add content to divs
				if ($('#home_products .home_headline h4').length){
			        $('#home_products .home_headline h4').text(to);
			    } else {
			    	$('#home_products .home_headline').append('<h4>'+to+'</h4>');
			    }

			}
			
			//Fix height for right section
		    if(!$('#home_products .left').hasClass('zerif_hidden_if_not_customizer')) {
				$('#home_products .right').css('height', $('#home_products .left').outerHeight() + 45);
			}
			
			products_subtitle = to;
		} );
	} );

	wp.customize( 'latest_products_shop_page_link', function( value ) {
		value.bind( function( to ) {
			$('#home_products .viewallproducts').attr('href', to);
		} );
	} );

	wp.customize( 'latest_products_wide_image', function( value ) {
		value.bind( function( to ) {
			console.log(to);
			if(to) {
				$('#home_products .right').attr('style', 'background-image: url(' + to + ');');

				//Check if height adjust is necessary
				if(!$('#home_products .left').hasClass('zerif_hidden_if_not_customizer')) {
					$('#home_products .right').css('height', $('#home_products .left').outerHeight() + 45);
				} else {
					$('#home_products .right').css('height', '400px');
					$('#home_products .right').css('width', '100%');
				}
			} else {
				$('#home_products .right').attr('style', '');
			}
			
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

	wp.customize( 'zerif_ourteam_title', function( value ) {
		value.bind( function( to ) {
			if ($('#team .home_headline h3').length){
		        $('#team .home_headline h3').text(to);
		    } else {
		    	$('#team .home_headline').append('<h3>'+to+'</h3>');
		    }
			
		} );
	} );

	wp.customize( 'zerif_ourteam_subtitle', function( value ) {
		value.bind( function( to ) {
			if ($('#team .home_headline h4').length){
		        $('#team .home_headline h4').text(to);
		    } else {
		    	$('#team .home_headline').append('<h4>'+to+'</h4>');
		    }
			
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

	/**
	 * Home: Products Categories
	 */
	wp.customize( 'zoommerce_shopcats_hide', function( value ) {
		value.bind( function( to ) {
			if(!to == '1') {
				$('#shop_cats').attr('style', 'display: block');
			} else {
				$('#shop_cats').attr('style', 'display: none !important');
			}
		} );
	} );

	/**
	 * General: Footer colors
	 */
	var footer_bg = '',
		footer_text_color = '';

	wp.customize( 'zerif_footer_background', function( value ) {
		value.bind( function( to ) {
			footer_bg = 'background: ' + to + ' !important;';
			$('#footer .section-footer-title').attr('style', 'background: ' + to + ' !important;');
			$('#footer').attr('style', 'background: ' + to + ' !important;' + footer_text_color);
		} );
	} );

	var footer_social_bg = '',
		footer_social_border = '';
	wp.customize( 'zerif_footer_socials_background', function( value ) {
		value.bind( function( to ) {
			footer_social_bg = 'background:' + to + ' !important;';
			$('#footer .footer-widgets').attr('style', 'background: ' + to + ' !important;' + footer_social_border);
		} );
	} );

	wp.customize( 'zerif_footer_socials_border', function( value ) {
		value.bind( function( to ) {
			footer_social_border = 'border-color: ' + to + ' !important;';
			$('#footer .footer-widgets').attr('style', 'border-color: ' + to + ' !important;' + footer_social_bg);
		} );
	} );

	wp.customize( 'zerif_footer_text_color', function( value ) {
		value.bind( function( to ) {
			footer_text_color = 'color: ' + to + ';';
			$('#footer .company-details a, #zerif-copyright').attr('style', 'color: ' + to + ';');
			$('#footer').attr('style', 'color: ' + to + ';' + footer_social_bg);
		} );
	} );

	/**
	 * General: General colors
	 */
	wp.customize( 'zerif_titles_color', function( value ) {
		value.bind( function( to ) {
			$('.entry-title, .woocommerce table.shop_table th, form.woocommerce-checkout h3, .woocommerce-order-received .woocommerce h2').attr('style', 'color: ' + to + ';');
			$('.cart-collaterals h2').attr('style', 'color: ' + to + ';');
			$('.woocommerce-account .woocommerce h2').attr('style', 'color: ' + to + ' !important;');
		} );
	} );

	wp.customize( 'zerif_links_color', function( value ) {
		value.bind( function( to ) {
			$('#content a').attr('style', 'color: ' + to + ' !important;');
		} );
	} );

	/**
	 * General: Buttons colors
	 */
	var buttons_bg = '',
		buttons_color = '';

	wp.customize( 'zerif_buttons_background_color', function( value ) {
		value.bind( function( to ) {
			buttons_bg = 'background: ' + to + ' !important;';
			$('#content input.button, .woocommerce a.button.alt, .viewallproducts, #respond .form-submit input#submit').not('.add_to_cart_button').attr('style', 'background: ' + to + ' !important;' + buttons_color);
		} );
	} );

	wp.customize( 'zerif_buttons_text_color', function( value ) {
		value.bind( function( to ) {
			buttons_color = 'color: ' + to + ' !important;';
			$('#content input.button, .woocommerce a.button.alt, .viewallproducts, #respond .form-submit input#submit').not('.add_to_cart_button').attr('style', 'color: ' + to + ' !important;' + buttons_bg);
		} );
	} );

	/**
	 * General: Shop buttons colors
	 */
	var shop_buttons_bg = '',
		shop_buttons_color = '';

	wp.customize( 'zerif_shop_buttons_background_color', function( value ) {
		value.bind( function( to ) {
			shop_buttons_bg = 'background: ' + to + ' !important;';
			$('a.add_to_cart_button, a.product_type_grouped').attr('style', 'background: ' + to + ' !important;' + shop_buttons_color);
		} );
	} );

	wp.customize( 'zerif_shop_buttons_text_color', function( value ) {
		value.bind( function( to ) {
			shop_buttons_color = 'color: ' + to + ' !important;';
			$('a.add_to_cart_button, a.product_type_grouped').attr('style', 'color: ' + to + ' !important;' + shop_buttons_bg);
		} );
	} );

	/**
	 * General: Footer sections
	 */
	wp.customize( 'zerif_email_icon', function( value ) {
		value.bind( function( to ) {
			if(to.length) {
				$('#footer .company-details.email .icon-left').attr('style', 'display: block;');
				$('#footer .company-details.email .icon-left img').attr('src', to);
			} else {
				$('#footer .company-details.email .icon-left').attr('style', 'display: none;');
			}
		} );
	} );

	wp.customize( 'zerif_email', function( value ) {
		value.bind( function( to ) {
			$('#footer .company-details.email span').empty().append(to);
		} );
	} );

	wp.customize( 'zerif_phone_icon', function( value ) {
		value.bind( function( to ) {
			if(to.length) {
				$('#footer .company-details.phone .icon-left').attr('style', 'display: block;');
				$('#footer .company-details.phone .icon-left img').attr('src', to);
			} else {
				$('#footer .company-details.phone .icon-left').attr('style', 'display: none;');
			}
		} );
	} );

	wp.customize( 'zerif_phone', function( value ) {
		value.bind( function( to ) {
			$('#footer .company-details.phone span').empty().append(to);
		} );
	} );

	wp.customize( 'zerif_address_icon', function( value ) {
		value.bind( function( to ) {
			if(to.length) {
				$('#footer .company-details.address .icon-left').attr('style', 'display: block;');
				$('#footer .company-details.address .icon-left img').attr('src', to);
			} else {
				$('#footer .company-details.address .icon-left').attr('style', 'display: none;');
			}
		} );
	} );

	wp.customize( 'zerif_address', function( value ) {
		value.bind( function( to ) {
			$('#footer .company-details.address span').empty().append(to);
		} );
	} );

	/**
	 * General: Header shop icons
	 */
	wp.customize( 'cart_link', function( value ) {
		value.bind( function( to ) {
			$('header.header .menu-icons').attr('style', 'display: block;');
			$('header.header .menu-icons .myaccount').attr('style', 'display: block;');
			$('header.header .menu-icons .myaccount a').attr('href', to);
		} );
	} );

	wp.customize( 'cart_icon', function( value ) {
		value.bind( function( to ) {
			$('header.header .menu-icons').attr('style', 'display: block;');
			$('header.header .menu-icons .myaccount').attr('style', 'display: block;');
			$('header.header .menu-icons .myaccount a img').attr('src', to);
		} );
	} );

	wp.customize( 'myaccount_link', function( value ) {
		value.bind( function( to ) {
			$('header.header .menu-icons').attr('style', 'display: block;');
			$('header.header .menu-icons .cart').attr('style', 'display: block;');
			$('header.header .menu-icons .cart a').attr('href', to);
		} );
	} );

	wp.customize( 'myaccount_icon', function( value ) {
		value.bind( function( to ) {
			$('header.header .menu-icons').attr('style', 'display: block;');
			$('header.header .menu-icons .account').attr('style', 'display: block;');
			$('header.header .menu-icons .account a img').attr('src', to);
		} );
	} );

	/**
	 * General: Social media icons
	 */
	if(!$('#footer .social').length) {
		$('#footer .footer-box').last().append('<ul class="social"></ul>');
	}

	wp.customize( 'zerif_socials_facebook', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .facebook').length) {
				if(to.length) {
					$('#footer .social .facebook a').attr('href', to);
					$('#footer .social .facebook').attr('style', '');
				} else {
					$('#footer .social .facebook').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .facebook').remove();
				$('#footer .social').append('<li class="facebook"><a target="_blank" href="'+to+'"><i class="fa fa-facebook"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_twitter', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .twitter').length) {
				if(to.length) {
					$('#footer .social .twitter a').attr('href', to);
					$('#footer .social .twitter').attr('style', '');
				} else {
					$('#footer .social .twitter').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .twitter').remove();
				$('#footer .social').append('<li class="twitter"><a target="_blank" href="'+to+'"><i class="fa fa-twitter"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_linkedin', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .linkedin').length) {
				if(to.length) {
					$('#footer .social .linkedin a').attr('href', to);
					$('#footer .social .linkedin').attr('style', '');
				} else {
					$('#footer .social .linkedin').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .linkedin').remove();
				$('#footer .social').append('<li class="linkedin"><a target="_blank" href="'+to+'"><i class="fa fa-linkedin"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_behance', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .behance').length) {
				if(to.length) {
					$('#footer .social .behance a').attr('href', to);
					$('#footer .social .behance').attr('style', '');
				} else {
					$('#footer .social .behance').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .behance').remove();
				$('#footer .social').append('<li class="behance"><a target="_blank" href="'+to+'"><i class="fa fa-behance"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_dribbble', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .dribbble').length) {
				if(to.length) {
					$('#footer .social .dribbble a').attr('href', to);
					$('#footer .social .dribbble').attr('style', '');
				} else {
					$('#footer .social .dribbble').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .dribbble').remove();
				$('#footer .social').append('<li class="dribbble"><a target="_blank" href="'+to+'"><i class="fa fa-dribbble"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_googleplus', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .google').length) {
				if(to.length) {
					$('#footer .social .google a').attr('href', to);
					$('#footer .social .google').attr('style', '');
				} else {
					$('#footer .social .google').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .google').remove();
				$('#footer .social').append('<li class="google"><a target="_blank" href="'+to+'"><i class="fa fa-google"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_pinterest', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .pinterest').length) {
				if(to.length) {
					$('#footer .social .pinterest a').attr('href', to);
					$('#footer .social .pinterest').attr('style', '');
				} else {
					$('#footer .social .pinterest').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .pinterest').remove();
				$('#footer .social').append('<li class="pinterest"><a target="_blank" href="'+to+'"><i class="fa fa-pinterest"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_tumblr', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .tumblr').length) {
				if(to.length) {
					$('#footer .social .tumblr a').attr('href', to);
					$('#footer .social .tumblr').attr('style', '');
				} else {
					$('#footer .social .tumblr').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .tumblr').remove();
				$('#footer .social').append('<li class="tumblr"><a target="_blank" href="'+to+'"><i class="fa fa-tumblr"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_reddit', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .reddit').length) {
				if(to.length) {
					$('#footer .social .reddit a').attr('href', to);
					$('#footer .social .reddit').attr('style', '');
				} else {
					$('#footer .social .reddit').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .reddit').remove();
				$('#footer .social').append('<li class="reddit"><a target="_blank" href="'+to+'"><i class="fa fa-reddit"></i></a></li>');
			}
		} );
	} );

	wp.customize( 'zerif_socials_youtube', function( value ) {
		value.bind( function( to ) {
			if($('#footer .social .youtube').length) {
				if(to.length) {
					$('#footer .social .youtube a').attr('href', to);
					$('#footer .social .youtube').attr('style', '');
				} else {
					$('#footer .social .youtube').attr('style', 'display: none;');
				}
			} else {
				$('#footer .social .youtube').remove();
				$('#footer .social').append('<li class="youtube"><a target="_blank" href="'+to+'"><i class="fa fa-youtube"></i></a></li>');
			}
		} );
	} );

} )( jQuery );