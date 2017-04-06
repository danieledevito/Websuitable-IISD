<?php

/**
 * Main plugin class.
 *
 * This class creates the options page
 * and metabox objects.
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

namespace TBSC_Options;

use TBSC_Core\Config\I_Config;
use TBSC_Options\Admin\OptionsPage;
use TBSC_Options\Admin\OptionsMetabox;
use TBSC_Core\Support\Views;

// Oh no you don't. Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

final class Plugin {

	/**
	 * Configuration parameters
	 *
	 * @var array
	 */
	protected $config;

	/**************************
	 * Instantiate & Initialize
	 *************************/

	/**
	 * Create the plugin object.
	 *
	 * @since 1.0.0
	 *
	 * @param I_Config $config Options page config object.
	 *
	 * @return self
	 */
	public function __construct( I_Config $config ) {

		$this->config = $config->load_config();

	}

	/**
	 * Create the options page.
	 *
	 * @since 1.0.0
	 */
	public function run() {


		if ( is_admin() ) {

			$tbsc_options_page      = new OptionsPage( $this->config );
			$tbsc_options_metaboxes = new OptionsMetabox( $this->config );

			add_action( 'admin_menu', array( $tbsc_options_page, 'create_options_page' ) );
			add_action( 'admin_init', array( $tbsc_options_metaboxes, 'add_metaboxes_to_options_page' ) );

		}
	}

}