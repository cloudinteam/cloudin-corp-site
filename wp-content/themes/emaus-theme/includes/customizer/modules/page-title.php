<?php
/**
 * Customizer Page Title
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Page title padding
Kirki::add_field( 'deo_config', array(
	'type'        => 'dimensions',
	'settings'    => 'deo_page_title_padding',
	'label'       => esc_attr__( 'Page title top/bottom padding', 'emaus' ),
	'section'     => 'deo_page_title',
	'default'     => [
		'padding-top'    => '90px',
		'padding-bottom' => '115px',
	],
	'output'       => array(
		array(
			'element'     => '.page-title',
		),
	),
	'transport' => 'auto',
) );


// Show page breadcrumbs
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_breadcrumbs_pages_show',
	'label'       => esc_attr__( 'Show breadcrumbs on a regular pages', 'emaus' ),
	'section'     => 'deo_page_title',
	'default'     => false,
) );

// Show single post breadcrumbs
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_breadcrumbs_single_post_show',
	'label'       => esc_attr__( 'Show breadcrumbs on a single post', 'emaus' ),
	'section'     => 'deo_page_title',
	'default'     => false,
) );