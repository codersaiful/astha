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
$medilactheme = wp_get_theme();

$palettes = array(
    'classic'   => array(
        'name'      => __( 'Classic', 'medilac' ),
        'colors'    => array(
            'color_root' => array(
                '--medilac-foreground' => '#ffffff',
                '--medilac-primary' => '#0fc392',
                '--medilac-secondary' => '#f4f9fc',
                '--medilac-deep-dark' => '#021429',
                '--medilac-light-dark' => '#5c6b79',
                '--medilac-primary-light' => '#16ecb2',
                '--medilac-primary-deep' => '#0c9e77',
                '--medilac-secondary-light' => '#fdfdfd',
                '--medilac-secondary-deep' => '#e2ebf1',
                '--medilac-danger' => '#fd5a5a',
            ),
            'color_text' => '#5c6b79',
            'color_link' => '#0fc392',
            'color_link_hover' => '#021429',
        ),
    ),
    
    'red_light'   => array(
        'name'      => __( 'Red Light', 'medilac' ),
        'colors'    => array(
            'color_root' => array(
                '--medilac-primary' => '#dd3333',
                '--medilac-secondary' => '#fff7f7',
                '--medilac-deep-dark' => '#2d0000',
                '--medilac-light-dark' => '#5e4242',
                '--medilac-primary-light' => '#ff5656',
                '--medilac-primary-deep' => '#b20000',
                '--medilac-secondary-light' => '#ffddc9',
                '--medilac-secondary-deep' => '#edafaf',
                '--medilac-danger' => '#eb5bff',
            ),
            'color_text' => '#4b6582',
            'color_link' => '#dd3333',
            'color_link_hover' => '#ff3a6f',
        ),
    ),
    
    'green_light'   => array(
        'name'      => __( 'Green Light', 'medilac' ),
        'colors'    => array(
            'color_root' => array(
		'--medilac-primary' => '#81d742',
		'--medilac-secondary' => '#f9f9f9',
		'--medilac-secondary-light' => '#faffed',
		'--medilac-secondary-deep' => '#f6efff',
		'--medilac-primary-light' => '#28a9ff',
		'--medilac-danger' => '#fc0000',
            ),
        ),
    ),

    'temporary'   => array(
        'name'      => __( 'Temporary', 'medilac' ),
        'colors'    => array(
            'color_root' => array(
                '--medilac-foreground' => '#f7f7f7',
                '--medilac-primary' => '#11db4e',
                '--medilac-secondary' => '#f7fffa',
                '--medilac-deep-dark' => '#040030',
                '--medilac-light-dark' => '#625570',
                '--medilac-primary-light' => '#2c8e31',
                '--medilac-primary-deep' => '#81d742',
                '--medilac-secondary-light' => '#5e5e5e',
                '--medilac-secondary-deep' => '#c1def2',
                '--medilac-danger' => '#dd9933',
            ),
            'color_text' => '#4b6582',
            'color_link' => '#1e73be',
            'color_link_hover' => '#013a9e',
        ),
    ),
    
    'black_n_white'   => array(
        'name'      => __( 'Black And White', 'medilac' ),
        'colors'    => array(
            'color_root' => array(
                '--medilac-foreground' => '#fff',
                '--medilac-primary' => '#3a3838',
                '--medilac-secondary' => '#ededed',
                '--medilac-deep-dark' => '#0a0002',
                '--medilac-light-dark' => '#565656',
                '--medilac-primary-light' => '#4f4f4f',
                '--medilac-primary-deep' => '#0a0a0a',
                '--medilac-secondary-light' => '#5e5e5e',
                '--medilac-secondary-deep' => '#bcbcbc',
                '--medilac-danger' => '#140000',
            ),
            'color_text' => '#454854',
            'color_link' => '#0e0644',
            'color_link_hover' => '#565656',
        ),
    ),
    'pink_panther'   => array(
        'name'      => __( 'Pink Panther', 'medilac' ),
        'colors'    => array(
            'color_root' => array(
		'--medilac-primary' => '#ff14c4',
		'--medilac-primary-light' => '#ff2bca',
		'--medilac-primary-deep' => '#ff009d',
		'--medilac-secondary' => '#fff7fc',
		'--medilac-secondary-deep' => '#f4def4',
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
$palettes = apply_filters( 'medilac_predefined_color_palette', $palettes );




$this_main_url = admin_url( 'admin.php?page=medilac-color-palette' );

// Save URL for saving current setting as new Color Palette
$save_url = admin_url( 'admin.php?page=medilac-color-palette&save=current&action=save_now' );

//Update URL for set a specific color palette for current theme
$update_url = admin_url( 'admin.php?page=medilac-color-palette&update=current&action=update_now' );
//Reset in URL data will Reset
//$reset_update_url = admin_url( 'admin.php?page=medilac-color-palette&update=current&action=update_now&reset=yes' );



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


$medilactheme = wp_get_theme();
?>
<div class="wrap about-wrap medilac-wrap">
    <h1><?php echo esc_html__( 'Welcome to Astha', 'medilac' );  ?></h1>

    <div class="about-text"><?php echo esc_html( $medilactheme->get( 'Description' ) ); ?></div>
    <div class="medilac-badge">

        <p><?php
        

        echo esc_html( $medilactheme->get( 'Version' ) ); ?></p>
    </div>
    
    <div class="medilac-color-palette-wrapper">
        <div class="medilac-cp-inside">
            
            <div class="medilac-color-list-wrapper">
                <div class="medilac-color-palette-list">
                    <?php
                    
                    /**
                     * Success Message , When Pallete will Applied
                     * //update=applied-palette
                     */
                    if( isset( $_GET['update'] ) && $_GET['update'] == 'applied-palette' ){
                        echo wp_kses_post( '<p>' . esc_html__( 'Successfully Color Palette Applid.', 'medilac' ) . '</p>' );
                    }
                    
                    if( is_array( $palettes ) ){
                        foreach( $palettes as $palette_id => $palette ){
                            if( ! empty( $palette_id ) ){
                            $palette_name = isset( $palette['name'] ) ? $palette['name'] : $palette_id;
                            $update_url_final = $update_url . '&id=' . $palette_id;
                            $palette_colors = is_array( $palette['colors'] ) ? $palette['colors'] : false;
                            $colors = medilac_color_arr_return_from_arr( $palette_colors );
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
                            <a onclick="return confirm('<?php _e( 'Current color setting will be replace with Color Palette:[' . $palette_name . '].\nUnable to redo.\nAre you sure?.', 'medilac' ); ?>');"
                                class="medilac-add-palette-button button button-primary" 
                                href="<?php echo esc_attr( $update_url_final ); ?>">
                            <?php echo esc_html__( 'Apply ', 'medilac' ) . esc_html( $palette_name ); ?>
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
                <div class="medilac-for-developer">
                    <h3>Create new Palette - for <span>WP Developer</span></h3>
                    <textarea class="palette-soruce-code" cols="15" rows="20">
'palette_key'   => array(
        'name'      => __( 'Pallete Name', 'medilac' ),
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