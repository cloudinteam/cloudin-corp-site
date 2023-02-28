<?php
/**
 * Page title.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$page_subtitle = get_post_meta( get_the_ID(), '_deo_page_subtitle', true );
$dark_overlay = get_theme_mod( 'deo_page_title_colors_overlay_show', false );
?>

<!-- Page Title -->
<div class="page-title text-center <?php if ( $dark_overlay ) { echo esc_attr( 'bg-overlay bg-overlay--dark' ); } ?>" <?php if ( has_post_thumbnail() ) : ?> style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);" <?php endif; ?>>
	<div class="container">
		<div class="page-title__outer">
			<div class="page-title__inner">
				<div class="page-title__holder">
					<?php deo_page_title_before(); ?>
					<h1 class="page-title__title"><?php the_title(); ?></h1>					
					<?php deo_page_title_after(); ?>

					<?php if ( $page_subtitle ) : ?>
						<!-- Subtitle -->
						<p class="page-title__subtitle"><?php echo esc_html( $page_subtitle ); ?></p>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</div> <!-- .page-title -->