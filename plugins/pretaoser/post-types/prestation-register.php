<?php

if (!class_exists('PrestationRegister')) {

    /**
     * Class PrestationRegister
     */
    class PrestationRegister implements PostTypeInterface
    {
        /**
         * @var string
         */
        private $slug;
        /**
         * @var string
         */
        private $taxSlug;
        /**
         * @var string
         */
        private $tagSlug;

        public function __construct()
        {
            $this->slug = 'prestation';
            $this->taxSlug = 'prestation_category';
            $this->tagSlug = 'prestation_tag';
        }

        /**
         * @return string
         */
        public function getSlug()
        {
            return $this->slug;
        }
        /**
         * @return string
         */
        public function getTaxSlug()
        {
            return $this->taxSlug;
        }
        /**
         * @return string
         */
        public function getTagSlug()
        {
            return $this->tagSlug;
        }

        /**
         * Registers custom post type and taxonomies with WordPress
         */
        public function register()
        {
            $this->registerPostType();
            $this->registerTax();
            $this->registerTagTax();
        }



        /**
         * Registers custom post type with WordPress
         */
        private function registerPostType()
        {

            $menuPosition = 5;
            $menuIcon = 'dashicons-admin-post';
            $slug = $this->slug;
            $labels = array(
                'name'                     => _x('Prestations', 'post type general name', 'pao'),
                'singular_name'            => _x('Prestation', 'post type singular name', 'pao'),
                'add_new'                  => __('Add New', 'pao'),
                'add_new_item'             => __('Add New Prestation', 'pao'),
                'edit_item'                => __('Edit Prestation', 'pao'),
                'new_item'                 => __('New Prestation', 'pao'),
                'view_item'                => __('View Prestation', 'pao'),
                'view_items'               => __('View Prestations', 'pao'),
                'search_items'             => __('Search Prestations', 'pao'),
                'not_found'                => __('No prestations found.', 'pao'),
                'not_found_in_trash'       => __('No prestations found in Trash.', 'pao'),
                'parent_item_colon'        => null,
                'all_items'                => __('All Prestations', 'pao'),
                'archives'                 => __('Prestation Archives', 'pao'),
                'attributes'               => __('Prestation Attributes', 'pao'),
                'insert_into_item'         => __('Insert into prestation', 'pao'),
                'uploaded_to_this_item'    => __('Uploaded to this prestation', 'pao'),
                'featured_image'           => __('Featured image', 'pao', 'pao'),
                'set_featured_image'       => __('Set featured image', 'pao'),
                'remove_featured_image'    => __('Remove featured image', 'pao'),
                'use_featured_image'       => __('Use as featured image', 'pao'),
                'filter_items_list'        => __('Filter prestations list', 'pao'),
                'items_list_navigation'    => __('Prestations list navigation', 'pao'),
                'items_list'               => __('Prestations list', 'pao'),
                'item_published'           => __('Prestation published.', 'pao'),
                'item_published_privately' => __('Prestation published privately.', 'pao'),
                'item_reverted_to_draft'   => __('Prestation reverted to draft.', 'pao'),
                'item_scheduled'           => __('Prestation scheduled.', 'pao'),
                'item_updated'             => __('Prestation updated.', 'pao'),
            );

            register_post_type(
                $this->slug,
                array(

                    'labels'                => $labels,
                    'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes','revisions'),
                    'taxonomies'            => array($this->taxSlug, $this->tagSlug),
                    'rewrite'               => array('slug' => $slug),
                    'menu_position'         => $menuPosition,
                    'menu_icon'             =>  $menuIcon,
                    'description'           => '',
                    'public'                => true,
                    'hierarchical'          => false,
                    'has_archive'           => true,
                    'exclude_from_search'   => false,
                    'show_ui'               => true,
                    'show_in_menu'          => true,
                    'show_in_nav_menus'     => true,
                    'show_in_admin_bar'     => true,
                    'show_in_rest'          => true,
                    'capability_type'       => 'post',
                    'delete_with_user'      => false,

                )
            );
        }
        
        /**
         * Registers custom taxonomy with WordPress
         */
        private function registerTax()
        {
            $labels = array(
                'name' => _x('Prestation Categories', 'taxonomy general name', 'pao'),
                'menu_name' => __('Prestation Categories', 'pao'),
                'singular_name' => _x('Prestation Category', 'taxonomy singular name', 'pao'),
                'search_items' =>  __('Search Prestation Categories', 'pao'),
                'all_items' => __('All Prestation Categories', 'pao'),
                'parent_item' => __('Parent Prestation Category', 'pao'),
                'parent_item_colon' => __('Parent Prestation Category:', 'pao'),
                'edit_item' => __('Edit Prestation Category', 'pao'),
                'update_item' => __('Update Prestation Category', 'pao'),
                'add_new_item' => __('Add New Prestation Category', 'pao'),
                'new_item_name' => __('New Prestation Category Name', 'pao'),
                'not_found' => __('No prestation categories found', 'pao'),
                'no_terms' => __('No prestation categories', 'pao'),
            );

            register_taxonomy(
                $this->taxSlug,
                array($this->slug),
                array(
                    'hierarchical' => true,
                    'labels' => $labels,
                    'public'=>true,
                    'show_in_menu'=>true,
                    'show_in_rest'=>true,
                    'show_ui' => true,
                    'query_var' => true,
                    'show_admin_column' => true,
                    'rewrite' => array('slug' => $this->taxSlug),
                )
            );
        }

        /**
         * Registers custom tag taxonomy with WordPress
         */
        private function registerTagTax()
        {
            $labels = array(
                'name' => _x('Prestation Tags', 'taxonomy general name', 'pao'),
                'menu_name' => __('Prestation Tags', 'pao'),
                'singular_name' => _x('Prestation Tag', 'taxonomy singular name', 'pao'),
                'search_items' =>  __('Search Prestation Tags', 'pao'),
                'popular_items' => __('Popular Prestation Tags', 'pao'),
                'all_items' => __('All Prestation Tags', 'pao'),
                'edit_item' => __('Edit Prestation Tag', 'pao'),
                'update_item' => __('Update Prestation Tag', 'pao'),
                'add_new_item' => __('Add New Prestation Tag', 'pao'),
                'new_item_name' => __('New Prestation Tag Name', 'pao'),
                'separate_items_with_commas' => __('Separate prestation tags with commas', 'pao'),
                'add_or_remove_items' => __('Add or remove prestation tags', 'pao'),
                'choose_from_most_used' => __('Choose from the most used prestation tags', 'pao'),
                'not_found' => __('No prestation tags found', 'pao'),
                'no_terms' => __('No prestation tags', 'pao'),

            );

            register_taxonomy(
                $this->tagSlug,
                array($this->slug),
                array(
                    'hierarchical' => false,
                    'labels' => $labels,
                    'public'=>true,
                    'show_in_rest'=>true,
                    'show_ui' => true,
                    'query_var' => true,
                    'show_admin_column' => true,
                    'show_in_menu'=>true,
                    'rewrite' => array('slug' => $this->tagSlug),
                )
            );
        }
    }
}
