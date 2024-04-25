<?php

  // includes
  require get_template_directory() . '/includes/shortcodes.php';

  // add scripts and styles
  function travels_styles() {

    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0', 'all');
    wp_enqueue_style('icons', get_template_directory_uri() . '/icons/style.css', array(), '1.0.0', 'all');

    wp_enqueue_script('script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);

  }
  add_action('wp_enqueue_scripts', 'travels_styles');


  // add menus  
  function travels_menus() {
    register_nav_menus(
      array(
        'main-menu' => __('Main Menu'),
        'footer-menu' => __('Footer Menu'),
      )
    );
  }
  add_action('init', 'travels_menus');


  // add theme support
  function travels_theme_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
  }
  add_action('after_setup_theme', 'travels_theme_support');

  // add widgets
  function travels_widgets() {
    register_sidebar(
      array(
        'name' => 'Sidebar post',
        'id' => 'sidebar-post',
        'description' => 'Standard Sidebar',
        'before_widget' => '<section id="%1$s" class="sidebar__widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
      )
    );
  }
  add_action('widgets_init', 'travels_widgets');

  add_action('wpra_lite_custom_display', function() {
    $options = WP_Reactions\Lite\Config::$current_options;
    $reactions = WP_Reactions\Lite\Shortcode::build($options);
    $reactions = str_replace(["\r", "\n", "\r\n"], '', $reactions);
    echo $reactions;
  });