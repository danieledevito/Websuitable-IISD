<?php

/**
 * Home
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$home_settings = array(
	'custom_page_classes' => 'tbsc-posts-page',
	'sidebar_left_view' => TBSC_VIEWS_DIR . 'sidebars/sidebar-blog.php',
//	'header'    => '',
//	'footer'    => '',
	'entry'          => 'TBSC\Posts\Home',
);

$home = new Template( $home_settings );

$home->create_page();
