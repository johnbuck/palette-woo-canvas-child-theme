/*-----------------------------------------------------------------------------------*/
/* GENERAL SCRIPTS */
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
	// SVG Modernizr detect and PNG replace
	// toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script
	if(!Modernizr.svg) {
		jQuery('img[src*="svg"]').attr('src', function () {
			return $(this).attr('src').replace('.svg', '.png');
		});
	}

});

