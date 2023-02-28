<?php
/**
 * Single post
 *
 * @package Emaus
 */
?>

<?php 
	$tags_show = get_theme_mod( 'deo_post_tags_show', true );
	$socials_share_show = get_theme_mod( 'deo_post_share_buttons_show', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-post__entry' ); ?>>	
	<div class="entry__article-wrap">

		<!-- Share -->
		<?php if ( function_exists( 'deo_social_sharing_buttons' ) && get_theme_mod( 'deo_post_share_buttons_show', true ) ) : ?>
			<div class="entry__share">
				<?php echo deo_social_sharing_buttons(); ?>
			</div>
		<?php endif; ?>

		<div class="entry__article-content">

			<?php deo_entry_content_top(); ?>

			<div class="entry__article clearfix">
				<?php the_content(); ?>
			</div>

			<?php deo_multi_page_pagination(); ?>

			<?php deo_entry_content_bottom(); ?>

		</div> <!-- .entry__article-content -->	
	</div>
</article><!-- #post-## -->


<?php if ( $tags_show || $socials_share_show ) : ?>
	<div class="row">
		<?php if ( $tags_show ) : ?>
			<div class="<?php if ( $socials_share_show && function_exists( 'deo_social_sharing_buttons' ) ) { echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
				<?php if ( has_tag( $tag ) ) : ?>
					<!-- Tags -->
					<div class="entry__tags">
						<?php the_tags( '', '', '' ); ?>
					</div> <!-- end tags -->
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $socials_share_show && function_exists( 'deo_social_sharing_buttons' ) ) : ?>
			<div class="<?php if ( $tags_show && function_exists( 'deo_social_sharing_buttons' ) ) { echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
				<!-- Share -->
				<div class="entry__share <?php if ( $tags_show ) { echo 'entry__share--right'; } ?>">
					<?php echo deo_social_sharing_buttons(); ?>
				</div>
			</div>
		<?php endif; ?>

	</div>
<?php endif; ?>


<?php if ( get_theme_mod( 'deo_author_box_show', true ) ) {
	deo_author_box();
} ?>

<?php if ( get_theme_mod( 'deo_related_posts_show', true ) && function_exists( 'deo_related_posts') ) {
	deo_related_posts();
} ?>

<?php
	// Comments
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
?>