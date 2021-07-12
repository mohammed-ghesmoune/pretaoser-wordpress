<?php

/**
 * Displays  widgets at the end of the main element.
 */

$has_sidebar_1 = is_active_sidebar('footer-column-1');
$has_sidebar_2 = is_active_sidebar('footer-column-2');
$has_sidebar_3 = is_active_sidebar('footer-column-3');

// Only output the container if there are elements to display.
if ($has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3) { 
?>
    <div class="footer-widgets-wrapper container-fluid">

        <div class="section-inner">
           
                <aside class="container">

                    <div class="row">

                        <?php if ($has_sidebar_1) { ?>

                            <div class=" column-one col">
                                <?php dynamic_sidebar('footer-column-1'); ?>
                            </div>

                        <?php } ?>

                        <?php if ($has_sidebar_2) { ?>

                            <div class="column-two col">
                                <?php dynamic_sidebar('footer-column-2'); ?>
                            </div>

                        <?php } ?>

                        <?php if ($has_sidebar_2) { ?>

                            <div class="column-three col">
                                <?php dynamic_sidebar('footer-column-3'); ?>
                            </div>

                        <?php } ?>

                    </div>

                </aside>

        </div>

    </div>

<?php } ?>