<?php
if (!function_exists('rich_burger_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     */
    function rich_burger_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'rich_burger' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('rich_burger', get_template_directory() . '/languages');

        /*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
        add_theme_support('title-tag');

        /**
         * Add post-formats support.
         */
        add_theme_support(
            'post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
            )
        );

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);

        register_nav_menus(
            array(
                'primary' => esc_html__('Hlavné menu', 'rich_burger'),
                'secondary'  => esc_html__('Vedľajšie menu', 'rich_burger'),
            )
        );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );

        /*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
        $logo_width  = 300;
        $logo_height = 100;

        add_theme_support(
            'custom-logo',
            array(
                'height'               => $logo_height,
                'width'                => $logo_width,
                'flex-width'           => true,
                'flex-height'          => true,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Add support for custom line height controls.
        add_theme_support('custom-line-height');

        // Add support for experimental link color control.
        add_theme_support('experimental-link-color');

        // Add support for experimental cover block spacing.
        add_theme_support('custom-spacing');

        // Add support for custom units.
        // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
        add_theme_support('custom-units');

        // Remove feed icon link from legacy RSS widget.
        add_filter('rss_widget_feed_link', '__return_false');
    }
}
add_action('after_setup_theme', 'rich_burger_setup');


if (!function_exists('wp_get_list_item_separator')) :
    /**
     * Retrieves the list item separator based on the locale.
     *
     */
    function wp_get_list_item_separator()
    {
        /* translators: Used between list items, there is a space after the comma. */
        return __(', ', 'rich_burger');
    }
endif;

/**
 *  Preusporiadanie položiek v admin rozhraní
 */
add_filter('custom_menu_order', 'righ_burger_custom_menu_order', 999);
add_filter('menu_order', 'righ_burger_custom_menu_order', 999);

function righ_burger_custom_menu_order($__return_true)
{
    return array(
        'index.php', // Dashboard
        'separator1', // Medzera
        'edit.php?post_type=page', // Pages
        'upload.php', // Media
        'separator2', // Medzera
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'complianz', // Complianz (cookie plugin)
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
    );
}
