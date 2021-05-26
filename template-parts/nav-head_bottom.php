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
$secondary_menu = apply_filters( 'medilac_show_secondary_menu', true );

if( ! $secondary_menu ){
    return;
}
?>
<nav id="head-bottom-navigation" class="header-menu head-bottom-navigation">
    <div class="inside-head-bottom-navigation container">
        <button class="menu-toggle" aria-controls="head-bottom" aria-expanded="false"><?php esc_html_e( 'Secondary Menu', 'medilac' ); ?></button>
        <?php
        wp_nav_menu(
                array(
                        'theme_location'    => 'head_bottom',
                        'container_id'      => 'head-bottom',
                        'container_class'   => 'head-bottom-menu',
                        'menu_class'        => 'menu nav-menu',
                )
        );
        ?>
    </div> <!-- .inside-head-bottom-navigation.container-->

</nav><!-- #site-navigation -->