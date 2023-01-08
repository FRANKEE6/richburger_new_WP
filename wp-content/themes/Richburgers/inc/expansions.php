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
            'description'   => esc_html__('Sem vlož obsah, ktorý sa objaví na boku stránky', 'rich_burger'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer', 'rich_burger'),
            'id'            => 'sidebar-2',
            'description'   => esc_html__('Sem vlož obsah, ktorý sa objaví vo footeri', 'rich_burger'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        )
    );
}
add_action('widgets_init', 'rich_burger_widgets_init');

/**
 *  Customizer
 */

add_action('customize_register', 'rich_burger_customize_register');
function rich_burger_customize_register($wp_customize)
{
    // Sections
    //_______________________________________________________________
    $wp_customize->add_section('socials_and_contact', array(
        'title' => 'Kontaktné informácie a sociálne siete',
        'priority' => 30,
        'description' => 'Úprava otváracích hodín v hlavičke',
    ));

    $wp_customize->add_section('open_hours', array(
        'title' => 'Otváracie hodiny',
        'priority' => 31,
        'description' => 'Úprava otváracích hodín v hlavičke',
    ));

    $wp_customize->add_section('address', array(
        'title' => 'Adresa prevádzky',
        'priority' => 32,
        'description' => 'Tu zapíš adresu na ktorej sa prevádzka nachádza',
    ));

    $wp_customize->add_section('copyright', array(
        'title' => 'Copyright',
        'priority' => 33,
        'description' => 'Úprava textu copyright sekcie vo footeri',
    ));


    // Settings
    //_______________________________________________________________
    $wp_customize->add_setting('contact_tel', array(
        'default' => '0948 30 14 14',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting('contact_mail', array(
        'default' => 'restauracia@richburger.sk',
        'transport' => 'refresh',
        'sanitize_callback' => 'rich_burger_sanitize_email',
    ));

    $wp_customize->add_setting('blank_option', array(
        'transport' => 'refresh',
        'sanitize_callback' => 'rich_burger_sanitize_checkbox',
    ));

    $wp_customize->add_setting('social_url_1', array(
        'sanitize_callback' => 'sanitize_url',
    ));

    $wp_customize->add_setting('social_url_2', array(
        'sanitize_callback' => 'sanitize_url',
    ));

    $wp_customize->add_setting('social_url_3', array(
        'sanitize_callback' => 'sanitize_url',
    ));

    $wp_customize->add_setting('social_icon_1', array(
        'default' => 'fa-brands fa-facebook',
        'sanitize_callback' => false,
    ));

    $wp_customize->add_setting('social_icon_2', array(
        'default' => 'fa-brands fa-instagram',
        'sanitize_callback' => false,
    ));

    $wp_customize->add_setting('social_icon_3', array(
        'default' => 'fa-solid fa-t',
        'sanitize_callback' => false,
    ));

    $wp_customize->add_setting('open_hours_1', array(
        'default' => 'Streda - Nedeľa: 12:00 - 20:00',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting('open_hours_2', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting('address_street', array(
        'default' => 'Športová 23',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting('address_city', array(
        'default' => 'Nové Mesto nad Váhom 915 01',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting('copy_by', array(
        'default' => '&copy; 2023',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting('copy_text', array(
        'default' => get_option('blogname'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_copy_text',
    ));

    // Controls
    //_______________________________________________________________
    $wp_customize->add_control('contact_tel', array(
        'type' => 'tel',
        'priority' => 10,
        'section' => 'socials_and_contact',
        'label' => 'Telefónne číslo',
        'description' => 'Zadaj telefónne číslo na prevádzku',
    ));

    $wp_customize->add_control('contact_mail', array(
        'type' => 'mail',
        'priority' => 11,
        'section' => 'socials_and_contact',
        'label' => 'Mailová schránka',
        'description' => 'Zadaj mail na prevádzku',
    ));

    $wp_customize->add_control('blank_option', array(
        'type' => 'checkbox',
        'priority' => 12,
        'section' => 'socials_and_contact',
        'label' => 'Zaškrtni ak chceš aby sa odkazy automaticky otvárali na novej stránke prehliadača',
    ));

    $wp_customize->add_control('social_url_1', array(
        'type' => 'url',
        'priority' => 13,
        'section' => 'socials_and_contact',
        'label' => 'Odkaz na sociálnu sieť 1',
        'description' => 'Zadaj URL adresu',
        'input_attrs' => array(
            'placeholder' => 'Zadaj URL',
        ),
    ));

    $wp_customize->add_control('social_icon_1', array(
        'type' => 'radio',
        'priority' => 13,
        'section' => 'socials_and_contact',
        'label' => 'Logo sociálnej siete 1',
        'description' => 'Vyber možnosť',
        'choices' => array(
            'fa-brands fa-facebook' => 'Facebook',
            'fa-brands fa-instagram' => 'Instagram',
            'fa-solid fa-t' => 'Trip Advisor',
        ),
    ));

    $wp_customize->add_control('social_url_2', array(
        'type' => 'url',
        'priority' => 14,
        'section' => 'socials_and_contact',
        'label' => 'Odkaz na sociálnu sieť 2',
        'description' => 'Zadaj URL adresu',
        'input_attrs' => array(
            'placeholder' => 'Zadaj URL',
        ),
    ));

    $wp_customize->add_control('social_icon_2', array(
        'type' => 'radio',
        'priority' => 14,
        'section' => 'socials_and_contact',
        'label' => 'Logo sociálnej siete 2',
        'description' => 'Vyber možnosť',
        'choices' => array(
            'fa-brands fa-facebook' => 'Facebook',
            'fa-brands fa-instagram' => 'Instagram',
            'fa-solid fa-t' => 'Trip Advisor',
        ),
    ));

    $wp_customize->add_control('social_url_3', array(
        'type' => 'url',
        'priority' => 15,
        'section' => 'socials_and_contact',
        'label' => 'Odkaz na sociálnu sieť 3',
        'description' => 'Zadaj URL adresu',
        'input_attrs' => array(
            'placeholder' => 'Zadaj URL',
        ),
    ));

    $wp_customize->add_control('social_icon_3', array(
        'type' => 'radio',
        'priority' => 15,
        'section' => 'socials_and_contact',
        'label' => 'Logo sociálnej siete 3',
        'description' => 'Vyber možnosť',
        'choices' => array(
            'fa-brands fa-facebook' => 'Facebook',
            'fa-brands fa-instagram' => 'Instagram',
            'fa-solid fa-t' => 'Trip Advisor',
        ),
    ));

    $wp_customize->add_control('open_hours_1', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'open_hours',
        'label' => 'Otváracie hodiny - prvý riadok',
        'description' => 'Miesto vyhradené pre výpis otváracích hodín',
    ));

    $wp_customize->add_control('open_hours_2', array(
        'type' => 'text',
        'priority' => 11,
        'section' => 'open_hours',
        'label' => 'Otváracie hodiny - druhý riadok',
        'description' => 'Miesto vyhradené pre dodatočný výpis otváracích hodín (ak necháš prázdne, riadok bude skrytý na stránke)',
    ));

    $wp_customize->add_control('address_street', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'address',
        'label' => 'Ulica',
        'description' => 'Zadaj názov ulice a popisné číslo',
    ));

    $wp_customize->add_control('address_city', array(
        'type' => 'text',
        'priority' => 11,
        'section' => 'address',
        'label' => 'Mesto',
        'description' => 'Zadaj názov mesta a PSČ',
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

    function rich_burger_sanitize_email($email, $setting)
    {
        return (is_email($email) ? $email : $setting->default);
    }

    function rich_burger_sanitize_checkbox($checked)
    {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }
}
