<?php
/**
 * Woocommerce stuff.
 *
 * - Single Product Page
 * - Checkout Page
 *
 * @package GenerateChild
 * @link https://woocommerce.com/
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/* Single Product Page */


/**
 * Remove sidebar.
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

/* 
 * Remove the product tabs.
 */
add_filter( 'woocommerce_product_tabs', '__return_empty_array', 98 );

/**
* Remove related products output
*/
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Remove the breadcrumbs.
 */
add_action( 'init', 'gpc_remove_wc_breadcrumbs' );
function gpc_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/* 
 * Add Custom breadcrumbs.
 */
add_action( 'woocommerce_before_main_content', 'cresth_breadcrumbs' );
function cresth_breadcrumbs() {
	global $post;

	// var_dump($post);

 	// If we are only a single product page
    if ( function_exists( 'is_woocommerce' ) && is_product() ) {
    	$home_url = get_home_url();
    	$our_homes_url = get_permalink( get_page_by_title( 'Homes' ) ); // our-homes page

    	// woo
    	$product_title = get_the_title( $post->ID );

        // return 'customized breadcrumbs';
		echo '<nav class="customized brand-color"><a href="' . $home_url . '">Home</a>&nbsp;&gt;&nbsp;<a href="' . $our_homes_url . '">Our homes</a>&nbsp;&gt;&nbsp;' . $product_title . '</nav>';
    }
};

/* 
 * Remove Title and Categories.
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
 * Add Custom Title and Video.
 */
add_action( 'woocommerce_before_single_product_summary', 'cresth_product_title_and_video' );
function cresth_product_title_and_video() {
	global $post;
	
	$video_meta = get_post_meta( $post->ID, '_product_background_video', true );

	$product_title = the_title( '<h2 class="product_title entry-title custom-title brand-color fade-in-bottom prep-animation">', '</h2>' );

	// $product_video = $video_meta ? wp_get_attachment_url( $video_meta ) : ' ';
	$product_video = ' ';

  	// Delete this line if you want space(s) to count as not empty
  	$var = trim($product_video);
  
  	if( isset($var) === true && $var !== '' ) {
  
      	// video is not empty
		$show_video = sprintf(
			'%1$s<div class="video-wrapper"><video id="video-preview" class="product-video fade-in-bottom delay-500 prep-animation" autoplay="" loop="" muted="" playsinline=""><source src="%2$s" type="video/mp4"></video></div>',
			$product_title, // custom title
			$product_video  // custom video
		);
		
		echo $show_video;
  
  	};
}


/* 
 * Add a Custom "tabs" section.
 *
 * - Removed the "<ul>" for showing tabs
 *
 * - Maintaned the "content", in this case, the description
 *   And wrap it using start/end functions
 *
 * @hooked cresth_start_product_description - 10
 * @hooked cresth_woo_product_description - 15
 * @hooked cresth_end_product_description - 20
 * @hooked cresth_start_close - 25
 * @hooked cresth_product_close - 30
 * @hooked cresth_end_close - 40
 *
 */
add_action( 'woocommerce_after_single_product_summary', 'cresth_start_description', 10 );
add_action( 'woocommerce_after_single_product_summary', 'cresth_woo_product_description', 15 );
add_action( 'woocommerce_after_single_product_summary', 'cresth_end_description', 20 );
add_action( 'woocommerce_after_single_product_summary', 'cresth_start_close', 25 );
add_action( 'woocommerce_after_single_product_summary', 'cresth_product_close', 30 );
add_action( 'woocommerce_after_single_product_summary', 'cresth_end_close', 40 );

function cresth_start_description() {

	echo '<div class="woocommerce-tabs wc-tabs-wrapper customized brand-color scroll-fade-in-bottom delay-500 prep-scroll-animation"><div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab block px3">';
}

function cresth_woo_product_description() {
	
	wc_get_template( 'single-product/tabs/description.php' );
}

function cresth_end_description() {

	echo '</div></div>';
}

function cresth_start_close() {

	echo '<section class="customized brand--section"><div class="ch-product-close"><div class="ch-column"><div class="ch-container px3 desktop-center tablet-center mobile-center scroll-fade-in-bottom prep-scroll-animation"><div class="ch-inside-container">';
}

function cresth_product_close() {
	$closing_title = the_title( '<h2 class="has-text-align-center has-text-color brand-color">Enjoy your stay at <span style="font-weight:200">', '</span>.</h2>' );

	echo $closing_title;
}

function cresth_end_close() {

	echo '</div></div></section>';
}


/* Checkout Page */


/**
* Customize the "billing" fields
*/
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {

	/* Remove some fields */

	unset($fields['billing']['billing_address_2']); // apartment/suite
	unset($fields['billing']['billing_city']); 		// town/village
	unset($fields['billing']['billing_state']); 	// District

	/* Shift the fields */

	$order = array(
	    "billing_first_name",
	    "billing_last_name",
	    "billing_phone",
	    "billing_email",
	    "billing_company",
	    "billing_address_1",
	    "billing_country",
	);

	foreach( $order as $field ) {
		$ordered_fields[$field] = $fields["billing"][$field];
  	};

	$fields['billing'] = $ordered_fields;

	$fields['billing']['billing_first_name']['priority'] 	= 10;
	$fields['billing']['billing_last_name']['priority'] 	= 20;
	$fields['billing']['billing_phone']['priority'] 		= 30;
	$fields['billing']['billing_email']['priority'] 		= 40;
	$fields['billing']['billing_company']['priority'] 		= 50;
	$fields['billing']['billing_address_1']['priority'] 	= 60;
	$fields['billing']['billing_country']['priority'] 		= 70;

	/* Customize labels */

	$fields['billing']['billing_phone']['label'] 	= 'Pnone no.';
	$fields['billing']['billing_country']['label'] 	= 'Nationality / Country';	

	return $fields;
}

/**
* Customize the "address" field; uses special filter
*/
add_filter( 'woocommerce_default_address_fields' , 'cresth_custom_address_field' );
function cresth_custom_address_field( $fields ) {	
	$fields['address_1']['placeholder'] = '';

	return $fields;	
}

/**
* Customize the "Place order" text
*/
add_filter( 'woocommerce_order_button_text', 'cresth_custom_order_button_text' ); 
function cresth_custom_order_button_text() {
    return __( 'Pay now', 'woocommerce' ); 
}

/**
* Customize the "checkout" field
*/
add_filter( 'woocommerce_checkout_fields' , 'cresth_override_checkout_fields' );
function cresth_override_checkout_fields( $fields ) {

	$fields['order']['order_comments']['label'] 		= 'Booking notes';
	$fields['order']['order_comments']['placeholder'] 	= 'Notes about your booking, e.g. special notes for my check-in.';

	return $fields;
}


/* Cart Page */


/**
 * Customize the "shop page" link
 *
 * - Crest homes has no "shop page", we use "Homes page" for that purpose
 *
 */
add_filter( 'woocommerce_get_shop_page_permalink', 'cresth_get_shop_page_permalink' );
function cresth_get_shop_page_permalink( $link ) {
	// our-homes page
	$our_homes_url = get_permalink( get_page_by_title( 'Homes' ) );
	$link = $our_homes_url;

	return $link;
}

/**
 * Customize the "text/messages"
 *
 */
add_filter( 'gettext', 'change_woo_return_to_shop_text', 20, 3 );
function change_woo_return_to_shop_text( $translated_text, $text, $domain ) {

    switch ( $translated_text ) {
        case 'Your cart is currently empty.' :
            $translated_text = __( 'Sorry, you have no booking yet.', 'woocommerce' );
            break;
        case 'Return to shop' :
            $translated_text = __( 'Return to homes', 'woocommerce' );
            break;
    }

    return $translated_text;
}