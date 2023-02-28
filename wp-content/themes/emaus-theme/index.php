<?php
/**
 * The main template file.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

<section class="blog-section pb-56 <?php if ( is_front_page() ) : echo esc_attr( 'blog-section--front-page' ); endif; ?>">

	<?php if ( ! is_front_page() ) : ?>
		<?php get_template_part( 'template-parts/page-title/page-title' ); ?>
	<?php endif; ?>

	<?php deo_primary_content_markup_top(); ?>

		<?php deo_primary_content_top(); ?>

		<!-- blog content -->
		<div id="primary" class="blog__content mb-32 <?php if ( deo_is_active_sidebar( 'blog' ) ) { echo esc_attr( 'col-lg-8' ); } else { echo esc_attr( 'col-lg-12' ); } ?>">

			<?php deo_primary_content_before(); ?>

			<?php deo_primary_content_query(); ?>

			<?php deo_post_pagination(); ?>

			<?php deo_primary_content_after(); ?>

		</div> <!-- .blog__content -->

		<?php
			// Sidebar
			if ( deo_is_active_sidebar( 'blog' ) ) {
				deo_sidebar();
			}
		?>

		<?php deo_primary_content_bottom(); ?>

	<?php deo_primary_content_markup_bottom(); ?>

</section> <!-- .blog-section -->

<?php get_footer(); ?>