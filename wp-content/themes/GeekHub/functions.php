<?php
/**
* load styles and scripts
**/
function load_style_script(){
    wp_enqueue_style('style', get_stylesheet_uri() );
    wp_enqueue_style('flipclock', get_template_directory_uri() . '/css/flipclock.css' );

    wp_enqueue_script('jquery-1.6.4.min', get_template_directory_uri() . '/js/jquery-1.6.4.min.js' );
    wp_enqueue_script('prefixfree.min', get_template_directory_uri() . '/js/libs/prefixfree.min.js' );
    wp_enqueue_script('flipclock.min', get_template_directory_uri() . '/js/flipclock.min.js' );
}
add_action('wp_enqueue_scripts', 'load_style_script');