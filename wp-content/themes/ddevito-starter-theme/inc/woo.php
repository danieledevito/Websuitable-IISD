<?php
/**
 * woo.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */


include( get_stylesheet_directory() . '/inc/woo-archive.php' );
include( get_stylesheet_directory() . '/inc/woo-single.php' );

/**
 * =============================
 *
 * General Customizations
 *
 * =============================
 */

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
/**
 * Remove container and content-main wrappers.
 *
 * WC adds these wrappers by default and they just duplicate what's already
 * available in the theme.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_filter( 'woocommerce_enqueue_styles', __NAMESPACE__ . '\\dequeue_woo_commerce_styles' );

/**
 * @param $enqueue_styles
 *
 * @return mixed
 */
function dequeue_woo_commerce_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );        // Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
	return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

