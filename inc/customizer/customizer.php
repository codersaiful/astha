<?php
/**
 * Astha Theme Customizer
 *
 * @package Astha
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function astha_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'astha_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'astha_customize_partial_blogdescription',
			)
		);
	}
        
        
        /**
         * Astha Global Panel
         * It will show at the top of Customizer
         * Section,Setting,Control of this Panel
         * at Theme->inc->customizer->theme_options.php file
         */
        $wp_customize->add_panel( 'astha_theme_mod', array(
            'title' => __( 'Astha Theme Options', 'astha' ),
            'description' => esc_html__( 'This is Test It slfksd fsdkjf lksdjfkljsd fj sdfj skldjf', 'astha' ),
            'priority' => 1,
            'capability' => 'edit_theme_options',
            'theme_support' => '',
            'active_callback'=> '',
        ) );
        
}
add_action( 'customize_register', 'astha_customize_register' );

/**
 * Customizers Options/Choice Filter Hooks are Hooked from here
 * 
 * We have also Used a Hook to Change that file, where we have used Options
 */
$cusmzr_options_file = apply_filters( 'astha_customizer_options', ASTHA_THEME_DIR . 'inc/customizer/options-filters.php' );
include_once $cusmzr_options_file;

/**
 * All Need File for Customizer file has been Added from Here
 */
include_once ASTHA_THEME_DIR . 'inc/customizer/fonts/class-fonts-manage.php';
include_once ASTHA_THEME_DIR . 'inc/customizer/custom-controls.php';
include_once ASTHA_THEME_DIR . 'inc/customizer/functions.php';

include_once ASTHA_THEME_DIR . 'inc/customizer/typography.php';
include_once ASTHA_THEME_DIR . 'inc/customizer/theme_options.php';
include_once ASTHA_THEME_DIR . 'inc/customizer/color.php';
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    include_once ASTHA_THEME_DIR . 'inc/customizer/wc-customizer.php';
}

if ( ! function_exists( 'WooCommerce' ) ) {
    
    /**
     * Customizer Select - want to convert as Select2
     * So we will add select2 js plugin
     * 
     * To do this, I have taken help wp buil-in  action hook.
     * 
     * Hook: do_action( 'customize_render_control', $this )
     * 
     * Important: following jquery code is important, to enable
     * $('li.customize-control.customize-control-select select').select2();
     * 
     * Also select2 plugins js and CSS code
     * 
     * @param Object $cusomizer Default Customizer object.
     */
    function astha_customize_select_to_select2( $cusomizer ){
        ////$('li.customize-control.customize-control-select select').select2();
        $select2 = apply_filters( 'astha_select2_support', true, $cusomizer ); 
        //$cusomizer->type,ASTHA_CUSTOMIZER_URI . 'assets/js/select2.full.min.js';
        if( $select2 ){ //$cusomizer->type == 'select'
            wp_enqueue_script( 'astha-select2-js', ASTHA_CUSTOMIZER_URI . 'assets/js/select2.full.min.js', array( 'jquery' ), '4.0.13', true );
            wp_enqueue_script( 'astha-custom-controls-js', ASTHA_CUSTOMIZER_URI . 'assets/js/customizer.js', array( 'astha-select2-js' ), '1.0', true );
            //wp_enqueue_style( 'astha-custom-controls-css', ASTHA_CUSTOMIZER_URI . 'assets/css/customizer.css', array(), '1.1', 'all' );
            wp_enqueue_style( 'astha-select2-css', ASTHA_CUSTOMIZER_URI . 'assets/css/select2.min.css', array(), '4.0.13', 'all' );
        }
    }
}
add_action( 'customize_render_control','astha_customize_select_to_select2' );