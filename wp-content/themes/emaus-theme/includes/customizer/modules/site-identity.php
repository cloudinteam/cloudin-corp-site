<?php
/**
 * Customizer Site Identity
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


Kirki::add_field( 'deo_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'title_tagline',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Light Logo', 'emaus' ) . '</h3><hr class="customizer-separator"></hr>',
) );

// Logo White Image Upload
Kirki::add_field( 'deo_config', array(
	'type'        => 'image',
	'settings'    => 'deo_logo_white',
	'label'       => esc_attr__( 'Upload White Logo', 'emaus' ),
	'section'     => 'title_tagline',
) );	

// Logo White Retina Image Upload
Kirki::add_field( 'deo_config', array(
	'type'        => 'image',
	'settings'    => 'deo_logo_white_retina',
	'label'       => esc_attr__( 'Upload White Retina Logo', 'emaus' ),
	'description' => esc_html__( 'Logo 2x bigger size', 'emaus' ),
	'section'     => 'title_tagline',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'title_tagline',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Dark Logo', 'emaus' ) . '</h3><hr class="customizer-separator"></hr>',
) );

// Logo Dark Image Upload
Kirki::add_field( 'deo_config', array(
	'type'        => 'image',
	'settings'    => 'deo_logo_dark',
	'label'       => esc_attr__( 'Upload Dark Logo', 'emaus' ),
	'section'     => 'title_tagline',
) );	

// Logo Dark Retina Image Upload
Kirki::add_field( 'deo_config', array(
	'type'        => 'image',
	'settings'    => 'deo_logo_dark_retina',
	'label'       => esc_attr__( 'Upload Dark Retina Logo', 'emaus' ),
	'description' => esc_html__( 'Logo 2x bigger size', 'emaus' ),
	'section'     => 'title_tagline',
) );