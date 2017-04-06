<?php

/**
 * Index
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$page_settings = array(
//	'header'    => '',
//	'footer'    => '',
	'entry' => 'TBSC\Pages\Page',
);

$page_page = new Template( $page_settings );

$page_page->create_page();
