<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class PrestationMetaBox implements MetaBoxInterface
{


    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'register'));
        add_action('save_post', array($this, 'save'));
    }


    // register meta box 
    public function register($post_type)
    {
        if ($post_type === (new PrestationRegister)->getSlug()) {
            add_meta_box(
                'prestation_informations',
                __('Prestation Informations', 'pao'),
                array($this, 'render'),
                $post_type
            );
        }
    }
    
    // save meta box data in database 
    public function save($post_id)
    {
        // Check if our nonce is set.
        if (!isset($_POST['prestation_nonce'])) { // or if (array_key_exists( 'prestation_nonce', $_POST ))
            return $post_id;
        }

        $nonce = $_POST['prestation_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'prestation_nonce')) {
            return $post_id;
        }
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // Check the user's permissions.
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        // sanitize and validate user inputs.
        $data['price'] = floatval($_POST['prestation']['price']);
        $data['duration'] = sanitize_text_field($_POST['prestation']['duration']);
        $data['image'] =  file_is_valid_image($_POST['prestation']['image']) ? $_POST['prestation']['image'] : '';

        // Update the meta field.
        update_post_meta($post_id, '_prestation', $data);
        
    }

    // HTML render of the meta box 
    public function render($post)
    {
        // Add an nonce field to check for it when we save .
        wp_nonce_field('prestation_nonce', 'prestation_nonce');

        //retrieve an existing value from the database.
        $prestation = get_post_meta($post->ID, '_prestation', true);
        $price = $prestation['price'] ?? '';
        $duration = $prestation['duration'] ?? '';
        $image = $prestation['image'] ?? '';
        // Display the form, using the current value.
?>

        <div class="metabox-content">
            <div class="container-fluid">
                <div class="row bg-light border my-2">
                    <div class="col-2 py-2 ">
                        <div class="font-weight-bold"><?php _e('Price', 'pao') ?></div>
                        <p><?php _e('Enter prestation price', 'pao') ?></p>
                    </div>
                    <div class="col-10 d-flex align-items-center">
                        <input type="text" class="form-control" name="prestation[price]" value="<?php echo  esc_attr($price); ?>" placeholder="exp: 99.99" />
                    </div>
                </div>
                <div class="row bg-light border my-2 ">
                    <div class="col-2 py-2 ">
                        <div class="font-weight-bold"><?php _e('Duration', 'pao') ?></div>
                        <p><?php _e('Enter prestation duration', 'pao') ?></p>
                    </div>
                    <div class="col-10 d-flex align-items-center">
                        <input type="text" class="form-control" name="prestation[duration]" value="<?php echo esc_attr($duration); ?>" placeholder="exp: 2 heures" />
                    </div>
                </div>
                <div class="row bg-light border my-2">
                    <div class="col-2 py-2 ">
                        <div class="font-weight-bold"><?php _e('Image', 'pao') ?></div>
                        <p><?php _e('Upload image or Icon for this prestation', 'pao') ?></p>
                    </div>
                    <div class="col-10 d-flex flex-column justify-content-center ">

                        <div class="custom-img-container ">
                            <?php if ($image !== '') : ?>
                                <img class="img-thumbnail mt-2" src="<?php echo $image ?>" alt="" style="width:150px; height:150px ;" />
                            <?php endif ?>
                        </div>
                        <p class="pt-2">
                            <a class="upload-custom-img btn btn-info <?php if ($image) {
                                                                            echo 'd-none';
                                                                        } ?>" href="#">
                                <?php _e('Upload', 'pao') ?>
                            </a>
                            <a class="delete-custom-img btn btn-info <?php if (!$image) {
                                                                            echo 'd-none';
                                                                        } ?>" href="#">
                                <?php _e('Remove', 'pao') ?>
                            </a>
                        </p>
                        <input type="hidden" class="form-control custom-img" name="prestation[image]" value="<?php echo esc_url($image); ?>" placeholder="Image URL" />
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
