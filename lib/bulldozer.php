<?php

/**
 * Astha Themes Bulldozer
 * Where All kind of filter, whice we wanted to change/update. we will do it from this file.
 * 
 * Normally We will use Filter and will customize Options/Features from Here
 * 
 * Astha functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @since 1.0.0.19
 * @by Saiful
 * 
 * @package Astha
 */

/**
 * Root Color Var change From Here
 * for Page
 * User able to change Theme Color From Any page/ Post
 * 
 * @since 1.0.0.38
 * 
 * @param type $roots_arr
 * @return type
 */
function medilac_root_color_from_page( $roots_arr ){

    if( is_singular() ){
        $supported_root = array(
            '--medilac-primary',
            '--medilac-secondary',
            '--medilac-deep-dark',
            '--medilac-light-dark',
            '--medilac-primary-deep',
            '--medilac-primary-light',
            //New Added at 1.0.0.46
            '--medilac-secondary-deep',
            '--medilac-secondary-light',
            
            '--medilac-danger',
            '--medilac-foreground',
            
            
            '--medilac-topbar-color',
            '--medilac-topbar-bgcolor',
            '--medilac-topbar-link-color',

        );
        $post_ID = get_the_ID();
        foreach( $supported_root as $eachRoot ){
            $colr = get_post_meta( $post_ID, $eachRoot, true );
            if( !empty( $colr ) ){
                $roots_arr[$eachRoot] = $colr;
            }
        }
        
    }
    
    
    return $roots_arr;
}
add_filter( 'medilac_color_root_arr', 'medilac_root_color_from_page' );

if( ! function_exists( 'medilac_root_font_from_page' ) ){
    
    /**
     * Font Root from page Options
     * Sample Array of Fonts
     * Array Sample
             * array (size=2)
                '--medilac-font-primary' => string 'Work Sans' (length=9)
                '--medilac-font-secondary' => string 'Roboto' (length=6)
     * 
     * @param type $roots_arr Fonts Array
     * @return Array
     */
    function medilac_root_font_from_page( $roots_arr ){

        if( is_singular() ){
            $supported_root = array(
                '--medilac-font-primary',
                '--medilac-font-secondary',
            );
            $post_ID = get_the_ID();
            foreach( $supported_root as $eachRoot ){
                $colr = get_post_meta( $post_ID, $eachRoot, true );
                if( !empty( $colr ) ){
                    $roots_arr[$eachRoot] = $colr;
                }
            }

        }

        return $roots_arr;
    }
}
add_filter( 'medilac_root_font_arr', 'medilac_root_font_from_page' );

if( ! function_exists( 'medilac_breadcrumb_control' ) ){
    
    /**
     * Breadcrumb on or Off using Theme's Filter 
     * Filter is: medilac_breadcrumb_show
     * 
     * By Default: We will Hide Breadcrumb for Home Page and 404 Error Page
     * 
     * @param type $validation_bool
     * @return bool
     */
    function medilac_breadcrumb_control( $validation_bool ){
        //For 404 and Home Error page
        if( is_404() || is_front_page() ){
            return false;
        }
        return $validation_bool;
    }
}
add_filter( 'medilac_breadcrumb_show', 'medilac_breadcrumb_control' );


if( ! function_exists( 'medilac_header_footer_layout_choises' ) ){
    
    /**
     * Header layout Handling 
     * 
     * Header or Footer Layout will come from Elementor Template
     * Saved Template
     * 
     * @param   Array    $choices
     * @return  Array   found new $choices
     */
    function medilac_header_footer_layout_choises( $choices ){
        $args = array(
            'post_type'         =>  'header_footer',
            'post_status'       =>  'publish',
            'posts_per_page'    => -1,
        );
        $query = get_posts( $args );

        // Check, If post not found , Direct return main choicese
        if( empty( $query ) ){
            return $choices;
        }
        
        //If found post, then itarate
        if( is_array( $query ) && count( $query ) > 0 ){
            foreach( $query as $q_post ){
                $id = (int) $q_post->ID;
                $choices[$id] = $q_post->post_title;
            }
        }

        return $choices;
    }
}
if ( did_action( 'elementor/loaded' ) ) {
    add_filter( 'medilac_header_layout_choises', 'medilac_header_footer_layout_choises' );
    add_filter( 'medilac_footer_layout_choises', 'medilac_header_footer_layout_choises' );
}

if( ! function_exists( 'medilac_header_choises_add_elementor' ) ){
    
    /**
     * Adding new Custom Elementor Header Option
     * 
     * Actually we will add this Option, When Elementor stay active
     * 
     * @since 1.0.0.55
     * @date 2.1.2021
     * @by Saiful
     * 
     * @param array $choices
     * @return type Array
     */
    function medilac_header_choises_add_elementor( $choices ){
        $choices['header-elementor'] = esc_html__( 'Elementor Custom Header', 'medilac' );
        return $choices;
    }
}

if( ! function_exists( 'medilac_footer_choises_add_elementor' ) ){
    
    /**
     * Adding new Custom Elementor Footer Option
     * 
     * Actually we will add this Option, When Elementor stay active
     * 
     * @since 1.0.0.55
     * @date 2.1.2021
     * @by Saiful
     * 
     * @param array $choices
     * @return type Array
     */
    function medilac_footer_choises_add_elementor( $choices ){
        $choices['footer-elementor'] = esc_html__( 'Elementor Custom Footer', 'medilac' );
        return $choices;
    }
}
if ( did_action( 'elementor/loaded' ) ) {
    //add_filter( 'medilac_header_layout_choises', 'medilac_header_choises_add_elementor' );
    //add_filter( 'medilac_footer_layout_choises', 'medilac_footer_choises_add_elementor' );
}

/**
 * This filter will work,
 * After Demo import 
 * 
 * Managing Demo importing
 * 
 * Currenlty Disable. Because, It's no need
 * 
 * @param   Array $arrs
 * @param   String $demo_name
 * @return  Array
 */
function medilac_demo_import_name_manage( $arrs, $demo_name ){
    
    if( 'Five' == $demo_name ){
        $arrs['menu_name'] = 'Four';
    }
    
    return $arrs;
}
//add_filter( 'medilac_demo_import_names_arg', 'medilac_demo_import_name_manage', 10, 2 );
