<?php
/**
 * Astha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astha
 */


if ( ! defined( 'MEDILAC_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MEDILAC_VERSION', '1.0.0' );
}

if ( ! defined( 'MEDILAC_CAPABILITY' ) ) {
    //medilac_theme_options capability used at ThemeRoot/admin/loader.php
    $medilac_cap = apply_filters( 'medilac_cap_theme_options', 'medilac_theme_options' ); //edit_theme_options
    define( 'MEDILAC_CAPABILITY', $medilac_cap );
}

if ( ! defined( 'MEDILAC_THEME_DIR' ) ) {
    define( 'MEDILAC_THEME_DIR', trailingslashit( get_template_directory() ) );
}

if ( ! defined( 'MEDILAC_THEME_URI' ) ) {
    define( 'MEDILAC_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
}

if ( ! defined( 'MEDILAC_CUSTOMIZER_URI' ) ) {
    define( 'MEDILAC_CUSTOMIZER_URI', trailingslashit( esc_url( MEDILAC_THEME_URI . 'inc/customizer/' ) ) );
}

/**
 * P R O Integration
 * 
 * @since 1.0.0.72
 */
if ( ! function_exists( 'medilac_fs' ) ) {
    // Create a helper function for easy SDK access.
    function medilac_fs() {
        global $medilac_fs;

        if ( ! isset( $medilac_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $medilac_fs = fs_dynamic_init( array(
                'id'                  => '8259',
                'slug'                => 'medilac-multiperpose-wordpress-theme',
                'type'                => 'theme',
                'public_key'          => 'pk_3c3c7c2c7b081c7f6dfb8b48e6314',
                'is_premium'          => true,
                'is_premium_only'     => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'is_org_compliant'    => false,
                'menu'                => array(
                    'slug'           => 'medilac_welcome',
                    'first-path'     => 'admin.php?page=medilac_welcome',
                    'support'        => false,
                ),
                // Set the SDK to work in a sandbox mode (for development & testing).
                // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
                'secret_key'          => 'sk_Pd!K.=y]_4$;*hW@J_kLP_Sxw-q00',
            ) );
        }

        return $medilac_fs;
    }

    // Init Freemius.
    medilac_fs();
    // Signal that SDK was initiated.
    do_action( 'medilac_fs_loaded' );
}



/**
 * Astha Themes Top Function, which can be use any where of any position of Astha Theme
 * Specially we have use a function name medilac_option() function to this file
 * It's should at the top of the Theme
 * 
 * @since 1.0.0.19
 * @by Saiful
 */
include get_theme_file_path('lib/top-functions.php'); //This file should at the top of the Functions file

//Full Theme Option Features Customizer from Here
include get_theme_file_path('lib/bulldozer.php');


if ( ! function_exists( 'medilac_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function medilac_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Astha, use a find and replace
		 * to change 'medilac' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'medilac', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'medilac' ),
				'head_bottom' => esc_html__( 'Head Bottom', 'medilac' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'medilac_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 76,
				'width'       => 300,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
                
                /**
                 * Post Formats: image,audio,video,gallery,quote
                 * Supporting for our theme.
		 *
		 * see: https://codex.wordpress.org/Post_Formats
                 * @since 1.0.0.54
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'audio',
			'video',
			'gallery',
			'quote',
		) );
                
                add_theme_support( 'wp-block-styles' );
                add_theme_support( 'editor-styles' );
                //add_editor_style( 'editor-style.css' ); //Code will be Change, now just sample code

                add_theme_support( 'responsive-embeds' );
                
                
                /**
                 * Image Theme Support
                 * Almost Medium size thumbnail.
                 * It's called medilac-thumbnail.
                 * 
                 * it will also will be use for Astha-core recent blog
                 * 
                 * @since 1.0.0.62
                 * @by Saiful
                 * @date 30.3.2021
                 */
                $width = apply_filters( 'medilac_thumb_width', 570 );
                $height = apply_filters( 'medilac_thumb_height', 356 );;
                add_image_size( 'medilac-thumbnail', $width, $height, true );

	}
endif;
add_action( 'after_setup_theme', 'medilac_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function medilac_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'medilac_content_width', 980 );
}
add_action( 'after_setup_theme', 'medilac_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function medilac_widgets_init() {
        //Register Sidebar only for WooCommerce
        if( class_exists( 'WooCommerce' ) ){
            register_sidebar(
                    array(
                            'name'          => esc_html__( 'WooCommerce Sidebar', 'medilac' ),
                            'id'            => 'sidebar-woocommerce',
                            'description'   => esc_html__( 'Add widgets here for WooCommerce page. These widget will be available only for WooCommerce page. Such: Product page, cart page etc.', 'medilac' ),
                            'before_widget' => '<section id="%1$s" class="widget widget-woocommerce %2$s">',
                            'after_widget'  => '</section>',
                            'before_title'  => '<h2 class="widget-title">',
                            'after_title'   => '</h2>',
                    )
            );
            
        }
    
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'medilac' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'medilac' ),
			'before_widget' => '<section id="%1$s" class="widget widget-general %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Common Sidebar', 'medilac' ),
			'id'            => 'sidebar-common',
			'description'   => esc_html__( 'Add widgets here. These widgets will display for Both Default WordPress as well as WooCommerce', 'medilac' ),
			'before_widget' => '<section id="%1$s" class="widget widget-common %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
        
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1st Position', 'medilac' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'medilac' ),
			'before_widget' => '<section id="%1$s" class="footer-widget footer-widget-1 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
        
        
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2nd Position', 'medilac' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'medilac' ),
			'before_widget' => '<section id="%1$s" class="footer-widget footer-widget-2 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
        
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3rd Position', 'medilac' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'medilac' ),
			'before_widget' => '<section id="%1$s" class="footer-widget footer-widget-3 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
        
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4th Position', 'medilac' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'medilac' ),
			'before_widget' => '<section id="%1$s" class="footer-widget footer-widget-4 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
        
        
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Three Right Side', 'medilac' ),
			'id'            => 'header-sidebar',
			'description'   => esc_html__( 'Add widgets for Header For Version Three Header.', 'medilac' ),
			'before_widget' => '<section id="%1$s" class="header-widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
        
        
}
add_action( 'widgets_init', 'medilac_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function medilac_scripts() {

    //FontAwesome
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/fontawesome.min.css', array(), MEDILAC_VERSION );
    wp_enqueue_style( 'fontawesome-solid', get_template_directory_uri() . '/assets/fontawesome/css/solid.min.css', array(), MEDILAC_VERSION );
    wp_enqueue_style( 'fontawesome-brands', get_template_directory_uri() . '/assets/fontawesome/css/brands.min.css', array(), MEDILAC_VERSION );
    wp_enqueue_style( 'fontawesome-regular', get_template_directory_uri() . '/assets/fontawesome/css/regular.min.css', array(), MEDILAC_VERSION );
    wp_enqueue_style( 'fontawesome-regular', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css', array(), MEDILAC_VERSION );


    
    /**
     * USED Animate.CSS
     * Credits: https://github.com/animate-css/animate.css
     * Website: https://animate.style/
     */
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), MEDILAC_VERSION );
    //Astha Style File
    wp_enqueue_style( 'medilac-style', get_stylesheet_uri(), array(), MEDILAC_VERSION );
    
    //Getenberg Styling
    wp_enqueue_style( 'medilac-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css', array(), MEDILAC_VERSION );
    
    /**
     * Main Style Sheet
     * has come from assets folder
     * 
     */
    wp_enqueue_style( 'medilac-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), MEDILAC_VERSION );
    

    
    /**
     * Different Type Layout
     * Such: Header One Two Style
     * Footer One Two Style
     * Basically for different type style, We have used this layout.css file
     * 
     * @since 1.0.0.14
     */
    wp_enqueue_style( 'medilac-layout', get_template_directory_uri() . '/assets/css/layout.css', array(), MEDILAC_VERSION );
    
    //Responsive CSS File
    wp_enqueue_style( 'medilac-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), MEDILAC_VERSION );

    
    
    wp_enqueue_script( 'medilac-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), MEDILAC_VERSION, true );
    
    /**
     * js Cookie Added for Astha
     * WooCommerce Also has used this plugin
     * 
     * Credit: https://github.com/js-cookie/js-cookie
     */
    wp_enqueue_script( 'js-cookie', get_template_directory_uri() . '/assets/js/js.cookie.min.js', array('jquery'), MEDILAC_VERSION, true );
    wp_enqueue_script( 'medilac-js', get_template_directory_uri() . '/assets/js/medilac.js', array('jquery'), MEDILAC_VERSION, true );
    
    $ajax_url = admin_url( 'admin-ajax.php' );
    $MEDILAC_DATA = array( 
        'theme_name'    => 'Astha',
        'author'        => 'Saiful islam',
        'author_email'  => 'codersaiful@gmail.com',
        'version'       => MEDILAC_VERSION,
        'ajaxurl'       => $ajax_url,
        'ajax_url'      => $ajax_url,
        'site_url'      => home_url(),
        'checkout_url'  => function_exists( 'wc_get_checkout_url' ) ? wc_get_checkout_url() : false, //If only found WooCommerce
        'cart_url'      => function_exists( 'wc_get_cart_url' ) ? wc_get_checkout_url() : false, //If only found WooCommerce wc_get_cart_url(),
        'cart_animation'    => 'animate__bounceIn', //Change based on Animate.css Link: https://animate.style/
        'cart_with_content'    => false,
        'theme_mode'    => get_theme_mods(),
    );
    $MEDILAC_DATA = apply_filters( 'medilac_localize_data', $MEDILAC_DATA );
    wp_localize_script( 'medilac-js', 'MEDILAC_DATA', $MEDILAC_DATA );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
    }
    
    /**
     * RTL CSS file
     * 
     * @since 1.0.0.68
     */
    if( is_rtl() ){
       wp_enqueue_style( 'medilac-rtl-style', get_template_directory_uri() . '/style-rtl.css', array(), MEDILAC_VERSION );
     
    }
}
add_action( 'wp_enqueue_scripts', 'medilac_scripts' );

/****************************************
 * IMPORTANT FILE INCLUDE
 *****************************************/

include get_theme_file_path('lib/cmb2.php');


/**
 * All Supported Third-party Plugin's 
 * CSS/Style or JS File Loader
 */
include get_theme_file_path('lib/plugin-support-script-loader.php');

//Including Comment Walker
include get_theme_file_path('lib/class-comment-walker.php');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load TGM Plugin Activation is Loading
 */
require_once get_template_directory() . '/required-plugins/required-plugins-args.php';


/**
 * Admin Loader will add Here Only for Logedin user
 * And all admin functionality will maintenance from that file.
 */
if( is_admin() ){
    include_once get_template_directory() . '/admin/loader.php';
}


