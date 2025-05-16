<?php
function brownie_recepten_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
}
add_action('after_setup_theme', 'brownie_recepten_setup');

// Recept CPT
function register_recept_cpt() {
  register_post_type('recept', [
    'labels' => [
      'name' => 'Recepten',
      'singular_name' => 'Recept',
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'recepten'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true
  ]);
}
add_action('init', 'register_recept_cpt');

// Ingrediënten-taxonomie
function register_ingredienten_taxonomy() {
  register_taxonomy('ingredienten', 'recept', [
    'label' => 'Ingrediënten',
    'hierarchical' => false,
    'show_in_rest' => true,
  ]);
}
add_action('init', 'register_ingredienten_taxonomy');

// Enqueue styles
function brownie_scripts() {
  wp_enqueue_style('brownie-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'brownie_scripts');


?>