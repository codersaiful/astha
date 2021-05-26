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
                $medilac_description = get_bloginfo( 'description', 'display' );
                if ( $medilac_description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo $medilac_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
        </div><!-- .site-branding -->

        <div class="main_menu">
            
            <?php
            //Template of Nav Menu - Primary Menu
            get_template_part( 'template-parts/nav', 'primary-menu' );
            ?>

        </div>
         
        <div class="menu-right-side header-right-area tools-panel">
            <?php
            /**
             * Functions hooked into medilac_tools_panel action
             * 
             * @hooked medilac_header_search_control    - 0 location: inc/template-functions.php
             * @hooked medilac_header_user_login        - 10 location: inc/template-functions.php
             */
            do_action( 'medilac_tools_panel' );
            ?>
            
            <?php
            $wc_header_tool = apply_filters( 'medilac_header_wc_minicart_bool', true );
            if( class_exists( 'WooCommerce' ) && $wc_header_tool ) : ?>
            <div class="main-header-mini-cart-wrapper header-minicart-wrapper">
                <?php
		if ( function_exists( 'medilac_woocommerce_header_cart' ) ) {
			medilac_woocommerce_header_cart();
		}
                ?>
            </div>
            <?php endif; ?>
        </div>
        
    </div>  <!-- .header-wrapper -->










</div> <!-- .header -->



