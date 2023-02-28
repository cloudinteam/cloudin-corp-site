<?php

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function deo_case_study_post_type() {

	$permalinks = get_option( 'emaus_permalinks' );

	$labels = array(
		'name'               => __( 'Case Studies', 'deo-core' ),
		'singular_name'      => __( 'Case Study', 'deo-core' ),
		'add_new'            => __( 'Add New', 'deo-core' ),
		'add_new_item'       => __( 'Add New', 'deo-core' ),
		'edit_item'          => __( 'Edit Case Study', 'deo-core' ),
		'new_item'           => __( 'New Case Study', 'deo-core' ),
		'view_item'          => __( 'View Case Study', 'deo-core' ),
		'search_items'       => __( 'Search Case Study', 'deo-core' ),
		'not_found'          => __( 'No Case Studies found', 'deo-core' ),
		'not_found_in_trash' => __( 'No Case Studies found in Trash', 'deo-core' ),
		'parent_item_colon'  => __( 'Parent Case Study:', 'deo-core' ),
		'menu_name'          => __( 'Case Studies', 'deo-core' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'taxonomies'          => array( 'case_study_categories', 'case_study_tags' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_rest'        => true,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array(
			'slug' 							=> empty( $permalinks['case_study_base'] ) ? _x( 'case_study', 'slug', 'deo-core' ) : $permalinks['case_study_base'],
		),
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'revisions',
			'page-attributes',
		),
	);

	register_post_type( 'case_study', $args );

	/**
	 * Create a category taxonomy
	 */
	$tax_labels = array(
		'name'                  => _x( 'Case Study Categories', 'Taxonomy plural name', 'deo-core' ),
		'singular_name'         => _x( 'Case Study Category', 'Taxonomy singular name', 'deo-core' ),
		'search_items'          => __( 'Search Categories', 'deo-core' ),
		'popular_items'         => __( 'Popular Categories', 'deo-core' ),
		'all_items'             => __( 'All Categories', 'deo-core' ),
		'parent_item'           => __( 'Parent Category', 'deo-core' ),
		'parent_item_colon'     => __( 'Parent Category', 'deo-core' ),
		'edit_item'             => __( 'Edit Category', 'deo-core' ),
		'update_item'           => __( 'Update Category', 'deo-core' ),
		'add_new_item'          => __( 'Add New Category', 'deo-core' ),
		'new_item_name'         => __( 'New Category Name', 'deo-core' ),
		'add_or_remove_items'   => __( 'Add or remove Categories', 'deo-core' ),
		'choose_from_most_used' => __( 'Choose from most used Categories', 'deo-core' ),
		'menu_name'             => __( 'Categories', 'deo-core' ),
	);

	$tax_args = array(
		'labels'            => $tax_labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug' 						=> empty( $permalinks['case_study_categories_base'] ) ? _x( 'case_study_categories', 'slug', 'deo-core' ) : $permalinks['case_study_categories_base'],
		),
		'capabilities'      => array(),
	);

	register_taxonomy( 'case_study_categories', 'case_study', $tax_args );

}

add_action( 'init', 'deo_case_study_post_type' );