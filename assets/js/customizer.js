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


})(jQuery);
