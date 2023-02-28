<?php

add_filter( 'deo_meta_boxes', 'deo_add_meta_boxes' );
function deo_add_meta_boxes( $meta_boxes = [] ) {
	$prefix = 'deo_meta_';

	// Page settings
	$meta_boxes[] = [
		'id'         => 'deo-page-settings',
		'title'      => esc_html__( 'Page Settings', 'deo-core' ),
		'post_types' => [ 'page', 'post' ],
		'context'    => 'normal',
		'priority'   => 'high',
		'prefix'     => $prefix,
		'fields' => [
			[
				'name'  => esc_html__( 'Page Layout', 'deo-core' ),
				'id'    => '_deo_page_layout',
				'type'  => 'layout',
				'options'         => [
					'fullwidth'    => array( 'title' => esc_html__( 'Full Width', 'deo-core' ), 'img' => DEO_CORE_URL . 'admin/assets/img/fullwidth.png' ),
					'left-sidebar'  => array( 'title' => esc_html__( 'Left Sidebar', 'deo-core' ), 'img' => DEO_CORE_URL . 'admin/assets/img/left-sidebar.png' ),
					'right-sidebar' => array( 'title' => esc_html__( 'Right Sidebar', 'deo-core' ), 'img' => DEO_CORE_URL . 'admin/assets/img/right-sidebar.png' ),
				],
				'description'   => esc_html__( 'Select the layout for this page', 'deo-core' ),
			],
			[
				'name'  => esc_html__( 'Header Layout', 'deo-core' ),
				'id'    => '_deo_header_layout',
				'type'  => 'select',
				'options'         => [
					'nav--default'     	=> esc_html__( 'Header Default', 'deo-core' ),
					'nav--transparent'  => esc_html__( 'Header Transparent', 'deo-core' ),
				],
			],
			[
				'name'  => esc_html__( 'Page Subtitle', 'deo-core' ),
				'id'    => '_deo_page_subtitle',
				'type'  => 'text',
			],
		]
	];

	return $meta_boxes;
}