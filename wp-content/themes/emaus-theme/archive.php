<?php
/**
 * The template for displaying archive pages.
 *
 * @package Emaus
 */

get_header();
?>

<?php
	// Page Title
	get_template_part( 'template-parts/page-title/page-title-archive' );
?>

<section class="archive-section pt-72 pb-56">
	<div class="container">
		<div class="row">

			<?php deo_primary_content_top(); ?>

			<div id="primary" class="blog__content mb-32 <?php if ( 'fullwidth' !== deo_layout_type( 'archive' ) && is_active_sidebar( 'deo-blog-sidebar' ) ) { echo esc_attr( 'col-lg-8' ); } else { echo esc_attr( 'col-lg-12' ); } ?>">

				<?php deo_primary_content_before(); ?>

				<?php deo_primary_content_query(); ?>

				<?php deo_post_pagination(); ?>

				<?php deo_primary_content_after(); ?>

			</div> <!-- #primary -->

			<?php
				// Sidebar
				if ( 'fullwidth' !== deo_layout_type( 'archive' ) && is_active_sidebar( 'deo-blog-sidebar' ) ) {
					deo_sidebar();
				}
			?>	

		</div> <!-- .row -->
	</div> <!-- .container -->
</section>
<?php get_footer();  ?>