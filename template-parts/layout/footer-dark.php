<?php
/**
 * Template part for displaying Footer
 * Footer One
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */


/**
 * Footer Background Image
 * 
 * In desired file, I will use only $footer_style as style Attribute
 * like: style="<?php echo esc_attr( $footer_style ); ?>"
 * 
 * Used in template-parts/layout/footer-*.php file
 * can be dark or light
 * 
 * @since 1.0.0.37
 */
$default_footer_img = get_template_directory_uri() . '/assets/images/footer-bg.png';
$footer_background           = astha_option( 'astha_footer_image', $default_footer_img );

$footer_style = false;
if( !empty( $footer_background ) ){
    $footer_style = "background-image: url($footer_background);";
}
?>

<div class="footer-wrapper footer-dark-wrapper" style="<?php echo esc_attr( $footer_style ); ?>">
    <?php 
    /**
     * Adding Content at the top of Widget Area
     */
    do_action( 'astha_footer_widget_area_top' ); ?>
    
    <div class="container">
       
        <?php if( is_active_sidebar( 'footer-1' ) ){ ?>
        <div class="footer-widget-wrapper widget-wrap-1">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div><!-- widget-wrap-2 -->
        <?php } ?>
        
        <?php if( is_active_sidebar( 'footer-2' ) ){ ?>
        <div class="footer-widget-wrapper widget-wrap-2">
            <?php dynamic_sidebar( 'footer-2' ); ?>
        </div><!-- widget-wrap-2 -->
        <?php } ?>
        
        <?php if( is_active_sidebar( 'footer-3' ) ){ ?>
        <div class="footer-widget-wrapper widget-wrap-3">
            <?php dynamic_sidebar( 'footer-3' ); ?>
        </div><!-- widget-wrap-3 -->
        <?php } ?>

        <?php if( is_active_sidebar( 'footer-4' ) ){ ?>
        <div class="footer-widget-wrapper widget-wrap-4">
            <?php dynamic_sidebar( 'footer-4' ); ?>
        </div><!-- widget-wrap-4 -->
        <?php } ?>


    </div> <!-- .container -->
    
    <?php 
    /**
     * Adding Content at the bottom of Widget Area
     */
    do_action( 'astha_footer_widget_area_bottom' ); ?>
</div> <!-- .footer-wrapper -->
        

    