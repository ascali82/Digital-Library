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
        </div><!-- #page -->
        <footer id="colophon" class="site-footer footer">
		<div class="container">
        <div class="site-info text-center text-muted">

				<?php
				$my_theme = wp_get_theme();
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( '%1$s &copy; %2$s.', '_digital_library' ), '<a href="' . esc_html( $my_theme->get( 'ThemeURI' ) ). '">' . esc_html( $my_theme->get( 'Name' ) ). '</a>', '<a href="' . esc_html( $my_theme->get( 'AuthorURI' ) ). '">' . esc_html( $my_theme->get( 'Author' ) ). '</a>' );
				?>
			</div><!-- .site-info -->
            </div>
        </footer><!-- #colophon -->

<?php wp_footer(); ?>

    </body>
</html>