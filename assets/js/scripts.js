jQuery(document).ready(function($) {

	/*** centered menu */
	var callback_menu_align = function () {

	    "use strict"

	    var headerWrap      = jQuery('.header');
	    var navWrap         = jQuery('#site-navigation');
	    var logoWrap        = jQuery('.logo-header-wrap');
	    var containerWrap   = jQuery('.container');
	    var cartHeaderWrap  = jQuery( '.menu-icons' );

	    var classToAdd      = 'menu-align-center';

	    if( cartHeaderWrap.length > 0 && jQuery( '.menu-align-center-cart' ).length < 1 ) {
	        headerWrap.addClass( 'menu-align-center-cart' );
	    }

	    if ( headerWrap.hasClass(classToAdd) ) {
	        headerWrap.removeClass(classToAdd);
	    }
	    var logoWidth       = logoWrap.outerWidth();
	    var menuWidth       = navWrap.outerWidth();
	    var containerWidth  = containerWrap.width();
	    var cartHeaderWidth = cartHeaderWrap.outerWidth();

	    if ( menuWidth + logoWidth + cartHeaderWidth > containerWidth-30 ) {
	        headerWrap.addClass(classToAdd);
	    }
	    else {
	        if ( headerWrap.hasClass(classToAdd) ) {
	            headerWrap.removeClass(classToAdd);
	        }
	    }
	}
	jQuery(window).load(callback_menu_align);
	jQuery(window).resize(callback_menu_align);


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

	/*
	* Add height on big banner
	*/
	function zoommerce_viewport_height(target) {
		$(target).css('height', $(window).height() - $('header#home').height());
	}

	var index = 0;
	function zoommerce_height_match(target) {
		$(target).css('height', 'auto');
		var allHeights = [],
		    maxHeight = '';
		    $(target).each(function() {
		        var heights = $(this).height();
		        allHeights.push(heights);
		        maxHeight = Math.max.apply(null, allHeights);
		    });
		    $(target).css("height", maxHeight);
	}

	/*
	* Reduce menu width function
	*/
	function zoommerce_reduce_menu_width(target, maxval) {
		var full_width = 0;
		jQuery(target).each(function( index ) {    
			if((jQuery(this).width() + full_width) > maxval) {
				jQuery(this).remove();
			}
			full_width = full_width + jQuery(this).width(); 
		});
	}

	/*
	* Run functions on resize and load to avoid bugs 
	*/
	$(window).resize(function() {

		/*
		* Responsive fixes
		*/
		if($(window).height() < 710) {
			$('.header-content-wrap').addClass('smallHeightViewport');
		} else {
			$('.header-content-wrap').removeClass('smallHeightViewport');
		}
		
		//Add height on big banner
		zoommerce_viewport_height('#big-banner');

		//Center vertically the big banner content 
		zoommerce_verticall_align('.header-content-wrap', '#big-banner', 0);

		//Run functions after window is ready and assets are loaded
		$(window).load(function() {
			//Home products height match
			zoommerce_height_match('#home_products .product');
			//Home blog posts height match
			zoommerce_height_match('#home_blog .post');
		})
		$(window).resize(function() {	
			//Home products height match
			zoommerce_height_match('#home_products .product');
			//Home blog posts height match
			zoommerce_height_match('#home_blog .post');
		});

		
		/*
		* Home - Add height on products right image
		*/
/**
		if(!$('#home_products .left').hasClass('zerif_hidden_if_not_customizer')) {
			$('#home_products .right').css('height', $('#home_products .left').outerHeight() + 45);
		}
**/		
		// if($(window).width() <= 960 && $(window).width() >= 767) {
		// 	if(document.getElementsByClassName("center_on_responsive").length == 0) {
		// 		zoommerce_reduce_menu_width('nav#site-navigation ul:first > li', 460);
		// 	}
		// }
	}).trigger('resize');

	/*
	* Reduce menu size on desktop
	*/
	// if($(window).width() >= 960) {
	// 	if(document.getElementsByClassName("center_on_responsive").length == 0) {
	// 		zoommerce_reduce_menu_width('nav#site-navigation ul:first > li', 550);
	// 	} else {
	// 		zoommerce_reduce_menu_width('nav#site-navigation ul:first > li', 460);
	// 	}
	// }

	/*
	* Call owl carousel for testimonials
	*/
	$(".testimonials_wrap").owlCarousel({
	    navigation:false,
	    paginationSpeed : 1000,
	    goToFirstSpeed : 2000,
	    singleItem : true,
	    autoHeight : true,
	    transitionStyle:"fade"
	});

	/*
	* Call owl carousel for blog posts
	*/
	var homeBlogOwl = $("#home_blog .items_wrapper");
	homeBlogOwl.owlCarousel({
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1000,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [960,1], // betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});

	$("#home_blog .next_posts").click(function(){
		homeBlogOwl.trigger('owl.next');
	});

	$("#home_blog .prev_posts").click(function(){
		homeBlogOwl.trigger('owl.prev');
	});

	/*
	* Big banner arrow scroll
	*/
	$('#big-banner .down-arrow').click(function(e) {
		e.preventDefault();

		$('html, body').animate({scrollTop: $(this).offset().top});
	});
});