<?php
/**
 * Customizer General
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Preloader
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_preloader_show',
	'label'       => esc_html__( 'Enable/Disable Theme Preloader', 'emaus' ),
	'section'     => 'deo_preloader',
	'default'     => false,
) );

// Back to top
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_back_to_top_show',
	'label'       => esc_html__( 'Back to top arrow', 'emaus' ),
	'section'     => 'deo_back_to_top',
	'default'     => true,
) );