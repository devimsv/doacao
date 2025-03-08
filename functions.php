<?php

function tigercodes_css() {
  wp_register_style('swiper-style', get_template_directory_uri() . '/css/swiper-bundle.min.css', [], '6.0.0');
  wp_enqueue_style('swiper-style');
  
  wp_register_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', [], '5.0.0');
  wp_enqueue_style('bootstrap-style');

  wp_register_style('custom-style', get_template_directory_uri() . '/style.css', [], '1.0.0');
  wp_enqueue_style('custom-style');
}
add_action('wp_enqueue_scripts', 'tigercodes_css');



// Enfileirando os scripts corretamente
function tigercodes_js() {
  // Enfileirando o jQuery (padrão do WordPress)
  wp_enqueue_script('jquery'); 
  
  // Enfileirando o Swiper
  wp_enqueue_script('swiper', get_template_directory_uri() . '/swiper-bundle.min.js', array('jquery'), null, true); 

  // Enfileirando o Bootstrap
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap.min.js', array('jquery'), null, true); 
  
  // Enfileirando o seu script customizado (scripts.js)
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/scripts.js', array('jquery'), null, true); 
}
add_action('wp_enqueue_scripts', 'tigercodes_js'); // Adiciona os scripts corretamente

?>
