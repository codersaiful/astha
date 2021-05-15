<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package astha
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function astha_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'astha_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function astha_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'astha_pingback_header' );

/** 
Add Image Size 
**/
function astha_thumbsize() {
	add_image_size( 'astha-sidebar-thumbnail', 100, 100, true );
	add_image_size( 'astha-search-thumbnail', 150, 150, true );
	add_image_size( 'astha-home-thumbnail', 370, 320, true );
	add_image_size( 'astha-blog-thumbnail', 1200, 628, true );
}
add_action( 'after_setup_theme', 'astha_thumbsize' );

/** 
Custom Excerpt 
**/
add_filter( 'excerpt_length', 'astha_get_excerpt' );

function astha_get_excerpt( $count ) {
	global $post;
	$permalink = esc_url(get_permalink($post->ID));
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = wp_kses_post(substr($excerpt, 0, strripos($excerpt, " ")));
	$read_more_btn = sprintf( '%1$s <p class="read-more-button-container"><a class="read_more_btn" href="%2$s">%3$s</a></p>',
			$excerpt,
			get_permalink(),
			__( 'Continue reading', 'astha' )
		);
	if(is_home() || is_front_page()){
	$excerpt = '<p>'.$excerpt.'... '.$read_more_btn.'</p>';
		return $excerpt;
	}
}


/** 
Site Logo  
**/
function astha_site_logo( $args = array(), $echo = true ) {
	$logo       = get_custom_logo();
	$site_title = get_bloginfo( 'name' );
	$contents   = '';
	$classname  = '';

	$defaults = array(
		'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
		'logo_class'  => 'site-logo',
		'title'       => '<a href="%1$s">%2$s</a>',
		'title_class' => 'site-title',
		'home_wrap'   => '<h1 class="%1$s">%2$s</h1>',
		'single_wrap' => '<h1 class="%1$s">%2$s</h1>',
		'condition'   => ( is_front_page() || is_home() ) && ! is_page(),
	);

	$args = wp_parse_args( $args, $defaults );

	/**
	 * Filters the arguments for `astha_site_logo()`.
	 *
	 * @param array  $args     Parsed arguments.
	 * @param array  $defaults Function's default arguments.
	 */
	$args = apply_filters( 'astha_site_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
		$classname = $args['logo_class'];
	} else {
		$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
		$classname = $args['title_class'];
	}

	$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

	$html = sprintf( $args[ $wrap ], $classname, $contents );

	/**
	 * Filters the arguments for `astha_site_logo()`.
	 *
	 * @param string $html      Compiled html based on our arguments.
	 * @param array  $args      Parsed arguments.
	 * @param string $classname Class name based on current view, home or single.
	 * @param string $contents  HTML for site title or logo.
	 */
	$html = apply_filters( 'astha_site_logo', $html, $args, $classname, $contents );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Displays the site description.
 *
 * @param boolean $echo Echo or return the html.
 *
 * @return string $html The HTML to display.
 */
function astha_site_description( $echo = true ) {
	$description = get_bloginfo( 'description' );

	if ( ! $description ) {
		return;
	}

	$wrapper = '<div class="site-description">%s</div><!-- .site-description -->';

	$html = sprintf( $wrapper, esc_html( $description ) );

	/**
	 * Filters the html for the site description.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html         The HTML to display.
	 * @param string $description  Site description via `bloginfo()`.
	 * @param string $wrapper      The format used in case you want to reuse it in a `sprintf()`.
	 */
	$html = apply_filters( 'astha_site_description', $html, $description, $wrapper );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function astha_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sidebar', 'astha' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'astha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	register_sidebar(
		array(
			'name' 			=> esc_html__('Footer Menu Widget Area','astha'),
			'id'        	=> 'footer_menu',
			'description' 	=> esc_html__('Footer Menu Area','astha'),
			'before_widget' => '<div class="col-md-3">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4>',
			'after_title' 	=> '</h4>',
		));
		register_sidebar( 
		array(
			'name' 			=> esc_html__('&copy; Copyright Widget Area','astha'),
			'id' 			=> 'copyright',
			'description' 	=> esc_html__('Add Copyright Text','astha'),
			'before_widget' => '',
			'after_widget' 	=> '',
			'before_title' 	=> '',
			'after_title' 	=> '',
		));
}
add_action( 'widgets_init', 'astha_widgets_init' );


/**
Pagination
**/

function astha_the_posts_pagination() {
	the_posts_pagination( array(
		'mid_size' => 2,
		'prev_text' => __( 'Previous', 'astha' ),
		'next_text' => __( 'Next', 'astha' ),
	) );
}
/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function astha_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
<script>
/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window
    .addEventListener("hashchange", function() {
        var t, e = location.hash.substring(1);
        /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i
            .test(t.tagName) || (t.tabIndex = -1), t.focus())
    }, !1);
</script>
<?php
}
add_action( 'wp_print_footer_scripts', 'astha_skip_link_focus_fix' );

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function astha_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . __( 'Skip to the content', 'astha' ) . '</a>';
}

add_action( 'wp_body_open', 'astha_skip_link', 5 );

/**
 * Include Kirki 
 */
function astha_kirki_configuration() {
    return array( 'url_path'     => get_stylesheet_directory_uri() . '/inc/kirki/' );
}
add_filter( 'kirki/config', 'astha_kirki_configuration' );

