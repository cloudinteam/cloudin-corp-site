<?php
/**
 * Page title for archive pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<!-- Page Title -->
<div class="page-title text-center">
	<div class="container">
		<div class="page-title__outer">
			<div class="page-title__inner">
				<div class="page-title__holder">
					<?php deo_page_title_before(); ?>

						<!-- Page Title -->
						<h1 class="page-title__title">
							<?php
								if ( is_post_type_archive( 'case_study' ) ) :
									echo get_theme_mod( 'deo_case_study_archives_title', esc_html__( 'Case Studies', 'emaus' ) );

								elseif ( is_tax( 'case_study_categories' ) || is_category() || is_tag() ) :
									single_cat_title();

								elseif ( is_author() ) :
									printf( esc_html__( 'All Posts by: %s', 'emaus' ), '<span class="vcard">' . get_the_author() . '</span>' );

								elseif ( is_day() ) :
									printf( esc_html__( 'Day: %s', 'emaus' ), '<span>' . get_the_date() . '</span>' );

								elseif ( is_month() ) :
									printf( esc_html__( 'Month: %s', 'emaus' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'emaus' ) ) . '</span>' );

								elseif ( is_year() ) :
									printf( esc_html__( 'Year: %s', 'emaus' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'emaus' ) ) . '</span>' );

								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
									esc_html_e( 'Asides', 'emaus' );

								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									esc_html_e( 'Galleries', 'emaus' );

								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									esc_html_e( 'Images', 'emaus' );

								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									esc_html_e( 'Videos', 'emaus' );

								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									esc_html_e( 'Quotes', 'emaus' );

								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									esc_html_e( 'Links', 'emaus' );

								elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
									esc_html_e( 'Statuses', 'emaus' );

								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									esc_html_e( 'Audios', 'emaus' );

								elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
									esc_html_e( 'Chats', 'emaus' );

								else :
									esc_html_e( 'Archives', 'emaus' );

								endif;
							?>
						</h1>

						<?php
							if ( is_post_type_archive( 'case_study' ) ) {
								printf( '<p class="page-title__subtitle">%s</p>', get_theme_mod( 'deo_case_study_archives_subtitle', esc_html__( 'Here are the best features that makes emaus the most powerful, fast  and user-friendly platform.', 'emaus' ) ));
							}
						?>

						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<p class="page-title__subtitle taxonomy-description">%s</p>', $term_description );
							endif;
						?>
				
					<?php deo_page_title_after(); ?>

				</div>
			</div>
		</div>
	</div>
</div> <!-- .page-title -->