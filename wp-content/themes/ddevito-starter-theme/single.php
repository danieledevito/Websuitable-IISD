<?php

/**
 * Single post template
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

namespace TBSC;

use TBSC\Base\Template;

$post_settings = array(
	'custom_page_classes' => 'tbsc-single-post',

	'sidebar_left'      => false,
	'sidebar_left_view' => TBSC_VIEWS_DIR . 'sidebars/sidebar-blog.php',

	'sidebar_right'      => false,
	'sidebar_right_view' => TBSC_VIEWS_DIR . 'sidebars/sidebar-right.php',
//	'header'    => '',
//	'footer'    => '',
	'entry'   => 'TBSC\Posts\Post',
);

$single_post = new Template( $post_settings );

$single_post->create_page();