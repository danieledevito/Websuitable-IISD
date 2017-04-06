<?php

/**
 * user-roles.php
 *
 * @package   Starter Theme
 * @author    Daniele De Vito
 * @copyright 2015 Daniele De Vito
 * @license   GPL-2.0+
 */

return array(

//	'tbsc_admin' => array(
//		'role'         => 'tbsc_admin',
//		'display_name' => 'Super',
//		'capabilities' => array(
//
//			/* Adding */
//			'publish_pages'          => true,
//			'publish_posts'          => true,
//			'read'                   => true,
//			'read_private_pages'     => true,
//			'read_private_posts'     => true,
//
//			/* Deleting */
//			'delete_others_pages'    => true,
//			'delete_others_posts'    => true,
//			'delete_pages'           => true,
//			'delete_posts'           => true,
//			'delete_private_pages'   => true,
//			'delete_private_posts'   => true,
//			'delete_published_pages' => true,
//			'delete_published_posts' => true,
//
//			/*Editing*/
//			'edit_others_pages'      => true,
//			'edit_others_posts'      => true,
//			'edit_pages'             => true,
//			'edit_posts'             => true,
//			'edit_private_pages'     => true,
//			'edit_private_posts'     => true,
//			'edit_published_pages'   => true,
//			'edit_published_posts'   => true,
//
//			/* Misc */
//			'manage_categories'      => true,
//			'manage_links'           => true,
//			'moderate_comments'      => true,
//			'unfiltered_html'        => true,
//			'upload_files'           => true,
//
//		),
//	),

	'tbsc_client_admin' => array(
		'role'         => 'tbsc_client_admin',
		'display_name' => 'Client Admin',
		'capabilities' => array(

			'update_core'            => false,

			/* Plugins */
			'update_plugins'         => false,
			'delete_plugins'         => false,
			'edit_plugins'           => false,
			'install_plugins'        => false,
			'activate_plugins'       => false,

			/* Themes */
			'switch_themes'          => false,
			'update_themes'          => false,
			'delete_themes'          => false,
			'install_themes'         => false,

			/* Menus and widgets */
			'edit_theme_options'     => true,

			/* Adding */
			'publish_pages'          => true,
			'publish_posts'          => true,
			'read'                   => true,
			'read_private_pages'     => true,
			'read_private_posts'     => true,

			/* Deleting */
			'delete_others_pages'    => true,
			'delete_others_posts'    => true,
			'delete_pages'           => true,
			'delete_posts'           => true,
			'delete_private_pages'   => true,
			'delete_private_posts'   => true,
			'delete_published_pages' => true,
			'delete_published_posts' => true,

			/*Editing*/
			'edit_others_pages'      => true,
			'edit_others_posts'      => true,
			'edit_pages'             => true,
			'edit_posts'             => true,
			'edit_private_pages'     => true,
			'edit_private_posts'     => true,
			'edit_published_pages'   => true,
			'edit_published_posts'   => true,

			/* Misc */
			'manage_categories'      => true,
			'manage_links'           => true,
			'moderate_comments'      => true,
			'unfiltered_html'        => true,
			'upload_files'           => true,
			'export'                 => false,
			'import'                 => false,
		),
	),

);