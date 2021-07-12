<?php
/*
* displays partners logos
*/
$carousel = new WP_Query([
    'post_type' => (new CarouselRegister)->getSlug(),
]);


?>

<?php if ($carousel->have_posts()) :  while ($carousel->have_posts()) : $carousel->the_post(); ?>
        <!-- <hr class="w-75 mx-auto font-weight-bold"> -->
        <!-- <h2 class="text-center text-uppercase h2 py-5"> Partenaires </h2> -->
        <div class="container-fluid logo-carousel-container my-5">
            <div class="container">
                <section class="customer-logos ">
                    <?php
                    $images = get_post_meta(get_the_ID(), '_carousel', true);
                    foreach ($images as $image) :
                    ?>
                        <a class="" href="<?= esc_url($image['link']) ?>" target="_blank"><img src="<?= esc_url($image['url']) ?>"></a>
                    <?php endforeach ?>
                </section>
            </div>
        </div>
<?php endwhile;
endif ?>