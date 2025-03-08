<?php

function tigercodes_css() {
  wp_register_style('tigercodes-style', get_template_directory_uri() . '/style.css', [], '1.0.0');
  wp_enqueue_style('tigercodes-style');
}
add_action('wp_enqueue_scripts', 'tigercodes_css');


?>