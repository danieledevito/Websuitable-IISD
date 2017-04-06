<?php
/**
 * terms.php
 *
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

return [

	// Select a unique key here for your taxonomy.
	'option_name' => '_tbsc_custom_term_meta',

	'field_types' => array(
		'text_small'          => 'text-small.php',
		'text_medium'         => 'text-medium.php',
		'text_large'          => 'text-large.php',
		'text_area'           => 'text-area.php',
		'editor'              => 'editor.php',
		'checkbox'            => 'checkbox.php',
		'media'               => 'file-upload.php',
		'select'              => 'select.php',
		'query_select'        => 'select-query.php', // Rename this according to the query you're running.
		'select_tax_query_id' => 'select-tax-query-id.php',
		'select_cpt_query_id' => 'select-cpt-query-id.php',
	),

	'taxonomy' => [

		// Must match the taxonomy id. See your CPT config file for this value.
		'tbsc_business_type' => [

			'fields' => array(

				/* Do Query using given Taxonomy ID */
				array(
					'title'                 => 'What SBU Category do you want to feature on the main page?',
					'id'                    => '[sbu_ft_article_category]',
					'label'                 => 'sbu_ft_article_category',
					'desc'                  => 'Any post in this category will be featured on the main SBU page (latest 4 posts). You can name your chosen category anything you want. Users will not be able to see the name you chose.',
					'type'                  => 'select_tax_query_id',
					'tax_id'                => 'tbsc_sbu_cat',
					// Key must be unique to the particular field
					'key'                   => 'sbu_ft_article_category',
					'sanitization_callback' => 'sanitize_text_field',
				),

				/* Do Query using given Post Type ID */
				array(
					'title'                 => 'What SBU Category do you want to feature on the main page?',
					'id'                    => '[sbu_ft_post_type]',
					'label'                 => 'sbu_ft_post_type',
					'desc'                  => 'Any post in this category will be featured on the main SBU page (latest 4 posts). You can name your chosen category anything you want. Users will not be able to see the name you chose.',
					'type'                  => 'select_cpt_query_id',
					'cpt_id'                => 'tbsc_sbu',
					// Key must be unique to the particular field
					'key'                   => 'sbu_ft_post_type',
					'sanitization_callback' => 'sanitize_text_field',
				),

				array(
					'section_heading'       => 'Top Hero Section',
					'title'                 => 'Pricing Text',
					'id'                    => '[query_select_test]',
					'label'                 => 'query_select_test',
					// Used in for and ID spaces
					'desc'                  => '',
					'type'                  => 'query_select',
					// This may change depending on the query you're grabbing.
					// Key must be unique to the particular field
					'key'                   => 'query_select_test',
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
					'id'                    => '[vertical_select_test]',
					'label'                 => 'vertical_select_test', // Used in for and ID spaces
					'desc'                  => 'Set Business Type default pricing text. ie( Starting at $48 / month).',
					'type'                  => 'select',
					// Key must be unique to the particular field
					'key'                   => 'vertical_select_test',
					'sanitization_callback' => 'sanitize_text_field',
					'options'               => array(
						'value_1' => 'Option 1',
						'value_2' => 'Option 2',
						'value_3' => 'Option 3',
						'value_4' => 'Option 4',
					),
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

				  Section Heading
				=====================*/

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

				array(
					'section_heading'       => '',
					'title'                 => 'Field Title Here',
					'id'                    => '[checkbox_key]',
					'label'                 => 'checkbox_key',
					'desc'                  => 'Set a custom title to show on the front view of this page.',
					'type'                  => 'checkbox',
					// Key must be unique to the particular field
					'key'                   => 'checkbox_key',
					'sanitization_callback' => 'sanitize_text_field',
				),


			), /* End fields for tbsc_business_type */
		], /* End Term 1 - tbsc_business_type */

	], /* End All Terms */


];