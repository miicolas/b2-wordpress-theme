<?php 

add_action( 'after_setup_theme', function () {
    register_nav_menu('header', __('Header Menu', 'agencia')); 
    register_nav_menu('footer', __( 'Footer Menu', 'agencia' ));
} );

add_action('widgets_init', function () {
    register_sidebar([
        'name' => __('Footer', 'agencia'),
        'id' => 'footer',
        'before_widget' => '<div class="footer__col">',
        'after_widget' => '</div>',
        'before_title' => '<div class="footer__title">',
        'after_title' => '</div>',
    ]);
    register_sidebar([
        'name' => __('BlogSidebar', 'agencia'),
        'id' => 'blog_sidebar',
        'before_widget' => '<div class="sidebar__widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar__title">',
        'after_title' => '</div>',
    ]);
});
