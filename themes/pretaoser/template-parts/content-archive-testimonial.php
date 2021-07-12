<?php
$testimonial = get_post_meta(get_the_ID(), '_testimonial', true)
?>
<div class="testimonials-full-block row py-3 px-5">
    <div class="testimonials-inner-block col-md-10 px-5 mx-auto">
        <div class="pt-3 pb-1 px-1 px-md-5">
            <p class="testimonial-title font-weight-bold"> <?= esc_html($testimonial['title']) ?></p>
            <p class="testimonial-text"><?= esc_html($testimonial['text']) ?></p>
            <p class="testimonial-author text-right font-weight-bold"><?= esc_html($testimonial['author'], true) ?></p>
        </div>
    </div>
</div>