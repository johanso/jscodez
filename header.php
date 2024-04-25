<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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