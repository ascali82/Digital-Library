<?php
/**
 * Template per visualizzare i risultati di ricerca
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _incubation
 */

get_header();
?>

        <main id="primary" class="site-main">
        <?php 
        if (function_exists('the_breadcrumb')) {
            the_breadcrumb();
        }
         ?> 
            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title">
                    <small class="text-muted">
                    <?php
                        /* translators: %s: search query. */
                        printf( esc_html__( 'Risultati di ricerca per: %s', '_incubation' ), '<span class="search-terms onft-italic">' . get_search_query() . '</span>' );
                        /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); echo '<span class="count lead">'; $count = $allsearch->post_count; _e(''); _e(' &#40;'); echo $count . ' '; if ($count != 1) { _e('articoli');} else _e('articolo'); _e('&#41;'); echo '</span>'; wp_reset_query();
                    ?>
                    </small>
                    </h1>
                </header><!-- .page-header -->

                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'search' );

                endwhile;

                the_posts_navigation();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>

        </main><!-- #main -->

<?php
get_sidebar();
get_footer();