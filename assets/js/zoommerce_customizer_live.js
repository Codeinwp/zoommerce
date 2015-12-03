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
	
} )( jQuery );