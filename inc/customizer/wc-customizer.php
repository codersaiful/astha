<?php
/**
 * Astha Theme Customizer For Color Manage for customizer
 *
 * @package Astha
 */

if( ! function_exists( 'medilac_wc_customizerr_manage' ) ){
    
    /**
     * Astha Theme Options All Section , Settings, Controll will controll from here
     * Panel added at customizer.php file Theme->inc->customizer.php
     * 
     * @param type $wp_customize
     */
    function medilac_wc_customizerr_manage( $wp_customize ){
        
        
        
        /**
         * *******************************
         * SECTION LAYOUT IN WOOCOMMERCE
         * ********************************
         * Header / Footer Layout
         * _wc
         */
        $wp_customize->add_section( 'layout_sec_wc', array(
            'title'             =>  __( 'Layout', 'medilac' ),
            'description'       =>  __( 'Header, Footer and Sidebar layout. Set your Site Header and Footer layout', 'medilac' ),
            'panel'             =>  'woocommerce',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        //Shop Layout Section
        $wp_customize->add_setting( 'layout_shop_wc', array(
            'default'           =>  'shop-grid',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field',
            //'transport' => 'postMessage',
        ) );
        
        $choices_shop_layout = array(
            'shop-grid'        => __( 'Topbar Two', 'medilac' ),
            'shop-list'        => __( 'Topbar One', 'medilac' ),
            );
        $choices_shop_layout = apply_filters( 'medilac_shop_layout_choises', $choices_shop_layout );
        
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_shop_wc',
                array(
                   'label' => __( 'Shop Layout', 'medilac' ),
                   'description' => esc_html__( 'Set your Header Layout from pre-define', 'medilac' ),
                   'section' => 'layout_sec_wc',
                   'choices' => medilac_advance_choice_convert( $choices_shop_layout )
                )
            ) 
        );
        
        
        //Topbar Layout Section
        $wp_customize->add_setting( 'layout_topbar_wc', array(
            'default'           =>  '',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_topbar = array(
            'topbar-one'        => __( 'Topbar One', 'medilac' ),
            'topbar-two'        => __( 'Topbar Two', 'medilac' ),
            'topbar-three'        => __( 'Topbar Three', 'medilac' ),
            'topbar-four'        => __( 'Topbar Four', 'medilac' ),
            'topbar-five'        => __( 'Topbar Five', 'medilac' ),
            'none'              => __( 'None', 'medilac' ),
            );
        $choices_topbar = apply_filters( 'medilac_topbar_layout_choises', $choices_topbar );
        
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_topbar_wc',
                array(
                   'label' => __( 'Topbar', 'medilac' ),
                   'description' => esc_html__( 'Set your Header Layout from pre-define', 'medilac' ),
                   'section' => 'layout_sec_wc',
                   'choices' => medilac_advance_choice_convert( $choices_topbar )
                )
            ) 
        );
        
        //Layout header
        $wp_customize->add_setting( 'layout_header_wc', array(
            'default'           =>  '',// __( 'header-two', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_header = array(
            'header-one'        => __( 'Header One', 'medilac' ),
            'header-two'        => __( 'Header Two', 'medilac' ),
            'header-three'        => __( 'Header Three', 'medilac' ),
            'none'              => __( 'None', 'medilac' ),
            );
        /**
         * @Hooked: medilac_header_choises_add_elementor 10 lib/bulldozer.php
         */
        $choices_header = apply_filters( 'medilac_header_layout_choises', $choices_header );
//        $wp_customize->add_control( 'layout_header_wc', array(
//            'label'             =>  __( 'Header', 'medilac' ),
//            'description'       =>  __( 'Set your Header Layout from pre-define', 'medilac' ),
//            'section'           =>  'layout_sec_wc',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_header,
//        ) );
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_header_wc',
                array(
                   'label' => __( 'Header', 'medilac' ),
                   'description' => esc_html__( 'Set your Header Layout from pre-define', 'medilac' ),
                   'section' => 'layout_sec_wc',
                   'choices' => medilac_advance_choice_convert( $choices_header )
                )
            ) 
        );
        
        //Layout Footer
        $wp_customize->add_setting( 'layout_footer_wc', array(
            'default'           =>  '',//__( 'footer-dark', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_footer = array(
            'footer-dark'        => __( 'Dark Footer', 'medilac' ),
            'footer-light'        => __( 'Light Footer', 'medilac' ),
            'none'              => __( 'None', 'medilac' ),
            );
        $choices_footer = apply_filters( 'medilac_footer_layout_choises', $choices_footer );
//        $wp_customize->add_control( 'layout_footer_wc', array(
//            'label'             =>  __( 'Footer', 'medilac' ),
//            'description'       =>  __( 'Set your Header Layout from pre-define', 'medilac' ),
//            'section'           =>  'layout_sec_wc',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_footer,
//        ) );
        
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_footer_wc',
                array(
                   'label' => __( 'Footer', 'medilac' ),
                   'description' => esc_html__( 'Set your Header Layout from pre-define', 'medilac' ),
                   'section' => 'layout_sec_wc',
                   'choices' => medilac_advance_choice_convert( $choices_footer )
                )
            ) 
        );
        
        
        //Layout Sidebar
        $wp_customize->add_setting( 'layout_sidebar_wc', array(
            'default'           =>  __( '', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_sidebar = array(
            'no-sidebar'        => __( 'None', 'medilac' ),
            'left-sidebar'      => __( 'Left Sidebar', 'medilac' ),
            'right-sidebar'     => __( 'Right Sidebar', 'medilac' ),
            );
        $choices_sidebar = apply_filters( 'medilac_sidebar_layout_choises', $choices_sidebar );
//        $wp_customize->add_control( 'layout_sidebar_wc', array(
//            'label'             =>  __( 'Sidebar', 'medilac' ),
//            'description'       =>  __( 'Left Sidebar or Right Sidebar or No Sidebar', 'medilac' ),
//            'section'           =>  'layout_sec_wc',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_sidebar,
//        ) );
        $wp_customize->add_control( new Astha_Image_Radio_Control( $wp_customize, 'layout_sidebar_wc',
            array(
               'label' => __( 'Sidebar', 'medilac' ),
               'description' => esc_html__( 'Left Sidebar or Right Sidebar or No Sidebar', 'medilac' ),
               'section' => 'layout_sec_wc',
               'choices' => medilac_advance_choice_convert( $choices_sidebar )
            )
         ) );
        
        //Finally we have removed this part. We can add this feature at later.
        
//        // Settings: Breadcrumb Style
//        $wp_customize->add_setting( 'shop_loop_product_temp', array(
//            'default'           =>  __( 'shop-template-default', 'medilac' ),
//            'sanitize_callback' => 'sanitize_text_field'
//        ) );
//        
//        $choices_shop_loop_temp = array(
//                    'shop-template-default'   => __( 'Astha Default', 'medilac' ),
//                    'shop-template-wc'   => __( 'WooCommerce Default', 'medilac' ),
//            );
//        $choices_shop_loop_temp = apply_filters( 'medilac_shop_loop_product_temp_choises', $choices_shop_loop_temp );
//        // Add control
//        $wp_customize->add_control( 'medilac_shop_loop_product_temp', array(
//            'label'             =>  __( 'Shop Product Temp', 'medilac' ),
//            'description'       =>  __( 'Customize Product Template in shop loop.', 'medilac' ),
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
        $wp_customize->add_setting( 'medilac_breadcrumb_style_wc', array(
            'default'           =>  __( '', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_breadcrumb_style = array(
                    'breadcrumb-style-1'   => __( 'Default - Style One', 'medilac' ),
                    'breadcrumb-style-2'   => __( 'Style Two', 'medilac' ),
                    'breadcrumb-style-3'   => __( 'Style Three', 'medilac' ),
                    'breadcrumb-style-4'   => __( 'Style Four', 'medilac' ),
                    //'breadcrumb-style-hidden'   => __( 'Display Hidden', 'medilac' ),
            );
        $choices_breadcrumb_style = apply_filters( 'medilac_breadcrumb_style_choises', $choices_breadcrumb_style );
        // Add control
        $wp_customize->add_control( 'breadcrumb_style_wc', array(
            'label'             =>  __( 'Breadcrumb Style', 'medilac' ),
            'description'       =>  __( 'Set on to show/hide breadcrumb manually', 'medilac' ),
            'section'           =>  'layout_sec_wc',
            'settings'          => 'medilac_breadcrumb_style_wc',
            'priority'          =>  10,
            'type'              =>  'select',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_breadcrumb_style,
        ) );
        
        
        //Breadcrumb Image / Breadcrumb background image
        $wp_customize->add_setting( 'medilac_breadcrumb_image_wc',
            array(
               'default' => '',
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            'medilac_breadcrumb_image_wc',
            array(
               'label' => __( 'Background Image', 'medilac' ),
               'description' => esc_html__( 'Upload a background image for breadcrumb', 'medilac' ),
               'section' => 'layout_sec_wc',
               'button_labels' => array( // Optional.
                  'select' => __( 'Select Image', 'medilac' ),
                  'change' => __( 'Change Image', 'medilac' ),
                  'remove' => __( 'Remove', 'medilac' ),
                  'default' => __( 'Default', 'medilac' ),
                  'placeholder' => __( 'No image selected', 'medilac' ),
                  'frame_title' => __( 'Select Image', 'medilac' ),
                  'frame_button' => __( 'Choose Image', 'medilac' ),
               )
            )
         ) );
         
         /**
         * *******************************
         * SECTION BASIC MEDILAC IN WOOCOMMERCE
         * ********************************
         * Header / Footer Layout
         * _wc
         */
        $wp_customize->add_section( 'layout_basic_wc', array(
            'title'             =>  __( 'WC Basic', 'medilac' ),
            'description'       =>  __( 'Basic Over ride Setting for Woocommerce', 'medilac' ),
            'panel'             =>  'woocommerce',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
    }
}

add_action( 'customize_register', 'medilac_wc_customizerr_manage' );
