<?php

/**
 * Main configuration array
 *
 * Customization of this child theme largely happens
 * by manipulating the data in this array.
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

// Config array
return array(

	/*==========================
	 * Menus - plugin new closures to register new menus.
	 * Be sure to add new config files for each menu.
	 * ===================================*/

	/**
	 * Register site menus.
	 *
	 * @since 1.0.0
	 */
	'menu_registration' => array(
		'primary' => 'Primary Menu',
		'social'  => 'Social Menu',
		'footer'  => 'Footer Menu',
		'category-menu' => 'Cat Menu',
	),

	'view_path'   => function () {
		return get_stylesheet_directory() . '/lib/views/';
	},
	'config_path' => function () {
		return get_stylesheet_directory() . '/config/';
	},

	/**
	 * Register Widget Areas
	 *
	 * Direct Core to the widget area config file.
	 *
	 * @since 2.0.0
	 */

	'widget_areas'     => TBSC_CONFIG_DIR . 'widget-areas/widget-areas.php',

	/*==========================
	 * Objects always required instantiated at after_setup_theme
	 * in the CoreController.
	 * ===================================*/

	/**
	 * Create required objects.
	 *
	 * FoundationMenu is required to add Foundation css
	 * classes and styles to the menus.
	 * Created in CoreController.
	 *
	 * @since 1.0.0
	 */
	'required_objects' => array(
		'\TBSC_Core\Navigation\FoundationMenu',
	),

	/*==========================
	 * Shortcodes - instantiated on CoreController instantiation
	 * ===================================*/

	'shortcodes' => array(),

	/*==========================
	 * Settings for Post and Page types:
	 *
	 * You can override any of the defaults by
	 * changing the values in the template-args array
	 * ===================================*/

);