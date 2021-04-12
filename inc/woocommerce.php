<?php
/**
 * Woocommerce stuff.
 *
 * @package GenerateChild
 * @link https://woocommerce.com/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Remove sidebar from single-product page.
 */
add_filter( 'generate_sidebar_layout', 'gpc_woo_sidebar' );
function gpc_woo_sidebar( $layout ) {
 	// If we are on a woocommerce page, remove the sidebar
    if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
        return 'no-sidebar';
    }

    if ( function_exists( 'is_woocommerce' ) && (is_cart() || is_checkout()) ) {
        return 'no-sidebar';
    }

    // Or else, set the regular layout
    return $layout;
}

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'gpc_remove_wc_breadcrumbs' );
function gpc_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/* 
 * Remove Title and Categories from Single Products (page)
 *
 * - Default Woo "title" is replaced with custom title 
 *   @See "cresth_product_title_and_video" below
 *
 * - Categories are simply hidden
 *
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/* 
 * Add Custom breadcrumbs to the Single Products (page)
 */
add_action( 'woocommerce_before_main_content', 'cresth_breadcrumbs' );
function cresth_breadcrumbs() {
	global $post;

	// var_dump($post);

 	// If we are only a single product page
    if ( function_exists( 'is_woocommerce' ) && is_product() ) {
    	$home_url = get_home_url();
    	$our_homes_url = get_permalink( get_page_by_title( 'Homes' ) );

    	// woo
    	$product_title = get_the_title( $post->ID );

        // return 'customized breadcrumbs';
		echo '<nav class="customized brand-color"><a href="' . $home_url . '">Home</a>&nbsp;&gt;&nbsp;<a href="' . $our_homes_url . '">Our homes</a>&nbsp;&gt;&nbsp;' . $product_title . '</nav>';
    }
};

