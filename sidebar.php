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

<aside id="secondary" class="widget-area col-12 col-md-4">
<?php 
dynamic_sidebar( 'sidebar-1' );


if ( is_singular( 'autori' ) )  {

get_template_part( 'template-parts/sidebar/sidebar', 'autori', get_post_type() );

}?>


</aside><!-- #secondary -->