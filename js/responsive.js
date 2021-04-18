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

    const singleProductView = `
        .product .woocommerce-product-gallery,
        .product .summary
    `;

    // Add animation classes
    $(firstThreeProducts).addClass('scroll-fade-in-bottom prep-scroll-animation');

    $(lastThreeProducts).addClass('scroll-fade-in-bottom delay-500 prep-scroll-animation');

    // doesn't wait for scroll
    // note that there's no "prep-animation" for it causes a bug when loading product summary
    // the "prep-animation" remains stuck thus "visibility:hidden"
    $(singleProductView).addClass('brand-color fade-in-bottom delay-500');

    // Add `data-lity` attribute to trigger lightbox pop-ups
    $('.pop-up-link .wp-block-image > a').attr('data-lity', '');

});
