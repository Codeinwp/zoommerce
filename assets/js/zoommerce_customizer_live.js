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
	
} )( jQuery );

