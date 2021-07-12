<?php

/**
 * The template for displaying single posts.
 */

get_header();
?>
<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content' );
		}

		 get_template_part('template-parts/navigation'); 

	}

	?>

</main>

<!--displays partners logos -->
<?php get_template_part('template-parts/logo-carousel'); ?>

<!-- displays footer widget areas ( 3 columns )-->
<?php get_template_part('template-parts/footer-widgets'); ?>

<?php get_footer(); ?>