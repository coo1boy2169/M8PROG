<?php
function rbamsterdam_scripts() {
  wp_enqueue_style('rbamsterdam-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'rbamsterdam_scripts');

function rbamsterdam_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('menus');
  register_nav_menus(array(
    'main-menu' => __('Hoofdmenu', 'rbamsterdam'),
  ));
}
add_action('after_setup_theme', 'rbamsterdam_theme_setup');
