<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Medilac
 */

if ( ! function_exists( 'medilac_blog_layout' ) ) :
	
    
        /**
         * Getting Blog Layout type
         * can be default, where blog will be full width
         * and can be: grid, where blog loop will be in grid layout
         * 
         * @since 1.0.0.62
         * @by Saiful
         * @date 30.3.2021
         * 
         * @return string default|grid
         */
	function medilac_blog_layout() {
            return medilac_option( 'medilac_blog_layout' );
	}
endif;

if ( ! function_exists( 'medilac_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function medilac_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
                
                $year  = get_the_time( 'Y' ); 
                $month = get_the_time( 'm' ); 
                $day   = get_the_time( 'd' );      
                $permalink = get_day_link( $year, $month, $day );
                
                
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'medilac' ),
			'<a href="' . esc_url( $permalink ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="far fa-calendar-alt"></i>' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'medilac_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function medilac_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'medilac' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"><i class="fas fa-user"></i>' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'medilac_taxonomy_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function medilac_taxonomy_by() {
		if ( 'post' === get_post_type() ) {
                    $blog_meta_tax = apply_filters( 'medilac_blog_meta_taxonomy', 'cat' );
                    $taxonomy_list = false;
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'medilac' ) );
			if ( $categories_list && $blog_meta_tax == 'cat' ) {
				$taxonomy_list = $categories_list;
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'medilac' ) );
			if ( $tags_list && $blog_meta_tax == 'tag' ) {
                            $taxonomy_list = $tags_list;
			}
                        
                        if( $taxonomy_list ){
                            printf( '<span class="tax-links"><i class="far fa-folder-open"></i>' . esc_html__( '%1$s', 'medilac' ) . '</span>', $taxonomy_list );
                        }
                        
		}

	}
endif;

// if( ! function_exists( 'medilac_comment_link' ) ) :
// 	/**
// 	 * Prints the total comment number and links to there. 
// 	 */
// 	function medilac_comment_link() {
// 		if( 'post' === get_post_type() ) {

// 		}
// 	}
// endif;

if ( ! function_exists( 'medilac_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function medilac_entry_footer() {
    
            /**
             * Tax link
             * such: Category Link Or
             * Tag link showing 
             * Validation 
             * using Filter: medilac_entry_footer_tax_link
             */
            $tax_link = apply_filters( 'medilac_entry_footer_tax_link', true );
            // Hide category and tag text for pages.
            if ( 'post' === get_post_type() && $tax_link ) {
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ' ', 'medilac' ) );

                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'medilac' ) );
                if ( $tags_list ) {
                        /* translators: 1: list of tags. */
                        printf( '<span class="tags-links" title="' . esc_attr__( 'Tags:' ) . '">' . esc_html__( '%1$s', 'medilac' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }elseif ( $categories_list ) {
                        /* translators: 1: list of categories. */
                        printf( '<span class="cat-links" title="' . esc_attr__( 'Catagories:' ) . '">' . esc_html__( 'In %1$s', 'medilac' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }
                
                /**
                 * Adding Share Button
                 * At the bottom of Post
                 * 
                 * @Hooked: medilac_social_share -10 at inc/template-functions.php file
                 * 
                 * used: add_action( 'medilac_share', 'medilac_social_share' );
                 * To removed Social Share at Post,
                 * Just use
                 * remove_action( 'medilac_share', 'medilac_social_share' );
                 */
                do_action( 'medilac_share' );
                
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'medilac' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'medilac' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'medilac_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function medilac_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

                        <?php
                        $thumb_size = 'post-thumbnail';
                        
                        if( ! empty( medilac_option( 'medilac_blog_posted_on', 'on' ) ) && medilac_blog_layout() == 'grid' ){
                            $thumb_size = 'medilac-thumbnail';
                        }
                        $thumb_size = apply_filters( 'medilac_post_thumbnail', $thumb_size );
                        ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						$thumb_size,//'post-thumbnail'
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);

                                        /**
                                         * Posted on inside Thumbnail image
                                         * on Blog Page and when is not single
                                         * page, Even when enabled from customizer
                                         * 
                                         * @since 1.0.0.62
                                         */
                                        if( ! empty( medilac_option( 'medilac_blog_posted_on', 'on' ) ) && medilac_blog_layout() == 'grid' ){
                                            ?>
                                            <span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>    
                                            <?php
                                        }
                                ?>
			</a>
                        
			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Checks if the specified comment is written by the author of the post commented on.
 *
 * @param object $comment Comment data.
 * @return bool
 */
function medilac_is_comment_by_post_author( $comment = null ) {

	if ( is_object( $comment ) && $comment->user_id > 0 ) {

		$user = get_userdata( $comment->user_id );
		$post = get_post( $comment->comment_post_ID );

		if ( ! empty( $user ) && ! empty( $post ) ) {

			return $comment->user_id === $post->post_author;

		}
	}
	return false;

}


/**
 * WordPress Breadcrumb for Medilac Theme
 * 
 * Credit decleared at Link
 * 
 * @link https://github.com/ahmedhere/wp-breadcrumb-function 
 * 
 * 
 * @global type $post
 * @global type $author
 * @return void
 */
function medilac_breadcrumb() {
    $separator = apply_filters( 'medilac_breadcrumb_separator', '' );
    $wooBreadCumb = apply_filters( 'medilac_wc_breadcrumb', true );
    
    /**
     * First We will try to load Woocommerce Default Breadcrumb
     * Because, WooComemrce has a Nice Breadcrumb System
     * 
     * WooCommerce Plugin -> Includes -> wc-template-functions.php
     */
    if( $wooBreadCumb && function_exists( 'woocommerce_breadcrumb' ) ){
        $args = array(
            'delimiter' => '<span>&nbsp;' . $separator . '&nbsp;</span>',
        );
        $args = apply_filters( 'medilac_wc_breadcrumb_args', $args );
        woocommerce_breadcrumb( $args );
        return true;
    }
    
    // Check if is front/home page, return
    if ( is_front_page() ) {
      return;
    }

    // Define
    global $post;
    $custom_taxonomy  = ''; // If you have custom taxonomy place it here

    $defaults = array(
        'seperator'   =>  $separator,//'&#187;',
        'id'          =>  'medilac-breadcrumb',
        'classes'     =>  'medilac-breadcrumb',
        'home_title'  =>  esc_html__( 'Home', 'medilac' )
    );
    
    $sep = '';
    if( ! empty( $separator )){
        $sep  = '<li class="seperator">'. esc_html( $defaults['seperator'] ) .'</li>';
    }
    

    // Start the breadcrumb with a link to your homepage
    echo '<ul id="'. esc_attr( $defaults['id'] ) .'" class="'. esc_attr( $defaults['classes'] ) .'">';

    // Creating home link
    echo '<li class="item"><a href="'. get_home_url() .'">'. esc_html( $defaults['home_title'] ) .'</a></li>' . $sep;

        if ( is_single() ) {

          // Get posts type
          $post_type = get_post_type();

          // If post type is not post
          if( $post_type != 'post' ) {

                $post_type_object   = get_post_type_object( $post_type );
                $post_type_link     = get_post_type_archive_link( $post_type );

                echo '<li class="item item-cat"><a href="'. $post_type_link .'">'. $post_type_object->labels->name .'</a></li>'. $sep;

          }

          // Get categories
          $category = get_the_category( $post->ID );

          // If category not empty
          if( !empty( $category ) ) {

                // Arrange category parent to child
                $category_values      = array_values( $category );
                $get_last_category    = end( $category_values );
                // $get_last_category    = $category[count($category) - 1];
                $get_parent_category  = rtrim( get_category_parents( $get_last_category->term_id, true, ',' ), ',' );
                $cat_parent           = explode( ',', $get_parent_category );

                // Store category in $display_category
                $display_category = '';
                foreach( $cat_parent as $p ) {
                    $display_category .=  '<li class="item item-cat">'. $p .'</li>' . $sep;
                }

          }

          // If it's a custom post type within a custom taxonomy
          $taxonomy_exists = taxonomy_exists( $custom_taxonomy );

          if( empty( $get_last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists ) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

          }

            // Check if the post is in a category
            if( !empty( $get_last_category ) ) {

                echo $display_category;
                echo '<li class="item item-current">'. get_the_title() .'</li>';

            } else if( !empty( $cat_id ) ) {

                echo '<li class="item item-cat"><a href="'. $cat_link .'">'. $cat_name .'</a></li>' . $sep;
                echo '<li class="item-current item">'. get_the_title() .'</li>';

            } else {

                echo '<li class="item-current item">'. get_the_title() .'</li>';

            }

    } else if( is_archive() ) {

            if( is_tax() ) {
                // Get posts type
                $post_type = get_post_type();

                // If post type is not post
                if( $post_type != 'post' ) {

                  $post_type_object   = get_post_type_object( $post_type );
                  $post_type_link     = get_post_type_archive_link( $post_type );

                  echo '<li class="item item-cat item-custom-post-type-' . $post_type . '"><a href="' . $post_type_link . '">' . $post_type_object->labels->name . '</a></li>' . $sep;

                }

                $custom_tax_name = get_queried_object()->name;
                echo '<li class="item item-current">'. $custom_tax_name .'</li>';

            } else if ( is_category() ) {

                $parent = get_queried_object()->category_parent;

                if ( $parent !== 0 ) {

                    $parent_category = get_category( $parent );
                    $category_link   = get_category_link( $parent );

                    echo '<li class="item"><a href="'. esc_url( $category_link ) .'">'. $parent_category->name .'</a></li>' . $sep;

                }

                echo '<li class="item item-current">'. single_cat_title( '', false ) .'</li>';

            } else if ( is_tag() ) {

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item">'. $get_term_name .'</li>';

            } else if( is_day() ) {

                // Day archive

                // Year link
                echo '<li class="item-year item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></li>' . $sep;

                // Month link
                echo '<li class="item-month item"><a href="'. get_month_link( get_the_time('Y'), get_the_time('m') ) .'">'. get_the_time('M') .' Archives</a></li>' . $sep;

                // Day display
                echo '<li class="item-current item">'. get_the_time('jS') .' '. get_the_time('M'). ' Archives</li>';

            } else if( is_month() ) {

                // Month archive

                // Year link
                echo '<li class="item-year item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></li>' . $sep;

                // Month Display
                echo '<li class="item-month item-current item">'. get_the_time('M') .' Archives</li>';

            } else if ( is_year() ) {

                // Year Display
                echo '<li class="item-year item-current item">'. get_the_time('Y') .' Archives</li>';

          } else if ( is_author() ) {

                // Auhor archive

                // Get the author information
                global $author;
                $userdata = get_userdata( $author );

                // Display author name
                echo '<li class="item-current item">'. 'Author: '. $userdata->display_name . '</li>';

            } else {

                echo '<li class="item item-current">'. post_type_archive_title() .'</li>';

            }

    } else if ( is_page() ) {

        // Standard page
        if( $post->post_parent ) {

        // If child page, get parents
        $anc = get_post_ancestors( $post->ID );

        // Get parents in the right order
        $anc = array_reverse( $anc );

        // Parent page loop
        if ( !isset( $parents ) ) $parents = null;
        foreach ( $anc as $ancestor ) {

          $parents .= '<li class="item-parent item"><a href="'. get_permalink( $ancestor ) .'">'. get_the_title( $ancestor ) .'</a></li>' . $sep;

        }

        // Display parent pages
        echo $parents;

        // Current page
        echo '<li class="item-current item">'. get_the_title() .'</li>';

      } else {

        // Just display current page if not parents
        echo '<li class="item-current item">'. get_the_title() .'</li>';

      }

    } else if ( is_search() ) {

        // Search results page
        echo '<li class="item-current item">Search results for: '. get_search_query() .'</li>';

    } else if ( is_404() ) {

        // 404 page
        echo '<li class="item-current item">' . 'Error 404' . '</li>';

    }

    // End breadcrumb
    echo '</ul>';

}