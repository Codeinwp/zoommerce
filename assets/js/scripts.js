jQuery(document).ready(function($) {

	/*
	* Center vertically the big banner content 
	*/
	function zoocommerce_verticall_align(target, parent) {

		if(parent) {
			bb_parent = $(parent).height();
		} else {
			bb_parent = $(target).parent().height();
		}

		var bb_top = (bb_parent - $(target).height() - $('header#home').height()) / 2;

		$(target).css('top', bb_top);
	}

	/*
	* Add height on big banner
	*/
	function zoocommerce_viewport_height(target) {
		$(target).css('height', $(window).height() - $('header#home').height() - 32);
	}

	$(window).resize(function() {
		
		//Add height on big banner
		zoocommerce_viewport_height('#big-banner');

		//Center vertically the big banner content 
		zoocommerce_verticall_align('.header-content-wrap', '#big-banner');
		
	}).trigger('resize');
	
	
});