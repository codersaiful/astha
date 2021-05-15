<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package astha
 */

get_header();
?>

<main id="site-content" class="site-main mt-5">
    <!--breadcumb-->
    <section class="container-fluid breadcumbs">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <?php
				 printf( __( '<h3>Search Results for: %s', 'astha' ), '<span>' . get_search_query() . '</span></h3>' );
				 ?>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) :
						the_post();
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

						// End the loop.
					endwhile;

					// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
            </div>
        </div>
    </div>
</main><!-- #main -->
<?php get_footer();?>