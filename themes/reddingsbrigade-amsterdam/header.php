<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <?php if (has_custom_logo()) {
    the_custom_logo();
  } else { ?>
    <h1><?php bloginfo('name'); ?></h1>
  <?php } ?>
  <nav>
    <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
  </nav>
</header>
