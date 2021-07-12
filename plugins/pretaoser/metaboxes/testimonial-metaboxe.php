<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class TestimonialMetaBox implements MetaBoxInterface
{


    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'register'));
        add_action('save_post', array($this, 'save'));
    }


    // register meta box 
    public function register($post_type)
    {
        if ($post_type === (new TestimonialRegister)->getSlug()) {
            add_meta_box(
                'testimonial_details',
                __('Testimonial Details', 'pao'),
                array($this, 'render'),
                $post_type
            );
        }
    }

    // save meta box data in database
    public function save($post_id)
    {
        // Check if our nonce is set.
        if (!isset($_POST['testimonial_nonce'])) {
            return $post_id;
        }

        $nonce = $_POST['testimonial_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'testimonial_nonce')) {
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

        // Sanitize user inputs.
        $data['title'] = sanitize_text_field($_POST['testimonial']['title']);
        $data['author'] = sanitize_text_field($_POST['testimonial']['author']);
        $data['text'] = sanitize_textarea_field($_POST['testimonial']['text']);

        // Update the meta field.
        update_post_meta($post_id, '_testimonial', $data);
        
    }

    public function render($post)
    {
        // Add an nonce field to check for it when we save .
        wp_nonce_field('testimonial_nonce', 'testimonial_nonce');

        //retrieve existing value from the database.
        $testimonial = get_post_meta($post->ID, '_testimonial', true);
        $title = $testimonial['title'] ?? '';
        $author = $testimonial['author'] ?? '';
        $text = $testimonial['text'] ?? '';

        // Display the form, using the current values.
?>

        <div class="metabox-content">
            <div class="container-fluid">
                <div class="row bg-light border my-2 ">
                    <div class="col-2 py-2 ">
                        <div class="font-weight-bold"><?php _e('Title', 'pao') ?></div>
                        <p><?php _e('Enter testimonial title', 'pao') ?></p>
                    </div>
                    <div class="col-10 d-flex align-items-center">
                        <input type="text" class="form-control" name="testimonial[title]" value="<?php echo  esc_attr($title); ?>" placeholder="" />
                    </div>
                </div>
                <div class="row bg-light border my-2 ">
                    <div class="col-2 py-2 ">
                        <div class="font-weight-bold"><?php _e('Author', 'pao') ?></div>
                        <p><?php _e('Enter author name', 'pao') ?></p>
                    </div>
                    <div class="col-10 d-flex align-items-center">
                        <input type="text" class="form-control" name="testimonial[author]" value="<?php echo esc_attr($author); ?>" placeholder="" />
                    </div>
                </div>
                <div class="row bg-light border my-2">
                    <div class="col-2 py-2 bg-light">
                        <div class="font-weight-bold"><?php _e('Text', 'pao') ?></div>
                        <p><?php _e('Enter testimonial text', 'pao') ?></p>
                    </div>
                    <div class="col-10 d-flex align-items-center py-2">
                        <textarea class="form-control" name="testimonial[text]" rows="5"><?php echo esc_textarea($text); ?></textarea>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
