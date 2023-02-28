<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package Emaus
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'deo-page-sidebar' ) ) {
	return;
}
?>

<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area" role="complementary">

	<?php deo_sidebar_before(); ?>

	<?php dynamic_sidebar( 'deo-page-sidebar' ); ?>

	<?php deo_sidebar_after(); ?>

</div><!-- #secondary -->
