<?php
/**
 * Masonry grid post layout.
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

<article itemtype="https://schema.org/Article" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<!-- Post thumb -->
		<figure class="entry__img-holder">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'emaus_blog_featured_small', array( 'class' => 'entry__img' ) ); ?>
			</a>
		</figure>
	<?php endif; ?>

	<div class="entry__body">

		<?php if ( get_theme_mod( 'deo_meta_category_show', true ) ) : ?>
			<?php echo deo_meta_category(); ?>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry__title title-underline"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<!-- Excerpt -->
		<div class="entry__excerpt">
			<?php the_excerpt(); ?>
		</div>

		<?php if ( get_theme_mod( 'deo_meta_date_show', true ) || get_theme_mod( 'deo_meta_author_show', true ) ) : ?>
			<footer class="entry__footer-meta">			

				<?php if ( get_theme_mod( 'deo_meta_author_show', true ) ) : ?>
					<?php echo deo_meta_author(); ?>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'deo_meta_date_show', true ) ) : ?>
					<?php deo_meta_date(); ?>
				<?php endif; ?>

			</footer>
		<?php endif; ?>

	</div> <!-- .entry__body -->

</article><!-- #post-## -->