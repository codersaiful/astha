<?php
/**
 * Medilac Adminsitration Functions Managing 
 * Specially for Customizer Setting Backup
 * 
 * 
 * ***********************************
 * Available Developer $_GET['customizer_delete'] = absolute_yes
 * For this part, Developer also able to find old data
 * from database, which name start with medilac_theme_mods_arr
 * Example key name in database is: medilac_theme_mods_arr_123
 * *************************************
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Medilac
 */

//Getting Theme's Information
$medilactheme = wp_get_theme();
?>
<div class="wrap about-wrap medilac-wrap">
    <h1><?php echo esc_html__( 'Welcome to Medilac', 'medilac' );  ?></h1>

    <div class="about-text"><?php echo esc_html( $medilactheme->get( 'Description' ) ); ?></div>
    <div class="medilac-badge">

        <p><?php
        

        echo esc_html( $medilactheme->get( 'Version' ) ); ?></p>
    </div>
    
    <?php
    $this_main_url = admin_url( 'admin.php?page=medilac-settings-backup' );
    $this_main_url = admin_url( 'admin.php?page=medilac-settings-backup' );
    $save_url = admin_url( 'admin.php?page=medilac-settings-backup&save=current&action=save_now' );
    //Reset in URL data will Reset
    $reset_save_url = admin_url( 'admin.php?page=medilac-settings-backup&save=current&action=save_now&reset=yes' );
    
    $theme = get_option( 'stylesheet' );
    $theme_name = get_option( 'current_theme' );

    
    $theme_name = wp_get_theme()->get( 'Name' );

    
    $option_key = 'medilac_theme_mods_arr';
    
    
    $medilac_modses = get_option( $option_key );
    if( !is_array( $medilac_modses ) ){
        $medilac_modses = array();
    }

    /**
     * Reset Whole Backup 
     * 
     * Before delete while Customizer Backup,
     * You have to be ensure/confirm that, these data is not restore able.
     */
    
    if( ( isset( $_GET['customizer_delete'] ) && $_GET['customizer_delete'] == 'absolute_yes' ) || defined( 'MEDILAC_DELETE_CUSTOMIZER_BACKUP' ) || apply_filters( 'medilac_delete_customizer_backup', false ) ){
        update_option( $option_key . rand(10, 1000), $medilac_modses );
        update_option( $option_key, false);
    }
    
    
    if( isset( $_GET['save'] ) && isset( $_GET['action'] ) && $_GET['save'] == 'current' && $_GET['action'] == 'save_now'){
        $time = time();
        $medilac_modses[$time] = get_theme_mods();
        $mods_temp_name = isset( $_GET['name'] ) && !empty( $_GET['name'] ) ? $_GET['name'] : false;
        $medilac_modses[$time]['medilac_theme_mods_name'] = $mods_temp_name;
        update_option( $option_key, $medilac_modses);
        
        if( isset( $_GET['reset'] ) && $_GET['reset'] == 'yes' ){
            remove_theme_mods();
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
        //wp_redirect( $this_main_url ); //It was showing Already header Error, That's why, now we are using js redirect
        wp_die();
        exit;
    }
    
    //Import From Existing List
    if( isset( $_GET['mod_id'] ) && isset( $_GET['import'] ) && $_GET['import'] == 'from_url' && is_numeric( $_GET['mod_id'] ) ){
        $mod_id = $_GET['mod_id'];
        $mods = isset( $medilac_modses[$mod_id] ) ? $medilac_modses[$mod_id] : false;
        
        if( is_array( $mods ) ){
            update_option( 'theme_mods_' . $theme, $mods );
            echo esc_html__( 'Successfully Importanted', 'medilac' );
        }else{
            echo "<p class='medilac-error-message'>" . esc_html__( 'Something went Wrong.', 'medilac' ) . "</p>";
        }
        
    }
    
    //Delete From Existing List
    if( isset( $_GET['delete_mod_id'] ) && isset( $_GET['delete'] ) && $_GET['delete'] == 'by_url' && is_numeric( $_GET['delete_mod_id'] ) ){
        $delete_mod_id = $_GET['delete_mod_id'];
        if( isset( $medilac_modses[$delete_mod_id] ) ) 
            unset( $medilac_modses[$delete_mod_id] );
        
        update_option( $option_key, $medilac_modses);
        
        /**
         * We are now using JavaScript Redirection.
         * Because, wp_redirect() was showing Header Already Error
         * 
         * @since 1.0.0.48
         */
        ?>
            <script>location.href = '<?php echo esc_url( $this_main_url ); ?>';</script>
        <?php
        //wp_redirect( $this_main_url );
        wp_die();
        exit;
        
    }
    
    
    /**
     * Form Submitting
     */
    $form_post = filter_input( INPUT_POST, 'medilac_customizer_settings' );
    $form_post = apply_filters( 'medilac_setting_form_submit', $form_post );

    if( $form_post ){
        do_action( 'medilac_setting_form_on_submit' );
        
        $decod = base64_decode($form_post);
        if( is_serialized( $decod ) ){
           $genrtd_mods = unserialize( $decod );
           update_option( 'theme_mods_' . $theme, $genrtd_mods );
        }else{
            echo "<p class='medilac-error-message'>" . esc_html__( 'Submitted Data is not perfect. Please try right data.', 'medilac' ) . "</p>";
        }
        
        do_action( 'medilac_setting_form_after_submit' );
    }

    ?>
    <div class="buttons-wrapper">
        <a class="medilac-save-button btn btn-lg btn-large btn-primary button-primary" 
           href="<?php echo esc_url( $save_url ); ?>">
            <?php _e( 'Save Current Settings', 'medilac' ); ?>
        </a>
        <a class="medilac-reset-button btn btn-lg btn-large btn-primary button" 
           onclick="return confirm('<?php _e( 'If you continue with this action, you will reset all options in this page.\nAre you sure?', 'medilac' ); ?>');"
           style="color: #d00;"
           href="<?php echo esc_url( $reset_save_url ); ?>">
            <?php _e( 'Reset Setting', 'medilac' ); ?>
        </a>
    </div>
    <?php
    if( is_array( $medilac_modses ) && count( $medilac_modses ) > 0 ){
        echo '<h2 class="section_title">' . esc_html__( 'Saved Setting List', 'medilac' ) . '</h2><ul>';
        foreach( $medilac_modses as $timestamp=>$mods ){
            if( is_numeric( $timestamp ) ){
                $links  = admin_url( 'admin.php?page=medilac-settings-backup&mod_id=' . $timestamp . '&import=from_url' );
                $del_links  = admin_url( 'admin.php?page=medilac-settings-backup&delete_mod_id=' . $timestamp . '&delete=by_url' );
                ?>
                <li class="setting-li">
                    <i><?php echo esc_html__( 'Settings at ' ) . esc_html( date( 'D d,M Y h:i:s', $timestamp ) ) ?></i>
                    <a href="<?php echo esc_url( $links ); ?>">
                        <span class="dashicons dashicons-database-import"></span>
                        <span class="setting-li-text"><?php echo esc_html__( 'Import This Setting', 'medilac' ); ?></span>
                    </a>
                    <a href="<?php echo esc_url( $del_links ); ?>" 
                       onclick="return confirm('<?php echo esc_attr( 'If you continue with this action, you will reset all options in this page.\nAre you sure?', 'medilac' ); ?>');">
                        <span class="dashicons dashicons-trash"></span>
                        <span class="setting-li-text"><?php echo esc_html__( 'Delete', 'medilac' ); ?></span>
                    </a>
                </li>    
                <?php
            }
        }
        echo '</ul>';
    }
    ?>
    
    <h2 class="section_title"><?php echo esc_html__( 'Export Settings', 'medilac' ); ?></h2>
    
    <form action="" method="POST">
        <?php
        $export = base64_encode( serialize( get_theme_mods() ) );//esc_html(  );
        //echo($export);
        ?>
        <p><?php echo esc_html__( 'Please keep save following text as backup settings. So that, you can import easily your back by the following form.' ); ?></p>
        <textarea class="large-text code" cols="10" rows="10" name="medilac_customizer_settings" class="settings medilac-textarea"><?php echo esc_html( $export ); ?></textarea>
        
        <?php
        $import_sett = esc_html__( 'Import Settings' );
        submit_button( $import_sett );
        ?>
    </form>
</div>