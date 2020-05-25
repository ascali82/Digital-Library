<?php
/**
 * Template per la visualizzazione di tutti i post singoli
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _incubation
 */

get_header();
?>

	<main id="primary" class="site-main">
	<?php 
        if (function_exists('the_breadcrumb')) {
            the_breadcrumb();
        }
         ?> 
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle sr-only">' . esc_html__( 'Previous:', '_incubation' ) . '</span><span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle sr-only">' . esc_html__( 'Next:', '_incubation' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();