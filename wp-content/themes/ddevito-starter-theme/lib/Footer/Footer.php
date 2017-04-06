<?php

/**
 * Custom header for the TBSC Child website
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Footer;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

class Footer {

	/**
	 * Site options array.
	 *
	 * @since 1.0.0
	 *
	 * @var array $options
	 */
	protected $options;

	/**
	 * Instantiate the Footer
	 *
	 * @since 1.0.0
	 *
	 * @return self
	 */
	public function __construct() {
		$this->options = CustomData::get_theme_option( 'tbsc_settings' );
	}

	/**
	 * Init hooks.
	 *
	 * Putting methods in their place.
	 *
	 * @since 1.0.0
	 */
	public function do_site_footer() {
		add_action( 'ezra_footer', array( $this, 'do_footer' ) );
//		add_action( 'ezra_after_footer', array( $this, 'do_sub_footer' ) );

	}

	/**
	 * Output the main footer area.
	 *
	 * @since 1.0.0
	 */
	public function do_footer() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'footer/sub-footer.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'footer/site-footer.php' ) );
	}

}