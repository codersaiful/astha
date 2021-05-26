<?php
/**
 * The Full width Nav/Navigation under Header.
 *
 * This is the template that displays bottom Menu. It will be another Menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astha
 */

/**
 * To On Of Main Primary Menu by Filter, Use following Hook
 * @HOOK Filter Hook
 */
$primary_menu = apply_filters( 'astha_show_primary_menu', true );
if( ! $primary_menu ){
    return;
}

?>
<nav id="site-navigation" class="header-menu main-navigation">
    <div class="inside-navigation container">
        <?php
        /**
         * Add or Do something at the Bottom of Primary menu
         * @Hook Action HOOK
         * 
         */
        do_action( 'astha_primary_menu_top' );
        
        if( has_nav_menu( 'primary-menu' ) ){
        ?>
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'astha' ); ?></button>
        
        <?php        
        /**
         * To Change Primary menu depth, 
         * Use following Hook
         * @HOOK Filter Hook
         */
        $primary_menu_depth = apply_filters( 'astha_primary_menu_depth', 6 );
        wp_nav_menu(
            array(
                'theme_location'    => 'primary-menu',
                'container_id'      => 'primary-menu',
                'menu_class'        => 'menu nav-menu',
                'depth'             => $primary_menu_depth,
            )
        );
        
        ?>
        
        <?php
        }elseif( current_user_can( ASTHA_CAPABILITY ) ){
            
            echo sprintf( esc_html__( '%sAdd Menu%s', 'astha' ),
                    '<a href=" ' . esc_url( admin_url( 'nav-menus.php' ) ) . ' ">',
                    '</a>'
                );
        }
        
        /**
         * Add or Do something at the Bottom of Primary menu
         * @Hook Action HOOK
         * 
         */
        do_action( 'astha_primary_menu_bottom' );
        
        ?>
        
    </div> <!-- .inside-navigation.container-->

</nav><!-- #site-navigation -->
