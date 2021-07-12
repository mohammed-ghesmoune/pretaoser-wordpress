<?php

defined('ABSPATH') or die('accès interdit');

if (!function_exists('pretaoser_remove_post_types')) {

        function pretaoser_remove_post_types($args, $postType)
        {
            if (in_array($postType, ['post'])) {
                $args['capabilities'] = [
                    'edit_post' => false,
                    'read_post' => false,
                    'delete_post' => false,
                    'edit_posts' => false,
                    'edit_others_posts' => false,
                    'publish_posts' => false,
                    'read' => false,
                    'delete_posts' => false,
                    'delete_private_posts' => false,
                    'delete_published_posts' => false,
                    'delete_others_posts' => false,
                    'edit_private_posts' => false,
                    'edit_published_posts' => false,
                    'create_posts' => false,
                ];
                $args['public']                = false;
                $args['show_ui']               = false;
                $args['show_in_menu']          = false;
                $args['show_in_admin_bar']     = false;
                $args['show_in_nav_menus']     = false;
                $args['can_export']            = false;
                $args['has_archive']           = false;
                $args['exclude_from_search']   = true;
                $args['publicly_queryable']    = false;
                $args['show_in_rest']          = false;
            }

            return $args;
        }
    
}

if (!function_exists('pretaoser_remove_comments')) {

    function pretaoser_remove_comments()
    {
        // Removes from admin menu
        add_action('admin_menu', 'pretaoser_remove_admin_menus');
        function pretaoser_remove_admin_menus()
        {
            remove_menu_page('edit-comments.php');
        }
        // Removes from post and pages
        add_action('init', 'pretaoser_remove_comment_support', 100);

        function pretaoser_remove_comment_support()
        {
            remove_post_type_support('post', 'comments');
            remove_post_type_support('page', 'comments');
        }
        // Removes from admin bar
        function pretaoser_admin_bar_render()
        {
            global $wp_admin_bar;
            $wp_admin_bar->remove_menu('comments');
        }
        add_action('wp_before_admin_bar_render', 'pretaoser_admin_bar_render');
    }
}

if (!function_exists('pretaoser_remove_default_widgets')) {

function pretaoser_remove_default_widgets() {

    // unregister_widget( 'WP_Widget_Pages' ); // Le widget Pages
    // unregister_widget( 'WP_Widget_Calendar' ); // Le widget Calendrier
    // unregister_widget( 'WP_Widget_Archives' ); // Le widget Archives
    unregister_widget( 'WP_Widget_Meta' ); // Le widget Meta
    // unregister_widget( 'WP_Widget_Search' ); // Le widget Rechercher
    // unregister_widget( 'WP_Widget_Text' ); // Le widget de texte
    // unregister_widget( 'WP_Widget_Media_Audio' ); // Le widget Audio
    // unregister_widget( 'WP_Widget_Media_Image' ); // Le widget Image
    // unregister_widget( 'WP_Widget_Media_Video' ); // Le widget Vidéo
    // unregister_widget( 'WP_Widget_Media_Gallery' ); // Le widget Gallery
    // unregister_widget( 'WP_Widget_Custom_HTML' ); // Le widget HTML personnalisé
    // unregister_widget( 'WP_Widget_Categories' ); // Le widget catégories
    unregister_widget( 'WP_Widget_Recent_Posts' ); // Le widget articles récents
    unregister_widget( 'WP_Widget_Recent_Comments' ); // Le widget Commentaires récents
    unregister_widget( 'WP_Widget_RSS' ); // Le widget RSS
    // unregister_widget( 'WP_Widget_Tag_Cloud' ); // Le widget nuage d'étiquettes
    // unregister_widget( 'WP_Nav_Menu_Widget' ); // Le widget menu personnalisé
  
  }
}