<?php
/**
 * Header of astha theme
 * @package astha
 * @subpackage astha
 * @since astha 1.0
 * */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<?php
/**
 * Hook - buzzpress_header
 *
 * @hooked buzzpress_header - 10
 */
	do_action( 'astha_header' );
?>