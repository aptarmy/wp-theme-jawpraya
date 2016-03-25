/**
 * main.js
 *
 * For all custom js codes.
 */

// loading
jQuery(window).load(function(){
	jQuery(".loading-bg").fadeOut(500, function(){ jQuery(this).remove(); });
});

jQuery(document).ready(function($) {  
	
	// toggle mobile menu
	$(".site-toggle").click(function(){ $("body").toggleClass("menu-active"); });

	// Animation : add class "loaded" to body after Window is loaded completely
	$(window).load(function(){ $("body").addClass("loaded"); });

});
