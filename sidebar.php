<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astha
 */

/**
 * Custom Sidebar Boolean
 * 
 * @Hooked astha_core_show_department_sidebar 10 from astha_core plugin - functions.php
 */
$astha_custom_sidebar = apply_filters( 'astha_custom_sidebar_bool', false );

/**
 * Handling Common Sidebar
 * from plugin using Plugin
 * If need for any where
 * 
 * @since 1.0.0.67
 * 
 * @Hooked 
 */
$astha_common_sidebar = apply_filters( 'astha_common_sidebar_bool', true );

$_wc_astha = '';
if( astha_is_woocommerce() ){
    $_wc_astha = '_wc';
}

if( astha_option( 'layout_sidebar' , 'right-sidebar', false, $_wc_astha ) === 'no-sidebar' ){
    return;
}
$astha_sidebar = 0;

if( is_active_sidebar( 'sidebar' ) ){
   $astha_sidebar++; 
}
if( is_active_sidebar( 'sidebar-woocommerce' ) ){
   $astha_sidebar++; 
}
if( $astha_common_sidebar && is_active_sidebar( 'sidebar-common' ) ){
   $astha_sidebar++; 
}

//Condition for Custom Side, If enabled by using filter
if( $astha_custom_sidebar ){
   $astha_sidebar++; 
}

//sidebar-woocommerce
if ( ! $astha_sidebar ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar" itemtype="https://schema.org/WPSideBar">
    <div class="inside-right-sidebar">
        <?php 
        /**
         * @Hook Action
         * For Top of Sidebar
         */
        do_action( 'astha_sidebar_top' );
        
        if( astha_is_woocommerce() ){
            
            dynamic_sidebar( 'sidebar-woocommerce' );
            
            /**
             * @Hook Action
             * For after WooCommerce Sidebar
             */
            do_action( 'astha_sidebar_after_wc' );
        }elseif( $astha_custom_sidebar ){
            
            do_action( 'astha_custom_sidebar' );
//            dynamic_sidebar( 'astha_custom_sidebar' );
            
            /**
             * @Hook Action
             * For after WooCommerce Sidebar
             */
//            do_action( 'astha_custom_sidebar_after' );
        }else{
            
            dynamic_sidebar( 'sidebar' );
            
            /**
             * @Hook Action
             * For after WooCommerce Sidebar
             */
            do_action( 'astha_sidebar_after' );
        }
        
        
        /**
         * @Hook Action
         * For Bottom of Sidebar
         */
        do_action( 'astha_sidebar_before_common' );
        
        /**
         * Handling Common Sidebar
         * from plugin using Plugin
         * If need for any where
         * 
         * @since 1.0.0.67
         */
        if( $astha_common_sidebar ){

            /**
             * Sidebare Common is for All General WordPress as well as WooCommerce Page
             */
            dynamic_sidebar( 'sidebar-common' );
        }
        
        /**
         * @Hook Action
         * For Bottom of Sidebar
         */
        do_action( 'astha_sidebar_bottom' );
        ?>
    </div>
</aside><!-- #secondary -->
