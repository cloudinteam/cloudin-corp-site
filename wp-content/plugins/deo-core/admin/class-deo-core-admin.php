<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://deothemes.com
 * @since      1.0.0
 *
 * @package    Deo_Core
 * @subpackage Deo_Core/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Deo_Core
 * @subpackage Deo_Core/admin
 * @author     DeoThemes
 */
class Deo_Core_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Deo_Core_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Deo_Core_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/plugin-name-admin.css', array(), $this->version, 'all' );

	}


	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Deo_Core_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Deo_Core_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/widgets.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_media();

	}


	/**
	* Initialize permalink settings.
	*
	* @since 1.1.1
	*/
	public function init_permalink_settings() {

		add_settings_field(
			'emaus_case_study_slug',
			esc_html__( 'Emaus case study slug', 'deo-core' ),
			array( $this, 'permalink_slug_input' ),
			'permalink',
			'optional',
			array(
				'taxonomy' => 'case_study',
			)
		);

		add_settings_field(
			'emaus_case_study_categories_slug',
			esc_html__( 'Emaus case study categories slug', 'deo-core' ),
			array( $this, 'permalink_slug_input' ),
			'permalink',
			'optional',
			array(
				'taxonomy' => 'case_study_categories',
			)
		);

	}

	/**
	* Show a slug input box.
	*
	* @since 1.1.1
	* @access  public
	* @param  array $args The arguments.
	*/
	public function permalink_slug_input( $args ) {
		$permalinks     = get_option( 'emaus_permalinks' );
		$permalink_base = $args['taxonomy'] . '_base';
		$input_name     = 'emaus_' . $args['taxonomy'] . '_slug';
		$placeholder    = str_replace( '_', '-', $args['taxonomy'] );
		?>
		<input name="<?php echo esc_attr( $input_name ); ?>" type="text" class="regular-text code" value="<?php echo ( isset( $permalinks[ $permalink_base ] ) ) ? esc_attr( $permalinks[ $permalink_base ] ) : ''; ?>" placeholder="<?php echo esc_attr( $placeholder ); ?>" />
		<?php
	}


	/**
	* Save the permalink settings.
	*
	* @since 1.1.1
	*/
	public function save_permalink_settings() {
		$permalinks = get_option( 'emaus_permalinks' );

		if ( ! is_admin() ) {
			return;
		}	

		if ( isset( $_POST['permalink_structure'] ) || isset( $_POST['category_base'] ) ) {

			// Case study and category bases.
			$case_study_slug     			 	= ( isset( $_POST[ 'emaus_case_study_slug'] ) ) ? sanitize_text_field( wp_unslash( $_POST[ 'emaus_case_study_slug'] ) ) : '';
			$case_study_categories_slug = ( isset( $_POST[ 'emaus_case_study_categories_slug'] ) ) ? sanitize_text_field( wp_unslash( $_POST[ 'emaus_case_study_categories_slug'] ) ) : '';

			if ( ! $permalinks ) {
				$permalinks = array();
			}

			$permalinks['case_study_base']     		 		= untrailingslashit( $case_study_slug );
			$permalinks['case_study_categories_base'] = untrailingslashit( $case_study_categories_slug );

			update_option( 'emaus_permalinks', $permalinks );
		}
	}


	/**
	* Set Elementor Canvas as default template for CPT.
	*
	* @since    1.0.0
	*/
	public function set_elementor_canvas_default_template() {
		global $post;

		// Check if its a correct post type/types to apply template
		if ( ! in_array( $post->post_type, [ 'theme_templates' ] ) || ! did_action( 'elementor/loaded' ) ) {
			return;
		}
		// Check that a template is not set already
		if ( '' !== $post->page_template ) {
			return;
		}

		// Do whatever other validation and logic you need ex:
		// Make sure its not a page for posts
		if ( get_option( 'page_for_posts' ) === $post->ID ) {
			return;
		}

		//Finally set the page template
		$post->page_template = 'elementor_canvas';
		update_post_meta($post->ID, '_wp_page_template', 'elementor_canvas');
	}


}