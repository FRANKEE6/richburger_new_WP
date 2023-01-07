<?php

/**
 * Enqueue scripts and styles.
 */
function rich_burger_scripts()
{
    // Use stylesheet.
    wp_enqueue_style('rich_burger-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'rich_burger_scripts');

/**
 *  Pridanie scriptu s jquery dependency
 */

add_action('wp_enqueue_scripts', 'custom_script_enqueue_scripts');
function custom_script_enqueue_scripts()
{
    wp_enqueue_script(
        'my-script',
        get_stylesheet_directory_uri() . '/js/custom.js',
        array('jquery'),
        false,
        true
    );
}