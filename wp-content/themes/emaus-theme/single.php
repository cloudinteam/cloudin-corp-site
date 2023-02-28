<?php
/**
 * The template for displaying all single posts.
 *
 * @package Emaus
 */

get_header();
?>

<?php if ( 'case_study' == get_post_type() ) : ?>

	<?php the_content(); ?>

<?php else : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php deo_entry_featured_image_before(); ?>

		<?php deo_entry_featured_image(); ?>

		<?php deo_entry_featured_image_after(); ?>

		<section class="section-wrap ov pt-72 pb-120">
			<div class="container">
				<div class="row <?php if ( 'fullwidth' == deo_layout_type( 'blog' ) || ! is_active_sidebar( 'deo-blog-sidebar' ) ) { echo esc_attr( 'justify-content-center' ); } ?>">

					<!-- blog content -->
					<div class="blog__content col-lg-8 mb-40">

						<?php
							if ( function_exists( 'deo_save_post_views' ) ) {
								deo_save_post_views( get_the_ID() );
							}								
							get_template_part( 'template-parts/content-single', get_post_format() );
						?>
						
					</div> <!-- .blog__content -->

					<?php
						// Sidebar
						if ( deo_is_active_sidebar( 'blog' ) ) {
							deo_sidebar();
						}
					?>

				</div>
			</div>
		</section> <!-- .main-content -->

		<?php deo_post_nav(); ?>

		<?php deo_newsletter_section(); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>