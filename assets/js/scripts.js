jQuery(document).ready(function($) {

	function zoommerce_verticall_align(target) {
		var bb_parent = $(target).parent().height(),
			bb_top = (bb_parent - $(target).height() - $('header#header').height()) / 2;

		$(target).css('top', bb_top);
	}

	$(window).resize(function() {
		/*
		* Center vertically the big banner content 
		*/
		zoommerce_verticall_align('.header-content-wrap');
	}).trigger('resize');
	
	
});