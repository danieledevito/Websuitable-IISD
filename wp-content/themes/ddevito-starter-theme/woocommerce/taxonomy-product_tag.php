<?php
/**
 * The Template for displaying products in a product tag. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_tag.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

namespace TBSC;

use TBSC\Base\Template;

$woo_product_archives = array(
	'layout' => TBSC_CORE_VIEWS_DIR . 'layouts/content-full-width.php',
//	'sidebar'       => TBSC_VIEWS_DIR . 'sidebars/sidebar-blog.php',
//				'header'    => '',
//				'footer'    => '',
	'loop'   => TBSC_CORE_VIEWS_DIR . 'loop/no-loop.php',
	'entry'  => 'TBSC\Posts\WooArchive'
);

$woo_archives = new Template( $woo_product_archives );

$woo_archives->create_page();
