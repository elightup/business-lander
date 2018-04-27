<?php
/**
 * Recent posts widget
 * Get recent posts and display in widget
 *
 * @package business-lander
 */

/**
 * Recent posts class.
 */
class Business_Lander_Recent_Posts_Widget extends WP_Widget {
	/**
	 * Default widget options.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Widget setup.
	 */
	public function __construct() {
		$this->defaults = array(
			'title'  => esc_html__( 'Recent Posts', 'business-lander' ),
			'number' => 3,
		);
		parent::__construct(
			'business-lander-recent-posts',
			esc_html__( 'Business Lander: Recent Posts', 'business-lander' ),
			array(
				'description' => esc_html__( 'A widget that displays your recent posts.', 'business-lander' ),
			)
		);
	}

	/**
	 * How to display the widget on the screen.
	 *
	 * @param array $args     Widget parameters.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		$query    = new WP_Query( array(
			'posts_per_page' => absint( $instance['number'] ),
		) );
		if ( ! $query->have_posts() ) {
			return;
		}

		echo $args['before_widget']; // WPCS: XSS OK.

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		if ( $title ) {
			echo $args['before_title'], $title , $args['after_title']; // WPCS: XSS OK.
		}
		?>
		<div class="widget-content">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<article class="aside-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'business-lander-widget-thumbnail' ); ?></a>
					<?php endif; ?>
					<div class="info">
						<h5 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<time class="time" datetime="<?php echo esc_attr( get_the_time() ); ?>"><?php business_lander_posted_on(); ?></time>
					</div>
				</article>
				<?php
			endwhile;
			?>
		</div>
		<?php
		wp_reset_postdata();

		echo $args['after_widget']; // WPCS: XSS OK.
	}

	/**
	 * Update the widget settings.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $old_instance Old widget instance.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = absint( $new_instance['number'] );

		return $instance;
	}

	/**
	 * Widget form.
	 *
	 * @param array $instance Widget instance.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'business-lander' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'business-lander' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo absint( $instance['number'] ); ?>" size="3">
		</p>
		<?php
	}
}
