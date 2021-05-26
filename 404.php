<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Astha
 */

get_header();

$search_switch = medilac_option( 'medilac_searchbox_switch_404', 'on' );
$_404_text = medilac_option( 'medilac_404_error', __( '404', 'medilac') );
$_404_message = medilac_option( 'medilac_404_error_message', esc_html__( 'Oops! There&rsquo;s not much left here for you', 'medilac' ) );
$search_text = medilac_option( 'medilac_404_search_message', __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'medilac' ) );
?>

	<main id="primary" class="site-main">
                <?php 
                /**
                 * Action Hook for Bottom Side of 404 Error Page
                 * User Able to do anything Here.
                 */
                do_action( 'medilac_404_page_top' );
                $validation_404 = apply_filters( 'medilac_404_content_validation', true );
                if( $validation_404 ){
                ?>
            
		<section class="error-404 not-found">
			<header class="page-header">
                            <p class="error-msg"><?php 
                            $_404_text = ! empty( $_404_text ) ? $_404_text : __( '404', 'medilac');
                            echo esc_html( $_404_text );
                            
                            ?></p>
                            <h1 class="page-title"><?php echo wp_kses_data( $_404_message ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
                            <p class="error-search-text"><?php echo wp_kses_data( $search_text ); ?></p>

					<?php
                                        /**
                                         * Action Hook for Bottom Side of 404 Error Page
                                         * User Able to do anything Here.
                                         */
                                        do_action( 'medilac_404_before_searchbox' );
                                        
                                        
                                        if( class_exists( 'WooCommerce' ) && $search_switch !== 'off' ){
                                            get_product_search_form();
                                        }else{
                                            get_search_form();
                                        }
                                        
                                //Manage Back Home Button
                                $go_back_text = medilac_option( 'medilac_404_back_text', __( 'Go Back Home', 'medilac' ) );
                                $go_back_url = medilac_option( 'medilac_404_back_url', get_home_url() );
                                if( ! empty( $go_back_text ) && ! empty( $go_back_url ) ){        
                                        ?>
                                <p><a href="<?php echo esc_url( $go_back_url ); ?>" class="button"><?php echo esc_html( $go_back_text );?></a></p>
                                <?php
                                }
                                ?>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
                <?php 
                }
                
                
                /**
                 * Action Hook for Bottom Side of 404 Error Page
                 * User Able to do anything Here.
                 */
                do_action( 'medilac_404_page_bottom' ); ?>
	</main><!-- #main -->

<?php
get_footer();
