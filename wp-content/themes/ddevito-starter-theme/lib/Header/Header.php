<?php

/**
 * Custom header for the TBSC Child website
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Header;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

class Header {

	/**
	 * Header config file.
	 *
	 * @since 1.0.0
	 *
	 * @var array $config Main config array.
	 */
	protected $config;

	/**
	 * Site options array.
	 *
	 * @since 1.0.0
	 *
	 * @var array $options
	 */
	protected $options;

	/**
	 * Instantiate the Header
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
	public function do_site_header() {
		add_action( 'ezra_after_body_open',         array( $this, 'do_off_canvas' ) );
		add_action( 'ezra_header',                  array( $this, 'do_main_header' ) );
		add_action( 'ezra_before_body_close',       array( $this, 'close_off_canvas_wrapper' ) );
		//Removed grey skew and arc as of 2017-05-23
//		add_action( 'ezra_after_body_open', array( $this, 'getGreySkew' ) );
//		add_action( 'ezra_before_header',           array( $this, 'do_contact_bar' ) );
	}

	/**
	 * Output the off-canvas portion of the header.
	 *
	 * @since 1.0.0
	 */
	public function do_off_canvas() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'header/off-canvas.php' ) );
	}

	public function getGreySkew(){
		?><div id="greySkew"></div><span class="arcWrap"><img src="/images/arc.png" alt="IISD"/></span><?php
	}
	/**
	 * Output custom desktop header / nav.
	 *
	 * Overrides the parent method.
	 *
	 * @since 1.0.0
	 */
	public function do_main_header() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'header/site-header.php' ) );
		include( Views::load_view( TBSC_VIEWS_DIR . 'header/sub-header.php' ) );
	}

	/**
	 * Load off canvas wrapper close.
	 *
	 * Required for the off-canvas mobile menu to work properly.
	 *
	 * @since 1.0.0
	 */
	public function close_off_canvas_wrapper() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'header/off-canvas-wrapper-close.php' ) );
	}

	/**
	 * Output contact bar.
	 *
	 * @since 1.0.0
	 */
	public function do_contact_bar() {
		include( Views::load_view( TBSC_VIEWS_DIR . 'header/tbsc-contact-bar.php' ) );
	}

	/**
	 * Include the proper logo
	 *
	 * @since 2.0.0
	 *
	 * @return mixed
	 */
	protected function do_logo() {

		if ( is_front_page() ) {
			include( Views::load_view( TBSC_VIEWS_DIR . 'header/home-logo.php' ) );
		} else {
			include( Views::load_view( TBSC_VIEWS_DIR . 'header/inner-page-logo.php' ) );
		}

	}

}