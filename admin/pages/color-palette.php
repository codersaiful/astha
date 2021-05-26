<?php
/**
 * Astha Adminsitration Functions Managing 
 * Specially for Color Pallate Submenu
 * 
 * To this file, We will handle color palette
 * 
 * *********************************
 * Available Developer GET variable
 * $_GET['developer']=code
 * **********************************
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astha
 */

//Getting Theme's Information
$asthatheme = wp_get_theme();

$palettes = array(
    'classic'   => array(
        'name'      => __( 'Classic', 'astha' ),
        'colors'    => array(
            'color_root' => array(
                '--astha-foreground' => '#ffffff',
                '--astha-primary' => '#0fc392',
                '--astha-secondary' => '#f4f9fc',
                '--astha-deep-dark' => '#021429',
                '--astha-light-dark' => '#5c6b79',
                '--astha-primary-light' => '#16ecb2',
                '--astha-primary-deep' => '#0c9e77',
                '--astha-secondary-light' => '#fdfdfd',
                '--astha-secondary-deep' => '#e2ebf1',
                '--astha-danger' => '#fd5a5a',
            ),
            'color_text' => '#5c6b79',
            'color_link' => '#0fc392',
            'color_link_hover' => '#021429',
        ),
    ),
    
    'red_light'   => array(
        'name'      => __( 'Red Light', 'astha' ),
        'colors'    => array(
            'color_root' => array(
                '--astha-primary' => '#dd3333',
                '--astha-secondary' => '#fff7f7',
                '--astha-deep-dark' => '#2d0000',
                '--astha-light-dark' => '#5e4242',
                '--astha-primary-light' => '#ff5656',
                '--astha-primary-deep' => '#b20000',
                '--astha-secondary-light' => '#ffddc9',
                '--astha-secondary-deep' => '#edafaf',
                '--astha-danger' => '#eb5bff',
            ),
            'color_text' => '#4b6582',
            'color_link' => '#dd3333',
            'color_link_hover' => '#ff3a6f',
        ),
    ),
    
    'green_light'   => array(
        'name'      => __( 'Green Light', 'astha' ),
        'colors'    => array(
            'color_root' => array(
		'--astha-primary' => '#81d742',
		'--astha-secondary' => '#f9f9f9',
		'--astha-secondary-light' => '#faffed',
		'--astha-secondary-deep' => '#f6efff',
		'--astha-primary-light' => '#28a9ff',
		'--astha-danger' => '#fc0000',
            ),
        ),
    ),

    'temporary'   => array(
        'name'      => __( 'Temporary', 'astha' ),
        'colors'    => array(
            'color_root' => array(
                '--astha-foreground' => '#f7f7f7',
                '--astha-primary' => '#11db4e',
                '--astha-secondary' => '#f7fffa',
                '--astha-deep-dark' => '#040030',
                '--astha-light-dark' => '#625570',
                '--astha-primary-light' => '#2c8e31',
                '--astha-primary-deep' => '#81d742',
                '--astha-secondary-light' => '#5e5e5e',
                '--astha-secondary-deep' => '#c1def2',
                '--astha-danger' => '#dd9933',
            ),
            'color_text' => '#4b6582',
            'color_link' => '#1e73be',
            'color_link_hover' => '#013a9e',
        ),
    ),
    
    'black_n_white'   => array(
        'name'      => __( 'Black And White', 'astha' ),
        'colors'    => array(
            'color_root' => array(
                '--astha-foreground' => '#fff',
                '--astha-primary' => '#3a3838',
                '--astha-secondary' => '#ededed',
                '--astha-deep-dark' => '#0a0002',
                '--astha-light-dark' => '#565656',
                '--astha-primary-light' => '#4f4f4f',
                '--astha-primary-deep' => '#0a0a0a',
                '--astha-secondary-light' => '#5e5e5e',
                '--astha-secondary-deep' => '#bcbcbc',
                '--astha-danger' => '#140000',
            ),
            'color_text' => '#454854',
            'color_link' => '#0e0644',
            'color_link_hover' => '#565656',
        ),
    ),
    'pink_panther'   => array(
        'name'      => __( 'Pink Panther', 'astha' ),
        'colors'    => array(
            'color_root' => array(
		'--astha-primary' => '#ff14c4',
		'--astha-primary-light' => '#ff2bca',
		'--astha-primary-deep' => '#ff009d',
		'--astha-secondary' => '#fff7fc',
		'--astha-secondary-deep' => '#f4def4',
            ),
	'color_text' => '#285577',
	'color_link' => '#ff14c4',
	'color_link_hover' => '#db14ff',
        ),
    ),

);

/**
 * Color Palette Filter
 * To Define new color palette (for Add or remove any color palette)
 * 
 * @Since 1.0.0.49
 * @date 23.12.2020
 */
$palettes = apply_filters( 'astha_predefined_color_palette', $palettes );




$this_main_url = admin_url( 'admin.php?page=astha-color-palette' );

// Save URL for saving current setting as new Color Palette
$save_url = admin_url( 'admin.php?page=astha-color-palette&save=current&action=save_now' );

//Update URL for set a specific color palette for current theme
$update_url = admin_url( 'admin.php?page=astha-color-palette&update=current&action=update_now' );
//Reset in URL data will Reset
//$reset_update_url = admin_url( 'admin.php?page=astha-color-palette&update=current&action=update_now&reset=yes' );



/**
 * Set Color Palette for Theme
 * based on selected color palette
 * 
 * @since 1.0.0.49
 */
if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) && isset( $_GET['update'] ) && isset( $_GET['action'] ) && $_GET['update'] == 'current' && $_GET['action'] == 'update_now'){
    $theme_slug = get_option( 'stylesheet' );
    $mods       = get_option( "theme_mods_$theme_slug" );
    if ( false === $mods ) {
            $theme_name = get_option( 'current_theme' );
            if ( false === $theme_name ) {
                    $theme_name = wp_get_theme()->get( 'Name' );
            }
            $mods = get_option( "mods_$theme_name" ); // Deprecated location.
//            if ( is_admin() && false !== $mods ) {
//                    update_option( "theme_mods_$theme_slug", $mods );
//                    delete_option( "mods_$theme_name" );
//            }
    }
    $id = $_GET['id'];
    $selected_palette = isset( $palettes[$id]['colors'] ) ? $palettes[$id]['colors'] : false;
    
    if( is_array( $selected_palette ) ){
        
        /**
         * Color Palette wise
         * mod generate
         */
        $mods = array_merge( $mods, $selected_palette );
    }
    
    /**
     * Here We will fix $mods array
     * 
     * Check Mode and update to theme mode
     */
    if( is_array( $mods ) && ! empty( $mods ) ){
        update_option( "theme_mods_$theme_slug", $mods );
    }

    /**
     * We are now using JavaScript Redirection.
     * Because, wp_redirect() was showing Header Already Error
     * 
     * @since 1.0.0.48
     */
    ?>
        <script>location.href = '<?php echo esc_url( $this_main_url ); ?>';</script>
    <?php
    //************************************/
}

/**
 * Save current color as new Palette
 * Data will be save at database based on current setting
 * 
 * @since 1.0.0.49
 */
if( isset( $_GET['save'] ) && isset( $_GET['action'] ) && $_GET['save'] == 'current' && $_GET['action'] == 'save_now'){
    
}


$asthatheme = wp_get_theme();
?>
<div class="wrap about-wrap astha-wrap">
    <h1><?php echo esc_html__( 'Welcome to Astha', 'astha' );  ?></h1>

    <div class="about-text"><?php echo esc_html( $asthatheme->get( 'Description' ) ); ?></div>
    <div class="astha-badge">

        <p><?php
        

        echo esc_html( $asthatheme->get( 'Version' ) ); ?></p>
    </div>
    
    <div class="astha-color-palette-wrapper">
        <div class="astha-cp-inside">
            
            <div class="astha-color-list-wrapper">
                <div class="astha-color-palette-list">
                    <?php
                    
                    /**
                     * Success Message , When Pallete will Applied
                     * //update=applied-palette
                     */
                    if( isset( $_GET['update'] ) && $_GET['update'] == 'applied-palette' ){
                        echo wp_kses_post( '<p>' . esc_html__( 'Successfully Color Palette Applid.', 'astha' ) . '</p>' );
                    }
                    
                    if( is_array( $palettes ) ){
                        foreach( $palettes as $palette_id => $palette ){
                            if( ! empty( $palette_id ) ){
                            $palette_name = isset( $palette['name'] ) ? $palette['name'] : $palette_id;
                            $update_url_final = $update_url . '&id=' . $palette_id;
                            $palette_colors = is_array( $palette['colors'] ) ? $palette['colors'] : false;
                            $colors = astha_color_arr_return_from_arr( $palette_colors );
                    ?>
                    <section class="color-set-wrapper color-set-wrapper-<?php echo esc_attr( $palette_id ); ?>">
                        <h3><?php echo esc_html( $palette_name ); ?></h3>
                        <div class="color-palette-with-button">
                            <div class="color-set">
                                <?php
                                if( is_array( $colors ) ){
                                    foreach( $colors as $c_key => $color ){
                                        $style_color = is_string( $color ) ? $color : 'transparent'
                                ?>
                                <span style="background-color:<?php echo esc_attr( $style_color ); ?>;" 
                                      title="<?php echo esc_attr( $c_key ); ?>"
                                      class="palette-color <?php echo esc_attr( $c_key ); ?>">
                                    <i><?php echo esc_attr( $style_color ); ?></i>
                                </span>    
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <a onclick="return confirm('<?php _e( 'Current color setting will be replace with Color Palette:[' . $palette_name . '].\nUnable to redo.\nAre you sure?.', 'astha' ); ?>');"
                                class="astha-add-palette-button button button-primary" 
                                href="<?php echo esc_attr( $update_url_final ); ?>">
                            <?php echo esc_html__( 'Apply ', 'astha' ) . esc_html( $palette_name ); ?>
                            </a>
                        </div>
                    </section>
                        <?php
                            }
                        }
                    }
                    ?>
                </div>
                
                <?php
                /**
                 * This part for Developer
                 * use $_GET['developer']=code
                 * Then you will get this part 
                 *
                 */
                if( isset( $_GET['developer'] )  && $_GET['developer'] = 'code' ){
                    $mod = get_theme_mods();
                    $dev_colors = isset( $mod['color_root'] ) ? $mod['color_root'] : array();
                ?>
                <div class="astha-for-developer">
                    <h3>Create new Palette - for <span>WP Developer</span></h3>
                    <textarea class="palette-soruce-code" cols="15" rows="20">
'palette_key'   => array(
        'name'      => __( 'Pallete Name', 'astha' ),
        'colors'    => array(
            'color_root' => array(
<?php
foreach( $dev_colors as $dev_key => $dev_color ){

    echo is_string( $dev_color ) ? esc_html( "\t\t'" . $dev_key . "' => '" . $dev_color . "',\n" ) : '';
}
?>
            ),
<?php 
//For Color of Text
$color_text = isset( $mod['color_text'] ) ? $mod['color_text'] : false;
if( is_string( $color_text ) ){
    echo esc_html( "\t'color_text' => '" . $color_text . "',\n" );
}

//For Color Link
$color_link = isset( $mod['color_link'] ) ? $mod['color_link'] : false;
if( is_string( $color_text ) ){
    echo esc_html( "\t'color_link' => '" . $color_link . "',\n" );
}

//For Color Link Hover
$color_link_hover = isset( $mod['color_link_hover'] ) ? $mod['color_link_hover'] : false;
if( is_string( $color_text ) ){
    echo esc_html( "\t'color_link_hover' => '" . $color_link_hover . "',\n" );
}


?>
        ),
    ),
</textarea>
                </div>    
                <?php    
                }
                ?>
            </div>
            
        </div>
    </div>
</div>