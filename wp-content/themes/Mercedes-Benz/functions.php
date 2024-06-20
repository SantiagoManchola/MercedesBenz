<?php

/**
 * User: Solucionsoft DEV
 * Email: contacto@solucionsoft.com
 */
require get_template_directory() . '/includes/js_css.php';

function get_advancedSearch()
{
    get_template_part('./components/advancedSearch', 'advancedSearch');
}

function get_contactForm()
{
    get_template_part('./components/contactForm', 'contactForm');
}

register_nav_menus(array(
    'primary' => __('Principal', 'translate-ss'),
));

function add_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');

    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');

    wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js');

    wp_enqueue_style('alerts-css', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css');

    wp_enqueue_script('alerts-js', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js');
}
add_action('wp_enqueue_scripts', 'add_scripts');
