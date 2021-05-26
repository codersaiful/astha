<?php
/**
 * Template part for displaying Header
 * Header Two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */
$options = medilac_option( 'medilac_header_top' );
$social_network = medilac_option( 'medilac_social' );
$ph_num = medilac_option( 'medilac_header_top_phone', __( '(800) 123-1245', 'medilac' ) );
$ph_text = medilac_option( 'medilac_header_top_phone_text', __( 'Have any questions? Call Now: (800) 123-1245', 'medilac' ) );
$email = medilac_option( 'medilac_header_top_email', __( 'contact@medilac.com', 'medilac' ) );
?>

<div class="header-top">
    <div class="header-top-wrapper">
        <div class="header_top_left">
            <?php if( !empty( $email ) ) : ?>
            <div class="contact_mail">
                <a href="mailto:<?php echo esc_attr( $email ); ?>"><i class="far fa-envelope"></i><?php echo esc_html( $email ); ?></a>
            </div>
            <?php endif; ?>

            <div class="contact_num">
                <?php if( !empty( $ph_text ) ) : ?>
                <span><?php echo wp_kses_data( $ph_text ); ?></span>
                <?php endif; ?>

                <?php if( !empty( $ph_num ) ) : ?>
                <a href="tel:<?php echo esc_attr( $ph_num ); ?>"><i class="fas fa-phone"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="header_top_right">

            <?php 
            /**
             * Showing social link
             * 
             * Located in template-functions.php
             */
            medilac_social_links( $social_network );

            /**
             * Showing Cal to Action Button or WooCommerce Minicart
             * 
             * Control over Hooked
             * 
             * @Hooked medilac_topbar_right_area -20 Loc: at inc/template-functions.php
             */
            do_action( 'medilac_topbar_right_area', $options ); 
            ?>
        </div>
    </div> <!-- header-top-wrapper -->
</div> <!-- .header-top -->