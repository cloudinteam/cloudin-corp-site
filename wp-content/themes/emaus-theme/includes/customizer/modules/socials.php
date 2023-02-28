<?php
/**
 * Customizer Socials
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_behance',
	'label'       => esc_html__( 'Behance', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_blogger',
	'label'       => esc_html__( 'Blogger', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_deviantart',
	'label'       => esc_html__( 'DeviantArt', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_digg',
	'label'       => esc_html__( 'Digg', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_dribbble',
	'label'       => esc_html__( 'Dribbble', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'url',
	'settings'    => 'deo_socials_facebook',
	'label'       => esc_html__( 'Facebook', 'emaus' ),
	'section'     => 'deo_socials',
	'default'     => '#',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'url',
	'settings'    => 'deo_socials_flickr',
	'label'       => esc_html__( 'Flickr', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_github',
	'label'       => esc_html__( 'Github', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_instagram',
	'label'       => esc_html__( 'Instagram', 'emaus' ),
	'section'     => 'deo_socials',
	'default'     => '#',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_linkedin',
	'label'       => esc_html__( 'Linkedin', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_pinterest',
	'label'       => esc_html__( 'Pinterest', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_reddit',
	'label'       => esc_html__( 'Reddit', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_rss',
	'label'       => esc_html__( 'RSS', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_slack',
	'label'       => esc_html__( 'Slack', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_skype',
	'label'       => esc_html__( 'Skype', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_snapchat',
	'label'       => esc_html__( 'Snapchat', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_soundcloud',
	'label'       => esc_html__( 'Soundcloud', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_spotify',
	'label'       => esc_html__( 'Spotify', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_tumblr',
	'label'       => esc_html__( 'Tumblr', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_twitter',
	'label'       => esc_html__( 'Twitter', 'emaus' ),
	'section'     => 'deo_socials',
	'default'     => '#',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_vimeo',
	'label'       => esc_html__( 'Vimeo', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_vkontakte',
	'label'       => esc_html__( 'Vkontakte', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_whatsapp',
	'label'       => esc_html__( 'WhatsApp', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_xing',
	'label'       => esc_html__( 'Xing', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_yahoo',
	'label'       => esc_html__( 'Yahoo', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_yelp',
	'label'       => esc_html__( 'Yelp', 'emaus' ),
	'section'     => 'deo_socials',
) );

Kirki::add_field( 'deo_config', array(
	'type'        => 'text',
	'settings'    => 'deo_socials_youtube',
	'label'       => esc_html__( 'Youtube', 'emaus' ),
	'section'     => 'deo_socials',
) );