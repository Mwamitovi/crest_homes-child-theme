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

    // capture woocommerce products `2by3`
    const firstThreeProducts = `
        .home .woocommerce ul.products>li.product:first-child,
        .home .woocommerce ul.products>li.product:nth-child(2),
        .home .woocommerce ul.products>li.product:nth-child(3)
    `;

    const lastThreeProducts = `
        .home .woocommerce ul.products>li.product:last-child,
        .home .woocommerce ul.products>li.product:nth-child(4),
        .home .woocommerce ul.products>li.product:nth-child(5)
    `;

    // Add animation classes
    $(firstThreeProducts).addClass('scroll-fade-in-bottom delay-750 prep-scroll-animation');

    $(lastThreeProducts).addClass('scroll-fade-in-bottom delay-1000 prep-scroll-animation');

});
