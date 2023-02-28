<?php
/**
 * Page title for search pages.
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

<!-- Page Title -->
<div class="page-title text-center">
	<div class="container">
		<div class="page-title__outer">
			<div class="page-title__inner">
				<div class="page-title__holder">
					<?php deo_page_title_before(); ?>						
						<h1 class="page-title__title">
							<?php printf( esc_html__( 'Search Results for: %s', 'emaus' ), '<span>' . get_search_query() . '</span>' ); ?>
						</h1>				
					<?php deo_page_title_after(); ?>
				</div>
			</div>
		</div>
	</div>
</div> <!-- .page-title -->