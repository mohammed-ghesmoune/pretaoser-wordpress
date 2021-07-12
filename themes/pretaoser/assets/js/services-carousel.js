(function ($) {
    $(document).ready(function () {

        var i = 0;
        var count = jQuery('.service_slide_name .item').length;
        var j = count - 1;

        function serviceSliderFunction(i) {

            /* jQuery('.item[data-index="' + i + '"]').addClass('current-slide');*/
            jQuery('.service-img-section .item[data-index="' + i + '"]').addClass('current-slide');
            jQuery('.service_slide_name .item[data-index="' + i + '"]').addClass('current-slide');
            jQuery('.service_slide_content .item[data-index="' + i + '"]').addClass('current-slide');

            var serviceSliderInterval = setInterval(function () {
                /* jQuery('.item').removeClass('current-slide');
                 jQuery('.item[data-index="' + i + '"]').addClass('current-slide');*/
                jQuery('.service-img-section .item[data-index="' + j + '"]').removeClass('current-slide');
                jQuery('.service-img-section .item[data-index="' + i + '"]').addClass('current-slide');
                jQuery('.service_slide_name .item[data-index="' + j + '"]').removeClass('current-slide');
                jQuery('.service_slide_name .item[data-index="' + i + '"]').addClass('current-slide');
                jQuery('.service_slide_content .item[data-index="' + j + '"]').removeClass('current-slide');
                jQuery('.service_slide_content .item[data-index="' + i + '"]').addClass('current-slide');

                i++;
                j = i - 1;
                if (i == count) {
                    i = 0;
                    j = count - 1;
                }
            }, 4000);

            jQuery('.service_slide_name .item').click(function () {
                var index = jQuery(this).data('index');
                clearInterval(serviceSliderInterval);
                jQuery('.item').removeClass('current-slide');
                serviceSliderFunction(index);
            });
        }
        serviceSliderFunction(i);


    });
})(jQuery);

(function ($) {
    $(document).ready(function () {

        var i = 0;
        var count = jQuery('.forfait_slide_name .item').length;
        var j = count - 1;

        function forfaitSliderFunction(i) {

            /* jQuery('.item[data-index="' + i + '"]').addClass('current-slide');*/
            jQuery('.forfait-img-section .item[data-index="' + i + '"]').addClass('current-slide');
            jQuery('.forfait_slide_name .item[data-index="' + i + '"]').addClass('current-slide');
            jQuery('.forfait_slide_content .item[data-index="' + i + '"]').addClass('current-slide');

            var forfaitSliderInterval = setInterval(function () {
                /*jQuery('.item').removeClass('current-slide');
                jQuery('.item[data-index="' + i + '"]').addClass('current-slide');*/
                jQuery('.forfait-img-section .item[data-index="' + j + '"]').removeClass('current-slide');
                jQuery('.forfait-img-section .item[data-index="' + i + '"]').addClass('current-slide');
                jQuery('.forfait_slide_name .item[data-index="' + j + '"]').removeClass('current-slide');
                jQuery('.forfait_slide_name .item[data-index="' + i + '"]').addClass('current-slide');
                jQuery('.forfait_slide_content .item[data-index="' + j + '"]').removeClass('current-slide');
                jQuery('.forfait_slide_content .item[data-index="' + i + '"]').addClass('current-slide');



                i++;
                j = i - 1;
                if (i == count) {
                    i = 0;
                    j = count - 1;
                }
            }, 4000);

            jQuery('.forfait_slide_name .item').click(function () {
                var index = jQuery(this).data('index');
                clearInterval(forfaitSliderInterval);
                jQuery('.item').removeClass('current-slide');
                forfaitSliderFunction(index);
            });
        }
        forfaitSliderFunction(i);


    });
})(jQuery);