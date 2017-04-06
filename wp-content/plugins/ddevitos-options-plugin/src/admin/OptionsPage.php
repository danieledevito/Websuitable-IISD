<?php

/**
 * class-options-page.php
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

namespace TBSC_Options\Admin;

use TBSC_Core\Support\Views;

class OptionsPage {

	/**
	 * Main config array.
	 *
	 * Contains info needed to create the
	 * options page and each metabox.
	 *
	 * @var array $config
	 */
	protected $config = array();

	/**
	 * The settings for the options page.
	 *
	 * @var array $settings Settings key in the main config array.
	 */
	protected $settings = array();

	/**
	 * OptionsPage constructor.
	 *
	 * @param array $config Main config array.
	 *
	 * @return self
	 */
	public function __construct( $config ) {

		$this->settings = $config['main_settings'];

	}

	/**
	 * Create the options page.
	 *
	 * @since 1.0.0
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_menu_page
	 */
	public function create_options_page() {

		add_menu_page(
			$this->settings['heading'],
			$this->settings['menu_title'],
			'edit_theme_options',
			$this->settings['page_slug'],
			array( $this, 'render_options_page' ),
			$this->settings['dashicon'],
			999 // Place at the bottom of the dash menu
		);

	}

	/**
	 * Output the options page.
	 *
	 * @since 1.0.0
	 */
	public function render_options_page() {

		include( Views::load_view( TBSC_OPTIONS_PLUGIN_DIR . 'src/views/options-page/options-page.php' ) );

	}
}