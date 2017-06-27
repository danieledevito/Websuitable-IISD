<?php
/**
 * front-page.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

return array(

	'option_name' => '_tbsc_single_posts_custom_meta',

	'show_on_page' => 'post',

	'metabox_screens' => array(

		'post' => array(
			'single_posts_custom_mb_1' => array(
				'nonce_action' => 'save_single_posts_mb_nonce_1',
				'nonce_name'   => 'pwho_single_posts_mb_nonce_1',
				'id'           => 'single_posts_custom_mb_1',
				'title'        => 'Post Options',
				'desc'         => '',
				//Where should this meta box be ('post','page','dashboard','link','attachment','custom_post_type','comment')
				'screen'       => 'post',
				'context'      => 'advanced',
				//Screen location (high, core, default or low)
				'priority'     => 'high',
				'fields'       => array(
					array(
						'title'                 => 'Post Color code',
						'id'                    => '[post_color]',
						'label'                 => 'post_color',
						'desc'                  => 'Colour code for the post\'s accent colors (Green: 91c449, Orange: db492d, Yellow: f1af38, White: fff - For more info visit this website: https://www.w3schools.com/colors/colors_picker.asp)',
						'type'                  => 'text_large',
						// Key must be unique to the particular field
						'key'                   => 'post_color',
						'sanitization_callback' => 'sanitize_text_field',
					),
//					array(
//						'title'                 => 'Issues',
//						'id'                    => '[post_issues]',
//						'label'                 => 'post_issues',
//						'desc'                  => '',
//						'type'                  => 'text_large',
//						// Key must be unique to the particular field
//						'key'                   => 'post_issues',
//						'sanitization_callback' => 'sanitize_text_field',
//					),
//
//					array(
//						'title'                 => 'Actors',
//						'id'                    => '[post_actors]',
//						'label'                 => 'post_actors',
//						'desc'                  => '',
//						'type'                  => 'text_large',
//						// Key must be unique to the particular field
//						'key'                   => 'post_actors',
//						'sanitization_callback' => 'sanitize_text_field',
//					),
//					array(
//						'title'                 => 'Regions',
//						'id'                    => '[post_regions]',
//						'label'                 => 'post_regions',
//						'desc'                  => '',
//						'type'                  => 'text_large',
//						// Key must be unique to the particular field
//						'key'                   => 'post_regions',
//						'sanitization_callback' => 'sanitize_text_field',
//					),
					array(
						'title'                 => 'Post Summary',
						'id'                    => '[post_side_bar_text]',
						'label'                 => 'post_side_bar_text',
						'desc'                  => 'This is the text that will appear in all instances of this posts summary. ',
						'type'                  => 'editor_char_count',
						// Key must be unique to the particular field
						'key'                   => 'post_side_bar_text',
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
				),
				/* end fields */
			), /* end metabox 1 */


		), /* end Posts Metaboxes */
	),
);