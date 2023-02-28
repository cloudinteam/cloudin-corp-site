<?php
/**
 * The main header template file
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
} ?>

<div class="nav__header">

	<!-- Logo Light -->					
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-url logo-light" itemtype="https://schema.org/Organization" itemscope="itemscope">
		<?php if ( get_theme_mod( 'deo_logo_white' ) || get_theme_mod( 'deo_logo_white_retina' ) ) : ?>
			<img src="<?php echo esc_attr( get_theme_mod( 'deo_logo_white' ) ) ?>" srcset="<?php echo esc_attr( get_theme_mod( 'deo_logo_white' ) ) . ' 1x' ?>, <?php echo esc_attr( get_theme_mod( 'deo_logo_white_retina' ) ) . ' 2x' ?>" class="logo logo--light" alt="<?php bloginfo( 'name' ) ?>">
		<?php else : ?>
			<span class="site-title site-title--light"><?php bloginfo( 'name' ) ?></span>
		<?php endif; ?>
	</a>

	<!-- Logo Dark -->					
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-url logo-dark" itemtype="https://schema.org/Organization" itemscope="itemscope">
		<?php if ( get_theme_mod( 'deo_logo_dark' ) || get_theme_mod( 'deo_logo_dark_retina' ) ) : ?>
			<img src="<?php echo esc_attr( get_theme_mod( 'deo_logo_dark' ) ) ?>" srcset="<?php echo esc_attr( get_theme_mod( 'deo_logo_dark' ) ) . ' 1x' ?>, <?php echo esc_attr( get_theme_mod( 'deo_logo_dark_retina' ) ) . ' 2x' ?>" class="logo logo--dark" alt="<?php bloginfo( 'name' ) ?>">
		<?php else : ?>
			<span class="site-title site-title--dark"><?php bloginfo( 'name' ) ?></span>
		<?php endif; ?>
	</a>

	<!-- Mobile toggle -->
	<?php if ( has_nav_menu('main-menu') ) : ?>
		<button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
			<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'emaus' ); ?></span>
			<span class="nav__icon-toggle-bar"></span>
			<span class="nav__icon-toggle-bar"></span>
			<span class="nav__icon-toggle-bar"></span>
		</button>
	<?php endif; ?>	

</div> <!-- .nav__header -->

<!-- Navbar -->
<nav class="nav__wrap collapse navbar-collapse" id="navbar-collapse" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope">
	<?php
		if ( has_nav_menu('main-menu') ) {
			wp_nav_menu( array(
				'theme_location'  => 'main-menu',
				'fallback_cb'			=> '__return_false',
				'container'       => false,
				'menu_class'      => 'nav__menu',
				'walker'          => new Deo_Walker_Nav_Menu()
			) );
		}
	?>
	<?php if ( get_theme_mod( 'deo_header_button_show', false ) ) : ?>
		<div class="nav__btn-holder nav__btn-holder--mobile d-lg-none">			

			<!-- Button -->
			<a <?php if ( get_theme_mod( 'deo_header_button_url', 'https://deothemes.com' ) ) : ?>href="<?php echo esc_url( get_theme_mod( 'deo_header_button_url' ) ); ?>"<?php endif; ?>
			<?php if ( true == get_theme_mod( 'deo_header_button_target', false ) ) : ?>target="_blank"<?php endif; ?>
				class="btn btn--sm btn--color nav__btn">
				<span><?php echo esc_html( get_theme_mod( 'deo_header_button_text', __( 'Try Free', 'emaus' ) ) ); ?></span>
			</a>

		</div>
	<?php endif; ?>

</nav> <!-- end nav-wrap -->

<?php if ( get_theme_mod( 'deo_header_button_show', false ) ) : ?>
	<!-- Nav right -->
	<div class="nav__right d-lg-block d-none">
		<div class="nav__btn-holder">						

			<!-- Button -->
			<a <?php if ( get_theme_mod( 'deo_header_button_url', esc_url( 'https://deothemes.com' ) ) ) : ?>href="<?php echo esc_url( get_theme_mod( 'deo_header_button_url' ) ); ?>"<?php endif; ?>
			<?php if ( true == get_theme_mod( 'deo_header_button_target', false ) ) : ?>target="_blank"<?php endif; ?>
				class="btn btn--sm btn--color nav__btn">
				<span><?php echo esc_html( get_theme_mod( 'deo_header_button_text', esc_html__( 'Purchase', 'emaus' ) ) ); ?></span>
			</a>

		</div>
	</div> <!-- .nav__right -->
<?php endif; ?>