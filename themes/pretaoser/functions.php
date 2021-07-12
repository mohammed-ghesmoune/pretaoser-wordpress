<?php


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function pretaoser_theme_support()
{
	//output valid HTML5.
	add_theme_support('html5', array('search-form', 'gallery', 'caption', 'script', 'style'));
	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');
	// Custom logo.
	add_theme_support('custom-logo', array(
		'height' => '60',
		'width' => '150',
		'flex-height' => true,
		'flex-width' => true,
	));
	//Let WordPress manage the document title.										
	add_theme_support('title-tag');
	//Make theme available for translation.
	load_theme_textdomain('pao');
}
add_action('after_setup_theme', 'pretaoser_theme_support');

/**
 * REQUIRED FILES
 * Include required files.
 */
require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
require_once get_template_directory() . '/inc/functions.php';


/**
 * Register and Enqueue Styles.
 */
function pretaoser_register_styles()
{
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', [], false, 'all');
	wp_enqueue_style('pretaoser-style', get_stylesheet_uri(), [], false, 'all');
	wp_enqueue_style('pretaoser-logo_carousel', get_stylesheet_directory_uri() . '/assets/css/logo-carousel.css', ['bootstrap'], false, 'all');
	if (is_front_page()) {
		wp_enqueue_style('pretaoser-services-carousel-style', get_stylesheet_directory_uri() . '/assets/css/services-carousel.css', ['bootstrap'], false, 'all');
		wp_enqueue_style('pretaoser-testimonials-carousel-style', get_stylesheet_directory_uri() . '/assets/css/testimonials-carousel.css', ['bootstrap'], false, 'all');
	}
}

add_action('wp_enqueue_scripts', 'pretaoser_register_styles');


/**
 * Register and Enqueue Scripts.
 */
function pretaoser_register_scripts()
{
	//$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js', ['jquery', 'popper'], false, true);
	wp_enqueue_script('font-awesome-icons', 'https://use.fontawesome.com/releases/v5.13.0/js/all.js', [], false, true);
	wp_enqueue_script('pretaoser-slick-carousel', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', [], false, true);
	wp_enqueue_script('pretaoser-main-scripts', get_stylesheet_directory_uri() . '/assets/js/main-scripts.js', ['jquery', 'pretaoser-slick-carousel'], false, true);
	if (is_front_page()) {
		wp_enqueue_script('pretaoser-services-carousel', get_stylesheet_directory_uri() . '/assets/js/services-carousel.js', ['jquery', 'pretaoser-slick-carousel'], false, true);
		wp_enqueue_script('pretaoser-testimonials-carousel', get_stylesheet_directory_uri() . '/assets/js/testimonials-carousel.js', ['jquery', 'pretaoser-slick-carousel'], false, true);
	}
}

add_action('wp_enqueue_scripts', 'pretaoser_register_scripts');


/**
 * Register and Enqueue Styles for admin.
 */
function pretaoser_register_admin_styles()
{

	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', [], false, 'all');
}

add_action('admin_enqueue_scripts', 'pretaoser_register_admin_styles');


/**
 * Register and Enqueue Scripts for admin.
 */
function pretaoser_register_admin_scripts()
{

	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js', ['jquery', 'popper'], false, true);
	wp_enqueue_script('font-awesome-icons', 'https://use.fontawesome.com/releases/v5.13.0/js/all.js', [], false, true);
}

add_action('admin_enqueue_scripts', 'pretaoser_register_admin_scripts');

/**
 * Register navigation menus.
 */
function pretaoser_menus()
{
	register_nav_menus(
		array(
			'primary'  => __('Header Main Menu', 'pao'),
		)
	);
}
add_action('init', 'pretaoser_menus');

/**
 * Register Widget Areas .
 */
function pretaoser_register_sidebars()
{
	register_sidebar(
		array(
			'id'            => 'social-media',
			'name'          => __('Social Media', 'pao'),
			'description'   => __('Social media menu ', 'pao'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-column-1',
			'name'          => __('Footer Column 1', 'pao'),
			'description'   => __('Footer first column widget area.', 'pao'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-column-2',
			'name'          => __('Footer Column 2', 'pao'),
			'description'   => __('Footer second column widget area.', 'pao'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'contact-infos',
			'name'          => __('Contact', 'pao'),
			'description'   => __('Contact Informations ', 'pao'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-column-3',
			'name'          => __('Footer Column 3', 'pao'),
			'description'   => __('Footer third column widget area.', 'pao'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
	
}
add_action('widgets_init', 'pretaoser_register_sidebars');


//add login and logout links 
/*
function pretaoser_add_login_logout_items_to_nav_menu($items, $args)
{
	if (!is_user_logged_in()) {
		$items .= '<li class="nav-item"><a class="nav-link" href="' . get_bloginfo('wpurl') . '/wp-login.php">Se connecter</a></li>';
	}
	// elseif (is_user_logged_in()) {
	//	$items .= '<li class="nav-item"><a class="nav-link" href="' . get_bloginfo('wpurl') . '/wp-login.php?loggedout=true">Se deconnecter</a></li>';
	//}
	return $items;
}
add_filter('wp_nav_menu_items', 'pretaoser_add_login_logout_items_to_nav_menu', 10, 2);
*/

//remove comments from admin menu 
pretaoser_remove_comments();

// remove post post-type from admin menu
add_filter('register_post_type_args', 'pretaoser_remove_post_types', 0, 2);

// remove default widgets from admin menu
add_action( 'widgets_init', 'pretaoser_remove_default_widgets' );

/*
* customize login form
*/
function pretaoser_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'pretaoser_login_logo_url' );

function pretaoser_login_logo_url_title() {
    return 'Prêt à Oser | Consultante en Image & Personal Shopper';
}
add_filter( 'login_headertitle', 'pretaoser_login_logo_url_title' );

function pretaoser_login_stylesheet() {
    wp_enqueue_style( 'pretaoser-login', get_stylesheet_directory_uri() . '/assets/css/style-login.css' );
   // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'pretaoser_login_stylesheet' );


