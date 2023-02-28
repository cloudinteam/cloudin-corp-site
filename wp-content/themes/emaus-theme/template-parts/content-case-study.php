<?php
/**
 * The template for displaying Case Study archive pages.
 *
 * @package Emaus
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study__entry' ); ?> itemscope="itemscope" itemtype="https://schema.org/Article">
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry__img-holder case-study__img-holder">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php
				the_post_thumbnail(
					'emaus_case_study_thumbnail', array(
						'class' => 'entry__img case-study__img',
					)
				); ?>
			</a>
		</figure>						
	<?php endif; ?>

	<div class="case-study__body">

		<div class="entry__categories case-study__categories">
			<?php $terms = get_the_terms( get_the_ID(), 'case_study_categories' );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					echo '<a href="' . esc_url( get_category_link( $term->term_id ) ) . '" class="case-study__category entry-category">' . esc_html( $term->name ) . '</a>';
				}
			} ?>
		</div>
		
		<?php the_title( sprintf( '<h3 class="entry__title case-study__title title-underline"><a href="%s">',
			esc_url( get_permalink() ) ),
			'</a></h3>'
		); ?>		

		<a href="<?php the_permalink(); ?>" class="read-more case-study__read-more link-underline">
			<span class="case-study__read-more-text"><?php echo esc_html__( 'View Case Study', 'emaus' ); ?></span>
		</a>

	</div> <!-- .case_study__body -->

</article>