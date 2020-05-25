<?php
/**
 * Template per la visualizzazione delle pagine
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _digital_library
 */

get_header();
?>

        <main id="primary" class="site-main col-12 col-md-8"> 
        <?php 
        if (function_exists('the_breadcrumb')) {
            the_breadcrumb();
        }
         ?> 
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->

<?php
get_sidebar();
get_footer();