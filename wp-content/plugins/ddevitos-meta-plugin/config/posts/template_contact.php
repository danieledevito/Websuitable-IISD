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

	'option_name' => '_tbsc_template_contact_custom_meta',

	'show_on_page' => 'template-contact-page.php',

	'metabox_screens' => array(
		'template-contact-page.php' => array(

			'template_contact_mb_1' => array(
				'nonce_action' => 'save_template_contact_mb_nonce_1',
				'nonce_name'   => 'pwho_template_contact_mb_nonce_1',
				'id'           => 'template_contact_mb_1',
				'title'        => 'Common Options for all posts and pages.',
				'desc'         => 'This is my totally awesome metabox description.',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
				'screen'       => 'page',
				// Not used for common boxes.
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(
					array(
						'title'                 => 'Custom Page Title',
						'id'                    => '[template_contact_custom_title]',
						'label'                 => 'template_contact_custom_title',
						'desc'                  => 'Set a custom title to show on the front view of this page.',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'template_contact_custom_title',
						'sanitization_callback' => 'sanitize_text_field',
					),


				),
				/* end fields */
			), /* end common_for_all_screens_1 */


		), /* End Common metaboxes */

	), /* End all metaboxes*/

); // end config array

