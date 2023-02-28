<?php
/**
 * Theme admin functions.
 *
 * @package Emaus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Add admin menu
*
* @since 1.0.0
*/
function emaus_theme_admin_menu() {
	add_theme_page(
		__( 'Getting Started', 'emaus' ),
		__( 'Emaus', 'emaus' ),
		'manage_options',
		'getting-started',
		'emaus_admin_page_content',
		30
	);
}
add_action( 'admin_menu', 'emaus_theme_admin_menu' );


/**
* Add admin page content
*
* @since 1.0.0
*/
function emaus_admin_page_content() {
	?>

		<div class="deo-page-header">
			<div class="deo-page-header__container">
				<div class="deo-page-header__branding">
					<img src="<?php echo esc_url( EMAUS_URI . '/assets/admin/img/logo@2x.png' ); ?>" class="deo-page-header__logo" alt="<?php echo esc_attr__( 'Emaus', 'emaus' ); ?>" />
					<span class="deo-theme-version"><?php echo esc_html( EMAUS_VERSION ); ?></span>
				</div>
				<div class="deo-page-header__tagline">
					<span class="deo-page-header__tagline-text"><?php echo esc_html__( 'SaaS App and Startup WordPress Theme', 'emaus' ); ?></span>					
				</div>				
			</div>
		</div>

		<div class="wrap deo-container">
			<div class="deo-grid">

				<div class="deo-grid-content">
					<div class="deo-body">

						<h1 class="deo-title"><?php esc_html_e( 'Getting Started', 'emaus' ); ?></h1>
						<p class="deo-intro-text">
							<?php printf( __('Emaus is now installed and ready to use! Get ready to build something beautiful. Check the <a href="%1$s" target="_blank">Knowledge Base</a> for installation and customization guides. We hope you enjoy it!', 'emaus'),
								esc_url( 'https://docs.deothemes.com/emaus/' ) ); ?>
						</p>
						<h3><?php echo esc_html__( 'What is next?', 'emaus' ); ?></h3>
						<ol>
							<li><?php printf(
								esc_html__( 'Install and activate all the %1$s', 'emaus' ),
								sprintf(
									'<a href="%s">%s</a>',
									esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ),
									esc_html__( 'required plugins', 'emaus' )											
								)
							); ?></li>
							<li>
								<?php if ( class_exists( 'OCDI_Plugin' ) ) : ?>
									<a href="<?php echo esc_url( admin_url( 'themes.php?page=one-click-demo-import' ) ); ?>">
								<?php else : ?>
									<a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>">
								<?php endif; ?>
										<?php echo esc_html__( 'Import demo content', 'emaus' ); ?>
									</a>								
							</li>							
						</ol>

						<h3><?php echo esc_html__( 'Helpful Links', 'emaus' ); ?></h3>
						<ul class="deo-list">
							<li>
								<?php
									/* translators: %1$s: Docs URL. */
									printf(
										esc_html__( 'Check the %1$s for installation and customization guides.', 'emaus' ),
										sprintf(
											'<a href="%s" target="_blank">%s</a>',
											esc_url( 'https://docs.deothemes.com/emaus/' ),
											esc_html__( 'Documentation', 'emaus' )
										)
									);
								?>
							</li>
							<li>
								<?php
									/* translators: %1$s: Customizer URL. */
									printf(
										esc_html__( 'Go to %1$s to modify the look of your site. (requires active Kirki plugin)', 'emaus' ),
										sprintf(
											'<a href="%s" target="_blank">%s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customizer', 'emaus' )
										)
									);
								?>
							</li>
							<li>
								<?php
									/* translators: %1$s: Contact URL. */
									printf(
										esc_html__( 'Need help? %1$s', 'emaus' ),
										sprintf(
											'<a href="%s">%s</a>',
											esc_url( 'https://deothemes.ticksy.com/' ),
											esc_html__( 'Submit a Ticket', 'emaus' )
										)
									);
								?>
							</li>
						</ul>

						<h3><?php echo esc_html__( 'Quick Theme Installation Video Tutorial', 'emaus' ); ?></h3>
						<iframe width="1050" height="562" src="https://www.youtube.com/embed/2q8I3SyZq6c" frameborder="0" allowfullscreen></iframe>
					</div> <!-- .body -->
				</div> <!-- .content -->

			</div> <!-- .grid -->
		</div> <!-- .container -->
	<?php
}


/**
* Display admin notice.
*/
function emaus_admin_notice() {
		if ( get_user_meta( get_current_user_id(), 'emaus_dismissed_notice', true ) ) {
			return;
		}
		
    ?>
    <div class="notice notice-info is-dismissible">
			<p><?php echo wp_kses_post( 'Discover a new <strong>Elementor WordPress theme Everse</strong>. One theme, unlimited possibilities.' ); ?>
				<a href="https://deothemes.com/wordpress-themes/everse-multi-purpose-elementor-wordpress-theme/?utm_source=themes-admin-notification" target="_blank"><?php echo esc_html__( 'Learn More &#187;', 'emaus' ); ?></a>
				<span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;">
					<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'emaus-dismiss', 'dismiss_admin_notices' ), 'emaus-dismiss-' . get_current_user_id() ) ); ?>" class="dismiss-notice" target="_parent">
						<?php echo esc_html__( 'Dismiss', 'emaus' ); ?>
					</a>
				</span>				
			</p>
    </div>
    <?php
}
add_action( 'admin_notices', 'emaus_admin_notice' );


/**
* Register dismissal of admin notices.
*
* Acts on the dismiss link in the admin nag messages.
* If clicked, the admin notice disappears and will no longer be visible to this user.
*
*/
function emaus_admin_dismiss() {
	if ( isset( $_GET['emaus-dismiss'] ) && check_admin_referer( 'emaus-dismiss-' . get_current_user_id() ) ) {
		update_user_meta( get_current_user_id(), 'emaus_dismissed_notice', 1 );
	}
}
add_action( 'admin_head', 'emaus_admin_dismiss' );


if ( ! EMAUS_ENVATO_PURCHASE ) {
	/**
	* Change theme icon
	*
	* @since 1.0.0
	*/
	function emaus_fs_custom_icon() {
		return EMAUS_DIR . '/assets/admin/img/theme-icon.jpg';
	} 
	ema_fs()->add_filter( 'plugin_icon' , 'emaus_fs_custom_icon' );
}