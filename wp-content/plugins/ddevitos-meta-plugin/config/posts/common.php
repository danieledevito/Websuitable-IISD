<?php
/**
 * Main configuration array.
 *
 * Array defines the following:
 * - view files to be used for custom fields.
 * - metaboxes to be added to a particular page or post
 * - fields to be added to those metaboxes
 * - sanitization callbacks for data being POSTed to the database.
 *
 * @package    Custom Meta Plugin
 * @author     Daniele De Vito
 * @copyright  Daniele De Vito
 * @license    GPL-2.0+
 */

//Reference: https://codex.wordpress.org/Function_Reference/add_meta_box

return array(

	'option_name' => '_tbsc_common_custom_post_meta',

	'show_on_page' => 'common',

	'show_on_screens' => array(
//		'page',
//		'post',
//		'featured_items'
	),

	'metabox_screens' => array(
		'common' => array(

			'common_for_all_screens_1' => array(
				'nonce_action' => 'save_common_mb_nonce_1',
				'nonce_name'   => 'pwho_common_mb_nonce_1',
				'id'           => 'common_for_all_screens_1',
				'title'        => 'Common Options for all posts and pages.',
				'desc'         => 'This is my totally awesome metabox description.',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
//				'screen'   => 'common', // Not used for common boxes.
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(
					array(
						'title'                 => 'Issues',
						'id'                    => '[post_issues]',
						'label'                 => 'post_issues',
						'desc'                  => '',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'post_issues',
						'sanitization_callback' => 'sanitize_text_field',
					),

					array(
						'title'                 => 'Actors',
						'id'                    => '[post_actors]',
						'label'                 => 'post_actors',
						'desc'                  => '',
						'type'                  => 'editor',
						// Key must be unique to the particular field
						'key'                   => 'text_large',
						'sanitization_callback' => 'sanitize_text_field',
					),
					array(
						'title'                 => 'Regions',
						'id'                    => '[post_regions]',
						'label'                 => 'post_regions',
						'desc'                  => '',
						'type'                  => 'editor',
						// Key must be unique to the particular field
						'key'                   => 'text_large',
						'sanitization_callback' => 'sanitize_text_field',
					)
				),
				/* end fields */
			), /* end common_for_all_screens_1 */


		), /* End Common metaboxes */

	), /* End all metaboxes*/

); // end config array

