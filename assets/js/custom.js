/**************/
// astha custom.js
/**************/
(function ($) {
 "use strict";
  //Navigation Menu dropdown Focused

  var $openClass = "open open-position";
  var $hasChildren = "menu-item-has-children";

  if ($hasChildren.length > 0) {
    jQuery(".navbar").on("focusin", "." + $hasChildren, function () {
      jQuery(this).addClass($openClass);

    });
    jQuery(".navbar").on("focusout", "." + $hasChildren, function () {
      jQuery(this).removeClass($openClass);
    });
  }
  //scroll to top
    jQuery("#scroll_top").hide();
    jQuery("#scroll_top").on("click",function(e) {
      e.preventDefault();
      jQuery("html, body").animate({ scrollTop: 0 }, "slow");
    });

    jQuery(window).scroll(function(){
      var scrollheight =400;
      if( jQuery(window).scrollTop() > scrollheight ) {
        jQuery("#scroll_top").fadeIn();
        jQuery("#scroll-top").addClass("scroll-visible");
      }
      else {
        jQuery("#scroll_top").fadeOut();
        jQuery("#scroll_top").removeClass("scroll-visible");
      }
    });
	
    jQuery("a[href^=\\#]").click(function(event){     
        event.preventDefault();
        jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top}, 500);
    });
	
	jQuery(window).on('scroll', function (event) {
		var scrollValue = jQuery(window).scrollTop();
		if (scrollValue > 120) {
			jQuery('.nav-header').addClass('affix');
		} else{
			jQuery('.nav-header').removeClass('affix');
		}
	});
	
})(jQuery);