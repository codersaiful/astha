<?php
/**
 * Medilac Theme Customizer For Theme Options
 *
 * @package Medilac
 */

if( ! function_exists( 'medilac_theme_options_register' ) ){
    
    /**
     * Medilac Theme Options All Section , Settings, Controll will controll from here
     * Panel added at customizer.php file Theme->inc->customizer.php
     * 
     * @param type $wp_customize
     */
    function medilac_theme_options_register( $wp_customize ){
                
        /**
         * Header / Footer Layout
         */
        $wp_customize->add_section( 'layout_sec', array(
            'title'             =>  __( 'Layout', 'medilac' ),
            'description'       =>  __( 'Header, Footer and Sidebar layout settings. Customizing area of site\'s layout.', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        //Topbar Layout Section
        $wp_customize->add_setting( 'layout_topbar', array(
            'default'           =>  'topbar-one',// __( 'header-two', 'medilac' ),
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
            new Medilac_Image_Radio_Control( $wp_customize, 'layout_topbar',
                array(
                   'label' => __( 'Topbar', 'medilac' ),
                   'description' => esc_html__( 'Select Topbar Layout', 'medilac' ),
                   'section' => 'layout_sec',
                   'choices' => medilac_advance_choice_convert( $choices_topbar )
                )
            ) 
        );
        
        //Layout header
        $wp_customize->add_setting( 'layout_header', array(
            'default'           =>  'header-one',// __( 'header-two', 'medilac' ),
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
 
        $wp_customize->add_control( 
            new Medilac_Image_Radio_Control( $wp_customize, 'layout_header',
                array(
                   'label' => __( 'Header', 'medilac' ),
                   'description' => esc_html__( 'Select Header Layout', 'medilac' ),
                   'section' => 'layout_sec',
                   'choices' => medilac_advance_choice_convert( $choices_header )
                )
            ) 
        );
        
        
        
        //Layout Sidebar
        $wp_customize->add_setting( 'layout_sidebar', array(
            'default'           =>  __( 'right-sidebar', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_sidebar = array(
            'no-sidebar'        => __( 'None', 'medilac' ),
            'left-sidebar'      => __( 'Left Sidebar', 'medilac' ),
            'right-sidebar'     => __( 'Right Sidebar', 'medilac' ),
            );
        $choices_sidebar = apply_filters( 'medilac_sidebar_layout_choises', $choices_sidebar );
        
//        
//        $wp_customize->add_control( 'layout_sidebar', array(
//            'label'             =>  __( 'Sidebar', 'medilac' ),
//            'description'       =>  __( 'Left Sidebar or Right Sidebar or No Sidebar', 'medilac' ),
//            'section'           =>  'layout_sec',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_sidebar,
//        ) );
//        
        
        $wp_customize->add_control( new Medilac_Image_Radio_Control( $wp_customize, 'layout_sidebar',
            array(
               'label' => __( 'Sidebar', 'medilac' ),
               'description' => esc_html__( 'Select Sidebar Layout', 'medilac' ),
               'section' => 'layout_sec',
               'choices' => medilac_advance_choice_convert( $choices_sidebar )
            )
         ) );
        
                
        
        //Layout Footer
        $wp_customize->add_setting( 'layout_footer', array(
            'default'           =>  'footer-dark',//__( 'footer-dark', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_footer = array(
            'footer-dark'        => __( 'Dark Footer', 'medilac' ),
            'footer-light'        => __( 'Light Footer', 'medilac' ),
            'none'              => __( 'None', 'medilac' ),
            );
        $choices_footer = apply_filters( 'medilac_footer_layout_choises', $choices_footer );
//        $wp_customize->add_control( 'layout_footer', array(
//            'label'             =>  __( 'Footer', 'medilac' ),
//            'description'       =>  __( 'Set your Header Layout from pre-define', 'medilac' ),
//            'section'           =>  'layout_sec',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_footer,
//        ) );
//        
        $wp_customize->add_control( 
            new Medilac_Image_Radio_Control( $wp_customize, 'layout_footer',
                array(
                   'label' => __( 'Footer', 'medilac' ),
                   'description' => esc_html__( 'Select Footer Layout', 'medilac' ),
                   'section' => 'layout_sec',
                    //'type'  =>  'radio_image',
                   'choices' => medilac_advance_choice_convert( $choices_footer )
                )
            ) 
        );
        
        
        
        
        /**
         * Header Header
         */
        $wp_customize->add_section( 'head_socket_sec', array(
            'title'             =>  __( 'Header', 'medilac' ),
            'description'       =>  __( 'Control your website Header. Such: breadcrumb image, title, topbar content, social links etc.', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        
        
        
        
        
        
        
        /*****************************************************
         * Breadcrumb
         *****************************************************/
        $wp_customize->add_section( 'breadcrumb_section', array(
            'title'             =>  __( 'Breadcrumb', 'medilac' ),
            'description'       =>  __( 'Breadcrumb display setting', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        // Settings: On/Off
        $wp_customize->add_setting( 'medilac_breadcrumb_switch', array(
            'default'           =>  __( 'on', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_breadcrumb = array(
                    'on'   => __( 'Show', 'medilac' ),
                    'off'    => __( 'Hide', 'medilac' ),
            );
        $choices_breadcrumb = apply_filters( 'medilac_breadcrumb_choises', $choices_breadcrumb );

/*
        $wp_customize->add_control( 
            new Medilac_Toggle_Switch_Custom_control( $wp_customize, 'control_name',
                array(
                )
            ) 
        );

*/
        // Add control
        $wp_customize->add_control( 'breadcrumb_switch', 
                array(
                    'label'             =>  __( 'Breadcrumb', 'medilac' ),
                    'description'       =>  __( 'Show or Hide Breadcrumb', 'medilac' ),
                    'section'           =>  'breadcrumb_section',
                    'settings'          => 'medilac_breadcrumb_switch',
                    'priority'          =>  10,
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => $choices_breadcrumb,
                )
        );
//        $wp_customize->add_control( 
//            new Medilac_Toggle_Switch_Custom_control( $wp_customize, 'breadcrumb_switch',
//                array(
//                    'label'             =>  __( 'Breadcrumb', 'medilac' ),
//                    'description'       =>  __( 'Show or Hide Breadcrumb', 'medilac' ),
//                    'section'           =>  'breadcrumb_section',
//                    'settings'          => 'medilac_breadcrumb_switch',
//                    'priority'          =>  10,
//                    'type'              =>  'radio',
//                    'capability'        =>  'edit_theme_options',
//                    'choices'           => $choices_breadcrumb,
//                )
//            ) 
//        );
        
        // Settings: Breadcrumb Style
        $wp_customize->add_setting( 'medilac_breadcrumb_style', array(
            'default'           =>  __( 'breadcrumb-style-1', 'medilac' ),
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
        $wp_customize->add_control( 'breadcrumb_style', array(
            'label'             =>  __( 'Change Style', 'medilac' ),
            'description'       =>  __( 'Choose preferred style for breadcrumb.', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_style',
            'priority'          =>  10,
            'type'              =>  'select',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_breadcrumb_style,
        ) );
        
        //Breadcrumb Image / Breadcrumb background image
        $default_bred_img = get_template_directory_uri() . '/assets/images/breadcrumb-banner.png';
        $wp_customize->add_setting( 'medilac_breadcrumb_image',
            array(
               'default' => $default_bred_img,
               'transport' => 'refresh',
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            'medilac_breadcrumb_image',
            array(
               'label' => __( 'Background Image', 'medilac' ),
               'description' => esc_html__( 'Upload a background image for breadcrumb', 'medilac' ),
               'section' => 'breadcrumb_section',
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
        
        
        // Settings: Type Changing
        $wp_customize->add_setting( 'medilac_breadcrumb_type', array(
            'default'           =>  __( 'dynamic', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_type', array(
            'label'             =>  __( 'Breadcrumb Option', 'medilac' ),
            'description'       =>  __( 'Choose a breadcrumb option', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_type',
            'priority'          =>  10,
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => array(
                    'dynamic'   => __( 'Dynamic', 'medilac' ),
                    'static'    => __( 'Manual', 'medilac' ),
            ),
        ) );
        
        // Settings: Blog Page
        $wp_customize->add_setting( 'medilac_breadcrumb_blog_title', array(
            'default'           =>  __( 'Blog Page', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_blog_text', array(
            'label'             =>  __( 'Blog Page', 'medilac' ),
            'description'       =>  __( 'Manual Breadcrumb: Blog Page Title', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_blog_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Blog Page', 'medilac' ),
            ),
        ) );
        
        // Settings: Shop Page
        $wp_customize->add_setting( 'medilac_breadcrumb_shop_title', array(
            'default'           =>  __( 'Shop Page', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_shop_text', array(
            'label'             =>  __( 'Shop Page', 'medilac' ),
            'description'       =>  __( 'Manual Breadcrumb: Shop Page Title', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_shop_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Shop Page', 'medilac' ),
            ),
        ) );
        
        // Settings: Single Post Page
        $wp_customize->add_setting( 'medilac_breadcrumb_single_post_title', array(
            'default'           =>  __( 'Single Post', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_post_text', array(
            'label'             =>  __( 'Single Post', 'medilac' ),
            'description'       =>  __( 'Manual Breadcrumb: Single Post Page Title', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_single_post_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Single Post', 'medilac' ),
            ),
        ) );
        
        // Settings: Search Page  //medilac_breadcrumb_search_title
        $wp_customize->add_setting( 'medilac_breadcrumb_search_title', array(
            'default'           =>  __( 'Search Result', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_search_page_text', array(
            'label'             =>  __( 'Search Page', 'medilac' ),
            'description'       =>  __( 'Manual Breadcrumb: Search Page Title', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_search_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Page', 'medilac' ),
            ),
        ) );
        
        // Settings: Page Page
        $wp_customize->add_setting( 'medilac_breadcrumb_page_title', array(
            'default'           =>  __( 'Page', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_page_text', array(
            'label'             =>  __( 'Page', 'medilac' ),
            'description'       =>  __( 'Manual Breadcrumb: WordPress Page Title', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_page_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Page', 'medilac' ),
            ),
        ) );
        
        // Settings: Category
        $wp_customize->add_setting( 'medilac_breadcrumb_category_title', array(
            'default'           =>  __( 'Category Page', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_category_text', array(
            'label'             =>  __( 'Category Page', 'medilac' ),
            'description'       =>  __( 'Manual Breadcrumb: Category Archive Page Title', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_category_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( 'Category Page', 'medilac' ),
            ),
        ) );
        
        // Settings: Tag
        $wp_customize->add_setting( 'medilac_breadcrumb_tag_title', array(
            'default'           =>  __( 'Tag Page', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_tag_text', array(
            'label'             =>  __( 'Tag Page', 'medilac' ),
            'description'       =>  __( 'Manual Breadcrumb: Tag Archive Page Title', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_tag_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( 'Tag Page', 'medilac' ),
            ),
        ) );
        
        
        // Settings: Breadcrumb Height
        $wp_customize->add_setting( 'medilac_breadcrumb_min_height', array(
            'default'           =>  300,
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_minheight', array(
            'label'             =>  __( 'Breadcrumb Minimum Height', 'medilac' ),
            'description'       =>  __( 'Input numeric value as minimum heigh. This will be considered as px.', 'medilac' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'medilac_breadcrumb_min_height',
            'priority'          =>  10,
            'type'              =>  'number',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'min'       => 100,
                
                'placeholder'   => __( 'Tag Page', 'medilac' ),
            ),
        ) );
        
        
        
        /*****************************************************
         * Header Top Topbar
         *****************************************************/
        $wp_customize->add_section( 'medilac_header_top', array(
            'title'             =>  __( 'Header Top', 'medilac' ),
            'description'       =>  __( 'Customize and Change Topbar content or element.', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        // Settings: Email
        $wp_customize->add_setting( 'medilac_header_top_email', array(
            'default'           =>  __( 'contact@medilac.com', 'medilac' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_email'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_header_top_email', array(
            'label'             =>  __( 'Email', 'medilac' ),
            'description'       =>  __( 'Add your business email', 'medilac' ),
            'section'           =>  'medilac_header_top',
            'priority'          =>  10,
            'type'              =>  'email',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( 'example@domain.com', 'medilac' ),
            ),
        ) );
        
        // Settings: Phone Text
        $wp_customize->add_setting( 'medilac_header_top_phone_text', array(
            'default'           =>  __( 'Have any questions? Call Now: (800) 123-1245', 'medilac' ),
            'sanitize_callback' => 'wp_kses_data'
        ) );

        // Add control
        $wp_customize->add_control( 'medilac_header_top_phone_text', array(
            'label'             =>  __( 'Intro Text', 'medilac' ),
            'description'       =>  __( 'Add some intro text', 'medilac' ),
            'section'           =>  'medilac_header_top',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( 'Have any questions? Call Now:', 'medilac' ),
            ),
        ) );
        
        // Settings: Phone
        $wp_customize->add_setting( 'medilac_header_top_phone', array(
            'default'           =>  __( '(800) 123-1245', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_header_top_phone', array(
            'label'             =>  __( 'Phone Number', 'medilac' ),
            'description'       =>  __( 'Add your business phone number', 'medilac' ),
            'section'           =>  'medilac_header_top',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( '+8801 7282 282', 'medilac' ),
            ),
        ) );
        
        /*****************************************************
         * Social Network Sectiol | Social Icon
         *****************************************************/
        $wp_customize->add_section( 'medilac_social_network', array(
            'title'             =>  __( 'Social Icons', 'medilac' ),
            'description'       =>  __( 'Social network icons and links. It will appear on header and footer section.', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        /**
         * Supported Social Network List as Array
         * 
         * If you want to add more, Use following filter
         * 
         * @Hooked: medilac_social_networks 10 inc/template-functions.php
         * 
         * @since 1.0.0.49
         */
        $social_networks = apply_filters( 'medilac_social_network_arr', array() );
        if( is_array( $social_networks ) && count( $social_networks) > 0 ){
            foreach ( $social_networks as $key => $value ){
                // Settings: Social -> Facebook
                $wp_customize->add_setting( 'medilac_social[social][' . $key . ']', array(
                    'default'           =>  __( '', 'medilac' ),
                    'sanitize_callback' => 'sanitize_text_field'
                ) );

                // Add control
                $wp_customize->add_control( 'medilac_header_top[social][' . $key . ']', array(
                    'label'             => $value,
                    'description'       => __( '', 'medilac' ),
                    'section'           => 'medilac_social_network',
                    'settings'          => 'medilac_social[social][' . $key . ']',
                    'priority'          => 10,
                    'type'              => 'text',
                    'capability'        => 'edit_theme_options',
                    'input_attrs'       => array( // Optional.
                        //'class'       => 'my-custom-class',

                        'placeholder'   => sprintf( __( 'Enter your %s profile link', 'medilac' ), $value ),
                    ),
                ) );
            }
        }
        
        // Settings: Topbar Right Area
        $wp_customize->add_setting( 'medilac_header_top[tobpar_right_area]', array(
            'default'           =>  'none',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $right_area_choices = array(
                    'c2a'    => __( 'Show ( Call To Action )', 'medilac' ),
                    'none'   => __( 'Hide', 'medilac' ),
            );
        if( class_exists( 'WooCommerce' ) ):
        $right_area_choices = array(
                    'c2a'    => __( 'Call To Action', 'medilac' ),
                    'minicart'   => __( 'Minicart for WooCoommerce', 'medilac' ),
                    'none'   => __( 'None', 'medilac' ),
            );    
        endif;
        // Add control
        $wp_customize->add_control( 'medilac_header_top[tobpar_right_area]', array(
            'label'             =>  __( 'Topbar Right Section', 'medilac' ),
            'description'       =>  __( '', 'medilac' ),
            'section'           =>  'medilac_header_top',
            'settings'          => 'medilac_header_top[tobpar_right_area]',
            'priority'          =>  10,
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $right_area_choices,
        ) );
        
        //Topbar Right Area - Minicart Label Text
        $wp_customize->add_setting( 'medilac_header_top[minicart_text]', array(
            'default'           =>  __( 'Shopping Cart', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        // Add control
        $wp_customize->add_control( 'medilac_header_top[minicart_text]', array(
            'label'             =>  __( 'Minicart - Label Text', 'medilac' ),
            'description'       =>  __( '', 'medilac' ),
            'section'           =>  'medilac_header_top',
            'settings'          => 'medilac_header_top[minicart_text]',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
        ) );
        
        
        //Topbar Right Area - Call to Action c2c Label
        $wp_customize->add_setting( 'medilac_header_top[c2a_label]', array(
            'default'           =>  __( 'Free Consultant', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        // Add control
        $wp_customize->add_control( 'medilac_header_top[c2a_label]', array(
            'label'             =>  __( 'Call To Action - Label Text', 'medilac' ),
            'description'       =>  __( '', 'medilac' ),
            'section'           =>  'medilac_header_top',
            'settings'          => 'medilac_header_top[c2a_label]',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
        ) );
        
        //Topbar Right Area - Call to Action c2c URL
        $wp_customize->add_setting( 'medilac_header_top[c2a_url]', array(
            'default'           =>  __( '#', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        // Add control
        $wp_customize->add_control( 'medilac_header_top[c2a_url]', array(
            'label'             =>  __( 'Call To Action URL', 'medilac' ),
            'description'       =>  __( '', 'medilac' ),
            'section'           =>  'medilac_header_top',
            'settings'          => 'medilac_header_top[c2a_url]',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
        ) );
        
        
        /********************************
         ****** Section for Header Section ******
         ********************************/
        $wp_customize->add_section( 'medilac_header', array(
            'title'             =>  __( 'Header', 'medilac' ),
            'description'       =>  __( 'Customize website header. Such: menu style, sticky menu, sticky topbar etc.', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        // Settings: medilac_header_sticky sticky header
        $wp_customize->add_setting( 'medilac_header_sticky', array(
            'default'           =>  'off',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        
        $sticky_choices = array(
                    'off'   => __( 'Disable', 'medilac' ),
                    'on'    => __( 'Enable', 'medilac' ),
                    'only_topbar'   => __( 'Sticky Only Topbar', 'medilac' ),
                    //'only_header'   => __( 'Only Header', 'medilac' ),
            );
        $sticky_choices = apply_filters( 'medilac_sticky_choices', $sticky_choices );
        $wp_customize->add_control( 'medilac_header_sticky', array(
            'label'             =>  __( 'Sticky Header Options', 'medilac' ),
            'description'       =>  __( 'You can enable or disable header sticky option. Also you can enable sticky option only for topbar ', 'medilac' ),
            'section'           =>  'medilac_header',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $sticky_choices,
        ) );
        
        // Settings: medilac_topbar_sticky
        $wp_customize->add_setting( 'medilac_header_width', array(
            'default'           =>  'fluid',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $header_width_choices = array(
                    'fluid'    => __( 'Fluid', 'medilac' ),
                    'container'   => __( 'Container', 'medilac' ),
                    'full-container'   => __( 'Container with Topbar', 'medilac' ),
            );
        $header_width_choices = apply_filters( 'medilac_header_width_choices', $header_width_choices );
        // Add control
        $wp_customize->add_control( 'medilac_header_width', array(
            'label'             =>  __( 'Header Width Section', 'medilac' ),
            'description'       =>  __( 'Select header option from below.', 'medilac' ),
            'section'           =>  'medilac_header',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $header_width_choices,
        ) );
        
        
        if( class_exists( 'WooCommerce' ) ):
        // Seach Box Switch // Settings: On/Off
        $wp_customize->add_setting( 'medilac_searchbox_switch', array(
            'default'           =>  __( 'on', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_search = array(
                    'on'   => __( 'WooCommerce Search Box', 'medilac' ),
                    'off'    => __( 'WordPress Search Box', 'medilac' ),
            );
        $choices_search = apply_filters( 'medilac_searchbox_switch_choices', $choices_search );

        // Add control
        $wp_customize->add_control( 'medilac_searchbox_switch', array(
            'label'             =>  __( 'Search Box Switch', 'medilac' ),
            'description'       =>  __( 'Choose your preferred Search box.', 'medilac' ),
            'section'           =>  'medilac_header',
            'settings'          => 'medilac_searchbox_switch',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_search,
        ) );
        endif;
        
        
        /************************************
         * Blog Setting
         *************************************/
        $wp_customize->add_section( 'medilac_blog', array(
            'title'             =>  __( 'Blog Setting', 'medilac' ),
            'description'       =>  __( 'Arrange Blog page, and customize setting', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        $wp_customize->add_setting( 'medilac_blog_layout', array(
            'default'           =>  '',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_blog = array(
                    ''   => __( 'Default', 'medilac' ),
                    'grid'    => __( 'Grid', 'medilac' ),
            );


        // Add control
        $wp_customize->add_control( 'medilac_blog_layout_sett', array(
            'label'             =>  __( 'Blog Layout', 'medilac' ),
            'description'       =>  __( 'Customizing Blog post view in Loop. Available: Grid and Default.', 'medilac' ),
            'section'           =>  'medilac_blog',
            'settings'          => 'medilac_blog_layout',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_blog,
        ) );
        
        $wp_customize->add_setting( 'medilac_blog_layout', array(
            'default'           =>  '',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_blog = array(
                    ''   => __( 'Default', 'medilac' ),
                    'grid'    => __( 'Grid', 'medilac' ),
            );

        $wp_customize->add_control( 'medilac_blog_layout_sett',
                array(
                    'label'             =>  __( 'Blog Layout', 'medilac' ),
                    'description'       =>  __( 'Customizing Blog post view in Loop. Available: Grid and Default.', 'medilac' ),
                    'section'           =>  'medilac_blog',
                    'settings'          => 'medilac_blog_layout',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => $choices_blog,
                )  
        );
        
        
        //On of Taxonomy
        $wp_customize->add_setting( 'medilac_blog_taxonomy', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        $wp_customize->add_control( 
            new Medilac_Toggle_Switch_Custom_control( $wp_customize, 'medilac_blog_taxonomy_sett',
                array(
                    'label'             =>  __( 'Taxonomy on', 'medilac' ),
                    'description'       =>  __( 'Taxonomy Show/Hide for blog header in loop page and in single post.', 'medilac' ),
                    'section'           =>  'medilac_blog',
                    'settings'          => 'medilac_blog_taxonomy',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'medilac' ),
                            ''    => __( 'Hide', 'medilac' ),
                    ),
                )
            ) 
        ); 
        
        //On of Posted by
        $wp_customize->add_setting( 'medilac_blog_posted_by', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        // Add control

        $wp_customize->add_control( 
            new Medilac_Toggle_Switch_Custom_control( $wp_customize, 'medilac_blog_posted_by_sett',
                array(
                    'label'             =>  __( 'Posted By', 'medilac' ),
                    'description'       =>  __( 'Posted By Show/Hide for blog header in loop page and in single post.', 'medilac' ),
                    'section'           =>  'medilac_blog',
                    'settings'          => 'medilac_blog_posted_by',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'medilac' ),
                            ''    => __( 'Hide', 'medilac' ),
                    ),
                )
            ) 
        );
        
        
        
        //On of Posted On
        $wp_customize->add_setting( 'medilac_blog_posted_on', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        // Add control
        $wp_customize->add_control( 
            new Medilac_Toggle_Switch_Custom_control( $wp_customize, 'medilac_blog_posted_on_sett',
                array(
                    'label'             =>  __( 'Posted On', 'medilac' ),
                    'description'       =>  __( 'Posted On (Post date time) Show/Hide for blog header in loop page and in single post.', 'medilac' ),
                    'section'           =>  'medilac_blog',
                    'settings'          => 'medilac_blog_posted_on',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'medilac' ),
                            ''    => __( 'Hide', 'medilac' ),
                    ),
                )
            ) 
        );
        
        //On of Navigation
        $wp_customize->add_setting( 'medilac_blog_nav', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        // Add control
        $wp_customize->add_control( 
            new Medilac_Toggle_Switch_Custom_control( $wp_customize, 'medilac_blog_nav_sett',
                array(
                    'label'             =>  __( 'Post Navigation', 'medilac' ),
                    'description'       =>  __( 'Show or Hide post navigation(Next/Prev Button) in single blog details.', 'medilac' ),
                    'section'           =>  'medilac_blog',
                    'settings'          => 'medilac_blog_nav',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'medilac' ),
                            ''    => __( 'Hide', 'medilac' ),
                    ),
                )
            ) 
        );       
        
        //On off Post Entry Footer
        $wp_customize->add_setting( 'medilac_blog_sigle_footer', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        // Add control
        $wp_customize->add_control( 
            new Medilac_Toggle_Switch_Custom_control( $wp_customize, 'medilac_blog_sigle_footer_sett',
                array(
                    'label'             =>  __( 'Post Entry Footer', 'medilac' ),
                    'description'       =>  __( 'Show or Hide post entry footer in single details page.', 'medilac' ),
                    'section'           =>  'medilac_blog',
                    'settings'          => 'medilac_blog_sigle_footer',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'medilac' ),
                            ''    => __( 'Hide', 'medilac' ),
                    ),
                )
            ) 
        );      
        
        
        
        
        /********************************
         ****** section 404 Page Section 404 SECTION ******
         ********************************/
        $wp_customize->add_section( 'medilac_404', array(
            'title'             =>  __( '404 Page', 'medilac' ),
            'description'       =>  __( 'Settings for 404 Page', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        if( class_exists( 'WooCommerce' ) ):
        // Seach Box Switch // Settings: On/Off
        $wp_customize->add_setting( 'medilac_searchbox_switch_404', array(
            'default'           =>  __( 'on', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_search = array(
                    'on'   => __( 'WooCommerce Search Box', 'medilac' ),
                    'off'    => __( 'WordPress Search Box', 'medilac' ),
            );
        $choices_search = apply_filters( 'medilac_searchbox_switch_choices', $choices_search );

        // Add control
        $wp_customize->add_control( 'medilac_searchbox_switch_404', array(
            'label'             =>  __( 'Search Box Switch', 'medilac' ),
            'description'       =>  __( 'Set your header search box. Default is WooCommerce product search box.', 'medilac' ),
            'section'           =>  'medilac_404',
            'settings'          => 'medilac_searchbox_switch_404',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_search,
        ) );
        endif;
        
        //Search Page Error Text
        $wp_customize->add_setting( 'medilac_404_error', array(
            'default'           =>  __( '404', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_404_error', array(
            'label'             =>  __( '404 TEXT', 'medilac' ),
            'section'           =>  'medilac_404',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => __( '404', 'medilac' ),
            ),    
        ) );
        
        
        //Search Page Error Message Text
        $wp_customize->add_setting( 'medilac_404_error_message', array(
            'default'           =>  __( 'Oops! There&rsquo;s not much left here for you', 'medilac' ),
            'sanitize_callback' => 'wp_kses_data'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_404_error_message', array(
            'label'             =>  __( 'Error Message Title', 'medilac' ),
            'section'           =>  'medilac_404',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => __( '404', 'medilac' ),
            ),    
        ) );

        //Search Page Error Message Text
        $wp_customize->add_setting( 'medilac_404_search_message', array(
            'default'           =>  __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'medilac' ),
            'sanitize_callback' => 'wp_kses_data'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_404_search_message', array(
            'label'             =>  __( 'Error Details Message', 'medilac' ),
            'description'       =>  'Few tag supported. Such: a,b,u,i,strong,span etc.',
            'section'           =>  'medilac_404',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => __( '404', 'medilac' ),
            ),    
        ) );
        
        
        
        //Search Page Back Button Text
        $wp_customize->add_setting( 'medilac_404_back_text', array(
            'default'           =>  __( 'Go Back Home', 'medilac' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_404_back_text', array(
            'label'             =>  __( 'Back button text', 'medilac' ),
            'section'           =>  'medilac_404',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => __( 'Go Back Home', 'medilac' ),
            ),    
        ) );
        
        
        
        //Search Page Back Button URL
        $wp_customize->add_setting( 'medilac_404_back_url', array(
            'default'           =>  get_home_url(),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_404_back_url', array(
            'label'             =>  __( 'Back button URL', 'medilac' ),
            'section'           =>  'medilac_404',
            'type'              =>  'url',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => get_home_url(),
            ),    
        ) );
        
        
        
        /********************************
         ****** Section for Footer ******
         ********************************/

        $wp_customize->add_section( 'medilac_footer', array(
            'title'             =>  __( 'Footer', 'medilac' ),
            'description'       =>  __( 'Settings for footer area. Make your footer area standalone from other parts of your site.', 'medilac' ),
            'panel'             =>  'medilac_theme_mod',
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        //Breadcrumb Image / Breadcrumb background image
        $default_bred_img = get_template_directory_uri() . '/assets/images/footer-bg.png';
        $wp_customize->add_setting( 'medilac_footer_image',
            array(
               'default' => $default_bred_img,
               'transport' => 'refresh',
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            'medilac_footer_image',
            array(
               'label' => __( 'Background Image', 'medilac' ),
               'description' => esc_html__( 'Upload a background image for footer area', 'medilac' ),
               'section' => 'medilac_footer',
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
        
        
        
        // Settings: medilac_topbar_sticky
        $wp_customize->add_setting( 'medilac_socket_switch', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
//        $wp_customize->add_control( 
//            new Medilac_Toggle_Switch_Custom_control( $wp_customize, 'medilac_socket_switch_stt',
//                array(
//                    'label'             =>  __( 'Socket options', 'medilac' ),
//                    'description'       =>  __( 'You can show or hide Socket section', 'medilac' ),
//                    'section'           =>  'medilac_footer',
//                    'settings'          => 'medilac_socket_switch',
//                    'type'              =>  'radio',
//                    'capability'        =>  'edit_theme_options',
//                    'choices'           => array(
//                            'on'    => __( 'Show', 'medilac' ),
//                            'off'   => __( 'Hide', 'medilac' ),
//                    ),
//                )
//            ) 
//        );
        $wp_customize->add_control( 'medilac_socket_switch', array(
            'label'             =>  __( 'Socket options', 'medilac' ),
            'description'       =>  __( 'You can show or hide Socket section', 'medilac' ),
            'section'           =>  'medilac_footer',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => array(
                    'on'    => __( 'Show', 'medilac' ),
                    'off'   => __( 'Hide', 'medilac' ),
            ),
        ) );
        
        // Settings: medilac_topbar_sticky
        $wp_customize->add_setting( 'medilac_socket_social', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_socket_social', array(
            'label'             =>  __( 'Social Link in Socket', 'medilac' ),
            'description'       =>  __( 'Show or hide Social media link in footer section', 'medilac' ),
            'section'           =>  'medilac_footer',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => array(
                    'on'    => __( 'Show', 'medilac' ),
                    'off'   => __( 'Hide', 'medilac' ),
            ),
        ) );
        
        
        // Settings: footer Content
        $wp_customize->add_setting( 'medilac_footer_copyright', array(
            'default'           =>  '',
            'sanitize_callback' => 'wp_kses_data'
        ) );
        
        // Add control
        $wp_customize->add_control( 'medilac_footer_copyright', array(
            'label'             =>  __( 'Copyright Text', 'medilac' ),
            'description'       =>  __( 'Chance Your Copyright Text. Also supports: a,strong,i etc tag.', 'medilac' ),
            'section'           =>  'medilac_footer',
            'type'              =>  'textarea',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                    'placeholder'    => __( 'Enter Copyright Text', 'medilac' ),
            ),
        ) );
        
        
        
        
    }
}

add_action( 'customize_register', 'medilac_theme_options_register' );



if( ! function_exists( 'medilac_style_manage' ) ){
    
    /**
     * Medilac Style Manager based on  
     * Theme's Customizer
     * 
     * We will change breadcrumb height
     * 
     * @param void
     */
    function medilac_style_manage() {
        $output = '<style id="medilac-style">';
        
                
        //For Breadcrumb Height
        $min_height = medilac_option( 'medilac_breadcrumb_min_height' );
        if( ! empty( $min_height ) ){
            $output .= ".breadcrumb-wrap .container{min-height: {$min_height}px;}\n";
        }
        
        
        $output .= '</style>';
        echo $output;
    }
}

add_action( 'wp_head', 'medilac_style_manage' ); //wp_enqueue_scripts