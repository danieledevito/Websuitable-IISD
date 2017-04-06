<?php
/**
 * class-custom-post-type.php
 *
 * @package    Custom Post Types
 * @author     Daniele De Vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

namespace TBSC_CPT\Custom;

class CustomPostsTaxonomies {

	/**
	 * Config array for the custom post type.
	 *
	 * @var
	 */
	protected $config;

	/**
	 * CustomPostsTaxonomies constructor.
	 *
	 * @param $config
	 */
	public function __construct( $config ) {

		$this->config = $config;

	}

	/**
	 * Parse config array for custom post type and tax registration information.
	 *
	 * @since 1.0.0
	 */
	public function init_cpt_registration() {

		array_walk( $this->config['post_types'], array( $this, 'register_custom_post_types' ) );

	}

	/**
	 * Register custom post types.
	 *
	 * @since 1.0.0
	 *
	 * @param array $post_type          Config array for post types.
	 * @param array $post_type_settings Config array for each post type args.
	 */
	protected function register_custom_post_types( array $post_type_settings, $post_type ) {


		if ( array_key_exists( 'custom_taxonomies', $post_type_settings ) ) {

			array_walk( $post_type_settings['custom_taxonomies'], array( $this, 'register_custom_taxonomy' ), $post_type );
		}

		register_post_type( $post_type, $post_type_settings['post_type_args'] );

		//* Just to be safe
		flush_rewrite_rules();

	}

	/**
	 * Parse every custom taxonomy for every custom post type being created.
	 *
	 * @since 1.0.0
	 *
	 * @param array $tax_args         Custom post type information including respective custom taxonomies.
	 * @param string $tax_id
	 * @param string $post_type             Custom post type id.
	 */
	protected function register_custom_taxonomy( array $tax_args, $tax_id, $post_type ) {

		register_taxonomy( $tax_id, $post_type, $tax_args );
		register_taxonomy_for_object_type( $tax_id, $post_type );

	}

}