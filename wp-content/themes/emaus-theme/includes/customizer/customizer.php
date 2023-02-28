<?php
/**
 * Theme Customizer
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


function deo_customize_register( $wp_customize ) {

	// Customize Background Settings
	$wp_customize->get_section('background_image')->title = esc_html__('Background Styles', 'emaus');  
	$wp_customize->get_control('background_color')->section = 'background_image';

	// Remove Custom Header Section
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('colors');
}
add_action( 'customize_register', 'deo_customize_register' );


// Check if Kirki is installed
if ( class_exists( 'Kirki' ) ) {

	// Selector Vars 
	$selector = array(
		'main_color'			=>
			'a,
			.loader,
			.highlight,
			.comment-edit-link,
			.footer .widget.widget_calendar a,
			.widget_rss .rsswidget:hover,
			.widget_recent_entries a:hover,
			.widget_recent_comments a:hover,
			.widget_nav_menu a:hover,
			.widget_archive a:hover,
			.widget_pages a:hover,
			.widget_categories a:hover,
			.widget_meta a:hover,
			.footer__nav-menu li a:hover,
			.footer__widgets .widget a:hover,
			.copyright a:hover,
			.copyright a:focus,
			.link-underline:hover,
			.link-underline:focus,
			.case-study__category:hover,
			.case-study__category:focus',

		'main_background_color' =>
			'.btn,
			.btn--color,
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.button,
			.btn--button:focus,
			.btn:hover,
			.elementor-widget-button .elementor-button,
			a.cc-btn.cc-dismiss,
			.mc4wp-form-fields input[type=submit]:focus,
			.post-password-form label + input,
			#back-to-top:hover,
			.widget_tag_cloud a:hover,
			.entry__tags a:hover,
			.page-numbers.current,
			.pagination a:hover,
			.link-underline:after,
			.project-filter a.active,
			.project-filter a:hover,
			.project-filter a:focus',

		'main_border_color' =>
			'input:focus,
			textarea:focus',

		'main_border_top_color' => '.elementor-widget-tabs .elementor-tab-title.elementor-active',

		'secondary_border_color' =>
			'input:focus,
			textarea:focus',


		'headings_color'  => 'h1,h2,h3,h4,h5,h6',
		'text_color'  => 
			'body,
			.deo-newsletter-gdpr-checkbox__label,
			figcaption,
			.comment-form-cookies-consent label,
			.pagination span,
			.pagination a',

		'widgets_text_color' =>
			'.elementor-widget-wp-widget-recent-posts a,
			.widget_recent_entries a,
			.elementor-widget-wp-widget-nav_menu a,
			.widget_nav_menu a,
			.elementor-widget-wp-widget-categories a,
			.widget_categories a,
			.elementor-widget-wp-widget-pages a,
			.widget_pages a,
			.elementor-widget-wp-widget-pages-archives a,
			.widget_archive a,
			.elementor-widget-wp-widget-meta a,
			.widget_meta a',

		'footer_widgets_text_color' =>
			'.footer,
			.footer .social,
			.footer__nav-menu li a,
			.footer .widget_recent_entries a,			
			.footer .widget_nav_menu a,			
			.footer .widget_categories a,			
			.footer .widget_pages a,		
			.footer .widget_archive a,		
			.footer .widget_meta a',		

		'post_links_color' => '.entry__article p a, .entry__article li:not(.wp-social-link) a',
		
		'post_meta_color' => '.entry__meta li, .entry__meta a, .comment-date',

		'headings'        => 'h1,h2,h3,h4,h5,h6, .btn, label, .deo-newsletter-gdpr-checkbox__label',
		'h1'              => 'h1, .h1',
		'h2'              => 'h2, .h2',
		'h3'              => 'h3, .h3',
		'h4'              => 'h4, .h4',
		'h5'              => 'h5, .h5',
		'h6'              => 'h6, .h6',
		'text'						=>
			'body,
			input'
	);

	$heading_font = 'Rubik';
	$body_font = 'Roboto';
	$heading_color = '#353f58';
	$text_color = '#656970';
	$meta_color = '#a5adb8';
	$primary_color = '#FF3465'; // pink
	$secondary_color = '#2550de'; // blue

	// Kirki
	Kirki::add_config( 'deo_config', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
		'option_name'   => 'deo_config'
	) );	


	/**
	* SECTIONS / PANELS
	**/

	$priority = 20;
	$uniqid = 1;

	// 1. GENERAL PANEL
	Kirki::add_panel( 'deo_general', array(
		'title'       => esc_attr__( 'General', 'emaus' ),
		'priority'    => $priority++,
	) );

			// Preloader
			Kirki::add_section( 'deo_preloader', array(
				'title' => esc_html__( 'Preloader', 'emaus' ),
				'panel'	=> 'deo_general',
			) );

			// Page content
			Kirki::add_section( 'deo_page_content', array(
				'title' => esc_html__( 'Page content', 'emaus' ),
				'panel'	=> 'deo_general',
			) );

			// Back to Top
			Kirki::add_section( 'deo_back_to_top', array(
				'title' => esc_html__( 'Back to Top', 'emaus' ),
				'panel'	=> 'deo_general',
			) );	

	// 2. HEADER PANEL
	Kirki::add_section( 'deo_header', array(
		'title'          => esc_html__( 'Header', 'emaus' ),
		'description'    => esc_html__( 'Header options', 'emaus' ),
		'priority'       => $priority++,
	) );

	// 3. LAYOUT PANEL
	Kirki::add_panel( 'deo_layout', array(
		'title'          => esc_html__( 'Layout', 'emaus' ),
		'priority'       => $priority++,
	) );

			// Blog Layout
			Kirki::add_section( 'deo_blog_layout', array(
				'title'          => esc_html__( 'Blog', 'emaus' ),
				'description'    => esc_html__( 'Layout options for the blog pages', 'emaus' ),
				'panel'			 		 => 'deo_layout',
			) );

			// Case Study Layout
			Kirki::add_section( 'deo_case_study_layout', array(
				'title'          => esc_html__( 'Case Study', 'emaus' ),
				'description'    => esc_html__( 'Layout options for the case study pages', 'emaus' ),
				'panel'			 		 => 'deo_layout',
			) );

			// Page Layout
			Kirki::add_section( 'deo_page_layout', array(
				'title'          => esc_html__( 'Page', 'emaus' ),
				'description'    => esc_html__( 'Layout options for the regular pages', 'emaus' ),
				'panel'			     => 'deo_layout',
			) );

			// Archive Layout
			Kirki::add_section( 'deo_archive_layout', array(
				'title'          => esc_html__( 'Archive', 'emaus' ),
				'description'    => esc_html__( 'Layout options for archive and categories pages', 'emaus' ),
				'panel'			 		 => 'deo_layout',
			) );

			// Search Results Layout
			Kirki::add_section( 'deo_search_results_layout', array(
				'title'          => esc_html__( 'Search Results', 'emaus' ),
				'description'    => esc_html__( 'Layout options for search result page', 'emaus' ),
				'panel'					 => 'deo_layout',
			) );

	// 4. Page title
	Kirki::add_section( 'deo_page_title', array(
		'title'       => esc_attr__( 'Page Title', 'emaus' ),
		'priority'    => $priority++,
	) );

	// 5. Case studies
	Kirki::add_section( 'deo_case_studies', array(
		'title'       => esc_attr__( 'Case Studies', 'emaus' ),
		'priority'    => $priority++,
	) );

	// 6. BLOG PANEL
	Kirki::add_panel( 'deo_blog', array(
		'title'       => esc_attr__( 'Blog', 'emaus' ),
		'priority'    => $priority++,
	) );

			// Post Meta
			Kirki::add_section( 'deo_post_meta', array(
				'title'          => esc_html__( 'Post Meta', 'emaus' ),
				'description'    => esc_html__( 'These options will apply to the default WordPress posts. Customize Elementor widgets post meta via Elementor.', 'emaus' ),
				'panel'          => 'deo_blog',
			) );

			// Single Post
			Kirki::add_section( 'deo_single_post', array(
				'title'          => esc_html__( 'Single Post', 'emaus' ),
				'panel'          => 'deo_blog',
			) );

			// Social Share
			Kirki::add_section( 'deo_social_share', array(
				'title'          => esc_html__( 'Social Share Buttons', 'emaus' ),
				'panel'          => 'deo_blog',
			) );


	// 7. COLORS PANEL
	Kirki::add_panel( 'deo_colors', array(
		'title'          => esc_html__( 'Colors', 'emaus' ),
		'priority'       => $priority++,
	) );

			// General Colors
			Kirki::add_section( 'deo_general_colors', array(
				'title'  => esc_html__( 'General Colors', 'emaus' ),
				'panel'	 => 'deo_colors',
			) );

			// HEADER COLORS PANEL
			Kirki::add_panel( 'deo_header_colors', array(
				'title'  => esc_html__( 'Header Colors', 'emaus' ),
				'panel'  => 'deo_colors',
			) );

				// Header Default
				Kirki::add_section( 'deo_header_default_colors', array(
					'title'  => esc_html__( 'Default Header', 'emaus' ),
					'panel'  => 'deo_header_colors',
				) );

				// Header Sticky
				Kirki::add_section( 'deo_header_sticky_colors', array(
					'title'  => esc_html__( 'Sticky Header', 'emaus' ),
					'panel'  => 'deo_header_colors',
				) );

				// Header Transparent
				Kirki::add_section( 'deo_header_transparent_colors', array(
					'title'  => esc_html__( 'Transparent Header', 'emaus' ),
					'panel'  => 'deo_header_colors',
				) );

				// Header Mobile
				Kirki::add_section( 'deo_header_mobile_colors', array(
					'title'  => esc_html__( 'Mobile Header', 'emaus' ),
					'panel'  => 'deo_header_colors',
				) );

			// Page Title Colors
			Kirki::add_section( 'deo_page_title_colors', array(
				'title'  => esc_html__( 'Page Title Colors', 'emaus' ),
				'panel'	 => 'deo_colors',
			) );

			if ( function_exists( 'bcn_display' ) ) {
				// Breadcrumbs Colors
				Kirki::add_section( 'deo_breadcrumbs_colors', array(
					'title'  => esc_html__( 'Breadcrumbs Colors', 'emaus' ),
					'panel'	 => 'deo_colors',
				) );
			}

			// Blog Colors
			Kirki::add_section( 'deo_blog_colors', array(
				'title'  => esc_html__( 'Blog Colors', 'emaus' ),
				'panel'	 => 'deo_colors',
			) );

			// Text Colors
			Kirki::add_section( 'deo_text_colors', array(
				'title'  => esc_html__( 'Text Colors', 'emaus' ),
				'panel'  => 'deo_colors',
			) );

			// Footer Colors
			Kirki::add_section( 'deo_footer_colors', array(
				'title'  => esc_html__( 'Footer Colors', 'emaus' ),
				'panel'  => 'deo_colors',
			) );

			// Cookies Bar Colors
			Kirki::add_section( 'deo_cookies_bar_colors', array(
				'title'      => esc_html__( 'Cookies Bar Colors', 'emaus' ),
				'panel'			 => 'deo_colors',
			) );

	// 8. Typography
	Kirki::add_section( 'deo_typography', array(
		'title'          => esc_html__( 'Typography', 'emaus' ),
		'priority'       => $priority++,
	) );

	// 9. Socials
	Kirki::add_section( 'deo_socials', array(
		'title'          => esc_html__( 'Socials', 'emaus' ),
		'description'    => esc_html__( 'Socials options. Paste your social profile links here', 'emaus'  ),
		'priority'       => $priority++,
	) );

	// 10. GDPR
	Kirki::add_section( 'deo_gdpr', array(
		'title'          => esc_html__( 'GDPR', 'emaus' ),
		'description'    => esc_html__( 'Settings for GDPR compliance.', 'emaus'  ),
		'priority'       => $priority++,
	) );

	// 11. Footer
	Kirki::add_section( 'deo_footer', array(
		'title'          => esc_html__( 'Footer', 'emaus' ),
		'priority'       => $priority++,
	) );

	// 12. Page 404
	Kirki::add_section( 'deo_page_404', array(
		'title'          => esc_html__( 'Page 404', 'emaus' ),
		'description'    => esc_html__( 'Settings for page 404', 'emaus' ),
		'priority'       => $priority++,
	) );


	// Load modules
	require EMAUS_DIR . '/includes/customizer/modules/site-identity.php';
	require EMAUS_DIR . '/includes/customizer/modules/general.php';
	require EMAUS_DIR . '/includes/customizer/modules/header.php';
	require EMAUS_DIR . '/includes/customizer/modules/layout.php';
	require EMAUS_DIR . '/includes/customizer/modules/page-title.php';
	require EMAUS_DIR . '/includes/customizer/modules/case-studies.php';
	require EMAUS_DIR . '/includes/customizer/modules/blog.php';
	require EMAUS_DIR . '/includes/customizer/modules/colors.php';
	require EMAUS_DIR . '/includes/customizer/modules/typography.php';
	require EMAUS_DIR . '/includes/customizer/modules/socials.php';
	require EMAUS_DIR . '/includes/customizer/modules/footer.php';
	require EMAUS_DIR . '/includes/customizer/modules/gdpr.php';
	require EMAUS_DIR . '/includes/customizer/modules/page-404.php';

	// Sanitize HTML
	function deo_sanitize_html( $input ) {
		return wp_kses( $input, array(
			'a' => array(
				'href' => array(),
				'target' => array(),
			),
			'i' => array(),
			'span' => array(),
			'em' => array(),
			'strong' => array(),
		) );
	};	

} // endif Kirki check