<?php
/**
 * Customizer Header
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Header type
Kirki::add_field( 'deo_config', array(
	'type'        => 'select',
	'settings'    => 'deo_header_settings',
	'label'       => esc_html__( 'Select the header layout', 'emaus' ),
	'description' => esc_html__( 'This option will apply on all pages, for specific pages use individual page settings', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => 'nav--default',
	'choices'     => array(
		'nav--default'  	 => esc_attr__( 'Header Default', 'emaus' ),
		'nav--transparent' => esc_attr__( 'Header Transparent', 'emaus' ),		
	),
) );

// Sticky nav
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_sticky_nav_show',
	'label'       => esc_html__( 'Sticky navbar', 'emaus' ),
	'description' => esc_html__( 'Will apply only on big screens', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => true,
) );

// Header height
Kirki::add_field( 'deo_config', array(
	'type'        => 'slider',
	'settings'    => 'deo_header_height',
	'label'       => esc_attr__( 'Header height', 'emaus' ),
	'description' => esc_html__( 'Will apply only on big screens', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => 72,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
		array(
			'element'     => '.nav',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
		array(
			'element'     => '.nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Header sticky height
Kirki::add_field( 'deo_config', array(
	'type'        => 'slider',
	'settings'    => 'deo_header_sticky_height',
	'label'       => esc_attr__( 'Header sticky height', 'emaus' ),
	'description' => esc_html__( 'Will apply only on big screens', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
		array(
			'element'     => '.nav--sticky.sticky .nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Header mobile height
Kirki::add_field( 'deo_config', array(
	'type'        => 'slider',
	'settings'    => 'deo_header_mobile_height',
	'label'       => esc_attr__( 'Header mobile height', 'emaus' ),
	'description' => esc_html__( 'Will apply only on mobile screens', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => '@media (max-width: 991px)',
		),
		array(
			'element'     => '.nav',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => '@media (max-width: 991px)',
		),
	),
	'transport' => 'auto',
) );

// Logo height
Kirki::add_field( 'deo_config', array(
	'type'        => 'slider',
	'settings'    => 'deo_header_logo_height',
	'label'       => esc_attr__( 'Header logo height', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => 48,
	'choices'     => array(
		'min'  => '10',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header .logo',
			'property'    => 'max-height',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
) );

// Logo sticky height
Kirki::add_field( 'deo_config', array(
	'type'        => 'slider',
	'settings'    => 'deo_header_logo_sticky_height',
	'label'       => esc_attr__( 'Header logo sticky height', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => 48,
	'choices'     => array(
		'min'  => '10',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__header .logo',
			'property'    => 'max-height',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
) );

// Menu items horizontal spacing
Kirki::add_field( 'deo_config', array(
	'type'        => 'slider',
	'settings'    => 'deo_header_text_links_horizontal_spacing',
	'label'       => esc_attr__( 'Menu text links horizontal spacing', 'emaus' ),
	'description' => esc_html__( 'Will apply only on big screens', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => 17,
	'choices'     => array(
		'min'  => '0',
		'max'  => '60',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-left',
			'units'       => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-right',
			'units'       => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Show header button
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_header_button_show',
	'label'       => esc_html__( 'Show button', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => false,
) );

// Header button URL
Kirki::add_field( 'deo_config', array(
	'type'        => 'url',
	'settings'    => 'deo_header_button_url',
	'label'       => esc_html__( 'Button URL', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => esc_url( 'https://deothemes.com' ),
) );

// Header button text
Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_header_button_text',
	'label'       => esc_html__( 'Button Text', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => esc_html__( 'Try Free', 'emaus' ),
) );

// Header button target
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_header_button_target',
	'label'       => esc_html__( 'Open in a new tab', 'emaus' ),
	'section'     => 'deo_header',
	'default'     => true,
) );