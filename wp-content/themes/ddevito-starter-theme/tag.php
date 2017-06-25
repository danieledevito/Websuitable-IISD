<?php

/**
 * Tag
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$archive_settings = array(
	'custom_page_classes' => 'tbsc-tag',
//	'header'    => '',
//	'footer'    => '',
	'entry' => 'TBSC\Posts\Tag',
);

$archive_page = new Template( $archive_settings );

$archive_page->create_page();