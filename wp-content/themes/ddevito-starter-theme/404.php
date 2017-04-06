<?php

/**
 * Page template 404
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$page_404_settings = array(
	'custom_page_classes' => 'tbsc-404',
//	'header'    => '',
//	'footer'    => '',
	'loop'           => TBSC_CORE_VIEWS_DIR . 'loop/no-loop.php',
	'entry' => 'TBSC\Pages\Page404',
);

$page_404_page = new Template( $page_404_settings );

$page_404_page->create_page();