<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astha
 */

/**
 * To identify as Another 
 * of shop or default header, we able to set variable at the top of the file
 */
$_wc_astha = '';
$astha_header = 'header-one';
$topbar_layout = 'topbar-one';
if( astha_is_woocommerce() ){
    $_wc_astha = '_wc';
}

$_wc_astha = isset( $_wc_astha ) && is_string( $_wc_astha ) ? $_wc_astha : false;
$astha_header = isset( $astha_header ) && is_string( $astha_header ) ? $astha_header : false;
$topbar_layout = isset( $topbar_layout ) && is_string( $topbar_layout ) ? $topbar_layout : false;

$astha_body_class = isset( $astha_body_class ) && is_string( $astha_body_class ) ? $astha_body_class : '';
$_astha_classes = array();
$_astha_classes[] = $_wc_astha;
$_astha_classes[] = 'current-' . astha_option( 'layout_header', $astha_header, false, $_wc_astha );
$_astha_classes[] = 'current-' . astha_option( 'layout_topbar', $topbar_layout, false, $_wc_astha );
$_astha_classes[] = 'current-' . astha_option( 'layout_footer', false, false, $_wc_astha );
$_astha_classes[] = astha_option( 'layout_sidebar', 'right-sidebar', false, $_wc_astha );
$_astha_classes[] = 'breadcrumb-' . astha_option( 'astha_breadcrumb_switch', false, false, $_wc_astha );
$_astha_classes[] = 'breadcrumb-' . astha_option( 'astha_breadcrumb_type', false, false, $_wc_astha );
$_astha_classes[] = 'header-sticky-' . astha_option( 'astha_header_sticky', 'off' );
$_astha_classes[] = 'header-' . astha_option( 'astha_header_width', 'fluid' );
//$_astha_classes[] = 'socket-sticky-' . astha_option( 'astha_sticky_socket', 'off', false, $_wc_astha );
if( astha_is_woocommerce() ){
    $_astha_classes[] = 'layout-' . astha_get_shop_layout();//astha_option( 'layout_shop' . $_wc_astha, 'layout-grid' );
}

/**
 * In by Default: Topbar will hidden from Mobile Device
 * 
 * If any developer want to show from Child theme or from any plugin
 * Just need to change the class name.
 * Or user able to change by using following 
 * 
 * add_filter( 'astha_topbar_hide_mobile','__return_false' );
 * 
 * or
 * 
 * add_filter( 'astha_topbar_hide_mobile','your_function' );
 * 
 * Important: for new name, Need obviously String
 */
$topbar_hide_mobile = apply_filters( 'astha_topbar_hide_mobile', 'topbar-hide-on-mobile' );

if( is_string( $topbar_hide_mobile ) && ! empty( $topbar_hide_mobile ) ){
    $_astha_classes[] = $topbar_hide_mobile;
}


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php
$_astha_classes = apply_filters( 'astha_body_class', $_astha_classes );
body_class( $_astha_classes ); 
?>>
<?php wp_body_open(); ?>
