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

// Register Custom Post Type Autori
function autori_cpt() {

	$labels = array(
		'name'                  => _x( 'Autori', 'Post Type General Name', '_digital_library' ),
		'singular_name'         => _x( 'Autore', 'Post Type Singular Name', '_digital_library' ),
		'menu_name'             => __( 'Autori', '_digital_library' ),
		'name_admin_bar'        => __( 'Autore', '_digital_library' ),
		'archives'              => __( 'Item Archives', '_digital_library' ),
		'attributes'            => __( 'Item Attributes', '_digital_library' ),
		'parent_item_colon'     => __( 'Parent Item:', '_digital_library' ),
		'all_items'             => __( 'All Items', '_digital_library' ),
		'add_new_item'          => __( 'Add New Item', '_digital_library' ),
		'add_new'               => __( 'Add New', '_digital_library' ),
		'new_item'              => __( 'New Item', '_digital_library' ),
		'edit_item'             => __( 'Edit Item', '_digital_library' ),
		'update_item'           => __( 'Update Item', '_digital_library' ),
		'view_item'             => __( 'View Item', '_digital_library' ),
		'view_items'            => __( 'View Items', '_digital_library' ),
		'search_items'          => __( 'Search Item', '_digital_library' ),
		'not_found'             => __( 'Not found', '_digital_library' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_digital_library' ),
		'featured_image'        => __( 'Featured Image', '_digital_library' ),
		'set_featured_image'    => __( 'Set featured image', '_digital_library' ),
		'remove_featured_image' => __( 'Remove featured image', '_digital_library' ),
		'use_featured_image'    => __( 'Use as featured image', '_digital_library' ),
		'insert_into_item'      => __( 'Insert into item', '_digital_library' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '_digital_library' ),
		'items_list'            => __( 'Items list', '_digital_library' ),
		'items_list_navigation' => __( 'Items list navigation', '_digital_library' ),
		'filter_items_list'     => __( 'Filter items list', '_digital_library' ),
	);
	$args = array(
		'label'                 => __( 'Autore', '_digital_library' ),
		'description'           => __( 'Post Type Description', '_digital_library' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'letterature' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rewrite'				=> array( 'slug' => 'autori' ),		
	);
	register_post_type( 'autori', $args );

}
add_action( 'init', 'autori_cpt', 0 );

// Register Custom Post Type Opere
function opere_cpt() {

	$labels = array(
		'name'                  => _x( 'Opere', 'Post Type General Name', '_digital_library' ),
		'singular_name'         => _x( 'Opera', 'Post Type Singular Name', '_digital_library' ),
		'menu_name'             => __( 'Opere', '_digital_library' ),
		'name_admin_bar'        => __( 'Opere', '_digital_library' ),
		'archives'              => __( 'Item Archives', '_digital_library' ),
		'attributes'            => __( 'Item Attributes', '_digital_library' ),
		'parent_item_colon'     => __( 'Parent Item:', '_digital_library' ),
		'all_items'             => __( 'All Items', '_digital_library' ),
		'add_new_item'          => __( 'Add New Item', '_digital_library' ),
		'add_new'               => __( 'Add New', '_digital_library' ),
		'new_item'              => __( 'New Item', '_digital_library' ),
		'edit_item'             => __( 'Edit Item', '_digital_library' ),
		'update_item'           => __( 'Update Item', '_digital_library' ),
		'view_item'             => __( 'View Item', '_digital_library' ),
		'view_items'            => __( 'View Items', '_digital_library' ),
		'search_items'          => __( 'Search Item', '_digital_library' ),
		'not_found'             => __( 'Not found', '_digital_library' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_digital_library' ),
		'featured_image'        => __( 'Featured Image', '_digital_library' ),
		'set_featured_image'    => __( 'Set featured image', '_digital_library' ),
		'remove_featured_image' => __( 'Remove featured image', '_digital_library' ),
		'use_featured_image'    => __( 'Use as featured image', '_digital_library' ),
		'insert_into_item'      => __( 'Insert into item', '_digital_library' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '_digital_library' ),
		'items_list'            => __( 'Items list', '_digital_library' ),
		'items_list_navigation' => __( 'Items list navigation', '_digital_library' ),
		'filter_items_list'     => __( 'Filter items list', '_digital_library' ),
	);
	$args = array(
		'label'                 => __( 'Opera', '_digital_library' ),
		'description'           => __( 'Post Type Description', '_digital_library' ),
		'labels'                => $labels,
		'supports'              => array( 'custom-fields' ),
		'taxonomies'            => array( 'letterature' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rewrite'				=> array( 'slug' => 'opere' ),
	);
	register_post_type( 'opere', $args );

}
add_action( 'init', 'opere_cpt', 0 );

// Register Custom Post Type Generi Letterari
function generi_cpt() {

	$labels = array(
		'name'                  => _x( 'Generi', 'Post Type General Name', '_digital_library' ),
		'singular_name'         => _x( 'Genere', 'Post Type Singular Name', '_digital_library' ),
		'menu_name'             => __( 'Generi', '_digital_library' ),
		'name_admin_bar'        => __( 'Post Type', '_digital_library' ),
		'archives'              => __( 'Item Archives', '_digital_library' ),
		'attributes'            => __( 'Item Attributes', '_digital_library' ),
		'parent_item_colon'     => __( 'Parent Item:', '_digital_library' ),
		'all_items'             => __( 'All Items', '_digital_library' ),
		'add_new_item'          => __( 'Add New Item', '_digital_library' ),
		'add_new'               => __( 'Add New', '_digital_library' ),
		'new_item'              => __( 'New Item', '_digital_library' ),
		'edit_item'             => __( 'Edit Item', '_digital_library' ),
		'update_item'           => __( 'Update Item', '_digital_library' ),
		'view_item'             => __( 'View Item', '_digital_library' ),
		'view_items'            => __( 'View Items', '_digital_library' ),
		'search_items'          => __( 'Search Item', '_digital_library' ),
		'not_found'             => __( 'Not found', '_digital_library' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_digital_library' ),
		'featured_image'        => __( 'Featured Image', '_digital_library' ),
		'set_featured_image'    => __( 'Set featured image', '_digital_library' ),
		'remove_featured_image' => __( 'Remove featured image', '_digital_library' ),
		'use_featured_image'    => __( 'Use as featured image', '_digital_library' ),
		'insert_into_item'      => __( 'Insert into item', '_digital_library' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '_digital_library' ),
		'items_list'            => __( 'Items list', '_digital_library' ),
		'items_list_navigation' => __( 'Items list navigation', '_digital_library' ),
		'filter_items_list'     => __( 'Filter items list', '_digital_library' ),
	);
	$args = array(
		'label'                 => __( 'Post Type', '_digital_library' ),
		'description'           => __( 'Post Type Description', '_digital_library' ),
		'labels'                => $labels,
		'supports'              => array( 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-tag',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'rewrite'				=> array( 'slug' => 'generi' ),
	);
	register_post_type( 'generi', $args );

}
add_action( 'init', 'generi_cpt', 0 );


// Register Custom Taxonomy
function tipogeneri_tax() {

	$labels = array(
		'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', '_digital_library' ),
		'singular_name'              => _x( 'Tipologia genere', 'Taxonomy Singular Name', '_digital_library' ),
		'menu_name'                  => __( 'Tipo genere', '_digital_library' ),
		'all_items'                  => __( 'All Items', '_digital_library' ),
		'parent_item'                => __( 'Parent Item', '_digital_library' ),
		'parent_item_colon'          => __( 'Parent Item:', '_digital_library' ),
		'new_item_name'              => __( 'New Item Name', '_digital_library' ),
		'add_new_item'               => __( 'Add New Item', '_digital_library' ),
		'edit_item'                  => __( 'Edit Item', '_digital_library' ),
		'update_item'                => __( 'Update Item', '_digital_library' ),
		'view_item'                  => __( 'View Item', '_digital_library' ),
		'separate_items_with_commas' => __( 'Separate items with commas', '_digital_library' ),
		'add_or_remove_items'        => __( 'Add or remove items', '_digital_library' ),
		'choose_from_most_used'      => __( 'Choose from the most used', '_digital_library' ),
		'popular_items'              => __( 'Popular Items', '_digital_library' ),
		'search_items'               => __( 'Search Items', '_digital_library' ),
		'not_found'                  => __( 'Not Found', '_digital_library' ),
		'no_terms'                   => __( 'No items', '_digital_library' ),
		'items_list'                 => __( 'Items list', '_digital_library' ),
		'items_list_navigation'      => __( 'Items list navigation', '_digital_library' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'tipogeneri', array( 'generi' ), $args );

}
add_action( 'init', 'tipogeneri_tax', 0 );

// Register Custom Taxonomy
function letterature_tax() {

	$labels = array(
		'name'                       => _x( 'Letterature', 'Taxonomy General Name', '_digital_library' ),
		'singular_name'              => _x( 'Letteratura', 'Taxonomy Singular Name', '_digital_library' ),
		'menu_name'                  => __( 'Letterature', '_digital_library' ),
		'all_items'                  => __( 'All Items', '_digital_library' ),
		'parent_item'                => __( 'Parent Item', '_digital_library' ),
		'parent_item_colon'          => __( 'Parent Item:', '_digital_library' ),
		'new_item_name'              => __( 'New Item Name', '_digital_library' ),
		'add_new_item'               => __( 'Add New Item', '_digital_library' ),
		'edit_item'                  => __( 'Edit Item', '_digital_library' ),
		'update_item'                => __( 'Update Item', '_digital_library' ),
		'view_item'                  => __( 'View Item', '_digital_library' ),
		'separate_items_with_commas' => __( 'Separate items with commas', '_digital_library' ),
		'add_or_remove_items'        => __( 'Add or remove items', '_digital_library' ),
		'choose_from_most_used'      => __( 'Choose from the most used', '_digital_library' ),
		'popular_items'              => __( 'Popular Items', '_digital_library' ),
		'search_items'               => __( 'Search Items', '_digital_library' ),
		'not_found'                  => __( 'Not Found', '_digital_library' ),
		'no_terms'                   => __( 'No items', '_digital_library' ),
		'items_list'                 => __( 'Items list', '_digital_library' ),
		'items_list_navigation'      => __( 'Items list navigation', '_digital_library' ),
	);
	$rewrite = array(
		'slug' => 'letterature',
		'with_front' => false,
		'hyerarchical' => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'letterature', array( 'autori', 'opere', 'generi' ), $args );

}
add_action( 'init', 'letterature_tax', 0 );
