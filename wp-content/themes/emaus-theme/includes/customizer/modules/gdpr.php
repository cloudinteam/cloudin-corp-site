<?php
/**
 * Customizer GDPR
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Show cookies consent bar
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_cookies_bar_show',
	'label'       => esc_attr__( 'Show cookies consent notification bar', 'emaus' ),
	'section'     => 'deo_gdpr',
	'default'     => false,
) );

// Cookies message
Kirki::add_field( 'deo_config', array(
	'type'        => 'textarea',
	'settings'    => 'deo_cookies_message',
	'label'       => esc_html__( 'Cookies message text', 'emaus' ),
	'section'     => 'deo_gdpr',
	'default'     => esc_html__( 'We are using cookies to personalize content and ads to make our site easier for you to use.', 'emaus' ),
) );

// Cookies button
Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_cookies_button',
	'label'       => esc_html__( 'Cookies button text', 'emaus' ),
	'section'     => 'deo_gdpr',
	'default'     => esc_html__( 'Agree', 'emaus' ),
) );

// Cookies Learn More text
Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_cookies_learn_more_text',
	'label'       => esc_html__( 'Cookies learn more text', 'emaus' ),
	'section'     => 'deo_gdpr',
	'default'     => esc_html__( 'Learn More', 'emaus' ),
) );

// Cookies URLbutton
Kirki::add_field( 'deo_config', array(
	'type'        => 'url',
	'settings'    => 'deo_cookies_learn_more_url',
	'label'       => esc_html__( 'Cookies learn more URL', 'emaus' ),
	'section'     => 'deo_gdpr',
	'default'     => esc_url( 'http://cookiesandyou.com' ),
) );