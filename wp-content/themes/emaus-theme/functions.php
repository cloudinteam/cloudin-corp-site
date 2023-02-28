<?php
/**
 * Theme functions and definitions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Constants
define('EMAUS_VERSION', '1.4' );
define('EMAUS_DIR', get_template_directory() );
define('EMAUS_URI', get_template_directory_uri() );
define('EMAUS_ENVATO_PURCHASE', true );

if ( ! function_exists( 'ema_fs' ) && ! EMAUS_ENVATO_PURCHASE ) {
    // Create a helper function for easy SDK access.
    function ema_fs() {
        global $ema_fs;

        if ( ! isset( $ema_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $ema_fs = fs_dynamic_init( array(
                'id'                  => '5414',
                'slug'                => 'emaus',
                'premium_slug'        => 'emaus-pro',
                'type'                => 'theme',
                'public_key'          => 'pk_33eb41827b7226557a7eafd470d1f',
								'is_premium'          => true,
								'is_premium_only'     => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
								'has_affiliation'     => 'selected',
                'menu'                => array(
                    'slug'           => 'getting-started',
                    'support'        => false,
                    'parent'         => array(
                        'slug' => 'themes.php',
                    ),
								),
            ) );
        }

        return $ema_fs;
    }

    // Init Freemius.
    ema_fs();
    // Signal that SDK was initiated.
    do_action( 'ema_fs_loaded' );
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}


// Includes
require EMAUS_DIR . '/includes/theme-setup.php';
require EMAUS_DIR . '/includes/theme-functions.php';
require EMAUS_DIR . '/includes/admin/theme-admin.php';
require EMAUS_DIR . '/includes/theme-hooks.php';
require EMAUS_DIR . '/includes/template-tags.php';
require EMAUS_DIR . '/includes/template-parts.php';
require EMAUS_DIR . '/includes/class-deo-query.php';
require EMAUS_DIR . '/includes/class-deo-walker-nav-menu.php';
require EMAUS_DIR . '/includes/class-deo-walker-comment.php';
require EMAUS_DIR . '/includes/customizer/customizer.php';


/**
 * Theme styles.
 */
function deo_theme_styles() {
	wp_enqueue_style( 'bootstrap', EMAUS_URI . '/assets/css/bootstrap.min.css', array(), EMAUS_VERSION );
	wp_style_add_data( 'bootstrap', 'rtl', 'replace' );
	wp_enqueue_style( 'deo-font-icons', EMAUS_URI . '/assets/css/font-icons.css', array(), EMAUS_VERSION );

	if ( get_theme_mod( 'deo_cookies_bar_show', false ) ) {
		wp_enqueue_style( 'cookieconsent', EMAUS_URI . '/assets/css/cookieconsent.min.css', array(), EMAUS_VERSION );
		wp_style_add_data( 'cookieconsent', 'rtl', 'replace' );
	}

	wp_enqueue_style( 'deo-styles', EMAUS_URI . '/style.min.css', array( 'bootstrap', 'deo-font-icons' ), EMAUS_VERSION );
	wp_style_add_data( 'deo-styles', 'rtl', 'replace' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	// Fonts
	if ( ! class_exists( 'Kirki' ) ) {
		wp_enqueue_style( 'deo-google-fonts', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&family=Rubik:ital,wght@0,400;0,500;1,500&display=swap', array(), EMAUS_VERSION );
	}
}
add_action( 'wp_enqueue_scripts', 'deo_theme_styles' );


/**
 * Editor styles.
 */
function deo_editor_assets() {
	wp_enqueue_style( 'deo-editor-styles', get_theme_file_uri( '/assets/css/editor.css' ), false );
	wp_style_add_data( 'deo-editor-styles', 'rtl', 'replace' );

	if ( ! class_exists( 'Kirki' ) ) {
		wp_enqueue_style( 'deo-editor-google-fonts', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&family=Rubik:ital,wght@0,400;0,500;1,500&display=swap', array(), EMAUS_VERSION );
	}
}
add_action( 'enqueue_block_editor_assets', 'deo_editor_assets' );


/**
 * Theme scripts.
 */
function deo_theme_scripts() {
	wp_enqueue_script( 'bootstrap', EMAUS_URI . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_script( 'modernizr', EMAUS_URI . '/assets/js/modernizr.js', array( 'jquery' ), '3.4.0', true );
	wp_enqueue_script( 'isotope', EMAUS_URI . '/assets/js/isotope.pkgd.min.js', '3.0.6', true );
	wp_enqueue_script( 'imagesloaded' );
	wp_register_script( 'deo-scripts', EMAUS_URI . '/assets/js/scripts.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'deo-scripts' );

	$PHP_Data = array(
		'home_url' => esc_url( home_url( '/' ) ),
		'theme_path' => EMAUS_URI
	);	
	wp_localize_script( 'deo-scripts', 'PHP_Data', $PHP_Data );
	

	// Cookie notification bar
	if ( get_theme_mod( 'deo_cookies_bar_show', false ) ) {
		wp_enqueue_script( 'cookieconsent', EMAUS_URI . '/assets/js/cookieconsent.min.js', array( 'jquery' ), '3.1.0', true );

		wp_register_script( 'deo-cookie-consent', EMAUS_URI . '/assets/js/cookies.js', array( 'cookieconsent' ), '1.0.0', true );
		$cookies_data = array(
			'message' => esc_html( get_theme_mod( 'deo_cookies_message', 'We are using cookies to personalize content and ads to make our site easier for you to use.' ) ),
			'dismiss' => esc_html( get_theme_mod( 'deo_cookies_button', 'Agree' ) ),
			'link' => esc_html( get_theme_mod( 'deo_cookies_learn_more_text', 'Learn More' ) ),
			'href' => esc_url( get_theme_mod( 'deo_cookies_learn_more_url', 'http://cookiesandyou.com' ) ),			
		); 
		wp_localize_script( 'deo-cookie-consent', 'cookies', $cookies_data );
		wp_enqueue_script( 'deo-cookie-consent' );		
	}
	
}

add_action( 'wp_enqueue_scripts', 'deo_theme_scripts' );


/**
 * Theme admin scripts and styles.
 */
function deo_admin_scripts() {
	$screen = get_current_screen();
	wp_enqueue_style( 'deo-admin-styles', EMAUS_URI . '/assets/admin/css/admin-styles.css' );

	if ( $screen->id === 'appearance_page_one-click-demo-import') {
		wp_register_script( 'emaus-admin-scripts', EMAUS_URI . '/assets/admin/js/emaus-admin-scripts.js', array('jquery-core'), false, true );
		wp_enqueue_script( 'emaus-admin-scripts' );
	}	
}
add_action( 'admin_enqueue_scripts', 'deo_admin_scripts' );


/**
 * Theme WP Customizer scripts and styles.
 */
function deo_customizer_scripts() {
	wp_enqueue_style( 'deo-customizer-styles', EMAUS_URI . '/assets/css/customizer/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'deo_customizer_scripts' );