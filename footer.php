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
</div>
        </div><!-- #wrapper -->
</div><!-- .container -->
        </div><!-- #page -->
        <footer id="colophon" class="site-footer footer pt-4">
            <div class="footer-cont container">
                <div class="row text-left">
                    
                        <?php wp_nav_menu( array(
                        'theme_location'  => 'secondary',
                        'menu'            => 'Footer Menu', 
                        'container'       => 'div', 
                        'container_class' => 'col-12 col-md-6', 
                        'menu_id'         => 'footer_nav',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>'  ) ); ?>
                    
                    <?php wp_nav_menu( array(
                        'theme_location'  => 'secondary',
                        'menu'            => 'Footer Menu', 
                        'container'       => 'div', 
                        'container_class' => 'col-12 col-md-6', 
                        'menu_id'         => 'footer_nav',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>'  ) ); ?>
                </div>
                <div class="container text-center border-top">
                    <div class="site-info text-muted p-0">
                    <small>
                            <?php
                            $my_theme = wp_get_theme();
                            /* translators: 1: Theme name, 2: Theme author. */
                            printf( esc_html__( '%1$s &copy; %2$s', '_digital_library' ), '<a href="' . esc_html( $my_theme->get( 'ThemeURI' ) ). '">' . esc_html( $my_theme->get( 'Name' ) ). ' <i class="fas fa-external-link-alt fa-xs"></i></a>', '<a href="' . esc_html( $my_theme->get( 'AuthorURI' ) ). '">' . esc_html( $my_theme->get( 'Author' ) ). ' <i class="fas fa-external-link-alt fa-xs"></i></a>' );
                            ?>
                        </small>
                    </div><!-- .site-info -->
                </div>
            </div>        
        </footer><!-- #colophon -->

<?php wp_footer(); ?>

    </body>
</html>