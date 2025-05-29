<?php
if (!defined('ABSPATH')) exit;

// Theme Setup
function sakuracloudid_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'sakuracloudid'),
        'footer' => esc_html__('Footer Menu', 'sakuracloudid')
    ));
}
add_action('after_setup_theme', 'sakuracloudid_setup');

// Enqueue scripts and styles
function sakuracloudid_scripts() {
    // Styles
    wp_enqueue_style('sakuracloudid-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Scripts
    wp_enqueue_script('sakuracloudid-navigation', get_template_directory_uri() . '/js/navigation.js', array(), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1', true);
    wp_enqueue_script('particles', 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', array(), '2.0.0', true);
    wp_enqueue_script('sakuracloudid-main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'sakuracloudid_scripts');

// Register widget areas
function sakuracloudid_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area', 'sakuracloudid'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'sakuracloudid'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'sakuracloudid_widgets_init');

// Custom Post Type for Services
function sakuracloudid_register_post_types() {
    register_post_type('service', array(
        'labels' => array(
            'name'               => __('Services', 'sakuracloudid'),
            'singular_name'      => __('Service', 'sakuracloudid'),
            'add_new'           => __('Add New Service', 'sakuracloudid'),
            'add_new_item'      => __('Add New Service', 'sakuracloudid'),
            'edit_item'         => __('Edit Service', 'sakuracloudid'),
            'new_item'          => __('New Service', 'sakuracloudid'),
            'view_item'         => __('View Service', 'sakuracloudid'),
            'search_items'      => __('Search Services', 'sakuracloudid'),
            'not_found'         => __('No services found', 'sakuracloudid'),
            'not_found_in_trash'=> __('No services found in trash', 'sakuracloudid')
        ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail'),
        'menu_icon'   => 'dashicons-cloud',
    ));
}
add_action('init', 'sakuracloudid_register_post_types');

// Theme Customizer Settings
function sakuracloudid_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('sakuracloudid_hero', array(
        'title'    => __('Hero Section', 'sakuracloudid'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default'           => __('Empowering Humanity, One Cloud at a Time', 'sakuracloudid'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => __('Hero Title', 'sakuracloudid'),
        'section'  => 'sakuracloudid_hero',
        'type'     => 'text',
    ));

    // Add more customizer settings as needed
}
add_action('customize_register', 'sakuracloudid_customize_register');
