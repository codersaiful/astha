<?php
/**
 * astha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package astha
 */

if ( ! defined( '_ASTHA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_ASTHA_VERSION', '1.0.0' );
}

if ( ! function_exists( 'astha_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function astha_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on astha, use a find and replace
		 * to change 'astha' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'astha', get_template_directory() . '/languages' );

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
				'primary' => esc_html__( 'Primary', 'astha' ),
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
				'astha_custom_background_args',
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
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'astha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function astha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'astha_content_width', 640 );
}
add_action( 'after_setup_theme', 'astha_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function astha_scripts() {
	wp_enqueue_style( 'astha-style', get_stylesheet_uri(), array(), _ASTHA_VERSION );
	wp_style_add_data( 'astha-style', 'rtl', 'replace' );

	wp_enqueue_script( 'astha-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _ASTHA_VERSION, true );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	
	wp_enqueue_style( 'navbar', get_template_directory_uri() . '/assets/css/navbar.min.css');
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	
	wp_enqueue_style( 'astha-main-style', get_template_directory_uri() . '/assets/css/astha-style.css');
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true );
	/**
	 * enqueu js.
	 */
	wp_enqueue_script( 'navbar-js', get_template_directory_uri() . '/assets/js/navbar.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'lazyload', get_template_directory_uri() . '/assets/js/lazy-load-images.min.js', array(), '20151215', true );
			
	wp_enqueue_script( 'astha-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'astha_scripts' );

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
 * Functions which added by hook
 */
require get_template_directory() . '/inc/theme-hooks.php';

/**
 * Kirki Customizer.
 */
require get_template_directory() . '/inc/kirki/kirki.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-social.php';

/**
 * Latest post widget additions.
 */
require get_template_directory() . '/inc/class-astha-latest-post.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

