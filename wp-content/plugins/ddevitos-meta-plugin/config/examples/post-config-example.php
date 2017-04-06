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

$post_metabox_1 = 'post_box_1';
$post_metabox_2 = 'post_box_2';

$page_metabox_1 = 'page_box_1';
$page_metabox_2 = 'page_box_2';

return array(

	'option_name' => '_tbsc_custom_post',

	'field_types' => array(
		'text_small'  => 'text-small.php',
		'text_medium' => 'text-medium.php',
		'text_large'  => 'text-large.php',
		'text_area'   => 'text-area.php',
		'editor'      => 'editor.php',
		'checkbox'    => 'checkbox.php'
	),

	'common_show_on' => array(
		'post',
		'page',
		'careers',
		'tbsc_verticals'
	),

	'metabox_screens' => array(
		'common' => array(

			'common_for_all_screens_1' => array(
				// Must set nonce_action and nonce_name for each metabox.
				'nonce_action' => '',
				'nonce_name'   => 'pwho_mb_nonce',
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
						'title'                 => 'Field Title Here',
						'id'                    => '[custom_title]',
						'label'                 => 'custom_title',
						'desc'                  => 'Set a custom title to show on the front view of this page.',
						'type'                  => 'text_small',
						// Key must be unique to the particular field
						'key'                   => 'custom_title',
						'sanitization_callback' => 'sanitize_text_field',
					),
					array(
						'title'                 => 'Field Title Here',
						'id'                    => '[common_checkbox]',
						'label'                 => 'common_checkbox',
						'desc'                  => 'Turn something on and off.',
						'type'                  => 'checkbox',
						// Key must be unique to the particular field
						'key'                   => 'common_checkbox',
						'sanitization_callback' => 'sanitize_text_field',
					),
					array(
						'title'                 => 'Field Title Here',
						'id'                    => '[custom_wysiwyg_editor]',
						'label'                 => 'custom_wysiwyg_editor',
						'desc'                  => 'Set a custom title to show on the front view of this page.',
						'type'                  => 'editor',
						// Key must be unique to the particular field
						'key'                   => 'custom_wysiwyg_editor',
						'sanitization_callback' => 'wp_kses_post',
						'args'                  => array(
//							'initial_content'  => 'initial content here',
							'settings' => array(
								'textarea_rows' => 10, // Default 10
								'wpautop'       => true, // Default true
								'media_buttons' => true, // Default true
								'tinymce'       => false,

							),
						),
					),
					array(
						'title'                 => 'Query Select CPT Posts',
						'id'                    => '[query_select_cpt_posts]',
						'label'                 => 'query_select_cpt_posts',
						'desc'                  => 'Choose a post!',
						'type'                  => 'select_cpt_query',
						'cpt_id'                => 'featured_items',
						'key'                   => 'query_select_cpt_posts',
						'sanitization_callback' => 'sanitize_text_field',
					),

				),
				/* end fields */
			), /* end common_for_all_screens_1 */

			'common_for_all_screens_2' => array(
				// Must set nonce_action and nonce_name for each metabox.
				'nonce_action' => 'save_common_mb_nonce_2',
				'nonce_name'   => 'pwho_mb_2_nonce',
				'id'           => 'common_for_all_screens_2',
				'title'        => 'Common Options for all posts and pages.',
				'desc'         => 'This is my totally awesome metabox description.',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
//				'screen'   => 'common', // Not used for common boxes.
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(
					array(
						'title'                 => 'Field Title Here',
						'id'                    => '[custom_title_2_test]',
						'label'                 => 'custom_title_2_test',
						'desc'                  => 'Set a custom title to show on the front view of this page.',
						'type'                  => 'text_small',
						// Key must be unique to the particular field
						'key'                   => 'custom_title_2_test',
						'sanitization_callback' => 'sanitize_text_field',
					),
					array(
						'title'                 => 'Field Title Here',
						'id'                    => '[common_checkbox_2]',
						'label'                 => 'common_checkbox_2',
						'desc'                  => 'Turn something on and off.',
						'type'                  => 'checkbox',
						// Key must be unique to the particular field
						'key'                   => 'common_checkbox_2',
						'sanitization_callback' => 'sanitize_text_field',
					),
					array(
						'title'                 => 'Field Title Here',
						'id'                    => '[custom_wysiwyg_editor_22]',
						'label'                 => 'custom_wysiwyg_editor_22',
						'desc'                  => 'Set a custom title to show on the front view of this page.',
						'type'                  => 'editor',
						// Key must be unique to the particular field
						'key'                   => 'custom_wysiwyg_editor_22',
						'sanitization_callback' => 'wp_kses_post',
						'args'                  => array(
//							'initial_content'  => 'initial content here',
							'settings' => array(
								'textarea_rows' => 10, // Default 10
								'wpautop'       => true, // Default true
								'media_buttons' => true, // Default true
								'tinymce'       => false,

							),
						),
					),

				),
				/* end fields */
			), /* end common_for_all_screens_2 */


		), /* End Common metaboxes */
//		'post'   => array(
//
//			'common_for_posts_1' => array(
//				'id'       => 'common_for_posts_1',
//				'title'    => 'Post Options',
//				'desc'     => 'This is my totally awesome metabox description.',
//				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
//				'screen'   => 'post',
//				'context'  => 'advanced',
//				//Screen location (high, core, default or low)
//				'priority' => 'high',
//				'fields'   => array(
//					array(
//						'title'                 => 'Field Title Here',
//						'id'                    => '[post_featured_image]',
//						'label'                 => 'Featured Image',
//						'desc'                  => 'Enter URL for image here.',
//						'type'                  => 'text_large',
//						// Key must be unique to the particular field
//						'key'                   => 'post_featured_image',
//						'sanitization_callback' => 'sanitize_text_field',
//					),
//					array(
//						'title'                 => 'Field Title Here',
//						'id'                    => '[post_featured_image_2]',
//						'label'                 => 'Featured Image 2',
//						'desc'                  => 'Enter URL for image here.',
//						'type'                  => 'text_large',
//						// Key must be unique to the particular field
//						'key'                   => 'post_featured_image_2',
//						'sanitization_callback' => 'sanitize_text_field',
//					),
//				),
//				/* end fields */
//			), /* end metabox 1 */
//
//		), /* End post metaboxes */

//		'page'   => array(
//
//			'common_for_pages_1' => array(
//				'id'       => 'common_for_pages_1',
//				'title'    => 'Custom Page Options',
//				'desc'     => 'This is my totally awesome metabox description.',
//				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
//				'screen'   => 'page',
//				'context'  => 'advanced',
//				//Screen location (high, core, default or low)
//				'priority' => 'high',
//				'fields'   => array(
//					array(
//						'title'                 => 'Field Title Here',
//						'id'                    => '[page_featured_image]',
//						'label'                 => 'Page Featured Image',
//						'desc'                  => 'Enter URL for image here.',
//						'type'                  => 'text_large',
//						// Key must be unique to the particular field
//						'key'                   => 'page_featured_image',
//						'sanitization_callback' => 'sanitize_text_field',
//					),
//					array(
//						'title'                 => 'Field Title Here',
//						'id'                    => '[page_featured_image_2]',
//						'label'                 => 'Page Featured Image 2',
//						'desc'                  => 'Enter URL for image here.',
//						'type'                  => 'text_large',
//						// Key must be unique to the particular field
//						'key'                   => 'page_featured_image_2',
//						'sanitization_callback' => 'sanitize_text_field',
//					),
//				),
//				/* end fields */
//			), /* end metabox 1 */
//		), /* end page metaboxes */
//
//

//		'posts_page' => array(
//				'front_metabox_1' => array(
//						'id'       => 'front_metabox_1',
//						'title'    => 'Blog Page Options',
//						'desc'     => 'These options are available the front page only.',
//					//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
//						'screen'   => 'page',
//						'context'  => 'advanced',
//					//Screen location (high, core, default or low)
//						'priority' => 'high',
//						'fields'   => array(
//								array(
//										'title'                 => 'Field Title Here',
//										'id'                    => '[frontpage_headline]',
//										'label'                 => 'headline',
//										'desc'                  => 'Write an eye-catching headline right here..',
//										'type'                  => 'text_large',
//									// Key must be unique to the particular field
//										'key'                   => 'frontpage_headline',
//										'sanitization_callback' => 'sanitize_text_field',
//								),
//								array(
//										'title'                 => 'Field Title Here',
//										'id'                    => '[frontpage_sub_headline]',
//										'label'                 => 'subheadline',
//										'desc'                  => 'Sub headline appears directly below the headline.',
//										'type'                  => 'text_area',
//									// Key must be unique to the particular field
//										'key'                   => 'frontpage_sub_headline',
//										'sanitization_callback' => 'sanitize_text_field',
//								),
//						),
//					/* end fields */
//				), /* end metabox 1 */
//		), /* end posts page Metaboxes */


	), /* End all metaboxes*/


); // end config array
