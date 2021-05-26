<?php
/**
 * Functions Extra File
 * To Maintain Script Loader for Third-party plugin.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

if( ! function_exists( 'astha_third_party_plugin_supports' ) ){
    
    function astha_third_party_plugin_supports() {
        $base_file = trailingslashit( get_template_directory_uri() . '/assets/css/plugin-supports/' );
        if( class_exists( 'WPT_Product_Table' ) ){
            wp_enqueue_style( 'astha-woo-product-table', $base_file . 'woo-product-table.css', array(), MEDILAC_VERSION );
        }
        
        if( defined( 'YITH_WCWL_INIT' ) ){
            wp_enqueue_style( 'astha-yith-wishlist', $base_file . 'yith-wishlist.css', array(), MEDILAC_VERSION );
        }
        
        if( defined( 'YITH_WCQV_INIT' ) ){
            wp_enqueue_style( 'astha-quick-view', $base_file . 'yith-quick-view.css', array(), MEDILAC_VERSION );
        }
        
        if( class_exists( 'WQPMB_Button' ) ){
            wp_enqueue_style( 'astha-plus-minus-button', $base_file . 'wcqbm.css', array(), MEDILAC_VERSION );
        }
        
        
//        if( class_exists( 'WPT_Product_Table' ) ){
//            wp_enqueue_style( 'astha-woo-product-table', $base_file . 'woo-product-table.css', array(), MEDILAC_VERSION );
//        }
        
        
        //FontAwesome
        //wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/fontawesome.min.css', array(), MEDILAC_VERSION );
        
        //jQuery appear js
        //wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/assets/vendor/js/jquery.appear.js', array('jquery'), MEDILAC_VERSION, true );


    }
    
}
add_action( 'wp_enqueue_scripts', 'astha_third_party_plugin_supports', PHP_INT_MAX );