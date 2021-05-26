<?php

/**
 * Astha Themes Top Function, which can be use any where of any position of Astha Theme
 * Specially we have use a function name astha_option() function to this file
 * It's should at the top of the Theme
 * 
 * Astha functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @since 1.0.0.19
 * @by Saiful
 * 
 * @package Astha
 */

/**
 * Mobile Detect Module Included
 * If not exist Already, We will add from Our Theme
 * 
 * We have used this Class to detect Device
 * Such: Mobile, Tablet, Desktop ETC
 */
if ( ! class_exists( 'Mobile_Detect' ) ) {
    include get_theme_file_path('lib/module/Mobile_Detect.php');
}

if( ! function_exists( 'astha_get_device_data' ) ){
    
    /**
     * Getting Device Data, 
     * Currently we have used Mobile_Detect Class
     * 
     * @link https://github.com/serbanghita/Mobile-Detect GitHub URL
     * 
     * @return Array Array of Device Data, Where can stay Device Name, Device Type ETC.
     */
    function astha_get_device_data(){
        $data = array('device' => 'desktop');
        $mobile_detect = new Mobile_Detect();

        $is_tablet = $mobile_detect->isTablet();
        $is_mobile = $mobile_detect->isMobile();

        if( $is_tablet ){
            $data['device'] = 'tablet';
        }elseif( $is_mobile ){
            $data['device'] = 'mobile';
        }
        return $data;
    }
}

if( ! function_exists( 'astha_get_device_type' ) ){
    
    /**
     * Getting Device Name, 
     * Currently we have used Mobile_Detect Class
     * 
     * @link https://github.com/serbanghita/Mobile-Detect GitHub URL
     * 
     * @return String Type of Device, Such Tablet, Mobile, Destop ETC
     */
    function astha_get_device_type(){
        $device = astha_get_device_data();
        
        return isset( $device['device'] ) ? $device['device'] : 'undefined';
    }
}


if( ! function_exists( 'astha_option' ) ){
    
    /**
     * Astha Theme's Option Or Page Option
     * Typically get Theme Option/ Theme Mode Value
     * as well as page's option
     * which is manipulate by cmb2 plugin
     * 
     * ***********************
     * ADDED 
     * ***********************
     * * Default return is get_theme_mode() added - V1.0.0.67
     * ***********************
     * 
     * @global type $post Getting info/Object from default
     * @param type $keyword Keyword of Customizer's Theme Option or CMB2's id/Keyword
     * @param type $post_ID To get Value from CMB2
     * @param type $sufix Primarily we have used only one suffix. '_wc' . Actually its come from
     * @return String/Int/Bool
     * 
     * @since 1.0.0.10 Actually added at the begining, not exack version number is this
     */
    function astha_option( $keyword = false, $default = false, $post_ID = false, $sufix = false ){
        global $post;
        if( !$keyword ) return get_theme_mods();
        
        if( $post_ID && !is_numeric( $post_ID ) ){
            return;
        }
        if( !$post_ID && isset( $post ) && isset( $post->ID ) ){
            $post_ID = $post->ID;
        }
        
        $cmb2  = get_post_meta( $post_ID, $keyword, true );
        
        if( !empty( $cmb2 ) && $cmb2 !== 'default' ){
            return apply_filters( 'astha_option', $cmb2, $keyword, $post_ID, $sufix );
        }
        
        $theme_mod = false;
        /**
         * Check Value based on Sufix, If Available
         */
        if( $sufix && ! empty( $sufix ) && is_string( $sufix ) ){
            $theme_mod = get_theme_mod( $keyword . $sufix, false );
        }
        
        /**
         * If not found ThemeMode based on Suffix
         * it will looking at Main default
         */
        if( ! $theme_mod ){
            $theme_mod = get_theme_mod( $keyword, $default );
        }  
        
        return apply_filters( 'astha_option', $theme_mod, $keyword, $post_ID, $sufix );//get_theme_mod( $keyword );
    }
}
if( ! function_exists( 'astha_is_woocommerce' ) ){
    
    /**
     * Astha Theme's Option Or Page Option
     * 
     * @global type $post Getting info/Object from default
     * @param type $keyword Keyword of Customizer's Theme Option or CMB2's id/Keyword
     * @param type $post_ID To get Value from CMB2
     * @param type $sufix Primarily we have used only one suffix. '_wc' . Actually its come from
     * @return String/Int/Bool
     */
    function astha_is_woocommerce(){
        if( ! class_exists( 'WooCommerce' ) || ! function_exists( 'is_woocommerce' ) || ! function_exists( 'is_checkout' ) || ! function_exists( 'is_cart' ) || ! function_exists( 'is_account_page' ) ){
            return false;
        }
        
        if ( is_woocommerce() ) {
            return true;
	} elseif ( is_checkout() ) {
            return true;
	} elseif ( is_cart() ) {
            return true;
	} elseif ( is_account_page() ) {
            return true;
	}
        return false;
    }
}
if( ! function_exists( 'astha_is_not_woocomemrce' ) ){
    
    /**
     * Getting True Bool value for Not found WooCommerce
     * 
     * @return boolean If found WooCommerce Page, Return true
     */
    function astha_is_not_woocomemrce(){
        
        if( astha_is_woocommerce() ){
            return false;
        }
        return true;
    }
}
