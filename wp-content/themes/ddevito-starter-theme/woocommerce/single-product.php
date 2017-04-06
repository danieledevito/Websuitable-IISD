<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
namespace TBSC;

use TBSC\Base\Template;

$woo_product_single = array(
	'layout' => TBSC_CORE_VIEWS_DIR . 'layouts/content-full-width.php',
//	'sidebar'       => TBSC_VIEWS_DIR . 'sidebars/sidebar-blog.php',
//				'header'    => '',
//				'footer'    => '',
	'loop'   => TBSC_CORE_VIEWS_DIR . 'loop/no-loop.php',
	'entry'  => 'TBSC\Posts\WooSingle'
);

$woo_single = new Template( $woo_product_single );

$woo_single->create_page();