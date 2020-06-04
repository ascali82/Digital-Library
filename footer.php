<?php
/**
 * Footer del tema
 *
 * Contiene il footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _digital_library
 */

?>
        </div><!-- #wrapper -->
</div><!-- .container -->
        </div><!-- #page -->
        <footer id="colophon" class="site-footer footer pt-4 my-md-5 pt-md-5">
            <div class="footer-cont container border-top">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <?php wp_nav_menu( array(
                        'theme_location'  => 'secondary',
                        'menu'            => 'Footer Menu', 
                        'container'       => 'div', 
                        'container_class' => 'col-md-4 col-xl-3', 
                        'menu_id'         => 'footer_nav',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>'  ) ); ?>
                    </div>
                    <div class="col-6 col-md-6">

                    </div>
                </div>
                <div class="row text-center">
                    <div class="site-info text-muted p-0">
                        <p class="small mb-0">
                            <?php
                            $my_theme = wp_get_theme();
                            /* translators: 1: Theme name, 2: Theme author. */
                            printf( esc_html__( '%1$s &copy; %2$s', '_digital_library' ), '<a href="' . esc_html( $my_theme->get( 'ThemeURI' ) ). '">' . esc_html( $my_theme->get( 'Name' ) ). ' <i class="fas fa-external-link-alt fa-xs"></i></a>', '<a href="' . esc_html( $my_theme->get( 'AuthorURI' ) ). '">' . esc_html( $my_theme->get( 'Author' ) ). ' <i class="fas fa-external-link-alt fa-xs"></i></a>' );
                            ?>
                        </p>
                    </div><!-- .site-info -->
                </div>
            </div>        
        </footer><!-- #colophon -->

<?php wp_footer(); ?>

    </body>
</html>