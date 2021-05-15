/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
  // Site title and description.
  wp.customize("blogname", function (value) {
    value.bind(function (to) {
      $(".site-title a").text(to);
    });
  });

  wp.customize("blogdescription", function (value) {
    value.bind(function (to) {
      $(".site-description").text(to);
    });
  });
  wp.customize("astha_footer_color", function (value) {
    value.bind(function (to) {
      $(".footer").css("background-color", to);
    });
  });
  wp.customize("astha_header_color", function (value) {
    value.bind(function (to) {
      $(".nav-header ").css("background-color", to);
    });
  });
  //Slider Bg
  wp.customize("astha_slide_color", function (value) {
    value.bind(function (to) {
      $(".slick-nav, .blog-slider figure:hover .slide-wrapper .slide-text").css("background", to);
    });
  });

  // Header text color.
  wp.customize("header_textcolor", function (value) {
    value.bind(function (to) {
      if ("blank" === to) {
        $(".site-title, .site-description").css({
          clip: "rect(1px, 1px, 1px, 1px)",
          position: "absolute",
        });
      } else {
        $(".site-title, .site-description").css({
          clip: "auto",
          position: "relative",
        });
        $(".site-title a, .site-description").css({
          color: to,
        });
      }
    });
  });
  
wp.customize( 'social_color', function( value ) {
	// When the value changes.
	value.bind( function( newval ) {
		// Add CSS to elements.
		$( '.social-network .fa' ).css( 'color', newval );
	} );
} );

wp.customize( 'social_font_size', function( value ) {
	// When the value changes.
	value.bind( function( newval ) {
		// Add CSS to elements.
		$( '.social-network .fa' ).css( 'font-size', newval );
	} );
} );



wp.customize( 'astha_color_palate', function( value ) {
	// When the value changes.
	value.bind( function( newval ) {
		// Add CSS to elements.
		$( 'body, html' ).css( 'background-color', newval );
	} );
} );
wp.customize( 'astha_text_palate', function( value ) {
	// When the value changes.
	value.bind( function( newval ) {
		// Add CSS to elements.
		$( 'body, h1.entry-title, .entry-title a, .comment-reply-title, .comments-title, .blog-sidebar' ).css( 'color', newval );
	} );
} );




})(jQuery);
