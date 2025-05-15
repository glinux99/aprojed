"use strict";

function latestProjectCarousel() {
  if ($(".latest-project-carousel").length) {
    $(".latest-project-carousel").owlCarousel({
      dots: false,
      loop: true,
      margin: 10,
      nav: true,
      navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>'
      ],
      autoplayHoverPause: false,
      autoplay: 6000,
      smartSpeed: 1000,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        800: {
          items: 1
        },
        1024: {
          items: 1
        },
        1100: {
          items: 1
        },
        1200: {
          items: 1
        }
      }
    });
  }
}

if ($(".wow").length) {
  var wow = new WOW({
    boxClass: "wow",
    animateClass: "animated",
    offset: 0,
    mobile: false,
    live: true
  });
  wow.init();
}
if ($("#contact-form").length) {
  $("#contact-form").validate({
    submitHandler: function(form) {
      var form_btn = $(form).find('button[type="submit"]');
      var form_result_div = "#form-result";
      $(form_result_div).remove();
      form_btn.before(
        '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
      );
      var form_btn_old_msg = form_btn.html();
      form_btn.html(form_btn.prop("disabled", true).data("loading-text"));
      $(form).ajaxSubmit({
        dataType: "json",
        success: function(data) {
          if ((data.status = "true")) {
            $(form)
              .find(".form-control")
              .val("");
          }
          form_btn.prop("disabled", false).html(form_btn_old_msg);
          $(form_result_div)
            .html(data.message)
            .fadeIn("slow");
          setTimeout(function() {
            $(form_result_div).fadeOut("slow");
          }, 6000);
        }
      });
    }
  });
}

jQuery(document).on("ready", function() {
  (function($) {
    latestProjectCarousel();
  })(jQuery);
});
