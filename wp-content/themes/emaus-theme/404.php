<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Emaus
 */

get_header();

$image = get_theme_mod( 'deo_page_404_image', EMAUS_URI . '/assets/img/404/emaus_404.jpg' );
$title = get_theme_mod( 'deo_page_404_title', __( '404 - Page Not Found', 'emaus' ) );
$description = get_theme_mod( 'deo_page_404_description', __( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'emaus' ) );
$button_text = get_theme_mod( 'deo_page_404_button_text', __( 'Take Me Back Home', 'emaus' ) );

?>

<section class="page-404-section pt-80 pb-120 pt-md-56">

	<div class="container text-center">
		<div class="row justify-content-center">
			<div class="col-md-7">

				<?php if ( $image ) : ?>
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( '404 Page Not Found', 'emaus' ) ?>" class="page-404__img">
				<?php endif; ?>

				<!-- Page Title -->
				<h1 class="page-404__title mt-56 mb-16"><?php echo esc_html( $title ); ?></h1>
				<p class="page-404__text mb-32"><?php echo esc_html( $description ); ?></p>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--md btn--color"><?php echo esc_html( $button_text ); ?></a>
			</div>
		</div>				
	</div>

</section>
<?php get_footer(); ?>