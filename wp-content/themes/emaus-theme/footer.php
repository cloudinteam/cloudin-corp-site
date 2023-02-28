<?php
/**
 * The template for displaying the footer.
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

<?php
	$footer_bottom_text = get_theme_mod( 'deo_footer_bottom_text', sprintf(
		esc_html__( 'Emaus, Made by %1$sDeoThemes%2$s' , 'emaus' ),
		'<a href="'. esc_url( 'https://deothemes.com' ) . '">',
		'</a>'
	) );
?>

	<?php deo_footer_before(); ?>

	<?php if ( get_theme_mod( 'deo_footer_show', true ) ) : ?>
	
		<!-- Footer -->
		<footer class="footer" itemscope itemtype="http://schema.org/WPFooter">

			<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
				<?php if ( get_theme_mod( 'deo_footer_menu_show', true ) || get_theme_mod( 'deo_footer_socials_show', true ) ) : ?>
					<div class="footer__menu-bar">
						<div class="container">
							<div class="row">

								<?php if ( has_nav_menu( 'footer-menu' ) && get_theme_mod( 'deo_footer_menu_show', true ) ) : ?>
									<div class="col-md-6">
										<?php
											wp_nav_menu( array(
												'theme_location' => 'footer-menu',
												'menu_class'     => 'footer__nav-menu',
												'depth'          => 1,
											) );
										?>
									</div>
								<?php endif; ?>

								<?php if ( function_exists( 'deo_render_social_icons' ) && get_theme_mod( 'deo_footer_socials_show', true ) ) : ?>
									<div class="col-md-6">
										<div class="footer__socials">
											<?php echo deo_render_social_icons(); ?>
										</div>
									</div>
								<?php endif; ?>

							</div> <!-- .row -->
						</div> <!-- .container -->
					</div> <!-- .footer__menu-bar -->
				<?php endif; ?>
			<?php endif; ?>

			<div class="container">

				<?php if ( is_active_sidebar( 'deo-footer-col-1' ) || is_active_sidebar( 'deo-footer-col-2' ) || is_active_sidebar( 'deo-footer-col-3' ) || is_active_sidebar( 'deo-footer-col-4' ) ) : ?>
					<?php if( get_theme_mod( 'deo_footer_widgets_show', true ) ) : ?>
						
						<div class="footer__widgets">
							<div class="row">

								<!-- 4 Columns -->           
								<?php if ( get_theme_mod( 'deo_footer_columns', 'four-col' ) == 'four-col' ) : ?>                

									<?php if(is_active_sidebar( 'deo-footer-col-1' )) : ?>
										<div class="col-lg-3 col-md-6 footer__col-1">
											<?php dynamic_sidebar( 'deo-footer-col-1' ); ?>
										</div>
									<?php endif; ?>

									<?php if(is_active_sidebar( 'deo-footer-col-2' )) : ?>
										<div class="col-lg-2 offset-lg-1 col-md-6 footer__col-2">
											<?php dynamic_sidebar( 'deo-footer-col-2' ); ?>
										</div>
									<?php endif; ?>

									<?php if(is_active_sidebar( 'deo-footer-col-3' )) : ?>
										<div class="col-lg-2 col-md-6 footer__col-3">
											<?php dynamic_sidebar( 'deo-footer-col-3' ); ?>
										</div>
									<?php endif; ?>

									<?php if(is_active_sidebar( 'deo-footer-col-4' )) : ?>
										<div class="col-lg-3 offset-lg-1 col-md-6 footer__col-4">
											<?php dynamic_sidebar( 'deo-footer-col-4' ); ?>
										</div>
									<?php endif; ?>

								<?php endif; ?>
								
								<!-- 3 Columns -->
								<?php if ( get_theme_mod( 'deo_footer_columns', 'four-col' ) == 'three-col' ) : ?>                

									<?php if(is_active_sidebar( 'deo-footer-col-1' )) : ?>
										<div class="col-lg-4 col-md-6 footer__col-1">
											<?php dynamic_sidebar( 'deo-footer-col-1' ); ?>
										</div>
									<?php endif; ?>

									<?php if(is_active_sidebar( 'deo-footer-col-2' )) : ?>
										<div class="col-lg-4 col-md-6 footer__col-2">
											<?php dynamic_sidebar( 'deo-footer-col-2' ); ?>
										</div>
									<?php endif; ?>

									<?php if(is_active_sidebar( 'deo-footer-col-3' )) : ?>
										<div class="col-lg-4 col-md-6 footer__col-3">
											<?php dynamic_sidebar( 'deo-footer-col-3' ); ?>
										</div>
									<?php endif; ?>

								<?php endif; ?>

								<!-- 2 Columns -->
								<?php if ( get_theme_mod( 'deo_footer_columns', 'four-col' ) == 'two-col' ) : ?>                

									<?php if(is_active_sidebar( 'deo-footer-col-1' )) : ?>
										<div class="col-lg-6 footer__col-1">
											<?php dynamic_sidebar( 'deo-footer-col-1' ); ?>
										</div>
									<?php endif; ?>

									<?php if(is_active_sidebar( 'deo-footer-col-2' )) : ?>
										<div class="col-lg-6 footer__col-2">
											<?php dynamic_sidebar( 'deo-footer-col-2' ); ?>
										</div>
									<?php endif; ?>

								<?php endif; ?>

								<!-- 1 Column -->
								<?php if ( get_theme_mod( 'deo_footer_columns', 'four-col' ) == 'one-col' ) : ?>                

									<?php if(is_active_sidebar( 'deo-footer-col-1' )) : ?>
										<div class="col-md-12 footer__col-1">
											<?php dynamic_sidebar( 'deo-footer-col-1' ); ?>
										</div>
									<?php endif; ?>

								<?php endif; ?>
							</div>
						</div> <!-- end footer widgets -->
					<?php endif; ?>
				<?php endif; ?> <!-- if widgets are empty -->				
			</div> <!-- end container -->

			<?php if( get_theme_mod( 'deo_footer_bottom_show', true ) ) : ?>
				<div class="footer__bottom">
					<div class="container text-center">

							<?php if ( $footer_bottom_text ) : ?>
								<span class="copyright">
									<?php if ( get_theme_mod( 'deo_footer_bottom_year_show', true ) ) : ?>
										&copy; <?php echo date('Y') . ' '; ?>
									<?php endif; ?>
									<?php echo wp_kses_post ( $footer_bottom_text ); ?>
								</span>
							<?php endif; ?>

					</div> <!-- .container -->
				</div> <!-- .footer__bottom -->
			<?php endif; ?> <!-- if footer bottom show -->

		</footer>

	<?php endif; ?>	

	<?php deo_back_to_top(); ?>	
	
	<?php deo_footer_after(); ?>

</div> <!-- .main-wrapper -->
</main> <!-- #main -->

<?php deo_body_bottom(); ?>

<?php wp_footer(); ?>
</body>
</html>