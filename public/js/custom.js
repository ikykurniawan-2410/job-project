(function ($) {

  "use strict";

  // Hide navbar on mobile after clicking a link
  $('.navbar-collapse a').on('click', function () {
    $(".navbar-collapse").collapse('hide');
  });

  // Smooth scroll for internal anchor links
  $('.custom-btn, .nav-link[href^="#"], a[href^="#"]').on('click', function (e) {
    var target = $(this).attr('href');
    if (target.length > 1 && $(target).length) {
      e.preventDefault();
      var offset = $(target).offset().top;
      var headerHeight = $('.navbar').outerHeight() || 0;
      $('html, body').animate({
        scrollTop: offset - headerHeight
      }, 500);
    }
  });

})(jQuery);

// 
