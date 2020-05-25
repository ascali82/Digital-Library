<?php
/**
 * Funzioni che potenziano il tema agganciandosi a WordPress.
 *
 * @package _digital_library
 */

/**
 * Aggiunge classi customizzate all'array di classi di <body>.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _digital_library_body_classes( $classes ) {
	// Aggiunge la classe hfeed a pagine non-singular.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Aggiunge la classe no-sidebar  quando non è presente una sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', '_digital_library_body_classes' );

/**
 * Aggiunge un pingback url auto-discovery header per single posts, pagine, o allegati.
 */
function _digital_library_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', '_digital_library_pingback_header' );