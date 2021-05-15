<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package astha
 */

get_header();
?>

	<main id="primary" class="site-main">
	
		 <div class="row">
			<?php
				if(get_theme_mod('sidebar')===false){
				  get_sidebar();
				}
			?>
            <div class="col-md-8 pr-3 pl-3 bp-order-1">

                <?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
                <header>
                    <h1 class="page-title screen-reader-text entry-title mb-3">
						<?php single_post_title(); ?>
					</h1>
                </header>
                <?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'archive');

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
            </div>
            <?php
				if(get_theme_mod('sidebar')==true){
				  get_sidebar();
				}
			?>
        </div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
