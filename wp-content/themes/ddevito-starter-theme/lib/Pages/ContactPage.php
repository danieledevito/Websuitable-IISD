<?php

/**
 * Class ContactPage
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Pages;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

class ContactPage {

	/**
	 * Custom Post Meta common to all pages and posts.
	 *
	 * @var
	 */
	protected $common_meta;

	public function __construct() {

		$this->common_meta = CustomData::get_the_post_meta( '_tbsc_common_custom_post_meta', false )[0];
	}


	/**
	 * Create the page.
	 *
	 * Call the parent method last, to make sure all hooks are
	 * available for the Page entry to work.
	 *
	 * @since 3.0.0
	 */
	public function do_the_entry() {
		add_action('ezra_before_loop', array($this, 'getWrapStart'));
		add_action('ezra_after_loop', array($this, 'getWrapEnd'));
		add_action( 'ezra_entry',    array( $this, 'getEditorHtml' ) );

	}
	public function getWrapStart(){ ?><div class="contact-page-wrap"><?php }
	public function getWrapEnd(){ ?></div><?php }
	/**
	 * Output entry.
	 *
	 * @since 1.0.0
	 */
	public function getEditorHtml() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'pages/contact-page.php' ) );
	}

}