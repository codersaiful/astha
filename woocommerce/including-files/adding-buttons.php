<?php
/**
 * For Adding button on shop page only
 * File is not a template file of WooCommerce
 * 
 * @since 1.0.0.64
 */

$this_layout = isset( $this_layout ) ? $this_layout : 'shop-grid';
?>
<section class="area-<?php echo esc_attr( $this_layout ); ?> astha-after-loop-wrapper add-list-pack-inside-wrapper">
    <div class="add-list-pack-inside">    
    <?php
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    do_action( 'woocommerce_after_shop_loop_item' );
    ?>
    </div>
</section>