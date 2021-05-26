<?php
/**
 * Template part for displaying Footer Socket
 * Footer Two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

$options = astha_option( 'astha_header_top' );
$social_network = astha_option( 'astha_social' );
$copyright = astha_option( 'astha_footer_copyright' );
$socket_social = astha_option( 'astha_socket_social', 'on' );
?>

<div class="site-info footer-socket">
    <div class="container">
        <div class="footer-socket-main">
            <?php
            if( ! empty( $copyright ) ){
                echo wp_kses_data( $copyright );
            }else{
            ?>
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'astha' ) ); ?>">
                    <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf( esc_html__( 'Proudly powered by %s', 'astha' ), 'WordPress' );
                    ?>
            </a>
            <span class="sep"> | </span>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'astha' ), 'astha', '<a href="https://astha.codeastrology.com/">Saiful Islam</a>' );
                    ?>
            <?php } ?>
        </div>
        
        <?php
        /**
         * If you want to hide Social Link from Footer,
         * Use astha_socket_social_arr filter hook 
         * 
         * link add_filter( 'astha_socket_social_arr, 'return__false' );
         * 
         * @since 1.0.0.37
         */
        $social_network = apply_filters( 'astha_socket_social_arr', $social_network );

        if( $socket_social === 'on' && astha_social_links( $social_network, false ) ){
            ?>
            <div class="footer-socket-social-wrapper">
            <?php
            /**
             * Showing social link
             * 
             * Located in template-functions.php
             */
            astha_social_links( $social_network );
            ?>
            </div>
            <?php
        }
        ?>

    </div>
</div><!-- .site-info -->