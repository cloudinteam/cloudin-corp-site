<?php
/**
 * The template for displaying all pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<?php
		// Check if the page built with Elementor
		if ( deo_is_elementor_page() ) : ?>

			<?php deo_primary_content_top(); ?>

			<div class="elementor-main-content">

				<?php deo_primary_content_before(); ?>

				<?php the_content(); ?>

				<?php deo_primary_content_after(); ?>

			</div>

			<?php deo_comments(); ?>

			<?php deo_primary_content_bottom(); ?>

		<?php else : ?>			

			<?php
				// Page Title
				get_template_part( 'template-parts/page-title/page-title' );
			?>

			<section class="page-section pt-72 pb-56">
				<div class="container">
					<div class="row">

						<?php deo_primary_content_top(); ?>

						<div id="primary" class="page-content mb-32 <?php if ( deo_is_active_sidebar( 'page' ) ) { echo esc_attr( 'col-lg-8' ); } else { echo esc_attr( 'col-lg-12' ); } ?>">

							<?php deo_primary_content_before(); ?>

							<div class="entry__article clearfix">
								<?php the_content(); ?>
							</div>

							<?php deo_multi_page_pagination(); ?>
							
							<?php deo_comments(); ?>

							<?php deo_primary_content_after(); ?>

						</div> <!-- .page-content -->

						<?php deo_primary_content_bottom(); ?>

						<?php
							// Sidebar
							if ( deo_is_active_sidebar( 'page' ) ) {
								deo_sidebar();
							}
						?>						

					</div> <!-- .row -->
				</div> <!-- .container -->			
			</section> <!-- .page-section -->

	<?php endif; ?> <!-- elementor check -->	
<?php endwhile; endif; ?>

<?php get_footer(); ?>