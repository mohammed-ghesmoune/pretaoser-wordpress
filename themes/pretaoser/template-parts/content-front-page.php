<?php
/*
* front-page content 
*/

if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="front-page-thumbnail d-flex justify-content-center align-items-center" style="height:calc(100vh - 100px);background-image:url(<?= get_the_post_thumbnail_url() ?>); background-size:cover;background-blend-mode:overlay;background-color:rgba(21, 37, 33, 0.6);background-position:top center;background-repeat: no-repeat;">
            <div class="front-page-header ">
                <div class="site-name">Nacera Meziadi</div>
                <div class="site-description"><?php bloginfo('description') ?></div>
            </div>
        </div>

        <div class=" front-page-content container-fluid py-5" style="background-color:rgba(255, 192, 203, 0.1)">
            <div class="col-md-6 p-3 mx-auto">
                <div style="line-height: 35px;">
                    <?php the_content() ?>
                </div>
            </div>

        </div>
<?php endwhile;
endif ?>
<?php get_template_part('template-parts/services-carousel'); 
?>
<?php get_template_part('template-parts/testimonials-carousel'); 
?>
<?php get_template_part('template-parts/forfaits-carousel'); 
?>