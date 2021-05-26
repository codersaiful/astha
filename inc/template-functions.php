<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Medilac
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function medilac_body_classes( $classes ) {
        //Add Theme Name at body
        $classes[] = 'medilac';
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

        /**
         * We will add 'no-sidebar' class at body, If not found any sidebar widget at
         * sidebar
         * sidebar-woocommerce
         * and
         * sidebar-common
         */
        $custom_sidebar = apply_filters( 'medilac_custom_sidebar_bool', false );
        
        $sidebar = 0;
	if ( is_active_sidebar( 'sidebar' ) ) {
            $sidebar++;
	}
        if ( is_active_sidebar( 'sidebar-woocommerce' ) ) {
            $sidebar++;
	}
        
        if ( is_active_sidebar( 'sidebar-common' ) ) {
            $sidebar++;
	}
        
        if( $custom_sidebar ){
            $sidebar++; 
         }
        
        
        /**
         * If sidebar item count is not gater than Zero
         * then Our theme will show/add no-sidebar class at the body
         */
        if( ! $sidebar ){
            $classes[] = 'no-sidebar';
        }
        
	// Adds a class for Device Type
	if ( function_exists( 'medilac_get_device_type' ) ) {
		$classes[] = 'medilac-device-' . medilac_get_device_type();
	}
         

        /**
         * To identify as Another 
         * of shop or default header, we able to set variable at the top of the file
         */
        $_wc = $custom_header = $custom_footer = false;
        $header = 'header-one';
        $topbar = 'topbar-one';
        if( medilac_is_woocommerce() ){
            $_wc = '_wc';
        }

        /**
         * Default Header one is set as default header
         * @default header-one $header
         */
        $header_layout = medilac_option( 'layout_header', $header, false, $_wc );
        $topbar = medilac_option( 'layout_topbar', $topbar, false, $_wc ); 


        $classes[] = $_wc;

        $classes[] = 'current-' . $topbar;
        $classes[] = medilac_option( 'shop_loop_product_temp', 'shop-template-default' ); //For Shop Loop Product Template
        $classes[] = 'current-' . medilac_option( 'layout_footer', false, false, $_wc );
        $classes[] = medilac_option( 'layout_sidebar', 'right-sidebar', false, $_wc );
        $classes[] = 'breadcrumb-' . medilac_option( 'medilac_breadcrumb_switch', false, false, $_wc );
        $classes[] = 'breadcrumb-' . medilac_option( 'medilac_breadcrumb_type', false, false, $_wc );
        $classes[] = 'header-sticky-' . medilac_option( 'medilac_header_sticky', 'off' );
        $classes[] = 'header-' . medilac_option( 'medilac_header_width', 'fluid' );
        //$classes[] = 'socket-sticky-' . medilac_option( 'medilac_sticky_socket', 'off', false, $_wc );

        /**
         * Using medilac_blog_layout
         * function in template-function.php
         * there is no default value set.
         * 
         * @since 1.0.0.62
         * 
         * Page wise and condition wise body class for body has added at V1.0.0.67
         * Added date 13.4.2021
         */
        $blog_layout = medilac_blog_layout();
        if( ! empty( $blog_layout ) && ! medilac_is_woocommerce() && ! is_single() && ! is_front_page() && ( is_front_page() || is_archive() || is_home() ) ){
            $classes[] = 'blog-layout-' . $blog_layout;
        }
        /**
         * Actually If installed WooCommerce,
         * Then I will add layout class at body tag.
         * Otherwise, that class will not add at the body
         * 
         * @since  1.0.0.22
         * 
         * This only when Archive class added
         */
        if( medilac_is_woocommerce() && is_archive() ){
            $classes[] = 'layout-' . medilac_get_shop_layout();//medilac_option( 'layout_shop' . $_wc, 'shop-grid' );
        }

        /**
         * Checking Custom Header, If found numeric header from customizer
         * AND
         * custom header class adding at the body tag
         * 
         * @since 1.0.0.44 Actually at 1.0.0.56
         * @by Saiful
         */
        if( is_numeric( $header_layout ) ){

            $classes[] = 'elementor-header';
            $classes[] = 'custom-header';
            $classes[] = 'custom-header-' . $header_layout;
        }else{
            $classes[] = 'current-' . $header_layout;
        }

        /**
         * In by Default: Topbar will hidden from Mobile Device
         * 
         * If any developer want to show from Child theme or from any plugin
         * Just need to change the class name.
         * Or user able to change by using following 
         * 
         * add_filter( 'medilac_topbar_hide_mobile','__return_false' );
         * 
         * or
         * 
         * add_filter( 'medilac_topbar_hide_mobile','your_function' );
         * 
         * add_filter( 'medilac_topbar_hide_mobile','__return_false' );
         * Important: for new name, Need obviously String
         */
        $topbar_hide_mobile = apply_filters( 'medilac_topbar_hide_mobile', 'topbar-hide-on-mobile' );

        if( is_string( $topbar_hide_mobile ) && ! empty( $topbar_hide_mobile ) ){
            $classes[] = $topbar_hide_mobile;
        }

        
	return $classes;
}
add_filter( 'body_class', 'medilac_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function medilac_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'medilac_pingback_header' );

/**
 * Pagination
 * 
 * @package Medilac
 * 
 * @global type $wp_query
 * @return void
 */
function medilac_post_pagination() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /* Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /* Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /* Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    ?>
    <div class="medilac-pagination-wrapper">
        <ul class="medilac-pagination">    
    <?php
 
    /* Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('&laquo;') );
 
    /* Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            printf('<li>%s</li>',"...");
    }
 
    /* Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /* Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            printf('<li>%s</li>'  . "\n","...");
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /* Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('&raquo;') );
 

    ?>
        </ul> <!-- .medilac-pagination -->
    </div><!-- .medilac-pagination-wrapper -->
    <?php
 
}


if( !function_exists( 'medilac_comments_fields_placeholder' ) ){
    
    /**
     * To change WordPress, Default Form field, you can use this.
     * I have made it for Developer, who want to change.
     * Currently I have changed by JavaScript
     * 
     * @param type $fields
     * @return string
     */
    function medilac_comments_fields_placeholder( $fields ) {

        $name = esc_html__( 'Name', 'medilac' );
        $fields['author'] = '<p class="comment-form-author"><label for="author">';
        $fields['author'] .= $name;
        $fields['author'] .= ' <span class="required">*</span></label> <input id="author" placeholder="' . esc_attr( $name . ' (*)' ) . '" name="author" type="text" value="" size="30" maxlength="245" required="required" /></p>';
        
        // <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required='required' /></p>
        $name = esc_html__( 'Email', 'medilac' );
        $fields['email'] = '<p class="comment-form-email"><label for="email">';
        $fields['email'] .= $name;
        $fields['email'] .= '<span class="required">*</span></label> <input id="email" placeholder="' . esc_attr( $name . ' (*)' ) . '" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required" /></p>';
        
        //<p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url" value="" size="30" maxlength="200" /></p>
        $name = esc_html__( 'Website', 'medilac' );
        $fields['url'] = '<p class="comment-form-url"><label for="url">';
        $fields['url'] .= $name;
        $fields['url'] .= '</label> <input id="url" placeholder="' . esc_attr( $name ) . '" name="url" type="url" value="" size="30" maxlength="200" /></p>';
        
        
        return $fields;
    }
}


if( !function_exists( 'medilac_comments_fields_placeholder' ) ){
    
    /**
     * To change WordPress, Default Form field, you can use this.
     * I have made it for Developer, who want to change.
     * Currently I have changed by JavaScript
     * 
     * @param type $fields
     * @return string
     */
    function medilac_comments_fields_placeholder( $fields ) {

        $name = esc_html__( 'Name', 'medilac' );
        $fields['author'] = '<p class="comment-form-author"><label for="author">';
        $fields['author'] .= $name;
        $fields['author'] .= ' <span class="required">*</span></label> <input id="author" placeholder="' . esc_attr( $name . ' (*)' ) . '" name="author" type="text" value="" size="30" maxlength="245" required="required" /></p>';
        
        // <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required='required' /></p>
        $name = esc_html__( 'Email', 'medilac' );
        $fields['email'] = '<p class="comment-form-email"><label for="email">';
        $fields['email'] .= $name;
        $fields['email'] .= '<span class="required">*</span></label> <input id="email" placeholder="' . esc_attr( $name . ' (*)' ) . '" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required" /></p>';
        
        //<p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url" value="" size="30" maxlength="200" /></p>
        $name = esc_html__( 'Website', 'medilac' );
        $fields['url'] = '<p class="comment-form-url"><label for="url">';
        $fields['url'] .= $name;
        $fields['url'] .= '</label> <input id="url" placeholder="' . esc_attr( $name ) . '" name="url" type="url" value="" size="30" maxlength="200" /></p>';
        
        
        return $fields;
    }
}
//This Tas has done by JavaScript
//add_filter( 'comment_form_default_fields', 'medilac_comments_fields_placeholder' );


if( !function_exists( 'medilac_placeholder_comment_form_field' ) ){
    
    /**
     * For: Comment Form Placeholder Comment Field
     * To change WordPress, Default Form field, you can use this.
     * I have made it for Developer, who want to change.
     * Currently I have changed by JavaScript
     * 
     * @param type $fields
     * @return string
     */
    function medilac_placeholder_comment_form_field( $fields ) {
       $replace_comment = __('Your Comment', 'medilac');

       $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
       '</label><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.$replace_comment.'" aria-required="true"></textarea></p>';

       return $fields;
    }

}
//This Tas has done by JavaScript
//add_filter( 'comment_form_defaults', 'medilac_placeholder_comment_form_field' );

//Test Perpose
if( !function_exists( 'medilac_customizer_paginate' ) ){
    
    /**
     * Customize 
     */
    function medilac_customizer_paginate( $dddd ){

        return $dddd;
    }
}
//add_filter( 'navigation_markup_template', 'medilac_customizer_paginate', 999 );

if( !function_exists( 'medilac_social_share' ) ) {
    /**
     * Social share button will show in post or page
     * 
     * @since 1.0.0.26
     */
    function medilac_social_share() {
        $share_facebook_enabled = $share_twitter_enabled = $share_pinterest_enabled = $share_email_enabled = $share_whatsapp_enabled = $share_url_enabled = true;
        $share_title = esc_html( 'Share', 'medilac' );
        $share_title = apply_filters( 'medilac_share_title', $share_title );
        $share_title = wp_kses_post( $share_title );
        
        $share_link_url = get_the_permalink();
        $share_link_title = get_the_title();
        $share_twitter_summary = $share_summary = get_the_excerpt();
        $share_image_url = '';
        $share_whatsapp_url = 'https://web.whatsapp.com/send?text=' . $share_link_title  . ' - '. urlencode( $share_link_url );
        $share_whatsapp_icon = '<i class="fab fa-whatsapp"></i>';
        $share_email_icon = '<i class="far fa-envelope"></i>';
        $share_pinterest_icon = '<i class="fab fa-pinterest-p"></i>';
        $share_facebook_icon = '<i class="fab fa-facebook-f"></i>';
        $share_twitter_icon =  '<i class="fab fa-twitter"></i>';
        ?>
        <div class="medilac-share">
            <h4 class="medilac-share-title"><?php echo esc_html( $share_title ); ?></h4>
            <ul>
                    <?php if ( $share_facebook_enabled ): ?>
                            <li class="share-button">
                                    <a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode( $share_link_url ); ?>&p[title]=<?php echo esc_attr( $share_link_title ); ?>" title="<?php esc_attr_e( 'Facebook', 'medilac' ); ?>">
                                            <?php echo $share_facebook_icon ? $share_facebook_icon : esc_html__( 'Facebook', 'medilac' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                            </li>
                    <?php endif; ?>

                    <?php if ( $share_twitter_enabled ): ?>
                            <li class="share-button">
                                    <a target="_blank" class="twitter" href="https://twitter.com/share?url=<?php echo urlencode( $share_link_url ); ?>&amp;text=<?php echo esc_attr( $share_twitter_summary ); ?>" title="<?php esc_html_e( 'Twitter', 'medilac' ); ?>">
                                            <?php echo $share_twitter_icon ? $share_twitter_icon : esc_html__( 'Twitter', 'medilac' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                            </li>
                    <?php endif; ?>

                    <?php if ( $share_pinterest_enabled ): ?>
                            <li class="share-button">
                                    <a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( $share_link_url ); ?>&amp;description=<?php echo esc_attr( $share_summary ); ?>&amp;media=<?php echo esc_attr( $share_image_url ); ?>" title="<?php esc_html_e( 'Pinterest', 'medilac' ); ?>" onclick="window.open(this.href); return false;">
                                            <?php echo $share_pinterest_icon ? $share_pinterest_icon : esc_html__( 'Pinterest', 'medilac' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                            </li>
                    <?php endif; ?>

                    <?php if ( $share_email_enabled ): ?>
                            <li class="share-button">
                                    <a class="email" href="mailto:?subject=<?php echo esc_attr( apply_filters( 'yith_wcwl_email_share_subject', $share_link_title ) ); ?>&amp;body=<?php echo esc_attr( apply_filters( 'yith_wcwl_email_share_body', urlencode( $share_link_url ) ) ); ?>&amp;title=<?php echo esc_attr( $share_link_title ); ?>" title="<?php esc_html_e( 'Email', 'medilac' ); ?>">
                                            <?php echo $share_email_icon ? $share_email_icon : __( 'Email', 'medilac' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                            </li>
                    <?php endif; ?>

                    <?php if ( $share_whatsapp_enabled ):
                            ?>
                            <li class="share-button">
                                    <a class="whatsapp" href="<?php echo esc_attr( $share_whatsapp_url ); ?>" data-action="share/whatsapp/share" target="_blank" title="<?php esc_html_e( 'WhatsApp', 'medilac' ); ?>">
                                            <?php echo $share_whatsapp_icon ? $share_whatsapp_icon : esc_html__( 'Whatsapp', 'medilac' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                            </li>
                    <?php endif;
                    ?>
            </ul>
<!--
            <?php if ( $share_url_enabled ): ?>
                    <div class="medilac-after-share-section">
                            <input class="copy-target" readonly="readonly" type="url" name="yith_wcwl_share_url" id="yith_wcwl_share_url" value="<?php echo esc_attr( $share_link_url ); ?>"/>
                            <?php echo ( ! empty( $share_link_url ) ) ? sprintf( '<small>%s <span class="copy-trigger">%s</span> %s</small>', esc_html__( '(Now', 'medilac' ), esc_html__( 'copy', 'medilac' ), esc_html__( 'this wishlist link and share it anywhere)', 'medilac' ) ) : ''; ?>
                    </div>
            <?php endif; ?>
-->
            <?php // do_action( 'yith_wcwl_after_share_buttons', $share_link_url, $share_title, $share_link_title ); ?>
    </div>
        <?php
    }
}

add_action( 'woocommerce_share', 'medilac_social_share' );
//Just need to add Do Ation for this HOOOK
add_action( 'medilac_share', 'medilac_social_share' );

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function medilac_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

if( !function_exists( 'medilac_header_search' ) ) {
    /**
     * Call the header search widget
     */
    function medilac_header_search() {
       
       $search_switch = medilac_option( 'medilac_searchbox_switch', 'on' );
       ?>
        <div class="custom-search-wrapper">
            <div class="custom-search-inside">
                <?php
                if( class_exists( 'WooCommerce' ) && $search_switch !== 'off' ){
                    get_product_search_form();
                }else{
                    get_search_form();
                }
                ?>
            </div>
        </div>
    <?php
    }
}
//add_action( 'medilac_after_header', 'medilac_header_search' );
add_action( 'medilac_header_search_box', 'medilac_header_search', 10 );

if( !function_exists( 'medilac_header_user_login' ) ) {
    /**
     * Function for front user login feature
     */
    function medilac_header_user_login() {

        ?>
        <div class="user-login-icon">
            <?php

            $link = class_exists( 'WooCommerce' ) ? get_permalink( get_option('woocommerce_myaccount_page_id') ) : admin_url();
            $link = apply_filters( 'medilac_user_login_url', $link );
            
            if ( is_user_logged_in() ) {
            ?>

            <a href="<?php echo esc_url( $link ); ?>" title="<?php _e('My Account','medilac'); ?>"><i class="fas fa-user"></i></a>

            <?php 
            }else { ?>

            <a href="<?php echo esc_url( $link ); ?>" title="<?php _e('Login / Register','medilac'); ?>"><i class="fas fa-user"></i></a>

            <?php 

            }
            ?>
        </div>
        <?php
    }
}

add_action( 'medilac_tools_panel', 'medilac_header_user_login', 10 );

if( !function_exists( 'medilac_header_search_control' ) ) {
    /**
     * Function for front user login feature
     */
    function medilac_header_search_control() {
        
        ?>
    <div class="search-control-icon">
        <i class="fas fa-search"></i>
        <?php 
        /**
         * To insert Search box here
         * 
         * @Hooked medilac_header_search -10 at template-functions.php (this file)
         */
        do_action( 'medilac_header_search_box' ); ?>
    </div>
        <?php
        
    }
}

add_action( 'medilac_tools_panel', 'medilac_header_search_control', 0 );

if( !function_exists( 'medilac_topbar_right_area' ) ) {
    
    /**
     * Generating Minicart or Call to action button for Topbar
     * 
     * @param type $options
     * @return void
     */
    function medilac_topbar_right_area( $options ) {
        
        if( ! isset( $options['tobpar_right_area'] ) ){
            return;
        }
        $r_area = isset( $options['tobpar_right_area']) ? $options['tobpar_right_area'] : 'c2a';
        
        if( $r_area == 'minicart' ){
        ?>
        <div class="topbar-mini-cart-wrapper  header-minicart-wrapper">
            <?php
		if ( function_exists( 'medilac_woocommerce_header_cart' ) ) {
                    $shop_text = isset( $options['minicart_text'] ) ? $options['minicart_text'] : __( 'Shopping Cart', 'medilac' ) ;
                    $shop_text = apply_filters( 'medilac_header_shop_text', $shop_text );
                    ?>
                    <span class="topbar-shopping-cart-text"><?php echo esc_html( $shop_text ); ?></span>    
                    <?php
			medilac_woocommerce_header_cart();
		}
            ?>
        </div>    
        <?php    
        }elseif( $r_area == 'c2a' ){
        $label = isset( $options['c2a_label'] ) ? $options['c2a_label'] : esc_html__( 'Free Consultant' );
        $url = isset( $options['c2a_url'] ) ? $options['c2a_url'] : '#';
        ?>
        <div class="consult_btn">
            <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
        </div>       
        <?php    
        }


    }
}

add_action( 'medilac_topbar_right_area', 'medilac_topbar_right_area', 20 );

if( !function_exists( 'medilac_social_links' ) ){
    
    /**
     * Providing Social Link, Mainly for Topbar
     * We also use it for Footer Social Link.
     * 
     * @param array $options Should be array, otherwise, it will return null.
     * @param bool $echo Default is true, If set false, then total value will return. need to print for showing.
     * @return void
     */
    function medilac_social_links( $social_network = false, $echo = true ){
        if( ! isset( $social_network['social'] ) || ! is_array( $social_network['social'] ) ){
            return;
        }
        $social = $social_network['social'];
        $social = is_array( $social ) ? array_filter( $social ) : false;
        
        if( empty( $social ) ){
            return;
        }
        
        if( ! $echo){
            
            ob_start();
        }

        if( is_array( $social ) ){
        ?>
            <ul class="social_link">
                <?php foreach ( $social as $social_key => $social_link ){ 
                        if( !empty( $social_link ) ){
                            $convrt_key = str_replace( ' ', '-', $social_key );
                        ?>

                            <li class="social-item social-<?php echo esc_attr( $convrt_key ); ?>"><a class="social-item-link" href="<?php echo esc_url( $social_link ); ?>"><i class="<?php echo esc_attr( $social_key ); ?>"></i></a></li>

                        <?php 

                        }
                    
                    } ?>
            </ul>
        <?php
        }
        if( ! $echo){
           return ob_get_clean();
        }
    }
}

add_action( 'medilac_entry_header', 'medilac_entry_header_content', 20 );
if( ! function_exists( 'medilac_entry_header_content' ) ){
    
    /**
     * Entry Header for Post
     * 
     * Adding Article Entry Header Using this Function
     * We have used this function for Action Hook.
     */
    function medilac_entry_header_content(){

        ?>
        <header class="entry-header">
            <?php
            if ( 'post' === get_post_type() ) :
                    ?>
                    <div class="entry-meta">
                            <?php
                            if( ! empty( medilac_option( 'medilac_blog_taxonomy', 'on' ) ) ){
                                medilac_taxonomy_by();
                            }
                            
                            if( ! empty( medilac_option( 'medilac_blog_posted_by', 'on' ) ) ){
                                medilac_posted_by();
                            }
                            
                            
                            if( ! empty( medilac_option( 'medilac_blog_posted_on', 'on' ) ) && ( medilac_blog_layout() !== 'grid' || is_singular() ) ){
                                medilac_posted_on();
                            }
                            
                            ?>
                    </div><!-- .entry-meta -->
            <?php endif;

            if ( is_singular() ) :
                $breadcrumb_switch              = medilac_option( 'medilac_breadcrumb_switch' );
                $breadcrumb_type                = medilac_option( 'medilac_breadcrumb_type' );

                if( $breadcrumb_switch === 'off' || ( $breadcrumb_switch === 'on' && $breadcrumb_type === 'static' ) ):
                    the_title( '<h1 class="entry-title">', '</h1>' );
                endif;
            else :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

             ?>
	</header><!-- .entry-header -->

        <?php
    }
}

add_action( 'medilac_none_page', 'medilac_none_page_content', 20 );
if( ! function_exists( 'medilac_none_page_content' ) ){
    
    /**
     * None page, which location is
     * template-parts/content-none.php
     * 
     * Actually this Function is for Hook medilac_none_page
     * of template-parts/content-none.php file
     * 
     * @since 1.0.0.43
     */
    function medilac_none_page_content(){

        if ( is_home() && current_user_can( 'publish_posts' ) ) :

                printf(
                        '<p>' . wp_kses(
                                /* translators: 1: link to WP admin new post page. */
                                __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'medilac' ),
                                array(
                                        'a' => array(
                                                'href' => array(),
                                        ),
                                )
                        ) . '</p>',
                        esc_url( admin_url( 'post-new.php' ) )
                );

        elseif ( is_search() ) :
                ?>

                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'medilac' ); ?></p>
                <?php
                get_search_form();

        else :
                ?>

                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'medilac' ); ?></p>
                <?php
                get_search_form();

        endif;
    }
}

if( ! function_exists( 'medilac_social_networks' ) ){
    
    /**
     * List of our supported Social Network
     * we have taken name from Font-Awesome icon name.
     * 
     * @return Array
     */
    function medilac_social_networks(){
        
        return array(
            'fab fa-facebook-f'         => __( 'Facebook', 'medilac' ),
            'fab fa-twitter'            => __( 'Twitter', 'medilac' ),
            'fab fa-linkedin-in'        => __( 'LinkedIn', 'medilac' ),
            'fab fa-instagram'          => __( 'Instagram', 'medilac' ),
            'fab fa-youtube-square'     => __( 'Youtube', 'medilac' ),
            'fab fa-vimeo'              => __( 'Vimeo', 'medilac' ),
            'fab fa-pinterest'          => __( 'Pinterest', 'medilac' ),
            'fab fa-reddit'             => __( 'Reddit', 'medilac' ),
            'fab fa-whatsapp'           => __( 'WhatsApp', 'medilac' ),
            'fab fa-facebook-messenger' => __( 'Facebook Messenger', 'medilac' ),
            //'fab fa-adobe'              => __( 'Adobe', 'medilac' ),
            'fab fa-amazon'             => __( 'Amazon', 'medilac' ),
            'fab fa-angellist'          => __( 'AngelList', 'medilac' ),
            'fab fa-behance'            => __( 'Behance', 'medilac' ),
            'fab fa-blogger-b'          => __( 'Blogger', 'medilac' ),
            'fab fa-delicious'          => __( 'Delicious', 'medilac' ),
            'fab fa-digg'               => __( 'Digg', 'medilac' ),
            'fab fa-github'             => __( 'Github', 'medilac' ),
            'fab fa-jsfiddle'           => __( 'JSFiddle', 'medilac' ),
            'fab fa-patreon'            => __( 'Patreon', 'medilac' ),
            'fab fa-slack'              => __( 'Slack', 'medilac' ),
            'fab fa-snapchat'           => __( 'Snapchat', 'medilac' ),
            'fab fa-telegram'           => __( 'Telegram', 'medilac' ),
            'fab fa-tumblr'             => __( 'Tumblr', 'medilac' ),
            'fab fa-vine'               => __( 'Vine', 'medilac' ),
        );
    }
}
add_filter( 'medilac_social_network_arr', 'medilac_social_networks' );