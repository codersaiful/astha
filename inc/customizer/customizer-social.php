<?php

function astha_customizer_sections( $wp_customize ) {
		/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'astha_customizer', array(
		'priority'    => 12,
		'title'       => __( 'Astha Theme Options', 'astha' ),
	) );


	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'header_background', array(
 		'title'       => __( 'Social Settings', 'astha' ),
 		'priority'    => 14,
 		'panel'       => 'astha_customizer',
 	) ); 

}
add_action( 'customize_register', 'astha_customizer_sections' );

function astha_customizer_fields( $fields ) {

   $fields[] = array(
        'type'        => 'url',
        'settings'    => 'facebook',
        'label'       => __( 'Facebook URL', 'astha' ),
        'section'     => 'header_background',
        'priority'    => 10,
    ); 
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'twitter',
        'label'       => __( 'Twitter', 'astha' ),
        'section'     => 'header_background',
        'priority'    => 10,
    );
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'linkedin',
        'label'       => __( 'Linkedin', 'astha' ),
        'section'     => 'header_background',
        'priority'    => 10,
    );
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'pinterest',
        'label'       => __( 'Pinterest', 'astha' ),
        'section'     => 'header_background',
        'priority'    => 10,
    ); 
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'instagram',
        'label'       => __( 'Instagram', 'astha' ),
        'section'     => 'header_background',
        'priority'    => 10,
    ); 

	$fields[] = array(
        'type'        => 'color',
        'settings'    => 'social_color',
        'label'       => __( 'Social Color', 'astha' ),
        'section'     => 'header_background',
        'priority'    => 11,
		'default'     => '#888',
		'transport'   => 'postMessage',
		'output' => array(
				array(
					'element'  => '.social-network .fa',
					'property' => 'color',
				),
		),
    );
	$fields[] = array(
        'type'        => 'dimension',
		'settings'    => 'social_font_size',
		'label'       => esc_html__( 'Font Size', 'astha' ),
		'description' => esc_html__( 'Use any font size with size and unit (eg. 36px).', 'astha' ),
		'section'     => 'header_background',
		'transport'   => 'postMessage',
		'default'     => '36px',
		'output' => array(
				array(
					'element'  => '.social-network .fa',
					'property' => 'font-size',
				),
		),
    );
	
    return $fields;

}
add_filter( 'kirki/fields', 'astha_customizer_fields' );

?>