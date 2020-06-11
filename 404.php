<?php
/**
 * Template per la visualizzazione della pagina 404
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _digital_library
 */

get_header();
?>

    <main id="primary" class="site-main col-12">
        <?php 
        if (function_exists('the_breadcrumb')) {
            the_breadcrumb();
        }
         ?> 
            <section class="error-404 not-found container error-container">
            <div class="row  d-flex align-items-center justify-content-center">
		        <div class="col-md-12 text-center">
                <header class="page-header">
                    <h1 class="page-title big-text"><?php esc_html_e( 'Oops! Non riusciamo a trovare la pagina che stavi cercando', '_digital_library' ); ?></h1>
                    <h2 class="small-text">404 - PAGE NOT FOUND</h2>
                </header><!-- .page-header -->
            </div>
                <div class="page-content col-md-6  text-center">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', '_digital_library' ); ?></p>

                        <?php
                        get_search_form();

                        the_widget( 'WP_Widget_Recent_Posts' );
                        ?>

                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', '_digital_library' ); ?></h2>
                            <ul>
                                <?php
                                wp_list_categories(
                                    array(
                                        'orderby'    => 'count',
                                        'order'      => 'DESC',
                                        'show_count' => 1,
                                        'title_li'   => '',
                                        'number'     => 10,
                                    )
                                );
                                ?>
                            </ul>
                        </div><!-- .widget -->

                        <?php
                        /* translators: %1$s: smiley */
                        $_digital_library_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', '_digital_library' ), convert_smilies( ':)' ) ) . '</p>';
                        the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$_digital_library_archive_content" );

                        the_widget( 'WP_Widget_Tag_Cloud' );
                        ?>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->

    <?php
    get_footer();