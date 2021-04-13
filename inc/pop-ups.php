<?php
/**
 * Theme and WordPress optimizations.
 * 
 * Note the pop-ups are powered by `lity.js`.
 *
 * Must be included in functions.php
 *
 * @package Lity
 * @link https://github.com/jsor/lity
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add lity (pop-up) functionality
 */
add_action( 'wp_enqueue_scripts', 'ch_load_lity' );
function ch_load_lity() {
    // Used primiraily on the `Our Homes` page
    if ( is_page( 'Homes' ) ) {

    	wp_enqueue_style('cresth-lity-style', get_stylesheet_directory_uri() . '/vendor/lity-2.4.1/dist/lity.min.css', false, GPC_VERSION, 'all');

    	// required `jquery`
	 	wp_enqueue_script('cresth-lity-scripts', get_stylesheet_directory_uri() . '/vendor/lity-2.4.1/dist/lity.min.js', array('jquery'), GPC_VERSION, true );
    }
}
 