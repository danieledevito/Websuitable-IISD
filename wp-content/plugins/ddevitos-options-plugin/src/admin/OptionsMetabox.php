<?php

/**
 * class-options-metabox.php
 *
 * @package    Theme Options
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

namespace TBSC_Options\Admin;

class OptionsMetabox {

	/**
	 * Metabox section names
	 *
	 * @var array $metabox Metabox section names.
	 */
	protected $metabox = array();

	/**
	 * Options page settings.
	 *
	 * @var array $settings Main options page settings.
	 */
	protected $settings = array();

	/**
	 * Full list of all field data to be sanitized.
	 *
	 * Creating this list allows us to sanitize all
	 * the things upon options page save.
	 *
	 * @var array
	 */
	protected $field_sanitization_list = array();

	/**
	 * OptionsMetabox constructor.
	 *
	 * @param array $config Options page config file.
	 *
	 * @return self
	 */
	public function __construct( $config ) {
		$this->settings                = $config['main_settings'];
		$this->metabox                 = $config['metabox_sections'];
		$this->field_sanitization_list = $this->build_sanitization_list();
	}

	/**
	 * Read config arrays for option sections and fields.
	 *
	 * @since 1.0.0
	 */
	public function add_metaboxes_to_options_page() {
		$this->register_option_group_and_db_name();
		$this->walk_section_config_array();
		$this->walk_fields_config_array();
	}

	/**
	 * Register the option group and the database option_name.
	 *
	 * @since 1.0.0
	 *
	 * @link https://codex.wordpress.org/Function_Reference/register_setting
	 */
	protected function register_option_group_and_db_name() {
		register_setting(
			$this->settings['option_group'],
			$this->settings['option_name'],
			array( $this, 'sanitize_all_the_things' )
		);
	}

	/**
	 * Sanitize option field input value.
	 *
	 * Method will use core sanitization callbacks if found.
	 * If core callback not found, method will look for a new method
	 * within this class.
	 *
	 * @since 1.0.0
	 *
	 * @param array $option_value_array Array of option key and value pairs.
	 *
	 * @return array $option_value_array Array with sanitized input values.
	 */
	public function sanitize_all_the_things( $option_value_array ) {

		foreach ( $option_value_array as $option_array_key => $val ) {
			$sanitize_function = $this->field_sanitization_list[ $option_array_key ];
			if ( function_exists( $this->field_sanitization_list[ $option_array_key ] ) ) {
				$new_val = $sanitize_function( $val );
			} else {
				$new_val = $this->$sanitize_function( $val );
			}
			$option_value_array[ $option_array_key ] = $new_val;
		}

		return $option_value_array;
	}

	/**
	 * Look through all the sections in the config file.
	 *
	 * @since 1.0.0
	 */
	protected function walk_section_config_array() {
		array_walk( $this->metabox, array( $this, 'add_section' ) );
	}

	/**
	 * Create option sections.
	 *
	 * @since 1.0.0
	 *
	 * @param $section
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_settings_section
	 */
	protected function add_section( $section ) {
		/**
		 * Output custom description for each section.
		 *
		 * @since 1.0.0
		 */
		$callback = function () use ( $section ) {
			echo '<p>' . $section['args']['desc'] . '</p>';
		};
		add_settings_section(
			$section['args']['id'],
			$section['args']['title'],
			$callback,
			$section['args']['page_slug']
		);
	}

	/**
	 * Walk through each option section to find fields.
	 *
	 * @since 1.0.0
	 */
	protected function walk_fields_config_array() {
		array_walk( $this->metabox, array( $this, 'walk_fields_to_add_fields' ) );
	}

	/**
	 * Walk each field found in each section.
	 *
	 * @since 1.0.0
	 *
	 * @param array $section Section config array.
	 */
	protected function walk_fields_to_add_fields( $section ) {
		array_walk( $section['fields'], array( $this, 'add_fields' ) );
	}

	/**
	 * Add each field to their sections.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field Option fields.
	 */
	protected function add_fields( $field ) {

		// Grab options to use in the view files.
		$options = get_option( $this->settings['option_name'] );

		// Get field Value
		$value = $this->get_field_value( $options, $field );

		// Include the appropriate view file.
		$view = $this->settings['views'][ $field['type'] ];

		$callback = function () use ( $field, $options, $view, $value ) {
			$this->render_view( $field, $options, $view, $value );
		};
		add_settings_field(
			$field['id'],
			$field['title'],
			$callback,
			$field['page_slug'],
			$field['section']
		);
	}

	/**
	 * Get the field value.
	 *
	 * If the custom option key does not exist
	 * the method will return an empty string to the value
	 * in the form.
	 *
	 * @since 1.0.0
	 *
	 * @param array $options Post meta array.
	 * @param array $field Metabox field.
	 *
	 * @return string $value Empty string if no custom option key found.
	 */
	protected function get_field_value( $options, $field ) {

		if ( false == $options ) {
			return '';
		} elseif ( array_key_exists( $field['key'], $options ) ) {
			return $options[ $field['key'] ];
		} else {
			return '';
		}
	}

	/**
	 * Render the field view using info from config file.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field Field type and id.
	 * @param array $options Options saved in db from options page.
	 * @param string $view View file.
	 * @param string $value Value from options array.
	 */
	protected function render_view( $field, $options, $view, $value ) {
		include( TBSC_OPTIONS_PLUGIN_DIR . 'src/views/metaboxes/' . $view );
	}

	/**
	 * Build an array of all field keys and their respective sanitization callbacks.
	 *
	 * @since 1.0.0
	 *
	 * @return array $list Array of option keys and their associated callbacks.
	 */
	protected function build_sanitization_list() {
		$list = array();
		foreach ( $this->metabox as $metabox ) {
			foreach ( $metabox['fields'] as $field ) {
				$list[ $field['key'] ] = $field['callback'];
			}
		}

		return $list;
	}

	/**
	 * =============================
	 *
	 * Custom Sanitization Methods:
	 *
	 * =============================
	 */

	protected function sanitize_check_box( $val ) {

		return $val;
	}

}