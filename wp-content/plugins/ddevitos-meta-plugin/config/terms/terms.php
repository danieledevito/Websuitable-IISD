<?php
/**
 * terms.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

return [

	'option_name' => '_tbsc_custom_term_meta',

	'field_types' => array(
		'text_small'   => 'text-small.php',
		'text_medium'  => 'text-medium.php',
		'text_large'   => 'text-large.php',
		'text_area'    => 'text-area.php',
		'editor'       => 'editor.php',
		'editor_char_count' => 'editor-char-count.php',
		'checkbox'     => 'checkbox.php',
		'media'        => 'file-upload.php',
		'select'       => 'select.php',
		'query_select' => 'select-query.php',
	),

	'taxonomy' => [

		'tbsc_business_type' => [

			'fields' => array(

				array(
					'section_heading'       => 'Top Hero Section',
					'title'                 => 'Pricing Text',
					'id'                    => '[vertical_select_test]',
					'label'                 => 'vertical_select_test', // Used in for and ID spaces
					'desc'                  => 'Set Business Type default pricing text. ie( Starting at $48 / month).',
					'type'                  => 'query_select',
					// Key must be unique to the particular field
					'key'                   => 'vertical_select_test',
					'sanitization_callback' => 'sanitize_text_field',
//					'options' => array(
//						'value_1' => 'Option 1',
//						'value_2' => 'Option 2',
//						'value_3' => 'Option 3',
//						'value_4' => 'Option 4',
//					),
				),

				array(
					'section_heading'       => 'Top Hero Section',
					'title'                 => 'Pricing Text',
					'id'                    => '[vertical_hero_pricing_text]',
					'label'                 => 'vertical_hero_pricing_text', // Used in for and ID spaces
					'desc'                  => 'Set Business Type default pricing text. ie( Starting at $48 / month).',
					'type'                  => 'text_large',
					// Key must be unique to the particular field
					'key'                   => 'vertical_hero_pricing_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => 'Pricing Text LINK',
					'id'                    => '[vertical_hero_pricing_text_link]',
					'label'                 => 'vertical_hero_pricing_text_link', // Used in for and ID spaces
					'desc'                  => 'Set link url for the pricing text.',
					'type'                  => 'text_large',
					// Key must be unique to the particular field
					'key'                   => 'vertical_hero_pricing_text_link',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => 'Features List',
					'id'                    => '[vertical_hero_feature_list]',
					'label'                 => 'vertical_hero_feature_list', // Used in for and ID spaces
					'desc'                  => 'Create an unordered list of features. Recommend a maximum of 5 items.',
					'type'                  => 'editor',
					// Key must be unique to the particular field
					'key'                   => 'vertical_hero_feature_list',
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
					'section_heading'       => '',
					'title'                 => 'Promotion Image',
					'id'                    => '[term_promo_image]',
					'label'                 => 'term_promo_image',
					'desc'                  => 'Set a custom promo image for just this business type.',
					'type'                  => 'editor',
					// Key must be unique to the particular field
					'key'                   => 'term_promo_image',
					'sanitization_callback' => 'wp_kses_post',
					'args'                  => array(
//							'initial_content'  => 'initial content here',
						'settings' => array(
							'textarea_rows' => 5, // Default 10
							'wpautop'       => true, // Default true
							'media_buttons' => true, // Default true
							'tinymce'       => false,

						),
					),
				),

				array(
					'section_heading'       => '',
					'title'                 => 'Gravity Form',
					'id'                    => '[term_gravity_form]',
					'label'                 => 'term_gravity_form',
					'desc'                  => 'Put the ID for the gravity form you want to use here.',
					'type'                  => 'text_small',
					// Key must be unique to the particular field
					'key'                   => 'term_gravity_form',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/*===================

				  Features Section
				=====================*/

				/* Feature 1 */
				array(
					'section_heading'       => 'Features Section',
					'title'                 => '',
					'id'                    => '[vertical_features_heading]',
					'label'                 => 'vertical_features_heading', // Used in for and ID spaces
					'desc'                  => 'Feature Section Heading',
					'type'                  => 'text_large',
					// Key must be unique to the particular field
					'key'                   => 'vertical_features_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => 'Feature 1',
					'id'                    => '[feature_1_heading]',
					'label'                 => 'feature_1_heading', // Used in for and ID spaces
					'desc'                  => 'Feature 1 heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_1_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[feature_1_icon]',
					'label'                 => 'feature_1_icon', // Used in for and ID spaces
					'desc'                  => 'Feature 1 Icon - put the name of the Font Awesome icon you want to use. ie (fa-users).',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_1_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Feature 2 */
				array(
					'section_heading'       => '',
					'title'                 => 'Feature 2',
					'id'                    => '[feature_2_heading]',
					'label'                 => 'feature_2_heading', // Used in for and ID spaces
					'desc'                  => 'Feature 2 heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_2_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[feature_2_icon]',
					'label'                 => 'feature_2_icon', // Used in for and ID spaces
					'desc'                  => 'Feature 2 Icon - put the name of the Font Awesome icon you want to use. ie (fa-users).',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_2_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Feature 3 */
				array(
					'section_heading'       => '',
					'title'                 => 'Feature 3',
					'id'                    => '[feature_3_heading]',
					'label'                 => 'feature_3_heading', // Used in for and ID spaces
					'desc'                  => 'Feature 3 heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_3_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[feature_3_icon]',
					'label'                 => 'feature_3_icon', // Used in for and ID spaces
					'desc'                  => 'Feature 3 Icon - put the name of the Font Awesome icon you want to use. ie (fa-users).',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_3_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Feature 4 */
				array(
					'section_heading'       => '',
					'title'                 => 'Feature 4',
					'id'                    => '[feature_4_heading]',
					'label'                 => 'feature_4_heading', // Used in for and ID spaces
					'desc'                  => 'Feature 4 heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_4_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[feature_4_icon]',
					'label'                 => 'feature_4_icon', // Used in for and ID spaces
					'desc'                  => 'Feature 4 Icon - put the name of the Font Awesome icon you want to use. ie (fa-users).',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_4_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Feature 5 */
				array(
					'section_heading'       => '',
					'title'                 => 'Feature 5',
					'id'                    => '[feature_5_heading]',
					'label'                 => 'feature_5_heading', // Used in for and ID spaces
					'desc'                  => 'Feature 5 heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_5_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[feature_5_icon]',
					'label'                 => 'feature_5_icon', // Used in for and ID spaces
					'desc'                  => 'Feature 5 Icon - put the name of the Font Awesome icon you want to use. ie (fa-users).',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_5_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Feature 6 */
				array(
					'section_heading'       => '',
					'title'                 => 'Feature 6',
					'id'                    => '[feature_6_heading]',
					'label'                 => 'feature_6_heading', // Used in for and ID spaces
					'desc'                  => 'Feature 6 heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_6_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[feature_6_icon]',
					'label'                 => 'feature_6_icon', // Used in for and ID spaces
					'desc'                  => 'Feature 6 Icon - put the name of the Font Awesome icon you want to use. ie (fa-users).',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_6_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Feature 7 */
				array(
					'section_heading'       => '',
					'title'                 => 'Feature 7',
					'id'                    => '[feature_7_heading]',
					'label'                 => 'feature_7_heading', // Used in for and ID spaces
					'desc'                  => 'Feature 7 heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_7_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[feature_7_icon]',
					'label'                 => 'feature_7_icon', // Used in for and ID spaces
					'desc'                  => 'Feature 7 Icon - put the name of the Font Awesome icon you want to use. ie (fa-users).',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_7_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Feature 8 */
				array(
					'section_heading'       => '',
					'title'                 => 'Feature 8',
					'id'                    => '[feature_8_heading]',
					'label'                 => 'feature_8_heading', // Used in for and ID spaces
					'desc'                  => 'Feature 8 heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_8_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[feature_8_icon]',
					'label'                 => 'feature_8_icon', // Used in for and ID spaces
					'desc'                  => 'Feature 8 Icon - put the name of the Font Awesome icon you want to use. ie (fa-users).',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'feature_8_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),


				/*===================

				  Statistics Section
				=====================*/


				array(
					'section_heading'       => 'Statistics Section',
					'title'                 => 'Section Heading',
					'id'                    => '[vertical_statistics_heading]',
					'label'                 => 'vertical_statistics_heading',
					'desc'                  => 'Choose a default Statistics Section heading for this Business Type.',
					'type'                  => 'text_large',
					// Key must be unique to the particular field
					'key'                   => 'vertical_statistics_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Stat 1 */

				array(
					'section_heading'       => '',
					'title'                 => 'Stat 1',
					'id'                    => '[vertical_stat_1_heading]',
					'label'                 => 'vertical_stat_1_heading',
					'desc'                  => 'Choose a heading for statistic - 1',
					'type'                  => 'text_large',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_1_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_stat_1_text]',
					'label'                 => 'vertical_stat_1_text',
					'desc'                  => 'Choose text for statistic - 1',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_1_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_stat_1_image]',
					'label'                 => 'vertical_stat_1_image',
					'desc'                  => 'Choose an image for statistic - 1',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_1_image',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Stat 2 */

				array(
					'section_heading'       => '',
					'title'                 => 'Stat 2',
					'id'                    => '[vertical_stat_2_heading]',
					'label'                 => 'vertical_stat_2_heading',
					'desc'                  => 'Choose a heading for statistic - 2',
					'type'                  => 'text_large',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_2_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_stat_2_text]',
					'label'                 => 'vertical_stat_2_text',
					'desc'                  => 'Choose text for statistic - 2',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_2_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_stat_2_image]',
					'label'                 => 'vertical_stat_2_image',
					'desc'                  => 'Choose an image for statistic - 2',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_2_image',
					'sanitization_callback' => 'sanitize_text_field',
				),


				/* Stat 3 */

				array(
					'section_heading'       => '',
					'title'                 => 'Stat 3',
					'id'                    => '[vertical_stat_3_heading]',
					'label'                 => 'vertical_stat_3_heading',
					'desc'                  => 'Choose a heading for statistic - 3',
					'type'                  => 'text_large',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_3_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_stat_3_text]',
					'label'                 => 'vertical_stat_3_text',
					'desc'                  => 'Choose text for statistic - 3',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_3_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_stat_3_image]',
					'label'                 => 'vertical_stat_3_image',
					'desc'                  => 'Choose an image for statistic - 3',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_3_image',
					'sanitization_callback' => 'sanitize_text_field',
				),


				/* Stat 4 */

				array(
					'section_heading'       => '',
					'title'                 => 'Stat 4',
					'id'                    => '[vertical_stat_4_heading]',
					'label'                 => 'vertical_stat_4_heading',
					'desc'                  => 'Choose a heading for statistic - 4',
					'type'                  => 'text_large',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_4_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_stat_4_text]',
					'label'                 => 'vertical_stat_4_text',
					'desc'                  => 'Choose text for statistic - 4',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_4_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_stat_4_image]',
					'label'                 => 'vertical_stat_4_image',
					'desc'                  => 'Choose an image for statistic - 4',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_stat_4_image',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/*===================

				  Mobile Friendly Section
				=====================*/


				array(
					'section_heading'       => 'Mobile Friendly Section',
					'title'                 => 'Section Heading',
					'id'                    => '[vertical_mobile_friendly_heading]',
					'label'                 => 'vertical_mobile_friendly_heading', // Used in for and ID spaces
					'desc'                  => 'Set a default heading for the Mobile Friendly section.',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_mobile_friendly_image]',
					'label'                 => 'vertical_mobile_friendly_image', // Used in for and ID spaces
					'desc'                  => 'Set a default image.',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_image',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* benefit 1 */

				array(
					'section_heading'       => '',
					'title'                 => 'Benefit 1',
					'id'                    => '[vertical_mobile_friendly_highlight_1_heading]',
					'label'                 => 'vertical_mobile_friendly_highlight_1_heading',
					// Used in for and ID spaces
					'desc'                  => 'Highlight 1 - default heading.',
					'type'                  => 'text_small',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_1_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_mobile_friendly_highlight_1_icon]',
					'label'                 => 'vertical_mobile_friendly_highlight_1_icon', // Used in for and ID spaces
					'desc'                  => 'Highlight 1 - default icon.',
					'type'                  => 'text_small',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_1_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_mobile_friendly_highlight_1_text]',
					'label'                 => 'vertical_mobile_friendly_highlight_1_text', // Used in for and ID spaces
					'desc'                  => 'Highlight 1 - default text.',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_1_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* highlight 2 */

				array(
					'section_heading'       => '',
					'title'                 => 'Highlight 2',
					'id'                    => '[vertical_mobile_friendly_highlight_2_heading]',
					'label'                 => 'vertical_mobile_friendly_highlight_2_heading',
					// Used in for and ID spaces
					'desc'                  => 'Highlight 2 - default heading.',
					'type'                  => 'text_small',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_2_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_mobile_friendly_highlight_2_icon]',
					'label'                 => 'vertical_mobile_friendly_highlight_2_icon', // Used in for and ID spaces
					'desc'                  => 'Highlight 2 - default icon.',
					'type'                  => 'text_small',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_2_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_mobile_friendly_highlight_2_text]',
					'label'                 => 'vertical_mobile_friendly_highlight_2_text', // Used in for and ID spaces
					'desc'                  => 'Highlight 2 - default text.',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_2_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* highlight 3 */

				array(
					'section_heading'       => '',
					'title'                 => 'Highlight 3',
					'id'                    => '[vertical_mobile_friendly_highlight_3_heading]',
					'label'                 => 'vertical_mobile_friendly_highlight_3_heading',
					// Used in for and ID spaces
					'desc'                  => 'Highlight 3 - default heading.',
					'type'                  => 'text_small',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_3_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_mobile_friendly_highlight_3_icon]',
					'label'                 => 'vertical_mobile_friendly_highlight_3_icon', // Used in for and ID spaces
					'desc'                  => 'Highlight 3 - default icon.',
					'type'                  => 'text_small',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_3_icon',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_mobile_friendly_highlight_3_text]',
					'label'                 => 'vertical_mobile_friendly_highlight_3_text', // Used in for and ID spaces
					'desc'                  => 'Highlight 3 - default text.',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_mobile_friendly_highlight_3_text',
					'sanitization_callback' => 'sanitize_text_field',
				),


				/*===================

				  Custom Success Section
				=====================*/

				array(
					'section_heading'       => 'Customer Success Section',
					'title'                 => 'Section Heading',
					'id'                    => '[vertical_cust_success_heading]',
					'label'                 => 'vertical_cust_success_heading', // Used in for and ID spaces
					'desc'                  => 'Set a default heading for this section.',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_success_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Customer 1 */
				array(
					'section_heading'       => '',
					'title'                 => 'Customer 1',
					'id'                    => '[vertical_cust_1_image]',
					'label'                 => 'vertical_cust_1_image', // Used in for and ID spaces
					'desc'                  => 'Icon / Image',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_1_image',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_1_heading]',
					'label'                 => 'vertical_cust_1_heading', // Used in for and ID spaces
					'desc'                  => 'Heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_1_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_1_sub_heading]',
					'label'                 => 'vertical_cust_1_sub_heading', // Used in for and ID spaces
					'desc'                  => 'Sub Heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_1_sub_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_1_text]',
					'label'                 => 'vertical_cust_1_text', // Used in for and ID spaces
					'desc'                  => 'Text',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_1_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Customer 2 */
				array(
					'section_heading'       => '',
					'title'                 => 'Customer 2',
					'id'                    => '[vertical_cust_2_image]',
					'label'                 => 'vertical_cust_2_image', // Used in for and ID spaces
					'desc'                  => 'Icon / Image',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_2_image',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_2_heading]',
					'label'                 => 'vertical_cust_2_heading', // Used in for and ID spaces
					'desc'                  => 'Heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_2_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_2_sub_heading]',
					'label'                 => 'vertical_cust_2_sub_heading', // Used in for and ID spaces
					'desc'                  => 'Sub Heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_2_sub_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => 'Text',
					'id'                    => '[vertical_cust_2_text]',
					'label'                 => 'vertical_cust_2_text', // Used in for and ID spaces
					'desc'                  => 'Text',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_2_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Customer 3 */
				array(
					'section_heading'       => '',
					'title'                 => 'Customer 3',
					'id'                    => '[vertical_cust_3_image]',
					'label'                 => 'vertical_cust_3_image', // Used in for and ID spaces
					'desc'                  => 'Icon / Image',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_3_image',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_3_heading]',
					'label'                 => 'vertical_cust_3_heading', // Used in for and ID spaces
					'desc'                  => 'Heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_3_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_3_sub_heading]',
					'label'                 => 'vertical_cust_3_sub_heading', // Used in for and ID spaces
					'desc'                  => 'Sub Heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_3_sub_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_3_text]',
					'label'                 => 'vertical_cust_3_text', // Used in for and ID spaces
					'desc'                  => 'Text',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_3_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Customer 4 */
				array(
					'section_heading'       => '',
					'title'                 => 'Customer 4',
					'id'                    => '[vertical_cust_4_image]',
					'label'                 => 'vertical_cust_4_image', // Used in for and ID spaces
					'desc'                  => 'Icon / Image',
					'type'                  => 'media',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_4_image',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_4_heading]',
					'label'                 => 'vertical_cust_4_heading', // Used in for and ID spaces
					'desc'                  => 'Heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_4_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),
				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_4_sub_heading]',
					'label'                 => 'vertical_cust_4_sub_heading', // Used in for and ID spaces
					'desc'                  => 'Sub Heading',
					'type'                  => 'text_medium',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_4_sub_heading',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => '',
					'title'                 => '',
					'id'                    => '[vertical_cust_4_text]',
					'label'                 => 'vertical_cust_4_text', // Used in for and ID spaces
					'desc'                  => 'Text',
					'type'                  => 'text_area',
					// Key must be unique to the particular field
					'key'                   => 'vertical_cust_4_text',
					'sanitization_callback' => 'sanitize_text_field',
				),

			), /* End fields for tbsc_business_type */
		], /* End Term 1 - tbsc_business_type */

//		'custom_taxonomy_example' => [
//
//			'fields' => array(
//
//				/* Field One */
//				array(
//					'section_heading'    => '',
//					'title'                 => 'Field Title Here',
//					'id'                    => '[custom_title]',
//					'label'                 => 'custom_title', // Used in for and ID spaces
//					'desc'                  => 'Set a custom title to show on the front view of this page.',
//					'type'                  => 'text_medium',
//					// Key must be unique to the particular field
//					'key'                   => 'custom_title',
//					'sanitization_callback' => 'sanitize_text_field',
//				),
//
//				/* Field Two */
//				array(
//					'section_heading'    => '',
//					'title'                 => 'Field Title Here',
//					'id'                    => '[custom_title_2]',
//					'label'                 => 'Custom Page Title',
//					'desc'                  => 'Set a custom title to show on the front view of this page.',
//					'type'                  => 'text_area',
//					// Key must be unique to the particular field
//					'key'                   => 'custom_title_2',
//					'sanitization_callback' => 'sanitize_text_field',
//				),
//
//				/* Field Three */
//				array(
//					'section_heading'    => '',
//					'title'                 => 'Field Title Here',
//					'id'                    => '[custom_title_3]',
//					'label'                 => 'Custom Page Title',
//					'desc'                  => 'Set a custom title to show on the front view of this page.',
//					'type'                  => 'editor',
//					// Key must be unique to the particular field
//					'key'                   => 'custom_title_3',
//					'sanitization_callback' => 'wp_kses_post',
//					'args'                  => array(
////							'initial_content'  => 'initial content here',
//						'settings' => array(
//							'textarea_rows' => 10, // Default 10
//							'wpautop'       => true, // Default true
//							'media_buttons' => true, // Default true
//							'tinymce'       => false,
//
//						),
//					),
//				),
//
//				array(
//					'section_heading'    => '',
//					'title'                 => 'Field Title Here',
//					'id'                    => '[checkbox]',
//					'label'                 => 'Custom Page Title',
//					'desc'                  => 'Set a custom title to show on the front view of this page.',
//					'type'                  => 'checkbox',
//					// Key must be unique to the particular field
//					'key'                   => 'checkbox',
//					'sanitization_callback' => 'sanitize_text_field',
//				),
//
//				array(
//		            'section_heading'    => '',
//					'title'                 => 'Field Title Here',
//					'id'                    => '[media_upload]',
//					'label'                 => 'Media Upload',
//					'desc'                  => 'Set a custom title to show on the front view of this page.',
//					'type'                  => 'media',
//					// Key must be unique to the particular field
//					'key'                   => 'media_upload',
//					'sanitization_callback' => 'sanitize_text_field',
//				),
//
//			), /* End fields for custom_taxonomy_example */
//		], /* End Term 1 - custom_taxonomy_example */


	], /* End All Terms */


];