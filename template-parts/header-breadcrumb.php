<?php
/**
 * Template part for displaying Breadcrumb
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

/**
 * If someone Try to Hide Breadcrumb from one place
 * Use following filter.
 * 
 * Just Use:
 * add_filter( 'astha_breadcrumb_show', '__return_false' );
 */
$breadcrumb = apply_filters( 'astha_breadcrumb_show', true );

if( !$breadcrumb ){
    return;
}

$_wc_astha = '';
if( astha_is_woocommerce() ){
    $_wc_astha = '_wc';
}

$breadcrumb_switch             = astha_option( 'astha_breadcrumb_switch', false, false, $_wc_astha );
if( $breadcrumb_switch === 'off' ){
    return;
}
$breadcrumb_type              = astha_option( 'astha_breadcrumb_type', false, false, $_wc_astha );
$breadcrumb_style              = astha_option( 'astha_breadcrumb_style', 'breadcrumb-style-1', false, $_wc_astha );
$breadcrumb_blog_title          = astha_option( 'astha_breadcrumb_blog_title', __( 'Blog Page', 'astha' ), false, $_wc_astha );
$breadcrumb_shop_title          = astha_option( 'astha_breadcrumb_shop_title', __( 'Shop Page', 'astha' ), false, $_wc_astha );
$breadcrumb_search_title          = astha_option( 'astha_breadcrumb_search_title', __( 'Search Result', 'astha' ), false, $_wc_astha );
$breadcrumb_single_post_title   = astha_option( 'astha_breadcrumb_single_post_title', __( 'Single Post', 'astha' ), false, $_wc_astha );
$breadcrumb_page_title          = astha_option( 'astha_breadcrumb_page_title', __( 'Page', 'astha' ), false, $_wc_astha );
$breadcrumb_category_title      = astha_option( 'astha_breadcrumb_category_title', __( 'Category Page', 'astha' ), false, $_wc_astha );
$breadcrumb_tag_title           = astha_option( 'astha_breadcrumb_tag_title', __( 'Tag Page', 'astha' ), false, $_wc_astha );

//Breadcrumb Image
$default_bred_img = get_template_directory_uri() . '/assets/images/breadcrumb-banner.png';
$breadcrumb_background           = astha_option( 'astha_breadcrumb_image', $default_bred_img, false, $_wc_astha );

$breadcrumb_style_image = false;
if( !empty( $breadcrumb_background ) ){
    $breadcrumb_style_image = "background-image: url($breadcrumb_background);";
}
?>

<div class="breadcrumb-wrap <?php echo esc_attr( $breadcrumb_style ); ?>" style="<?php echo esc_attr( $breadcrumb_style_image ); ?>">
    <div class="container">
        <div class="row">
            <div class="breadcrumb_title">
                
                <?php
                    /**
                     * Add content at the top of Breadcrumb
                     */
                    do_action( 'astha_breadcrumb_top' );
                    
                    if ( $breadcrumb_type == 'static' ) {
                        if ( is_page() ) :
                            echo sprintf( '<h1 class="entry-title">%s</h1>', $breadcrumb_page_title );

                        elseif( is_singular() ) :
                            echo sprintf( '<h1 class="entry-title">%s</h1>', $breadcrumb_single_post_title );
//                            the_title( '<h1 class="entry-title">', '</h1>' );
                        elseif( is_archive() ) :
                            if( is_category() ) :
                                echo sprintf( '<h1 class="page-title">%s</h1>', $breadcrumb_category_title );
                            elseif ( is_tag() ) :
                                echo sprintf( '<h1 class="page-title">%s</h1>', $breadcrumb_tag_title );
                            elseif ( is_archive( 'product' ) ) :
                                echo sprintf( '<h1 class="page-title">%s</h1>', $breadcrumb_shop_title );
                            endif;
                        elseif( is_search() ):
                            echo sprintf( '<h1 class="page-title">%s</h1>', $breadcrumb_search_title );
                        else:
                            echo sprintf( '<h1 class="page-title">%s</h1>', $breadcrumb_blog_title );
                        endif;
                    } else {
                        if ( is_singular() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                        elseif( is_archive() ) :
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                        elseif( is_search() ) :
                            printf( esc_html__( 'Search Results for: %s', 'astha' ), '<h3  class="page-title">' . get_search_query() . '</h3>' );
                        elseif( ! empty( single_post_title( '', false ) ) ):
                            echo wp_kses_post( '<h1 class="page-title">' . single_post_title( '', false ) . '</h1>' );
                        elseif( is_front_page() && is_home() ):
                            echo wp_kses_post( sprintf( '<h1 class="page-title">%s</h1>', $breadcrumb_blog_title ) );
                        elseif( is_404() ):
                            echo wp_kses_post( sprintf( '<h1 class="page-title">%s</h1>', esc_html__( '404', 'astha' ) ) );
                        else:
                            the_title( '<h2 class="entry-title">', '</h2>' );
                        endif;
                    }
                    
                    /**
                     * Add content at the top of Breadcrumb
                     */
                    do_action( 'astha_breadcrumb_bottom' );
                
                ?>
                
            </div>
            
            <?php if( ! is_front_page() ): ?>
            <div class="breadcrumb-menu">
                
                <?php 
                //Astha Breadcrumb is Loadidng Here
                astha_breadcrumb();
                ?>
                
            </div>
            <?php endif; ?>
        </div>
    </div>
</div><!-- Breadcrumb end -->

<?php 
/**
 * Adding content or something at the full bottom
 * I mean, After Breadcrumb
 * 
 * This Action will be available, Only when breadcrumb is On
 * Otherwise, it will not work
 */
do_action( 'astha_after_breadcrumb' );
