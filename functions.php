<?php

function tigercodes_css() {
  // Adiciona o estilo do tema
  wp_register_style('tigercodes-style', get_template_directory_uri() . '/style.css', [], '1.0.0');
  wp_enqueue_style('tigercodes-style');

  // Adiciona o Bootstrap CSS
  wp_register_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', [], '5.0.0');
  wp_enqueue_style('bootstrap-style');

  // Adiciona o Swiper CSS
  wp_register_style('swiper-style', get_template_directory_uri() . '/css/swiper-bundle.min.css', [], '6.0.0');
  wp_enqueue_style('swiper-style');
}
add_action('wp_enqueue_scripts', 'tigercodes_css');


function tigercodes_js() {
  // Carregar o jQuery (muitas vezes já vem com o WordPress, então não é necessário se estiver sendo carregado automaticamente)
  wp_enqueue_script('jquery'); // O jQuery já vem com o WordPress, você pode deixar isso para garantir que está sendo carregado
  
  // Carregar o Bootstrap JS
  wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], '5.0.0', true); // Carregar após o jQuery
  wp_enqueue_script('bootstrap-js');
  
  // Carregar o Swiper JS
  wp_register_script('swiper-js', get_template_directory_uri() . '/js/swiper-bundle.min.js', [], '6.0.0', true); // Carregar no rodapé
  wp_enqueue_script('swiper-js');
  
  // Carregar o seu arquivo de scripts personalizados
  wp_register_script('custom-js', get_template_directory_uri() . '/js/scripts.js', [], '1.0.0', true); // Carregar no rodapé
  wp_enqueue_script('custom-js');
}
add_action('wp_enqueue_scripts', 'tigercodes_js');




add_theme_support('menus');

function register_my_menu() {
  register_nav_menu('nav-list',__( 'Nav List' ));
}
add_action( 'init', 'register_my_menu' );



function my_cmb2_fields() {
  $cmb2 = new_cmb2_box([
    'id' => 'pagina_inicio',
    'title' => 'Início',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'pagina-inicio.php',
    ],
  ]);

  $cmb2->add_field([
    'name' => 'Logo',
    'id' => 'logo',
    'type' => 'text'
  ]);

  $cmb2->add_field([
    'name' => 'Saudações',
    'id' => 'greetings',
    'type' => 'text'
  ]);
}
add_action('cmb2_admin_init', 'my_cmb2_fields');

?>