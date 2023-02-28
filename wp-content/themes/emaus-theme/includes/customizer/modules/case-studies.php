<?php
/**
 * Customizer Case Studies
 *
 * @package Emaus
 * @since 1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Page Title
Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_case_study_archives_title',
	'label'       => esc_attr__( 'Case study archives title', 'emaus' ),
	'section'     => 'deo_case_studies',
	'default'     => esc_html__( 'Case Studies', 'emaus' ),
) );

// Page Subtitle
Kirki::add_field( 'deo_config', array(
	'type'        => 'textarea',
	'settings'    => 'deo_case_study_archives_subtitle',
	'label'       => esc_attr__( 'Case study archives subtitle', 'emaus' ),
	'section'     => 'deo_case_studies',
	'default'     => esc_html__( 'Here are the best features that makes emaus the most powerful, fast  and user-friendly platform.', 'emaus' ),
) );

// Show filter
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_case_study_filter_show',
	'label'       => esc_attr__( 'Show filter on Case Study archive', 'emaus' ),
	'section'     => 'deo_case_studies',
	'default'     => true,
) );