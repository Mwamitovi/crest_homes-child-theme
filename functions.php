<?php
/**
 * Theme functions and definitions
 *
 * @package GeneratePressChild
 */

/**
 * Load child theme scripts
 *
 * @return void
 */


function ch_load_jquery() 
{
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'ch_load_jquery' );


function ch_child_enqueue_scripts()
{
	if ( is_rtl() ) {
		wp_enqueue_style('generatepress-rtl', 
			trailingslashit(get_template_directory_uri()) . 'rtl.css' 
		);
	}
}
add_action( 'wp_enqueue_scripts', 'ch_child_enqueue_scripts', 999 );

add_action( 'wp_footer', 'my_header_scripts' );
function my_header_scripts()
{
  ?>
  <script>console.log( 'Hi Martin' ); </script>
  <?php
}

