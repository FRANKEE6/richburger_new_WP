<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Prejsť na obsah', 'rich_buger'); ?></a>

    <?php
    $wrapper_classes  = 'site-header';
    $wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
    $wrapper_classes .= (true === get_theme_mod('display_title_and_tagline', true)) ? ' has-title-and-tagline' : '';
    ?>

    <header id="masthead" class="<?php echo esc_attr($wrapper_classes); ?>">

        <div class="contact-social-flex">
            <div class="contact">
                <a href="tel:<?php echo filter_telephone_number(get_theme_mod('contact_tel')) ?>">
                    <i class="fa-solid fa-phone"></i>
                    <?php echo get_theme_mod('contact_tel') ?></a>

                <a href="mailto:<?php echo get_theme_mod('contact_mail') ?>">
                    <i class="fa-solid fa-envelope"></i>
                    <?php echo get_theme_mod('contact_mail') ?></a>
            </div>
            <div class="socialIcons">
                <a href="<?php echo get_theme_mod('social_url_1') ?>" <?php if (get_theme_mod('blank_option')) echo 'target="_blank"'; ?> aria-label="Odkaz na sociálnu sieť">
                    <i class="<?php echo get_theme_mod('social_icon_1') ?>"></i></a>

                <a href="<?php echo get_theme_mod('social_url_2') ?>" <?php if (get_theme_mod('blank_option')) echo 'target="_blank"'; ?> aria-label="Odkaz na sociálnu sieť">
                    <i class="<?php echo get_theme_mod('social_icon_2') ?>"></i></a>

                <a href="<?php echo get_theme_mod('social_url_3') ?>" <?php if (get_theme_mod('blank_option')) echo 'target="_blank"'; ?> aria-label="Odkaz na sociálnu sieť">
                    <i class="<?php echo get_theme_mod('social_icon_3') ?>"></i></a>
            </div>
        </div>

        <section class="mainHeader">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            if (has_custom_logo()) {
                echo    '<a class="site-logo" 
        href="' . get_home_url() . '">
        <img src="' . esc_url($logo[0]) . '" 
        alt="' . get_bloginfo('name') . '"
        width="200" height="200">
        </a>';
            }
            ?>
            <div class="header-wrapper">
                <h1><?php
                    $site_name = get_bloginfo('name');
                    $site_name .= ' ';
                    $site_name .= get_bloginfo('description');
                    echo $site_name;
                    ?></h1>
                <ul class="openingHours">
                    <li><?php echo get_theme_mod('open_hours_1') ?></li>
                    <li><?php echo get_theme_mod('open_hours_2') ?></li>
                </ul>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'main-menu-big',
                'container' => 'nav',
                'menu_id' => 'mainNav'
            )); ?>

            <?php
            if (is_active_sidebar('sidebar-1')) : ?>
                <div class="widget-area" role="complementary">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            <?php endif; ?>
        </section>
        <nav class="alt-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'main-menu-small',
                'container' => false,
                'menu_id' => 'altNav'
            ));
            ?>
        </nav>
    </header><!-- #masthead -->
    <main id="main" class="site-main <?php add_page_slug()  ?>">