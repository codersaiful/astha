<?php
/**
 * ADMIN FUNCTIONS
 * Astha Administration Functions Managing 
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @since 1.0.0.46
 * 
 * @package Astha
 */

if( ! function_exists( 'astha_color_arr_return_from_arr' ) ){
    
    /**
     * 
     * @param type $two_dimention_array
     * @return Array
     */
    function astha_color_arr_return_from_arr( $two_dimention_array = false ){
        //If not array, null
        if( ! is_array( $two_dimention_array ) ){
            return;
        }
        
        $colors = array();
        
        //If pass as array, we will convert as One Dimension array
        foreach( $two_dimention_array as $key => $arr_or_val ){
            if( is_string( $arr_or_val ) ){
                $colors[$key] = $arr_or_val;
            }elseif( is_array( $arr_or_val ) ){
                foreach( $arr_or_val as $inner_key => $inner_val ){
                    $colors[$inner_key] = is_string( $inner_val ) ? $inner_val : false;
                }
            }
        }
        
        return $colors;
    }
}

if( ! function_exists( 'astha_elementor_header_footer_saving' ) ){
    
    /**
     * 
     * @param type $two_dimention_array
     * @return Array
     */
    function astha_elementor_header_footer_saving( $datas ){
        if( ! $datas ){
            return;
        }
        $datas = apply_filters( 'astha_custom_header_footer_on_save', $datas );
        update_option( 'astha_custom_header_footer', $datas );
        
    }
}
add_action( 'astha_elementor_header_footer_save', 'astha_elementor_header_footer_saving' );
