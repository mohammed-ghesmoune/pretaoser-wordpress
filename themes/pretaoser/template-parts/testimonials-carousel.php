<?php

$testimonial= new TestimonialRegister();
$testimonials = new WP_Query([
    'post_type' => $testimonial->getSlug(),
]);

?>
<?php if ($testimonials->have_posts()) : ?>
    <div class="testimonials-page-section my-5">
        <h2 class="text-center text-uppercase h2 py-5"> Témoignages ... </h2>
        <div class="testimonials-wrapper container-md">
            <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
                <?php $testimonial = get_post_meta(get_the_ID(), '_testimonial', true) ?>
                <div class="testimonials-full-block row ">
                    <div class="testimonials-inner-block col-md-10 px-5 mx-auto">
                        <div class="pt-3 pb-1 px-1 px-md-5">
                            <p class="testimonial-title font-weight-bold"> <?= esc_html($testimonial['title']) ?></p>
                            <p class="testimonial-text"><?= esc_html($testimonial['text']) ?></p>
                            <p class="testimonial-author text-right font-weight-bold"><?= esc_html($testimonial['author'], true) ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif ?>