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

/**
 *  Shortcodes
 */

add_shortcode('subsocial', 'subsocial_handler');
function subsocial_handler()
{
    $blankage = '';
    if (get_theme_mod('blank_option')) {
        $blankage = 'target="_blank"';
    }
    $content = '<section class="subsocial">';

    $content .= '<a href="' . get_theme_mod('social_url_1') . '"';
    $content .= "$blankage>";
    $content .= '<i class="' . get_theme_mod('social_icon_1') . '"></i></a>';

    $content .= '<a href="' . get_theme_mod('social_url_2') . '"';
    $content .= "$blankage>";
    $content .= '<i class="' . get_theme_mod('social_icon_2') . '"></i></a>';

    $content .= '<a href="' . get_theme_mod('social_url_3') . '"';
    $content .= "$blankage>";
    $content .= '<i class="' . get_theme_mod('social_icon_3') . '"></i></a>';

    $content .= '</section>';

    return apply_filters('the_content', $content);
}
