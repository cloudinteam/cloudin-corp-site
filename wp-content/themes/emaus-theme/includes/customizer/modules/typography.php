<?php
/**
 * Customizer Typography
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// H1
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_headings_h1',
	'label'       => esc_html__( 'H1 Headings', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '38px',
		'font-weight' => '500',
		'line-height' => '1.3',
		'letter-spacing' => '-0.05em'
	),
	'choices'  => array(
		'variant' => array(
			'regular',
			'700',
			'italic'			
		),
	),
	'output' => array(
		array(
			'element' => $selector['h1'],
		),
		array(
			'element' => '.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor .editor-post-title__block .editor-post-title__input',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H2
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_headings_h2',
	'label'       => esc_html__( 'H2 Headings', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '32px',
		'font-weight' => '500',
		'line-height' => '1.3',
		'letter-spacing' => '-0.05em'
	),
	'choices'  => array(
		'variant' => array(
			'regular',
			'700',
			'italic'			
		),
	),
	'output' => array(
		array(
			'element' => $selector['h2'],
		),
		array(
			'element' => '.edit-post-visual-editor h2.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H3
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_headings_h3',
	'label'       => esc_html__( 'H3 Headings', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '28px',
		'font-weight' => '500',
		'line-height' => '1.3',
		'letter-spacing' => '-0.05em'
	),
	'choices'  => array(
		'variant' => array(
			'regular',
			'700',
			'italic'				
		),
	),
	'output' => array(
		array(
			'element' => $selector['h3'],
		),
		array(
			'element' => '.edit-post-visual-editor h3.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H4
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_headings_h4',
	'label'       => esc_html__( 'H4 Headings', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '24px',
		'font-weight' => '500',
		'line-height' => '1.3',
		'letter-spacing' => '-0.05em'
	),
	'choices'  => array(
		'variant' => array(
			'regular',
			'700',
			'italic'				
		),
	),
	'output' => array(
		array(
			'element' => $selector['h4'],
		),
		array(
			'element' => '.edit-post-visual-editor h4.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H5
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_headings_h5',
	'label'       => esc_html__( 'H5 Headings', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '20px',
		'font-weight' => '500',
		'line-height' => '1.3',
		'letter-spacing' => '-0.05em'
	),
	'choices'  => array(
		'variant' => array(
			'regular',
			'700',
			'italic'				
		),
	),
	'output' => array(
		array(
			'element' => $selector['h5'],
		),
		array(
			'element' => '.edit-post-visual-editor h5.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H6
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_headings_h6',
	'label'       => esc_html__( 'H6 Headings', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-family' => $heading_font,
		'font-size'   => '16px',
		'font-weight' => '500',
		'line-height' => '1.3',
		'letter-spacing' => '-0.05em'
	),
	'choices'  => array(
		'variant' => array(
			'regular',
			'700',
			'italic'				
		),
	),
	'output' => array(
		array(
			'element' => 'h6, .elementor-widget-tabs .elementor-tab-title, .elementor-accordion .elementor-tab-title',
		),
		array(
			'element' => '.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// Body typography
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_body_typography',
	'label'       => esc_html__( 'Body Typography', 'emaus' ),
	'description' => esc_html__( 'Select the main typography.', 'emaus' ),
	'help'        => esc_html__( 'The typography options you set here apply to all content on your site.', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-family'    => $body_font,
		'font-size'      => '16px',
		'line-height'    => '1.5',
	),
	'choices'  => array(
		'variant' => array(
			'700',
			'500',
			'italic',
		),
	),
	'output' => array(
		array(
			'element' => $selector['text'],
		),
	),
	'transport' => 'auto',
));


// Post typography
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_post_typography',
	'label'       => esc_html__( 'Post Typography', 'emaus' ),
	'description' => esc_html__( 'Select the post typography options for your site.', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-size'      => '1.125rem',
		'line-height'    => '1.8',
	),
	'output' => array(
		array(
			'element' => '.entry__article',
		),
		array(
			'element' => '.edit-post-visual-editor .editor-styles-wrapper',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));


// Menu Links typography
Kirki::add_field( 'deo_config', array(
	'type'        => 'typography',
	'settings'    => 'deo_menu_links_typography',
	'label'       => esc_html__( 'Menu Links Typography', 'emaus' ),
	'section'     => 'deo_typography',
	'default'     => array(
		'font-family' => $heading_font,
		'font-weight' => '400',
		'font-size'		=> '15px'
	),
	'output' => array(
		array(
			'element' => '.nav__menu li a',
		),
	),
	'transport' => 'auto',
));