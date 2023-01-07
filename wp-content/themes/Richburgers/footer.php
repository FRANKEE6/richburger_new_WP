</main><!-- #main -->

<footer id="colophon" class="site-footer">

    <div class="site-info">

        <div class="site-name">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
        </div><!-- .site-name -->

    </div><!-- .site-info -->

    <div class="copyright">
        <?php echo get_theme_mod('copy_by') ?>
        <span>
            <?php echo get_theme_mod('copy_text') ?>
        </span>
    </div>

</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>