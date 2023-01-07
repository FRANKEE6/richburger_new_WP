<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rich_burger_widgets_init()
{

    register_sidebar(
        array(
            'name'          => esc_html__('Postranný obsah', 'rich_burger'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Sem vlož vidgety aby sa objavili na boku stránky', 'rich_burger'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'rich_burger_widgets_init');

/**
 *  Customizer
 */

add_action('customize_register', 'lans_customize_register');
function lans_customize_register($wp_customize)
{
    $wp_customize->add_section('copyright', array(
        'title' => 'Copyright',
        'priority' => 30,
        'description' => 'Úprava textu copyright sekcie vo footeri',
    ));

    $wp_customize->add_setting('copy_by', array(
        'default' => '&copy; 2023',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_copy_by',
    ));

    $wp_customize->add_setting('copy_text', array(
        'default' => get_option('blogname'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_copy_text',
    ));

    $wp_customize->add_control('copy_by', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'copyright',
        'label' => 'Copyright',
        'description' => 'Miesto vyhradené pre copyright symbol a rok',
    ));

    $wp_customize->add_control('copy_text', array(
        'type' => 'textarea',
        'priority' => 20,
        'section' => 'copyright',
        'label' => 'Sprievodný text',
        'description' => 'Miesto vyhradené pre sprievodný text',
    ));

    function sanitize_copy_by($content)
    {
        return sanitize_text_field($content);
    }

    function sanitize_copy_text($content)
    {
        return wp_kses($content, array(
            'strong' => array(),
            'em' => array(),
            'small' => array(),
            'p' => array(),
            'a' => array(
                'href' => array(),
                'title' => array(),
            )
        ));
    }
}
