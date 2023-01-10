<?php
get_header();

if (is_front_page() && is_active_sidebar('sidebar-2')) : ?>

    <div class="frontpage-flex-wrapper">
        <section class="main-content">
            <?php the_content(); ?>
        </section>
        <aside class="side-content">
            <div class="widget-area" role="complementary">
                <?php dynamic_sidebar('sidebar-2'); ?>
            </div>

        </aside>
    </div>
<?php else : ?>
    <section class="main-content">
        <?php the_content(); ?>
    </section>
<?php endif; ?>


<?php get_footer();
