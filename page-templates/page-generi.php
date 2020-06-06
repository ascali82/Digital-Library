<?php
/**
 * Template Name: Archivio Generi
 * 
 * Template per la visualizzazione della pagina con l'elenco dei generi letterari
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
 ?>
 

<?php 
// WP_Query arguments
$args = array (
	'post_type'              => array( 'generi' ),
	'post_status'            => array( 'publish' ),
	'nopaging'               => true,
	'order'                  => 'ASC',
	'orderby'                => 'menu_order',
);

// The Query
$services = new WP_Query( $args );

// The Loop
if ( $services->have_posts() ) :  ?>
    <ul>
    <?php	while ( $services->have_posts() ) :
		$services->the_post();?>
		<li><?php printf( '%1$s - %2$s', get_the_title(), get_the_content() );  ?></li>
        <?php

    endwhile;
    wp_reset_postdata();
  ?>
</ul>
<?php
else :
esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
endif;
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