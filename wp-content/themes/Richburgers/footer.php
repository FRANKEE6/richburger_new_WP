</main><!-- #main -->

<footer id="colophon" class="site-footer">

    <footer>
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
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="1200" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=%C5%A0portov%C3%A1%20490,%20915%2001%20Nov%C3%A9%20Mesto%20nad%20V%C3%A1hom&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 500px;
                            width: 1200px;
                        }
                    </style><a href="https://www.embedgooglemap.net">google maps embed zoom</a>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500px;
                            width: 1200px;
                        }
                    </style>
                </div>
            </div>
        </section>
    </footer>

    <div class="copyright">
        <?php echo get_theme_mod('copy_by') ?>
        <span>
            <?php echo get_theme_mod('copy_text') ?>
        </span>
        <br>
        <span class="site-creator">Kontak na tvorcu stránky <a href="mailto:marcel.urban@centrum.sk">TU</span>
    </div>

</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>