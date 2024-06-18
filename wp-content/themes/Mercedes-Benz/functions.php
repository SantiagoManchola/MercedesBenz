<?php

/**
 * User: Solucionsoft DEV
 * Email: contacto@solucionsoft.com
 */
require get_template_directory() . '/includes/js_css.php';

function get_avancedSearch()
{
    get_template_part('./components/avancedSearch', 'avancedSearch');
}

register_nav_menus(array(
    'primary' => __('Principal', 'translate-ss'),
));

function add_swiper_scripts()
{
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
}
add_action('wp_enqueue_scripts', 'add_swiper_scripts');
