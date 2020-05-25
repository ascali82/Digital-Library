<?php
/**
 * La sidebar contenente la principale area widget
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _digital_library
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->