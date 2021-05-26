<?php
/**
 * Astha Adminsitration Functions Managing 
 * Specially for Customizer Setting Backup
 * 
 * 
 * ***********************************
 * Available Developer $_GET['customizer_delete'] = absolute_yes
 * For this part, Developer also able to find old data
 * from database, which name start with astha_theme_mods_arr
 * Example key name in database is: astha_theme_mods_arr_123
 * *************************************
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astha
 */

//Getting Theme's Information
$asthatheme = wp_get_theme();
?>
<div class="wrap about-wrap astha-wrap">
    <h1><?php echo esc_html__( 'Welcome to Astha', 'astha' );  ?></h1>

    <div class="about-text"><?php echo esc_html( $asthatheme->get( 'Description' ) ); ?></div>
    <div class="astha-badge">

        <p><?php
        

        echo esc_html( $asthatheme->get( 'Version' ) ); ?></p>
    </div>
    
    <?php
    $this_main_url = admin_url( 'admin.php?page=astha-settings-backup' );
    $this_main_url = admin_url( 'admin.php?page=astha-settings-backup' );
    $save_url = admin_url( 'admin.php?page=astha-settings-backup&save=current&action=save_now' );
    //Reset in URL data will Reset
    $reset_save_url = admin_url( 'admin.php?page=astha-settings-backup&save=current&action=save_now&reset=yes' );
    
    $theme = get_option( 'stylesheet' );
    $theme_name = get_option( 'current_theme' );

    
    $theme_name = wp_get_theme()->get( 'Name' );

    
    $option_key = 'astha_theme_mods_arr';
    
    
    $astha_modses = get_option( $option_key );
    if( !is_array( $astha_modses ) ){
        $astha_modses = array();
    }

    /**
     * Reset Whole Backup 
     * 
     * Before delete while Customizer Backup,
     * You have to be ensure/confirm that, these data is not restore able.
     */
    
    if( ( isset( $_GET['customizer_delete'] ) && $_GET['customizer_delete'] == 'absolute_yes' ) || defined( 'MEDILAC_DELETE_CUSTOMIZER_BACKUP' ) || apply_filters( 'astha_delete_customizer_backup', false ) ){
        update_option( $option_key . rand(10, 1000), $astha_modses );
        update_option( $option_key, false);
    }
    
    
    if( isset( $_GET['save'] ) && isset( $_GET['action'] ) && $_GET['save'] == 'current' && $_GET['action'] == 'save_now'){
        $time = time();
        $astha_modses[$time] = get_theme_mods();
        $mods_temp_name = isset( $_GET['name'] ) && !empty( $_GET['name'] ) ? $_GET['name'] : false;
        $astha_modses[$time]['astha_theme_mods_name'] = $mods_temp_name;
        update_option( $option_key, $astha_modses);
        
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
        $mods = isset( $astha_modses[$mod_id] ) ? $astha_modses[$mod_id] : false;
        
        if( is_array( $mods ) ){
            update_option( 'theme_mods_' . $theme, $mods );
            echo esc_html__( 'Successfully Importanted', 'astha' );
        }else{
            echo "<p class='astha-error-message'>" . esc_html__( 'Something went Wrong.', 'astha' ) . "</p>";
        }
        
    }
    
    //Delete From Existing List
    if( isset( $_GET['delete_mod_id'] ) && isset( $_GET['delete'] ) && $_GET['delete'] == 'by_url' && is_numeric( $_GET['delete_mod_id'] ) ){
        $delete_mod_id = $_GET['delete_mod_id'];
        if( isset( $astha_modses[$delete_mod_id] ) ) 
            unset( $astha_modses[$delete_mod_id] );
        
        update_option( $option_key, $astha_modses);
        
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
    $form_post = filter_input( INPUT_POST, 'astha_customizer_settings' );
    $form_post = apply_filters( 'astha_setting_form_submit', $form_post );

    if( $form_post ){
        do_action( 'astha_setting_form_on_submit' );
        
        $decod = base64_decode($form_post);
        if( is_serialized( $decod ) ){
           $genrtd_mods = unserialize( $decod );
           update_option( 'theme_mods_' . $theme, $genrtd_mods );
        }else{
            echo "<p class='astha-error-message'>" . esc_html__( 'Submitted Data is not perfect. Please try right data.', 'astha' ) . "</p>";
        }
        
        do_action( 'astha_setting_form_after_submit' );
    }

    ?>
    <div class="buttons-wrapper">
        <a class="astha-save-button btn btn-lg btn-large btn-primary button-primary" 
           href="<?php echo esc_url( $save_url ); ?>">
            <?php _e( 'Save Current Settings', 'astha' ); ?>
        </a>
        <a class="astha-reset-button btn btn-lg btn-large btn-primary button" 
           onclick="return confirm('<?php _e( 'If you continue with this action, you will reset all options in this page.\nAre you sure?', 'astha' ); ?>');"
           style="color: #d00;"
           href="<?php echo esc_url( $reset_save_url ); ?>">
            <?php _e( 'Reset Setting', 'astha' ); ?>
        </a>
    </div>
    <?php
    if( is_array( $astha_modses ) && count( $astha_modses ) > 0 ){
        echo '<h2 class="section_title">' . esc_html__( 'Saved Setting List', 'astha' ) . '</h2><ul>';
        foreach( $astha_modses as $timestamp=>$mods ){
            if( is_numeric( $timestamp ) ){
                $links  = admin_url( 'admin.php?page=astha-settings-backup&mod_id=' . $timestamp . '&import=from_url' );
                $del_links  = admin_url( 'admin.php?page=astha-settings-backup&delete_mod_id=' . $timestamp . '&delete=by_url' );
                ?>
                <li class="setting-li">
                    <i><?php echo esc_html__( 'Settings at ' ) . esc_html( date( 'D d,M Y h:i:s', $timestamp ) ) ?></i>
                    <a href="<?php echo esc_url( $links ); ?>">
                        <span class="dashicons dashicons-database-import"></span>
                        <span class="setting-li-text"><?php echo esc_html__( 'Import This Setting', 'astha' ); ?></span>
                    </a>
                    <a href="<?php echo esc_url( $del_links ); ?>" 
                       onclick="return confirm('<?php echo esc_attr( 'If you continue with this action, you will reset all options in this page.\nAre you sure?', 'astha' ); ?>');">
                        <span class="dashicons dashicons-trash"></span>
                        <span class="setting-li-text"><?php echo esc_html__( 'Delete', 'astha' ); ?></span>
                    </a>
                </li>    
                <?php
            }
        }
        echo '</ul>';
    }
    ?>
    
    <h2 class="section_title"><?php echo esc_html__( 'Export Settings', 'astha' ); ?></h2>
    
    <form action="" method="POST">
        <?php
        $export = base64_encode( serialize( get_theme_mods() ) );//esc_html(  );
        //echo($export);
        ?>
        <p><?php echo esc_html__( 'Please keep save following text as backup settings. So that, you can import easily your back by the following form.' ); ?></p>
        <textarea class="large-text code" cols="10" rows="10" name="astha_customizer_settings" class="settings astha-textarea"><?php echo esc_html( $export ); ?></textarea>
        
        <?php
        $import_sett = esc_html__( 'Import Settings' );
        submit_button( $import_sett );
        ?>
    </form>
</div>