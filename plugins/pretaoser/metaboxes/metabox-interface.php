<?php

/**
 * interface MetaBoxInterface
 */
interface MetaBoxInterface {
    
  
    /**
     * Registers metabox with WordPress
     *
     * @param [string] $post_type
     * @return void
     */
    public function register($post_type);

  
    /**
     * save metabox inputs to db with WordPress
     *
     * @param [string] $post_id
     * @return void
     */
    public function save($post_id);
   
    /**
     * returns matabox layout
     *
     * @param [object] $post
     * @return string
     */
    public function render($post);
}