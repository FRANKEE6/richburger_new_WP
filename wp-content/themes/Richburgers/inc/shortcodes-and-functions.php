<?php

/**
 *  Funkcie
 */

// Úprava telefónneho čísla na správny tvar
function filter_telephone_number($number)
{
    $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    $number = str_replace(array('+', '-'), '', $number);
    if ($number[0] == '0') {
        $number = ltrim($number, $number[0]);
    }
    $number = '+421' . $number;

    return $number;
}

// Zistenie a vypísanie slugu stránky
function add_page_slug()
{
    global $post;
    if (isset($post)) {
        $page_slug = $post->post_name;
    }
    echo esc_attr($page_slug);
}

/**
 *  Shortcodes
 */

// Sekcia pre zobrazenie odkazov na sociálne siete
add_shortcode('subsocial', 'subsocial_handler');
function subsocial_handler()
{
    $blankage = '';
    if (get_theme_mod('blank_option')) {
        $blankage = 'target="_blank"';
    }
    $content = '<section class="subsocial">';

    $content .= '<a href="' . get_theme_mod('social_url_1') . '"';
    $content .= $blankage;
    $content .= ' aria-label="Odkaz na sociálnu sieť">';
    $content .= '<i class="' . get_theme_mod('social_icon_1') . '"></i></a>';

    $content .= '<a href="' . get_theme_mod('social_url_2') . '"';
    $content .= $blankage;
    $content .= ' aria-label="Odkaz na sociálnu sieť">';
    $content .= '<i class="' . get_theme_mod('social_icon_2') . '"></i></a>';

    $content .= '<a href="' . get_theme_mod('social_url_3') . '"';
    $content .= $blankage;
    $content .= ' aria-label="Odkaz na sociálnu sieť">';
    $content .= '<i class="' . get_theme_mod('social_icon_3') . '"></i></a>';

    $content .= '</section>';

    return apply_filters('the_content', $content);
}

// Pridá i element zobrazujúci scroll up button
add_shortcode('scrollup', 'scrollup_button_handler');
function scrollup_button_handler()
{
    $content = '<i class="fa-solid fa-angles-up scrlup"></i>';

    return apply_filters('the_content', $content);
}
