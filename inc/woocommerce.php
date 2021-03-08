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
 * Remove Categories from Single Products (description)
 */ 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
