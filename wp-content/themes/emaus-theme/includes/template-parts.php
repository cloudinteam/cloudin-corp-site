<?php
/**
 * Template parts.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Emaus
 * @since 		 1.0.0
 */


add_action( 'deo_header', 'deo_header_markup' );
add_action( 'deo_masthead', 'deo_masthead_template' );
add_action( 'deo_comments', 'deo_comments_template' );
add_action( 'deo_page_title_after', 'deo_breadcrumbs' );
add_action( 'deo_entry_featured_image_before', 'deo_breadcrumbs' );
add_action( 'deo_entry_featured_image', 'deo_featured_image_markup' );


/**
 * Get site Header
 */
if ( ! function_exists( 'deo_header_markup' ) ) {
	function deo_header_markup() {
		$header_sticky = ( get_theme_mod( 'deo_sticky_nav_show', true ) ) ? 'nav--sticky ' : '';		
		$header_type = deo_header_type();
		?>	

		<header class="deo-header nav <?php echo esc_attr( $header_type ); ?>" itemtype="https://schema.org/WPHeader" itemscope="itemscope">
			<div class="nav__holder <?php echo esc_attr( $header_sticky ); ?>">
				<div class="nav__container container">
					<div class="nav__flex-parent flex-parent">

						<?php deo_masthead(); ?>

					</div> <!-- .flex-parent -->
				</div> <!-- .nav__container -->
			</div> <!-- .nav__holder -->
		</header> <!-- .deo-header -->		
		
		<?php
	}
}


/**
 * Header main template
 */
if ( ! function_exists( 'deo_masthead_template' ) ) {
	function deo_masthead_template() {
		get_template_part( 'template-parts/header/header-main-template' );
	}
}


/**
 * Comments template
 */
if ( ! function_exists( 'deo_comments_template' ) ) {
	function deo_comments_template() {
	
		if ( comments_open() || get_comments_number() ) : ?>
			<!-- Comments -->
			<?php if ( deo_is_elementor_page() ) : ?>
				<div class="container">
			<?php else: ?>
				<div class="comments-wrap">
			<?php endif; ?>
				<?php comments_template(); ?>
			</div>
		<?php endif;
	}
}


/**
 * Preloader
 */
if ( ! function_exists( 'deo_preloader' ) ) {
	function deo_preloader() {
		if ( get_theme_mod( 'deo_preloader_show', false ) ) : ?>
			<div class="loader-mask">
				<div class="loader">
				</div>
			</div>
		<?php endif;
	}
}

/**
 * Back to top
 */
if ( ! function_exists( 'deo_back_to_top' ) ) {
	function deo_back_to_top() {
		if ( get_theme_mod( 'deo_back_to_top_show', true ) ) : ?>
			<!-- Back to top -->
			<div id="back-to-top">
				<a href="#top"><i class="ui-arrow-up"></i></a>
			</div>
		<?php endif; 
	}
}

/**
 * Content markup top
 */
if ( ! function_exists( 'deo_primary_content_markup_top' ) ) {
	function deo_primary_content_markup_top() {
		?>
			<div class="container">
				<div class="row">
		<?php
	}
}


/**
 * Content markup bottom
 */
if ( ! function_exists( 'deo_primary_content_markup_bottom' ) ) {
	function deo_primary_content_markup_bottom() {
		?>
				</div>
			</div>
		<?php
	}
}


/**
 * Breadcrumbs
 */
if ( ! function_exists( 'deo_breadcrumbs' ) ) {
	function deo_breadcrumbs() {
		if ( ! function_exists( 'bcn_display' ) ) {
			return;
		}

		if ( is_page() && get_theme_mod( 'deo_breadcrumbs_pages_show', false ) ) { ?>
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php bcn_display( false, true, is_rtl() ); ?>
			</div>
			<?php
		}
		
		if ( is_single() && get_theme_mod( 'deo_breadcrumbs_single_post_show', false ) ) { ?>
			<div class="breadcrumbs-wrap">
				<div class="container">			
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
						<?php bcn_display( false, true, is_rtl() ); ?>
					</div>
				</div>
			</div>
			<?php
		}	
	}
}

if ( ! function_exists( 'deo_bcn_settings_defaults' ) ) {
	/**
	* Change Breadcrumb NavXT separator
	*
	* @since 1.0.0
	*/
	function deo_bcn_settings_defaults( $opts ) {	
		$opts['hseparator'] 							= '<i class="ui-arrow-right breadcrumbs__separator"></i>';
		$opts['Hhome_template'] 					= '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to %title%." href="%link%" class="%type%" bcn-aria-current><span property="name">Home</span></a><meta property="position" content="%position%"></span>';
		$opts['Hhome_template_no_anchor'] = '<span class="%type%">Home</span>';
		return $opts;
	}
	add_filter( 'bcn_settings_init', 'deo_bcn_settings_defaults' );
}


if ( ! function_exists( 'deo_featured_image_markup' ) ) {
	/**
	* Entry Featured Image
	*
	* @since 1.0.0
	*/
	function deo_featured_image_markup() {
		?>
		<!-- Featured Image -->
		<div class="blog-featured-img bg-overlay bg-overlay--dark" <?php if ( has_post_thumbnail() ) : ?>style="background-image: url(<?php echo esc_url( the_post_thumbnail_url() ); ?>);"<?php endif; ?>>
			<figure class="blog-featured-img__container d-none">
				<?php the_post_thumbnail( 'emaus_blog_featured_large', array( 'class' => 'blog-featured-img__image' )); ?>
			</figure>

			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6">			

						<header class="single-post__entry-header">
							<?php if ( get_theme_mod( 'deo_single_category_show', true ) ) : ?>
								<?php echo deo_meta_category(); ?>
							<?php endif; ?>
							<h1 class="single-post__entry-title"><?php the_title(); ?></h1>

							<?php if ( get_theme_mod( 'deo_single_date_show', true ) || get_theme_mod( 'deo_single_author_show', true ) ) : ?>
								<div class="entry__meta single-post__entry-meta">

									<?php if ( get_theme_mod( 'deo_single_author_show', true ) ) : ?>
										<?php deo_meta_author(); ?>
									<?php endif; ?>

									<?php if ( get_theme_mod( 'deo_single_date_show', true ) ) : ?>
										<?php deo_meta_date(); ?>
									<?php endif; ?>					

								</div>
							<?php endif; ?>

						</header>

					</div>
				</div>
			</div>
		</div>
		<?php
	}
}


/**
 * MailChimp Newsletter section
 */
if ( ! function_exists( 'deo_newsletter_section' ) ) {
	function deo_newsletter_section() {
		if ( is_active_sidebar( 'deo-newsletter-section' ) && get_theme_mod( 'deo_newsletter_show', true ) ) : ?>
			<section class="newsletter deo-mailchimp-newsletter bg-img bg-overlay relative" style="background-image: url(<?php echo esc_url( get_theme_mod( 'deo_newsletter_background' ) ); ?>);">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6 text-center">

							<?php dynamic_sidebar( 'deo-newsletter-section' ); ?>

						</div>
					</div>
				</div>
			</section>
		<?php endif;
	}
}