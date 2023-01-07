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

        <div class="floatWrapper">
            <div class="contact">
                <a href="tel:<?php echo telephone_number(get_theme_mod('contact_tel')) ?>">
                    <i class="fa-solid fa-phone"></i>&nbsp;&nbsp;
                    <?php echo get_theme_mod('contact_tel') ?></a>

                <a href="mailto:<?php echo get_theme_mod('contact_mail') ?>">
                    <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;
                    <?php echo get_theme_mod('contact_mail') ?></a>
            </div>
            <div class="socialIcons">
                <a href="<?php echo get_theme_mod('social_url_1') ?>" <?php if (get_theme_mod('blank_option')) echo 'target="_blank"'; ?>>
                    <i class="<?php echo get_theme_mod('social_icon_1') ?>"></i></a>

                <a href="<?php echo get_theme_mod('social_url_2') ?>" <?php if (get_theme_mod('blank_option')) echo 'target="_blank"'; ?>>
                    <i class="<?php echo get_theme_mod('social_icon_2') ?>"></i></a>

                <a href="<?php echo get_theme_mod('social_url_3') ?>" <?php if (get_theme_mod('blank_option')) echo 'target="_blank"'; ?>>
                    <i class="<?php echo get_theme_mod('social_icon_3') ?>"></i></a>
            </div>
        </div>

        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        if (has_custom_logo()) {
            echo    '<a class="site-logo" 
        href="' . get_home_url() . '">
        <img src="' . esc_url($logo[0]) . '" 
        alt="' . get_bloginfo('name') . '">
        </a>';
        }
        ?>

        <section class="mainHeader">
            <div class="wrapper">
                <h1><?php
                    $site_name = get_bloginfo('name');
                    $site_name .= '&nbsp';
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
                'menu_class' => 'main-menu',
                'container' => 'nav',
                'menu_id' => 'mainNav'
            )); ?>
        </section>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'main-menu',
            'container' => 'nav',
            'menu_id' => 'altNav'
        ));
        ?>

    </header><!-- #masthead -->
    <main id="main" class="site-main">