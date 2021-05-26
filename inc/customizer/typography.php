<?php
/**
 * Medilac Theme Customizer For Fonts Controlling
 *
 * @package Medilac
 */

if( ! function_exists( 'medilac_typography_register' ) ){
    
    /**
     * Google Fonts and System Fonts will be controll from here
     * Added Panel Here
     * Added Section Here
     * Probable Section:
     * *** Body Fonts and style
     * *** *** Font Body such: p,input,textarea etc
     * ///& SPECIAL///
     * *** *** Header
     * *** *** Page Body/Content
     * *** *** Footer 
     * 
     * *** Header Fonts and Style
     * *** *** H1-H6
     * ///SPECIAL///
     * *** *** H1
     * *** *** H2
     * *** *** H3
     * *** *** H4
     * *** *** H5
     * *** *** H6
     * 
     * *** Custom Selector Fonts and Style
     * 
     * Using Link Style like following Link 
     * https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;1,100;1,200&display=swap
     * @param type $wp_customize Array
     */
    function medilac_typography_register( $wp_customize ){

        /**
         * Panel for Medilac Typography
         */
        $wp_customize->add_panel( 'medilac_typo', array(
            'title' => __( 'Typography', 'medilac' ),
            'description' => esc_html__( 'Medilac Typography control. User will able to Control of whole site Typography from here. There are some System Fonts and rest all are Google fonts.', 'medilac' ),
            'priority' => 1,
            'capability' => 'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
        ) );
        
        
        /**
         * Section of BODY FONTS AND STYLE
         */
        $wp_customize->add_section( 'medilac_typo_root', array(
            'title'         =>  __( 'Theme Basic Font', 'medilac' ),
            'description'   =>  __( 'Chose your website basic font. It will appaly on p, span, input, textarea, button etc tag.', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Primary Font for Root Font style
        $wp_customize->add_setting( 'medilac_root_font[--medilac-font-primary]', array(
            'default'       =>  __( 'Work Sans', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_root_font[--medilac-font-primary]', array(
            'label'         =>  __( 'Primary Font', 'medilac' ),
            'description'   =>  __( 'Our receommeded Primary font is: Work Sanse. It will appaly on p, span, input, textarea, button etc tag.', 'medilac' ),
            'settings'      => 'medilac_root_font[--medilac-font-primary]',
            'section'       =>  'medilac_typo_root',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        
        //Secondary Font for Root Font style
        $wp_customize->add_setting( 'medilac_root_font[--medilac-font-secondary]', array(
            'default'       =>  __( 'Roboto', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_root_font[--medilac-font-secondary]', array(
            'label'         =>  __( 'Secondary Font', 'medilac' ),
            'description'   =>  __( 'Our receommeded Secondary font is: Work Sanse. It will appaly on p, span, input, textarea, button etc tag.', 'medilac' ),
            'settings'      => 'medilac_root_font[--medilac-font-secondary]',
            'section'       =>  'medilac_typo_root',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        
        
        
        
        
        
        /**
         * Section of BODY FONTS AND STYLE
         */
        $wp_customize->add_section( 'medilac_typo_body', array(
            'title'         =>  __( 'Body Text', 'medilac' ),
            'description'   =>  __( 'Override your basic Typography. Such: for p,span,input,textarea,button etc tag.', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_body_font[font-family]', array(
            'default'       =>  '',//__( 'Work Sans', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_bd_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_body_font[font-family]',
            'section'       =>  'medilac_typo_body',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        /**************************/
//Why I have remove this part. Because of this part, after set font size on by, site is not working properly
//mainly for icon font
        //Font Size
        $wp_customize->add_setting( 'medilac_body_font[font-size]', array(
            'default'       =>  '',// old 'default'       =>  15,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_bd_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_typo_body',
            'priority'      =>  10,
            'settings'      =>  'medilac_body_font[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        
        
        
        //Text Transform
        $wp_customize->add_setting( 'medilac_body_font[text-transform]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_bd_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_typo_body',
            'settings'       =>  'medilac_body_font[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_body_font[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_bd_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_typo_body',
            'settings'       =>  'medilac_body_font[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_body_font[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_bd_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_typo_body',
            'settings'       =>  'medilac_body_font[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        //*************************************************/
        
        
        
        
        
        
        
        /**
         * Maybe no need this part. 
         * This part er jinis ebong ager body text a diye dibo
         * 
         * Section: All P Content
         *
        $wp_customize->add_section( 'medilac_content_text', array(
            'title'         =>  __( 'Paragraph - Text', 'medilac' ),
            'description'   =>  __( 'Control your website Heading Typography', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_content_text[font-family]', array(
            'default'       =>  '',// old 'default'       =>  '',//__( 'Roboto', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_p_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_content_text[font-family]',
            'section'       =>  'medilac_content_text',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        //Font Size
        $wp_customize->add_setting( 'medilac_content_text[font-size]', array(
            'default'       =>  '',// old 'default'       =>  36,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_p_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_content_text',
            'priority'      =>  10,
            'settings'      =>  'medilac_content_text[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        
        
        
        //Text Transform
        $wp_customize->add_setting( 'medilac_content_text[text-transform]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_p_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_content_text',
            'settings'       =>  'medilac_content_text[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_content_text[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_p_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_content_text',
            'settings'       =>  'medilac_content_text[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_content_text[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_p_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_content_text',
            'settings'       =>  'medilac_content_text[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        
        //*************************************************/
        
        
        
        
        
        
        
        
        
        
        /**
         * Section: All Headings
         */
        $wp_customize->add_section( 'medilac_heading', array(
            'title'         =>  __( 'All Headings', 'medilac' ),
            'description'   =>  __( 'Override Heading Typography', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_heading[font-family]', array(
            'default'       =>  '',// old 'default'       =>  '',//__( 'Roboto', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_h_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_heading[font-family]',
            'section'       =>  'medilac_heading',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        //Font Size
        $wp_customize->add_setting( 'medilac_heading[font-size]', array(
            'default'       =>  '',// old 'default'       =>  36,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_h_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_heading',
            'priority'      =>  10,
            'settings'      =>  'medilac_heading[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        
        
        
        //Text Transform
        $wp_customize->add_setting( 'medilac_heading[text-transform]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_heading',
            'settings'       =>  'medilac_heading[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_heading[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_heading',
            'settings'       =>  'medilac_heading[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_heading[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_heading',
            'settings'       =>  'medilac_heading[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        
        /**
         * Section: Heading 1
         */
        $wp_customize->add_section( 'medilac_h1', array(
            'title'         =>  __( 'Heading 1 (H1)', 'medilac' ),
            'description'   =>  __( 'Override H1 Typography.', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_h1[font-family]', array(
            'default'       =>  '',//__( 'Work Sans', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_h1_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_h1[font-family]',
            'section'       =>  'medilac_h1',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        //Font Size
        $wp_customize->add_setting( 'medilac_h1[font-size]', array(
            'default'       =>  '',// old 'default'       =>  36,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_h1_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_h1',
            'priority'      =>  10,
            'settings'      =>  'medilac_h1[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        
        //Text Transform
        $wp_customize->add_setting( 'medilac_h1[text-transform]', array(
            'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h1_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_h1',
            'settings'       =>  'medilac_h1[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_h1[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h1_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_h1',
            'settings'       =>  'medilac_h1[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_h1[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h1_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_h1',
            'settings'       =>  'medilac_h1[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        
        
        /**
         * Section: Heading 2
         */
        $wp_customize->add_section( 'medilac_h2', array(
            'title'         =>  __( 'Heading 2 (H2)', 'medilac' ),
            'description'   =>  __( 'Override H2 Typography.', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_h2[font-family]', array(
            'default'       =>  '',//__( 'Work Sans', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_h2_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_h2[font-family]',
            'section'       =>  'medilac_h2',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        //Font Size
        $wp_customize->add_setting( 'medilac_h2[font-size]', array(
            'default'       =>  '',// old 'default'       =>  26,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_h2_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_h2',
            'priority'      =>  10,
            'settings'      =>  'medilac_h2[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        

        
        //Text Transform
        $wp_customize->add_setting( 'medilac_h2[text-transform]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h2_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_h2',
            'settings'       =>  'medilac_h2[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_h2[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h2_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_h2',
            'settings'       =>  'medilac_h2[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_h2[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h2_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_h2',
            'settings'       =>  'medilac_h2[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        
        /**
         * Section: Heading 3
         */
        $wp_customize->add_section( 'medilac_h3', array(
            'title'         =>  __( 'Heading 3 (H3)', 'medilac' ),
            'description'   =>  __( 'Override H3 Typography.', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_h3[font-family]', array(
            'default'       =>  '',//__( 'Work Sans', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_h3_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_h3[font-family]',
            'section'       =>  'medilac_h3',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        //Font Size
        $wp_customize->add_setting( 'medilac_h3[font-size]', array(
            'default'       =>  '',// old 'default'       =>  20,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_h3_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_h3',
            'priority'      =>  10,
            'settings'      =>  'medilac_h3[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        
        
        
        //Text Transform
        $wp_customize->add_setting( 'medilac_h3[text-transform]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h3_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_h3',
            'settings'       =>  'medilac_h3[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_h3[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h3_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_h3',
            'settings'       =>  'medilac_h3[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_h3[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h3_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_h3',
            'settings'       =>  'medilac_h3[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        
        /**
         * Section: Heading 4
         */
        $wp_customize->add_section( 'medilac_h4', array(
            'title'         =>  __( 'Heading 4 (H4)', 'medilac' ),
            'description'   =>  __( 'Override H4 Typography.', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_h4[font-family]', array(
            'default'       =>  '',//__( 'Work Sans', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_h4_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_h4[font-family]',
            'section'       =>  'medilac_h4',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        //Font Size
        $wp_customize->add_setting( 'medilac_h4[font-size]', array(
            'default'       =>  '',// old 'default'       =>  20,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_h4_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_h4',
            'priority'      =>  10,
            'settings'      =>  'medilac_h4[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        
        
        //Text Transform
        $wp_customize->add_setting( 'medilac_h4[text-transform]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h4_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_h4',
            'settings'       =>  'medilac_h4[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_h4[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h4_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_h4',
            'settings'       =>  'medilac_h4[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_h4[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h4_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_h4',
            'settings'       =>  'medilac_h4[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        
        /**
         * Section: Heading 5
         */
        $wp_customize->add_section( 'medilac_h5', array(
            'title'         =>  __( 'Heading 5 (H5)', 'medilac' ),
            'description'   =>  __( 'Override H5 Typography.', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_h5[font-family]', array(
            'default'       =>  '',//__( 'Work Sans', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_h5_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_h5[font-family]',
            'section'       =>  'medilac_h5',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        //Font Size
        $wp_customize->add_setting( 'medilac_h5[font-size]', array(
            'default'       =>  '',// old 'default'       =>  20,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_h5_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_h5',
            'priority'      =>  10,
            'settings'      =>  'medilac_h5[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        
        
        
        //Text Transform
        $wp_customize->add_setting( 'medilac_h5[text-transform]', array(
            'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h5_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_h5',
            'settings'       =>  'medilac_h5[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_h5[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h5_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_h5',
            'settings'       =>  'medilac_h5[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_h5[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h5_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_h5',
            'settings'       =>  'medilac_h5[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        
        /**
         * Section: Heading 6
         */
        $wp_customize->add_section( 'medilac_h6', array(
            'title'         =>  __( 'Heading 6 (H6)', 'medilac' ),
            'description'   =>  __( 'Override H6 Typography.', 'medilac' ),
            'panel'         =>  'medilac_typo',
            //'priority'      =>  1,
            'capability'    =>  'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
            
        ) );
        
        //Font Family
        $wp_customize->add_setting( 'medilac_h6[font-family]', array(
            'default'       =>  '',//__( 'Work Sans', 'medilac' ),
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        

        $wp_customize->add_control( 'medilac_h6_font_family', array(
            'label'         =>  __( 'Font Family', 'medilac' ),
            'settings'      => 'medilac_h6[font-family]',
            'section'       =>  'medilac_h6',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices' => Medilac_Fonts_Manage::fonts_choices(),
            'input_attrs'   =>  array(
                'class'         =>  'select2',
                'placeholder'   => 'Choose Font',
            ),
        ) );
        
        //Font Size
        $wp_customize->add_setting( 'medilac_h6[font-size]', array(
            'default'       =>  '',// old 'default'       =>  20,
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        
        $wp_customize->add_control( 'medilac_h6_font_size', array(
            'label'         =>  __( 'Font Size', 'medilac' ),
            'section'       =>  'medilac_h6',
            'priority'      =>  10,
            'settings'      =>  'medilac_h6[font-size]',
            'capability'    =>  'edit_theme_options',
            'type'          =>  'number',
            'input_attrs' => array(
                    'min' => 5,
                    'max' => 66,
            ),
        ) );
        
        
        
        //Text Transform
        $wp_customize->add_setting( 'medilac_h6[text-transform]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h6_font_text_transform', array(
            'label'         =>  __( 'Text Transform', 'medilac' ),
            'section'       =>  'medilac_h6',
            'settings'       =>  'medilac_h6[text-transform]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_transform_choices(),
            
        ) );
        
        
        //Font Weight
        $wp_customize->add_setting( 'medilac_h6[font-weight]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h6_font_weight', array(
            'label'         =>  __( 'Font-Weight', 'medilac' ),
            'section'       =>  'medilac_h6',
            'settings'       =>  'medilac_h6[font-weight]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_weight_choices(),
            
        ) );
        
        
        //Font Style
        $wp_customize->add_setting( 'medilac_h6[font-style]', array(
            'default'       =>  '',// old 'default'       =>  'inherit',
            'sanitize_callback'     => 'sanitize_text_field'

        ) );
        $wp_customize->add_control( 'medilac_h6_font_style', array(
            'label'         =>  __( 'Font Style', 'medilac' ),
            'section'       =>  'medilac_h6',
            'settings'       =>  'medilac_h6[font-style]',
            'priority'      =>  10,
            'capability'    =>  'edit_theme_options',
            'type'          =>  'select',
            'choices'   => Medilac_Fonts_Manage::fonts_style_choices(),
            
        ) );
        
        
    }
}

add_action( 'customize_register', 'medilac_typography_register' );


if( ! function_exists( 'medilac_load_google_fonts' ) ){
    
    /**
     * Medilac Fonts Loading
     * Google Fonts Loaded based on Selection
     * 
     * @return Void Enequeue Google Fonts File
     */
    function medilac_load_google_fonts() {
//        $google_font_url = '//fonts.googleapis.com/css?family=';
        $google_font_url = 'https://fonts.googleapis.com/css2?family=';
        $google_font_url = apply_filters( 'medilac_google_font_url', $google_font_url );
        $fonts_args = array(
            'medilac_root_font',
            'medilac_body_font',
            'medilac_heading',
            'medilac_h1',
            'medilac_h2',
            'medilac_h3',
            'medilac_h4',
            'medilac_h5',
            'medilac_h6',
        );
        
        if( ! is_array( $fonts_args ) ){
            return;
        }
        
        $font_additonal = ':wght@100;200;300;400;500;600;700&display=swap';
//        $font_additonal = ':wght@400;500;600;700&display=swap';
        $font_additonal = apply_filters( 'medilac_font_additional_info', $font_additonal );
        foreach( $fonts_args as $fonts ){
            $fnt_mod = get_theme_mod( $fonts );
            
            /**
             * Hooked: medilac_root_font_from_page -10 lib/bulldozer.php
             */
            $fnt_mod = apply_filters( 'medilac_font_mod_arr', $fnt_mod, $fonts, $fonts_args );
            if( $fonts === 'medilac_root_font' ){
                
                $font_root = $fnt_mod;
        
                /**
                 * @Hooked: medilac_root_font_from_page -10 at lib/bulldozer.php
                 * 
                 * Fonts Array from Customizer
                 * Array Sample
                 * array (size=2)
                    '--medilac-font-primary' => string 'Work Sans' (length=9)
                    '--medilac-font-secondary' => string 'Roboto' (length=6)
                 * 
                 * @param Array $font_root A array of Fonts where available Font's Array with Root Name
                 * @param Array/Bool $fonts_args $fonts_args is an Array of All type Typography Args
                 * 
                 * @Hooked: medilac_root_font_from_page -10 at lib/bulldozer.php
                 */
                $font_root = apply_filters( 'medilac_root_font_arr', $font_root, $fonts_args );
                
                //Convert as Array
                $font_root = is_array( $font_root ) ? $font_root : array();
                
                foreach( $font_root as $root_font ){

                    if( ! empty( $root_font ) ){
                        wp_enqueue_style( $root_font, $google_font_url . $root_font . $font_additonal, array(), MEDILAC_VERSION );
                    }
                }
            }
            
            if( !empty( $fnt_mod['font-family'] ) ){
                $font_name = $fnt_mod['font-family'];
                wp_enqueue_style( $fonts, $google_font_url . $font_name . $font_additonal, array(), MEDILAC_VERSION );
            }
        }
    }
}

add_action( 'wp_enqueue_scripts', 'medilac_load_google_fonts' ); //wp_enqueue_scripts

if( ! function_exists( 'medilac_typography_head_style' ) ){
    
    /**
     * Generate CSS Code, I mean: Style tag
     * at the Head tag of the site.
     * 
     * We have code here for
     * primary root color and font
     * 
     * as well as body, heading tag's style for font, color etc
     */
    function medilac_typography_head_style() {
        $output = '<style id="medilac-internal-style-typography">';
        //Generate Style Root CSS
        $output .= ":root {\n"; //Starting of Root for Font
        
        $root_mod = medilac_option( 'medilac_root_font', array(
            '--medilac-font-secondary' => __( 'Roboto','medilac' ),
            '--medilac-font-primary' => __( 'Work Sans','medilac' ),
        ) );
        $font_root = $root_mod;
        
        /**
         * @Hooked: medilac_root_font_from_page -10 at lib/bulldozer.php
         * 
         * Fonts Array from Customizer
         * Array Sample
         * array (size=2)
            '--medilac-font-primary' => string 'Work Sans' (length=9)
            '--medilac-font-secondary' => string 'Roboto' (length=6)
         * 
         * @param Array $font_root A array of Fonts where available Font's Array with Root Name
         * @param Array/Bool $fonts_args No Data for this 
         * 
         * @Hooked: medilac_root_font_from_page -10 at lib/bulldozer.php
         */
        $root_mod = apply_filters( 'medilac_root_font_arr', $font_root, false );
                
        $universal_font_name = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif';
        $universal_font_name = apply_filters( 'medilac_universal_font_family', $universal_font_name );
        
        $add_sans_serif = ', sans-serif';
        
        if( is_array( $root_mod ) && count( $root_mod ) > 0 ){

            foreach( $root_mod as $st_prop => $st_value ){
                //$st_prop - style property -> property name -> --medilac-primary
                //$st_prop - style value -> property value -> #0FC392

                $value = !empty( $st_value ) ? "'" . $st_value . "'" . $add_sans_serif : $universal_font_name;
                $output .= $st_prop . ': ' . $value . ";\n";//! empty( $st_value ) ? $st_prop . ': ' . $st_value . ";\n" : '';
            }
            
        }else{
            $output .= "--medilac-font-primary: " . $universal_font_name . ";\n";
            $output .= "--medilac-font-secondary: " . $universal_font_name . ";\n";
        }
        
        $output .= "\n}"; //End of Root Declear of Font
        //Ending Generate Style Root CSS

        //Generate Style for Body with a, p, button,input,textarea etc
        $body_mod = get_theme_mod( 'medilac_body_font' );
        /**
         * Generate Style for Body and HTML tag
         * used function
         * 
         * and we have removed manual foreach
         * which is now at the bottom of this function
         * 
         * In future, I will remove that commented part
         * 
         * @since 1.0.0.43
         * 
         * here selecotr was: html,body, now has changed
         */
        $output .= medilac_customizer_array_to_style_string( 'input,section,div,input,a,textarea,strong,p,body p', $body_mod );
//        if( is_array( $body_mod ) ){
//            $output .= "html,body{\n";
//
//            foreach($body_mod as $st_prop => $st_value){
//                if( $st_prop == 'font-family' ){
//                 $st_value = $st_value . ', sans-serif'; 
//                }
//
//                if( $st_prop == 'font-size' && is_numeric( $st_value ) ){
//                 $st_value = $st_value . 'px'; 
//                }
//                $output .= ! empty( $st_value ) ? $st_prop . ': ' . $st_value . ";\n" : '';
//            }
//            $output .= "\n}";
//        }
//        
        
        
        //Generate Style for All Heading Text, Such as h1,h2,h3,h4,h5,h6
        $head_mod = get_theme_mod( 'medilac_heading' );
        /**
         * Generate Style for Body and HTML tag
         * used function
         * 
         * Generate Style for All Head
         * Such:
         * h1,h2,h3,h4,h5,h6
         * 
         * @since 1.0.0.43
         */
        $output .= medilac_customizer_array_to_style_string( 'h1,h2,h3,h4,h5,h6', $head_mod );
        
        /**
         * Typography for Content of site,
         * Basically for p tag.
         * 
         * @since 1.0.0.44
         * 
         * ei ongsho muche diyechi. eta lagbe na. karon eta
         * body text e diye dicchi.
         */
        //$ptext_mod = get_theme_mod( 'medilac_content_text' );
        //$output .= medilac_customizer_array_to_style_string( 'input,section,div,input,a,textarea,strong,p,body p', $ptext_mod );
        
        /**
         * Generate Style for All Head Indivisually
         * Such:
         * h1,h2,h3,h4,h5,h6
         */
        $output .= medilac_customizer_array_to_style_string( 'body h1', get_theme_mod( 'medilac_h1' ) );
        $output .= medilac_customizer_array_to_style_string( 'body h2', get_theme_mod( 'medilac_h2' ) );
        $output .= medilac_customizer_array_to_style_string( 'body h3', get_theme_mod( 'medilac_h3' ) );
        $output .= medilac_customizer_array_to_style_string( 'body h4', get_theme_mod( 'medilac_h4' ) );
        $output .= medilac_customizer_array_to_style_string( 'body h5', get_theme_mod( 'medilac_h5' ) );
        $output .= medilac_customizer_array_to_style_string( 'body h6', get_theme_mod( 'medilac_h6' ) );

        
        $output .= '</style>';
        
        echo $output;
    }
}

add_action( 'wp_head', 'medilac_typography_head_style' ); //wp_enqueue_scripts