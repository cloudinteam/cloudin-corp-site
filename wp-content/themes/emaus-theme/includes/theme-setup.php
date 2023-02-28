<?php
/**
 * Theme setup.
 *
 * @package Emaus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


if ( ! function_exists( 'deo_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function deo_setup() {

		global $pagenow;

		load_theme_textdomain( 'emaus', EMAUS_DIR . '/languages' );

		// Enable theme support
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
		add_theme_support( 'post-formats', array( 'video', 'audio' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background', apply_filters( 'deo_custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );
		add_theme_support( 'custom-header' );

		// Gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_editor_style();

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'pink', 'emaus' ),
				'slug' => 'pink',
				'color' => '#FF3467',
			),
			array(
				'name' => esc_html__( 'blue', 'emaus' ),
				'slug' => 'blue',
				'color' => '#2550de',
			),
			array(
				'name' => esc_html__( 'light-blue', 'emaus' ),
				'slug' => 'light-blue',
				'color' => '#287ac7',
			),
			array(
				'name' => esc_html__( 'dark-blue', 'emaus' ),
				'slug' => 'dark-blue',
				'color' => '#353f58',
			),
			array(
				'name' => esc_html__( 'silver', 'emaus' ),
				'slug' => 'silver',
				'color' => '#656970',
			),
			array(
				'name' => esc_html__( 'clouds', 'emaus' ),
				'slug' => 'clouds',
				'color' => '#f7fbff',
			),
			array(
				'name' => esc_html__( 'white', 'emaus' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name' => esc_html__( 'black', 'emaus' ),
				'slug' => 'black',
				'color' => '#000000',
			),

		) );

		// Redirect on theme activation
		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			wp_redirect( admin_url( 'themes.php?page=getting-started' ) );
		}

		// Set size of thumbnails
		update_option( 'thumbnail_size_w', 80 );
		update_option( 'thumbnail_size_h', 80 );
		update_option( 'thumbnail_crop', 1 );

		add_image_size( 'emaus_blog_featured_large', 1920, 560, 1 );
		add_image_size( 'emaus_blog_featured_medium', 635, 484, 1 );
		add_image_size( 'emaus_blog_featured_small', 403, 224, 1 );
		add_image_size( 'emaus_blog_featured_creative', 403, 403, 1 );		
		add_image_size( 'emaus_blog_next_post', 334, 334, 1 );
		add_image_size( 'emaus_case_study_thumbnail', 398, 418, 1 );

		// Disable Kirki telemetry
		add_filter( 'kirki_telemetry', '__return_false' );

		// Nav menus
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'emaus' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'emaus' ),
		) );

	}
endif; // theme_setup
add_action( 'after_setup_theme', 'deo_setup' );


// Update Elementor Defaults
if ( 1 != get_option( 'deo_elementor_defaults', 0 ) ) {
	add_option( 'deo_elementor_defaults', 0 );
}

/**
* Update Elementor defaults.
*/
function deo_update_elementor_defaults() {
	if ( 1 != get_option( 'deo_elementor_defaults' ) ) {
		update_option( 'elementor_scheme_color', array(
			1 => '#FF3467',
			2 => '#2550de',
			3 => '#f7fbff',
			4 => '#5F3CEF'
		) );

		update_option( 'elementor_scheme_color-picker', array(
			1 => '#000000',
			2 => '#FFFFFF',
			3 => '#f7fbff',
			4 => '#e7eaf0',
			5 => '#656970', // text color
			6 => '#353f58', // heading
			7 => '#2550de',
			8 => '#FF3467'
		) );

		update_option( 'elementor_cpt_support', array(
			'post',
			'page',
			'case_study'
		) );

		update_option( 'elementor_viewport_lg', 992 );
		update_option( 'elementor_disable_color_schemes', 'yes' );
		update_option( 'elementor_disable_typography_schemes', 'yes' );
		update_option( 'deo_elementor_defaults', 1 );
	}
}
add_action( 'init', 'deo_update_elementor_defaults' );


/**
* Register widget areas.
*/
function deo_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'emaus' ),
		'id'            => 'deo-blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'emaus' ),
		'id'            => 'deo-page-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Newsletter Single Post', 'emaus' ),
		'id'            => 'deo-newsletter-section',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'emaus' ),
		'id'            => 'deo-footer-col-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'emaus' ),
		'id'            => 'deo-footer-col-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'emaus' ),
		'id'            => 'deo-footer-col-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'emaus' ),
		'id'            => 'deo-footer-col-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'deo_widgets_init' );



/**
* TGMPA plugins activation.
*/
if ( is_admin() ) {
	require_once EMAUS_DIR . '/includes/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'deo_tgmpa_register_required_plugins' );
}

function deo_tgmpa_register_required_plugins() {

	$plugins = array(

		array(
			'name'      => 'Kirki',
			'slug'      => 'kirki',
			'required'  => true,
		),

		array(
			'name'             => 'Deo Core',
			'slug'             => 'deo-core',
			'source'           => get_template_directory() . '/includes/plugins/deo-core.zip',
			'required'         => true,
			'version'          => '1.1.2',
			'force_activation' => false,
		),

		array(
			'name'             => 'Deo Elementor',
			'slug'             => 'deo-elementor',
			'source'           => get_template_directory() . '/includes/plugins/deo-elementor.zip',
			'required'         => true,
			'version'          => '1.2.6',
			'force_activation' => false,
		),

		array(
			'name'			=> 'Elementor',
			'slug'			=> 'elementor',
			'required'	=> true,
		),

		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

		array(
			'name'      => 'MailChimp for WordPress',
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),

		array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),

		array(
			'name'      => 'Breadcrumb NavXT',
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),

	);

	if ( EMAUS_ENVATO_PURCHASE ) {
		$plugins[] = array(
			'name'             => 'Envato Market',
			'slug'             => 'envato-market',
			'source'           => get_template_directory() . '/includes/plugins/envato-market.zip',
			'required'         => false,
			'version'          => '2.0.6',
			'force_activation' => false,
		);
	}

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'emaus' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'emaus' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'emaus' ),
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'emaus' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'emaus' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'emaus' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'emaus' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'emaus' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'emaus' ),
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'emaus' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'emaus' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'emaus' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'emaus' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'emaus' ),
			'nag_type'                        => 'updated',
		),

	);

	tgmpa( $plugins, $config );
}


/**
* Demo import.
*/
function deo_ocdi_import_files() {
	$customizer = ( EMAUS_ENVATO_PURCHASE ) ? 'customizer.dat' : 'customizer-pro.dat';

	return array(
		array(
			'import_file_name'           => 'Demo 0: Overview',
			'import_file_url'            => EMAUS_URI . '/includes/demo-import/00/demo-content.xml',
			'import_widget_file_url'     => EMAUS_URI . '/includes/demo-import/00/widgets.wie',
			'import_customizer_file_url' => EMAUS_URI . '/includes/demo-import/00/' . $customizer,
			'import_preview_image_url'   => EMAUS_URI . '/includes/demo-import/00/preview.jpg',
			'preview_url'                => 'https://emaus.deothemes.com/',
		),

		array(
			'import_file_name'           => 'Demo 1: Startup',
			'import_file_url'            => EMAUS_URI . '/includes/demo-import/01/demo-content.xml',
			'import_widget_file_url'     => EMAUS_URI . '/includes/demo-import/01/widgets.wie',
			'import_customizer_file_url' => EMAUS_URI . '/includes/demo-import/01/' . $customizer,
			'import_preview_image_url'   => EMAUS_URI . '/includes/demo-import/01/preview.jpg',
			'preview_url'                => 'https://emaus.deothemes.com/home-1',
		),

		array(
			'import_file_name'           => 'Demo 2: Mobile App',
			'import_file_url'            => EMAUS_URI . '/includes/demo-import/02/demo-content.xml',
			'import_widget_file_url'     => EMAUS_URI . '/includes/demo-import/02/widgets.wie',
			'import_customizer_file_url' => EMAUS_URI . '/includes/demo-import/02/' . $customizer,
			'import_preview_image_url'   => EMAUS_URI . '/includes/demo-import/02/preview.jpg',
			'preview_url'                => 'https://emaus.deothemes.com/home-2',
		),

		array(
			'import_file_name'           => 'Demo 3: eBook Landing',
			'import_file_url'            => EMAUS_URI . '/includes/demo-import/03/demo-content.xml',
			'import_widget_file_url'     => EMAUS_URI . '/includes/demo-import/03/widgets.wie',
			'import_customizer_file_url' => EMAUS_URI . '/includes/demo-import/03/' . $customizer,
			'import_preview_image_url'   => EMAUS_URI . '/includes/demo-import/03/preview.jpg',
			'preview_url'                => 'https://emaus.deothemes.com/home-3',
		),

		array(
			'import_file_name'           => 'Demo 4: SaaS Landing',
			'import_file_url'            => EMAUS_URI . '/includes/demo-import/04/demo-content.xml',
			'import_widget_file_url'     => EMAUS_URI . '/includes/demo-import/04/widgets.wie',
			'import_customizer_file_url' => EMAUS_URI . '/includes/demo-import/04/' . $customizer,
			'import_preview_image_url'   => EMAUS_URI . '/includes/demo-import/04/preview.jpg',
			'preview_url'                => 'https://emaus.deothemes.com/home-4',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'deo_ocdi_import_files' );


/*
 * OCDI plugins
 */
function emaus_ocdi_register_plugins( $plugins ) {
  $plugins = [
    [
      'name'     => 'Kirki',
      'slug'     => 'kirki',
      'required' => true,
    ],
		[
      'name'     => 'Elementor',
      'slug'     => 'elementor',
      'required' => true,
    ],
		[
			'name'     => 'Deo Core',
			'slug'     => 'deo-core',
			'source'   => get_template_directory() . '/includes/plugins/deo-core.zip',
			'required' => true,
		],
		[
			'name'     => 'Deo Elementor',
			'slug'     => 'deo-elementor',
			'source'   => get_template_directory() . '/includes/plugins/deo-elementor.zip',
			'required' => true,
		],
		[
      'name'     => 'Contact Form 7',
      'slug'     => 'contact-form-7',
      'required' => false,
    ],
		[
      'name'     => 'MailChimp for WordPress',
      'slug'     => 'mailchimp-for-wp',
      'required' => false,
    ],
		[
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => false,
		],
  ];

	if ( EMAUS_ENVATO_PURCHASE ) {
		$plugins[] = array(
			'name'             => 'Envato Market',
			'slug'             => 'envato-market',
			'source'           => get_template_directory() . '/includes/plugins/envato-market.zip',
			'required'         => false,
		);
	}
 
  return $plugins;
}
add_filter( 'ocdi/register_plugins', 'emaus_ocdi_register_plugins' );


/**
* Assign menus and front page after demo import
*
* @param array $selected_import array with demo import data
*/
function deo_ocdi_after_import( $selected_import ) {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu Bar', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'main-menu' => $main_menu->term_id,
			'footer-menu' => $footer_menu->term_id
		)
	);

	// Assign front page based on demo import
	switch ( $selected_import['import_file_name'] ) {

		case 'Demo 0: Overview':
			$front_page_id = get_page_by_title( 'Overview' );
			update_option( 'page_on_front', $front_page_id->ID );
			break;

		case 'Demo 1: Startup':
			$front_page_id = get_page_by_title( 'Home 1' );
			update_option( 'page_on_front', $front_page_id->ID );
			break;

		case 'Demo 2: Mobile App':
			$front_page_id = get_page_by_title( 'Home 2' );
			update_option( 'page_on_front', $front_page_id->ID );
			break;

		case 'Demo 3: eBook Landing':
			$front_page_id = get_page_by_title( 'Home 3' );
			update_option( 'page_on_front', $front_page_id->ID );
			break;

		case 'Demo 4: SaaS Landing':
			$front_page_id = get_page_by_title( 'Home 4' );
			update_option( 'page_on_front', $front_page_id->ID );
			break;

		default:
			break;
	}

	update_option( 'show_on_front', 'page' );	
}
add_action( 'pt-ocdi/after_import', 'deo_ocdi_after_import' );