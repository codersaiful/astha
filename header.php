<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * 
 * **********************
 * at the beggining of theme development, here was classes array
 * which was in body_class($_medilac_classes) and finally we have transferred to inc/template-functions.php
 * Because, we wanted to handle class from function.
 * AND it will help to support custom header, imean: custom header file, which will control from any other plugin
 * and class will stay at body tag
 * @since 1.0.0.59 
 * **********************
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 1.0.0.0
 * @package Astha
 */

/**
 * To identify as Another 
 * of shop or default header, we able to set variable at the top of the file
 */
$_wc_medilac = $custom_header = false;
$medilac_header = 'header-one';
$topbar_layout = 'topbar-one';
if( medilac_is_woocommerce() ){
    $_wc_medilac = '_wc';
}

/**
 * Default Header one is set as default header
 * @default header-one $medilac_header
 */
$header_layout = medilac_option( 'layout_header', $medilac_header, false, $_wc_medilac );
$topbar_layout = medilac_option( 'layout_topbar', $topbar_layout, false, $_wc_medilac ); 

/**
 * Checking Custom Header, If found numeric header from customizer
 * AND
 * custom header class adding at the body tag
 * 
 * @since 1.0.0.44 Actually at 1.0.0.56
 * @by Saiful
 */
if( is_numeric( $header_layout ) ){
    $custom_header = true; //Custom Header is not Activated Yet.
    $header_class = 'custom-header custom-header-' . $header_layout;
}else{
    $header_class = $header_layout;
}


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--	<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <?php 
        $no_scal_responsive = apply_filters( 'medilac_no_scale_responsive', true );
        if( $no_scal_responsive ): ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<?php endif; ?>
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'medilac' ); ?></a>
    <?php
    
    /**
     * Insert Content or Do something at the hiest top of the Site.
     * 
     * @HOOK for Site Top
     */
    do_action( 'medilac_site_top' );
    
    /**
     * Insert Content or Do something at the Before Header of Site.
     * 
     * @HOOK for at Before Header
     */
    do_action( 'medilac_before_header' );
    
    ?>
    <header id="masthead" class="site-header <?php echo esc_attr( $header_class ); ?>">
        
        <?php 
        /**
         * Filter Hook to on/off Logo on Topbar
         * Basically for Sticky Topbar
         * Even Only for Sticky Topbar
         * 
         * @since 1.0.0.53
         * 
         * @return book Only True or False. Noting Elese
         */
        $top_logo = apply_filters( 'medilac_topbar_logo', true );
        
        if( $top_logo ){
        ?>
        <div class="sticky-topbar-logo animate__bounceIn">
        <?php
            /**
             * Logo for Topbar
             * When Sticked Topbar Only
             * 
             * not for other situation
             * 
             * @since 1.0.0.53
             */
            the_custom_logo();
        ?>
        </div> <!-- .sticky-topbar-logo | Sticky Topbar Logo Ended -->
        <?php
        }
        
        get_template_part( 'template-parts/layout/' . $topbar_layout ); 
        /**
         * Insert Content or Do something at Top of  Header of Site.
         * 
         * @HOOK for at Before Header
         */
        do_action( 'medilac_header_top' );
    
        if( ! $custom_header ){
            get_template_part( 'template-parts/layout/' . $header_layout );
            
        }else{
            $layout_post_id = $header_layout;
            include get_theme_file_path('template-parts/custom-header-footer.php');
        }
        
        /**
         * Insert Content or Do something at the Before Header of Site.
         * 
         * @HOOK for at Before Head Bottom Head Menu
         */
        do_action( 'medilac_before_head_bottom_nav' );
        
        /**
         * Bottom Navigation File 
         * Only when Menu set for head_bottom
         * 
         * @package Astha
         */
        if( has_nav_menu( 'head_bottom' ) ){
            //Including Head Bottom Navigation File
            get_template_part( 'template-parts/nav', 'head_bottom' );
        }
        /**
         * Insert Content or Do something at the Before Header of Site.
         * 
         * @HOOK for at Before Header
         */
        do_action( 'medilac_header_bottom' );
        ?>
    </header><!-- #masthead -->
    <?php 
    
    /**
     * Insert Content or Do something at the After Header of Site.
     * 
     * @HOOK for at After Header
     */
    do_action( 'medilac_after_header' );
    
    
    
    /**
     * BreadCrumb Control based on Filter
     * We already disable breadcrumb for Home Page and 404 page
     * Controlled by Hook from bulldozer file of our theme.
     * 
     * @Hooked: medilac_breadcrumb_control 10 lib/bulldozer.php
     */
    $breadcrumb_validation = apply_filters( 'medilac_breadcrumb_show', true );
    if( $breadcrumb_validation ){
        //Including Breadcrumb file
        get_template_part( 'template-parts/header', 'breadcrumb' ); 
    }
    
    /**
     * Insert Content or Do something at the Before Content Area of Site.
     * 
     * @HOOK for at Before Content Area of Site
     */
    do_action( 'medilac_before_content_area' );
    
    ?>
    <div id="page" class="hfeed site medilac-container container">
        
        
    <?php
    /**
     * Insert Content or Do something at the top of Content ARea of Site.
     * 
     * @HOOK for at top Content Area of Site
     */
    do_action( 'medilac_content_area_top' );
