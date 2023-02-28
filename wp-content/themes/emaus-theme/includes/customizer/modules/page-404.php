<?php
/**
 * Customizer Page 404
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Page 404 Image
Kirki::add_field( 'deo_config', array(
	'type'        => 'image',
	'settings'    => 'deo_page_404_image',
	'label'       => esc_attr__( 'Page 404 Image', 'emaus' ),
	'section'     => 'deo_page_404',
	'default'     => EMAUS_URI . '/assets/img/404/emaus_404.jpg'
) );

// Title
Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_page_404_title',
	'label'       => esc_attr__( 'Page 404 Title', 'emaus' ),
	'section'     => 'deo_page_404',
	'default'     => esc_html__( '404 - Page Not Found', 'emaus' ),
) );

// Description text
Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_page_404_description',
	'label'       => esc_attr__( 'Page 404 Description Text', 'emaus' ),
	'section'     => 'deo_page_404',
	'default'     => esc_html__( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'emaus' ),
) );

// Button text
Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_page_404_button_text',
	'label'       => esc_attr__( 'Page 404 Button Text', 'emaus' ),
	'section'     => 'deo_page_404',
	'default'     => esc_html__( 'Take Me Back Home', 'emaus' ),
) );