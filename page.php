<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package astha
 */

get_header();
?>

	<main id="site-content" class="site-main container">
		<div id="primary" class="content-area mt-3">

			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );
					
				endwhile; // End of the loop.
				?>
		</div><!-- #primary -->
	</main><!-- #main -->
<?php
get_footer();
