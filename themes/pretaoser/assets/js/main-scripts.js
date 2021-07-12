// back to top script
(function($) {

    $(window).scroll(function() {
        var headerNavHeight = $('#site-header').outerHeight();
        var scrollTop = $(window).scrollTop();
        if (scrollTop > headerNavHeight) {
            $("#back-to-top").css("bottom", "17px");
        } else {
            $("#back-to-top").css("bottom", "-50px");

        }
    });

    $("#back-to-top").click(function(){
      $('html, body').animate({scrollTop: "0px"}, 1500);
    })
})(jQuery);

// logo carousel script
(function($) {
$(document).ready(function() {
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
})(jQuery);

