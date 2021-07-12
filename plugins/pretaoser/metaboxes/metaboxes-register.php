<?php

if (!defined('ABSPATH')) {
    exit; 
}

class MetaBoxesRegister {
    /**
     * @var private instance of the class
     */
    private static $instance;
    

   
    /**
     * Returns current instance of class
     * @return MetaBoxesRegister
     */
    public static function getInstance() {
        if(self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    /**
     * adds metaboxes for our custom post types
     */
    public function register() {

       new TestimonialMetaBox ;
       new PrestationMetaBox ;
       new CarouselMetaBox ;

    }
}

MetaBoxesRegister::getInstance()->register();




