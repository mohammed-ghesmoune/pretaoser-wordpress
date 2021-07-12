(function($) {
    $(document).ready(function() {
        $('.widget-social-icons .social-icon').click(function(event) {
            event.stopImmediatePropagation();
            var widget_id = $(this).parent().parent().attr('id');
            var widget_number = $(this).parent().parent().data('widget-number');
            var css_class = $(this).children().data('class');
            var n = $("#" + widget_id + " .sm-input-wrapper ").length;

            var inputs = $('<div style="display:flex; padding:3px 0px;" class="sm-input-wrapper">' +
                '<div class="widget-social-icons">' +
                '<a class="social-icon" href="#"><i class="' + css_class + '"></i></a>' +
                '</div>' +
                '<input class="widefat"  name="widget-social-media[' + widget_number + '][social_media][' + n + '][class]" type="hidden" value="' + css_class + '">' +
                '<input class="widefat"  name="widget-social-media[' + widget_number + '][social_media][' + n + '][href]" type="text" value="">' +
                '<div class="widget-social-icons">' +
                '<div class="delete"><i class="fas fa-times"></i></div>' +
                '</div></div>');


            $("#" + widget_id + " #widget-social-icons").after(inputs);
            $(this).closest('form').find('input[type="submit"]').click();

        });

        $('div.delete').click(function(event) {
            event.stopImmediatePropagation();
            var form = $(this).closest('form').find('input[type="submit"]').click();
            $(this).parent().parent().remove();
            form.click();

        });

    });
})(jQuery);