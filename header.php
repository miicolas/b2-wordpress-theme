<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Agencia</title>

  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/style.css">
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/main.js" defer=""></script>
  <?php wp_head(); ?>
</head>
<body class="home">
<header class="nav">

  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    <div class="nav__logo-img">
    <?php the_custom_logo() ; ?>
    </div>
  </a>
  <?php wp_nav_menu([
      'theme_location' => 'header', 
      'container' => false,
      'menu_class' => 'nav__menu',
  ]); ?>

  
  <button class="nav__burger">
    <span></span>
  </button>
</header>
