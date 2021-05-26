/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
            
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );
        


        /***** color_text || body color ************/
        wp.customize('color_text',function(value){
            value.bind( function( to ) {
                $('body').css('color',to);
            } );
        });
        

        //Starting root and CSS Styling based on customizer Value
        
        /***** --astha-primary ************/
        wp.customize('color_root[--astha-primary]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-primary: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });

        /***** --astha-secondary ************/
        wp.customize('color_root[--astha-secondary]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-secondary: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        /***** --astha-deep-dark ************/
        wp.customize('color_root[--astha-deep-dark]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-deep-dark: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });

        /***** --astha-light-dark ************/
        wp.customize('color_root[--astha-light-dark]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-light-dark: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });


        /***** --astha-primary-deep ************/
        wp.customize('color_root[--astha-primary-deep]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-primary-deep: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });

        /***** --astha-secondary ************/
        wp.customize('color_root[--astha-primary-light]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-primary-light: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        

        /***** --astha-secondary-deep ************/
        wp.customize('color_root[--astha-secondary-deep]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-secondary-deep: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        

        /***** --astha-secondary-light ************/
        wp.customize('color_root[--astha-secondary-light]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-secondary-light: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        

        /***** --astha-danger ************/
        wp.customize('color_root[--astha-danger]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-danger: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        
        

        /***** --astha-danger ************/
        wp.customize('color_root[--astha-foreground]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-foreground: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        
        
        
        /***** background ************/
        wp.customize('background_color',function(value){
            value.bind( function( to ) {
                $('.current-header-two .header-wrapper:after').css('border-bottom-color','#' + to);
                var cssRules = '.current-header-two .header-wrapper:after{border-bottom-color: #' + to + ';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        
        /***** ----astha-topbar-bgcolor ************/
        wp.customize('color_root[--astha-topbar-bgcolor]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-topbar-bgcolor: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        
        /***** ----astha-topbar-link-color ************/
        wp.customize('color_root[--astha-topbar-link-color]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-topbar-link-color: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        
        /***** ----astha-topbar-color ************/
        wp.customize('color_root[--astha-topbar-color]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--astha-topbar-color: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        

}( jQuery ) );


