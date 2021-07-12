<?php

if (!class_exists('TestimonialsRegister')) {

    /**
     * Class TestimonialRegister
     */
    class TestimonialRegister implements PostTypeInterface
    {
        /**
         * @var string
         */
        private $slug;

        public function __construct()
        {
            $this->slug = 'testimonial';
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
         * Regsiters custom post type with WordPress
         */
        private function registerPostType()
        {

            $menuPosition = 5;
            $menuIcon = 'dashicons-format-quote';
            $labels = array(
                'name'                     => _x('Testimonials', 'post type general name', 'pao'),
                'singular_name'            => _x('Testimonial', 'post type singular name', 'pao'),
                'add_new'                  => __('Add New', 'pao'),
                'add_new_item'             => __('Add New Testimonial', 'pao'),
                'edit_item'                => __('Edit Testimonial', 'pao'),
                'new_item'                 => __('New Testimonial', 'pao'),
                'view_item'                => __('View Testimonial', 'pao'),
                'view_items'               => __('View Testimonials', 'pao'),
                'search_items'             => __('Search Testimonials', 'pao'),
                'not_found'                => __('No testimonials found.', 'pao'),
                'not_found_in_trash'       => __('No testimonials found in Trash.', 'pao'),
                'parent_item_colon'        => null,
                'all_items'                => __('All Testimonials', 'pao'),
                'archives'                 => __('Testimonial Archives', 'pao'),
                'attributes'               => __('Testimonial Attributes', 'pao'),
                'insert_into_item'         => __('Insert into Testimonial', 'pao'),
                'uploaded_to_this_item'    => __('Uploaded to this Testimonial', 'pao'),
                'featured_image'           => __('Featured image', 'pao', 'pao'),
                'set_featured_image'       => __('Set featured image', 'pao'),
                'remove_featured_image'    => __('Remove featured image', 'pao'),
                'use_featured_image'       => __('Use as featured image', 'pao'),
                'filter_items_list'        => __('Filter testimonials list', 'pao'),
                'items_list_navigation'    => __('Testimonials list navigation', 'pao'),
                'items_list'               => __('Testimonials list', 'pao'),
                'item_published'           => __('Testimonial published.', 'pao'),
                'item_published_privately' => __('Testimonial published privately.', 'pao'),
                'item_reverted_to_draft'   => __('Testimonial reverted to draft.', 'pao'),
                'item_scheduled'           => __('Testimonial scheduled.', 'pao'),
                'item_updated'             => __('Testimonial updated.', 'pao'),
            );



            register_post_type(
                $this->slug,
                array(
                    'labels'                => $labels,
                    'supports'              => array('title', 'thumbnail','revisions'),
                    'menu_position'         => $menuPosition,
                    'menu_icon'             => $menuIcon,
                    'rewrite'               => array('slug' => $this->slug),
                    'description'           => '',
                    'public'                => true,
                    'show_ui'               => true,
                    'show_in_menu'          => true,
                    'show_in_nav_menus'     => true,
                    'show_in_admin_bar'     => true,
                    'show_in_rest'          => true,
                    'capability_type'       => 'post',
                    'delete_with_user'      => false,
                    'has_archive'           => true,
                    'hierarchical'          => false,
                    'exclude_from_search'   => false,
                )
            );
        }

    }
}
