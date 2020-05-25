<?php
/**
 * The template for displaying search forms
 *
 * @package _digital_library
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" aria-label="Sitewide">
	<label class="sr-only" for="s"><?php esc_html_e( 'Cerca', '_digital_library' ); ?></label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Cerca in ', '_digital_library' ); ?><?php bloginfo( 'name' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"
			value="<?php esc_attr_e( 'Search', '_digital_library' ); ?>">
		</span>
	</div>
</form>
