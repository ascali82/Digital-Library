<?php
/**
 * Template Name: Archivio Opere
 * 
 * Template per la visualizzazione della pagina con l'elenco delle opere
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
  $query = new WP_Query( array( 'post_type' => 'opere', 'posts_per_page' => -1  ) );
 
    $posts = $query->posts;
                   
echo '<table class="table-sm table-borderless"
  data-toggle="table"
  data-search="true"
  data-show-search-button="true"
  data-pagination="true">
    <thead class="thead-light">
    <tr>
    <th data-sortable="true" data-field="Opera" data-halign="center" data-align="left">Opera</th>
    <th data-sortable="true" data-field="Letteratura" data-halign="center" data-align="left">Letteratura</th>
    <th data-sortable="true" data-field="Genere" data-halign="center" data-align="left">Genere</th>
    </tr>
  </thead>
  <tbody>';

    foreach ($posts as $post) {
echo '<tr id="tr-id-'. get_the_ID() .'" class="tr-class-'. get_the_ID() .'" data-title="bootstrap table">';
echo  the_title( '<td id="td-id-'. get_the_ID() . '" class="td-class-'. get_the_ID() .'" data-title="bootstrap table"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></td>' ); 
$args = array('orderby' => 'term_order', 'order' => 'ASC', 'fields' => 'all');
$terms = wp_get_object_terms( $post->ID, 'letterature', $args );
$walk = new Walker_Quickstart();
echo $walk->walk($terms, 0);
echo '</tr>';
    }

echo '</tbody> </table>';    


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