<?php
/*
Template Name: About
Template Post Type: page
*/

get_header();
?>

<main id="site-content" role="main">

    <?php

    if (have_posts()) {

        while (have_posts()) {
            the_post();

    ?>
            <div class=" page-name container-fluid" style="background-color:pink;">
                <div class=" container py-3">
                    <h1 class=" mb-0 py-3 h2 text-uppercase"> <?= esc_html(get_the_title()) ?></h1>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 px-0 ">
                        <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="" style="width:100%;height:100%; object-fit: cover;">
                    </div>
                    <div class="col-md-6 py-5 " style="background-color:rgba(255, 192, 203, 0.2)">
                        <div class="col-md-10 mx-auto" style="line-height:30px">
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
    }

    ?>

</main>


<!--displays partners logos -->
<?php get_template_part('template-parts/logo-carousel'); ?>

<!-- displays footer widget areas ( 3 columns )-->
<?php get_template_part('template-parts/footer-widgets'); ?>

<?php get_footer(); ?>