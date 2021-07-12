<!DOCTYPE html>
<html lang="<?php bloginfo('language') ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?> >

    <header id="site-header" class="site-header">
        <div class="section-inner container-fluid px-md-5">

            <nav id="header-nav" class="navbar navbar-expand-lg navbar-light  py-4 align-items-center ">
                <a class="navbar-brand" href="<?php bloginfo('wpurl') ?>">
                    <?php if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo bloginfo('name');
                    } ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if (has_nav_menu('primary')) {

                    wp_nav_menu(array(
                        'theme_location'  => 'primary',
                        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        'container'       => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id'    => 'bs-example-navbar-collapse-1',
                        'menu_class'      => 'navbar-nav mx-auto',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ));
                } ?>

            </nav>
        </div>

    </header>