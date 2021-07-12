<?php

$prestation = new PrestationRegister();

$services = new WP_Query([
    'post_type' => $prestation->getSlug(),
    'tax_query' => array(
        array(
            'taxonomy' => $prestation->getTaxSlug(),
            'field'    => 'slug',
            'terms'    => 'service',
        ),
    ),
]);

?>
<?php if ($services->have_posts()) : ?>
    <h2 class="text-center text-uppercase h1 mb-0 py-5" style="font-weight: 500;background-color:rgba(255, 192, 203, 0.5)"> Services </h2>
    <div class="service-slider-page-section py-md-5">
        <div class="service-img-section">
            <?php $i = 0; ?>
            <?php while ($services->have_posts()) : $services->the_post(); ?>
                <div class="service-slider-innerblock-img item " data-index="<?= $i; ?>">
                    <img src="<?= get_the_post_thumbnail_url() ?>">
                </div>
                <?php $i++; ?>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
        <div class="service-slider-wrapper container-md ">
            <div class=" service-slider-container row">
                <div class=" service-slider-left-block col-md-5 m-0 bg-white pl-5 pl-md-0 d-flex flex-column justify-content-center align-items-center" style="height:400px">
                    <h4 class=" mb-5">Comment puis-je vous aider ?</h4>
                    <div class="service_slide_name ">
                        <?php $i = 0; ?>
                        <?php while ($services->have_posts()) : $services->the_post(); ?>
                            <div class="service-slider-innerblock item " data-index="<?= $i; ?>">
                                <p class="service-post-name"><?php the_title() ?></p>
                            </div>
                            <?php $i++; ?>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="service-slider-right-block  col-md-7 m-0 p-0" style="height:400px">
                    <div class="d-flex flex-column justify-content-center align-items-center h-100 w-100" style="background-color: rgba(21, 37, 33, 0.50);">
                        <div class="service_slide_content h-75 w-75 border border-white position-relative">
                            <?php $i = 0; ?>
                            <?php while ($services->have_posts()) : $services->the_post(); ?>
                                <div class="service-slider-innerblock position-absolute item h-100 w-100 d-flex flex-column justify-content-center align-items-center " data-index="<?= $i; ?>">
                                    <h5 id="current_service_name" class=" mb-4 text-center"><?= get_the_title() ?></h5>
                                    <p id="current_service_text" class="text-center text-white"><?= substr(get_the_excerpt(), 0, 60) ?></p>
                                    <p class="mt-3"><a href="<?= get_the_permalink() ?>" id="current_service_url"><?php _e('EN SAVOIR +','pao')?></a></p>
                                </div>
                                <?php $i++; ?>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php endif ?>