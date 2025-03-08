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

    // Scripts carregados após a DOM
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', [], '3.7.1', true);
    wp_add_inline_script('jquery', 'document.addEventListener("DOMContentLoaded", function() { jQuery.noConflict(); });');

    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], '5.3.2', true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/js/swiper-bundle.min.js', ['jquery'], '10.3.1', true);
    wp_enqueue_script('scripts-js', get_template_directory_uri() . '/js/scripts.js', ['jquery'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'tigercodes_css');
