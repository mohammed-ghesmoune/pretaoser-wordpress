<?php
/*
Plugin Name: Pret à Oser
Description: Plugin that adds all post types needed by our theme
Author: mghesmoune
Version: 1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
require_once plugin_dir_path( __FILE__ ) . 'load.php';

// register all custom post-types
function pao_cpt_init() {
    (new PrestationRegister())->register();
    (new TestimonialRegister())->register();
    (new CarouselRegister())->register();
    
}
add_action( 'init', 'pao_cpt_init' );

//Flushing Rewrite on Activation To get permalinks to work
function my_rewrite_flush() {
    
    pao_cpt_init();
    
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'pao_rewrite_flush' );


//Register and Enqueue Scripts for admin.
function add_admin_scripts( $hook ) {
    global $post;

    // for service post-type admin
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( (new PrestationRegister)->getSlug() === $post->post_type ) {     
            wp_enqueue_script(  'admin-service-script',plugins_url('js/services/service.js' ,__FILE__ ),['jquery'],false, true);
        }
    }
    // for carousel post-type admin
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( (new CarouselRegister)->getSlug() === $post->post_type ) { 
            wp_enqueue_media();    
            wp_enqueue_script(  'admin-carousel-script',plugins_url('js/carousels/carousel.js' ,__FILE__ ),['jquery'],false, true);
        }
    }

}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

//Register and Enqueue Style for admin.
function add_admin_styles($hook){
    if ($hook == 'widgets.php'){
        wp_enqueue_style('pretaoser-admin-style', plugins_url('css/admin-widget-style.css' ,__FILE__ ), [],false, 'all');
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_styles', 10, 1 );

