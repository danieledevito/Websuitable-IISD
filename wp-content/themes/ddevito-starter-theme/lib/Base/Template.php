<?php

/**
 * Class Template
 *
 * Decides which page template needs to be built.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC\Base;

use TBSC_Core\Config\ArrayConfig;
use TBSC_Core\Support\CustomData;
use TBSC_Core\Support\Views;

class Template {

	/**
	 * Main config.
	 *
	 * @since 1.0.0
	 *
	 * @var array $config Main config array.
	 */
	private $config;

	/**
	 * Header Object
	 *
	 * @since 2.0.0
	 *
	 * @var object $header
	 */
	protected $header;

	/**
	 * Footer Object
	 *
	 * @since 2.0.0
	 *
	 * @var object $footer
	 */
	protected $footer;

	/**
	 * Entry object.
	 *
	 * @since 2.0.0
	 *
	 * @var object $entry
	 */
	protected $entry;

	/**
	 * Instantiate the Template.
	 *
	 * Merges base config file with injected config
	 * file before creating the page.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config page-specific config object.
	 *
	 * @return self
	 */
	public function __construct( array $config ) {

		$default_config_object = new ArrayConfig( TBSC_CONFIG_DIR . 'base/defaults.php' );

		$default_config = $default_config_object->load_config();
		$custom_config  = $config;

		$this->config = array_merge( $default_config, $custom_config );

	}

	/**
	 * Creates a new page.
	 *
	 * This instantiates the page structure and entry objects.
	 *
	 * @since 1.0.0
	 *
	 * @param
	 *
	 * @return object $new_page_object New page template object.
	 */
	public function create_page() {

		/**
		 * Instantiate our header, footer and entry objects.
		 *
		 * @since 1.0.0
		 */
		$this->header = new $this->config['header']();
		$this->footer = new $this->config['footer']();

		if ( array_key_exists( 'entry_config', $this->config ) ) {
			$this->entry = new $this->config['entry'](
				new ArrayConfig( $this->config['entry_config'] )
			);
		} else {
			$this->entry = new $this->config['entry'];
		}

		/**
		 * Header and footer objects are created before all
		 * other hooks so they can hook into any page to
		 * output their views.
		 *
		 * @since 1.0.0
		 */
		add_action( 'ezra_start_page_load', array( $this->header, 'do_site_header' ) );
		add_action( 'ezra_start_page_load', array( $this->footer, 'do_site_footer' ) );
		add_action( 'ezra_start_page_load', array( $this->entry, 'do_the_entry' ) );

		add_action( 'ezra_do_loop', array( $this, 'do_main_loop' ) );

		/**
		 * Load the sidebar.
		 *
		 * Only load the sidebar if the layout chosen
		 * isn't full width.
		 *
		 * @since 1.0.0
		 */
		if ( ( $this->config['sidebar_left'] == true ) ) {

			add_action( 'ezra_sidebar_left', array( $this, 'do_page_sidebar_left' ) );

		}

		if ( ( $this->config['sidebar_right'] == true ) ) {

			add_action( 'ezra_sidebar_right', array( $this, 'do_page_sidebar_right' ) );

		}

		$this->do_base_page_markup( $this->config['base_structure'] );
	}

	/**
	 * Include the core page markup.
	 *
	 * This file inserts all the top-level markup and action hooks
	 * required for other pieces of the page.
	 *
	 * @since 1.0.0
	 */
	private function do_base_page_markup( $base_structure_view ) {
		include( Views::load_view( $base_structure_view ) );
	}

	/**
	 * Output the view for the chosen layout.
	 *
	 * @since 1.0.0
	 */
	public function do_page_layout() {
		include( Views::load_view( $this->config['layout'] ) );
	}

	/**
	 * Output the view for the main loop.
	 *
	 * In the case of a 404 page, there is no loop, so a different
	 * view is used.
	 *
	 * @since 1.0.0
	 */
	public function do_main_loop() {
		include( Views::load_view( $this->config['loop'] ) );
	}

	/**
	 * Output entry header, content and footer container markup with action hooks.
	 *
	 * Each portion of the entry is hooked into place.
	 *
	 * @since 1.0.0
	 */
	public function do_entry_markup() {
		include( Views::load_view( $this->config['entry_markup'] ) );
	}

	/**
	 * Output page sidebar markup.
	 *
	 * @since 1.0.0
	 */
	public function do_page_sidebar_left() {
		include( Views::load_view( $this->config['sidebar_left_view'] ) );
	}

	public function do_page_sidebar_right() {
		include( Views::load_view( $this->config['sidebar_right_view'] ) );
	}

}