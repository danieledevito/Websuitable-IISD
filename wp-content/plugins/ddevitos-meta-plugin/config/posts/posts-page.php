<?php
/**
 * front-page.php
 *
 * @author   Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

return array(

	'option_name' => '_tbsc_posts_page_custom_meta',

	'show_on_page' => 'posts_page',

	'metabox_screens' => array(

		'posts_page' => array(
			'posts_page_custom_mb_1' => array(
				'nonce_action' => 'save_posts_page_mb_nonce_1',
				'nonce_name'   => 'pwho_posts_page_mb_nonce_1',
				'id'           => 'posts_page_custom_mb_1',
				'title'        => 'Front Page Options',
				'desc'         => 'These options are available the front page only.',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
				'screen'       => 'page',
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(

					array(
						'title'                 => 'Front Page Hero Content',
						'id'                    => '[frontpage_headline]',
						'label'                 => 'frontpage_headline',
						'desc'                  => 'Write an eye-catching headline right here.',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'frontpage_headline',
						'sanitization_callback' => 'sanitize_text_field',
					),

					array(
						'title'                 => '',
						'id'                    => '[frontpage_sub_headline]',
						'label'                 => 'frontpage_sub_headline',
						'desc'                  => 'Write an eye-catching SUB headline right here.',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'frontpage_sub_headline',
						'sanitization_callback' => 'sanitize_text_field',
					),

					array(
						'title'                 => '',
						'id'                    => '[frontpage_headline_list]',
						'label'                 => 'frontpage_headline_list',
						'desc'                  => 'Short list of highlighted features.',
						'type'                  => 'editor',
						// Key must be unique to the particular field
						'key'                   => 'frontpage_headline_list',
						'sanitization_callback' => 'wp_kses_post',
						'args'                  => array(
//							'initial_content'  => 'initial content here',
							'settings' => array(
								'textarea_rows' => 10, // Default 10
								'wpautop'       => false, // Default true
								'media_buttons' => true, // Default true
								'tinymce'       => false,

							),
						),
					),

					array(
						'title'                 => '',
						'id'                    => '[front_hero_modal]',
						'label'                 => 'front_hero_modal',
						'desc'                  => 'Button Modal Link. Put the ID for the modal pop up here. ie (tbscDemoModal)',
						'type'                  => 'text_medium',
						// Key must be unique to the particular field
						'key'                   => 'front_hero_modal',
						'sanitization_callback' => 'sanitize_text_field',
					),


				),
				/* end fields */
			), /* end metabox 1 */

			'posts_page_custom_mb_2' => array(
				'nonce_action' => 'save_posts_page_mb_nonce_2',
				'nonce_name'   => 'pwho_posts_page_mb_nonce_2',
				'id'           => 'posts_page_custom_mb_2',
				'title'        => 'Front Page MOBILE Options',
				'desc'         => '',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
				'screen'       => 'page',
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(
					array(
						'title'                 => 'Front Page Hero Content - MOBILE',
						'id'                    => '[frontpage_headline_mobile]',
						'label'                 => 'frontpage_headline_mobile',
						'desc'                  => 'This is for the mobile view only.',
						'type'                  => 'editor',
						// Key must be unique to the particular field
						'key'                   => 'frontpage_headline_mobile',
						'sanitization_callback' => 'wp_kses_post',
						'args'                  => array(
//							'initial_content'  => 'initial content here',
							'settings' => array(
								'textarea_rows' => 10, // Default 10
								'wpautop'       => false, // Default true
								'media_buttons' => true, // Default true
								'tinymce'       => false,

							),
						),
					),

					array(
						'title'                 => 'Contact Options',
						'id'                    => '[front_display_contact_options]',
						'label'                 => 'front_display_contact_options',
						'desc'                  => 'Display contact options?',
						'type'                  => 'checkbox',
						// Key must be unique to the particular field
						'key'                   => 'front_display_contact_options',
						'sanitization_callback' => 'sanitize_text_field',
					),

					array(
						'title'                 => 'Contact Email',
						'id'                    => '[front_email]',
						'label'                 => 'front_email',
						'desc'                  => '',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'front_email',
						'sanitization_callback' => 'sanitize_text_field',
					),

					array(
						'title'                 => 'Contact Phone',
						'id'                    => '[front_phone]',
						'label'                 => 'front_phone',
						'desc'                  => 'Contact phone number in this format (613) 555-1234',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'front_phone',
						'sanitization_callback' => 'sanitize_text_field',
					),

				),
				/* end fields */
			), /* end Mobile options 1 */


		), /* end Front Page Metaboxes */
	),
);