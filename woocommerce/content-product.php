<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;


// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$shop_layout = medilac_get_shop_layout();
?>
<li <?php wc_product_class( '', $product ); ?>>
    <?php
    
    /**
     * It was in inc/woocommerce.php
     * 
     * Do something, If need anything 
     * at the top of the Loop Each Item top
     * 
     * @since 1.0.0.61
     */
    do_action( 'medilac_wc_loop_wrapper_top' );
    
    /**
     * Hook: woocommerce_before_shop_loop_item.
     */
    do_action( 'woocommerce_before_shop_loop_item' );
    ?>
    <div class="thumbnail-wrapper">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop_item_title.
         * 
         * @hooked woocommerce_template_loop_product_link_open      - 8
         * @hooked woocommerce_show_product_loop_sale_flash         - 10
         * @hooked woocommerce_template_loop_product_thumbnail      - 10
         * @hooked woocommerce_template_loop_product_link_close     - 12
         */
        do_action( 'woocommerce_before_shop_loop_item_title' );
        ?>
        <?php 

        if( ( ( is_shop() || is_product_taxonomy() ) && $shop_layout == 'shop-grid' ) || ( ! is_shop() && ! is_product_taxonomy() ) ){
            $this_layout = 'shop-grid';
            include __DIR__ . '/including-files/adding-buttons.php';
        }
        
        ?>        
    </div>
    <div class="title-wrapper">
        <?php


        /**
         * Hook: woocommerce_shop_loop_item_title.
         * @hooked woocommerce_template_loop_product_link_open      - 8
         * @hooked woocommerce_template_loop_product_title          - 10
         * @hooked woocommerce_template_loop_product_link_close     - 12
         */
        do_action( 'woocommerce_shop_loop_item_title' );

        /**
         * Hook: woocommerce_after_shop_loop_item_title.
         *
         * @hooked woocommerce_template_loop_rating - 5
         * @hooked woocommerce_template_loop_price - 10
         */
        do_action( 'woocommerce_after_shop_loop_item_title' );

        ?>
        <?php 
        if( $shop_layout == 'shop-list' && ( is_shop() || is_product_taxonomy() ) ){
            $this_layout = 'shop-list';
            include __DIR__ . '/including-files/adding-buttons.php';
        }
        ?>
    </div>
<?php
    
    /**
     * It was in inc/woocommerce.php
     * 
     * Do something, If need
     * for Bottom of Each Item
     */
    do_action( 'medilac_wc_loop_wrapper_bottom' );
    ?>
</li>
