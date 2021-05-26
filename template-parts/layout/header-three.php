<?php
/**
 * Template part for displaying Header
 * Header Two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

?>

<div class="header">
    <div class="header-wrapper">
        <div class="site-branding">
                <?php
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                endif;
                $astha_description = get_bloginfo( 'description', 'display' );
                if ( $astha_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $astha_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
        </div><!-- .site-branding -->
        <div class="widget-area">
            <?php dynamic_sidebar( 'header-sidebar' ); ?>
        </div>
    </div>  <!-- .header-wrapper -->
    
    <div class="header-bottom header-bottom-black">
        <div class="main_menu">
            
            <?php
            //Template of Nav Menu - Primary Menu
            get_template_part( 'template-parts/nav', 'primary-menu' );
            ?>

        </div>
         
        <div class="menu-right-side header-right-area tools-panel">
            <?php
            /**
             * Functions hooked into astha_tools_panel action
             * 
             * @hooked astha_header_search_control    - 0 location: inc/template-functions.php
             * @hooked astha_header_user_login        - 10 location: inc/template-functions.php
             */
            do_action( 'astha_tools_panel' );
            ?>
            
            <?php 
            $wc_header_tool = apply_filters( 'astha_header_wc_minicart_bool', true );
            if( class_exists( 'WooCommerce' ) && $wc_header_tool ) :
            ?>
            <div class="main-header-mini-cart-wrapper header-minicart-wrapper">
                <?php
		if ( function_exists( 'astha_woocommerce_header_cart' ) ) {
			astha_woocommerce_header_cart();
		}
                ?>
            </div>
            <?php endif; ?>
        </div>
        
    </div>








</div> <!-- .header -->



