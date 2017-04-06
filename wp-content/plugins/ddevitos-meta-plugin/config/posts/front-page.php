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


		), /* end Front Page Metaboxes */
	),
);