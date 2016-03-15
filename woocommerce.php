<?php get_header(); ?>



    <!--this is page.php-->

    <div class="column-main" role="main">

        <?php get_sidebar(); ?>

        <h1><?php the_title(); ?></h1>

        <article class="content">

            <!-- ### START CONTENT ### -->

            <?php woocommerce_content(); ?>

            <!-- ### END CONTENT ### -->

        </article>



        <section class="logos">

            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Logo Area')) : ?>



            <?php endif; ?>

        </section>

        <section class="contact-information">

            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact Information Area')) : ?>



            <?php endif; ?>

        </section>

    </div>



<?php get_footer(); ?>