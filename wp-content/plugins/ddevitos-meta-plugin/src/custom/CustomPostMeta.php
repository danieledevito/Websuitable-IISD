<?php

/**
 * Custom Metaboxes and Fields
 *
 * Class for custom metaboxes and fields.
 * Class builds and outputs metaboxes.
 * Class builds and outputs custom fields,
 * posting meta data to the db.
 *
 * @package    Custom Meta Plugin
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

namespace TBSC_Meta\Custom;

use TBSC_Core\Support\Views;
use TBSC_Core\Support\CustomData;

class CustomPostMeta {

	/**
	 * Post meta option key.
	 *
	 * All field values stored in serialized array.
	 *
	 * @var string $option_name Array key stored in post meta table.
	 */
	private $option_name;

	/**
	 * Config array.
	 *
	 * @since 1.0.0
	 *
	 * @var array $config Main configuration array.
	 */
	private $config;

	/**
	 * Metabox field types.
	 *
	 * - text field
	 * - text area field
	 * - editor ( wp text editor )
	 * - checkbox
	 *
	 * @since 1.0.0
	 *
	 * @var array $field_types ;
	 */
	private $field_types;

	/**
	 * Current post id.
	 *
	 * @since 1.0.0
	 *
	 * @var int $post_id Current post id.
	 */
	private $post_id;

	/**
	 * Current post type.
	 *
	 * Either post, page or custom post type slug.
	 *
	 * @since 1.0.0
	 *
	 * @var string $post_type Current post type slug.
	 */
	private $post_type;

	/**
	 * Current template file name.
	 *
	 * @since 2.0.0
	 *
	 * @var string $template_file File name with php extension.
	 */
	private $template_file;

	/**
	 * The page, cpt or template file on which the metabox will be shown.
	 *
	 * @var string
	 */
	private $show_on_page;

	/**
	 * Meta array key and associated sanitization callback.
	 *
	 * An associated array of each posted array key
	 * and they sanitization callback to be used
	 * to sanitize the posted data.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	private $sanitization_list = array();

	/**
	 * An array of all the nonces to be verified on save.
	 *
	 * @var array
	 */
	private $nonce_list = array();

	/**
	 * An array of screens that will have the default / common metaboxes.
	 *
	 * @var array
	 */
	private $screens_with_common_metaboxes = array();

	/**
	 * CustomMetabox constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Main config.
	 */
	public function __construct( array $config ) {

		$this->config = $config;

		$this->show_on_page = $this->config['show_on_page'];

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
			'select_cpt_query' => 'select-cpt-query-id.php',
			'select_tax_query' => 'select-tax-query-id.php',
			'query_select'     => 'select-feature-tabs-query.php',
		);

		if ( CustomData::available( 'show_on_screens', $this->config ) ) {
			$this->screens_with_common_metaboxes = $this->config['show_on_screens'];
		}

		/**
		 * Must build this list in the constructor.
		 *
		 * If you build this list at the add_meta_boxes hook, it's too late and the
		 * method at the save_post hook has already grabbed the new and empty $sanitization_list array.
		 */
		$this->sanitization_list = $this->build_sanitization_list();

	}

	public function init_metaboxes() {

		global $post;
		$this->post_id       = $post->ID;
		$this->post_type     = get_current_screen()->post_type;
		$this->template_file = CustomData::get_the_post_meta( '_wp_page_template', true );

		// Common Metaboxes
		if ( $this->show_on_page == 'common' ) {
			array_walk( $this->config['metabox_screens']['common'], array( $this, 'add_common_metabox' ) );
		}

		// Front Page Metaboxes
		if ( ( $this->show_on_page == 'front_page' ) && ( $this->post_id === get_option( 'page_on_front' ) ) ) {
			array_walk( $this->config['metabox_screens']['front_page'], array( $this, 'add_metabox' ) );
		}

		// Posts Page Metaboxes
		if ( ( $this->show_on_page == 'posts_page' ) && ( $this->post_id === get_option( 'page_for_posts' ) ) ) {
			array_walk( $this->config['metabox_screens']['posts_page'], array( $this, 'add_metabox' ) );
		}

		// For Template Files
		if ( $this->show_on_page == $this->template_file ) {
			array_walk( $this->config['metabox_screens'][ $this->template_file ], array( $this, 'add_metabox' ) );
		}

		// Custom Post Type
		if ( $this->show_on_page == $this->post_type ) {
			array_walk( $this->config['metabox_screens'][ $this->post_type ], array( $this, 'add_metabox' ) );
		}

	}


	/**
	 * Add a metabox.
	 *
	 * @since 1.0.0
	 *
	 * @param array $box_args Metabox configuration array.
	 */
	private function add_metabox( $box_args ) {

		$this->add_to_nonce_verification_list( $box_args['nonce_action'], $box_args['nonce_name'] );

		$callback = function () use ( $box_args ) {

			echo $box_args['desc'];
			$this->add_metabox_fields( $box_args['fields'] );
		};

		add_meta_box(
			$box_args['id'],
			$box_args['title'],
			$callback,
			$box_args['screen'],
			$box_args['context'],
			$box_args['priority']
		);
	}


	/**
	 * Add common metabox.
	 *
	 * Common metaboxes are those boxes on every
	 * page and post in the theme.
	 *
	 * @param $box_args
	 */
	private function add_common_metabox( $box_args ) {

		$this->add_to_nonce_verification_list( $box_args['nonce_action'], $box_args['nonce_name'] );

		foreach ( $this->screens_with_common_metaboxes as $screen ) {

			$callback = function () use ( $box_args ) {

				// Add an nonce field so we can check for it later.
				wp_nonce_field( $box_args['nonce_action'], $box_args['nonce_name'] );

				echo $box_args['desc'];

				$this->add_metabox_fields( $box_args['fields'] );
			};

			add_meta_box(
				$box_args['id'],
				$box_args['title'],
				$callback,
				$screen,
				$box_args['context'],
				$box_args['priority']
			);
		}

	}

	/**
	 * Add fields to metabox.
	 *
	 * @since 1.0.0
	 *
	 * @param array $fields Metabox fields.
	 */
	private function add_metabox_fields( $fields ) {

		// return a single value 'true' because you're returning a serialized array
		$options = get_post_meta( $this->post_id, $this->option_name, true );

		foreach ( $fields as $field ) {

			$value = $this->get_field_value( $options, $field );

			include( Views::load_view( TBSC_META_VIEW_DIR . 'field-headers.php' ) );

			include( Views::load_view( TBSC_META_VIEW_DIR . $this->field_types[ $field['type'] ] ) );
		}

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
	private function get_field_value( $options, $field ) {

		if ( ! $options ) {
			return '';
		} elseif ( array_key_exists( $field['key'], $options ) ) {
			return $options[ $field['key'] ];
		} else {
			return '';
		}
	}

	/**
	 * Save the custom post meta.
	 *
	 * Custom post meta is entered into
	 * the custom fields.
	 *
	 * @param int $post_id Current post id.
	 */
	public function save_custom_post_meta( $post_id ) {

		if ( ! $this->is_ok_to_save_meta( $post_id ) ) {
			return;
		}

		/**
		 * Sanitize the posted data.
		 *
		 * @since 1.0.0
		 */
		$posted_data = $this->sanitize_all_the_things( $_POST[ $this->option_name ] );

		update_post_meta( $post_id, $this->option_name, $posted_data );

	}

	/**
	 * Checks if conditions are set to save the meta to the database.
	 *
	 * @since 2.0.0
	 *
	 * @param int $post_id
	 *
	 * @return bool|false
	 */
	private function is_ok_to_save_meta( $post_id ) {

		// Check all nonces

		if ( ! $this->verify_all_nonces() ) {
			return false;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return false;
		}
		if ( ! current_user_can( 'edit_others_posts', $post_id ) ) {
			return false;
		}

		/**
		 * Without this, NULL values are trying to be posted and it breaks everything.
		 *
		 * This also prevents a break on creating new posts.
		 */
		if ( ! array_key_exists( $this->option_name, $_POST ) ) {
			return false;
		}

		return $post_id;
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

	/**
	 * Build a list nonces that need to be verified before saving data.
	 *
	 * @since 3.0.0
	 *
	 * @return array
	 */
	private function add_to_nonce_verification_list( $nonce_action, $nonce_name ) {

		$this->nonce_list[ $nonce_action ] = $nonce_name;

	}


	/**
	 * Verify all the nonces set for each metabox.
	 *
	 * @return bool
	 */
	private function verify_all_nonces() {
		foreach ( $this->nonce_list as $nonce_action => $nonce_name ) {
			// Check if our nonce is set.
			if ( ! isset( $_POST[ $nonce_name ] ) ) {
				return false;
			}

			$nonce = $_POST[ $nonce_name ];

			// Verify that the nonce is valid.
			if ( ! wp_verify_nonce( $nonce, $nonce_action ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Return sanitized array of posted meta.
	 *
	 * This method takes all the posted data,
	 * and sanitizes each item in the array
	 * as per the sanitizaion callback function
	 * stated in the configuration array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $posted_meta_array Array of raw posted data.
	 *
	 * @return array $sanitized_array Array of sanitized data.
	 */
	private function sanitize_all_the_things( $posted_meta_array ) {

		$sanitized_array = array();

		if ( $posted_meta_array == null ) {
			return '';
		}

		foreach ( $posted_meta_array as $meta_key => $value ) {

			$sanitize_function = $this->sanitization_list[ $meta_key ];
			if ( function_exists( $this->sanitization_list[ $meta_key ] ) ) {
				$new_val = $sanitize_function( $value );
			} else {
				$new_val = $this->$sanitize_function( $value );
			}

			$sanitized_array[ $meta_key ] = $new_val;
		}

		return $sanitized_array;
	}

}