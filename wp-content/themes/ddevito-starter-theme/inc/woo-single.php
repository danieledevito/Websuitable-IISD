<?php
/**
 * woo-archive.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

add_action( 'woocommerce_before_single_product_summary', __NAMESPACE__ . '\\do_single_product_view', 20 );

/**
 * Decide how to layout the single product view.
 *
 * Fancy products using the custom product designer are laid out
 * differently from basic Woo products.
 */
function do_single_product_view() {

	// This seems to be the only database check available.
	$is_fancy_product = CustomData::get_the_post_meta( '_fancy_product', false )[0];

	if ( 'yes' == $is_fancy_product ) {
		do_action( 'fpd_product_designer' );
	}
}

add_action( 'ezra_after_body_open', __NAMESPACE__ . '\\do_default_single_product_view', 1 );


function do_default_single_product_view() {

	add_action( 'woocommerce_before_single_product_summary', function() {
		echo '<div class="single-product-info container"><div class="row"><div class="medium-6 large-8 columns">';
	}, 1 );

	add_action( 'woocommerce_before_single_product_summary', function() {
		echo '</div>';
	}, 21 );

	add_action( 'woocommerce_before_single_product_summary', function() {
		echo '<div class="medium-6 large-4 columns">';
	} , 22 );

	add_action( 'woocommerce_after_single_product_summary', function() {
		echo '</div></div></div>'; // close the column the row and the container / single-product-info

	}, 1 );

}

