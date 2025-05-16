<?php
// Thema ondersteuning registreren
function brownie_shop_setup() {
    // Voeg titeltag ondersteuning toe
    add_theme_support('title-tag');
    
    // Voeg menu ondersteuning toe
    register_nav_menus(array(
        'primary' => 'Hoofdmenu',
    ));
    
    // Voeg uitgelichte afbeelding ondersteuning toe
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'brownie_shop_setup');

// Voeg scripts en styles toe
function brownie_shop_scripts() {
    wp_enqueue_style('brownie-shop-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'brownie_shop_scripts');
?>