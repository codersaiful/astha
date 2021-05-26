<?php
/**
 * Astha Theme Customizer For Color Manage for customizer
 *
 * @package Astha
 */

if( ! function_exists( 'astha_customizer_color_manage' ) ){
    
    /**
     * Astha Theme Options All Section , Settings, Controll will controll from here
     * Panel added at customizer.php file Theme->inc->customizer.php
     * 
     * @param type $wp_customize
     */
    function astha_customizer_color_manage( $wp_customize ){
        
        
        // Primary Color
        $wp_customize->add_setting(
            'color_root[--astha-primary]',
            array(
                'default'              => '#0fc392',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-primary]',
                array(
                    'label'         =>  __( 'Primary Color', 'astha' ),
                    'description'   =>  __( 'Theme\'s main color. Most used color of theme.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Secondary Color
        $wp_customize->add_setting(
            'color_root[--astha-secondary]',
            array(
                'default'              => '#f4f9fc',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-secondary]',
                array(
                    'label'         =>  __( 'Secondary Color', 'astha' ),
                    'description'   =>  __( 'Theme\'s secondary color. Most used as second color of theme.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Deep Dark Color
        $wp_customize->add_setting(
            'color_root[--astha-deep-dark]',
            array(
                'default'              => '#021429',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-deep-dark]',
                array(
                    'label'         =>  __( 'Deep Dark Color', 'astha' ),
                    'description'   =>  __( 'Mainly for Deep color. Such: Black color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Light Dark Color
        $wp_customize->add_setting(
            'color_root[--astha-light-dark]',
            array(
                'default'              => '#5c6b79',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-light-dark]',
                array(
                    'label'         =>  __( 'Light Dark Color', 'astha' ),
                    'description'   =>  __( 'Mainly for light black color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        
        /*************************
         * Variation of Primary
         ***************************/
        
        // Primary Light Color
        $wp_customize->add_setting(
            'color_root[--astha-primary-light]',
            array(
                'default'              => '#16ecb2',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-primary-light]',
                array(
                    'label'         =>  __( 'Primary Light Color', 'astha' ),
                    'description'   =>  __( 'Light version of Primary color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Primary deep Color
        $wp_customize->add_setting(
            'color_root[--astha-primary-deep]',
            array(
                'default'              => '#0c9e77',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-primary-deep]',
                array(
                    'label'         =>  __( 'Primary Deep Color', 'astha' ),
                    'description'   =>  __( 'Deep version of Primary color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        
        /*************************
         * Variation of Secondary Color
         ***************************/
        
        // Secondary Light Color
        $wp_customize->add_setting(
            'color_root[--astha-secondary-light]',
            array(
                'default'              => '#fdfdfd',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-secondary-light]',
                array(
                    'label'         =>  __( 'Secondary Light Color', 'astha' ),
                    'description'   =>  __( 'Light version of Secendary color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Secondary Deep Color
        $wp_customize->add_setting(
            'color_root[--astha-secondary-deep]',
            array(
                'default'              => '#e2ebf1',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-secondary-deep]',
                array(
                    'label'         =>  __( 'Secondary Deep Color', 'astha' ),
                    'description'   =>  __( 'Deep version of Secendary color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );

        
        /******************************
         * ALL OF VARIATION 
         *******************************/
        
        // Text Color
        $wp_customize->add_setting(
            'color_text',
            array(
                'default'              => '#5c6b79',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_text',
                array(
                    'label'         =>  __( 'Text Color', 'astha' ),
                    'description'   =>  __( 'All text colors in body except link . Basically for p tag.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Link Color
        $wp_customize->add_setting(
            'color_link',
            array(
                'default'              => '#0fc392',
                //'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_link',
                array(
                    'label'         =>  __( 'Link Color', 'astha' ),
                    'description'   =>  __( 'Primary color for links. This color will apply on whole site.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Link Hover Color
        $wp_customize->add_setting(
            'color_link_hover',
            array(
                'default'              => '#021429',
                //'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_link_hover',
                array(
                    'label'         =>  __( 'Link Hover Color', 'astha' ),
                    'description'   =>  __( 'Primary color for links hover. This color will apply on whole site.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        
        /******************************
        **** Danger * Warning
        *************************/
        
        // Danger Color
        $wp_customize->add_setting(
            'color_root[--astha-danger]',
            array(
                'default'              => '#fd5a5a',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-danger]',
                array(
                    'label'         =>  __( 'Warning Color', 'astha' ),
                    'description'   =>  __( 'Warning background color. Specially for WooCommerce warning notices background color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Warning Color
        $wp_customize->add_setting(
            'color_root[--astha-warning]',
            array(
                'default'              => '#ffa753',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-warning]',
                array(
                    'label'         =>  __( 'Warning Color', 'astha' ),
                    'description'   =>  __( 'Warning background color. Specially for WooCommerce warning notices background color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        
        /******************************
        **** Topbar
        *************************/
        
        // Topbar Color
        $wp_customize->add_setting(
            'color_root[--astha-topbar-color]',
            array(
                'default'              => '',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-topbar-color]',
                array(
                    'label'         =>  __( 'Topbar Color', 'astha' ),
                    'description'   =>  __( 'Typically font color of topbar. Such: text folor, icon color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Topbar Background Color
        $wp_customize->add_setting(
            'color_root[--astha-topbar-bgcolor]',
            array(
                'default'              => '',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-topbar-bgcolor]',
                array(
                    'label'         =>  __( 'Topbar Background Color', 'astha' ),
                    'description'   =>  __( 'Only for Topbar One, Three and Four. Default color is primary color. User able to change. If empty, color will be primary color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Topbar Background Color
        $wp_customize->add_setting(
            'color_root[--astha-topbar-link-color]',
            array(
                'default'              => '',//#ffffff Default color is white and set at css file
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-topbar-link-color]',
                array(
                    'label'         =>  __( 'Topbar Link Hover Color', 'astha' ),
                    'description'   =>  __( 'Only for Topbar One, Three and Four. Default link color is white. User able to change. If empty, color will be primary color.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        /******************************
        **** Foreground
        *************************/
        
        // Foreground Color
        $wp_customize->add_setting(
            'color_root[--astha-foreground]',
            array(
                'default'              => '#ffffff',
                'transport'            => 'postMessage',
                'sanitize_callback'    => 'sanitize_hex_color',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'color_root[--astha-foreground]',
                array(
                    'label'         =>  __( 'Foreground Color', 'astha' ),
                    'description'   =>  __( 'Website foreground color. This color will apply on body section.', 'astha' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        
        /**********Heading all disble | Start **************
        // We can enable this part later
        
        
        //All Heading Color

        
        // H1 Text Color
        $wp_customize->add_setting( 'color_h1', array(
            'default'           =>  '',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h1', array(
            'label'             =>  __( 'Heading 1 Color', 'astha' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        // H2 Text Color
        $wp_customize->add_setting( 'color_h2', array(
            'default'           =>  '',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h2', array(
            'label'             =>  __( 'Heading 2 Color', 'astha' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        // H3 Text Color
        $wp_customize->add_setting( 'color_h3', array(
            'default'           =>  '',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h3', array(
            'label'             =>  __( 'Heading 3 Color', 'astha' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        // H4 Text Color
        $wp_customize->add_setting( 'color_h4', array(
            'default'           =>  '',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h4', array(
            'label'             =>  __( 'Heading 4 Color', 'astha' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        // H5 Text Color
        $wp_customize->add_setting( 'color_h5', array(
            'default'           =>  '',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h5', array(
            'label'             =>  __( 'Heading 5 Color', 'astha' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        // H6 Text Color
        $wp_customize->add_setting( 'color_h6', array(
            'default'           =>  '',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h6', array(
            'label'             =>  __( 'Heading 6 Color', 'astha' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        //************** Heading all color Disable Now | End ************************ */
    }
}

add_action( 'customize_register', 'astha_customizer_color_manage' );


if( ! function_exists( 'astha_root_color_manage' ) ){
    
    /**
     * Astha Style Root Color Manager based on 
     * Theme's Customizer
     * 
     * We will change RooT color based on Theme Option's set color
     * 
     * @param void
     */
    function astha_root_color_manage() {
        $output = '<style id="astha-color-root">';
        
        //Generate Style for Body with a, p, button,input,textarea etc
        $root = get_theme_mod( 'color_root' );
        
        /**
         * If user want to change Color Root Value, By using Filter, Able to 
         * to do it by using following Filter
         * 
         */
        $root = apply_filters( 'astha_color_root_arr', $root );
        
        if( isset( $root ) && is_array( $root ) ){
            $output .= ":root {\n";
            foreach( $root as $root_var => $color ){
                $output .= !empty( $color ) ? $root_var . ': ' . $color . ";\n" : '';
            }
            $output .= "}\n";
        }

        
        //For Body Color
        $color_text = astha_option( 'color_text' );
        if( ! empty( $color_text ) ){
            $output .= "body{color: $color_text;}\n";
            $output .= ".woocommerce-product-rating,p.stars.selected a.active ~ a::before ,p.stars a::before,p.stars a:hover ~ a::before{color: $color_text;}\n";
        }
        
        
        //For LInk (a) Color
        $color_link = astha_option( 'color_link' );
        if( ! empty( $color_text ) ){
            $output .= "body a{color: $color_link;}\n";
        }
        
        
        //For LInk (a) Color
        $color_link_hover = astha_option( 'color_link_hover' );
        if( ! empty( $color_link_hover ) ){
            $output .= "body a:hover{color: $color_link_hover;}\n";
        }
        
        $output .= '</style>';
        echo $output;
    }
}

add_action( 'wp_head', 'astha_root_color_manage' ); //wp_enqueue_scripts