<?php

/**
 * Default Config Array
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

return array(
	'base_structure'      => TBSC_CORE_VIEWS_DIR . 'base/base.php',
//	'base_structure' => TBSC_CORE_VIEWS_DIR . 'base/mdl-base.php',
	'custom_page_classes' => 'tbsc-page',

	'loop' => TBSC_CORE_VIEWS_DIR . 'loop/loop.php',
//	'loop' => TBSC_CORE_VIEWS_DIR . 'loop/no-loop.php',

	'sidebar_left'      => false,
//	'sidebar_left_view' => TBSC_VIEWS_DIR . 'sidebars/sidebar-blog.php',
//	'sidebar_left_view' => TBSC_VIEWS_DIR . 'sidebars/sidebar-left.php',

	'sidebar_right'      => false,
	'sidebar_right_view' => TBSC_VIEWS_DIR . 'sidebars/sidebar-right.php',

	// Header classes available - 'OffCanvasHeader', 'TopBarHeaderNav',
	'header'             => '\TBSC\Header\Header',

	'footer'       => '\TBSC\Footer\Footer',
	'navigation'   => array(
		'config' => 'menus/menus.php',
	),
);