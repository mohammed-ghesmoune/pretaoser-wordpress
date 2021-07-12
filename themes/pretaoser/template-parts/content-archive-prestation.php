
<!-- displays content of archive prestation custom post type -->


<div class="container-md">
    <div class="row">
        <div class="col-md-6 px-0 ">
            <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="" style="width:100%;height:100%; object-fit: cover;">
        </div>
        <div class="col-md-6 py-5 " style="background-color:rgba(255, 192, 203, 0.2)">
            <div class="col-md-10 mx-auto">
                <h2 class="text-center"><?php the_title() ?></h2>
                <?php the_excerpt() ?>
                
                <div class=" button-wrapper mt-5 mb-3 d-flex justify-content-center">
                    <?php get_template_part('template-parts/button', null, ['text' => 'EN SAVOIR +','href'=> get_the_permalink()]); ?>
                </div>
            </div>
        </div>
    </div>
</div>