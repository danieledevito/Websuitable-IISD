<?php

/**
 * Template Name: Full Width Page
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$full_width_page_settings = array(
	'custom_page_classes' => 'tbsc-full-width',
//	'header'    => '',
//	'footer'    => '',
	'entry' => 'TBSC\Pages\Page',
);

$full_width_page = new Template( $full_width_page_settings );

$full_width_page->create_page();