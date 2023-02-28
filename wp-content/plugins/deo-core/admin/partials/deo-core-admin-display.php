<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://deothemes.com
 * @since      1.0.0
 *
 * @package    Deo_Core
 * @subpackage Deo_Core/admin/partials
 */


function deo_core_add_admin_page_content() {
	settings_errors();
	?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Welcome to ElementorKit', 'deo-core' ) ?></h1>
			<form action="options.php" method="POST">
				<?php
				settings_fields( 'deo_core_options_group' );
				do_settings_sections( 'ElementorKit' );
				submit_button();
				?>
			</form>
		</div>
	<?php
}