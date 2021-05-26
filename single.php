<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astha
 */

get_header();

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

                        /**
                         * Next/Prev Button on single post
                         * has in conditon
                         * on/off feature.
                         * control by Theme Option/ Customizer
                         * 
                         * @since 1.0.0.61
                         */
                        if( ! empty( medilac_option( 'medilac_blog_nav', 'on' ) ) ){
                            the_post_navigation(
                                    array(
                                            'prev_text' => '<span class="prev-next-post-icon"><i class="fas fa-arrow-left"></i></span><div class="medilac-nav-wrapper prev-post-text"><span class="nav-subtitle">' . esc_html__( 'Previous:', 'medilac' ) . '</span> <span class="nav-title">%title</span></div>',
                                            'next_text' => '<div class="medilac-nav-wrapper next-post-text"><span class="nav-subtitle">' . esc_html__( 'Next:', 'medilac' ) . '</span> <span class="nav-title">%title</span></div><span class="prev-next-post-icon"><i class="fas fa-arrow-right"></i></span>',
                                    )
                            );
                        }
			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
