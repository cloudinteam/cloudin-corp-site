<?php
/**
 * Plugin Name: Deo Elementor
 * Description: Extra widgets for Emaus WordPress theme.
 * Plugin URI:  https://deothemes.com/
 * Version:     1.2.6
 * Elementor tested up to: 3.7.7
 * Author:      DeoThemes
 * Author URI:  https://deothemes.com/
 * Text Domain: deo-elementor
 */

namespace DeoThemes;

define( 'DEO_ELEMENTOR_PATH', plugin_dir_path( __FILE__ ) );
define( 'DEO_ELEMENTOR_URL', plugin_dir_url( __FILE__ ) );

if ( ! defined( 'ABSPATH' ) )   exit; // Exit if accessed directly.

/**
 * Main Deo Elementor Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Deo_Elementor_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.2.6';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Deo_Elementor_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Deo_Elementor_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'deo-elementor' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Include Files
		$this->includes();

		// Add the widget category
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

		// Register assets
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_scripts' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_styles' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		
		// Load more AJAX
		add_action( 'wp_ajax_nopriv_deo_widget_load_more', [ $this, 'deo_widget_load_more' ] );
		add_action( 'wp_ajax_deo_widget_load_more', [ $this, 'deo_widget_load_more' ] );

		// Add custom icon font
		add_filter( 'elementor/icons_manager/additional_tabs', [ $this, 'add_font_icons' ] );
	}


	/**
	* Add Elementor Widget Categories
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function add_elementor_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'deothemes-widgets',
			[
				'title' => __( 'DeoThemes Widgets', 'deo-elementor' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'deo-elementor' ),
			'<strong>' . esc_html__( 'Deo Elementor Extension', 'deo-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'deo-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'deo-elementor' ),
			'<strong>' . esc_html__( 'Deo Elementor', 'deo-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'deo-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'deo-elementor' ),
			'<strong>' . esc_html__( 'Deo Elementor', 'deo-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'deo-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}


	/**
	* Init AJAX Load More CLass
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function deo_widget_load_more() {
		require_once( __DIR__ . '/widgets/ajax/class-deo-ajax-load-more.php' );
	}

	/**
	* Include important classes
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function includes() {
		require_once( __DIR__ . '/includes/deo-elementor-helper.php' );
	}

	/**
	* Init Widgets
	*
	* Include widgets files and register them
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function register_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/deo-video-icon.php' );
		require_once( __DIR__ . '/widgets/deo-icon-box.php' );
		require_once( __DIR__ . '/widgets/deo-testimonials-slider.php' );
		require_once( __DIR__ . '/widgets/deo-images-slider.php' );
		require_once( __DIR__ . '/widgets/deo-mailchimp-form.php' );
		require_once( __DIR__ . '/widgets/deo-contact-form-7.php' );
		require_once( __DIR__ . '/widgets/deo-pricing-tables.php' );
		require_once( __DIR__ . '/widgets/deo-blog-posts.php' );
		require_once( __DIR__ . '/widgets/deo-animated-text.php' );
		require_once( __DIR__ . '/widgets/deo-illustrations.php' );
		require_once( __DIR__ . '/widgets/deo-breadcrumbs.php' );
		require_once( __DIR__ . '/widgets/deo-case-studies.php' );

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Video_Icon );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Icon_Box );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Testimonials_Slider );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Images_Slider );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Mailchimp_Form );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Contact_Form_7 );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Pricing_Tables );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Blog_Posts );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Animated_Text );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Illustrations );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Breadcrumbs );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Deo_Case_Studies );

	}


	/**
	* Enqueue custom CSS styles for widgets
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function enqueue_styles() {
		wp_enqueue_style( 'deo-elementor-styles', plugins_url( '/assets/css/style.min.css', __FILE__ ), array(), self::VERSION );
		wp_style_add_data( 'deo-elementor-styles', 'rtl', 'replace' );
	}


	/**
	* Register custom JS scripts for widgets
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function register_scripts() {
		wp_enqueue_script( 'deo-elementor-scripts', plugins_url( '/assets/js/scripts.js', __FILE__ ), [ 'jquery' ], true );
		wp_register_script( 'jquery-magnific-popup', plugins_url( '/assets/js/jquery.magnific-popup.min.js', __FILE__ ), [ 'jquery' ], true );
		wp_register_script( 'typed', plugins_url( '/assets/js/typed.min.js', __FILE__ ), [ 'jquery' ], true );
		wp_register_script( 'lottie', plugins_url( '/assets/js/lottie_svg.min.js', __FILE__ ), '', true );

		wp_localize_script( 'deo-elementor-scripts', 'deo_elementor_data', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'deo_ajax_nonce' ),
			'plugin_url' => DEO_ELEMENTOR_URL
		));
	}


	/**
	* Add Font Icons
	*
	* @since 1.0.0
	*
	* @access public
	*/
	public function add_font_icons() {
		return [
			'streamline' => [
				'name' => 'streamline',
				'label' => __( 'Streamline', 'deo-elementor' ),
				'url' => DEO_ELEMENTOR_URL . 'assets/icons/streamline/sl-icons.css',
				'enqueue' => [ DEO_ELEMENTOR_URL . 'assets/icons/streamline/sl-icons.css' ],
				'prefix' => 'sl-',
				'displayPrefix' => 'sl',
				'labelIcon' => 'sl-content-download',
				'ver' => '1.0.0',
				'fetchJson' => DEO_ELEMENTOR_URL . 'assets/icons/streamline/icons-json.php',
				'native' => true,
			],
			'orion' => [
				'name' => 'orion',
				'label' => __( 'Orion', 'deo-elementor' ),
				'url' => DEO_ELEMENTOR_URL . 'assets/icons/orion/orion-icons.css',
				'enqueue' => [ DEO_ELEMENTOR_URL . 'assets/icons/orion/orion-icons.css' ],
				'prefix' => 'o-',
				'displayPrefix' => 'orion',
				'labelIcon' => 'o-money-1',
				'ver' => '1.0.0',
				'fetchJson' => DEO_ELEMENTOR_URL . 'assets/icons/orion/icons-json.php',
				'native' => true,
			]
		];
	}
   
}

Deo_Elementor_Extension::instance();