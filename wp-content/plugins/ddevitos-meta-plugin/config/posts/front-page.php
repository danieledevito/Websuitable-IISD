<?php
/**
 * front-page.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

return array(

	'option_name' => '_tbsc_front_custom_post',

	'show_on_page' => 'front_page',

	'metabox_screens' => array(

		'front_page' => array(
			'front_metabox_1' => array(
				'nonce_action' => 'save_front_mb_nonce_1',
				'nonce_name'   => 'pwho_front_mb_nonce_1',
				'id'           => 'front_metabox_1',
				'title'        => 'Front Page Options',
				'desc'         => 'These options are available the front page only.',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
				'screen'       => 'page',
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(

					array(
						'title'                 => 'Featured Item Title',
						'id'                    => '[frontpage_featured_item_title]',
						'label'                 => 'frontpage_featured_item_title',
						'desc'                  => '',
						'type'                  => 'editor',
						// Key must be unique to the particular field
						'key'                   => 'frontpage_featured_item_title',
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
						'title'                 => 'Featured Item Picture',
						'id'                    => '[frontpage_featured_item_pic]',
						'label'                 => 'frontpage_featured_item_pic',
						'desc'                  => '',
						'type'                  => 'media',
						// Key must be unique to the particular field
						'key'                   => 'frontpage_featured_item_pic',
						'sanitization_callback' => 'sanitize_text_field',
					),
					array(
						'title'                 => 'Featured Item Link',
						'id'                    => '[frontpage_featured_item_link]',
						'label'                 => 'frontpage_featured_item_link',
						'desc'                  => '',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'frontpage_featured_item_link',
						'sanitization_callback' => 'sanitize_text_field',
					),
				),
				/* end fields */
			), /* end metabox 1 */


		), /* end Front Page Metaboxes */
	),
);