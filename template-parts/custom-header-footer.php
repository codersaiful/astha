<?php
/**
 * Template part for displaying Header
 * Header Two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */


if ( ! did_action( 'elementor/loaded' ) ) {
    return;
}

if( ! is_numeric( $layout_post_id ) ){
    return;
}


(int) $select_post_id = $layout_post_id;
if ( \Elementor\Plugin::instance()->db->is_built_with_elementor( $select_post_id ) ) {
    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $select_post_id );
}


