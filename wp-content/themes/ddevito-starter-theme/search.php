<?php

/**
 * Search template
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$search_page_settings = array(
	'custom_page_classes' => 'tbsc-search-results',
//	'header'    => '',
//	'footer'    => '',
	'entry' => 'TBSC\Pages\SearchPage',
);

$search_page = new Template( $search_page_settings );

$search_page->create_page();