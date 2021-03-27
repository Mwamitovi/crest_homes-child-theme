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

    /** 
     * Responsive-menu hack
     *
     * - We have Site & Main menus to handle #ids for homepage scroll
     * - Hide Site menu, on homepage
     * - Hide Main menu, on other pages
     */
    $(`.home   > button:first-of-type,
       .single > button:nth-of-type(2n),
       .home   > button:first-of-type+div,
       .single > button:nth-of-type(2n)+div
    `).addClass('display-none');

  
});
