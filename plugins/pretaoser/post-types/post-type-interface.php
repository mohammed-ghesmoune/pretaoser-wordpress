<?php

/**
 * interface PostTypeInterface
 */
interface PostTypeInterface {
    /**
     * returns post type slug 
     * @return string
     */
    public function getSlug();

    /**
     * Registers custom post type with WordPress
     */
    public function register();
}