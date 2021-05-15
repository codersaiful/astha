<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package astha
 */

get_header();
?>

<main id="site-content" class="site-main container mt-4">
    <div id="primary" class="content-area">
        <section class="error-404 not-found text-center">
            <header class="page-header mt-6">
                <h1 class="error-msg"><?php esc_html_e( '404', 'astha' ); ?></h1>
                <h3 class="page-title mt-3 mb-3">
				<?php esc_html_e( 'Oops! There’s not much left here for you', 'astha' ); ?>
                </h3>
            </header><!-- .page-header -->

            <div class="page-content row">
                <div class="col-md-6 offset-3">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'astha' ); ?>
                    </p>
                    <?php
						get_search_form();
						?>
                    <a class="btn btn-default"
                        href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'astha' ); ?></a>
                </div>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </div><!-- #primary -->
</main><!-- #main -->
