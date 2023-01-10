</main><!-- #main -->

<footer id="colophon" class="site-footer">
    <div class="footer-flex">
        <section class="address">
            <ul>
                <li><?php echo get_bloginfo('name') ?></li>
                <li><?php echo get_theme_mod('address_street') ?></li>
                <li><?php echo get_theme_mod('address_city') ?></li>
                <li><a href="tel:<?php echo filter_telephone_number(get_theme_mod('contact_tel')) ?>">
                        <?php echo get_theme_mod('contact_tel') ?></a></li>
                <li><a href="mailto:<?php echo get_theme_mod('contact_mail') ?>">
                        <?php echo get_theme_mod('contact_mail') ?></a></li>
            </ul>
        </section>
        <section class="google-map">
            <?php
            if (is_active_sidebar('sidebar-3')) : ?>
                <div class="widget-area" role="complementary">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                </div>
            <?php endif; ?>
        </section>
    </div>
    <section class="copyright">
        <p>
            <?php echo get_theme_mod('copy_by') ?>
            <span>
                <?php echo get_theme_mod('copy_text') ?>
            </span>
        </p>
        <p class="site-creator">Kontak na tvorcu stránky <a href="mailto:marcel.urban@centrum.sk">TU</p>
    </section>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>