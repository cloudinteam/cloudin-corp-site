<?php
/**
 * Widget Popular Posts.
 *
 * @package Emaus
 */

class Emaus_Popular_Posts_Widget extends WP_Widget {

	// setup the widget name, description etc.
	function __construct() {
		$widget_options = array(
			'classname'   => esc_attr( "widget-popular-posts" ),
			'description'  => esc_html__( 'Popular Posts Widget', 'deo-core' ),
			'customize_selective_refresh' => true
		);
		parent::__construct( 'emaus_popular_posts', 'Emaus Popular Posts', $widget_options);
	}


	// front-end display of widget
	function widget( $args, $instance ) {
		extract( $args );

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		} else {
			echo '<h4 class="widget-title">' . esc_html__( 'Popular Posts', 'deo-core' ) . '</h4>';
		}

		$query = $this->get_popular_posts( $instance );
		$count = 0;

		if ( $query->have_posts() ) :			

			echo '<ul class="widget-popular-posts__list">';

				while( $query->have_posts() ) : $query->the_post();

					$this->print_posts( $count, $instance );

					$count++;

				endwhile;
			echo '</ul>';

		endif;

		wp_reset_postdata();

		echo $args['after_widget'];

	}


	// back-end display of widget
	function form( $instance ) {

		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => '',
				'total' => '',
				'order' => '',
				'posts_by_id' => '',
				'show_date' => true
			)
		);

		$title = ( ! empty( $instance['title'] ) ? $instance['title'] : esc_attr__( 'Popular Posts', 'deo-core' ) );
		$total = ( ! empty( $instance['total'] ) ? absint( $instance['total'] ) : 3 );
		$order = ( ! empty( $instance['order'] ) ? $instance['order'] : esc_attr( 'meta_value_num' ) );
		$posts_by_id = ( ! empty( $instance['posts_by_id'] ) ? $instance['posts_by_id'] : '' );

		?>
			<!-- Title -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title', 'deo-core' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>

			<!-- Number of posts -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('total') ); ?>"><?php esc_html_e( 'Number or posts', 'deo-core' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'total' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'total' ) ); ?>" type="number" value="<?php echo esc_attr( $total ); ?>">
			</p>

			<!-- Show Date -->
			<p>
				<input class="checkbox" type="checkbox"<?php checked( $instance['show_date'] ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e( 'Show Date', 'deo-core' ); ?></label>
			</p>

			<!-- Order -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('order') ); ?>"><?php esc_html_e( 'Order', 'deo-core' ); ?></label>
				<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>">
					<option value="meta_value_num" <?php selected( $order, 'meta_value_num' ); ?> ><?php echo esc_html( 'Post Views' ); ?></option>
					<option value="date" <?php selected( $order, 'date' ); ?> ><?php echo esc_html( 'Date' ); ?></option>
					<option value="title" <?php selected( $order, 'title' ); ?> ><?php echo esc_html( 'Title' ); ?></option>
					<option value="rand" <?php selected( $order, 'rand' ); ?> ><?php echo esc_html( 'Random' ); ?></option>
					<option value="comment_count" <?php selected( $order, 'comment_count' ); ?> ><?php echo esc_html( 'Number of Comments' ); ?></option>
				</select>
			</p>

			<!-- Posts by ID -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('posts_by_id') ); ?>"><?php esc_html_e( 'Posts by ID\'s', 'deo-core' ); ?></label>
				<p class="help"><?php esc_html_e( 'Paste post ID\'s separated by commas. To find ID, click edit post and you\'ll find it in the browser address bar' ); ?></p>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_by_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_by_id' ) ); ?>" type="text" value="<?php echo esc_attr( $posts_by_id ); ?>" placeholder="ex.: 256, 54, 78">
			</p>

		<?php
	}


	// update of the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : esc_html__( 'Recent Posts', 'deo-core' );
		$instance['order'] = ( ! empty( $new_instance['order'] ) ) ? strip_tags( $new_instance['order'] ) : esc_html( 'meta_value_num' );
		$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? absint( strip_tags( $new_instance['total'] ) ) : 0;
		$instance['show_date'] = (bool)$new_instance['show_date'];
		$instance['posts_by_id'] = ( ! empty( $new_instance['posts_by_id'] ) ) ? strip_tags( $new_instance['posts_by_id'] ) : '';
		return $instance;
	}

	/**
	* Get Popular Posts Query
	*/
	public function get_popular_posts( $instance ) {

		$total = ( ! empty( $instance['total'] ) ? absint( $instance['total'] ) : 3 );
		$order = ( ! empty( $instance['order'] ) ? $instance['order'] : esc_html( 'date' ) );

		$posts_args = array(
			'post_type'      => 'post',
			'posts_per_page' => $total,
			'meta_key'       => '_deo_post_views',
			'orderby'        => $order,
			'order'          => 'DESC',
			'ignore_sticky_posts' => true
		);

		// Post ID's
		if ( ! empty( $instance['posts_by_id'] ) ) {
			$posts_args['post__in'] = array_map( 'intval', explode( ',', $instance['posts_by_id'] ) );
		}

		$posts = new WP_Query( $posts_args );

		if ( $posts->have_posts() ) {
			return $posts;
		}

		return $posts;
	}

	/**
	* Print Posts
	*/
	public function print_posts( $count, $instance ) {
		$classes = 'clearfix';
		$image_size = 'thumbnail';
		if ( $count === 0 ) {
			$classes = 'widget-popular-posts__first-post';
			$image_size = 'emaus_blog_featured_small';
		} ?>
			<li>
				<article <?php post_class( $classes ); ?> itemtype="https://schema.org/Article" itemscope="itemscope">
					<figure class="widget-popular-posts__img-holder">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( $image_size, array('class' => 'widget-popular-posts__img img-fullwidth' ) ); ?>
						</a>
					</figure>
					<div class="widget-popular-posts__entry">
						<?php the_title( sprintf( '<h3 class="widget-popular-posts__entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
						<?php if ( get_theme_mod( 'deo_meta_date_show', true ) && ! empty( $instance['show_date'] ) ) : ?>
							<?php deo_meta_date(); ?>
						<?php endif; ?>
					</div>
				</article>
			</li>
		<?php
	}

}


add_action( 'widgets_init', function() {
	register_widget( 'Emaus_Popular_Posts_Widget' );
});