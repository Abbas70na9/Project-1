<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">

  <!-- Fonts and Vendor CSS -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="<?php echo home_url('/'); ?>" class="logo d-flex align-items-center">
        <h1 class="sitename"><?php bloginfo('name'); ?></h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary-menu',
          'menu_class' => '',
          'container' => 'ul',
          'fallback_cb' => false
        ));
        ?>
      </nav>
    </div>
  </header>
