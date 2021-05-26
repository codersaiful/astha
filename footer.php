<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Medilac
 */

/**
 * To identify as Another 
 * of shop or default header, we able to set variable at the top of the file
 */
$_wc_medilac = $custom_footer = false;
$medilac_footer = 'footer-dark';
if( medilac_is_woocommerce() ){
    $_wc_medilac = '_wc';
}




?>
<?php
/**
 * Insert Content or Do something at the bottom of Content ARea of Site.
 * 
 * @HOOK for at bottom Content Area of Site
 */
do_action( 'medilac_content_area_bottom' );
?>
</div><!-- #page -->
<?php

/**
 * Insert Content or Do something at the after Header of Site.
 * 
 * @HOOK for at After Content Area of Site
 */
do_action( 'medilac_after_content_area' );
?>
    
<?php
/**
 * Default Header two is set as default header
 * @default footer-dark
 */
$footer_layout = medilac_option( 'layout_footer', $medilac_footer, false, $_wc_medilac ); //Set default Footer

/**
 * Checking Custom Footer, If found numeric header from customizer
 * AND
 * custom footer class adding at the body tag
 * 
 * @since 1.0.0.56
 * @by Saiful
 */
if( is_numeric( $footer_layout ) ){
     $custom_footer = true;

     $footer_class = 'custom-footer custom-footer-' . $footer_layout;
//    $_medilac_classes[] = 'elementor-footer';
//    $_medilac_classes[] = 'custom-footer';
//    $_medilac_classes[] = 'custom-footer-' . $footer_layout;
}else{
    $footer_class = $footer_layout;
//    $_medilac_classes[] = 'current-' . $footer_layout;
}




$footer_1 = is_active_sidebar( 'footer-1' ) ? 1 : 0;
$footer_2 = is_active_sidebar( 'footer-2' ) ? 1 : 0;
$footer_3 = is_active_sidebar( 'footer-3' ) ? 1 : 0;
$footer_4 = is_active_sidebar( 'footer-4' ) ? 1 : 0;
$total_footer_widget = $footer_1 + $footer_2 + $footer_3 + $footer_4;


/**
 * Insert Content or Do something at the Before Footer of Site.
 * 
 * @HOOK for at Footer Top
 */
do_action( 'medilac_before_footer' );

?>
<footer id="footer" class="site-footer <?php echo esc_attr( $footer_class ); ?> available-widgets-<?php echo esc_attr( $total_footer_widget ); ?>">	
    <?php 
    /**
     * Insert Content or Do something at the Before Footer of Site.
     * 
     * @HOOK for at Footer Top
     */
    do_action( 'medilac_footer_top' );

    if ( ! $custom_footer && ( $footer_1 || $footer_2 || $footer_3 || $footer_4 ) ) {
        get_template_part( 'template-parts/layout/' . $footer_layout );
    }else{
        $layout_post_id = $footer_layout;
        include get_theme_file_path('template-parts/custom-header-footer.php');
    }
    
    /**
     * Insert Content or Do something at the Before Header of Site.
     * 
     * @HOOK for at Before Header
     */
    do_action( 'medilac_footer_bottom' );

    $socket_switch = medilac_option( 'medilac_socket_switch', 'on' );
    if( $socket_switch === 'on' && ! $custom_footer ){
        get_template_part( 'template-parts/layout/footer', 'socket' );
    }
    
    /**
     * Insert Content or Do something at the Before Header of Site.
     * 
     * @HOOK for at Before Header
     */
    do_action( 'medilac_after_footer_socket' );
    
    ?>
</footer><!-- #footer -->

<?php 
/**
 * Insert Content or Do something at the Before Header of Site.
 * 
 * @HOOK for at Before Header
 */
do_action( 'medilac_after_footer' );

wp_footer(); 

/**
 * Insert Content or Do something at the hiest top of the Site.
 * 
 * @HOOK for Site Bottom
 */
do_action( 'medilac_site_bottom' );

?>
<!-- Scrollbar -->
<a id="scroll_up"><i class="fas fa-chevron-up"></i></a>
</body>
</html>
