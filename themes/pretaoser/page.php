<?php

/**
 * The template for displaying pages.
 */

get_header();
?>

<main id="site-content" role="main">
    <?php
    if (is_front_page()) {
        get_template_part('template-parts/content', 'front-page');
    } else {
    ?>

        <!-- the page header -->
        <div class=" single-post-name container-fluid" style="background-color:pink;">
            <div class=" container py-3">
                <h1 class=" mb-0 h2 py-3 text-uppercase"> <?= get_the_title() ?></h1>
            </div>
        </div>

        <!-- the page thumbnail -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="single-service-post-img" style="height:450px;background-image:url(<?= get_the_post_thumbnail_url() ?>); background-size:cover;background-position:center;background-repeat: no-repeat;">
            </div>
        <?php endif ?>

        <!-- the page content -->
        <div class="container-md">
            <div class="row">
                <div class="col-md-10 py-5 mx-auto">
                    <?php the_content() ?>
                </div>
            </div>
        </div>

    <?php   } ?>

</main>

<!--displays partners logos -->
<?php get_template_part('template-parts/logo-carousel'); ?>

<!-- displays footer widget areas ( 3 columns )-->
<?php get_template_part('template-parts/footer-widgets'); ?>

<?php get_footer(); ?>