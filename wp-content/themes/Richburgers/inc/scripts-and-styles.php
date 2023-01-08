<?php

/**
 * Enqueue scripts and styles.
 */
function rich_burger_scripts()
{
    // Font icons
    wp_enqueue_script('font-style', 'https://kit.fontawesome.com/f6c351cc2e.js', array(), false, true);

    // Normalize stylesheet
    wp_enqueue_style('normalize-style', get_template_directory_uri() . '/css/normalize.css', array());

    // Google fonts
    wp_enqueue_style('Sedfwick-Ave-Display-google-font', 'https://fonts.googleapis.com/css2?family=Sedgwick+Ave+Display&display=swap');
    wp_enqueue_style('Lora-google-font', 'https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap');

    // Main stylesheet
    wp_enqueue_style('rich_burger-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

    // Responsive embeds script.
    wp_enqueue_script(
        'rich-burger-responsive-embeds-script',
        get_template_directory_uri() . '/js/responsive-embeds.js',
        array(),
        false,
        true
    );
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
