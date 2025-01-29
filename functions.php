<?php
function personal_theme_setup() {
    // Theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    // Register menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'personal-theme')
    ));
}
add_action('after_setup_theme', 'personal_theme_setup');

// Enqueue styles and scripts
function personal_theme_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), null);

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
    wp_enqueue_script('typed-js', get_template_directory_uri() . '/assets/vendor/typed.js/typed.cjs', array(), null, true);

}
add_action('wp_enqueue_scripts', 'personal_theme_scripts');



function personal_theme_customizer($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('contact_info_section', array(
        'title' => __('Contact Information', 'personal-theme'),
        'priority' => 30,
    ));

    // Location Setting
    $wp_customize->add_setting('contact_location', array(
        'default' => 'Your Address Here',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_location', array(
        'label' => __('Location', 'personal-theme'),
        'section' => 'contact_info_section',
        'type' => 'text',
    ));

    // Email Setting
    $wp_customize->add_setting('contact_email', array(
        'default' => 'example@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email', 'personal-theme'),
        'section' => 'contact_info_section',
        'type' => 'email',
    ));

    // Phone Setting
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+1234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone', 'personal-theme'),
        'section' => 'contact_info_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'personal_theme_customizer');


function create_feature_post_type() {
    register_post_type('feature',
      array(
        'labels' => array(
          'name' => __('Features'),
          'singular_name' => __(' Feature')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
      )
    );
  }
  add_action('init', 'create_feature_post_type');



  
  function register_interests_post_type() {
    register_post_type('interests', [
      'labels' => [
        'name' => __('Interests', 'personal-theme'),
        'singular_name' => __('Interest', 'personal-theme'),
        'add_new_item' => __('Add New Interest', 'personal-theme'),
      ],
      'public' => true,
      'has_archive' => false,
      'supports' => ['title', 'custom-fields'],
      'menu_icon' => 'dashicons-star-filled', // Icon in dashboard menu
    ]);
  }
  add_action('init', 'register_interests_post_type');
  

  

  