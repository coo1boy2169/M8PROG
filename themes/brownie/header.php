<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="container">
            <nav>
                <div class="logo"><?php bloginfo('name'); ?></div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'menu',
                    'container' => ''
                ));
                ?>
            </nav>
        </div>
    </header>
    
    <div class="brown-bar">
        <div class="container">
            <ul class="social-icons">
                <li><div class="social-icon"></div></li>
                <li><div class="social-icon"></div></li>
                <li><div class="social-icon"></div></li>
                <li><div class="social-icon"></div></li>
            </ul>
        </div>
    </div>