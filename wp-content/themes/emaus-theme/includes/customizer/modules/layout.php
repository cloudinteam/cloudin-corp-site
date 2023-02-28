<?php
/**
 * Customizer Layout
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Blog layout
Kirki::add_field( 'deo_config', array(
	'type'        => 'radio-image',
	'settings'    => 'deo_blog_layout_type',
	'label'       => esc_html__( 'Layout type', 'emaus' ),
	'section'     => 'deo_blog_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Blog columns
Kirki::add_field( 'deo_config', array(
	'type'        => 'select',
	'settings'    => 'deo_blog_columns',
	'label'       => esc_html__( 'Columns', 'emaus' ),
	'description' => esc_html__( 'Use this option for regular blog pages, such as homepage', 'emaus' ),
	'section'     => 'deo_blog_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'emaus' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'emaus' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'emaus' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'emaus' ),
	),
) );

// Case studies columns
Kirki::add_field( 'deo_config', array(
	'type'        => 'select',
	'settings'    => 'deo_case_study_columns',
	'label'       => esc_html__( 'Columns', 'emaus' ),
	'description' => esc_html__( 'Use this option for case studies archive pages', 'emaus' ),
	'section'     => 'deo_case_study_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'emaus' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'emaus' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'emaus' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'emaus' ),
	),
) );

// Page Layout
Kirki::add_field( 'deo_config', array(
	'type'        => 'radio-image',
	'settings'    => 'deo_page_layout_type',
	'label'       => esc_html__( 'Layout type', 'emaus' ),
	'section'     => 'deo_page_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives Layout
Kirki::add_field( 'deo_config', array(
	'type'        => 'radio-image',
	'settings'    => 'deo_archive_layout_type',
	'label'       => esc_html__( 'Layout type', 'emaus' ),
	'section'     => 'deo_archive_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives columns
Kirki::add_field( 'deo_config', array(
	'type'        => 'select',
	'settings'    => 'deo_archive_columns',
	'label'       => esc_html__( 'Columns', 'emaus' ),
	'section'     => 'deo_archive_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'emaus' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'emaus' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'emaus' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'emaus' ),
	),
) );

// Search Layout
Kirki::add_field( 'deo_config', array(
	'type'        => 'radio-image',
	'settings'    => 'deo_search_results_layout_type',
	'label'       => esc_html__( 'Layout type', 'emaus' ),
	'section'     => 'deo_search_results_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  => get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Search columns
Kirki::add_field( 'deo_config', array(
	'type'        => 'select',
	'settings'    => 'deo_search_results_columns',
	'label'       => esc_html__( 'Columns', 'emaus' ),
	'section'     => 'deo_search_results_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_attr__( '1 Column', 'emaus' ),
		'col-lg-6' => esc_attr__( '2 Columns', 'emaus' ),
		'col-lg-4' => esc_attr__( '3 Columns', 'emaus' ),
		'col-lg-3' => esc_attr__( '4 Columns', 'emaus' ),
	),
) );