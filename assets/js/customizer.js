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
        
        /***** --medilac-primary ************/
        wp.customize('color_root[--medilac-primary]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-primary: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });

        /***** --medilac-secondary ************/
        wp.customize('color_root[--medilac-secondary]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-secondary: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        /***** --medilac-deep-dark ************/
        wp.customize('color_root[--medilac-deep-dark]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-deep-dark: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });

        /***** --medilac-light-dark ************/
        wp.customize('color_root[--medilac-light-dark]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-light-dark: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });


        /***** --medilac-primary-deep ************/
        wp.customize('color_root[--medilac-primary-deep]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-primary-deep: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });

        /***** --medilac-secondary ************/
        wp.customize('color_root[--medilac-primary-light]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-primary-light: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        

        /***** --medilac-secondary-deep ************/
        wp.customize('color_root[--medilac-secondary-deep]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-secondary-deep: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        

        /***** --medilac-secondary-light ************/
        wp.customize('color_root[--medilac-secondary-light]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-secondary-light: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        

        /***** --medilac-danger ************/
        wp.customize('color_root[--medilac-danger]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-danger: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        
        

        /***** --medilac-danger ************/
        wp.customize('color_root[--medilac-foreground]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-foreground: '+ to +';}';
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
        
        
        /***** ----medilac-topbar-bgcolor ************/
        wp.customize('color_root[--medilac-topbar-bgcolor]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-topbar-bgcolor: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        
        /***** ----medilac-topbar-link-color ************/
        wp.customize('color_root[--medilac-topbar-link-color]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-topbar-link-color: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        
        /***** ----medilac-topbar-color ************/
        wp.customize('color_root[--medilac-topbar-color]',function(value){
            value.bind( function( to ) {
                var cssRules = ':root {--medilac-topbar-color: '+ to +';}';
                $('<style>' + cssRules + '</style>').appendTo('head');
            } );
        });
        
        

}( jQuery ) );


