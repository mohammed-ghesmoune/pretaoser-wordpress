<?php
/*
* 404 not found page  
*/
?>

<?php get_header() ?>


<div class="d-flex flex-column justify-content-center align-items-center" style=" height:calc(100vh - 150px);background-image:url(http://localhost/pret-a-oser/wp-content/uploads/2020/11/blog-post-12-768x532-1.jpg); background-size:cover;background-blend-mode:overlay;background-color:rgba(255, 192, 203, 0.1);background-position:center center;background-repeat: no-repeat;">
    <div class="mb-5 ">
        <?php
        get_search_form();
        ?>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center  p-5" style="background-color:rgba(255, 255, 255,0.8)">
        <h1>. 404 .</h1>
        <h6>La page que vous recherchez est introuvable.</h6>
        <div class=" button-wrapper mt-5 mb-3 d-flex justify-content-center">
            <?php get_template_part('template-parts/button', null, ['text' => 'Accueil', 'href' => get_bloginfo('wpurl')]); ?>
        </div>

    </div>
</div>

<?php get_footer() ?>