<?php
/**
 * GeneratePress Child Theme functions and definitions
 *
 * All functions are prefixed with gpc_
 *
 * @package GenerateChild
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'GPC_VERSION', '1.0.0' );

/**
 * Load jQuery
 */
add_action( 'wp_footer', 'gpc_load_jquery' );
function gpc_load_jquery() {
 	wp_enqueue_script( 'jquery' );
}

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'gpc_scripts' );
function gpc_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style('generatepress-rtl', 
			trailingslashit(get_template_directory_uri()) . 'rtl.css' 
		);
	}

	wp_enqueue_style('gpc-base', get_stylesheet_directory_uri() . '/css/base.css', false, GPC_VERSION, 'all');

	wp_enqueue_style('ch-style', get_stylesheet_directory_uri() . '/css/style.css', false, GPC_VERSION, 'all');
 
 	wp_enqueue_script('gpc-scripts', get_stylesheet_directory_uri() . '/js/base.js', array('jquery'), GPC_VERSION, true );
}

/**
 * Enqueue admin scripts and styles.
 */
add_action( 'admin_enqueue_scripts', 'gpc_admin_scripts' );
function gpc_admin_scripts() {
    wp_enqueue_style( 'gpc-editor', get_stylesheet_directory_uri() . '/admin/css/editor.css', false, GPC_VERSION, 'all');
}

/**
 * Add body classes.
 */
add_filter( 'body_class', 'gpc_body_classes' );
function gpc_body_classes( $classes ) {
    $classes[] = 'gpc';
    return $classes;
}

/**
 * Add .has-js class to html element.
 */
add_action( 'generate_before_header','gpc_add_js_class' );  
function gpc_add_js_class() { ?> 
    <script>
        const htmlEl = document.documentElement;
        htmlEl.classList.add('has-js');
    </script>
<?php }

/**
 * Include other functions as needed from the `inc` folder.
 */
require get_stylesheet_directory() . '/inc/helper-functions.php';
require get_stylesheet_directory() . '/inc/generatepress.php';
require get_stylesheet_directory() . '/inc/colors.php'; // should be before styles.php to access colors
require get_stylesheet_directory() . '/inc/styles.php';
require get_stylesheet_directory() . '/inc/fonts.php';
require get_stylesheet_directory() . '/inc/generateblocks.php';
require get_stylesheet_directory() . '/inc/dashboard-widgets.php';
require get_stylesheet_directory() . '/inc/widgets.php';
require get_stylesheet_directory() . '/inc/sub-menu-widget.php';
require get_stylesheet_directory() . '/inc/breadcrumbs.php';
require get_stylesheet_directory() . '/inc/optimizations.php';
require get_stylesheet_directory() . '/inc/image-sizes.php';
// require get_stylesheet_directory() . '/inc/wp-show-posts.php';
// require get_stylesheet_directory() . '/inc/cpt-output-custom.php';
// require get_stylesheet_directory() . '/inc/advanced-custom-fields.php';
// require get_stylesheet_directory() . '/inc/woocommerce.php';
// require get_stylesheet_directory() . '/inc/shortcodes.php';
