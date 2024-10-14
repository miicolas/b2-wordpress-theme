<?php

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag');
    add_theme_support( 'menus');
    add_theme_support( 'post-thumbnails');
    add_theme_support('custom-logo'); // Logo Custom
    add_theme_support('title-tag'); // Titre du site
    
} );