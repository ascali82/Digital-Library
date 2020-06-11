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
			<form id="misha_filters" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST">
				<label for="misha_posts_per_page">Per page</label>
				<select name="misha_posts_per_page" id="misha_posts_per_page">
					<option><?php echo get_option( 'posts_per_page' ) ?></option><!-- default value from Settings->Reading -->
					<option>5</option>
					<option>10</option>
					<option value="-1">All</option>
				</select>
				
				<label for="misha_order_by">Order</label>
				<select name="misha_order_by" id="misha_order_by">
					<option value="date-DESC">Date &darr;</option><!-- I will explode these values by "-" symbol later -->
					<option value="date-ASC">Date &uarr;</option>
					<option value="comment_count-DESC">Comments &darr;</option>
					<option value="comment_count-ASC">Comments &uarr;</option>
				</select>
				
				<!-- required hidden field for admin-ajax.php -->
				<input type="hidden" name="action" value="mishafilter" />
				
				<button>Apply Filters</button>
			</form>

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
if ( $services->have_posts() ) :  				?>
    <div id="misha_posts_wrap">
        <?php	while ( $services->have_posts() ) :
		$services->the_post();?>
		<?php printf( '%1$s - %2$s', get_the_title(), get_the_content() );  ?>
        <?php

    endwhile;

  ?></div><?php

  global $wp_query; // you can remove this line if everything works for you

  // don't display the button if there are not enough posts
  if (  $wp_query->max_num_pages > 1 ) :
      echo '<div id="misha_loadmore">More posts</div>'; // you can use <a> as well
  endif;

else:

  get_template_part( 'template-parts/post/content', 'none' );

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