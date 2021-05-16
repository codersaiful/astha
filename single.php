<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package astha
 */

get_header();
?>

	<main id="site-content" class="site-main container mt-5">
		<div id="primary" class="content-area">
			<div class="row">
				<div class="col-md-8 pr-3 pl-3">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single' );

					if ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation(
							array(
								'next_text' => '<span class="next-post">' . __( 'Next post:', 'astha' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="previous-post">' . __( 'Previous post:', 'astha' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							)
						);
					}
					?>
					
					<?php // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
		
					<?php 
					endwhile; // End of the loop.
					?>
				</div>
				<!--/col-md-8-->
				<?php
				 get_sidebar();
				?>
			</div>
		
        <!--/Row-->     
    </div><!-- #primary -->
</main><!-- #main -->

<?php
get_footer();
