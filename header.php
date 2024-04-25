<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/site.webmanifest">
  <meta name="msapplication-TileColor" content="#002f70">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header">
  <nav class="header__top">
    <div class="header__container">

      <div class="header__logo">
        <a href="<?php echo site_url('/'); ?>">
          <span class="header__logo-text"><span>JS</span>codez</span>
        </a>
      </div>

      <div id="menu-icon" class="header__menu-icon">
        <span class="line-one"></span>
        <span class="line-two"></span>
      </div>

      <?php
        $args = array(
          'theme_location' => 'main-menu',
          'container_class' => 'nav-top',
          'menu_class' => 'nav-top__menu',
          'container' => 'nav',
          'container_id' => 'menu-top',
        );
        wp_nav_menu($args)
      ?>

    </div>
  </nav>
</header>

<main class="main-container">