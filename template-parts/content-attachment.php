<?php
/**
 * Parte di template per la visualizzazione degli allegati
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _digital_library
 */

?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' );
                    if ( 'post' === get_post_type() ) :
                        ?>
                        <div class="entry-meta">
                            <?php
                        //    _s_posted_on();
                        //    _s_posted_by();
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </header><!-- .entry-header -->

                <?php _digital_library_post_thumbnail(); ?>

                <div class="entry-attachment">
                    <?php $image_size = apply_filters( 'wporg_attachment_size', 'large' ); 
                            echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
                
                        <?php if ( has_excerpt() ) : ?>
                        
                        <div class="entry-caption">
                                <?php the_excerpt(); ?>
                        </div><!-- .entry-caption -->
                    <?php endif; ?>
                </div><!-- .entry-attachment -->

                <footer class="entry-footer">
                    <?php // _digital_library_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->