<?php
/**
 * The header for this theme.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php deo_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php deo_head_bottom(); ?>
	<?php wp_head(); ?>	
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<?php do_action( 'wp_body_open' ); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to Content', 'emaus' ) ?></a>

	<?php deo_body_top(); ?>

	<?php deo_preloader() ?>

	<main class="main-content" id="main">
	
		<div class="main-wrapper" id="content">

			<?php deo_header_before(); ?>

			<?php deo_header(); ?>
			
			<?php deo_header_after(); ?>