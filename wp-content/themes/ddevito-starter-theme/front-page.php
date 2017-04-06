<?php

/**
 * FrontPage page template
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$front_page_settings = array(
	'custom_page_classes' => 'tbsc-front-page',
//	'sidebar_left_view' => TBSC_VIEWS_DIR . 'sidebars/sidebar-left.php',
//	'header'    => '',
//	'footer'    => '',
	'entry' => 'TBSC\Pages\FrontPage',
);

$front_page = new Template( $front_page_settings );

$front_page->create_page();