<?php
/**
 * Template Name: Archivio Letterature
 * 
 * Template per la visualizzazione della pagina con l'elenco delle letterature
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
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->

                <?php _digital_library_post_thumbnail(); ?>

                <div class="entry-content">        
            <?php
            the_content();
            $terms = get_terms( array( 
                'taxonomy' => 'letterature',
                'parent'   => 0
            ) );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                echo '<section>';
                foreach ( $terms as $term ) {
                    echo '<div class="card"><div class="card-body"><h2 class="card-title"><a href="' . $term->slug . '">' . $term->name . '</a></h2></div></div>';
                }
                echo '</section>';
            }
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

//            endwhile; // End of the loop.
//        endif;
        wp_reset_postdata();
            ?>
                </div><!-- .entry-content -->

<?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
        <?php
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', '_digital_library' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
        </main><!-- #main -->

<?php
get_sidebar();
get_footer();