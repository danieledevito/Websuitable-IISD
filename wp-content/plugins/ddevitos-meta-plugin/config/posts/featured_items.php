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
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

//Reference: https://codex.wordpress.org/Function_Reference/add_meta_box

return array(

	'option_name' => '_featured_items_custom_meta',

	'show_on_page' => 'featured_items',

	'metabox_screens' => array(
		'featured_items' => array(

			'featured_items_mb_1' => array(
				'nonce_action' => 'save_featured_items_mb_nonce_1',
				'nonce_name'   => 'pwho_featured_items_mb_nonce_1',
				'id'           => 'featured_items_mb_1',
				'title'        => 'Special Options for this CPT Only.',
				'desc'         => 'This is my totally awesome metabox description.',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
				'screen'   => 'featured_items', // Not used for common boxes.
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(
					array(
						'title'                 => 'Story Title',
						'id'                    => '[featured_items_story_title]',
						'label'                 => 'featured_items_story_title',
						'desc'                  => 'Please set a title of maximum 40 characters.',
						'type'                  => 'text_medium',
						// Key must be unique to the particular field
						'key'                   => 'featured_items_story_title',
						'sanitization_callback' => 'sanitize_text_field',
					),
					array(
						'title'                 => 'Story Subtitle',
						'id'                    => '[featured_items_story_subtitle]',
						'label'                 => 'featured_items_story_subtitle',
						'desc'                  => 'Please select a subtitle. Under 100 Characters (optional - title will take up the whole space if not selected).',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'featured_items_story_subtitle',
						'sanitization_callback' => 'sanitize_text_field',
					),
					array(
						'title'                 => 'Story Link',
						'id'                    => '[featured_items_story_link]',
						'label'                 => 'featured_items_story_link',
						'desc'                  => 'Please add a link to this story.',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'featured_items_story_link',
						'sanitization_callback' => 'sanitize_text_field',
					),
				),
				/* end fields */
			), /* end common_for_all_screens_1 */


		), /* End Common metaboxes */

	), /* End all metaboxes*/

); // end config array

