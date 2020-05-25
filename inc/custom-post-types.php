<?php 
// Registra Custom Post Type Versioni
function version_cpt() {

	$labels = array(
		'name'                  => _x( 'Versioni', 'Post Type General Name', '_digital_library' ),
		'singular_name'         => _x( 'Versione', 'Post Type Singular Name', '_digital_library' ),
		'menu_name'             => __( 'Versioni', '_digital_library' ),
		'name_admin_bar'        => __( 'Versione', '_digital_library' ),
		'archives'              => __( 'Archivio versioni', '_digital_library' ),
		'attributes'            => __( 'Attributi versione', '_digital_library' ),
		'parent_item_colon'     => __( 'Versione genitore:', '_digital_library' ),
		'all_items'             => __( 'Tutte le versioni', '_digital_library' ),
		'add_new_item'          => __( 'Aggiungi nuova versione', '_digital_library' ),
		'add_new'               => __( 'Aggiungi nuovo', '_digital_library' ),
		'new_item'              => __( 'Nuova versione', '_digital_library' ),
		'edit_item'             => __( 'Modifica versione', '_digital_library' ),
		'update_item'           => __( 'Aggiorna versione', '_digital_library' ),
		'view_item'             => __( 'Visualizza versione', '_digital_library' ),
		'view_items'            => __( 'Visualizza versioni', '_digital_library' ),
		'search_items'          => __( 'Cerca versione', '_digital_library' ),
		'not_found'             => __( 'Nessuna versione trovata', '_digital_library' ),
		'not_found_in_trash'    => __( 'Nessuna versione trovata nel cestino', '_digital_library' ),
		'featured_image'        => __( 'Featured Image', '_digital_library' ),
		'set_featured_image'    => __( 'Imposta featured image', '_digital_library' ),
		'remove_featured_image' => __( 'Rimuovi featured image', '_digital_library' ),
		'use_featured_image'    => __( 'Usa come featured image', '_digital_library' ),
		'insert_into_item'      => __( 'Inserisci nella versione', '_digital_library' ),
		'uploaded_to_this_item' => __( 'Aggiorna in questa versione', '_digital_library' ),
		'items_list'            => __( 'Lista versioni', '_digital_library' ),
		'items_list_navigation' => __( 'Naviga tra le versioniItems list navigation', '_digital_library' ),
		'filter_items_list'     => __( 'Filtra la lista versioni', '_digital_library' ),
	);
	$args = array(
		'label'                 => __( 'Versione', '_digital_library' ),
		'description'           => __( 'Descrizione aggiornamento del tema', '_digital_library' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'				=> array( 'slug' => 'versioni' ),
	);
	register_post_type( 'version', $args );

}
add_action( 'init', 'version_cpt', 0 );