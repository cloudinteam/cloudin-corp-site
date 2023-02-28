<?php
/**
 * Ajax Load More Class.
 *
 * @package DeoCore
 */

namespace DeoThemes\Widgets\Ajax;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Ajax_Load_More {
	
	/**
	* Define the core functionality of the plugin.
	*
	* Load the dependencies, define the locale, and set the hooks for the admin area and
	* the public-facing side of the site.
	*
	* @since 1.0.0
	*/
	public function __construct() {
		$this->ajax_response();
	}

	/**
	* Ajax Response
	*
	* @since 1.0.0
	*
	* @access private
	*/
	private function ajax_response() {		

		check_ajax_referer( 'deo_ajax_nonce', 'security' );

		$settings = array();

		if ( ! empty( $_POST['data'] ) ) {
			$settings = $this->validate_field( $_POST['data']['settings'] );
			$settings['page'] = $_POST['data']['page'];
		}

		$query = $this->get_query( $settings );

		// Render post data
		switch ( $settings['widget_type'] ) {
			case 'deo-blog-posts':
				$this->render( $settings, $query );
				break;

			case 'deo-case-studies':
				$this->render_case_study_posts( $settings, $query );
				break;
		}

		wp_reset_postdata();

		die();
	}


	/**
	* Render blog posts.
	*
	* @since 1.0.0
	*
	* @access protected
	*/
	protected function render( $settings, $query ) {

		// Render blog layout
		if ( isset( $settings['blog_layout'] ) ) {

			switch ( $settings['blog_layout'] ) {

				case 'masonry':
					$this->render_posts( $settings, $query, 'masonry' );
					break;

				case 'creative':
					$this->render_posts( $settings, $query, 'creative' );
					break;

				default:
					$this->render_posts( $settings, $query, 'masonry' );
					break;
			}

		}
	}

	/**
	* Render blog posts.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_posts( $settings, $query, $layout = 'masonry' ) {
		$columns = ( ! empty( $settings['post_columns_mobile'] ) ? 'col-' . $settings['post_columns_mobile'] : '' ) . ( ! empty( $settings['post_columns_tablet'] ) ? ' col-md-' . $settings['post_columns_tablet'] : '' ) . ( ! empty( $settings['post_columns'] ) ? ' col-lg-' . $settings['post_columns'] : '' );
		$layout_classes = '';
		$layout_classes = $columns;
		$layout_classes .=  ' masonry-item';
		$layout_classes .= ( 'creative' == $layout ) ? ' post-creative' : '';	

		while ( $query->have_posts() ) : $query->the_post(); ?>

			<div class="<?php echo esc_attr( $layout_classes ); ?>">

				<article <?php post_class( 'entry' ); ?> itemscope="itemscope" itemtype="https://schema.org/Article">

					<?php if ( 'creative' !== $layout ) :
						$this->render_image( $settings, $layout );
					endif; ?>

					<div class="entry__body">

						<?php
							$this->render_categories( $settings );						
							$this->render_title( $settings, $layout );
							$this->render_meta( $settings );
							if ( 'creative' !== $layout ) {
								$this->render_excerpt( $settings );
							}	

							if ( 'creative' == $layout ) : ?>										
								<div class="entry__bg-img" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url( 'emaus_blog_featured_creative' ) ); ?>)"></div>
								<a href="<?php the_permalink(); ?>" class="entry__url" title="<?php the_title_attribute(); ?>"></a>
							<?php endif; ?>

					</div> <!-- .entry__body -->

				</article>
			</div>

		<?php endwhile; ?>

		<?php wp_reset_postdata();

	}


	/**
	* Render case study posts.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_case_study_posts( $settings, $query ) {

		while ( $query->have_posts() ) : $query->the_post();

			$columns = ( ! empty( $settings['post_columns_mobile'] ) ? 'col-' . $settings['post_columns_mobile'] : '' ) . ( ! empty( $settings['post_columns_tablet'] ) ? ' col-md-' . $settings['post_columns_tablet'] : '' ) . ( ! empty( $settings['post_columns'] ) ? ' col-lg-' . $settings['post_columns'] : '' ) . deo_get_case_study_categories(); ?>

			<div class="case-study masonry-item <?php echo esc_attr( $columns ); ?>">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study__entry' ); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

					<?php $this->render_image( $settings ); ?>

					<div class="case-study__body">

						<?php $this->render_categories( $settings ); ?>

						<?php the_title( sprintf( '<h3 class="entry__title case-study__title title-underline"><a href="%s">',
							esc_url( get_permalink() ) ),
							'</a></h3>'
						);

						$this->render_read_more( $settings );
					?>
					</div> <!-- .case-study__body -->

				</article>
			</div>

			<?php
		endwhile;

		wp_reset_postdata();

	}


	/**
	* Render image.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_image( $settings, $layout = 'masonry' ) {
		if ( ! has_post_thumbnail() && 'yes' !== $settings['image_hide'] ) {
			return;
		}

		if ( 'deo-blog-posts' == $settings['widget_type'] ) {
		
			$image_size = 'emaus_blog_featured_small'; ?>
				<figure class="entry__img-holder">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( $image_size, array( 'class' => 'entry__img' ) ); ?>
					</a>
				</figure>
			<?php

		} elseif ( 'deo-case-studies' == $settings['widget_type'] ) {

			?>
			<figure class="entry__img-holder case-study__img-holder">				
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php
					the_post_thumbnail(
						$settings['image_size'], array(
							'class' => 'entry__img case-study__img',
						)
					); ?>
				</a>
			</figure>		
			
			<?php
		}
	}

	/**
	* Render categories.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_categories( $settings ) {
		if ( 'deo-blog-posts' == $settings['widget_type'] ) {
			if ( 'yes' !== $settings['cat_hide'] ) {
				echo deo_meta_category();
			}
		} elseif ( 'deo-case-studies' == $settings['widget_type'] ) {
			if ( 'yes' !== $settings['category_hide'] ) {			
				echo '<div class="entry__categories case-study__categories">';
					$terms = get_the_terms( get_the_ID(), 'case_study_categories' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
							echo '<a href="' . esc_url( get_category_link( $term->term_id ) ) . '" class="case-study__category entry-category">' . esc_html( $term->name ) . '</a>';
						}
					}
				echo '</div>';
			}
		}
		
	}

	/**
	* Render title.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_title( $settings, $layout = 'masonry' ) {
		if ( 'deo-blog-posts' == $settings['widget_type'] ) :
			$size = ( 'masonry' == $layout ) ? ' entry__title--small' : '';
			?>
			<<?php echo \Deo_Elementor_Helper::validate_html_tag( $settings['title_tag'] ); ?> class="entry__title title-underline <?php echo esc_attr( $size ); ?>">
				<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
			</<?php echo \Deo_Elementor_Helper::validate_html_tag( $settings['title_tag'] ); ?>>
		<?php elseif ( 'deo-case-studies' == $settings['widget_type'] ) :
			the_title( sprintf( '<h3 class="entry__title case-study__title title-underline"><a href="%s">',
				esc_url( get_permalink() ) ),
				'</a></h3>'
			);
		endif;
	}

	/**
	* Render meta.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_meta( $settings ) {
		if ( 'yes' !== $settings['date_hide'] || 'yes' !== $settings['author_hide'] ) { ?>
			<footer class="entry__footer-meta">
				<?php if ( 'yes' !== $settings['author_hide'] ) : ?>
					<?php echo deo_meta_author(); ?>
				<?php endif; ?>
				<?php if ( 'yes' !== $settings['date_hide'] ) : ?>
					<?php deo_meta_date(); ?>
				<?php endif; ?>				
			</footer>
		<?php
		}
	}

	/**
	* Render post excerpt.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_excerpt( $settings ) {
		if ( 'yes' !== $settings['excerpt_hide'] ) { ?>
			<div class="entry__excerpt">
				<?php if ( empty( $settings['excerpt_length'] ) ) {
					the_excerpt();
				} else {
					echo '<p>' . wp_trim_words( get_the_content(), $settings['excerpt_length'] ) . '</p>';
				} ?>
			</div>
		<?php
		}
	}


	/**
	* Render read more.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_read_more( $settings ) {
		if ( $settings['read_more_show'] !== 'yes' ) { ?>
			<a href="<?php the_permalink(); ?>" class="read-more case-study__read-more link-underline">
				<span class="case-study__read-more-text"><?php echo esc_html__( $settings['read_more_text'], 'deo-elementor' ); ?></span>
			</a>
			<?php
		}
	}

	
	/**
	* Query args
	*
	* @since 1.0.0
	*
	* @access private
	*/
	private function get_query( $settings = array() ) {

		$args = array(
			'post_status' => array( 'publish' ),
		);

		// Post type
		if ( isset( $settings['post_type'] ) ) {
			$args['post_type'] = $settings['post_type'];
		}

		// Posts per page
		if ( isset( $settings['posts_per_page'] ) ) {
			$args['posts_per_page'] = $settings['posts_per_page'];
		}

		// Category
		if ( 'deo-blog-posts' == $settings['widget_type'] ) {			
			if ( isset( $settings['category_name'] ) ) {
				$args['category_name'] = $settings['category_name'];
			}
		} elseif ( 'deo-case-studies' == $settings['widget_type'] ) {
			if ( ! empty( $settings['filter_item_list'] ) ) {
				$args['tax_query'][] = array(
					'taxonomy' => 'case_study_categories',
					'field' => 'slug',
					'terms' => $settings['filter_item_list']
				);
			}
		}

		// Orderby
		if ( isset( $settings['orderby'] ) ) {
			$args['orderby'] = $settings['orderby'];
		}

		// Order
		if ( isset( $settings['order'] ) ) {
			$args['order'] = $settings['order'];
		}

		// Sticky Posts
		if ( 'yes' == $settings['ignore_sticky_posts'] ) {
			$args['ignore_sticky_posts'] = 1;
		}

		// Paged
		if ( ! empty( $settings['page'] ) ) {
			$args['paged'] = $settings['page'] + 1;
		}

		$query = new \WP_Query( $args );

		return $query;

	}


	/**
	* Validate field
	*
	* @since 1.0.0
	*
	* @access private
	*/
	private function validate_field( $settings ) {

		if ( is_array( $settings ) ) {
			foreach ( $settings as $key => $val ) {
				if ( is_array( $val ) ) {
					$val = $this->validate_field( $val );
				} else {
					sanitize_text_field( $val );
				}
			}
		} elseif ( is_string( $settings ) ) {
			$settings = sanitize_text_field( $settings );
		} else {
			$settings = '';
		}

		return $settings;
	}
}

new Deo_Ajax_Load_More;