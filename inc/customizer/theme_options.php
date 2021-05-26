<?php
/**
 * Astha Theme Customizer For Theme Options
 *
 * @package Astha
 */

if( ! function_exists( 'astha_theme_options_register' ) ){
    
    /**
     * Astha Theme Options All Section , Settings, Controll will controll from here
     * Panel added at customizer.php file Theme->inc->customizer.php
     * 
     * @param type $wp_customize
     */
    function astha_theme_options_register( $wp_customize ){
                
        /**
         * Header / Footer Layout
         */
        $wp_customize->add_section( 'layout_sec', array(
            'title'             =>  __( 'Layout', 'astha' ),
            'description'       =>  __( 'Header, Footer and Sidebar layout settings. Customizing area of site\'s layout.', 'astha' ),
            'panel'             =>  'astha_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        //Topbar Layout Section
        $wp_customize->add_setting( 'layout_topbar', array(
            'default'           =>  'topbar-one',// __( 'header-two', 'astha' ),
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
            new Astha_Image_Radio_Control( $wp_customize, 'layout_topbar',
                array(
                   'label' => __( 'Topbar', 'astha' ),
                   'description' => esc_html__( 'Select Topbar Layout', 'astha' ),
                   'section' => 'layout_sec',
                   'choices' => astha_advance_choice_convert( $choices_topbar )
                )
            ) 
        );
        
        //Layout header
        $wp_customize->add_setting( 'layout_header', array(
            'default'           =>  'header-one',// __( 'header-two', 'astha' ),
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
 
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_header',
                array(
                   'label' => __( 'Header', 'astha' ),
                   'description' => esc_html__( 'Select Header Layout', 'astha' ),
                   'section' => 'layout_sec',
                   'choices' => astha_advance_choice_convert( $choices_header )
                )
            ) 
        );
        
        
        
        //Layout Sidebar
        $wp_customize->add_setting( 'layout_sidebar', array(
            'default'           =>  __( 'right-sidebar', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_sidebar = array(
            'no-sidebar'        => __( 'None', 'astha' ),
            'left-sidebar'      => __( 'Left Sidebar', 'astha' ),
            'right-sidebar'     => __( 'Right Sidebar', 'astha' ),
            );
        $choices_sidebar = apply_filters( 'astha_sidebar_layout_choises', $choices_sidebar );
        
//        
//        $wp_customize->add_control( 'layout_sidebar', array(
//            'label'             =>  __( 'Sidebar', 'astha' ),
//            'description'       =>  __( 'Left Sidebar or Right Sidebar or No Sidebar', 'astha' ),
//            'section'           =>  'layout_sec',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_sidebar,
//        ) );
//        
        
        $wp_customize->add_control( new Astha_Image_Radio_Control( $wp_customize, 'layout_sidebar',
            array(
               'label' => __( 'Sidebar', 'astha' ),
               'description' => esc_html__( 'Select Sidebar Layout', 'astha' ),
               'section' => 'layout_sec',
               'choices' => astha_advance_choice_convert( $choices_sidebar )
            )
         ) );
        
                
        
        //Layout Footer
        $wp_customize->add_setting( 'layout_footer', array(
            'default'           =>  'footer-dark',//__( 'footer-dark', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_footer = array(
            'footer-dark'        => __( 'Dark Footer', 'astha' ),
            'footer-light'        => __( 'Light Footer', 'astha' ),
            'none'              => __( 'None', 'astha' ),
            );
        $choices_footer = apply_filters( 'astha_footer_layout_choises', $choices_footer );
//        $wp_customize->add_control( 'layout_footer', array(
//            'label'             =>  __( 'Footer', 'astha' ),
//            'description'       =>  __( 'Set your Header Layout from pre-define', 'astha' ),
//            'section'           =>  'layout_sec',
//            'priority'          =>  10,
//            'type'              =>  'radio',
//            'capability'        =>  'edit_theme_options',
//            'choices'           => $choices_footer,
//        ) );
//        
        $wp_customize->add_control( 
            new Astha_Image_Radio_Control( $wp_customize, 'layout_footer',
                array(
                   'label' => __( 'Footer', 'astha' ),
                   'description' => esc_html__( 'Select Footer Layout', 'astha' ),
                   'section' => 'layout_sec',
                    //'type'  =>  'radio_image',
                   'choices' => astha_advance_choice_convert( $choices_footer )
                )
            ) 
        );
        
        
        
        
        /**
         * Header Header
         */
        $wp_customize->add_section( 'head_socket_sec', array(
            'title'             =>  __( 'Header', 'astha' ),
            'description'       =>  __( 'Control your website Header. Such: breadcrumb image, title, topbar content, social links etc.', 'astha' ),
            'panel'             =>  'astha_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        
        
        
        
        
        
        
        /*****************************************************
         * Breadcrumb
         *****************************************************/
        $wp_customize->add_section( 'breadcrumb_section', array(
            'title'             =>  __( 'Breadcrumb', 'astha' ),
            'description'       =>  __( 'Breadcrumb display setting', 'astha' ),
            'panel'             =>  'astha_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        // Settings: On/Off
        $wp_customize->add_setting( 'astha_breadcrumb_switch', array(
            'default'           =>  __( 'on', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_breadcrumb = array(
                    'on'   => __( 'Show', 'astha' ),
                    'off'    => __( 'Hide', 'astha' ),
            );
        $choices_breadcrumb = apply_filters( 'astha_breadcrumb_choises', $choices_breadcrumb );

/*
        $wp_customize->add_control( 
            new Astha_Toggle_Switch_Custom_control( $wp_customize, 'control_name',
                array(
                )
            ) 
        );

*/
        // Add control
        $wp_customize->add_control( 'breadcrumb_switch', 
                array(
                    'label'             =>  __( 'Breadcrumb', 'astha' ),
                    'description'       =>  __( 'Show or Hide Breadcrumb', 'astha' ),
                    'section'           =>  'breadcrumb_section',
                    'settings'          => 'astha_breadcrumb_switch',
                    'priority'          =>  10,
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => $choices_breadcrumb,
                )
        );
//        $wp_customize->add_control( 
//            new Astha_Toggle_Switch_Custom_control( $wp_customize, 'breadcrumb_switch',
//                array(
//                    'label'             =>  __( 'Breadcrumb', 'astha' ),
//                    'description'       =>  __( 'Show or Hide Breadcrumb', 'astha' ),
//                    'section'           =>  'breadcrumb_section',
//                    'settings'          => 'astha_breadcrumb_switch',
//                    'priority'          =>  10,
//                    'type'              =>  'radio',
//                    'capability'        =>  'edit_theme_options',
//                    'choices'           => $choices_breadcrumb,
//                )
//            ) 
//        );
        
        // Settings: Breadcrumb Style
        $wp_customize->add_setting( 'astha_breadcrumb_style', array(
            'default'           =>  __( 'breadcrumb-style-1', 'astha' ),
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
        $wp_customize->add_control( 'breadcrumb_style', array(
            'label'             =>  __( 'Change Style', 'astha' ),
            'description'       =>  __( 'Choose preferred style for breadcrumb.', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_style',
            'priority'          =>  10,
            'type'              =>  'select',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_breadcrumb_style,
        ) );
        
        //Breadcrumb Image / Breadcrumb background image
        $default_bred_img = get_template_directory_uri() . '/assets/images/breadcrumb-banner.png';
        $wp_customize->add_setting( 'astha_breadcrumb_image',
            array(
               'default' => $default_bred_img,
               'transport' => 'refresh',
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            'astha_breadcrumb_image',
            array(
               'label' => __( 'Background Image', 'astha' ),
               'description' => esc_html__( 'Upload a background image for breadcrumb', 'astha' ),
               'section' => 'breadcrumb_section',
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
        
        
        // Settings: Type Changing
        $wp_customize->add_setting( 'astha_breadcrumb_type', array(
            'default'           =>  __( 'dynamic', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_type', array(
            'label'             =>  __( 'Breadcrumb Option', 'astha' ),
            'description'       =>  __( 'Choose a breadcrumb option', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_type',
            'priority'          =>  10,
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => array(
                    'dynamic'   => __( 'Dynamic', 'astha' ),
                    'static'    => __( 'Manual', 'astha' ),
            ),
        ) );
        
        // Settings: Blog Page
        $wp_customize->add_setting( 'astha_breadcrumb_blog_title', array(
            'default'           =>  __( 'Blog Page', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_blog_text', array(
            'label'             =>  __( 'Blog Page', 'astha' ),
            'description'       =>  __( 'Manual Breadcrumb: Blog Page Title', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_blog_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Blog Page', 'astha' ),
            ),
        ) );
        
        // Settings: Shop Page
        $wp_customize->add_setting( 'astha_breadcrumb_shop_title', array(
            'default'           =>  __( 'Shop Page', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_shop_text', array(
            'label'             =>  __( 'Shop Page', 'astha' ),
            'description'       =>  __( 'Manual Breadcrumb: Shop Page Title', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_shop_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Shop Page', 'astha' ),
            ),
        ) );
        
        // Settings: Single Post Page
        $wp_customize->add_setting( 'astha_breadcrumb_single_post_title', array(
            'default'           =>  __( 'Single Post', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_post_text', array(
            'label'             =>  __( 'Single Post', 'astha' ),
            'description'       =>  __( 'Manual Breadcrumb: Single Post Page Title', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_single_post_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Single Post', 'astha' ),
            ),
        ) );
        
        // Settings: Search Page  //astha_breadcrumb_search_title
        $wp_customize->add_setting( 'astha_breadcrumb_search_title', array(
            'default'           =>  __( 'Search Result', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_search_page_text', array(
            'label'             =>  __( 'Search Page', 'astha' ),
            'description'       =>  __( 'Manual Breadcrumb: Search Page Title', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_search_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Page', 'astha' ),
            ),
        ) );
        
        // Settings: Page Page
        $wp_customize->add_setting( 'astha_breadcrumb_page_title', array(
            'default'           =>  __( 'Page', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_page_text', array(
            'label'             =>  __( 'Page', 'astha' ),
            'description'       =>  __( 'Manual Breadcrumb: WordPress Page Title', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_page_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'placeholder'   => __( 'Page', 'astha' ),
            ),
        ) );
        
        // Settings: Category
        $wp_customize->add_setting( 'astha_breadcrumb_category_title', array(
            'default'           =>  __( 'Category Page', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_category_text', array(
            'label'             =>  __( 'Category Page', 'astha' ),
            'description'       =>  __( 'Manual Breadcrumb: Category Archive Page Title', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_category_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( 'Category Page', 'astha' ),
            ),
        ) );
        
        // Settings: Tag
        $wp_customize->add_setting( 'astha_breadcrumb_tag_title', array(
            'default'           =>  __( 'Tag Page', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_tag_text', array(
            'label'             =>  __( 'Tag Page', 'astha' ),
            'description'       =>  __( 'Manual Breadcrumb: Tag Archive Page Title', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_tag_title',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( 'Tag Page', 'astha' ),
            ),
        ) );
        
        
        // Settings: Breadcrumb Height
        $wp_customize->add_setting( 'astha_breadcrumb_min_height', array(
            'default'           =>  300,
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'breadcrumb_minheight', array(
            'label'             =>  __( 'Breadcrumb Minimum Height', 'astha' ),
            'description'       =>  __( 'Input numeric value as minimum heigh. This will be considered as px.', 'astha' ),
            'section'           =>  'breadcrumb_section',
            'settings'          => 'astha_breadcrumb_min_height',
            'priority'          =>  10,
            'type'              =>  'number',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                'min'       => 100,
                
                'placeholder'   => __( 'Tag Page', 'astha' ),
            ),
        ) );
        
        
        
        /*****************************************************
         * Header Top Topbar
         *****************************************************/
        $wp_customize->add_section( 'astha_header_top', array(
            'title'             =>  __( 'Header Top', 'astha' ),
            'description'       =>  __( 'Customize and Change Topbar content or element.', 'astha' ),
            'panel'             =>  'astha_theme_mod',
            'priority'          =>  160,
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        // Settings: Email
        $wp_customize->add_setting( 'astha_header_top_email', array(
            'default'           =>  __( 'contact@astha.com', 'astha' ),
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_email'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_header_top_email', array(
            'label'             =>  __( 'Email', 'astha' ),
            'description'       =>  __( 'Add your business email', 'astha' ),
            'section'           =>  'astha_header_top',
            'priority'          =>  10,
            'type'              =>  'email',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( 'example@domain.com', 'astha' ),
            ),
        ) );
        
        // Settings: Phone Text
        $wp_customize->add_setting( 'astha_header_top_phone_text', array(
            'default'           =>  __( 'Have any questions? Call Now: (800) 123-1245', 'astha' ),
            'sanitize_callback' => 'wp_kses_data'
        ) );

        // Add control
        $wp_customize->add_control( 'astha_header_top_phone_text', array(
            'label'             =>  __( 'Intro Text', 'astha' ),
            'description'       =>  __( 'Add some intro text', 'astha' ),
            'section'           =>  'astha_header_top',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( 'Have any questions? Call Now:', 'astha' ),
            ),
        ) );
        
        // Settings: Phone
        $wp_customize->add_setting( 'astha_header_top_phone', array(
            'default'           =>  __( '(800) 123-1245', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_header_top_phone', array(
            'label'             =>  __( 'Phone Number', 'astha' ),
            'description'       =>  __( 'Add your business phone number', 'astha' ),
            'section'           =>  'astha_header_top',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array( // Optional.
                //'class'       => 'my-custom-class',
                
                'placeholder'   => __( '+8801 7282 282', 'astha' ),
            ),
        ) );
        
        /*****************************************************
         * Social Network Sectiol | Social Icon
         *****************************************************/
        $wp_customize->add_section( 'astha_social_network', array(
            'title'             =>  __( 'Social Icons', 'astha' ),
            'description'       =>  __( 'Social network icons and links. It will appear on header and footer section.', 'astha' ),
            'panel'             =>  'astha_theme_mod',
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
         * @Hooked: astha_social_networks 10 inc/template-functions.php
         * 
         * @since 1.0.0.49
         */
        $social_networks = apply_filters( 'astha_social_network_arr', array() );
        if( is_array( $social_networks ) && count( $social_networks) > 0 ){
            foreach ( $social_networks as $key => $value ){
                // Settings: Social -> Facebook
                $wp_customize->add_setting( 'astha_social[social][' . $key . ']', array(
                    'default'           =>  __( '', 'astha' ),
                    'sanitize_callback' => 'sanitize_text_field'
                ) );

                // Add control
                $wp_customize->add_control( 'astha_header_top[social][' . $key . ']', array(
                    'label'             => $value,
                    'description'       => __( '', 'astha' ),
                    'section'           => 'astha_social_network',
                    'settings'          => 'astha_social[social][' . $key . ']',
                    'priority'          => 10,
                    'type'              => 'text',
                    'capability'        => 'edit_theme_options',
                    'input_attrs'       => array( // Optional.
                        //'class'       => 'my-custom-class',

                        'placeholder'   => sprintf( __( 'Enter your %s profile link', 'astha' ), $value ),
                    ),
                ) );
            }
        }
        
        // Settings: Topbar Right Area
        $wp_customize->add_setting( 'astha_header_top[tobpar_right_area]', array(
            'default'           =>  'none',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $right_area_choices = array(
                    'c2a'    => __( 'Show ( Call To Action )', 'astha' ),
                    'none'   => __( 'Hide', 'astha' ),
            );
        if( class_exists( 'WooCommerce' ) ):
        $right_area_choices = array(
                    'c2a'    => __( 'Call To Action', 'astha' ),
                    'minicart'   => __( 'Minicart for WooCoommerce', 'astha' ),
                    'none'   => __( 'None', 'astha' ),
            );    
        endif;
        // Add control
        $wp_customize->add_control( 'astha_header_top[tobpar_right_area]', array(
            'label'             =>  __( 'Topbar Right Section', 'astha' ),
            'description'       =>  __( '', 'astha' ),
            'section'           =>  'astha_header_top',
            'settings'          => 'astha_header_top[tobpar_right_area]',
            'priority'          =>  10,
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $right_area_choices,
        ) );
        
        //Topbar Right Area - Minicart Label Text
        $wp_customize->add_setting( 'astha_header_top[minicart_text]', array(
            'default'           =>  __( 'Shopping Cart', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        // Add control
        $wp_customize->add_control( 'astha_header_top[minicart_text]', array(
            'label'             =>  __( 'Minicart - Label Text', 'astha' ),
            'description'       =>  __( '', 'astha' ),
            'section'           =>  'astha_header_top',
            'settings'          => 'astha_header_top[minicart_text]',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
        ) );
        
        
        //Topbar Right Area - Call to Action c2c Label
        $wp_customize->add_setting( 'astha_header_top[c2a_label]', array(
            'default'           =>  __( 'Free Consultant', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        // Add control
        $wp_customize->add_control( 'astha_header_top[c2a_label]', array(
            'label'             =>  __( 'Call To Action - Label Text', 'astha' ),
            'description'       =>  __( '', 'astha' ),
            'section'           =>  'astha_header_top',
            'settings'          => 'astha_header_top[c2a_label]',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
        ) );
        
        //Topbar Right Area - Call to Action c2c URL
        $wp_customize->add_setting( 'astha_header_top[c2a_url]', array(
            'default'           =>  __( '#', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        // Add control
        $wp_customize->add_control( 'astha_header_top[c2a_url]', array(
            'label'             =>  __( 'Call To Action URL', 'astha' ),
            'description'       =>  __( '', 'astha' ),
            'section'           =>  'astha_header_top',
            'settings'          => 'astha_header_top[c2a_url]',
            'priority'          =>  10,
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
        ) );
        
        
        /********************************
         ****** Section for Header Section ******
         ********************************/
        $wp_customize->add_section( 'astha_header', array(
            'title'             =>  __( 'Header', 'astha' ),
            'description'       =>  __( 'Customize website header. Such: menu style, sticky menu, sticky topbar etc.', 'astha' ),
            'panel'             =>  'astha_theme_mod',
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        // Settings: astha_header_sticky sticky header
        $wp_customize->add_setting( 'astha_header_sticky', array(
            'default'           =>  'off',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        
        $sticky_choices = array(
                    'off'   => __( 'Disable', 'astha' ),
                    'on'    => __( 'Enable', 'astha' ),
                    'only_topbar'   => __( 'Sticky Only Topbar', 'astha' ),
                    //'only_header'   => __( 'Only Header', 'astha' ),
            );
        $sticky_choices = apply_filters( 'astha_sticky_choices', $sticky_choices );
        $wp_customize->add_control( 'astha_header_sticky', array(
            'label'             =>  __( 'Sticky Header Options', 'astha' ),
            'description'       =>  __( 'You can enable or disable header sticky option. Also you can enable sticky option only for topbar ', 'astha' ),
            'section'           =>  'astha_header',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $sticky_choices,
        ) );
        
        // Settings: astha_topbar_sticky
        $wp_customize->add_setting( 'astha_header_width', array(
            'default'           =>  'fluid',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $header_width_choices = array(
                    'fluid'    => __( 'Fluid', 'astha' ),
                    'container'   => __( 'Container', 'astha' ),
                    'full-container'   => __( 'Container with Topbar', 'astha' ),
            );
        $header_width_choices = apply_filters( 'astha_header_width_choices', $header_width_choices );
        // Add control
        $wp_customize->add_control( 'astha_header_width', array(
            'label'             =>  __( 'Header Width Section', 'astha' ),
            'description'       =>  __( 'Select header option from below.', 'astha' ),
            'section'           =>  'astha_header',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $header_width_choices,
        ) );
        
        
        if( class_exists( 'WooCommerce' ) ):
        // Seach Box Switch // Settings: On/Off
        $wp_customize->add_setting( 'astha_searchbox_switch', array(
            'default'           =>  __( 'on', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_search = array(
                    'on'   => __( 'WooCommerce Search Box', 'astha' ),
                    'off'    => __( 'WordPress Search Box', 'astha' ),
            );
        $choices_search = apply_filters( 'astha_searchbox_switch_choices', $choices_search );

        // Add control
        $wp_customize->add_control( 'astha_searchbox_switch', array(
            'label'             =>  __( 'Search Box Switch', 'astha' ),
            'description'       =>  __( 'Choose your preferred Search box.', 'astha' ),
            'section'           =>  'astha_header',
            'settings'          => 'astha_searchbox_switch',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_search,
        ) );
        endif;
        
        
        /************************************
         * Blog Setting
         *************************************/
        $wp_customize->add_section( 'astha_blog', array(
            'title'             =>  __( 'Blog Setting', 'astha' ),
            'description'       =>  __( 'Arrange Blog page, and customize setting', 'astha' ),
            'panel'             =>  'astha_theme_mod',
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        $wp_customize->add_setting( 'astha_blog_layout', array(
            'default'           =>  '',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_blog = array(
                    ''   => __( 'Default', 'astha' ),
                    'grid'    => __( 'Grid', 'astha' ),
            );


        // Add control
        $wp_customize->add_control( 'astha_blog_layout_sett', array(
            'label'             =>  __( 'Blog Layout', 'astha' ),
            'description'       =>  __( 'Customizing Blog post view in Loop. Available: Grid and Default.', 'astha' ),
            'section'           =>  'astha_blog',
            'settings'          => 'astha_blog_layout',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_blog,
        ) );
        
        $wp_customize->add_setting( 'astha_blog_layout', array(
            'default'           =>  '',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_blog = array(
                    ''   => __( 'Default', 'astha' ),
                    'grid'    => __( 'Grid', 'astha' ),
            );

        $wp_customize->add_control( 'astha_blog_layout_sett',
                array(
                    'label'             =>  __( 'Blog Layout', 'astha' ),
                    'description'       =>  __( 'Customizing Blog post view in Loop. Available: Grid and Default.', 'astha' ),
                    'section'           =>  'astha_blog',
                    'settings'          => 'astha_blog_layout',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => $choices_blog,
                )  
        );
        
        
        //On of Taxonomy
        $wp_customize->add_setting( 'astha_blog_taxonomy', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        $wp_customize->add_control( 
            new Astha_Toggle_Switch_Custom_control( $wp_customize, 'astha_blog_taxonomy_sett',
                array(
                    'label'             =>  __( 'Taxonomy on', 'astha' ),
                    'description'       =>  __( 'Taxonomy Show/Hide for blog header in loop page and in single post.', 'astha' ),
                    'section'           =>  'astha_blog',
                    'settings'          => 'astha_blog_taxonomy',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'astha' ),
                            ''    => __( 'Hide', 'astha' ),
                    ),
                )
            ) 
        ); 
        
        //On of Posted by
        $wp_customize->add_setting( 'astha_blog_posted_by', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        // Add control

        $wp_customize->add_control( 
            new Astha_Toggle_Switch_Custom_control( $wp_customize, 'astha_blog_posted_by_sett',
                array(
                    'label'             =>  __( 'Posted By', 'astha' ),
                    'description'       =>  __( 'Posted By Show/Hide for blog header in loop page and in single post.', 'astha' ),
                    'section'           =>  'astha_blog',
                    'settings'          => 'astha_blog_posted_by',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'astha' ),
                            ''    => __( 'Hide', 'astha' ),
                    ),
                )
            ) 
        );
        
        
        
        //On of Posted On
        $wp_customize->add_setting( 'astha_blog_posted_on', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        // Add control
        $wp_customize->add_control( 
            new Astha_Toggle_Switch_Custom_control( $wp_customize, 'astha_blog_posted_on_sett',
                array(
                    'label'             =>  __( 'Posted On', 'astha' ),
                    'description'       =>  __( 'Posted On (Post date time) Show/Hide for blog header in loop page and in single post.', 'astha' ),
                    'section'           =>  'astha_blog',
                    'settings'          => 'astha_blog_posted_on',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'astha' ),
                            ''    => __( 'Hide', 'astha' ),
                    ),
                )
            ) 
        );
        
        //On of Navigation
        $wp_customize->add_setting( 'astha_blog_nav', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        // Add control
        $wp_customize->add_control( 
            new Astha_Toggle_Switch_Custom_control( $wp_customize, 'astha_blog_nav_sett',
                array(
                    'label'             =>  __( 'Post Navigation', 'astha' ),
                    'description'       =>  __( 'Show or Hide post navigation(Next/Prev Button) in single blog details.', 'astha' ),
                    'section'           =>  'astha_blog',
                    'settings'          => 'astha_blog_nav',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'astha' ),
                            ''    => __( 'Hide', 'astha' ),
                    ),
                )
            ) 
        );       
        
        //On off Post Entry Footer
        $wp_customize->add_setting( 'astha_blog_sigle_footer', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        

        // Add control
        $wp_customize->add_control( 
            new Astha_Toggle_Switch_Custom_control( $wp_customize, 'astha_blog_sigle_footer_sett',
                array(
                    'label'             =>  __( 'Post Entry Footer', 'astha' ),
                    'description'       =>  __( 'Show or Hide post entry footer in single details page.', 'astha' ),
                    'section'           =>  'astha_blog',
                    'settings'          => 'astha_blog_sigle_footer',
                    'type'              =>  'radio',
                    'capability'        =>  'edit_theme_options',
                    'choices'           => array(
                            'on'   => __( 'Show', 'astha' ),
                            ''    => __( 'Hide', 'astha' ),
                    ),
                )
            ) 
        );      
        
        
        
        
        /********************************
         ****** section 404 Page Section 404 SECTION ******
         ********************************/
        $wp_customize->add_section( 'astha_404', array(
            'title'             =>  __( '404 Page', 'astha' ),
            'description'       =>  __( 'Settings for 404 Page', 'astha' ),
            'panel'             =>  'astha_theme_mod',
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        if( class_exists( 'WooCommerce' ) ):
        // Seach Box Switch // Settings: On/Off
        $wp_customize->add_setting( 'astha_searchbox_switch_404', array(
            'default'           =>  __( 'on', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $choices_search = array(
                    'on'   => __( 'WooCommerce Search Box', 'astha' ),
                    'off'    => __( 'WordPress Search Box', 'astha' ),
            );
        $choices_search = apply_filters( 'astha_searchbox_switch_choices', $choices_search );

        // Add control
        $wp_customize->add_control( 'astha_searchbox_switch_404', array(
            'label'             =>  __( 'Search Box Switch', 'astha' ),
            'description'       =>  __( 'Set your header search box. Default is WooCommerce product search box.', 'astha' ),
            'section'           =>  'astha_404',
            'settings'          => 'astha_searchbox_switch_404',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => $choices_search,
        ) );
        endif;
        
        //Search Page Error Text
        $wp_customize->add_setting( 'astha_404_error', array(
            'default'           =>  __( '404', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_404_error', array(
            'label'             =>  __( '404 TEXT', 'astha' ),
            'section'           =>  'astha_404',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => __( '404', 'astha' ),
            ),    
        ) );
        
        
        //Search Page Error Message Text
        $wp_customize->add_setting( 'astha_404_error_message', array(
            'default'           =>  __( 'Oops! There&rsquo;s not much left here for you', 'astha' ),
            'sanitize_callback' => 'wp_kses_data'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_404_error_message', array(
            'label'             =>  __( 'Error Message Title', 'astha' ),
            'section'           =>  'astha_404',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => __( '404', 'astha' ),
            ),    
        ) );

        //Search Page Error Message Text
        $wp_customize->add_setting( 'astha_404_search_message', array(
            'default'           =>  __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'astha' ),
            'sanitize_callback' => 'wp_kses_data'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_404_search_message', array(
            'label'             =>  __( 'Error Details Message', 'astha' ),
            'description'       =>  'Few tag supported. Such: a,b,u,i,strong,span etc.',
            'section'           =>  'astha_404',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => __( '404', 'astha' ),
            ),    
        ) );
        
        
        
        //Search Page Back Button Text
        $wp_customize->add_setting( 'astha_404_back_text', array(
            'default'           =>  __( 'Go Back Home', 'astha' ),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_404_back_text', array(
            'label'             =>  __( 'Back button text', 'astha' ),
            'section'           =>  'astha_404',
            'type'              =>  'text',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => __( 'Go Back Home', 'astha' ),
            ),    
        ) );
        
        
        
        //Search Page Back Button URL
        $wp_customize->add_setting( 'astha_404_back_url', array(
            'default'           =>  get_home_url(),
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_404_back_url', array(
            'label'             =>  __( 'Back button URL', 'astha' ),
            'section'           =>  'astha_404',
            'type'              =>  'url',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                'placeholder'   => get_home_url(),
            ),    
        ) );
        
        
        
        /********************************
         ****** Section for Footer ******
         ********************************/

        $wp_customize->add_section( 'astha_footer', array(
            'title'             =>  __( 'Footer', 'astha' ),
            'description'       =>  __( 'Settings for footer area. Make your footer area standalone from other parts of your site.', 'astha' ),
            'panel'             =>  'astha_theme_mod',
            'capability'        =>  'edit_theme_options',
            'theme_support'     => '',
            'active_callback'   => '',
            
        ) );
        
        //Breadcrumb Image / Breadcrumb background image
        $default_bred_img = get_template_directory_uri() . '/assets/images/footer-bg.png';
        $wp_customize->add_setting( 'astha_footer_image',
            array(
               'default' => $default_bred_img,
               'transport' => 'refresh',
               'sanitize_callback' => 'esc_url_raw'
            )
         );

         $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            'astha_footer_image',
            array(
               'label' => __( 'Background Image', 'astha' ),
               'description' => esc_html__( 'Upload a background image for footer area', 'astha' ),
               'section' => 'astha_footer',
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
        
        
        
        // Settings: astha_topbar_sticky
        $wp_customize->add_setting( 'astha_socket_switch', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
//        $wp_customize->add_control( 
//            new Astha_Toggle_Switch_Custom_control( $wp_customize, 'astha_socket_switch_stt',
//                array(
//                    'label'             =>  __( 'Socket options', 'astha' ),
//                    'description'       =>  __( 'You can show or hide Socket section', 'astha' ),
//                    'section'           =>  'astha_footer',
//                    'settings'          => 'astha_socket_switch',
//                    'type'              =>  'radio',
//                    'capability'        =>  'edit_theme_options',
//                    'choices'           => array(
//                            'on'    => __( 'Show', 'astha' ),
//                            'off'   => __( 'Hide', 'astha' ),
//                    ),
//                )
//            ) 
//        );
        $wp_customize->add_control( 'astha_socket_switch', array(
            'label'             =>  __( 'Socket options', 'astha' ),
            'description'       =>  __( 'You can show or hide Socket section', 'astha' ),
            'section'           =>  'astha_footer',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => array(
                    'on'    => __( 'Show', 'astha' ),
                    'off'   => __( 'Hide', 'astha' ),
            ),
        ) );
        
        // Settings: astha_topbar_sticky
        $wp_customize->add_setting( 'astha_socket_social', array(
            'default'           =>  'on',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_socket_social', array(
            'label'             =>  __( 'Social Link in Socket', 'astha' ),
            'description'       =>  __( 'Show or hide Social media link in footer section', 'astha' ),
            'section'           =>  'astha_footer',
            'type'              =>  'radio',
            'capability'        =>  'edit_theme_options',
            'choices'           => array(
                    'on'    => __( 'Show', 'astha' ),
                    'off'   => __( 'Hide', 'astha' ),
            ),
        ) );
        
        
        // Settings: footer Content
        $wp_customize->add_setting( 'astha_footer_copyright', array(
            'default'           =>  '',
            'sanitize_callback' => 'wp_kses_data'
        ) );
        
        // Add control
        $wp_customize->add_control( 'astha_footer_copyright', array(
            'label'             =>  __( 'Copyright Text', 'astha' ),
            'description'       =>  __( 'Chance Your Copyright Text. Also supports: a,strong,i etc tag.', 'astha' ),
            'section'           =>  'astha_footer',
            'type'              =>  'textarea',
            'capability'        =>  'edit_theme_options',
            'input_attrs'       => array(
                    'placeholder'    => __( 'Enter Copyright Text', 'astha' ),
            ),
        ) );
        
        
        
        
    }
}

add_action( 'customize_register', 'astha_theme_options_register' );



if( ! function_exists( 'astha_style_manage' ) ){
    
    /**
     * Astha Style Manager based on  
     * Theme's Customizer
     * 
     * We will change breadcrumb height
     * 
     * @param void
     */
    function astha_style_manage() {
        $output = '<style id="astha-style">';
        
                
        //For Breadcrumb Height
        $min_height = astha_option( 'astha_breadcrumb_min_height' );
        if( ! empty( $min_height ) ){
            $output .= ".breadcrumb-wrap .container{min-height: {$min_height}px;}\n";
        }
        
        
        $output .= '</style>';
        echo $output;
    }
}

add_action( 'wp_head', 'astha_style_manage' ); //wp_enqueue_scripts