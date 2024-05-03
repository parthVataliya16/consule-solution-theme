jQuery(document).ready(function () {
  var headerwrap = jQuery(".header-wrap");
  jQuery(window).on("load scroll ready", function () {
    if (jQuery(this).scrollTop() > 0) {
      headerwrap.addClass("sticky");
    } else {
      headerwrap.removeClass("sticky");
    }
  });

  jQuery(".menu").on("click", function () {
    jQuery(".header-wrap .links").toggleClass("open");
    jQuery("body").toggleClass("pause");
    jQuery(this).toggleClass("open");
  });

  // jQuery(".links li a").on("click", function () {
  //   jQuery(".header-wrap .links").removeClass("open");
  //   jQuery("body").removeClass("pause");
  //   jQuery(".menu").removeClass("open");
  // });

  var headerheight = headerwrap.height();
  // Scroll Offset
  jQuery(".offset-top").on("click", function (e) {
    e.preventDefault();
    var target = jQuery(this).attr("href");
    jQuery("html, body")
      .stop()
      .animate(
        {
          scrollTop: jQuery(target).offset().top - 75,
        },
        2000,
        "swing",
        function () {}
      );
  });

  // SVG Create
  jQuery(function () {
    jQuery("img.svg").each(function () {
      var $img = jQuery(this);
      var imgID = $img.attr("id");
      var imgClass = $img.attr("class");
      var imgURL = $img.attr("src");
      jQuery.get(
        imgURL,
        function (data) {
          var $svg = jQuery(data).find("svg");
          if (typeof imgID !== "undefined") {
            $svg = $svg.attr("id", imgID);
          }
          if (typeof imgClass !== "undefined") {
            $svg = $svg.attr("class", imgClass + " replaced-svg");
          }
          $svg = $svg.removeAttr("xmlns:a");
          if (
            !$svg.attr("viewBox") &&
            $svg.attr("height") &&
            $svg.attr("width")
          ) {
            $svg.attr(
              "viewBox",
              "0 0 " + $svg.attr("height") + " " + $svg.attr("width")
            );
          }
          $img.replaceWith($svg);
        },
        "xml"
      );
    });
  });

  //Submenu
  jQuery(
    "<span class='nav-link-toggle'><svg xmlns='http://www.w3.org/2000/svg' width='10.498' height='6' viewBox='0 0 10.498 6'><g id='arrow-down-short' transform='translate(-10.123 -15.872)'><path id='Path_1' data-name='Path 1' d='M10.344,17.093a.75.75,0,0,1,1.062,0l3.967,3.969,3.968-3.969A.751.751,0,0,1,20.4,18.154l-4.5,4.5a.75.75,0,0,1-1.062,0l-4.5-4.5a.75.75,0,0,1,0-1.062Z' transform='translate(0 -1)' fill='#0f1331' fill-rule='evenodd'/></g></svg></span>"
  ).insertBefore(jQuery(".dropdown .dropdown-inner")),
    jQuery(".nav-link-toggle").on("click", function () {
      jQuery(this).toggleClass("open");
      jQuery(this).parents("li").find(".dropdown-inner").slideToggle();
      jQuery(this)
        .parents("li")
        .siblings("li")
        .find(".dropdown-inner")
        .slideUp();
      jQuery(this)
        .parents("li")
        .siblings("li")
        .find(".nav-link-toggle")
        .removeClass("open");
    });

  //Sliders

  const industry_slider = new Swiper(".industry-slider", {
    speed: 1000,
    spaceBetween: 30,
    slidesPerView: "auto",
    navigation: {
      nextEl: ".industry-next",
      prevEl: ".industry-prev",
    },
  });

  const clients_slider = new Swiper(".clients-slider", {
    speed: 9000,
    spaceBetween: 20,
    slidesPerView: "auto",
    loop: true,
    simulateTouch: false,
    autoplay: {
      delay: 0.1,
      disableOnInteraction: false,
    },
  });

  const clients_slider_rev = new Swiper(".slider-rev", {
    speed: 9000,
    spaceBetween: 20,
    slidesPerView: "auto",
    loop: true,
    simulateTouch: false,
    autoplay: {
      delay: 0.1,
      disableOnInteraction: false,
    },
  });

  const testimonial_slider = new Swiper(".testimonial-slider", {
    speed: 1000,
    spaceBetween: 30,
    slidesPerView: "auto",
    navigation: {
      nextEl: ".testimonial-next",
      prevEl: ".testimonial-prev",
    },
  });

  const accreditation = new Swiper(".accreditation-slider", {
    speed: 9000,
    spaceBetween: 20,
    slidesPerView: "auto",
    loop: true,
    simulateTouch: false,
    autoplay: {
      delay: 0.1,
      disableOnInteraction: false,
    },
  });
});
