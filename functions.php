<?php
/*CSS*/
function photoevent_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/assets/css/style.css');

}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_styles');

/*JS*/
function photoevent_enqueue_scripts()
{
    // Enregistrez jQuery depuis la bibliothèque WordPress
    wp_enqueue_script('jquery');
    
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0', true);
    wp_enqueue_script('lightbox', get_stylesheet_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '1.0', true);
    wp_enqueue_script('filtre', get_stylesheet_directory_uri() . '/assets/js/filtre.js', array('jquery'), '1.0', true);
   
    wp_localize_script('scripts', 'frontendajax', array('ajaxurl' => admin_url('admin-ajax.php')));   // Passez l'URL AJAX de WordPress au script
}
add_action('wp_enqueue_scripts', 'photoevent_enqueue_scripts','enqueue_jquery');


function register_photoevent() {
    register_nav_menu( 'main-menu', 'Menu principal' );
}
add_action( 'after_setup_theme', 'register_photoevent' );




// filtre
require_once get_template_directory() . '/ajax-filters.php';

