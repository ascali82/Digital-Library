<?php
/**
 * _digital_library funzioni e definizioni
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _digital_library
 */

if ( ! defined( '_digital_library_VERSION' ) ) {
	// Sostituisce il numero versione di questo tema a ogni rilascio
	define( '_digital_library_VERSION', '1.0.0' );
}

if ( ! function_exists( '_digital_library_setup' ) ) :
    /**
    * Imposta i valori di default del tema e registra il supporto per diverse funzionalità di WordPress
    *
    *  @since _digital_library 1.0
    */
    function _digital_library_setup() {

		// Rende il tema disponbile per la traduzione. Le traduzioni possono essere inserite nella cartella /languages/.
        load_theme_textdomain( '_digital_library', get_template_directory() . '/languages' );        
        
        // Aggiunge il feed RSS per i post standard e i commenti a <head>.
        add_theme_support( 'automatic-feed-links' );    
        
	    // Wordpress gestisce il titolo delle pagine.
        add_theme_support( 'title-tag' );        
        
  	    // Abilita il supporto per Post Thumbnails su post e pagine. @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/.
        add_theme_support( 'post-thumbnails' );
        
        // Abilita il supporto per tre menù di navigazione.
        register_nav_menus( array(
            'primary'   => esc_html__( 'Menu Principale', '_digital_library' ),
            'secondary' => esc_html__( 'Menu Secondario', '_digital_library' ),
            'tertiary' => esc_html__( 'Menu Terziario', '_digital_library' )
        ) );        

        // Abilita il supporto per i Post Formats. Questo aiuta a formattare i post in base al loro contenuto.
        add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

        // Abilita il supporto per modificare il markup di modulo di ricerca, modulo commenti, lista commenti, galleria e caption per produrre codice html5 valido.
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

        // Abilita la funzionalità di WordPress del custom background.
        add_theme_support( 'custom-background', apply_filters( '_digital_library_custom_background_args', array( 'default-color' => 'ffffff', 'default-image' => '', ) ) );   
        
        // Abilita la gestione della Selective Refresh dei widgets all'interno del Customizer. @link https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Abilita il supporto per il Custom Logo. @link https://codex.wordpress.org/Theme_Logo
        add_theme_support( 'custom-logo', array( 'height' => 250, 'width' => 250, 'flex-width' => true, 'flex-height' => true, ) );

    }
    endif;
    add_action( 'after_setup_theme', '_digital_library_setup' );

    
    // Imposta la larghezza del contenuto in pixel in base allo stile del tema e ai fogli di stile. Priorità 0 per renderla disponibile a callbacks di priorità inferiore.
    // @global int $content_width
    function _digital_library_content_width() {
        // Questa variabile è sovrascrivibile dai temi.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters( '_digital_library_content_width', 640 );
    }
    add_action( 'after_setup_theme', '_digital_library_content_width', 0 );


    // Registra le aree widget del tema. @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
    function _digital_library_widgets_init() {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Sidebar', '_digital_library' ),
                'id'            => 'sidebar-1',
                'description'   => esc_html__( 'Aggiungi qui i widget.', '_digital_library' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
    add_action( 'widgets_init', '_digital_library_widgets_init' );

    // Registra gli stili del tema
    function _digital_library_enqueue_styles() {
        wp_enqueue_style( '_digital_library-style', get_stylesheet_uri(), array(), _digital_library_VERSION );
        // CORE CSS
        wp_enqueue_style( 'main', get_stylesheet_uri() . '/assets/css/main.css');        
        // Bootstrap CSS
        wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
        // FA
        wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
        // Bootstrap CSS
        wp_enqueue_style('bootstrap_table', 'https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css');
    }
    add_action( 'wp_enqueue_scripts', '_digital_library_enqueue_styles');

    // Registra gli script del tema
    function _digital_library_enqueue_scripts() {
        wp_deregister_script('jquery');
        wp_enqueue_script( 'jquery','https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '', true );

        wp_enqueue_script( 'popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '', true );

        wp_enqueue_script( 'bootstrapjs','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '', true );

        wp_enqueue_script( 'bootstrap_table_js','https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js', array(), '', true );

        wp_enqueue_script( '_digital_library-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _digital_library_VERSION, true );

        wp_enqueue_script( '_digital_library-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), _digital_library_VERSION, true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', '_digital_library_enqueue_scripts');


    // Aggiunge classe sr-only a post-navigation
    // @link https://wordpress.org/support/topic/how-to-change-the-screen-reader-text-heading/
    add_filter( 'navigation_markup_template', function( $template, $class ) {
        return '
        <nav class="navigation %1$s" role="navigation" aria-label="%4$s">
            <h2 class="screen-reader-text sr-only sr-only-focusable">%2$s</h2>
            <div class="nav-links">%3$s</div>
        </nav>';
    }, 10, 2 );

    // Implementa la funzione Custom Header
//    require get_template_directory() . '/inc/custom-header.php';

    // Template tag del tema
    require get_template_directory() . '/inc/template-tags.php';

    // Aggiunge funzionalità al tema
    require get_template_directory() . '/inc/template-functions.php';

    // Abilita il Customizer
//    require get_template_directory() . '/inc/customizer.php';

    // Include il walker per i menu Bootstrap
    function register_navwalker(){
        require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

    // Include il supporto per la paginazione bootstrap
    require_once get_template_directory() . '/inc/class-wp-bootstrap4.4-pagination.php';

    // Include le breadcrumbs
    require_once get_template_directory() . '/inc/wp-bootstrap-breadcrumbs.php';

    // Abilita i CPT
    require_once get_template_directory() . '/inc/custom-post-types.php';

    // Registra la classe TGM-Plugin-Activation
    require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
    require_once get_template_directory() . '/inc/plugin-call.php';
    


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



        // Include il supporto per la gerarchia dei termini delle tassonomie
        require_once get_template_directory() . '/inc/class-term-hyerarchical.php';

        // Disabilita Gutenberg nei CPT
        add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
        function prefix_disable_gutenberg($current_status, $post_type)
        {
            // Use your post type key instead of 'product'
            if ($post_type === 'autori') return false;
            return $current_status;
        }

        // Auto fill Title and Slug for 'autori' CPT
        add_action('admin_head', 'hide_wp_title_input');
        function hide_wp_title_input() {
          $screen = get_current_screen();
          if ($screen->id != 'autori') {
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