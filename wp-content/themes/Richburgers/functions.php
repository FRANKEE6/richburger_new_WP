<?php
define('THEME_DIRECTORY', get_theme_file_path());

/**
 *  Theme support a nastavenia stránky
 */

require_once THEME_DIRECTORY . '/inc/site-settings.php';


/**
 *  Načítanie skriptov a css do stránky
 */

require_once THEME_DIRECTORY . '/inc/scripts-and-styles.php';


/**
 *  Načítanie shortcodes a pomocných funkcií
 */

require_once THEME_DIRECTORY . '/inc/shortcodes-and-functions.php';


/**
 *  Customizer a widgets rozšírenia
 */

require_once THEME_DIRECTORY . '/inc/expansions.php';


/**
 *  Odstránenie nadbytočného WP kódu
 */

require_once THEME_DIRECTORY . '/inc/removals.php';
