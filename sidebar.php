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
 * @Hooked medilac_core_show_department_sidebar 10 from medilac_core plugin - functions.php
 */
$medilac_custom_sidebar = apply_filters( 'medilac_custom_sidebar_bool', false );

/**
 * Handling Common Sidebar
 * from plugin using Plugin
 * If need for any where
 * 
 * @since 1.0.0.67
 * 
 * @Hooked 
 */
$medilac_common_sidebar = apply_filters( 'medilac_common_sidebar_bool', true );

$_wc_medilac = '';
if( medilac_is_woocommerce() ){
    $_wc_medilac = '_wc';
}

if( medilac_option( 'layout_sidebar' , 'right-sidebar', false, $_wc_medilac ) === 'no-sidebar' ){
    return;
}
$medilac_sidebar = 0;

if( is_active_sidebar( 'sidebar' ) ){
   $medilac_sidebar++; 
}
if( is_active_sidebar( 'sidebar-woocommerce' ) ){
   $medilac_sidebar++; 
}
if( $medilac_common_sidebar && is_active_sidebar( 'sidebar-common' ) ){
   $medilac_sidebar++; 
}

//Condition for Custom Side, If enabled by using filter
if( $medilac_custom_sidebar ){
   $medilac_sidebar++; 
}

//sidebar-woocommerce
if ( ! $medilac_sidebar ) {
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
        do_action( 'medilac_sidebar_top' );
        
        if( medilac_is_woocommerce() ){
            
            dynamic_sidebar( 'sidebar-woocommerce' );
            
            /**
             * @Hook Action
             * For after WooCommerce Sidebar
             */
            do_action( 'medilac_sidebar_after_wc' );
        }elseif( $medilac_custom_sidebar ){
            
            do_action( 'medilac_custom_sidebar' );
//            dynamic_sidebar( 'medilac_custom_sidebar' );
            
            /**
             * @Hook Action
             * For after WooCommerce Sidebar
             */
//            do_action( 'medilac_custom_sidebar_after' );
        }else{
            
            dynamic_sidebar( 'sidebar' );
            
            /**
             * @Hook Action
             * For after WooCommerce Sidebar
             */
            do_action( 'medilac_sidebar_after' );
        }
        
        
        /**
         * @Hook Action
         * For Bottom of Sidebar
         */
        do_action( 'medilac_sidebar_before_common' );
        
        /**
         * Handling Common Sidebar
         * from plugin using Plugin
         * If need for any where
         * 
         * @since 1.0.0.67
         */
        if( $medilac_common_sidebar ){

            /**
             * Sidebare Common is for All General WordPress as well as WooCommerce Page
             */
            dynamic_sidebar( 'sidebar-common' );
        }
        
        /**
         * @Hook Action
         * For Bottom of Sidebar
         */
        do_action( 'medilac_sidebar_bottom' );
        ?>
    </div>
</aside><!-- #secondary -->
