(function( $ ) {
    wp.customize.bind( 'ready', function() {
        var customize = this;
        // Codes here
        console.log(customize);
    } );
})( jQuery );

jQuery(document).ready(function ($) {

    // Append the search icon list item to the main nav
    wp.customize('search_menu_icon', function (control) {
        control.bind(function (controlValue) {
            if (controlValue == true) {
                // If the switch is on, add the search icon
                $('.nav-menu').append('<li class="menu-item menu-item-search"><a href="#" class="nav-search"><i class="fa fa-search"></i></a></li>');
            } else {
                // If the switch is off, remove the search icon
                $('li.menu-item-search').remove();
            }
        });
    });

    // Change the font-size of the h1
    wp.customize('sample_slider_control', function (control) {
        control.bind(function (controlValue) {
            $('h1').css('font-size', controlValue + 'px');
        });
    });

    //WooCommerce Page Reloade when going WooCommerce Option from Customizer
    wp.customize('layout_sec_wc', function (control) {
        //console.log("layout sec HEEEEEEEEEEEE");
        //console.log(control);
//            control.bind(function( controlValue ) {
//                    $('h1').css('font-size', controlValue + 'px');
//            });
    });
    wp.customize('layout_shop_wc', function (control) {
        //console.log("HEEEEEEEEEEEE");
        //console.log(control);
        control.bind(function (controlValue) {

        });
    });

    wp.customize('woocommerce', function (control) {
        //console.log("WOOCOMMERCE");
        //console.log(control);

    });
//    //console.log('---------------wp.customize-----------------');
//    //console.log(wp.customize);
//    wp.customize(false,function(fff){
//        //console.log("FFFFFFFFFFFFFFFFFFFFFFFF");
//        //console.log(fff);
//    });


    wp.customize('color_root[--astha-primary]', function (control) {
        //console.log("HEEEEEEEEEEEE");
        console.log(control);
        control.bind(function (controlValue) {
            console.log(controlValue);
        });
    });

});

(function (api) {
    ////console.log(api);

}(wp.customize));