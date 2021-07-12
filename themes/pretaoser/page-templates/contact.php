<?php
/*
Template Name: Contact 
Template Post Type: page
*/

?>

<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post() ?>
        <!-- the post header -->
        <div class=" contact-page-header container-fluid" style="background-color:pink;">
            <div class=" container py-3">
                <h1 class=" mb-0 py-3 h2 text-uppercase"> <?= get_the_title() ?></h1>
            </div>
        </div>
        <div class="contact-page-content" style="background-color:rgba(255, 192, 203, 0.1)">
            <div class=" container-md py-5 ">
                <div class=" text-center py-3">Une question ? Une demande en particulier ? </br>
                    Contactez-moi, je me ferai un plaisir d’échanger avec vous, par téléphone ou autour d’un café.
                </div>
                <div class="row py-5">
                    <div class="col-md-6 pb-5 pb-md-0">
                        <?php if (is_active_sidebar('contact-infos')) : ?>

                            <div class=" contact-widget d-flex flex-column align-items-center justify-content-center">
                                <?php dynamic_sidebar('contact-infos'); ?>
                            </div>

                        <?php endif ?>
                    </div>
                    <div class="col-md-6 px-3">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif ?>


<!--displays partners logos -->
<?php get_template_part('template-parts/logo-carousel'); ?>

<!-- displays footer widget areas ( 3 columns )-->
<?php get_template_part('template-parts/footer-widgets'); ?>

<?php get_footer(); ?>