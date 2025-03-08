<?php

function tigercodes_css() {
  // Estilo principal
  wp_register_style('tigercodes-style', get_template_directory_uri() . '/style.css', [], '1.0.0');
  wp_enqueue_style('tigercodes-style');

  // Bootstrap CSS
  wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', [], '5.3.2');
  wp_enqueue_style('bootstrap-css');

  // Swiper Bundle CSS
  wp_register_style('swiper-css', get_template_directory_uri() . '/css/swiper-bundle.min.css', [], '10.3.1');
  wp_enqueue_style('swiper-css');
}
add_action('wp_enqueue_scripts', 'tigercodes_css');


?>