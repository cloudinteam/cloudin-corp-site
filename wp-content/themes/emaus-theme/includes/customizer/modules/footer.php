<?php
/**
 * Customizer Footer
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Show footer
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_footer_show',
	'label'       => esc_attr__( 'Show footer', 'emaus' ),
	'section'     => 'deo_footer',
	'default'     => true,
) );

// Show footer menu
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_footer_menu_show',
	'label'       => esc_attr__( 'Show footer menu', 'emaus' ),
	'section'     => 'deo_footer',
	'default'     => true,
) );

// Show footer socials
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_footer_socials_show',
	'label'       => esc_attr__( 'Show footer socials', 'emaus' ),
	'section'     => 'deo_footer',
	'default'     => true,
) );

// Show footer widgets
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_footer_widgets_show',
	'label'       => esc_attr__( 'Show footer widgets', 'emaus' ),
	'section'     => 'deo_footer',
	'default'     => true,
) );

// Footer columns
Kirki::add_field( 'deo_config', array(
	'type'        => 'select',
	'settings'    => 'deo_footer_columns',
	'label'       => esc_html__( 'How many columns to show', 'emaus' ),
	'section'     => 'deo_footer',
	'default'     => 'four-col',
	'choices'     => array(
		'one-col' => esc_attr__( '1 Column', 'emaus' ),
		'two-col' => esc_attr__( '2 Columns', 'emaus' ),
		'three-col' => esc_attr__( '3 Columns', 'emaus' ),
		'four-col' => esc_attr__( '4 Columns', 'emaus' ),
	),
) );

// Show bottom footer year
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_footer_bottom_year_show',
	'label'       => esc_attr__( 'Show bottom footer year', 'emaus' ),
	'section'     => 'deo_footer',
	'default'     => true,
) );

// Bottom footer text
Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_footer_bottom_text',
	'section'     => 'deo_footer',
	'label'       => esc_html__( 'Footer bottom text', 'emaus' ),
	'description' => esc_html__( 'Allowed HTML: a, span, i, em, strong', 'emaus' ),
	'sanitize_callback' => 'deo_sanitize_html',
	'default'     => sprintf( esc_html__( 'Emaus, Made by %1$sDeoThemes%2$s' , 'emaus' ), '<a href="'. esc_url( 'https://deothemes.com' ) .'">', '</a>' ),
) );