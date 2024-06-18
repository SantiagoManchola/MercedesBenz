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
/* 
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function enqueue_custom_scripts()
{
    wp_register_script('advanced-search-js', get_template_directory_uri() . 'js/main.js', array('jquery'), null, true);
    wp_enqueue_script('advanced-search-js');
}
 */