<?php
class Astha_Widget_Recent_Posts extends WP_Widget {
	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'astha_recent_entries widget_recent_entries',
			'description'                 => __( 'Your site&#8217;s most recent Posts.','astha' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'astha-recent-posts', __( 'Astha Recent Posts','astha' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_entries';
	}
	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts','astha' );
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_comment = isset( $instance['show_comment'] ) ? $instance['show_comment'] : false;
		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent posts.
		 * @param array $instance Array of settings for the current widget.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
				'meta_query' => array( 
					array(
						'key' => '_thumbnail_id'
					) 
				),
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) ) );
            if ($r->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<div class="media">
				<div class="media-left">
					<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail('astha-sidebar-thumbnail');?> 
					</a>
				</div>
				<div class="media-body">
					<ul class="list-inline astha_recent_list">
						<?php if ( $show_date ) : ?>
							<li><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('M j, Y') ?></a>
							</li>
						<?php endif;?>	
						<?php if ( $show_comment ):?>
							<li>
							<a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comment-o" aria-hidden="true"></i>
							<?php
							$comments_number = get_comments_number(); 
							if ( '1' === $comments_number ) {
								/* translators: %s: post title */ 
								printf( _x( 'One Comment &ldquo;%s&rdquo;', 'comments title', 'astha' ), '' ); 
							} 
							else {
								printf( /* translators: 1: number of comments, 2: post title */ _nx( '%1$s Comment &ldquo;%2$s&rdquo;', '%1$s Comments', $comments_number, 'comments title', 'astha' ), number_format_i18n( $comments_number ), '' );
							}

							?>
							</a>
							</li>
						<?php endif;?>	
					</ul>
					<a class="tn_tittle" href="<?php the_permalink(); ?>">
					<?php
						$post_title = get_the_title( $r->ID );
						$title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)','astha' );
						$thetitle = $title; /* or you can use get_the_title() */
						$getlength = strlen($thetitle);
						$thelength = 25;
						echo substr($thetitle, 0, $thelength);
						if ($getlength > $thelength) 
						echo "...";
					?>
					
					</a>
					
				</div>
			</div>
		 <?php endwhile; ?>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();
            endif;
        }
	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_comment'] = isset( $new_instance['show_comment'] ) ? (bool) $new_instance['show_comment'] : false;
		return $instance;
	}
	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_comment = isset( $instance['show_comment'] ) ? (bool) $instance['show_comment'] : false;
?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:','astha' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:','astha' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" 
		name="<?php echo esc_attr($this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php _e( 'Display post date?','astha' ); ?></label></p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_comment ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_comment' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_comment' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_comment' ) ); ?>"><?php _e( 'Display commnet?','astha' ); ?></label></p>
<?php
	}
}
function astha_recent_widget_registration() {
	  register_widget('Astha_Widget_Recent_Posts');  
	}
    add_action('widgets_init', 'astha_recent_widget_registration');