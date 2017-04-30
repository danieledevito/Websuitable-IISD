<?php
/**
 * options.php
 *
 * @author           Daniele De Vito
 * @copyright        2015 Daniele De Vito
 * @license        GPL-2.0+
 */

$page_slug   = 'iisd-settings';
$option_name = 'iisd_settings';
return array(
	// Be sure to do a search and replace when changing any of these values.
	'main_settings'    => array(
		'heading'      => 'Custom Site Options',
		'menu_title'   => 'Site Options',
		'page_slug'    => $page_slug,
		'dashicon'     => "/images/websuitable.ico",
		'option_group' => $option_name . '_group',
		'option_name'  => $option_name,
		'views'        => array(
			'text_small'  => 'text-small.php',
			'text_medium' => 'text-medium.php',
			'text_large'  => 'text-large.php',
			'text_area'   => 'text-area.php',
			'checkbox'    => 'checkbox.php',
			'radio'       => 'radio.php',
			'options'     => 'options.php',
			'editor'      => 'editor.php',
			'media'       => 'file-upload.php',
		),
	),
	'metabox_sections' => array(

		'post_cat_area' => array(
			'args'   => array(
				'id'        => 'post_cat_area',
				'title'     => 'Post Categories',
				'desc'      => '',
				'page_slug' => $page_slug,
			),
			'fields' => array(
				'id_of_featured_news' => array(
					'type'      => 'text_small',
					'id'        => $option_name . '[id_of_featured_news]',
					'title'     => 'ID of Featured News',
					'desc'      => 'This will update the News categorey landing page',
					'page_slug' => $page_slug,
					'section'   => 'post_cat_area',
					'key'       => 'id_of_featured_news',
					'required'  => true,
					'callback'  => 'sanitize_text_field',
				),
				'id_of_featured_papers' => array(
					'type'      => 'text_small',
					'id'        => $option_name . '[id_of_featured_papers]',
					'title'     => 'ID of Featured Paper',
					'desc'      => 'This will update the Papers categorey landing page',
					'page_slug' => $page_slug,
					'section'   => 'post_cat_area',
					'key'       => 'id_of_featured_papers',
					'required'  => true,
					'callback'  => 'sanitize_text_field',
				),
				'id_of_featured_articals' => array(
					'type'      => 'text_small',
					'id'        => $option_name . '[id_of_featured_articals]',
					'title'     => 'ID of Featured Articals',
					'desc'      => 'This will update the Articals categorey landing page',
					'page_slug' => $page_slug,
					'section'   => 'post_cat_area',
					'key'       => 'id_of_featured_articals',
					'required'  => true,
					'callback'  => 'sanitize_text_field',
				),
			),
		),
	), // End metabox sections
); // end config array