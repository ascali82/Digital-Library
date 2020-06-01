<?php
/**
 * Template per visualizzare le pagine archivio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _digital_library
 */

get_header();
?>

        <main id="primary" class="site-main">
        <?php 
        if (function_exists('the_breadcrumb')) {
            the_breadcrumb();
        }
         ?> 
            <?php
            if ( have_posts() ) : ?>
                <div class="jumbotron jumbotron-fluid" style="background-image: url('http://www.californiafootgolfclub.com/static/img/footgolf-1.jpg'); background-size: 100%;">
  <div class="container">
                <header class="page-header">
                    <?php
                    single_term_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </header><!-- .page-header -->
                </div>
</div>
                <?php

        //get the current object
        $current = $wp_query->get_queried_object();

        // try  var_dump($current);  to see all available data!

        // return the ID of the current term
        // i.e. ID of term "Photoshop" is "26", so we get "26" if we are viewing "Photoshop"
        $current_term_id = $current->term_id;

        // return the nicename of the current term
        // i.e. returns "Photoshop"
        // or "ps-thematic#1" if we are on a child term of "Photoshop"
        $current_name = $current->name;

        // returns the current taxonomy slug we are in
        // i.e. it will return "course"
        $current_taxonomy = $current->taxonomy;

        // returns the ID of the parent, if we have a parent
        // i.e. if we are viewing "ps-thematic#1" it will return the ID of "Photoshop", 26
        // if we are viewing "Photoshop", it will return 0, because "Photoshop" is a top level term
        $current_parent = $current->parent;

        // display name of current term, i.e. "Photoshop"
//        echo '<strong>'.$current_name.'</strong>';

        $sub_terms = get_terms( array(
            'taxonomy'      => $current_taxonomy,
//            'child_of'      => $current_term_id,
            'parent' => $current_term_id,
            'hide_empty'    => false,
            'order' => 'ASC',
            'meta_key' => 'order',
            'orderby' => 'order'
        ) );

        // only start if some sub terms exist
        if ($sub_terms) {

            // try  var_dump($sub_terms);  to see all available data!

            echo '<div class="card-deck">';

            foreach ($sub_terms as $sub_term) {
                $image = get_field('immagine', $sub_term);
                // try  var_dump($sub_term);  to see all available data!

                // only show the name for the example, "ps-thematic#1"
                echo '  <div class="card">

                <div class="card-body">
                  <a href="'.$sub_term->slug.'"><h2 class="card-title">'.$sub_term->name.'</h2></a>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>';

            }// END foreach

            echo '</div><!-- END .sub-terms -->';

        }// END if
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();



                    /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content', get_post_type() );

                endwhile;

                the_posts_navigation();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>

        </main><!-- #main -->

<?php
//get_sidebar();
get_footer();