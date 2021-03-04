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