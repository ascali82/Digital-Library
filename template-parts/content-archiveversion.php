<?php
/**
 * Parte di template per la visualizzazione dei post Version nella pagina archivio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _digital_library
 */

?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php

                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
 
                    if ( 'post' === get_post_type() ) :
                        ?>
                        <div class="entry-meta">
                            <?php
                            _digital_library_posted_on();
                            _digital_library_posted_by();
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </header><!-- .entry-header -->

                <?php _digital_library_post_thumbnail(); ?>

                <div class="entry-content">
                    <?php

                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php  _digital_library_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->