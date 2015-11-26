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
			$('#big-banner .sub-text').css('color', to);
		} );
	} );

	//Button background
	wp.customize( 'zerif_bigbanner_button_bg_color', function( value ) {
		value.bind( function( to ) {
			$('.home-header-wrap .buttons .custom-button').css('background', to);
		} );
	} );

	//Button border
	wp.customize( 'zerif_bigbanner_button_border_color', function( value ) {
		value.bind( function( to ) {
			$('.home-header-wrap .buttons .custom-button').css('border', '2px solid ' + to);
		} );
	} );

	wp.customize( 'zerif_bigtitle_1button_color', function( value ) {
		value.bind( function( to ) {
			$('.home-header-wrap .buttons .custom-button').css('color', to);
		} );
	} );
	
} )( jQuery );

