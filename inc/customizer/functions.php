<?php
/**
 * All Functions List, Which is Used at Customizer
 * Astha Theme Customizer
 *
 * @package Astha
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function astha_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function astha_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function astha_customize_preview_js() {
        //Customizer javascript file for sky Script
	//wp_enqueue_script( 'astha-customizer-preview', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), MEDILAC_VERSION, true );
	
    //Generated by Underscore
    wp_enqueue_script( 'astha-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), MEDILAC_VERSION, true );
    //$MEDILAC_CUSTOMIZER = get_theme_mods();
    //$MEDILAC_CUSTOMIZER = apply_filters( 'astha_customizer_data', $MEDILAC_CUSTOMIZER );
    //wp_localize_script( 'astha-customizer', 'MEDILAC_CUSTOMIZER', $MEDILAC_CUSTOMIZER );
}
add_action( 'customize_preview_init', 'astha_customize_preview_js' );


if( ! function_exists( 'astha_sanitize_text_field' ) ){
    
    /**
     * For Empty String, Return False.
     * 
     * @param type $str
     * @return String/False
     */
    function astha_sanitize_text_field( $str ) {
	$filtered = _sanitize_text_fields( $str, false );
	return !empty( $filtered ) ? $filtered : false;
    }
}

if( ! function_exists( 'astha_font_name_santize' ) ){
    
    function astha_font_name_santize( $input ){
        return is_string( $input ) && !empty( $input ) ? $input : false;
    }
}

if( ! function_exists( 'astha_string_sanitize' ) ){
    
    function astha_string_sanitize( $input ){
        return is_string( $input ) && !empty( $input ) ? $input : false;
    }
}


if( ! function_exists( 'astha_advance_choice_convert' ) ){
    
    /**
     * For Advance Type Select Customizer, need customized choice array,
     * I have used this function to convert Advance type select Array from Normal
     * 
     * Actually why I have used normal customizer array and then convert by this function
     * 
     * Actually same array has used in different place.
     * such: for cmb2, also for customizer also for Advance Customizer
     * 
     * 
     * @param type $choices
     * @return String
     */
    function astha_advance_choice_convert( $choices = false ){
        $converted = array();
        if( ! is_array( $choices ) ){
            return false;
        }
        
        foreach( $choices as $key => $value ){

//            $converted[$key] = array(
//                'image' => esc_url( trailingslashit( MEDILAC_CUSTOMIZER_URI ) . 'assets/images/' . $key . '.png' ),
//                'name'  => esc_html( $value )
//            );
            $converted[$key]['name'] = esc_html( $value );
            
            /**
             * Checking Image File Available or not in That Folder
             */
            if( is_file( MEDILAC_THEME_DIR . 'inc/customizer/assets/images/' . $key . '.png' ) ){
                $converted[$key]['image'] = esc_url( trailingslashit( MEDILAC_CUSTOMIZER_URI ) . 'assets/images/' . $key . '.png' );
            }
        }
        return $converted;
    }
}

if( ! function_exists( 'astha_customizer_array_to_style_string' ) ){
    
    /**
     * Which Value we are getting from customizer. like bellow:
        array (size=5)
          'font-family' => string 'Roboto Condensed' (length=16)
          'font-size' => string '16' (length=2)
          'text-transform' => string 'capitalize' (length=10)
          'font-weight' => string '400' (length=3)
          'font-style' => string 'normal' (length=6)
     * We will change this array to as valid style tag selector and value
     * like:
     * selector{css-property:css-value;}
     * 
     */
    function astha_customizer_array_to_style_string( $css_selector, $array_from_mod ){
        if( is_array( $array_from_mod ) && ! empty( $css_selector ) ){
            
            $output =  $css_selector . "{\n";

            foreach($array_from_mod as $st_prop => $st_value){
                if( $st_prop == 'font-family' && !empty( $st_value ) ){
                 $st_value = $st_value . ', sans-serif'; 
                }

                if( $st_prop == 'font-size' && is_numeric( $st_value )  && !empty( $st_value ) ){
                 $st_value = $st_value . 'px'; 
                }
                $output .= ! empty( $st_value ) ? $st_prop . ': ' . $st_value . ";\n" : '';
            }
            $output .= "\n}";
            
            return $output;
        }
        return;
    }
}
