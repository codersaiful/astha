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

add_action( 'cmb2_admin_init', 'astha_cmb2_metaboxes' );
if(!function_exists( 'astha_cmb2_metaboxes' )){
    
    /**
     * Page Options for Specific Page, Taxonomy, ETC
     * 
     * We have used CMB2
     */
    function astha_cmb2_metaboxes() {
            $astha_object_types = array( 'page','post', 'product','astha_doctor','astha_case', 'astha_department' );
            $astha_object_types = apply_filters( 'astha_cmb2_post_type_support', $astha_object_types );
            /**
             * For Page Options
             */
            $cmb = new_cmb2_box( array(
                    'id'            => 'astha_page_options',
                    'title'         => __( 'Page Options', 'astha' ),
                    'object_types'  => $astha_object_types, // Post type
                    'context'       => 'normal',
                    'priority'      => 'high',
                    'show_names'    => true, // Show field names on the left
                    // 'cmb_styles' => false, // false to disable the CMB stylesheet
                    'closed'     => true, // Keep the metabox closed by default
            ) );
            //Layout Topbar
            $choices_topbar = array(
                'topbar-one'        => __( 'Topbar One', 'astha' ),
                'topbar-two'        => __( 'Topbar Two', 'astha' ),
                'topbar-three'        => __( 'Topbar Three', 'astha' ),
                'topbar-four'        => __( 'Topbar Four', 'astha' ),
                'topbar-five'        => __( 'Topbar Five', 'astha' ),
                'none'              => __( 'None', 'astha' ),
                );
            $choices_topbar = apply_filters( 'astha_topbar_layout_choises', $choices_topbar );
            $choices_topbar['default'] = __( 'Default', 'astha' );
            $cmb->add_field( array(
                    'name'       => __( 'Topbar Layout', 'astha' ),
                    'desc'       => __( 'Select custom header layout for this page or post', 'astha' ),
                    'id'         => 'layout_header',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_topbar,
                    
            ) );
            
            //for Header
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
            $choices_header['default'] = __( 'Default', 'astha' );
            $cmb->add_field( array(
                    'name'       => __( 'Header Layout', 'astha' ),
                    'desc'       => __( 'Select custom header layout for this page or post', 'astha' ),
                    'id'         => 'layout_header',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_header,
                    
            ) );
            
            
            //for Header Width
            $header_width_choices = array(
                    'fluid'    => __( 'Fluid', 'astha' ),
                    'container'   => __( 'Container', 'astha' ),
                    'full-container'   => __( 'Container with Topbar', 'astha' ),
            );
            $header_width_choices = apply_filters( 'astha_header_width_choices', $header_width_choices );
            $header_width_choices['default'] = __( 'Default', 'astha' );
            $cmb->add_field( array(
                    'name'       => __( 'Header Width', 'astha' ),
                    'desc'       => __( 'Select custom header layout for this page or post', 'astha' ),
                    'id'         => 'astha_header_width',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $header_width_choices,
                    
            ) );
            
            
            
            //for Header Sticky Header
            $sticky_choices = array(
                    'off'   => __( 'Disable', 'astha' ),
                    'on'    => __( 'Enable', 'astha' ),
                    'only_topbar'   => __( 'Only Topbar', 'astha' ),
                    //'only_header'   => __( 'Only Header', 'astha' ),
            );
            $sticky_choices = apply_filters( 'astha_sticky_choices', $sticky_choices );
            $sticky_choices['default'] = __( 'Default', 'astha' );
            $cmb->add_field( array(
                    'name'       => __( 'Sticky', 'astha' ),
                    'desc'       => __( 'Select custom header layout for this page or post', 'astha' ),
                    'id'         => 'astha_header_sticky',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $sticky_choices,
                    
            ) );
            
            
            
            //for Breadcrumbs
            $choices_header = array(
                    'on'   => __( 'On', 'astha' ),
                    'off'    => __( 'Off', 'astha' ),
            );
            $choices_header = apply_filters( 'astha_breadcrumb_choises', $choices_header );
            $choices_header['default'] = __( 'Default', 'astha' );
            $cmb->add_field( array(
                    'name'       => __( 'Breadcrumbs', 'astha' ),
                    'desc'       => __( 'Show or hide the breadcrumb for this page or post', 'astha' ),
                    'id'         => 'astha_breadcrumb_switch',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_header,
                    
            ) );
            
            //for Breadcrumbs Style
            $choices_breadcrumb_style = array(
                    'breadcrumb-style-1'   => __( 'Style One', 'astha' ),
                    'breadcrumb-style-2'   => __( 'Style Two', 'astha' ),
                    'breadcrumb-style-3'   => __( 'Style Three', 'astha' ),
                    'breadcrumb-style-4'   => __( 'Style Four', 'astha' ),
                    //'breadcrumb-style-hidden'   => __( 'Display Hidden', 'astha' ),
            );
            $choices_breadcrumb_style = apply_filters( 'astha_breadcrumb_style_choises', $choices_breadcrumb_style );
            $choices_breadcrumb_style['default'] = __( 'Default', 'astha' );
            $cmb->add_field( array(
                    'name'       => __( 'Breadcrumbs Style', 'astha' ),
                    'desc'       => __( 'Change your Breadcrumb style for this specific page or post.', 'astha' ),
                    'id'         => 'astha_breadcrumb_style',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_breadcrumb_style,
                    
            ) );
            
            
            //Breadcrumb Image for Page
            $cmb->add_field( array(
                'name'    => 'Breadcrumb Background Image',
                'desc'    => 'Upload an image or enter an URL.',
                'id'      => 'astha_breadcrumb_image',
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
                'footer-dark'        => __( 'Dark Footer', 'astha' ),
                'footer-light'        => __( 'Light Footer', 'astha' ),
                'none'              => __( 'None', 'astha' ),
                );
            $choices_footer = apply_filters( 'astha_footer_layout_choises', $choices_footer );
            $choices_footer['default'] = __( 'Default', 'astha' );
            $cmb->add_field( array(
                    'name'       => __( 'Footer Layout', 'astha' ),
                    'desc'       => __( 'Select custom footer layout for this page or post', 'astha' ),
                    'id'         => 'layout_footer',
                    'type'       => 'select',
                    'default'    => 'default',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => $choices_footer,
                    
            ) );
            
            
            //for Sidebar
            $choices_sidebar = array(
                'no-sidebar'        => __( 'None', 'astha' ),
                'left-sidebar'      => __( 'Left Sidebar', 'astha' ),
                'right-sidebar'     => __( 'Right Sidebar', 'astha' ),
                );
            $choices_sidebar = apply_filters( 'astha_sidebar_layout_choises', $choices_sidebar );
            $choices_sidebar['default'] = __( 'Default', 'astha' );
            $cmb->add_field( array(
                    'name'       => __( 'Sidebar Layout', 'astha' ),
                    'desc'       => __( 'Select left/right sidebar for this page or post', 'astha' ),
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
                    'id'            => 'astha_page_typography',
                    'title'         => __( 'Typography', 'astha' ),
                    'object_types'  => $astha_object_types, // Post type
                    'context'       => 'normal',
                    'priority'      => 'high',
                    'show_names'    => true, // Show field names on the left
                    // 'cmb_styles' => false, // false to disable the CMB stylesheet
                    'closed'     => true, // Keep the metabox closed by default
            ) );
            
            $fonts->add_field( array(
                    'name'       => __( 'Primary Font', 'astha' ),
                    //'desc'       => __( 'Select left/right sidebar for this page or post', 'astha' ),
                    'id'         => '--astha-font-primary',
                    'type'       => 'select',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                    'options'    => Astha_Fonts_Manage::fonts_choices(),
                    
            ) );
            
            
            $fonts->add_field( array(
                    'name'       => __( 'Secondary Font', 'astha' ),
                    //'desc'       => __( 'Select left/right sidebar for this page or post', 'astha' ),
                    'id'         => '--astha-font-secondary',
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
             * inside function astha_root_color_from_page
             * 
             */
            $colors = new_cmb2_box( array(
                    'id'            => 'astha_page_colors',
                    'title'         => __( 'Colors', 'astha' ),
                    'object_types'  => $astha_object_types, // Post type
                    'context'       => 'normal',
                    'priority'      => 'high',
                    'show_names'    => true, // Show field names on the left
                    // 'cmb_styles' => false, // false to disable the CMB stylesheet
                    'closed'     => true, // Keep the metabox closed by default
            ) );
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Primary Color', 'astha' ),
                    'id'      => '--astha-primary',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Secondary Color', 'astha' ),
                    'id'      => '--astha-secondary',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Deep Dark Color', 'astha' ),
                    'id'      => '--astha-deep-dark',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Light Dark Color', 'astha' ),
                    'id'      => '--astha-light-dark',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Primary Deep Color', 'astha' ),
                    'id'      => '--astha-primary-deep',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Primary Light Color', 'astha' ),
                    'id'      => '--astha-primary-light',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Secondary Deep Color', 'astha' ),
                    'id'      => '--astha-secondary-deep',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Secondary Light Color', 'astha' ),
                    'id'      => '--astha-secondary-light',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Danger Color', 'astha' ),
                    'id'      => '--astha-danger',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Topbar Color', 'astha' ),
                    'id'      => '--astha-topbar-color',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Topbar Bacground Color', 'astha' ),
                    'id'      => '--astha-topbar-bgcolor',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Topbar Link Hover Color', 'astha' ),
                    'id'      => '--astha-topbar-link-color',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            $colors->add_field( array(
                    'name'    => esc_html__( 'Foreground Color', 'astha' ),
                    'id'      => '--astha-foreground',
                    'type'    => 'colorpicker',
                    'default' => '',
            ) );
            
            
            
            
    }
}
