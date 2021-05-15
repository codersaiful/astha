<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package astha
 */

?>

<aside class="sidebar col-md-4 text-left bp-order-2">
    <div class="blog-sidebar">
        <?php
            if(is_active_sidebar('sidebar')){
                dynamic_sidebar( 'sidebar' );
            }
        ?>
    </div>
</aside>
