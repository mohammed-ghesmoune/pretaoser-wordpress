<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class CarouselMetaBox implements MetaBoxInterface
{
    const NONCE_ACTION = 'carousel_action';

    /* register actions/hooks */
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'register'));
        add_action('save_post', array($this, 'save'));
    }

    /* register metabox */
    public function register($post_type)
    {
        if ($post_type === (new CarouselRegister)->getSlug()) {
            add_meta_box(
                'carousel_images',
                __('Carousel Images', 'pao'),
                array($this, 'render'),
                $post_type
            );
        }
    }

    /* save metabox inputs to database */
    public function save($post_id)
    {
        // Check the user's permissions.
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        // Check if our nonce is set.
        if (!isset($_POST['carousel_nonce'])) {
            return $post_id;
        }

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($_POST['carousel_nonce'], Self::NONCE_ACTION)) {
            return $post_id;
        }

        // validate user inputs.
        $data=[];
        foreach ($_POST['carousel'] as $key => $image) {
            if (file_is_valid_image($image['url']) === false) {
                continue;
            }
            $data[$key]['url'] =  $image['url'];
            $data[$key]['link'] = filter_var($image['link'], FILTER_VALIDATE_URL) ? $image['link'] : '#';
        }

        // Update the meta field.
        update_post_meta($post_id, '_carousel', $data);
    }

    /* returns matabox layout */
    public function render($post)
    {

        // Add an nonce field to check for it when we save .
        wp_nonce_field(Self::NONCE_ACTION, 'carousel_nonce');

        //retrieve an existing value from the database.
        $carousel = get_post_meta($post->ID, '_carousel', true) ?: [];

        $count = count($carousel);

        // Display the form, using the current value.
?>

        <div class="metabox-content">
            <div class="container-fluid">
                <div class="row bg-light border my-2">
                    <div class="col-2 py-2 ">
                        <div class="font-weight-bold"><?php _e('Your Selection', 'pao') ?></div>
                    </div>
                    <div class=" carousel-img-container col-10 d-flex align-items-center">
                        <?php foreach ($carousel as $key => $image) : ?>
                            <div class=" m-2 position-relative">
                                <img class="img-thumbnail" src="<?php echo esc_url($image['url']) ?>" alt="" style="width:150px; height:150px ;" />
                                <a href="#" class=" delete-carousel-img position-absolute btn btn-danger btn-sm " title="<?php _e('Remove', 'pao') ?>" style="top:2px;right:2px;"> &times;</a>
                                <input type="hidden" name="carousel[<?= $key ?>][url]" value="<?= esc_url($image['url']) ?>" />
                                <input type="hidden" name="carousel[<?= $key ?>][link]" value="<?= esc_url($image['link']) ?>" />
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="row bg-light border my-2">
                    <div class="col-2 py-2 ">
                        <div class="font-weight-bold"><?php _e('Image', 'pao') ?></div>
                        <p><?php _e('Upload carousel image', 'pao') ?></p>
                    </div>
                    <div class="col-10 d-flex flex-column justify-content-center ">

                        <div class="custom-img-container ">
                            <!-- uploaded image goes here -->
                        </div>
                        <input type="hidden" class="form-control custom-img-url" value="" placeholder="" />
                        <input type="url" class="form-control custom-img-link d-none" value="" placeholder="<?php _e('Enter link for this image', '') ?>" />
                        <p class="pt-2">
                            <a class="upload-custom-img btn btn-info " href="#">
                                <?php _e('Upload', 'pao') ?>
                            </a>
                            <a class="register-custom-img btn btn-info d-none" href="#">
                                <?php _e('Add', 'pao') ?>
                            </a>
                            <a class="delete-custom-img btn btn-info d-none" href="#">
                                <?php _e('Remove', 'pao') ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
