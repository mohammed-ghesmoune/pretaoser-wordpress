<?php

/**
 * Class CarouselMetaBoxTest
 *
 * @package Pretaoser
 */

class CarouselMetaBoxTest extends WP_UnitTestCase
{
    /*
    * Tests function that register hooks
    */
    public function test_construct()
    {
        $carousel = new CarouselMetaBox();
        // Verfify the plugin was loaded and actions/hooks are registered.
        $this->assertEquals(10, has_action('add_meta_boxes', array($carousel, 'register')), 'add_meta_boxes not registered');
        $this->assertEquals(10, has_action('save_post', array($carousel, 'save')), 'save_post not registered');
    }

    /*
    * Tests function that register metabox
    */
    public function test_register()
    {
        global $wp_meta_boxes;

        // Call the methode that our plugin uses to register meta boxes for 'carousel' post type.
        (new CarouselMetaBox)->register((new CarouselRegister)->getSlug());

        // Verify the box was registered
        $this->assertNotEmpty($wp_meta_boxes['carousel']['advanced']['default']['carousel_images'], 'box not registred');
    }

    /*
    * Tests function that return metabox layout
    */
    public function test_render()
    {
        // Create a 'carousel' post type.
        $post = $this->factory->post->create_and_get([
            'post_type' => 'carousel',
            'post_status' => 'publish',
            'post_title' => 'test_carousel_meta_box',
        ]);

        // Verify the carousel was created,
        $this->assertInstanceOf(WP_Post::class, $post);

        // Now render the registered meta boxes.
        ob_start();
        (new CarouselMetaBox())->render($post);
        $html = ob_get_clean();

        //Create a nonce with the same action string ( in our case 'carousel_action')
        $nonce = wp_create_nonce(CarouselMetaBox::NONCE_ACTION);

        // Verify we have a nonce.
        $this->assertContains('value="' . $nonce . '"', $html, 'nonce does not exist');

        // Verify we have our metabox inputs.
        $this->assertContains('input', $html, 'inputs don\'t exist');
    }

    /**
     * tests function that save metabox inputs to db
     */
    function test_save()
    {
        // create a user
        $user1 = $this->factory->user->create_and_get([
            'user_login' => 'moi',
            'role' => 'administrator'
        ]);

        // Make sure user was created in this testing environment
        // $this->assertTrue(0 !== $user1->ID, 'user not created');

        // Create a test post and set the author as $user
        $carousel1 = $this->factory->post->create_and_get(array(
            'post_type' => 'carousel',
            'post_status' => 'publish',
            'post_title' => 'test_carousel_meta_box',
        ));

        // Make sure it was created in this testing environment
        // $this->assertTrue(0 !== $carousel1->ID, 'carousel not created');

        // Set the current user to $user1
        wp_set_current_user($user1->ID);

        // make sure current user can edit carousel.
        // $this->assertTrue(current_user_can('edit_post', $carousel1->ID), 'user with role(s) " ' . join(',', $user1->roles) . ' " can not edit carousel ');

        // create a nonce with the same action our form uses.
        $nonce = wp_create_nonce('carousel_action');
        // make sure the created nonce use the same action as our form.
        // $this->assertSame($nonce, wp_create_nonce(CarouselMetaBox::NONCE_ACTION), 'Nonce not valid');

        // set $_POST array with nonce , image URL and image Link
        $image_url = 'http://localhost/pret-a-oser/wp-content/uploads/2020/11/image3.jpg';
        $image_link = 'https://www.moselle.cci.fr/';
        $_POST['carousel_nonce'] = $nonce;
        $_POST['carousel'][0]['url'] = $image_url;
        $_POST['carousel'][0]['link'] = $image_link;

        //Now we can run our save method
        (new CarouselMetaBox)->save($carousel1->ID);

        // get our carousel meta box from database
        $carousel_meta_box = get_post_meta($carousel1->ID, '_carousel', true);
        $carousel_image_url = $carousel_meta_box[0]['url'] ?? '';
        $carousel_image_link = $carousel_meta_box[0]['link'] ?? '';

        // Here we test to see if our inputs are added
        $this->assertTrue($image_url === $carousel_image_url, 'image url not registred');
        $this->assertTrue($image_link === $carousel_image_link, 'image link not registred');

        return '<pre>' . print_r($carousel_meta_box);
    }
}


// convertErrorsToExceptions="true" 
// convertNoticesToExceptions="true"
// convertWarningsToExceptions="true"