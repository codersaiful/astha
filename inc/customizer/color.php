<?php
/**
 * Medilac Theme Customizer For Color Manage for customizer
 *
 * @package Medilac
 */

if( ! function_exists( 'medilac_customizer_color_manage' ) ){
    
    /**
     * Medilac Theme Options All Section , Settings, Controll will controll from here
     * Panel added at customizer.php file Theme->inc->customizer.php
     * 
     * @param type $wp_customize
     */
    function medilac_customizer_color_manage( $wp_customize ){
        
        
        // Primary Color
        $wp_customize->add_setting(
            'color_root[--medilac-primary]',
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
                'color_root[--medilac-primary]',
                array(
                    'label'         =>  __( 'Primary Color', 'medilac' ),
                    'description'   =>  __( 'Theme\'s main color. Most used color of theme.', 'medilac' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Secondary Color
        $wp_customize->add_setting(
            'color_root[--medilac-secondary]',
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
                'color_root[--medilac-secondary]',
                array(
                    'label'         =>  __( 'Secondary Color', 'medilac' ),
                    'description'   =>  __( 'Theme\'s secondary color. Most used as second color of theme.', 'medilac' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Deep Dark Color
        $wp_customize->add_setting(
            'color_root[--medilac-deep-dark]',
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
                'color_root[--medilac-deep-dark]',
                array(
                    'label'         =>  __( 'Deep Dark Color', 'medilac' ),
                    'description'   =>  __( 'Mainly for Deep color. Such: Black color.', 'medilac' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Light Dark Color
        $wp_customize->add_setting(
            'color_root[--medilac-light-dark]',
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
                'color_root[--medilac-light-dark]',
                array(
                    'label'         =>  __( 'Light Dark Color', 'medilac' ),
                    'description'   =>  __( 'Mainly for light black color.', 'medilac' ),
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
            'color_root[--medilac-primary-light]',
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
                'color_root[--medilac-primary-light]',
                array(
                    'label'         =>  __( 'Primary Light Color', 'medilac' ),
                    'description'   =>  __( 'Light version of Primary color.', 'medilac' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Primary deep Color
        $wp_customize->add_setting(
            'color_root[--medilac-primary-deep]',
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
                'color_root[--medilac-primary-deep]',
                array(
                    'label'         =>  __( 'Primary Deep Color', 'medilac' ),
                    'description'   =>  __( 'Deep version of Primary color.', 'medilac' ),
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
            'color_root[--medilac-secondary-light]',
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
                'color_root[--medilac-secondary-light]',
                array(
                    'label'         =>  __( 'Secondary Light Color', 'medilac' ),
                    'description'   =>  __( 'Light version of Secendary color.', 'medilac' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Secondary Deep Color
        $wp_customize->add_setting(
            'color_root[--medilac-secondary-deep]',
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
                'color_root[--medilac-secondary-deep]',
                array(
                    'label'         =>  __( 'Secondary Deep Color', 'medilac' ),
                    'description'   =>  __( 'Deep version of Secendary color.', 'medilac' ),
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
                    'label'         =>  __( 'Text Color', 'medilac' ),
                    'description'   =>  __( 'All text colors in body except link . Basically for p tag.', 'medilac' ),
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
                    'label'         =>  __( 'Link Color', 'medilac' ),
                    'description'   =>  __( 'Primary color for links. This color will apply on whole site.', 'medilac' ),
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
                    'label'         =>  __( 'Link Hover Color', 'medilac' ),
                    'description'   =>  __( 'Primary color for links hover. This color will apply on whole site.', 'medilac' ),
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
            'color_root[--medilac-danger]',
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
                'color_root[--medilac-danger]',
                array(
                    'label'         =>  __( 'Warning Color', 'medilac' ),
                    'description'   =>  __( 'Warning background color. Specially for WooCommerce warning notices background color.', 'medilac' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Warning Color
        $wp_customize->add_setting(
            'color_root[--medilac-warning]',
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
                'color_root[--medilac-warning]',
                array(
                    'label'         =>  __( 'Warning Color', 'medilac' ),
                    'description'   =>  __( 'Warning background color. Specially for WooCommerce warning notices background color.', 'medilac' ),
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
            'color_root[--medilac-topbar-color]',
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
                'color_root[--medilac-topbar-color]',
                array(
                    'label'         =>  __( 'Topbar Color', 'medilac' ),
                    'description'   =>  __( 'Typically font color of topbar. Such: text folor, icon color.', 'medilac' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Topbar Background Color
        $wp_customize->add_setting(
            'color_root[--medilac-topbar-bgcolor]',
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
                'color_root[--medilac-topbar-bgcolor]',
                array(
                    'label'         =>  __( 'Topbar Background Color', 'medilac' ),
                    'description'   =>  __( 'Only for Topbar One, Three and Four. Default color is primary color. User able to change. If empty, color will be primary color.', 'medilac' ),
                    'section'       => 'colors',
                    'capability'    => 'edit_theme_options',
                )
            )
        );
        
        // Topbar Background Color
        $wp_customize->add_setting(
            'color_root[--medilac-topbar-link-color]',
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
                'color_root[--medilac-topbar-link-color]',
                array(
                    'label'         =>  __( 'Topbar Link Hover Color', 'medilac' ),
                    'description'   =>  __( 'Only for Topbar One, Three and Four. Default link color is white. User able to change. If empty, color will be primary color.', 'medilac' ),
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
            'color_root[--medilac-foreground]',
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
                'color_root[--medilac-foreground]',
                array(
                    'label'         =>  __( 'Foreground Color', 'medilac' ),
                    'description'   =>  __( 'Website foreground color. This color will apply on body section.', 'medilac' ),
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
            'default'           =>  '',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h1', array(
            'label'             =>  __( 'Heading 1 Color', 'medilac' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        // H2 Text Color
        $wp_customize->add_setting( 'color_h2', array(
            'default'           =>  '',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h2', array(
            'label'             =>  __( 'Heading 2 Color', 'medilac' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        // H3 Text Color
        $wp_customize->add_setting( 'color_h3', array(
            'default'           =>  '',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h3', array(
            'label'             =>  __( 'Heading 3 Color', 'medilac' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        // H4 Text Color
        $wp_customize->add_setting( 'color_h4', array(
            'default'           =>  '',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h4', array(
            'label'             =>  __( 'Heading 4 Color', 'medilac' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        
        // H5 Text Color
        $wp_customize->add_setting( 'color_h5', array(
            'default'           =>  '',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h5', array(
            'label'             =>  __( 'Heading 5 Color', 'medilac' ),
            'section'           =>  'colors',
            'type'              =>  'color',
            'capability'        =>  'edit_theme_options',
            'input_attrs' => array(
                'placeholder' => __( 'Color Code' ),
             ),
        ) );
        
        // H6 Text Color
        $wp_customize->add_setting( 'color_h6', array(
            'default'           =>  '',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        
        $wp_customize->add_control( 'color_h6', array(
            'label'             =>  __( 'Heading 6 Color', 'medilac' ),
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

add_action( 'customize_register', 'medilac_customizer_color_manage' );


if( ! function_exists( 'medilac_root_color_manage' ) ){
    
    /**
     * Medilac Style Root Color Manager based on 
     * Theme's Customizer
     * 
     * We will change RooT color based on Theme Option's set color
     * 
     * @param void
     */
    function medilac_root_color_manage() {
        $output = '<style id="medilac-color-root">';
        
        //Generate Style for Body with a, p, button,input,textarea etc
        $root = get_theme_mod( 'color_root' );
        
        /**
         * If user want to change Color Root Value, By using Filter, Able to 
         * to do it by using following Filter
         * 
         */
        $root = apply_filters( 'medilac_color_root_arr', $root );
        
        if( isset( $root ) && is_array( $root ) ){
            $output .= ":root {\n";
            foreach( $root as $root_var => $color ){
                $output .= !empty( $color ) ? $root_var . ': ' . $color . ";\n" : '';
            }
            $output .= "}\n";
        }

        
        //For Body Color
        $color_text = medilac_option( 'color_text' );
        if( ! empty( $color_text ) ){
            $output .= "body{color: $color_text;}\n";
            $output .= ".woocommerce-product-rating,p.stars.selected a.active ~ a::before ,p.stars a::before,p.stars a:hover ~ a::before{color: $color_text;}\n";
        }
        
        
        //For LInk (a) Color
        $color_link = medilac_option( 'color_link' );
        if( ! empty( $color_text ) ){
            $output .= "body a{color: $color_link;}\n";
        }
        
        
        //For LInk (a) Color
        $color_link_hover = medilac_option( 'color_link_hover' );
        if( ! empty( $color_link_hover ) ){
            $output .= "body a:hover{color: $color_link_hover;}\n";
        }
        
        $output .= '</style>';
        echo $output;
    }
}

add_action( 'wp_head', 'medilac_root_color_manage' ); //wp_enqueue_scripts