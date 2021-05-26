<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Medilac
 */

/**
 * *******************
 * IMPORTANT
 * **********************
 * THIS IS ONLY FOR STARTUP TIME
 * THE ARRAY OF WC image size, single image width, product grid
 * all will aply when Install theme. not for future use.
 * 
 * 
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function medilac_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
                apply_filters( 'medilac_wc_theme_support', array(
			'thumbnail_image_width' => 270,
			'single_image_width'    => 540,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 3,
				'min_columns'     => 2,
				'max_columns'     => 5,
			),
		)
            )
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'medilac_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 * WooCommerce Responsive File added here
 *
 * @since 1.0.0.29 - Added Responsive WooComerce file
 * 
 * @since 1.0.0
 *
 * @return void
 */
function medilac_woocommerce_scripts() {
    wp_enqueue_style( 'medilac-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), MEDILAC_VERSION );

    $font_path   = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
                    font-family: "star";
                    src: url("' . $font_path . 'star.eot");
                    src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
                            url("' . $font_path . 'star.woff") format("woff"),
                            url("' . $font_path . 'star.ttf") format("truetype"),
                            url("' . $font_path . 'star.svg#star") format("svg");
                    font-weight: normal;
                    font-style: normal;
            }';

    wp_add_inline_style( 'medilac-woocommerce-style', $inline_font );
    
    /**
     * Responsive File for WooCommerce Plugin Only
     * We will Add Responsive CSS Style here, Because WooCommerce Responsive file will 
     * load, When Woocommerce Installed and activated only.
     * 
     * *****************************
     * WooCommerce's Third Party Plugin's responsive Style also load from here 
     */
    wp_enqueue_style( 'medilac-responsive-woocommerce', get_template_directory_uri() . '/assets/css/responsive-woocommerce.css', array(), MEDILAC_VERSION );
    
    /**
     * WooCommerce Related JS will load, When only Woocommerce Install
     * 
     * @since 1.0.0.29
     */
    wp_enqueue_script( 'medilac-woocommerce-custom-js', get_template_directory_uri() . '/assets/js/woocommerce.js', array(), MEDILAC_VERSION, true );
    
}
add_action( 'wp_enqueue_scripts', 'medilac_woocommerce_scripts', 20 );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function medilac_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'medilac_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function medilac_woocommerce_related_products_args( $args ) {
	$defaults = array(
            'posts_per_page' => 3,
            'columns'        => 3,
            'orderby'        => 'rand', // @codingStandardsIgnoreLine.
	);
        
        /**
         * User able to change Related product arg by
         * using WooCommerce Default Filter Hook
         * @Hook woocommerce_output_related_products_args
         * 
         * Also able to do it by our Theme's Hook
         */
        $defaults = apply_filters( 'medilac_wc_related_products_args', $defaults );
        
	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'medilac_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'medilac_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function medilac_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main medilac-before-wc-wrapper">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'medilac_woocommerce_wrapper_before' );

if ( ! function_exists( 'medilac_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function medilac_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'medilac_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'medilac_woocommerce_header_cart' ) ) {
			medilac_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'medilac_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function medilac_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		medilac_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'medilac_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'medilac_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function medilac_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'medilac' ); ?>">
			<?php
                        do_action( 'medilac_minicart_cart_icon' );
                        /* translators: number of items in the mini cart. */
			$item_count_text = _n( 'item', 'items', WC()->cart->get_cart_contents_count(), 'medilac' );
                        $item_count_text = apply_filters( 'medilac_minicart_item_text', $item_count_text, WC()->cart );
                        if( WC()->cart->get_cart_contents_count() > 0 ){
			?>
			
                        <span class="count">
                            <span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
                            <span class="cart-item-text"><?php echo esc_html( $item_count_text ); ?></span>
                        </span>
                        <span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
                        <?php
                        }
                        ?>
		</a>
		<?php
	}
}

if ( ! function_exists( 'medilac_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function medilac_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php medilac_woocommerce_cart_link(); ?>
			</li>
                        <li class="minicart-content-wrapper">
				<?php
                                /**
                                 * Do Insert something at the Top of the Mincart
                                 */
                                do_action( 'medilac_minicart_top' );
                                
				$instance = array(
					//'title' => esc_html( 'My Cart', 'medilac' ),
					'title' => '',
				);
                                $instance = apply_filters( 'medilac_minicart_args', $instance );
				the_widget( 'WC_Widget_Cart', $instance );
                                
                                /**
                                 * Do Insert something at the Top of the Mincart
                                 */
                                do_action( 'medilac_minicart_bottom' );
                                
				?>
			</li>
		</ul>
		<?php
	}
}

/**
 * Finally we have used Template overriding
 * for WooCommerce andd added this bottom remove action and add action
 * 
 * to replace position as well as re-arrange
 * 
 * ***************************************
 * REMEMBERED
 * ***************************************
 * We have create a content-product.php template file
 * inside theme. location: theme/medilac/woocommerce/content-product.php
 * 
 * @since 1.0.0.61
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 8 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 12 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 8 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 12 );

if ( ! function_exists( 'medilac_shop_loop_cart_before' ) ) {
	
    /**
     * Add Tag at the begining of @Hook woocommerce_after_shop_loop_item
     * I have added a div tag
     * Because we need to change HTML markup
     * 
     * @return void
     */
    function medilac_shop_loop_cart_before() {
        $loop_wrp = apply_filters( 'medilac_wc_loop_wrapper', true );
        if( ! $loop_wrp ){
            return;
        }
        echo wp_kses_post( '<section class="medilac-after-loop-wrapper add-list-pack-inside-wrapper"><div class="add-list-pack-inside">' );
        do_action( 'medilac_wc_loop_wrapper_top' );
    }
}
//Already template override completed. so no need this action. Removed at 1.0.0.61 when we have completed first complete deadline
//add_action( 'woocommerce_after_shop_loop_item', 'medilac_shop_loop_cart_before', 5 );

if ( ! function_exists( 'medilac_shop_loop_cart_after' ) ) {
	
    /**
     * Add Tag at the end of @Hook woocommerce_after_shop_loop_item
     * I have added a div tag
     * Because we need to change HTML markup
     * 
     * @return void
     */
    function medilac_shop_loop_cart_after() {
        $loop_wrp = apply_filters( 'medilac_wc_loop_wrapper', true );
        if( ! $loop_wrp ){
            return;
        }
        do_action( 'medilac_wc_loop_wrapper_bottom' );
        echo wp_kses_post( '</div></section>' );
    }
}
//Already template override completed. so no need this action. Removed at 1.0.0.61 when we have completed first complete deadline
//add_action( 'woocommerce_after_shop_loop_item', 'medilac_shop_loop_cart_after', PHP_INT_MAX );


if ( ! function_exists( 'medilac_shop_loop_thumbs_before' ) ) {
	
    /**
     * Add Tag at the begining of @Hook woocommerce_after_shop_loop_item
     * I have added a div tag
     * Because we need to change HTML markup
     * 
     * @return void
     */
    function medilac_shop_loop_thumbs_before() {
        
        echo wp_kses_post( '<span class="medilac-loop-thumbs">' );
    }
}
//To add tag with class at the first of this loop
add_action( 'woocommerce_before_shop_loop_item_title', 'medilac_shop_loop_thumbs_before', 9 );

if ( ! function_exists( 'medilac_shop_loop_thumbs_after' ) ) {
	
    /**
     * Add Tag at the end of @Hook woocommerce_after_shop_loop_item
     * I have added a div tag
     * Because we need to change HTML markup
     * 
     * @return void
     */
    function medilac_shop_loop_thumbs_after() {
        echo wp_kses_post( '</span>' );
    }
}
//To add tag with class at the last of this loop
add_action( 'woocommerce_before_shop_loop_item_title', 'medilac_shop_loop_thumbs_after', 11 );

/**
 * Single Product ACTION HOOK ARRAGE
 * And Management
 * for 
 * Product Meda
 * Bread Crumb 
 * title
 * ETC 
 */
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

$medilac_breadcrumb = medilac_option( 'medilac_breadcrumb_switch', false );
if( $medilac_breadcrumb ){
    add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 0 );
}


if( !function_exists( 'medilac_get_shop_layout' ) ) {
    function medilac_get_shop_layout(){
        $layout_key_name = 'shop';

        //Check from Cookie
        if( isset( $_COOKIE[$layout_key_name] ) && ! empty( $_COOKIE[$layout_key_name] ) ) {
            return $_COOKIE[$layout_key_name];
        }
        
        //First Check from link
        if( ! isset( $_COOKIE[$layout_key_name] ) && isset( $_GET['layout'] ) && ! empty( $_GET['layout'] ) ){
            $layout = $_GET['layout'];

            //setcookie( $layout_key_name, $layout, time() + 86400 * 3 );
            return $layout;
        }
        
        
        $shop_layout = medilac_option('layout_shop_wc', 'shop-grid');

        
        return $shop_layout;
    }
}
if( !function_exists( 'medilac_catalog_display_options' ) ) {
    
    /**
     * Adding Product View Option for WooCommerce Shop Page
     * for 
     * Grid View Button
     * And List View Button
     * 
     * @return void It will display two view option.
     */
    function medilac_catalog_display_options() {
        //$_wc_medilac = '_wc';
        $layout = medilac_get_shop_layout();//medilac_option( 'layout_shop' . $_wc_medilac, 'shop-grid' );

        $pageURL = 'http';
        if (isset( $_SERVER["HTTPS"] ) && $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }

        ?>
            <div class="product-view-option">
                <a href="<?php echo esc_url( $pageURL ); ?>" class="product-view-btn grid-view  <?php echo esc_attr( $layout == 'shop-grid' ? 'selected' : '' ); ?>" data-type="shop-grid"><i class="fas fa-th"></i></a>
                <a href="<?php echo esc_url( $pageURL ); ?>" class="product-view-btn list-view <?php echo esc_attr( $layout == 'shop-list' ? 'selected' : '' ); ?>" data-type="shop-list"><i class="fas fa-th-list"></i></a>
            </div>
        <?php
    }
}
add_action( 'woocommerce_before_shop_loop', 'medilac_catalog_display_options', 25 );

if( !function_exists( 'medilac_wc_next_prev_text' ) ) {
    
    /**
     * Change Next Previous Icon from Shop Page Pagination
     * 
     * 
     * @param type $args
     * @return type
     */
    function medilac_wc_next_prev_text( $args ) {

        $args['prev_text'] = __( 'Previous Page', 'medilac' );
        $args['next_text'] = __( 'Next Page', 'medilac' );
        
        return $args;
    }
}
add_filter( 'woocommerce_pagination_args', 'medilac_wc_next_prev_text', PHP_INT_MAX );

if( !function_exists( 'medilac_wc_shop_loop_short_description' ) ) {
    
    /**
     * Add short description for Shop Page
     * After Price
     * If a user want to change it, Easily able to do it by
     * changing priority
     * 
     * @since 1.0.0.31
     * 
     * @author Saiful Islam<codersaiful@gmail.com>
     * 
     * @link https://woocommerce.github.io/code-reference/files/woocommerce-templates-content-product.html#source-view.57 Template file code from WooCommerce
     */
    function medilac_wc_shop_loop_short_description(  ) {
        global $product;
        $short_description = $product->get_short_description();
        $short_description = apply_filters( 'medilac_product_loop_desc', $short_description, $product );
        ?>
        <div class="shop-loop-shortdescription">
            <?php echo wp_kses_post( do_shortcode( $short_description ) ); ?>
        </div>    
        <?php
    }
}
add_action( 'woocommerce_after_shop_loop_item_title', 'medilac_wc_shop_loop_short_description', 20 );



if( !function_exists( 'medilac_wc_sinle_product_next_prev_link' ) ) {
    
    /**
     * Add Next Previous Link at Single Product Page
     * 
     * 
     * @param type $args
     * @return type
     */
    function medilac_wc_sinle_product_next_prev_link(  ) {
        if( ! is_singular() || !is_product() ){
            return;
        }

        
        
        //do_action( 'woocommerce_single_product_summary' );
        the_post_navigation(
                array(
                    //'in_same_term'  => true,
                    'taxonomy'           => 'product_cat',
                    'class'              => 'post-navigation',
                        'prev_text' => '<span class="prev-next-post-icon"><i class="fas fa-arrow-left"></i></span><div class="medilac-nav-wrapper prev-post-text"><span class="nav-subtitle">' . esc_html__( 'Previous:', 'medilac' ) . '</span> <span class="nav-title">%title</span></div>',
                        'next_text' => '<div class="medilac-nav-wrapper next-post-text"><span class="nav-subtitle">' . esc_html__( 'Next:', 'medilac' ) . '</span> <span class="nav-title">%title</span></div><span class="prev-next-post-icon"><i class="fas fa-arrow-right"></i></span>',
                )
        );
        
    }
}


if( class_exists( 'YITH_WCWL_Shortcode' ) ){
    add_action( 'woocommerce_after_add_to_cart_button', 'medilac_wishlist_control_by_shortcode' );
    function medilac_wishlist_control_by_shortcode(){
        $atts = array();
        echo YITH_WCWL_Shortcode::add_to_wishlist( $atts );
    }
}



/**
 * Just need to enable for showing enxt prev button on single product page
 */
//add_action( 'woocommerce_before_main_content', 'medilac_wc_sinle_product_next_prev_link', 19 );
//add_action( 'woocommerce_single_product_summary', 'medilac_wc_sinle_product_next_prev_link', PHP_INT_MAX );
