<?php

if (!class_exists('WidgetSocialMedia')) {

    /**
     * Class WidgetSocialMedia
     */

    class WidgetSocialMedia extends WP_Widget
    {

        function __construct()
        {

            parent::__construct(
                'social-media',  // Base ID
                'Social Media'   // Name
            );

            add_action('widgets_init', function () {
                register_widget('WidgetSocialMedia');
            });
        }

        public $args = array(
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
            'before_widget' => '<div class="widget-wrap social-icons">',
            'after_widget'  => '</div></div>'
        );

        public function widget($args, $instance)
        {

            echo $args['before_widget'];
            foreach ($instance['social_media'] as $key => $value) {

                $href = !empty($value['href']) ? esc_url($value['href']) : '#';
                $class = !empty($value['class']) ? esc_attr($value['class']) : '';

                echo '<a class="social-icon" href="' . $href . '" target="_blank"><i class="' . $class . '"></i></a>';
            }
            echo $args['after_widget'];
        }

        public function form($instance)
        {
?>
            <div id="widget-sm-<?= $this->number ?>" data-widget-number="<?= $this->number ?>">
                <div class="widget-social-icons" id="widget-social-icons" style="padding:10px 0px 20px 0px;">
                    <div class="social-icon"><i class="fab fa-facebook-f" data-class="fab fa-facebook-f"></i></div>
                    <div class="social-icon"><i class="fab fa-instagram" data-class="fab fa-instagram"></i></div>
                    <div class="social-icon"><i class="fab fa-twitter" data-class="fab fa-twitter"></i></div>
                </div>

                <?php

                foreach (($instance['social_media'] ?: []) as $k => $v) {
                ?>
                    <div style="display:flex; padding:3px 0px;" class="sm-input-wrapper">
                        <div class="widget-social-icons">
                            <div class="social-icon"><i class="<?php echo esc_attr($v['class']) ?>"></i></div>
                        </div>
                        <input class="widefat" name="<?php echo esc_attr($this->get_field_name('social_media[' . $k . '][class]')); ?>" type="hidden" value="<?php echo esc_attr($v['class']) ?: ''; ?>">
                        <input class="widefat" name="<?php echo esc_attr($this->get_field_name('social_media[' . $k . '][href]')); ?>" type="text" value="<?php echo esc_attr($v['href']) ?: ''; ?>" placeholder="Enter link url">
                        <div class="widget-social-icons">
                            <div class="delete"><i class="fas fa-times"></i></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <script type="text/javascript">
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
                                '<input class="widefat"  name="widget-social-media[' + widget_number + '][social_media][' + n + '][href]" type="text" value="" placeholder="Enter link url" >' +
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
            </script>

<?php

        }

        public function update($new_instance, $old_instance)
        {

            $instance = array();

            $instance['social_media'] = (!empty($new_instance['social_media'])) ? $new_instance['social_media'] : '';

            return $instance;
        }
    }
}
new WidgetSocialMedia();
?>