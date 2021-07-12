<?php

if (!class_exists('CarouselRegister')) {

    /**
     * Class CarouselRegister
     */
    class CarouselRegister implements PostTypeInterface
    {
        /**
         * @var string
         */
        private $slug;


        public function __construct()
        {
            $this->slug = 'carousel';
        }

        /**
         * @return string
         */
        public function getSlug()
        {
            return $this->slug;
        }

        /**
         * Registers custom post type with WordPress
         */
        public function register()
        {
            $this->registerPostType();
        }

        /**
         * Registers custom post type with WordPress
         */
        private function registerPostType()
        {

            $menuPosition = 5;
            $menuIcon = 'dashicons-slides';
            $labels = array(
                'name'                     => _x('Carousels', 'post type general name', 'pao'),
                'singular_name'            => _x('Carousel', 'post type singular name', 'pao'),
                'add_new'                  => __('Add New', 'pao'),
                'add_new_item'             => __('Add New Carousel', 'pao'),
                'edit_item'                => __('Edit Carousel', 'pao'),
                'new_item'                 => __('New Carousel', 'pao'),
                'view_item'                => __('View Carousel', 'pao'),
                'view_items'               => __('View Carousels', 'pao'),
                'search_items'             => __('Search Carousels', 'pao'),
                'not_found'                => __('No Carousels found.', 'pao'),
                'not_found_in_trash'       => __('No Carousels found in Trash.', 'pao'),
                'parent_item_colon'        => null,
                'all_items'                => __('All Carousels', 'pao'),
                'archives'                 => __('Carousel Archives', 'pao'),
                'attributes'               => __('Carousel Attributes', 'pao'),
                'insert_into_item'         => __('Insert into carousel', 'pao'),
                'uploaded_to_this_item'    => __('Uploaded to this carousel', 'pao'),
                'featured_image'           => __('Featured image', 'pao', 'pao'),
                'set_featured_image'       => __('Set featured image', 'pao'),
                'remove_featured_image'    => __('Remove featured image', 'pao'),
                'use_featured_image'       => __('Use as featured image', 'pao'),
                'filter_items_list'        => __('Filter carousels list', 'pao'),
                'items_list_navigation'    => __('Carousels list navigation', 'pao'),
                'items_list'               => __('Carousels list', 'pao'),
                'item_published'           => __('Carousel published.', 'pao'),
                'item_published_privately' => __('Carousel published privately.', 'pao'),
                'item_reverted_to_draft'   => __('Carousel reverted to draft.', 'pao'),
                'item_scheduled'           => __('Carousel scheduled.', 'pao'),
                'item_updated'             => __('Carousel updated.', 'pao'),
            );

            register_post_type(
                $this->slug,
                array(
                    'labels'                => $labels,
                    'supports'              => array('title','revisions'),
                    'menu_position'         => $menuPosition,
                    'menu_icon'             => $menuIcon,
                    'rewrite'               => array('slug' => $this->slug),
                    'description'           => '',
                    'show_ui'               => true,
                    'show_in_menu'          => true,
                    'show_in_nav_menus'     => true,
                    'show_in_admin_bar'     => true,
                    'show_in_rest'          => true,
                    'capability_type'       => 'post',
                    'delete_with_user'      => false,
                    'has_archive'           => false,
                    'hierarchical'          => false,
                    'exclude_from_search'   => true,
                )
            );
        }

    }
}
