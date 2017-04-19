<?php
/**
 * main-config.php
 *
 * @author     Daniele De Vito
 * @link      http://lmgtfy.com/?q=daniele+de+vito
 * @copyright  2015 Daniele De Vito
 * @license    GPL-2.0+
 */

// 2 CPTs out of the box. You can remove / add as you wish. The info in this config array is just dummy data to get you started.
//$cpt_1 = 'tbsc_verticals';

return array(

	'post_types' => array(
		'featured_items' => array(
			'post_type_args'        => array(
				'label'               => __( 'featured_items', 'ddevito' ),
				'description'         => __( 'Featured Items', 'ddevito' ),
				'labels'              => array(
					'name'                  => 'Featured Items',
					'singular_name'         => 'Featured Item',
					'add_new'               => 'Add New',
					'add_new_item'          => 'Add New Featured Item',
					'edit_item'             => 'Edit Featured Item',
					'new_item'              => 'New Featured Item',
					'all_items'             => 'All Featured Items',
					'view_item'             => 'View Featured Item',
					'search_items'          => 'Search Featured Item',
					'not_found'             => 'No Featured Items found',
					'not_found_in_trash'    => 'No Featured Items found in Trash',
					'parent_item_colon'     => '',
					// Overrides the “Featured Image” phrase for this post type.
					'featured_image '       => 'Featured Item Image',
					// Overrides the “Set featured image” phrase for this post type.
					'set_featured_image'    => 'Set Featured Item Image',
					// Overrides the “Remove featured image” phrase for this post type.
					'remove_featured_image' => 'Remove Featured Item Image',
					// Overrides the “Use as featured image” phrase for this post type.
					'use_featured_image'    => 'Use as Featured Item image.',
					// The post type archive label used in nav menus. Default “Post Archives”.
					'archives'              => 'Featured Item Archives',
					// Used when inserting media into a post.
					'insert_into_item'      => 'Insert into Featured Item.',
					// Used when viewing media attached to a post.
					'uploaded_to_this_item' => 'Uploaded to this Featured Item.',
					// Screen reader text for the filter links heading on the post type listing screen.
					'filter_items_list'     => 'Filter Featured Items list',
					// Screen reader text for the pagination heading on the post type listing screen.
					'items_list_navigation' => 'Featured Items list navigation',
					//Screen reader text for the items list heading on the post type listing screen.
					'items_list'            => 'Featured Items list',
					'menu_name'             => 'Featured Items',
				),
				'menu_icon'           => 'dashicons-smiley',
				'rewrite'             => array( 'slug' => 'featured_item' ),
				'menu_position'       => 5,
				'supports'            => array(
					'title',
					'editor',
//					'excerpt',
					'author',
					'thumbnail',
//					'comments',
//					'trackbacks',
					'revisions', // Must be supported or else post meta won't be saved.
					'page-attributes'
				),
				'public'              => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive'         => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'query_var'           => true,
				'capability_type'     => 'post',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'hierarchical'        => false,
//					'taxonomies'          	=> array( '' ) // using register_taxonomy_for_object_type instead
			),
			'custom_taxonomies' => array(
				'tax_one'   => array(
					'hierarchical'      => true,
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'post_types' ),
					'labels'            => array(
						'name'              => _x( 'Types of Posts', 'taxonomy general name' ),
						'singular_name'     => _x( 'Post Type', 'taxonomy singular name' ),
						'search_items'      => __( 'Search Post Type' ),
						'all_items'         => __( 'All Post Types' ),
						'parent_item'       => __( 'Parent Post Type' ),
						'parent_item_colon' => __( 'Parent Post Type:' ),
						'edit_item'         => __( 'Edit Post Type' ),
						'update_item'       => __( 'Update Post Type' ),
						'add_new_item'      => __( 'Add New Post Type' ),
						'new_item_name'     => __( 'New Post Type Name' ),
						// Used when indicating that there are no terms in the given taxonomy associated with an object.
						'no_terms'              => 'No post types',
						// Screen reader text for the pagination heading on the term listing screen.
						'items_list_navigation' => 'Post type navigation',
						// Screen reader text for the items list heading on the term listing screen.
						'items_list'            => 'Tags list / Categories list',
						'menu_name'         => __( 'Post Types' ),
					),
				), // End Custom Taxonomy
			), // End Custom Taxonomy Group
		), // End Custom Post Type
	), // End All Custom Post Types
); // End Config Array
