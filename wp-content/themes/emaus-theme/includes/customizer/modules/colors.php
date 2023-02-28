<?php
/**
 * Customizer Colors
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/*-------------------------------------------------------*/
/* General Colors
/*-------------------------------------------------------*/

// Primary color (Pink)
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_main_color',
	'label'       => esc_html__( 'Primary color', 'emaus' ),
	'description'	=> esc_html__( 'Some buttons can be customized with Elementor instead', 'emaus' ),
	'section'     => 'deo_general_colors',
	'default'     => $primary_color,
	'output' => array(
		array(
			'element'  => $selector['main_color'],
			'property' => 'color',
		),
		array(
			'element' => $selector['main_background_color'],
			'property' => 'background-color',
		),
		array(
			'element' => $selector['main_border_color'],
			'property' => 'border-color',
		),
		array(
			'element' => $selector['main_border_top_color'],
			'property' => 'border-top-color',
		),
	),
	'transport' => 'auto',
) );

// Secondary color (Blue)
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_secondary_color',
	'label'       => esc_html__( 'Secondary color', 'emaus' ),
	'description'	=> esc_html__( 'Some buttons can be customized with Elementor instead', 'emaus' ),
	'section'     => 'deo_general_colors',
	'default'     => $secondary_color,
	'output' => array(
		array(
			'element' => $selector['secondary_border_color'],
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
) );

// Page background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_page_background_color',
	'label'       => esc_html__( 'Page background color', 'emaus' ),
	'description'	=> esc_html__( 'Applies on a blog, archive and search results pages', 'emaus' ),
	'section'     => 'deo_general_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element' => '.blog-section, .archive-section, .search-results-section',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );



/*-------------------------------------------------------*/
/* Header Colors
/*-------------------------------------------------------*/


/* Default Header
/*-------------------------------------------------------*/

// Header background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_background_color',
	'label'       => esc_html__( 'Header background color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => 'rgba(255,255,255,0)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'     => '.nav--default',
			'property'    => 'background-color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Menu links color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_menu_links_color',
	'label'       => esc_html__( 'Menu links color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'     => '.nav--default .nav__menu > li > a',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),			
	),
	'transport' => 'auto',
) );

// Menu links hover color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_menu_links_hover_color',
	'label'       => esc_html__( 'Menu links hover color', 'emaus' ),
	'description'	=> esc_html__( 'Also applies for active menu link color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => $secondary_color,
	'output' => array(
		array(
			'element'     => '.nav--default .nav__menu > li > a:hover,
				.nav--default .nav__menu > li > a:focus,
				.nav--default .nav__menu > li.active > a,
				.nav--default .nav__menu > .current_page_parent > a,
				.nav--default .nav__menu .current-menu-item > a',
			'property'    => 'color',
		),			
	),
	'transport' => 'auto',
) );

// Dropdown background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_dropdown_background_color',
	'label'       => esc_html__( 'Dropdown background color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'     => '.nav--default .nav__dropdown-menu, .nav--default .nav__menu > .nav__dropdown > .nav__dropdown-menu:before',
			'property'    => 'background-color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Dropdown menu links color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_dropdown_menu_links_color',
	'label'       => esc_html__( 'Dropdown menu links color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'     => '.nav--default .nav__dropdown-menu > li > a',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Dropdown menu links hover color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_dropdown_menu_links_hover_color',
	'label'       => esc_html__( 'Dropdown menu links hover color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => $secondary_color,
	'output' => array(
		array(
			'element'     => '.nav--default .nav__dropdown-menu > li > a:hover, .nav--default .nav__dropdown-menu > li > a:focus',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Header button background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_button_background_color',
	'label'       => esc_html__( 'Header button background color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => $primary_color,
	'output' => array(
		array(
			'element'     => '.nav--default .nav__btn',
			'property'    => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Header button background hover color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_button_hover_background_color',
	'label'       => esc_html__( 'Header button hover background color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => $primary_color,
	'output' => array(
		array(
			'element'     => '.nav--default .nav__btn:hover, .nav--default .nav__btn:focus',
			'property'    => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Header button text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_default_button_text_color',
	'label'       => esc_html__( 'Header button text color', 'emaus' ),
	'section'     => 'deo_header_default_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'     => '.nav--default .nav__btn',
			'property'    => 'color',
		),
	),
	'transport' => 'auto',
) );


/* Sticky Header
/*-------------------------------------------------------*/

// Header background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_sticky_background_color',
	'label'       => esc_html__( 'Header background color', 'emaus' ),
	'section'     => 'deo_header_sticky_colors',
	'default'     => 'rgba(255,255,255,1)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'     => '.nav--sticky.sticky',
			'property'    => 'background-color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Menu links color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_sticky_menu_links_color',
	'label'       => esc_html__( 'Menu links color', 'emaus' ),
	'section'     => 'deo_header_sticky_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__menu > li > a',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),			
	),
	'transport' => 'auto',
) );

// Menu links hover color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_sticky_menu_links_hover_color',
	'label'       => esc_html__( 'Menu links hover color', 'emaus' ),
	'section'     => 'deo_header_sticky_colors',
	'default'     => $secondary_color,
	'output' => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__menu > li > a:hover,
				.nav--sticky.sticky .nav__menu > li.active > a,
				.nav--sticky.sticky .nav__menu > .current_page_parent > a,
				.nav--sticky.sticky .nav__menu .current-menu-item > a',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),			
	),
	'transport' => 'auto',
) );

// Header button background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_sticky_button_background_color',
	'label'       => esc_html__( 'Header button background color', 'emaus' ),
	'section'     => 'deo_header_sticky_colors',
	'default'     => $primary_color,
	'output' => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__btn',
			'property'    => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Header button text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_sticky_button_text_color',
	'label'       => esc_html__( 'Header button text color', 'emaus' ),
	'section'     => 'deo_header_sticky_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__btn',
			'property'    => 'color',
		),
	),
	'transport' => 'auto',
) );


/* Transparent Header
/*-------------------------------------------------------*/

// Header background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_background_color',
	'label'       => esc_html__( 'Header background color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => 'rgba(255,255,255,0)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'     => '.nav--transparent',
			'property'    => 'background-color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Menu links color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_menu_links_color',
	'label'       => esc_html__( 'Menu links color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'     => '.nav--transparent .nav__menu > li > a',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),			
	),
	'transport' => 'auto',
) );

// Menu links hover color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_menu_links_hover_color',
	'label'       => esc_html__( 'Menu links hover color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'     => '.nav--transparent .nav__menu > li > a:hover,
				.nav--transparent .nav__menu > li > a:focus
				.nav--transparent .nav__menu > li.active > a,
				.nav--transparent .nav__menu > .current_page_parent > a',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),			
	),
	'transport' => 'auto',
) );

// Dropdown background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_dropdown_background_color',
	'label'       => esc_html__( 'Dropdown background color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'     => '.nav--transparent .nav__dropdown-menu, .nav--transparent .nav__menu > .nav__dropdown > .nav__dropdown-menu:before',
			'property'    => 'background-color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Dropdown menu links color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_dropdown_menu_links_color',
	'label'       => esc_html__( 'Dropdown menu links color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'     => '.nav--transparent .nav__dropdown-menu > li:not(.current-menu-item) > a',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Dropdown menu links hover color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_dropdown_menu_links_hover_color',
	'label'       => esc_html__( 'Dropdown menu links hover color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => $secondary_color,
	'output' => array(
		array(
			'element'     => '.nav--transparent .nav__dropdown-menu > li > a:hover, .nav--transparent .nav__dropdown-menu > li > a:focus',
			'property'    => 'color',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'transport' => 'auto',
) );

// Header button background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_button_background_color',
	'label'       => esc_html__( 'Header button background color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => '#FF3467',
	'output' => array(
		array(
			'element'     => '.nav--transparent .nav__btn',
			'property'    => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Header button background hover color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_button_hover_background_color',
	'label'       => esc_html__( 'Header button hover background color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => '#FF3467',
	'output' => array(
		array(
			'element'     => '.nav--transparent .nav__btn:hover, .nav--default .nav__btn:focus',
			'property'    => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Header button text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_transparent_button_text_color',
	'label'       => esc_html__( 'Header button text color', 'emaus' ),
	'section'     => 'deo_header_transparent_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'     => '.nav--transparent .nav__btn',
			'property'    => 'color',
		),
	),
	'transport' => 'auto',
) );


/* Mobile Header
/*-------------------------------------------------------*/

// Mobile header background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_mobile_background_color',
	'label'       => esc_html__( 'Mobile header background color', 'emaus' ),
	'section'     => 'deo_header_mobile_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'  => '.nav',
			'property' => 'background-color',
			'media_query' => '@media (max-width: 991px)',
		),
	),
	'transport' => 'auto',
) );

// Mobile menu links color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_mobile_menu_links_color',
	'label'       => esc_html__( 'Mobile menu links color', 'emaus' ),
	'section'     => 'deo_header_mobile_colors',
	'default'     => $heading_color,
	'output' => array(
		array(
			'element'     => '.nav__menu > li > a',
			'property'    => 'color',
			'media_query' => '@media (max-width: 991px)',
		),
	),
	'transport' => 'auto',
) );

// Mobile menu dividers color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_mobile_menu_dividers_color',
	'label'       => esc_html__( 'Mobile menu dividers color', 'emaus' ),
	'section'     => 'deo_header_mobile_colors',
	'default'     => 'rgba(231,234,240,1)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'     => '.nav__menu li a',
			'property'    => 'border-bottom-color',
			'media_query' => '@media (max-width: 991px)',
		),
	),
	'transport' => 'auto',
) );

// Mobile Header menu toggle color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_header_mobile_menu_toggle_color',
	'label'       => esc_html__( 'Mobile menu toggle color', 'emaus' ),
	'section'     => 'deo_header_mobile_colors',
	'default'     => '#282e38',
	'output' => array(
		array(
			'element'  => '.nav__icon-toggle-bar',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );



/*-------------------------------------------------------*/
/* Page Title Colors
/*-------------------------------------------------------*/

// Show / hide dark overlay
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_page_title_colors_overlay_show',
	'label'       => esc_attr__( 'Show dark overlay', 'emaus' ),
	'section'     => 'deo_page_title_colors',
	'default'     => false,
) );

// Page title overlay color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_page_title_background_overlay_color',
	'label'       => esc_html__( 'Page title background overlay color', 'emaus' ),
	'section'     => 'deo_page_title_colors',
	'default'     => 'rgba(0,0,0,.56)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.page-title:before',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Page title background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_page_title_background_color',
	'label'       => esc_html__( 'Page title background color', 'emaus' ),
	'section'     => 'deo_page_title_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'  => '.page-title',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Page title heading color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_page_title_heading_color',
	'label'       => esc_html__( 'Page title heading color', 'emaus' ),
	'section'     => 'deo_page_title_colors',
	'default'     => $heading_color,
	'output' => array(
		array(
			'element'  => '.page-title__title',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Page title subtitle color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_page_title_subtitle_color',
	'label'       => esc_html__( 'Page title subtitle color', 'emaus' ),
	'section'     => 'deo_page_title_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'  => '.page-title__subtitle',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );


/*-------------------------------------------------------*/
/* Breadcrumbs Colors
/*-------------------------------------------------------*/
// Breadcrumbs background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_breadcrumbs_background_color',
	'label'       => esc_html__( 'Breadcrumbs background color', 'emaus' ),
	'section'     => 'deo_breadcrumbs_colors',
	'default'     => '#f7fbff',
	'output' => array(
		array(
			'element'  => '.breadcrumbs-wrap',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Breadcrumbs links color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_breadcrumbs_links_color',
	'label'       => esc_html__( 'Breadcrumbs links color', 'emaus' ),
	'section'     => 'deo_breadcrumbs_colors',
	'default'     => $heading_color,
	'output' => array(
		array(
			'element'  => '.breadcrumbs a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Breadcrumbs separator color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_breadcrumbs_separator_color',
	'label'       => esc_html__( 'Breadcrumbs separator color', 'emaus' ),
	'section'     => 'deo_breadcrumbs_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'  => '.breadcrumbs__separator',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Breadcrumbs text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_breadcrumbs_text_color',
	'label'       => esc_html__( 'Breadcrumbs text color', 'emaus' ),
	'section'     => 'deo_breadcrumbs_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'  => '.breadcrumbs > span',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );


/*-------------------------------------------------------*/
/* Blog Colors
/*-------------------------------------------------------*/

// Post links color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_post_links_color',
	'label'       => esc_html__( 'Post links color', 'emaus' ),
	'section'     => 'deo_blog_colors',
	'default'     => '#2d95e3',
	'output' => array(
		array(
			'element'  => $selector['post_links_color'],
			'property' => 'color',
		),
		array(
			'element' => '.edit-post-visual-editor a, .editor-rich-text__tinymce a',
			'property' => 'color',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
) );

// Post meta color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_post_meta_color',
	'label'       => esc_html__( 'Post meta color', 'emaus' ),
	'section'     => 'deo_blog_colors',
	'default'     => $meta_color,
	'output' => array(
		array(
			'element'  => $selector['post_meta_color'],
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );


/*-------------------------------------------------------*/
/* Text Colors
/*-------------------------------------------------------*/

// Headings colors
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_headings_color',
	'label'       => esc_html__( 'Headings color', 'emaus' ),
	'section'     => 'deo_text_colors',
	'default'     => $heading_color,
	'output' => array(
		array(
			'element'  => $selector['headings_color'],
			'property' => 'color',
		),
		array(
			'element' => '.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h2.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h3.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h4.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h5.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
			'property' => 'color',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
) );

// Text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_text_color',
	'label'       => esc_html__( 'Text color', 'emaus' ),
	'section'     => 'deo_text_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'  => $selector['text_color'],
			'property' => 'color',
		),
		array(
			'element' => '.edit-post-visual-editor .editor-styles-wrapper',
			'property' => 'color',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
) );

// Widgets Text Color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_widget_text_color',
	'label'       => esc_html__( 'Widgets text color', 'emaus' ),
	'section'     => 'deo_text_colors',
	'default'     => $text_color,
	'output' => array(
		array(
			'element'  => $selector['widgets_text_color'],
			'property' => 'color',
		),
		array(
			'element' => '.edit-post-visual-editor .editor-styles-wrapper',
			'property' => 'color',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
) );


/*-------------------------------------------------------*/
/* Footer Colors
/*-------------------------------------------------------*/

// Footer background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_background_color',
	'label'       => esc_html__( 'Footer background color', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#101523',
	'output' => array(
		array(
			'element'  => '.footer',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Footer border color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_border_color',
	'label'       => esc_html__( 'Footer border color', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#e7eaf0',
	'output' => array(
		array(
			'element'  => '.footer__bottom, .footer',
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
) );

// Footer widget title color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_widgets_title_color',
	'label'       => esc_html__( 'Footer widgets title color', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'  => '.footer .widget-title',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Footer widget text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_widgets_text_color',
	'label'       => esc_html__( 'Footer widgets text color', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#a7afba',
	'output' => array(
		array(
			'element'  => $selector['footer_widgets_text_color'],
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Footer bottom text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_bottom_text_color',
	'label'       => esc_html__( 'Footer bottom text color', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#a7afba',
	'output' => array(
		array(
			'element'  => '.copyright, .copyright a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );


// Colored widget titles
Kirki::add_field( 'deo_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'deo_footer_colors',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Colored Widget Titles', 'emaus' ) . '</h3><hr class="customizer-separator"></hr>',
) );

// Footer widget colored title 1
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_widget_title_color_1',
	'label'       => esc_html__( 'Footer widget colored title 1', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#46d19b',
	'output' => array(
		array(
			'element'  => '.footer__col-2 > .widget:first-child .widget-title',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Footer widget colored title 2
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_widget_title_color_2',
	'label'       => esc_html__( 'Footer widget colored title 2', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#4dceec',
	'output' => array(
		array(
			'element'  => '.footer__col-2 > .widget:last-child .widget-title',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );


// Footer widget colored title 3
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_widget_title_color_3',
	'label'       => esc_html__( 'Footer widget colored title 3', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#FF3467',
	'output' => array(
		array(
			'element'  => '.footer__col-3 > .widget:first-child .widget-title',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Footer widget colored title 4
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_footer_widget_title_color_4',
	'label'       => esc_html__( 'Footer widget colored title 4', 'emaus' ),
	'section'     => 'deo_footer_colors',
	'default'     => '#f38e26',
	'output' => array(
		array(
			'element'  => '.footer__col-3 > .widget:last-child .widget-title',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );



/*-------------------------------------------------------*/
/* Cookies Bar Colors
/*-------------------------------------------------------*/

// Cookies bar background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_cookies_bar_background_color',
	'label'       => esc_html__( 'Cookies bar background color', 'emaus' ),
	'section'     => 'deo_cookies_bar_colors',
	'default'     => '#181818',
	'output' => array(
		array(
			'element'  => '.cc-window',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

// Cookies bar text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_cookies_bar_text_color',
	'label'       => esc_html__( 'Cookies bar text color', 'emaus' ),
	'section'     => 'deo_cookies_bar_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'  => '.cc-message',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Cookies bar link color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_cookies_bar_link_color',
	'label'       => esc_html__( 'Cookies bar link color', 'emaus' ),
	'section'     => 'deo_cookies_bar_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'  => '.cc-link, .cc-link:active, .cc-link:visited, .cc-link:hover, .cc-link:focus',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

// Cookies bar button background color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_cookies_button_background_color',
	'label'       => esc_html__( 'Cookies button background color', 'emaus' ),
	'section'     => 'deo_cookies_bar_colors',
	'default'     => '#FF3467',
	'output' => array(
		array(
			'element'  => 'a.cc-btn.cc-dismiss',
			'property' => 'background-color',
		),
	)
) );

// Cookies bar button text color
Kirki::add_field( 'deo_config', array(
	'type'        => 'color',
	'settings'    => 'deo_cookies_button_text_color',
	'label'       => esc_html__( 'Cookies button text color', 'emaus' ),
	'section'     => 'deo_cookies_bar_colors',
	'default'     => '#ffffff',
	'output' => array(
		array(
			'element'  => 'a.cc-btn.cc-dismiss',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );