<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <?php wp_head() ?>
</head>
<header>
<?php
      if (function_exists('the_custom_logo')) {
        the_custom_logo();
      }
      ?>
<img class="logo" src="<? bloginfo('url'); ?>/wp-content/themes/photoevent/photos/logo.png" alt='logo'>

<nav>
<?php get_template_part('template-parts/contact'); ?>
    <?php wp_nav_menu([
    'theme_location' => 'main-menu',
    ]);?>
    
  <div class="container">
    <div id="burger">
      <div class="line one"></div>
      <div class="line two"></div>
      <div class="line three"></div>
    </div>
  
    <div id="menu">
      <ul>
        <li><a href="#">ACCUEIL</a></li>
        <li><a href="#">A PROPOS</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>
    




