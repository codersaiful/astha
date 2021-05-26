/**
 * Astha main js file.
 * 
 * @returns void
 */

(function($) {
    'use strict';
    $(document).ready(function() {

        /**
         * Checking Customizer Enable or not
         * 
         * @type Boolean
         */
        
        var in_customizer = false;

        // check for wp.customize return boolean
        if ( typeof wp !== 'undefined' ) {
            in_customizer =  typeof wp.customize !== 'undefined' ? true : false;
        }
        
        // Our Theme's localize Data
        console.log(MEDILAC_DATA);
        
        /**
         * Information for adminbar
         * Adminbar
         */
        var paddingTop = 0;
        var body = $('body');
        var bodyData = [];
        var bodyStick = $('body.header-sticky-on');
        
        //Window Width Details
        var windowWidth = $(window).width();
            bodyData['windowWidth'] = windowWidth;
            
        //It's allo inside header tag, so no need to count header paddingTop
        var adminbar = $('#wpadminbar');
        var adminbarHeight = adminbar.height();
        bodyData['adminheight'] = adminbarHeight;
        //paddingTop += adminbarHeight;

        
        //Stick Topbar - It's in Inside Header Tag, So no need for PaddingTop
        var searchBox = $('body .custom-search-wrapper');
        var searchBoxHeight = searchBox.height();
        bodyData['searchBoxHeight'] = searchBoxHeight;
        
        
        //Tool Panel
        var toolPanel = $('body header .tools-panel');
        var toolPanelHeight = toolPanel.height();
        bodyData['toolPanel'] = toolPanelHeight;
        
        
        //Stick Topbar - It's in Inside Header Tag, So no need for PaddingTop
        var topbar = $('body .site-header .header-top');
        var topbarHeight = topbar.height();
        bodyData['topbarHeight'] = topbarHeight;
        
        //Stick Header
        var header = $('body .site-header');
        var stickHeader = $('body.header-sticky-on .site-header');
        var headerHeight = header.height();
        bodyData['headerHeight'] = headerHeight;
        paddingTop += headerHeight;
        
        
        
        if( windowWidth > 600){
            bodyStick.css({
                paddingTop: paddingTop + 'px',
            });  
        }
        
        
        

        /**
         * WordPress default Form label to convert as PlaceHolder
         */
        $('.comments-area .comment-respond form,.woocommerce-Reviews form').find('p').each(function(){
            //input,textarea,button
            var label = $(this).find('label');
            //label.hide();
            var fieldVal = label.text();
            $(this).find('input,textarea,button').not('input[type="checkbox"],input[type="radio"]').attr('placeholder', fieldVal);
        });
        
        /**
         * Product view change on Click on product-view-btn
         * Use js Cookie Plugin for this part
         * for Shop Page
         */
        var cookie_name = 'shop';
        $('body').on('click','.product-view-option .product-view-btn', function(){
            var type = $(this).data('type');
            Cookies.set( cookie_name, type );
        });
    
        
        //Remove Cookie when in Customizer
        if(in_customizer){
            Cookies.remove(cookie_name);
        }
        
        /**
         * Header search toggle
         */
        $('body').on('click', '.search-control-icon i', function(){
            $('body .custom-search-wrapper').toggleClass('show');
            $(this).toggleClass('fa-search fa-times');
            
        });
        
        
        /**
         * Header search on Click Anywhere
         */
        $('body #page, body .breadcrumb-wrap, body #footer').on('click', function(){
           $('.custom-search-wrapper.show').toggleClass('show');
           if( $('body .search-control-icon i').hasClass('fa-times') ){
               $('body .search-control-icon i').removeClass('fa-times');
               $('body .search-control-icon i').addClass('fa-search');
           }
        });
        
        
        /**
         * Scroll Top and On Scroll body class Added
         */
        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
            //var finalScrolHeight = headerHeight + 20;
            if (scroll >= headerHeight) {
                $("body").addClass("header-scrolled");
            } else {
                $("body").removeClass("header-scrolled");
            }
        });
        

        $(window).on('scroll', function() {
          var finalScrolHeight = headerHeight + 300;
          if ($(this).scrollTop() > finalScrolHeight) {
              $('#scroll_up').fadeIn('slow');
          } else {
              $('#scroll_up').fadeOut('slow');
          }
        });
        $('#scroll_up').on('click', function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });
})(jQuery);