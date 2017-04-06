<?php

/**
 * Class Page404
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Pages;

use TBSC_Core\Support\Views;

/**
 * Class Page404
 *
 * Extends Page so that any items added to pages will also
 * apply to the 404 page.
 *
 * @since 2.0.0
 *
 * @package TBSC\Pages
 */
class Page404 {


	/**
	 * Create the page.
	 *
	 * Call the parent method last, to make sure all hooks are
	 * available for the Page entry to work.
	 *
	 * @since 3.0.0
	 */
	public function do_the_entry() {

		add_action( 'ezra_before_entry',    array( $this, 'do_page_content' ) );

	}

	/**
	 * Output entry header.
	 *
	 * @since 1.0.0
	 */
	public function do_page_content() {
		include( Views::load_view( TBSC_VIEWS_DIR . '404/entry.php' ) );
	}

}