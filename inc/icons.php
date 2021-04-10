<?php
/**
 * Theme and WordPress optimizations.
 * 
 * Note that Fontawesome is no longer included in GeneratePress.
 *
 * Must be included in functions.php
 *
 * @package GenerateChild
 * @link https://generatepress.com/fastest-wordpress-theme/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add fontawesome toolkit
 */
add_action( 'wp_enqueue_scripts', 'gpc_load_fa' );
function gpc_load_fa() {
    // On the site front page, is_front_page() always return true, 
    // regardless of whether the site front page displays the blog posts index 
    // or a static page.
    if ( is_front_page() ) {
        wp_enqueue_script( 'cresth-fa', 'https://kit.fontawesome.com/32e3a4766e.js', array(), '1.0.0', true );
    }
}
 