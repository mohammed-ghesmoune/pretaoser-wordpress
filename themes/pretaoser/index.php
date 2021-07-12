<?php

/**
 * The main template file
 */

get_header();
?>

<main id="site-content" role="main">

    <?php

    $archive_title    = '';
    $archive_subtitle = '';

    if (is_search()) {
        global $wp_query;

        $archive_title = sprintf(
            '%1$s %2$s',
            '<span class="color-accent">' . __('Recherche pour:', 'pao') . '</span>',
            '&ldquo;' . get_search_query() . '&rdquo;'
        );

        if ($wp_query->found_posts) {
            $archive_subtitle = sprintf(
                /* translators: %s: Number of search results. */
                _n(
                    '%s résultat trouvé.',
                    '%s résultats trouvés.',
                    $wp_query->found_posts,
                    'pao'
                ),
                number_format_i18n($wp_query->found_posts)
            );
        } else {
            $archive_subtitle = __('Aucun résultat pour votre recherche, réessayez !', 'pao');
        }
    } elseif (is_archive() && !have_posts()) {
        $archive_title = __('Aucun résultat', 'pao');
    } elseif (!is_home()) {
        $archive_title    = get_the_archive_title();
        $archive_subtitle = get_the_archive_description();
    }

    if ($archive_title || $archive_subtitle) {
    ?>


        <div class=" archive-header container-fluid mb-5" style="background-color:pink;">
            <div class=" container py-3">

                <?php if ($archive_title) { ?>
                    <h1 class="archive-title"><?php echo wp_kses_post($archive_title); ?></h1>
                <?php } ?>

                <?php if ($archive_subtitle) { ?>
                    <div class="archive-subtitle "><?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
                <?php } ?>

            </div>

        </div>

    <?php
    }

    if (have_posts()) {

        $i = 0;

        while (have_posts()) {
            $i++;
            if ($i > 1) {
                echo '<hr class="" aria-hidden="true" />';
            }
            the_post();

            get_template_part('template-parts/content-archive', get_post_type());
        }
    } elseif (is_search()) {
    ?>

        <div class="d-flex  justify-content-center align-items-center mb-5" style="height:150px">
            <div class="">
                <?php
                get_search_form();
                ?>
            </div>
        </div>

    <?php
    }
    ?>

    <?php get_template_part('template-parts/pagination'); ?>

</main><!-- #site-content -->

<!--displays partners logos -->
<?php get_template_part('template-parts/logo-carousel'); ?>

<!-- displays footer widget areas ( 3 columns )-->
<?php get_template_part('template-parts/footer-widgets'); ?>

<?php get_footer();
