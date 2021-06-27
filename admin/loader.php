<?php
/**
 * Astha Adminsitration Functions Managing 
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astha
 */

if( ! function_exists( 'astha_capabilities' ) ){
    
    /**
     * Adding Capability to Site for Managing 
     * Theme Options or Theme Options Menu based on 
     * astha_theme_options
     * We will show menu based on this user permission
     */
    function astha_capabilities() {
        $role = get_role( 'administrator' );
        $role->add_cap( 'astha_theme_options' );
    }
}
add_action( 'after_setup_theme', 'astha_capabilities' );

if( ! function_exists( 'astha_menu' ) ){
    
    /**
     * Displaying / Adding A Menu Page for Admin Panel
     * Based on our Added Permission 
     * Constant is: ASTHA_CAPABILITY
     * Decleard at functions.php file
     * 
     * @package Astha
     * @link https://developer.wordpress.org/reference/hooks/admin_menu/
     */
    function astha_menu(){
        // $icon = ASTHA_THEME_URI . 'assets/icons/astha.svg';
        $icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMy4wLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiNmZmZmZmY7fQ0KPC9zdHlsZT4NCjxnPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xMCwwQzQuNDgsMCwwLDQuNDgsMCwxMHM0LjQ4LDEwLDEwLDEwczEwLTQuNDgsMTAtMTBTMTUuNTIsMCwxMCwweiBNNy4yOCw0LjU1YzAtMC4zOSwwLjMyLTAuNywwLjctMC43aDMuNDQNCgkJYzAuMzksMCwwLjcsMC4zMiwwLjcsMC43djIuNzJoMi43M2MwLjM5LDAsMC43LDAuMzIsMC43LDAuN3YzLjQ0YzAsMC4zOS0wLjMyLDAuNy0wLjcsMC43aC0xLjc2Yy0wLjI3LDAuNywwLjA5LDEuOCwwLjQyLDIuMjkNCgkJYy0xLjcyLTEuMDItMS4yMy0yLjkzLTEuMjMtMi45M3MwLDAsMCwwYzAuMTItMC42NSwwLjQyLTEuNDIsMC45OC0yLjMyYy0wLjQ4LDAuMzEtNS42NCwzLjU2LTUuOTgtMi4yNFY0LjU1eiBNOS45NiwxNS41M0g3Ljk4DQoJCWMtMC4zOSwwLTAuNy0wLjMyLTAuNy0wLjd2LTIuNzFINC41N2MtMC4zOSwwLTAuNy0wLjMyLTAuNy0wLjdWNy45N2MwLTAuMzksMC4zMi0wLjcsMC43LTAuN2gyLjI4YzAsMC43NywwLjE0LDUuNTMsMy44NCw3LjUyDQoJCWMwLjUzLDAuMjYsMi4zLDEuMTUsNS4wOSwwLjgzQzE1LjE5LDE1Ljg4LDEzLjI2LDE2LjczLDkuOTYsMTUuNTN6Ii8+DQoJPGNpcmNsZSBjbGFzcz0ic3QwIiBjeD0iOS43NyIgY3k9IjcuNjEiIHI9IjEuNDYiLz4NCjwvZz4NCjwvc3ZnPg0K';

        $capability = ASTHA_CAPABILITY;
        $url = isset( $_SERVER['REQUEST_URI'] ) && !empty( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '';
        $return = urlencode( home_url() . $url );
        add_menu_page( esc_html__( 'Astha', 'astha' ), esc_html__( 'Astha', 'astha' ), $capability, 'astha_welcome', 'astha_welcome', $icon, '59' );
        add_submenu_page( 'astha_welcome', esc_html__( 'Welcome to Astha', 'astha' ), esc_html__( 'Welcome', 'astha' ), $capability, 'astha_welcome', 'astha_welcome', 0 );
        add_submenu_page('astha_welcome', '', esc_html__( 'Install Plugin', 'astha' ), $capability, admin_url( 'themes.php?page=astha-required-plugins' ) );
        add_submenu_page('astha_welcome', '', esc_html__( 'Theme Options', 'astha' ), $capability, 'customize.php?return=' . $return );
        if( defined( 'PT_OCDI_PATH' ) ){
            add_submenu_page('astha_welcome', '', esc_html__( 'Demo Import', 'astha' ), $capability, 'themes.php?page=astha-demo-import' );
            add_submenu_page('astha_welcome', '', esc_html__( 'Manual Import', 'astha' ), $capability, 'themes.php?page=astha-demo-import&import-mode=manual' );
        }
        //add_submenu_page('astha_welcome', '', esc_html__( 'Setting Backup & Update', 'astha' ), $capability, 'astha-settings-backup', 'astha_settings_backup' );
        add_submenu_page('astha_welcome', '', esc_html__( 'Color Palette', 'astha' ), $capability, 'astha-color-palette', 'astha_color_palette' );
        
//        //ENVATO_MARKET_SLUG
//        if( defined( 'ENVATO_MARKET_SLUG' ) ){
//            add_submenu_page('astha_welcome', '', esc_html__( 'Envato Market', 'astha' ), $capability, 'admin.php?page=envato-market' );
//        }else{
//            add_submenu_page('astha_welcome', '', esc_html__( 'Envato Market', 'astha' ), $capability, 'astha-envato-market', 'astha_envato_market' );
//        }
        
        //Documentation Page Link
        add_submenu_page('astha_welcome', '', esc_html__( 'Documentation', 'astha' ), $capability, 'https://docs.medilac.codeastrology.com/' );
        add_submenu_page('astha_welcome', '', esc_html__( 'Support/Topic', 'astha' ), $capability, 'https://wordpress.org/support/theme/astha/' );
        add_submenu_page('astha_welcome', '', esc_html__( 'Support', 'astha' ), $capability, 'https://codeastrology.com/support' );
        
    }
}
add_action( 'admin_menu', 'astha_menu' );


if( ! function_exists( 'astha_welcome' ) ){
    
    /**
     * Adding Capability to Site for Managing 
     * Theme Options or Theme Options Menu based on 
     * astha_theme_options
     * We will show menu based on this user permission
     * 
     * @package Astha
     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
     */
    function astha_welcome() {
        include __DIR__ . '/welcome.php';
    }
}

if( ! function_exists( 'astha_demo_import' ) ){
    
    /**
     * Adding Capability to Site for Managing 
     * Theme Options or Theme Options Menu based on 
     * astha_theme_options
     * We will show menu based on this user permission
     * 
     * @package Astha
     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
     */
    function astha_demo_import() {

        if( defined( 'PT_OCDI_PATH' ) ){
            include_once __DIR__ . '/pages/one-click.php';
        }else{
            include_once __DIR__ . '/pages/no-found-oneclickdemo.php';
        }
    }
}

/**
 * Enqueue scripts and styles.
 */
function astha_admin_scripts() {
	wp_enqueue_style( 'astha-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), ASTHA_VERSION );
	
}
add_action( 'admin_enqueue_scripts', 'astha_admin_scripts' );

//if( ! function_exists( 'astha_settings_backup' ) ){
//    
//    /**
//     * Setting Page And Backup
//     * 
//     * @package Astha
//     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
//     */
//    function astha_settings_backup() {
//        include __DIR__ . '/pages/settings_backup.php';
//    }
//}

if( ! function_exists( 'astha_color_palette' ) ){
    
    /**
     * Managing Color Palette
     * 
     * By this Function, We will handle Customizer 's Color Field
     * File included here, Available in page/color-palette
     * 
     * @perpose Will be Available few Color Palette. Generated by us. And user able to use any palette and and Customizer color will be change
     * 
     * @package Astha
     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
     */
    function astha_color_palette() {
        include __DIR__ . '/pages/color-palette.php';
    }
}
if( ! function_exists( 'astha_custom_header_footer' ) ){
    
    /**
     * Custom Header Footer 
     * Which will manage from Elementor
     * Template
     * 
     * @package Astha
     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
     */
    function astha_custom_header_footer() {
        include __DIR__ . '/pages/header-footer.php';
    }
}
if( ! function_exists( 'astha_envato_market' ) ){
    
    /**
     * Custom Header Footer 
     * Which will manage from Elementor
     * Template
     * 
     * @package Astha
     * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
     */
    function astha_envato_market() {
        include __DIR__ . '/pages/envato-market.php';
    }
}

/**
 * One Click Demo Installer
 * Hook and Action Manage from one-click-demo.php file
 * 
 * @since 1.0.0.40
 */
include __DIR__ . '/one-click-demo.php';

/**
 * All type filter and Action for Admin Section
 * for our Theme
 * We will use this file
 * 
 * First time, I started this file To do
 * page option of cmb2 will hide if blog page or if front page
 * 
 * We will also hide that for shop page, 
 * 
 * @since 1.0.0.46
 */
include __DIR__ . '/functions.php';
