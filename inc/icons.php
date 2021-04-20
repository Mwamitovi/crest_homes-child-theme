<?php
/**
 * Theme and WordPress optimizations.
 * 
 * Note that Fontawesome is no longer included in GeneratePress.
 *
 * We included "flaticon" in functions.php
 *
 * @package GenerateChild
 * @link https://generatepress.com/fastest-wordpress-theme/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add fontawesome toolkit
 */
add_action( 'wp_enqueue_scripts', 'gpc_load_icon' );
function gpc_load_icon() {
    // On the site front page, is_front_page() always return true, 
    // regardless of whether the site front page displays the blog posts index 
    // or a static page.
    if ( is_front_page() ) {
        wp_enqueue_style('cresth-style-flat', get_stylesheet_directory_uri() . '/vendor/flaticon/flaticon.css');
    }
}
 