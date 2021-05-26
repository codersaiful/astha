<?php
/**
 * Custom comment walker for this theme.
 *
 * @package Medilac
 * @since 1.0.0.17
 */

if ( ! class_exists( 'Medilac_Walker_Comment' ) ) {
	/**
	 * CUSTOM COMMENT WALKER
	 * A custom walker for comments, based on the walker in Twenty Twenty.
	 */
	class Medilac_Walker_Comment extends Walker_Comment {

		/**
		 * Outputs a comment in the HTML5 format.
		 *
		 * @see wp_list_comments()
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author/
		 * @see https://developer.wordpress.org/reference/functions/get_avatar/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
		 * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int        $depth   Depth of the current comment.
		 * @param array      $args    An array of arguments.
		 */
		protected function html5_comment( $comment, $depth, $args ) {

			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

                        //Avater Data
                        $comment_author_url = get_comment_author_url( $comment );
                        $comment_author     = get_comment_author( $comment );
                        $avatar             = get_avatar( $comment, $args['avatar_size'] );
                        
                        //Comment Reply Area Data
                        $comment_reply_link = get_comment_reply_link(
                                array_merge(
                                        $args,
                                        array(
                                                'add_below' => 'div-comment',
                                                'depth'     => $depth,
                                                'max_depth' => $args['max_depth'],
                                                'before'    => '<span class="comment-reply">',
                                                'after'     => '</span>',
                                        )
                                )
                        );
                        $by_post_author = medilac_is_comment_by_post_author( $comment );
			?>
			<<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                                    <div class="user-avatar avatar-comment-<?php comment_ID(); ?>">
                                        <?php
							
                                        if ( 0 !== $args['avatar_size'] ) {
                                                if ( empty( $comment_author_url ) ) {
                                                        echo wp_kses_post( $avatar );
                                                } else {
                                                        printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in https://developer.wordpress.org/reference/functions/get_comment_author_url/
                                                        echo wp_kses_post( $avatar );
                                                }
                                        }

                                        

                                        if ( ! empty( $comment_author_url ) ) {
                                                echo '</a>';
                                        }
                                        ?>
                                    </div> 
                                    <div class="comment-body-content comment-body-content-<?php comment_ID(); ?>">
                                        <?php

					

					

					if ( $comment_reply_link ) {
						?>

						<footer class="comment-footer-meta">

							<?php
                                                        echo $comment_reply_link; 
                                                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Link is escaped in https://developer.wordpress.org/reference/functions/get_comment_reply_link/
							?>

						</footer>

						<?php
					}
					?>
					<footer class="comment-meta">
						<div class="comment-author vcard">
							<?php
							
							if ( 0 !== $args['avatar_size'] ) {
								if ( !empty( $comment_author_url ) ) {
									printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in https://developer.wordpress.org/reference/functions/get_comment_author_url/
								}
							}

							printf(
								'<span class="fn">%1$s</span><span class="screen-reader-text says">%2$s</span>',
								esc_html( $comment_author ),
								__( 'says:', 'medilac' )
							);
                                                        
							if ( ! empty( $comment_author_url ) ) {
								echo '</a>';
							}
                                                        
                                                        if ( $by_post_author ) {
								echo '<span class="by-post-author">' . __( 'Author', 'medilac' ) . '</span>';
							}
							?>
						</div><!-- .comment-author -->

						<div class="comment-metadata">
							<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
								<?php
								/* translators: 1: Comment date, 2: Comment time. */
								$comment_timestamp = sprintf( __( '%1$s at %2$s', 'medilac' ), get_comment_date( '', $comment ), get_comment_time() );
								?>
								<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
									<?php echo esc_html( $comment_timestamp ); ?>
								</time>
							</a>
							<?php
							if ( get_edit_comment_link() ) {
								echo ' <span aria-hidden="true">&bull;</span> <a class="comment-edit-link" href="' . esc_url( get_edit_comment_link() ) . '">' . __( 'Edit', 'medilac' ) . '</a>';
							}
							?>
						</div><!-- .comment-metadata -->

					</footer><!-- .comment-meta -->

					<div class="comment-content comment-entry-content">

						<?php

						comment_text();

						if ( '0' === $comment->comment_approved ) {
							?>
							<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'medilac' ); ?></p>
							<?php
						}

						?>

					</div><!-- .comment-content -->
                                    </div><!-- .comment-body-content -->   
					

				</article><!-- .comment-body -->

			<?php
		}
	}
}
