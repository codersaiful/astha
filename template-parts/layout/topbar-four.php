<?php
/**
 * Template part for displaying Header
 * Header Two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */
$options = astha_option('astha_header_top');
$social_network = astha_option( 'astha_social' );
?>

<div class="header-top">
    <div class="header-top-wrapper">
        <div class="header_top_left">
            <?php
            /**
             * Showing social link
             * 
             * Located in template-functions.php
             */
            astha_social_links( $social_network );
            ?>
        </div>
        <div class="header_top_right">
            <?php 
            /**
             * Showing Cal to Action Button or WooCommerce Minicart
             * 
             * Control over Hooked
             * 
             * @Hooked astha_topbar_right_area -20 Loc: at inc/template-functions.php
             */
            do_action( 'astha_topbar_right_area', $options ); 
            ?>
        </div>
    </div> <!-- header-top-wrapper -->
</div> <!-- .header-top -->