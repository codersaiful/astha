<?php
/**
 * Astha Theme Customizer For Color Manage for customizer
 *
 * @package Astha
 */

if( ! function_exists( 'astha_wc_customizerr_manage' ) ){
    
    /**
     * Astha Theme Options All Section , Settings, Controll will controll from here
     * Panel added at customizer.php file Theme->inc->customizer.php
     * 
     * @param type $wp_customize
     */
    function astha_wc_customizerr_manage( $wp_customize ){
        
        
        
        /**
         * *******************************
         * SECTION LAYOUT IN WOOCOMMERCE
         * ********************************
         * Header / Footer Layout
         * _wc
         */
        $wp_customize->add_section( 'layout_sec_wc', array(
            'title'             =>  __( 'Layout', 'astha' ),
            'description'       =>  __( 'Header, Footer and Sidebar layout. Set your Site Header and Footer layout', 'astha' ),
            'panel'             =>  'woocommerce',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        //Shop Layout Section
        $wp_customize->add_setting( 'layout_shop_wc', array(
            'default'           =>  'shop-grid',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field',
            //'transport' => 'postMessage',
        ) );
        
        $choices_shop_layout = array(
            'shop-grid'        => __( 'Topbar Two', 'astha' ),
            'shop-list'        => __( 'Topbar One', 'astha' ),
            );
        $choices_shop_layout = apply_filters( 'astha_shop_layout_choises', $choices_shop_layout );
        
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_shop_wc',
                array(
                   'label' => __( 'Shop Layout', 'astha' ),
                   'description' => esc_html__( 'Set your Header Layout from pre-define', 'astha' ),
                   'section' => 'layout_sec_wc',
                   'choices' => astha_advance_choice_convert( $choices_shop_layout )
                )
            ) 
        );
        
        
        //Topbar Layout Section
        $wp_customize->add_setting( 'layout_topbar_wc', array(
            'default'           =>  '',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_topbar = array(
            'topbar-one'        => __( 'Topbar One', 'astha' ),
            'topbar-two'        => __( 'Topbar Two', 'astha' ),
            'topbar-three'        => __( 'Topbar Three', 'astha' ),
            'topbar-four'        => __( 'Topbar Four', 'astha' ),
            'topbar-five'        => __( 'Topbar Five', 'astha' ),
            'none'              => __( 'None', 'astha' ),
            );
        $choices_topbar = apply_filters( 'astha_topbar_layout_choises', $choices_topbar );
        
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_topbar_wc',
                array(
                   'label' => __( 'Topbar', 'astha' ),
                   'description' => esc_html__( 'Set your Header Layout from pre-define', 'astha' ),
                   'section' => 'layout_sec_wc',
                   'choices' => astha_advance_choice_convert( $choices_topbar )
                )
            ) 
        );
        
        //Layout header
        $wp_customize->add_setting( 'layout_header_wc', array(
            'default'           =>  '',// __( 'header-two', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_header = array(
            'header-one'        => __( 'Header One', 'astha' ),
            'header-two'        => __( 'Header Two', 'astha' ),
            'header-three'        => __( 'Header Three', 'astha' ),
            'none'              => __( 'None', 'astha' ),
            );
        /**
         * @Hooked: astha_header_choises_add_elementor 10 lib/bulldozer.php
         */
        $choices_header = apply_filters( 'astha_header_layout_choises', $choices_header );
//        $wp_customize->add_control( 'layout_header_wc', array(
//            'label'             =>  __( 'Header', 'astha' ),
//            'description'       =>  __( 'Set your Header Layout from pre-define', 'astha' ),
//            'section'           =>  'layout_sec_wc',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_header,
//        ) );
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_header_wc',
                array(
                   'label' => __( 'Header', 'astha' ),
                   'description' => esc_html__( 'Set your Header Layout from pre-define', 'astha' ),
                   'section' => 'layout_sec_wc',
                   'choices' => astha_advance_choice_convert( $choices_header )
                )
            ) 
        );
        
        //Layout Footer
        $wp_customize->add_setting( 'layout_footer_wc', array(
            'default'           =>  '',//__( 'footer-dark', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_footer = array(
            'footer-dark'        => __( 'Dark Footer', 'astha' ),
            'footer-light'        => __( 'Light Footer', 'astha' ),
            'none'              => __( 'None', 'astha' ),
            );
        $choices_footer = apply_filters( 'astha_footer_layout_choises', $choices_footer );
//        $wp_customize->add_control( 'layout_footer_wc', array(
//            'label'             =>  __( 'Footer', 'astha' ),
//            'description'       =>  __( 'Set your Header Layout from pre-define', 'astha' ),
//            'section'           =>  'layout_sec_wc',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_footer,
//        ) );
        
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_footer_wc',
                array(
                   'label' => __( 'Footer', 'astha' ),
                   'description' => esc_html__( 'Set your Header Layout from pre-define', 'astha' ),
                   'section' => 'layout_sec_wc',
                   'choices' => astha_advance_choice_convert( $choices_footer )
                )
            ) 
        );
        
        
        //Layout Sidebar
        $wp_customize->add_setting( 'layout_sidebar_wc', array(
            'default'           =>  __( '', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_sidebar = array(
            'no-sidebar'        => __( 'None', 'astha' ),
            'left-sidebar'      => __( 'Left Sidebar', 'astha' ),
            'right-sidebar'     => __( 'Right Sidebar', 'astha' ),
            );
        $choices_sidebar = apply_filters( 'astha_sidebar_layout_choises', $choices_sidebar );
//        $wp_customize->add_control( 'layout_sidebar_wc', array(
//            'label'             =>  __( 'Sidebar', 'astha' ),
//            'description'       =>  __( 'Left Sidebar or Right Sidebar or No Sidebar', 'astha' ),
//            'section'           =>  'layout_sec_wc',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_sidebar,
//        ) );
        $wp_customize->add_control( new Astha_Image_Radio_Control( $wp_customize, 'layout_sidebar_wc',
            array(
               'label' => __( 'Sidebar', 'astha' ),
               'description' => esc_html__( 'Left Sidebar or Right Sidebar or No Sidebar', 'astha' ),
               'section' => 'layout_sec_wc',
               'choices' => astha_advance_choice_convert( $choices_sidebar )
            )
         ) );
        
        //Finally we have removed this part. We can add this feature at later.
        
//        // Settings: Breadcrumb Style
//        $wp_customize->add_setting( 'shop_loop_product_temp', array(
//            'default'           =>  __( 'shop-template-default', 'astha' ),
//            'sanitize_callback' => 'sanitize_text_field'
//        ) );
//        
//        $choices_shop_loop_temp = array(
//                    'shop-template-default'   => __( 'Astha Default', 'astha' ),
//                    'shop-template-wc'   => __( 'WooCommerce Default', 'astha' ),
//            );
//        $choices_shop_loop_temp = apply_filters( 'astha_shop_loop_product_temp_choises', $choices_shop_loop_temp );
//        // Add control
//        $wp_customize->add_control( 'astha_shop_loop_product_temp', array(
//            'label'             =>  __( 'Shop Product Temp', 'astha' ),
//            'description'       =>  __( 'Customize Product Template in shop loop.', 'astha' ),
//            'section'           =>  'layout_sec_wc',
//            'settings'          => 'shop_loop_product_temp',
//            'priority'          =>  10,
//            'type'              =>  'select',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_shop_loop_temp,
//        ) );
//        
//        
        
        
        // Settings: Breadcrumb Style
        $wp_customize->add_setting( 'astha_breadcrumb_style_wc', array(
            'default'           =>  __( '', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_breadcrumb_style = array(
                    'breadcrumb-style-1'   => __( 'Default - Style One', 'astha' ),
                    'breadcrumb-style-2'   => __( 'Style Two', 'astha' ),
                    'breadcrumb-style-3'   => __( 'Style Three', 'astha' ),
                    'breadcrumb-style-4'   => __( 'Style Four', 'astha' ),
                    //'breadcrumb-style-hidden'   => __( 'Display Hidden', 'astha' ),
            );
        $choices_breadcrumb_style = apply_filters( 'astha_breadcrumb_style_choises', $choices_breadcrumb_style );
        // Add control
        $wp_customize->add_control( 'breadcrumb_style_wc', array(
            'label'             =>  __( 'Breadcrumb Style', 'astha' ),
            'description'       =>  __( 'Set on to show/hide breadcrumb manually', 'astha' ),
            'section'           =>  'layout_sec_wc',
            'settings'          => 'astha_breadcrumb_style_wc',
            'priority'          =>  10,
            'type'              =>  'select',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_breadcrumb_style,
        ) );
        
        
        //Breadcrumb Image / Breadcrumb background image
        $wp_customize->add_setting( 'astha_breadcrumb_image_wc',
            array(
               'default' => '',
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            'astha_breadcrumb_image_wc',
            array(
               'label' => __( 'Background Image', 'astha' ),
               'description' => esc_html__( 'Upload a background image for breadcrumb', 'astha' ),
               'section' => 'layout_sec_wc',
               'button_labels' => array( // Optional.
                  'select' => __( 'Select Image', 'astha' ),
                  'change' => __( 'Change Image', 'astha' ),
                  'remove' => __( 'Remove', 'astha' ),
                  'default' => __( 'Default', 'astha' ),
                  'placeholder' => __( 'No image selected', 'astha' ),
                  'frame_title' => __( 'Select Image', 'astha' ),
                  'frame_button' => __( 'Choose Image', 'astha' ),
               )
            )
         ) );
         
         /**
         * *******************************
         * SECTION BASIC ASTHA IN WOOCOMMERCE
         * ********************************
         * Header / Footer Layout
         * _wc
         */
        $wp_customize->add_section( 'layout_basic_wc', array(
            'title'             =>  __( 'WC Basic', 'astha' ),
            'description'       =>  __( 'Basic Over ride Setting for Woocommerce', 'astha' ),
            'panel'             =>  'woocommerce',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
    }
}

add_action( 'customize_register', 'astha_wc_customizerr_manage' );
