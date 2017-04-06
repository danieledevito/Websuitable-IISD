<?php
/**
 * woo-customizations.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC_Core\Support\Views;


// Remove woocommerce_result_count and woocommerce_catalog_ordering b/c we'll place them elsewhere.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Remove Ratings
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

/**
 * Rebuild the product display on archive listings.
 */
add_action( 'ezra_after_body_open', __NAMESPACE__ . '\\rebuild_add_to_cart_button' );

/**
 * Wrap the add to cart button and product name in a custom div.
 *
 * This will allow me to more easily move the items as a whole.
 */
function rebuild_add_to_cart_button() {
	// Remove the button from its default position
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );

	// Wrap everything but the image to group Title and Add to Cart button together.
	add_action( 'woocommerce_before_shop_loop_item_title', function () {
		echo '<div class="item-info-wrap">';
	} );

	// Add the button back into the view.
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart' );

	add_action( 'woocommerce_after_shop_loop_item_title', function () {
		echo '</div>';
	} );


}

add_action( 'ezra_after_body_open', __NAMESPACE__ . '\\wrap_product_title' );

/**
 * Put a div around the Title to give us display: block
 */
function wrap_product_title() {
	add_action( 'woocommerce_shop_loop_item_title', function () {
		echo '<div class="product-title">';
	}, 9 );
	add_action( 'woocommerce_shop_loop_item_title', function () {
		echo '</div>';
	}, 11 );
}

add_action( 'ezra_after_body_open', __NAMESPACE__ . '\\customize_add_to_cart_button_text' );

/**
 * Edit Add to Cart text.
 */
function customize_add_to_cart_button_text() {
	// Remove price as we'll add it in place of the add-to-cart text.
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );

	add_filter( 'woocommerce_loop_add_to_cart_link', __NAMESPACE__ . '\\woo_custom_cart_button_text', 999 );
}

function woo_custom_cart_button_text( $string ) {

	global $product;
//
	$price = $product->get_price_html();

	// Wrap span tags around the cents in the price.
	$price = str_replace( '.', '.<span class="cents">', $price );
	$price = preg_replace( '</span>', '/span</span', $price, 1 );

	return sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button product_type_simple add_to_cart_button ajax_add_to_cart' ),
		$price,
		esc_html( $product->add_to_cart_text() )
	);

}

/**
 * =====================
 *
 * Pagination
 *
 * =====================
 */
add_action( 'ezra_after_body_open', __NAMESPACE__ . '\\customize_pagination' );

function customize_pagination() {
	add_action( 'woocommerce_after_shop_loop', function () {
		echo '<div class="pagination loop-pagination">';

	}, 9 );

	add_action( 'woocommerce_after_shop_loop', function () {
		echo '</div>';

	}, 11 );

}