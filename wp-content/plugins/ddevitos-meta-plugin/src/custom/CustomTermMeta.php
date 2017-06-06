<?php
/**
 * CustomTermMeta.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC_Meta\Custom;

use TBSC_Core\Config\I_Config;
use TBSC_Core\Support\Views;

class CustomTermMeta {

	/**
	 * CustomTermMeta constructor.
	 *
	 * @param I_Config $config
	 */
	public function __construct( I_Config $config ) {

		$this->config      = $config->load_config();
		$this->option_name = $this->config['option_name'];

		$this->field_types = array(
			'text_small'       => 'text-small.php',
			'text_medium'      => 'text-medium.php',
			'text_large'       => 'text-large.php',
			'text_area'        => 'text-area.php',
			'editor'           => 'editor.php',
			'editor_char_count' => 'editor-char-count.php',
			'checkbox'         => 'checkbox.php',
			'media'            => 'file-upload.php',
			'select'           => 'select.php',
			'query_select'     => 'select-feature-tabs-query.php',

		);

//		$this->sanitization_list = $this->build_sanitization_list();

	}


	public function walk_all_custom_taxonomies() {
		array_walk( $this->config['taxonomy'], [ $this, 'init' ] );
	}

	private function init( $taxonomy_args, $taxonomy ) {

		add_action( $taxonomy . '_add_form_fields', function () use ( $taxonomy_args ) {
			$this->add_the_custom_fields( $taxonomy_args );
		} );

		add_action( $taxonomy . '_edit_form_fields', function ( $term ) use ( $taxonomy_args ) {
			$this->add_the_custom_fields_on_edit_screen( $taxonomy_args, $term );
		} );

		add_action( 'edit_' . $taxonomy, [ $this, 'save_term_data' ] );
		add_action( 'create_' . $taxonomy, [ $this, 'save_term_data' ] );

	}

	/**
	 * Add custom fields to the terms page.
	 *
	 * Term is update on creation of the term, but present on edit screen.
	 *
	 * @since 3.0.0
	 *
	 * @param array $taxonomy_args Custom fields, etc.
	 * @param string $term Custom taxonomy term.
	 */
	private function add_the_custom_fields( $taxonomy_args, $term = '' ) {

		foreach ( $taxonomy_args['fields'] as $field ) {
			if ( $term !== '' ) {
				$value = get_term_meta( $term->term_id, $this->option_name, false );
				$value = $value[0][ $field['key'] ];
			}

			include( Views::load_view( TBSC_META_VIEW_DIR . '/terms/' . $this->config['field_types'][ $field['type'] ] ) );

		}
	}

	/**
	 * Add custom fields to the edit terms page.
	 *
	 * Edit screen has different styles, so I'm using different views
	 * to make sure they display properly on the page.
	 *
	 * @since 3.0.0
	 *
	 * @param array $taxonomy_args Custom fields, etc.
	 * @param string $term Custom taxonomy term.
	 */
	private function add_the_custom_fields_on_edit_screen( $taxonomy_args, $term = '' ) {

		foreach ( $taxonomy_args['fields'] as $field ) {
			if ( $term !== '' ) {
				$value = get_term_meta( $term->term_id, $this->option_name, false );
				$value = $value[0][ $field['key'] ];
			}

			include( Views::load_view( TBSC_META_VIEW_DIR . '/terms/edit-views/' . $this->config['field_types'][ $field['type'] ] ) );

		}
	}

	/**
	 * Save the custom term data.
	 *
	 * @param string $term_id
	 */
	public function save_term_data( $term_id ) {
		$old_value = get_term_meta( $term_id, $this->option_name, true );
		$new_value = isset( $_POST[ $this->option_name ] ) ? $_POST[ $this->option_name ] : '';

		if ( $old_value && '' === $new_value ) {
			delete_term_meta( $term_id, $this->option_name );
		} else if ( $old_value !== $new_value ) {
			update_term_meta( $term_id, $this->option_name, $new_value );
		}
	}

	/**
	 * Build list of meta keys and associated sanitization callbacks.
	 *
	 * This array will be used when sanitizing
	 * the data being posted to the db.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function build_sanitization_list() {
		$list = array();
		foreach ( $this->config['metabox_screens'] as $screen => $metaboxes ) {
			foreach ( $metaboxes as $metabox => $args ) {
				foreach ( $args['fields'] as $field ) {
					$list[ $field['key'] ] = $field['sanitization_callback'];
				}
			}
		}

		return $list;
	}

}