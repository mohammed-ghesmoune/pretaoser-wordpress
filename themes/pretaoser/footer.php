<?php

?>
<footer id="site-footer" class=" py-3">

    <div class="section-inner container-md">
        <div class="row  justify-content-between">
            <!-- copyright text -->
            <div class="footer-copyright  text-white">
                <span> &copy; <?php echo date_i18n(_x('Y', 'copyright date format', 'pao')); ?> </span>
                <a class="text-white" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>

            <!-- display social media menu widget -->
            <div class="footer-social-media ">
                <?php

                if (is_active_sidebar('social-media')) {
                    dynamic_sidebar('social-media');
                }
                ?>
            </div>
        </div>

    </div>
    <!-- back to top button -->
    <button id="back-to-top" class="back-to-top">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
        </svg>
    </button>

</footer>

<?php wp_footer(); ?>

</body>

</html>