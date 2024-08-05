<?php

function load_assets() {

    // Register Bootstrap CSS
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null, 'all');
    wp_enqueue_style('bootstrap');

    // Register your main stylesheet
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), null, 'all');
    wp_enqueue_style('style');

    // Register jQuery (if not already included by WordPress)
    wp_enqueue_script('jquery'); // WordPress includes jQuery by default

    // Register Bootstrap JS
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap-js');

    // Register custom JS
    wp_register_script('script-js', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
    wp_enqueue_script('script-js');
}

add_action('wp_enqueue_scripts', 'load_assets');

?>
