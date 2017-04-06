<?php

/**
 * Page template
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$page_settings = array(
	'custom_page_classes' => 'tbsc-page',

	'sidebar_right'      => true,
	'sidebar_right_view' => TBSC_VIEWS_DIR . 'sidebars/sidebar-right.php',
//	'header'    => '',
//	'footer'    => '',
	'entry' => 'TBSC\Pages\Page',
);

$page_page = new Template( $page_settings );

$page_page->create_page();
