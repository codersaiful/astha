<?php
/**
 * The template for Displaying Fullwidth template
 * in container
 * 
 * No Sidebar
 * 
 * Page Comment is off - by default
 *
 * This is the template that displays fluid page template.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

/**
 * Template Name: Fullwidth
 */

get_header();

/**
 * Page Template Comment - By Default Disable
 * If any user want to Enable Comment,
 * Just Use
 * add_filter( 'medilac_page_template_comment_show', '__return_true' );
 * 
 * @since 1.0.0.42
 * 
 * @package Astha
 */
$template_page_comment = apply_filters( 'medilac_page_template_comment_show', false );

/**
 * Adding content at the before of the Content for Page
 * Tempalte: Fullwidth
 */
do_action( 'medilac_before_page_template_fullwidth' );
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
                        
                        /**
                         * Adding content at the top of the Content for Page
                         * Tempalte: Fullwidth
                         */
                        do_action( 'medilac_page_template_fullwidth_top' );
                
			get_template_part( 'template-parts/content', 'page' );
                        
                        /**
                         * Adding content at the bottom of the Content for Page
                         * Tempalte: Fullwidth
                         */
                        do_action( 'medilac_page_template_fullwidth_bottom' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( $template_page_comment && ( comments_open() || get_comments_number() ) ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
/**
 * Adding content at the before of the Content for Page
 * Tempalte: Fullwidth
 */
do_action( 'medilac_after_page_template_fullwidth' );

get_footer();
