<?php
/**
 * tab-group-terms.php
 *
 * @package   tbsc-2
 * @author    Daniele De Vito
 * @copyright 2016 Daniele De Vito
 * @license   GPL-2.0+
 */

return [

    'option_name' => '_tbsc_custom_term_meta_featured_tabs',

    'field_types' => array(
        'text_small' => 'text-small.php',
        'text_medium' => 'text-medium.php',
        'text_large' => 'text-large.php',
        'text_area' => 'text-area.php',
        'editor' => 'editor.php',
        'checkbox' => 'checkbox.php',
        'media' => 'file-upload.php',
        'query_select' => 'select-feature-tabs-query.php'
    ),

    'taxonomy' => [

        'business_types_tabs' => [

            'fields' => array(

                array(
                    'section_heading' => 'Feature 1',
                    'title' => '',
                    'id' => '[feature_tabs_1]',
                    'label' => 'feature_tabs_1', // Used in for and ID spaces
                    'desc' => '',
                    'type' => 'query_select',
                    // Key must be unique to the particular field
                    'key' => 'feature_tabs_1',
                    'sanitization_callback' => 'sanitize_text_field',
                ),

                array(
                    'section_heading' => 'Feature 2',
                    'title' => '',
                    'id' => '[feature_tabs_2]',
                    'label' => 'feature_tabs_2', // Used in for and ID spaces
                    'desc' => '',
                    'type' => 'query_select',
                    // Key must be unique to the particular field
                    'key' => 'feature_tabs_2',
                    'sanitization_callback' => 'sanitize_text_field',
                ),


                array(
                    'section_heading' => 'Feature 3',
                    'title' => '',
                    'id' => '[feature_tabs_3]',
                    'label' => 'feature_tabs_3', // Used in for and ID spaces
                    'desc' => '',
                    'type' => 'query_select',
                    // Key must be unique to the particular field
                    'key' => 'feature_tabs_3',
                    'sanitization_callback' => 'sanitize_text_field',
                ),

                array(
                    'section_heading' => 'Feature 4',
                    'title' => '',
                    'id' => '[feature_tabs_4]',
                    'label' => 'feature_tabs_4', // Used in for and ID spaces
                    'desc' => '',
                    'type' => 'query_select',
                    // Key must be unique to the particular field
                    'key' => 'feature_tabs_4',
                    'sanitization_callback' => 'sanitize_text_field',
                ),

                array(
                    'section_heading' => 'Feature 5',
                    'title' => '',
                    'id' => '[feature_tabs_5]',
                    'label' => 'feature_tabs_5', // Used in for and ID spaces
                    'desc' => '',
                    'type' => 'query_select',
                    // Key must be unique to the particular field
                    'key' => 'feature_tabs_5',
                    'sanitization_callback' => 'sanitize_text_field',
                ),

                array(
                    'section_heading' => 'Feature 6',
                    'title' => '',
                    'id' => '[feature_tabs_6]',
                    'label' => 'feature_tabs_6', // Used in for and ID spaces
                    'desc' => '',
                    'type' => 'query_select',
                    // Key must be unique to the particular field
                    'key' => 'feature_tabs_6',
                    'sanitization_callback' => 'sanitize_text_field',
                ),

                array(
                    'section_heading' => 'Feature 7',
                    'title' => '',
                    'id' => '[feature_tabs_7]',
                    'label' => 'feature_tabs_7', // Used in for and ID spaces
                    'desc' => '',
                    'type' => 'query_select',
                    // Key must be unique to the particular field
                    'key' => 'feature_tabs_7',
                    'sanitization_callback' => 'sanitize_text_field',
                ),

                array(
                    'section_heading' => 'Feature 8',
                    'title' => '',
                    'id' => '[feature_tabs_8]',
                    'label' => 'feature_tabs_8', // Used in for and ID spaces
                    'desc' => '',
                    'type' => 'query_select',
                    // Key must be unique to the particular field
                    'key' => 'feature_tabs_8',
                    'sanitization_callback' => 'sanitize_text_field',
                ),
            ),

        ],

    ], /* End All Terms */


];