<?php
/**
 * Deo Elementor Helper class.
 *
 * @link       https://deothemes.com
 * @since      1.0.0
 *
 * @package    DeoElementor
 * @subpackage DeoElementor/includes/
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Deo_Elementor_Helper.
 */
class Deo_Elementor_Helper {

	/**
	* A list of safe tage for `validate_html_tag` method.
	*/
	const ALLOWED_HTML_WRAPPER_TAGS = array( 'article', 'aside', 'div', 'footer', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'header', 'main', 'nav', 'p', 'section', 'span' );


	/**
	* Validate an HTML tag against a safe allowed list.
	*
	* @since 1.0.0
	* @param string $tag specifies the HTML Tag.
	* @access public
	*/
	public static function validate_html_tag( $tag ) {

		// Check if Elementor method exists, else we will run custom validation code.
		if ( method_exists( '\Elementor\Utils', 'validate_html_tag' ) ) {
			return \Elementor\Utils::validate_html_tag( $tag );
		} else {
			return in_array( strtolower( $tag ), self::ALLOWED_HTML_WRAPPER_TAGS, true ) ? $tag : 'div';
		}
	}

}