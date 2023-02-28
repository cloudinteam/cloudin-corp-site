<?php
/**
 * Custom template tags for this theme.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! function_exists( 'deo_meta_category' ) ) {
	/**
	* Post caetgory meta
	*
	* @since 1.0.0
	*/
	function deo_meta_category( $post_id = '' ) {
		$categories = get_the_category( $post_id );
		$separator = ' ';
		$categories_output = '';
		$output = '';

		if ( ! empty( $categories ) ):
			foreach( $categories as $index => $category ):
				if ($index > 0) : $categories_output .= $separator; endif;
				$categories_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="entry__category-item">' . esc_html( $category->name ) . '</a>';
			endforeach;
		endif;

		if ( 'post' == get_post_type() ) :
			$output .= '<div class="entry__category">' . $categories_output . '</div>';
		endif;

		return $output;

	}
}


if ( ! function_exists( 'deo_meta_date' ) ) {

	/**
	* Prints HTML with meta information for the current post-date/time.
	*/
	function deo_meta_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<span class="entry__meta-item entry__meta-date">
						<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>
					</span>'; // WPCS: XSS OK.		
	}

}

if ( ! function_exists( 'deo_meta_author' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function deo_meta_author() {
		?>
		<span class="entry__meta-item entry__meta-author">
			<a class="entry__meta-author-url" rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 28, null, null, array( 'class' => array( 'entry__meta-author-img' ) ) ); ?>
			<span><?php echo esc_html_x( 'by', 'post author', 'emaus' ) ?></span>			
			<span itemprop="author" itemscope itemtype="//schema.org/Person" class="entry__meta-author-name">
				<?php echo esc_html( get_the_author() ); ?>
			</span>
			</a>
		</span>
		<?php
	}
endif;


if ( ! function_exists( 'deo_meta_comments' ) ) {
	/**
	* Post comments meta
	*
	* @since 1.0.0
	*/
	function deo_meta_comments() {

		$comments_num = get_comments_number();
		$output = '';

		if ( comments_open() ) {
			if( $comments_num == 0 ) {
				$comments = esc_html__( '0 Comments', 'emaus' );
			} elseif ( $comments_num > 1 ) {
				$comments = $comments_num . esc_html__(' Comments', 'emaus');
			} else {
				$comments = esc_html__('1 Comment', 'emaus');
			}
			$comments = sprintf('<a href="%1$s">%2$s</a>', get_comments_link(), $comments );
		} else {
			$comments = esc_html__('Comments are closed', 'emaus');
		}

		$output .= '<span class="entry__meta-item">' . $comments . '</span>';
		return $output;
	}
}


if ( ! function_exists( 'deo_related_posts' ) ) {
	/**
	 * Related Posts
	 */
	function deo_related_posts() {

		global $post;
		$tags = wp_get_post_tags( $post->ID );
		$author_id = get_the_author_meta( 'ID' );
		$related_by = get_theme_mod( 'deo_related_posts_relation', 'category' );

		$args = array(
			'post_type'=>'post',
			'post_status' => 'publish',
			'posts_per_page' => 3,
			'post__not_in' => array( get_the_ID() ),
			'ignore_sticky_posts' => true,
		);

		if ( $tags && 'tag' === $related_by ) {
			$tag_ids = array();
			foreach ( $tags as $tag ) {
				$tag_ids[] = $tag->term_id;
			}

			$args['tag__in'] = $tag_ids;

		} elseif ( 'category' === $related_by ) {
			$args['category__in'] = wp_get_post_categories( get_the_ID() );
		} elseif ( 'author' === $related_by ) {        
			$args['author'] = $author_id;
		}

		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>

			<section class="related-posts">
				<h5 class="h3 mb-24"><?php echo esc_html__( 'You might also like', 'emaus'); ?></h5>
				<div class="row">

					<?php while( $query->have_posts() ) : $query->the_post(); ?>

						<div class="col-md-4 col-sm-6">
							<article <?php post_class( 'entry related-posts__entry' ); ?> itemtype="https://schema.org/Article" itemscope="itemscope">
								<?php if ( has_post_thumbnail() ) : ?>
									<figure class="related-posts__entry-img-holder">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail( 'emaus_blog_featured_small', array('class' => 'related-posts__entry-img img-fullwidth' ) ); ?>
										</a>
									</figure>
								<?php endif; ?>

								<?php the_title( sprintf( '<h4 class="related-posts__entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

							</article><!-- #post-## -->
						</div>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				</div> <!-- .row -->
			</section> <!-- .related-posts -->
		<?php endif;
	}
}


if ( ! function_exists( 'deo_multi_page_pagination' ) ) {
	/**
	* Multi-page pagination
	*
	* @since 1.0.0
	*/
	function deo_multi_page_pagination() {
		$defaults = array(
			'before'           => '<nav class="post-pagination">' . '<span>' . esc_html( 'Pages:', 'emaus' ) . '</span>',
			'after'            => '</nav>',
			'link_before'      => '<span class="post-pagination__number">',
			'link_after'       => '</span>',
			'next_or_number'   => 'number',
			'separator'        => ' ',
			'nextpagelink'     => esc_html( 'Next page', 'emaus' ),
			'previouspagelink' => esc_html( 'Previous page', 'emaus' ),
			'pagelink'         => '%',
			'echo'             => 1
		);

		wp_link_pages( $defaults );
	}
}


if ( ! function_exists( 'deo_post_pagination' ) ) {
	/**
	* Post pagination
	*
	* @since 1.0.0
	*/
	function deo_post_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		} ?>

		<!-- Pagination Numbers -->
		<nav class="pagination clearfix">
			<?php $args = array(
				'prev_next'          => true,
				'prev_text'          => wp_kses( '<i class="ui-arrow-left"></i>', array( 'i' => array( 'class' => array() ) ) ),
				'next_text'          => wp_kses( '<i class="ui-arrow-right"></i>', array( 'i' => array( 'class' => array() ) ) ),
			); ?>
			<?php echo paginate_links( $args ); ?>
		</nav>

		<?php
	}
}


if ( ! function_exists( 'deo_post_nav' ) ) :
	/**
	* Display navigation to next/previous post when applicable.
	*
	* @since 1.0.0
	*/
	function deo_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		$get_next_post = get_next_post();		

		if ( ! empty( $get_next_post ) ) {
			$next_post_thumbnail = get_the_post_thumbnail_url( $next->ID, 'emaus_blog_next_post' );
			$next_post_url = get_permalink( $next->ID );
			$next_post_title = $get_next_post->post_title;
			$next_post_category = get_the_category( $get_next_post->ID );
		}

		if ( ! $next ) {
			return;
		}
		?>
		
		<!-- Next Post -->
		<nav class="entry-navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope>
			<div class="container">
				<h5 class="screen-reader-text"><?php echo esc_html__( 'Post navigation', 'emaus' ); ?></h5>
				<div class="entry-navigation__row">

					<?php if ( ! empty( $get_next_post ) && ! empty( $next_post_thumbnail ) ) : ?>
						<figure class="entry-navigation__img-holder">
							<a href="<?php echo esc_url( $next_post_url ); ?>">
								<img src="<?php echo esc_url( $next_post_thumbnail ); ?>" class="entry-navigation__img" alt="<?php echo esc_attr( $previous_post_title ); ?>">
							</a>
						</figure>
					<?php endif; ?>

					<div class="entry-navigation__body">
						<?php printf( '<span class="entry-navigation__label">%s</span>', esc_html__('Next Post', 'emaus') ); ?>
						<div class="entry-navigation__category entry__category">
							<?php echo deo_meta_category( $get_next_post->ID ) ?>
						</div>
						<?php next_post_link( '<h6 class="entry-navigation__title title-underline">%link</h6>', _x( '%title', 'Next post link', 'emaus' ) ); ?>
					</div>			
					
				</div> <!-- .entry-navigation__row -->
			</div>
		</nav>
		<?php
	}
endif;


if ( ! function_exists( 'deo_author_box' ) ) {
	/**
	* Author Box
	*/
	function deo_author_box() {

		$socials = [
			'facebook'  => get_the_author_meta( 'facebook' ),
			'twitter'   => get_the_author_meta( 'twitter' ),
			'linkedin'  => get_the_author_meta( 'linkedin' ),
			'instagram' => get_the_author_meta( 'instagram' ),
			'youtube'   => get_the_author_meta( 'youtube' ),
			'vimeo'     => get_the_author_meta( 'vimeo' ),
			'pinterest' => get_the_author_meta( 'pinterest' ),			
			'github' 		=> get_the_author_meta( 'github' ),		
			'snapchat'  => get_the_author_meta( 'snapchat' ),
			'bloglovin' => get_the_author_meta( 'bloglovin' ),
			'blogger'   => get_the_author_meta( 'blogger' ),
			'telegram'  => get_the_author_meta( 'telegram' )		
		];

		if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="entry-author entry-author--box clearfix">
				<figure itemscope itemprop="image" class="entry-author__img-holder">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 64, null, null, array( 'class' => array( 'entry-author__img' ) ) ); ?>
					</a>                
				</figure>
				<div class="entry-author__info">
					<h6 class="entry-author__name" itemprop="url" rel="author">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" itemprop="name">
							<span itemprop="author" itemscope itemtype="https://schema.org/Person" class="entry-author__name">
								<?php the_author_meta( 'display_name' ); ?>
							</span>
						</a>
					</h6>
					<div class="entry-author__description"><?php the_author_meta( 'description' ); ?></div>

					<!-- Socials -->
					<?php if ( ! empty( $socials ) ) : ?>
						<div class="entry-author__socials socials socials--nobase">
							<?php foreach ( $socials as $key => $value ) {
								if ( $value ) : ?>
									<a href="<?php echo esc_url( the_author_meta( $key ) ); ?>" class="social" title="<?php echo esc_attr( $key ); ?>" rel="noopener nofollow" target="_blank">
										<i class="ui-<?php echo esc_attr( $key ); ?>"></i>
									</a>
								<?php endif;
							} ?>
						</div>
					<?php endif; ?>

				</div>
			</div>
		<?php endif;
	}
}


if ( ! function_exists( 'deo_term_description' ) ) {
	/**
	* Adds class to term description
	* @since 1.0.0
	*/
	function deo_term_description( $before = '', $after = '</div>' ) {
		$description = apply_filters( 'get_the_archive_description', wp_strip_all_tags( term_description() ) );
		if ( !empty( $description ) ) {
			echo $before . $description . $after;
		}
	}
}