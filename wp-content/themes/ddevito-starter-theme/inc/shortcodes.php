<?php
/**
 * shortcodes.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */


use TBSC_Core\Support\Views;

add_filter('widget_text', 'do_shortcode');

function tlb_author_box() {
	// Return business information.
	ob_start();
	include( Views::load_view( TBSC_VIEWS_DIR . 'shortcodes/author.php' ) );

	return ob_get_clean();
}

add_shortcode( 'author_box', 'tlb_author_box' );