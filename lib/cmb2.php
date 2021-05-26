<?php
/**
 * Page Option Using CMB2 Plugin
 * making same option like Our Customizer.
 * 
 *
 * @link https://github.com/CMB2/CMB2/wiki/Basic-Usage
 *
 * @package Astha
 * @since 1.0.0.19
 */

add_action( 'cmb2_admin_init', 'medilac_cmb2_metaboxes' );
if(!function_exists( 'medilac_cmb2_metaboxes' )){
    
    /**
     * Page Options for Specific Page, Taxonomy, ETC
     * 
     * We have used CMB2
     */
    function medilac_cmb2_metaboxes() {
            $medilac_object_types = array( 'page','post', 'product','medilac_doctor','medilac_case', 'medilac_department' );
            $medilac_object_types = apply_filters( 'medilac_cmb2_post_type_support', $medilac_object_types );
            /**
             * For Page Options
             */
            $cmb = new_cmb2_box( array(
                    'id'            => 'medilac_page_options',
                    'title'         => __( 'Page Options', 'medilac' ),
                    'object_types'  => $medilac_object_types, // Post type
                    'context'       => 'normal',
                    'priority'      => 'high',
                    'show_names'    => true, // Show field names on the left
                    // 'cmb_styles' => false, // false to disable the CMB stylesheet
                    'closed'     => true, // Keep the metabox closed by default
            ) );
            //Layout Topbar
            $choices_topbar = array(
                'topbar-one'        => __( 'Topbar One', 'medilac' ),
                'topbar-two'        => __( 'Topbar Two', 'medilac' ),
                'topbar-three'        => __( 'Topbar Three', 'medilac' ),
                'topbar-four'        => __( 'Topbar Four', 'medilac' ),
                'topbar-five'        => __( 'Topbar Five', 'medilac' ),
                'none'              => __( 'None', 'medilac' ),
                );
            $choices_topbar = apply_filters( 'medilac_topbar_layout_choises', $choices_topbar );
            $choices_topbar['default'] = __( 'Default', 'medilac' );
            $cmb->add_field( array(
                    'name'       => __( 'Topbar Layout', 'medilac' ),
                    'desc'       => __( 'Select custom header layout for this page or post', 'medilac' ),
                    'id'         => 'layout_header',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_topbar,
                    
            ) );
            
            //for Header
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
            $choices_header['default'] = __( 'Default', 'medilac' );
            $cmb->add_field( array(
                    'name'       => __( 'Header Layout', 'medilac' ),
                    'desc'       => __( 'Select custom header layout for this page or post', 'medilac' ),
                    'id'         => 'layout_header',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_header,
                    
            ) );
            
            
            //for Header Width
            $header_width_choices = array(
                    'fluid'    => __( 'Fluid', 'medilac' ),
                    'container'   => __( 'Container', 'medilac' ),
                    'full-container'   => __( 'Container with Topbar', 'medilac' ),
            );
            $header_width_choices = apply_filters( 'medilac_header_width_choices', $header_width_choices );
            $header_width_choices['default'] = __( 'Default', 'medilac' );
            $cmb->add_field( array(
                    'name'       => __( 'Header Width', 'medilac' ),
                    'desc'       => __( 'Select custom header layout for this page or post', 'medilac' ),
                    'id'         => 'medilac_header_width',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $header_width_choices,
                    
            ) );
            
            
            
            //for Header Sticky Header
            $sticky_choices = array(
                    'off'   => __( 'Disable', 'medilac' ),
                    'on'    => __( 'Enable', 'medilac' ),
                    'only_topbar'   => __( 'Only Topbar', 'medilac' ),
                    //'only_header'   => __( 'Only Header', 'medilac' ),
            );
            $sticky_choices = apply_filters( 'medilac_sticky_choices', $sticky_choices );
            $sticky_choices['default'] = __( 'Default', 'medilac' );
            $cmb->add_field( array(
                    'name'       => __( 'Sticky', 'medilac' ),
                    'desc'       => __( 'Select custom header layout for this page or post', 'medilac' ),
                    'id'         => 'medilac_header_sticky',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $sticky_choices,
                    
            ) );
            
            
            
            //for Breadcrumbs
            $choices_header = array(
                    'on'   => __( 'On', 'medilac' ),
                    'off'    => __( 'Off', 'medilac' ),
            );
            $choices_header = apply_filters( 'medilac_breadcrumb_choises', $choices_header );
            $choices_header['default'] = __( 'Default', 'medilac' );
            $cmb->add_field( array(
                    'name'       => __( 'Breadcrumbs', 'medilac' ),
                    'desc'       => __( 'Show or hide the breadcrumb for this page or post', 'medilac' ),
                    'id'         => 'medilac_breadcrumb_switch',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_header,
                    
            ) );
            
            //for Breadcrumbs Style
            $choices_breadcrumb_style = array(
                    'breadcrumb-style-1'   => __( 'Style One', 'medilac' ),
                    'breadcrumb-style-2'   => __( 'Style Two', 'medilac' ),
                    'breadcrumb-style-3'   => __( 'Style Three', 'medilac' ),
                    'breadcrumb-style-4'   => __( 'Style Four', 'medilac' ),
                    //'breadcrumb-style-hidden'   => __( 'Display Hidden', 'medilac' ),
            );
            $choices_breadcrumb_style = apply_filters( 'medilac_breadcrumb_style_choises', $choices_breadcrumb_style );
            $choices_breadcrumb_style['default'] = __( 'Default', 'medilac' );
            $cmb->add_field( array(
                    'name'       => __( 'Breadcrumbs Style', 'medilac' ),
                    'desc'       => __( 'Change your Breadcrumb style for this specific page or post.', 'medilac' ),
                    'id'         => 'medilac_breadcrumb_style',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_breadcrumb_style,
                    
            ) );
            
            
            //Breadcrumb Image for Page
            $cmb->add_field( array(
                'name'    => 'Breadcrumb Background Image',
                'desc'    => 'Upload an image or enter an URL.',
                'id'      => 'medilac_breadcrumb_image',
                'type'    => 'file',
                // Optional:
                'options' => array(
                    'url' => true, // Hide the text input for the url
                ),
                'text'    => array(
                    'add_upload_file_text' => 'Add Background Image' // Change upload button text. Default: "Add or Upload File"
                ),
                // query_args are passed to wp.media's library query.
                'query_args' => array(
                     'type' => array(
                         'image/gif',
                         'image/jpeg',
                         'image/png',
                     ),
                ),
                'preview_size' => 'large', // Image size to use when previewing in the admin.
            ) );
            
            //for Footer
            $choices_footer = array(
                'footer-dark'        => __( 'Dark Footer', 'medilac' ),
                'footer-light'        => __( 'Light Footer', 'medilac' ),
                'none'              => __( 'None', 'medilac' ),
                );
            $choices_footer = apply_filters( 'medilac_footer_layout_choises', $choices_footer );
            $choices_footer['default'] = __( 'Default', 'medilac' );
            $cmb->add_field( array(
                    'name'       => __( 'Footer Layout', 'medilac' ),
                    'desc'       => __( 'Select custom footer layout for this page or post', 'medilac' ),
                    'id'         => 'layout_footer',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_footer,
                    
            ) );
            
            
            //for Sidebar
            $choices_sidebar = array(
                'no-sidebar'        => __( 'None', 'medilac' ),
                'left-sidebar'      => __( 'Left Sidebar', 'medilac' ),
                'right-sidebar'     => __( 'Right Sidebar', 'medilac' ),
                );
            $choices_sidebar = apply_filters( 'medilac_sidebar_layout_choises', $choices_sidebar );
            $choices_sidebar['default'] = __( 'Default', 'medilac' );
            $cmb->add_field( array(
                    'name'       => __( 'Sidebar Layout', 'medilac' ),
                    'desc'       => __( 'Select left/right sidebar for this page or post', 'medilac' ),
                    'id'         => 'layout_sidebar',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_sidebar,
                    
            ) );
            
            
            
            
            /**
             * For Page Typography
             */
            $fonts = new_cmb2_box( array(
                    'id'            => 'medilac_page_typography',
                    'title'         => __( 'Typography', 'medilac' ),
                    'object_types'  => $medilac_object_types, // Post type
                    'context'       => 'normal',
                    'priority'      => 'high',
                    'show_names'    => true, // Show field names on the left
                    // 'cmb_styles' => false, // false to disable the CMB stylesheet
                    'closed'     => true, // Keep the metabox closed by default
            ) );
            
            $fonts->add_field( array(
                    'name'       => __( 'Primary Font', 'medilac' ),
                    //'desc'       => __( 'Select left/right sidebar for this page or post', 'medilac' ),
                    'id'         => '--medilac-font-primary',
                    'type'       => 'select',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => Astha_Fonts_Manage::fonts_choices(),
                    
            ) );
            
            
            $fonts->add_field( array(
                    'name'       => __( 'Secondary Font', 'medilac' ),
                    //'desc'       => __( 'Select left/right sidebar for this page or post', 'medilac' ),
                    'id'         => '--medilac-font-secondary',
                    'type'       => 'select',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => Astha_Fonts_Manage::fonts_choices(),
                    
            ) );
            
            
            /**
             * For Page Colors
             * 
             * ***********************
             * IMPORTANT:
             * ***********************
             * for support color of Single post
             * need to add list at bulldozer.php file.
             * inside function medilac_root_color_from_page
             * 
             */
            $colors = new_cmb2_box( array(
                    'id'            => 'medilac_page_colors',
                    'title'         => __( 'Colors', 'medilac' ),
                    'object_types'  => $medilac_object_types, // Post type
                    'context'       => 'normal',
                    'priority'      => 'high',
                    'show_names'    => true, // Show field names on the left
                    // 'cmb_styles' => false, // false to disable the CMB stylesheet
                    'closed'     => true, // Keep the metabox closed by default
            ) );
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Primary Color', 'medilac' ),
                    'id'      => '--medilac-primary',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Secondary Color', 'medilac' ),
                    'id'      => '--medilac-secondary',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Deep Dark Color', 'medilac' ),
                    'id'      => '--medilac-deep-dark',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Light Dark Color', 'medilac' ),
                    'id'      => '--medilac-light-dark',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Primary Deep Color', 'medilac' ),
                    'id'      => '--medilac-primary-deep',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Primary Light Color', 'medilac' ),
                    'id'      => '--medilac-primary-light',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Secondary Deep Color', 'medilac' ),
                    'id'      => '--medilac-secondary-deep',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Secondary Light Color', 'medilac' ),
                    'id'      => '--medilac-secondary-light',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Danger Color', 'medilac' ),
                    'id'      => '--medilac-danger',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Topbar Color', 'medilac' ),
                    'id'      => '--medilac-topbar-color',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Topbar Bacground Color', 'medilac' ),
                    'id'      => '--medilac-topbar-bgcolor',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Topbar Link Hover Color', 'medilac' ),
                    'id'      => '--medilac-topbar-link-color',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Foreground Color', 'medilac' ),
                    'id'      => '--medilac-foreground',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            
    }
}
