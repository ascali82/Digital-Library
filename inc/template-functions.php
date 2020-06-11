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

    // Include OpenGraph per i single post
    function opengraph_for_posts() {     
        if ( is_singular() ) {
            global $post;         
            setup_postdata( $post );         
            $og_type = '<meta property="og:type" content="article" />' . "\n";        
            $og_title = '<meta property="og:title" content="' . esc_attr( get_the_title() ) . '" />' . "\n";         
            $og_url = '<meta property="og:url" content="' . get_permalink() . '" />' . "\n";   
            if ( $og_description = $post->post_excerpt ) {     
                $og_description = '<meta property="og:description" content="' . esc_attr( get_the_excerpt() ) . '" />' . "\n";         
            } else {
                $og_description = '<meta property="og:description" content="' . esc_attr( get_bloginfo('description') ) . '" />' . "\n";
            }
            if ( has_post_thumbnail() ) {             
                 $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );             
                 $og_image = '<meta property="og:image" content="' . $imgsrc[0] . '" />' . "\n";         
            }         
            
            echo $og_type . $og_title . $og_url . $og_description . $og_image;     
        } 
	}
	add_action( 'wp_head', 'opengraph_for_posts' );


	// Controllo aggiuntivo identificativo CPT
    /**
     * Check if a post is a custom post type.
     * @param  mixed $post Post object or ID
     * @return boolean
     */
    function is_custom_post_type( $post = NULL )
    {
        $all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );

        // there are no custom post types
        if ( empty ( $all_custom_post_types ) )
            return FALSE;

        $custom_types      = array_keys( $all_custom_post_types );
        $current_post_type = get_post_type( $post );

        // could not detect current type
        if ( ! $current_post_type )
            return FALSE;

        return in_array( $current_post_type, $custom_types );
    }

	// Disabilita Gutenberg nei CPT autori e opere
	add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
	function prefix_disable_gutenberg($current_status, $post_type)
	{
		// Indicazione Post Type
		if ($post_type === 'autori' || 'opere') return false;
		return $current_status;
	}

	// Generazione titolo e slug per il cpt 'autori'
	add_action('admin_head', 'hide_wp_title_input');
	function hide_wp_title_input() {
		$screen = get_current_screen();
		if ($screen->id != 'autori' ) {
			return;
		}
		?>
		<style type="text/css">
			#post-body-content {
			display: none;
		}
		</style>
		<?php 
	}

	function save_post_type_post($post_id) {
		$post_type = get_post_type($post_id);
		if ($post_type != 'autori') {
		  return;
		}
		if( has_term( 'letteratura-latina', 'letterature' ) ) {

		  $praenomen = get_field( 'givenname', $post_id );
		  $nomen = get_field( 'familyname', $post_id );
		  $cognomen = get_field( 'additionalname', $post_id );
		  $supernomina = get_field( 'alternatename', $post_id );

		  $post_title = $praenomen .' '. $nomen .' '. $cognomen .' '. $supernomina;
		  $post_name = sanitize_title($post_title);
		  $post = array(
			'ID' => $post_id,
			'post_name' => $post_name,
			'post_title' => $post_title
		  );
		  wp_update_post($post);
		} 
		elseif ( has_term( 'letteratura-italiana', 'letterature' ) ) {

		  $nome = get_field( 'givenname', $post_id );
		  $secondonome = get_field( 'additionalname', $post_id );
		  $cognome = get_field( 'familyname', $post_id );
		  $alias = get_field( 'alternatename', $post_id );

		  $post_title = $nome .' '. $secondonome .' '. $cognome;
		  $post_name = sanitize_title($post_title);
		  $post = array(
			'ID' => $post_id,
			'post_name' => $post_name,
			'post_title' => $post_title
		  );
		  wp_update_post($post);
		} 

	  }
	  add_action('acf/save_post', 'save_post_type_post', 20); // fires after ACF
