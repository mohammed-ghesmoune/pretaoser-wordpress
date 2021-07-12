
<!-- displays content of single post or custom post type -->
<?php

$prestation = get_post_meta(get_the_ID(), '_prestation', true)
?>
<!-- the service header -->
<div class=" single-post-name container-fluid" style="background-color:pink;">
    <div class=" container py-3">
        <h1 class=" mb-0 py-3 h2 text-uppercase"> <?= get_the_title() ?></h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 px-0 ">
            <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="" style="width:100%;height:100%; object-fit: cover;">
        </div>
        <div class="col-md-6 py-5 " style="background-color:rgba(255, 192, 203, 0.2)">
            <div class="col-md-10 mx-auto">
                <?php the_content() ?>
                <div class=" d-flex justify-content-between">
                    <div>
                        <div class="d-flex">
                            <div class="mr-2"><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-clock-history" fill="#c6317b" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                    <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </div>
                            <div>
                                Durée:<span class="prestation-duration"> <?= esc_html($prestation['duration']) ?></span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="mr-2"><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-wallet2" fill="#c6317b" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                </svg>
                            </div>
                            <div>
                                Tarif: <span class="prestation-price"><?= esc_html($prestation['price']) ?> &euro; </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" button-wrapper mt-5 mb-3 d-flex justify-content-center">
                    <?php get_template_part('template-parts/button', null, ['text' => 'Prendre RDV','href'=>get_permalink( get_page_by_path('contact'))]); ?>
                </div>
            </div>
        </div>
    </div>
</div>