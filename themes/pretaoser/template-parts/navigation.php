<?php

/**
 * Displays the next and previous post navigation in single posts.
 */

$prestation = new PrestationRegister();
$next_post = get_next_post(true, '', $prestation->getTaxSlug());
$prev_post = get_previous_post(true, '', $prestation->getTaxSlug());
?>
<?php if ($next_post || $prev_post) : ?>
    <div class="single-nav" style=" background-color:pink;">
        <div class="container-sm py-3">
            <div class="section-inner row py-3">
                <div class="col d-flex justify-content-start align-items-center">
                    <?php if ($prev_post !== '') {
                        previous_post_link(
                            '<div class="d-inline-flex">
                    <span>
                    <svg width="1.5em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                  </svg>
                    </span>
                     %link
                </div>',
                            '<span class = "text-uppercase text-dark ">' . esc_html__('%title', 'pao') . '</span>',
                            true,
                            '',
                            $prestation->getTaxSlug()
                        );
                    } ?>
                </div>

                <div class="col d-flex justify-content-end align-items-center">
                    <?php if ($next_post !== '') {
                        next_post_link(
                            '<div class=" d-inline-flex ">
                    %link
                    <span>
                    <svg width="1.5em" height="1.2em" viewBox="0 0 16 16" class="bi bi-chevron-double-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                  </svg>
                    </span>
                </div>',
                            '<span class = "text-uppercase text-dark">' . esc_html__('%title', 'pao') . '</span>',
                            true,
                            '',
                            $prestation->getTaxSlug()
                        );
                    } ?>
                </div>
            </div>
        </div>
    </div>

<?php endif ?>