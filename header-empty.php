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
$_wc_medilac = '';
$medilac_header = 'header-one';
$topbar_layout = 'topbar-one';
if( medilac_is_woocommerce() ){
    $_wc_medilac = '_wc';
}

$_wc_medilac = isset( $_wc_medilac ) && is_string( $_wc_medilac ) ? $_wc_medilac : false;
$medilac_header = isset( $medilac_header ) && is_string( $medilac_header ) ? $medilac_header : false;
$topbar_layout = isset( $topbar_layout ) && is_string( $topbar_layout ) ? $topbar_layout : false;

$medilac_body_class = isset( $medilac_body_class ) && is_string( $medilac_body_class ) ? $medilac_body_class : '';
$_medilac_classes = array();
$_medilac_classes[] = $_wc_medilac;
$_medilac_classes[] = 'current-' . medilac_option( 'layout_header', $medilac_header, false, $_wc_medilac );
$_medilac_classes[] = 'current-' . medilac_option( 'layout_topbar', $topbar_layout, false, $_wc_medilac );
$_medilac_classes[] = 'current-' . medilac_option( 'layout_footer', false, false, $_wc_medilac );
$_medilac_classes[] = medilac_option( 'layout_sidebar', 'right-sidebar', false, $_wc_medilac );
$_medilac_classes[] = 'breadcrumb-' . medilac_option( 'medilac_breadcrumb_switch', false, false, $_wc_medilac );
$_medilac_classes[] = 'breadcrumb-' . medilac_option( 'medilac_breadcrumb_type', false, false, $_wc_medilac );
$_medilac_classes[] = 'header-sticky-' . medilac_option( 'medilac_header_sticky', 'off' );
$_medilac_classes[] = 'header-' . medilac_option( 'medilac_header_width', 'fluid' );
//$_medilac_classes[] = 'socket-sticky-' . medilac_option( 'medilac_sticky_socket', 'off', false, $_wc_medilac );
if( medilac_is_woocommerce() ){
    $_medilac_classes[] = 'layout-' . medilac_get_shop_layout();//medilac_option( 'layout_shop' . $_wc_medilac, 'layout-grid' );
}

/**
 * In by Default: Topbar will hidden from Mobile Device
 * 
 * If any developer want to show from Child theme or from any plugin
 * Just need to change the class name.
 * Or user able to change by using following 
 * 
 * add_filter( 'medilac_topbar_hide_mobile','__return_false' );
 * 
 * or
 * 
 * add_filter( 'medilac_topbar_hide_mobile','your_function' );
 * 
 * Important: for new name, Need obviously String
 */
$topbar_hide_mobile = apply_filters( 'medilac_topbar_hide_mobile', 'topbar-hide-on-mobile' );

if( is_string( $topbar_hide_mobile ) && ! empty( $topbar_hide_mobile ) ){
    $_medilac_classes[] = $topbar_hide_mobile;
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
$_medilac_classes = apply_filters( 'medilac_body_class', $_medilac_classes );
body_class( $_medilac_classes ); 
?>>
<?php wp_body_open(); ?>
