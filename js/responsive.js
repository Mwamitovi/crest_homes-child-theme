jQuery(document).ready(function( $ ){

	/**
     * Handles site reponsive behaviour
     *
     * - Add classes
     * - Remove Classes
	 */

    // hide main-menu on mobile and tablet 
    $(".site-header .main-navigation").addClass('mobile-hide tablet-hide'); 

    // Overide "Sticky menu" settings
    $(".site-header").addClass('full-screen');

});
