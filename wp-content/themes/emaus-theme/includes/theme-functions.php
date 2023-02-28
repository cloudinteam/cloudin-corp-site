<?php
/**
 * Core Theme Functions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
	* Check if page built with Elementor
	*
	* @since  1.0.0
	*/
function deo_is_elementor_page() {
	$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

	if ( (bool)$elementor_page ) {
		return true;
	} else {
		return false;
	}	
}


/**
	* Check if it's Case Study CPT archive
	*
	* @since  1.2.0
	*/
function deo_is_case_study() {
	if ( is_tax( 'case_study_categories' ) || is_post_type_archive( 'case_study' ) ) {
		return true;
	} else {
		return false;
	}	
}


/**
* Gutenberg Check
*
* @since 1.0.0
*/
function deo_is_gutenberg() {
	return function_exists( 'register_block_type' ); 
}


/**
 * Get the masonry filter of case study CPT categories.
 */
function deo_get_case_study_filter() {
	$terms = get_terms(
		array(
			'taxonomy' => 'case_study_categories',
			'hide_empty' => true
		) 
	);

	if ( $terms && ! is_wp_error( $terms ) ) : ?>
		<div class="col-lg-12 text-center project-filter">
			<a href="#" class="filter active" data-filter="*"><?php echo esc_html__( 'All', 'emaus' ); ?></a>
			<?php foreach ( $terms as $term ) : ?>
				<a href="#" class="filter" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
			<?php endforeach; ?>
		</div>
	<?php endif;

}


/**
 * Get the list of categories of case study CPT.
 */
function deo_get_case_study_categories() {
	$terms = get_the_terms( get_the_ID(), 'case_study_categories' );
	$classes = '';

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$classes .= ' ' . $term->slug . ' ';
		}
	}

	return $classes;
}


/**
 * Allow shorcodes in text widgets
 */
add_filter( 'widget_text', 'do_shortcode' );


/**
 * Custom excerpt length
 */
function deo_custom_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'deo_posts_excerpt_settings', 20 );
	return $excerpt_length;
}
add_filter( 'excerpt_length', 'deo_custom_excerpt_length', 999 );


/**
 * Replace excerpt dots
 */
function deo_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'deo_excerpt_more', 21 );



if ( ! function_exists( 'deo_sidebar' ) ) {
	/**
	* Get sidebar
	*
	* @since 1.0.0
	*/
	function deo_sidebar( $sidebar = '' ) {
		?>
			<aside class="col-lg-4 sidebar">
				<?php get_sidebar( $sidebar ); ?>
			</aside>
		<?php
	}
}


if ( ! function_exists( 'deo_is_active_sidebar' ) ) {
	/**
	* Check if sidebar is active
	*
	* @since 1.0.0
	*/
	function deo_is_active_sidebar( $sidebar = '' ) {
		if ( 'fullwidth' !== deo_layout_type( $sidebar ) && is_active_sidebar( 'deo-' . $sidebar . '-sidebar' ) ) {
			return true;
		}
	}
}


if ( ! function_exists( 'deo_layout_type' ) ) {
	/**
	 * Check layout type based on customizer and meta settings
	 * @return string $type Layout type
	 */
	function deo_layout_type( $type ) {
		$layout = '';
		$meta_value = '';
		$meta = get_post_meta( get_the_ID(), '_deo_page_layout', true );
		$page_for_posts = get_option( 'page_for_posts' );

		if ( is_home() && $page_for_posts ) {
			$meta_value = get_post_meta( $page_for_posts, '_deo_page_layout', true );
		}

		if ( $meta ) {
			foreach( $meta as $meta_layout ) {
				$meta_value = $meta_layout;
			}
		}

		if ( is_archive() || is_404() || is_search() || is_home() ) {
			$meta_value = '';
		}

		if ( 'left-sidebar' == get_theme_mod( 'deo_' . $type .  '_layout_type', 'fullwidth' ) ) {
			$layout = ( $meta_value ) ? $meta_value : 'left-sidebar';		
		}

		if ( 'right-sidebar' == get_theme_mod( 'deo_' . $type .  '_layout_type', 'fullwidth' ) ) {
			$layout = ( $meta_value ) ? $meta_value : 'right-sidebar';
		}

		if ( 'fullwidth' == get_theme_mod( 'deo_' . $type .  '_layout_type', 'fullwidth' ) ) {			
			$layout = ( $meta_value ) ? $meta_value : 'fullwidth';
		}	

		return $layout;
	}
}


if ( ! function_exists( 'deo_header_type' ) ) {
	/**
	 * Check header type based on customizer and meta settings
	 * @return string $type header type
	 */
	function deo_header_type() {
		$type = '';
		$meta = get_post_meta( get_the_ID(), '_deo_header_layout', true );
		$page_for_posts = get_option( 'page_for_posts' );

		if ( is_home() && $page_for_posts ) {
			$meta = get_post_meta( $page_for_posts, '_deo_header_layout', true );
		}

		if ( is_archive() || is_404() || is_search() || is_home() ) {
			$meta = '';
		}

		if ( 'nav--transparent' == get_theme_mod( 'deo_header_settings', 'nav--default' ) ) {
			$type = ( $meta ) ? $meta : 'nav--transparent';		
		}

		if ( 'nav--default' == get_theme_mod( 'deo_header_settings', 'nav--default' ) ) {
			$type = ( $meta ) ? $meta : 'nav--default';		
		}

		return $type;
	}
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function deo_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Page Layout Class
	if ( is_page() ) {
		$classes[] = deo_layout_type( 'page' );
	}

	// Blog Layout Class
	if ( is_single() || is_home() ) {
		$classes[] = deo_layout_type( 'blog' );	
	}
    
	// Archives Layout Class
	if ( is_archive() ) {
		$classes[] = deo_layout_type( 'archive' );	
	}

	// Search Layout Class
	if ( is_search() ) {
		$classes[] = deo_layout_type( 'search_results' );	
	}

	$classes[] = '';

	return $classes;
}
add_filter( 'body_class', 'deo_body_classes' );


/**
 * Adds custom admin classes.
 *
 * @param string $classes Classes for the body element.
 * @return string
 */
function deo_admin_body_classes( $classes ) {

	$screen = get_current_screen();

	// Add blog layout class
	if( $screen->id === "post" ) {
		$classes = deo_layout_type( 'blog' );
	}

	// Add page layout class
	if( $screen->id === "page" ) {
		$classes = deo_layout_type( 'page' );
	}
	
	return $classes;
}
add_filter( 'admin_body_class', 'deo_admin_body_classes' );