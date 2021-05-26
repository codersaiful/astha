/**
 * Maintenance woocommerce and woocommerce related javascript 
 * all, and all code has written jQuery based
 * provided by Astha
 * 
 * @param {type} $
 * @returns {undefined}
 */
(function($) {
    'use strict';
    $(document).ready(function() {
        ////console.log("jQuery Custom For WooCommerce");
        
        
        /**
         * Astha Localize Data 
         * User also able to change
         * using filter Hook: medilac_localize_data
         * Shold be an Array
         * Sourch: $MEDILAC_DATA = apply_filters( 'medilac_localize_data', $MEDILAC_DATA );
         */
        
        /**
         * Information for adminbar
         * Adminbar
         */
        var adminbar = $('#wpadminbar');
        var adminbarHeight = adminbar.height();

        var animation_name = MEDILAC_DATA.cart_animation;
        var cartWithContent = MEDILAC_DATA.cart_with_content;
        
        var headerMiniCart = $('.main-header-mini-cart-wrapper');
        var topbarMiniCart = $('.topbar-mini-cart-wrapper');
        
        function animateIcon(){
            if( cartWithContent ){
                headerMiniCart.addClass(animation_name);
            }else{
                headerMiniCart.find('.cart-contents .count').addClass(animation_name);
            }
            
        }
        function removeAnimateIcon(){
            if( cartWithContent ){
                headerMiniCart.removeClass(animation_name);
            }else{
                headerMiniCart.find('.cart-contents .count').removeClass(animation_name);
            }
            
            
        }
        //Start Coding Here
        
        
        $('body').click(function(){
            removeAnimateIcon();
        });

        
        $('body div.widget_shopping_cart_content').mouseleave(function(){
            removeAnimateIcon();
        });

        
        $(document).on('added_to_cart',function(e, data){

            if( cartWithContent ){
                headerMiniCart.addClass('show-now');
            }
            animateIcon();

        });
        
        
        
        
        /**
         * ajax_request_not_sent.adding_to_cart
         * adding_to_cart
         * wc_fragments_loaded
         */
        
        
        
        /**
         * WooComemrce Minicart handle
         * Using Body Height
         * and anything elese, If need
         * 
         * //JSON.stringify(current)
         */
        var body = $('body');
        var bodyHeight = body.height();
        var screenHeight = screen.availHeight;
        
        var header = $('body .site-header');
        var headerHeight = header.height();
        
        //widget_shopping_cart h2.widgettitle
        var cartWidHeader = $('body .site-header .widget_shopping_cart h2.widgettitle');
        var cartWidHeaderHeight = cartWidHeader.height();
        if(typeof cartWidHeaderHeight === 'undefined'){
            cartWidHeaderHeight = 0;
        }
        console.log(screenHeight,typeof cartWidHeaderHeight,headerHeight);
        var cartHeigh = screenHeight - cartWidHeaderHeight - headerHeight - 66;
        cartHeigh = cartHeigh - 320;


if(typeof headerHeight !== 'undefined'){
    var cssRules = '.site-header-cart .product_list_widget{max-height: '+ cartHeigh +'px}';

    //Append new nodes
    $('<style>' + cssRules + '</style>').appendTo('head');
}

    });
})(jQuery);